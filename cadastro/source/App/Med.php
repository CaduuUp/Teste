<?php

namespace Source\App;

use Source\Core\Controller;



/**
 * Web Controller
 * @package Source\App
 */
class Med extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_MED . "/");
    }

    /**
     * APP HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head,
            "video" => "jDDaplaOz7Q"
        ]);
    }

    public function about(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("about", [
            "head" => $head
        ]);
    }

    public function services(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("services", [
            "head" => $head
        ]);
    }

    public function portfolio(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("portfolio", [
            "head" => $head

        ]);
    }

    public function team(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("team", [
            "head" => $head
        ]);
    }
    public function contact(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/skills.png"),
            false
        );

        echo $this->view->render("contact", [
            "head" => $head
        ]);
    }
}
