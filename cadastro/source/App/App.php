<?php

namespace Source\App;


use Source\Core\Controller;
use Source\Core\Session;
use Source\Core\View;
use Source\Models\Auth;
use Source\Models\CafeApp\AppCategory;
use Source\Models\CafeApp\AppInvoice;
use Source\Models\CafeApp\AppWallet;
use Source\Models\Post;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Email;
use Source\Support\Thumb;
use Source\Support\Upload;
use Source\Support\Pager;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o APP.")->flash();
            redirect("/entrar");
        }
        (new Access())->report();
        (new Online())->report();

        (new AppWallet())->start($this->user);
        (new AppInvoice())->fixed($this->user, 3);
    }

    /**
     * APP HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá {$this->user->name}. Vamos Aprender? - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );
        $users = (new User())->find()->fetch(true);

        echo $this->view->render("home", [
            "head" => $head,
            "users" => $users,
        ]);
    }

    /**
     * @return void
     */
    public function active(): void
    {
        $head = $this->seo->render(
            "Cadastros Ativados - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $users = new User();
        $users = $users->order("id")->find("status = :status", "status=1")->fetch(true);
        echo $this->view->render("ativos", [
            "head" => $head,
            "users" => $users,
        ]);
    }


    /**
     * @param array|null $data
     */
    public function disable(?array $data): void
    {
        $head = $this->seo->render(
            "Cadastros Desativados - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
        $users = new User();

        if ($search) {
            $users = $users->find();
        } else {
            $users = $users->find();
        }

        $users = $users->order("id")->find("status = :status", "status=0")->fetch(true);
        echo $this->view->render("desativados", [
            "head" => $head,
            "users" => $users,
        ]);
    }

    public function edit(array $data, int $userId = null): void
    {
        $userId = $userId ?? $this->user->id;
    
        if (!empty($data["update"])) {
            list($d, $m, $y) = explode("-", $data["data_nasc"]);
            $user = (new User())->findById($userId);
    
            if (!$user) {
                $json["message"] = $this->message->error("Usuário não encontrado.")->render();
                echo json_encode($json);
                return;
            }
    
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
            $user->telefone = $data["telefone"];
            $user->data_nasc = "{$d}-{$m}-{$y}";
            $user->status = $data["status"];
            

            if (!$user->save()) {
                $json["message"] = $this->message->warning("Erro ao atualizar")->render();
                echo json_encode($json);
                return;
            }
    
            $json["message"] = $this->message->success(
                "Pronto {$user->name}. Seus dados foram atualizados com sucesso!"
            )->render();
            echo json_encode($json);
            return;
        }
    
        $head = $this->seo->render(
            "Editar Cadastro - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );
    
        $user = (new User())->findById($userId); 
    
        if (!$user) {
            echo "Usuário não encontrado.";
            return;
        }
    
        echo $this->view->render("editar", [
            "head" => $head,
            "user" => $user 
        ]);


    /**
     * @param array $data
     * @throws \Exception
     */

     public function support(array $data): void
    {
        if (empty($data["message"])) {
            $json["message"] = $this->message->warning("Para enviar escreva sua mensagem.");
            echo json_encode($json);
            return;
        }

        if (request_limit("appsupport", 3, 60 * 5)) {
            $json["message"] = $this->message->warning(
                "Por favor, aguarde 5 minutos para enviar novos contatos, sugestões ou reclamações"
            );
            echo json_encode($json);
            return;
        }

        if (request_repeat("message", $data["message"])) {
            $json["message"] = $this->message->info(
                "Já recebemos sua solicitação {$this->user->name}. Agradecemos pelo contato e responderemos em breve."
            );
            echo json_encode($json);
            return;
        }

        $subject = date_fmt() . " - {$data["subject"]}";
        $message = filter_var($data["message"], FILTER_SANITIZE_STRING);

        $view = new View(__DIR__ . "/../../shared/views/email");
        $body = $view->render("mail", [
            "subject" => $subject,
            "message" => str_textarea($message)
        ]);

        (new Email())->bootstrap(
            $subject,
            $body,
            CONF_MAIL_SUPPORT,
            "Suporte " . CONF_SITE_NAME
        )->queue($this->user->email, "{$this->user->name}");

        $this->message->success(
            "Recebemos sua solicitação {$this->user->name}. Agradecemos pelo contato e responderemos em breve."
        )->flash();
        $json["reload"] = true;
        echo json_encode($json);
    }


    /**
     * @param array $data
     */
    public function remove(array $data): void
    {
        if (!isset($data['id'])) {
            $json["message"] = $this->message->error("ID do usuário não encontrado!")->render();
            $json["redirect"] = url("/app");
            echo json_encode($json);
        }
        $head = $this->seo->render(
            "Remover Cadastro - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        $users = (new User())->find("id = :id", "id={$data['id']}")->fetch();

        if ($users) {
            if ($users->destroy()) {
                if ($users->id === $this->user->id) {
                    $this->message->success(
                        "Tudo pronto {$this->user->name}. O cadastro foi removido com sucesso!"
                    )->flash();
                    $json["redirect"] = url("/app");
                    echo json_encode($json);
                } else {
                    $this->message->success(
                        "Tudo pronto {$this->user->name}. O cadastro foi removido com sucesso!"
                    )->flash();
                    $json["redirect"] = url("/app");
                    echo json_encode($json);
                }
            } else {
                $this->message->success("Erro ao remover o cadastro.")->flash();
                $json["redirect"] = url("/app");
                echo json_encode($json);
            }
        } else {
            $this->message->info("Usuario não foi encontrado.")->flash();
            $json["redirect"] = url("/app");
            echo json_encode($json);
        }
        echo json_encode($json);
        return;
    }

    /**
     * @param array|null $array
     */
    public function profile(?array $data): void
    {
        if (!empty($data["update"])) {
            list($d, $m, $y) = explode("-", $data["data_nasc"]);
            $user = (new User())->findById($this->user->id);
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
            $user->telefone = $data["telefone"];
            $user->data_nasc = "{$d}-{$m}-{$y}";
            $user->status = $data["status"];

            if ($user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }
            $json["message"] = $this->message->success(
                "Pronto {$this->user->name}. Seus dados foram atualizados com sucesso!"
            )->render();
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("profile", [
            "head" => $head,
            "user" => $this->user

        ]);
    }

    /**
     * APP LOGOUT
     */
    public function logout()
    {
        $this->message->info("Você saiu com sucesso " . Auth::user()->name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }

    public function Search(array $data): void
    {
        if (!empty($data['s'])) {
            $search = filter_var($data['s'], FILTER_SANITIZE_STRIPPED);
            echo json_encode(["redirect" => url("/app/buscar/{$search}/1")]);
            return;
        }
        if (empty($data['terms'])) {
            redirect("/app");
        }
        $search = filter_var($data['terms'], FILTER_SANITIZE_STRIPPED);
        $page = (filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);

        $head = $this->seo->render(
            "Pesquisa por {$search} - " . CONF_SITE_NAME,
            "Confira os resultados de sua pesquisa para {$search}",
            url("/app/buscar/{$search}/{$page}"),
            theme("/assets/images/share.jpg")
        );

        $users = (new User())->find("name LIKE '%' :s '%' OR cpf LIKE '%' :s '%'", "s={$search}");
        var_dump($users);
        if (!$users) {
            echo $this->view->render("userSearch", [
                "head" => $head,
                "title" => "PESQUISA POR:",
                "search" => $search
            ]);
            return;
        }

        echo $this->view->render("userSearch", [
            "head" => $head,
            "title" => "PESQUISA POR:",
            "search" => $search,
            "users" => $users->fetch(true)
        ]);
    }
}
