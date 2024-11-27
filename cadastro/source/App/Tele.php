<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\User;


/**
 * Web Controller
 * @package Source\App
 */
class Tele extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_TELE . "/");
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
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head
        ]);
    }

    public function services(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("services", [
            "head" => $head
        ]);
    }

    public function about(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("about", [
            "head" => $head
        ]);
    }

    public function pricing(): void
    {
        $head = $this->seo->render(
            "Olá " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("pricing", [
            "head" => $head
        ]);
    }
}
