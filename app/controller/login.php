<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;
    use app\help\Help;

    class Login extends Controllers
    {

        public function index($data = array()): void
        {
            $this->response->renderPage('user_login', $data);
        }

        public function login($data = array()) : void {
            Help::dnd($data);
        }
    }
}
