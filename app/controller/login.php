<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;
    use app\help\Help;

    class Login extends Controllers
    {

        public function index($data = array()): void
        {
            $this->responsive->renderPage('login', $data);
        }

        public function login($data = array()) : void {
            var_dump($data);
            $user = $this->getModel('user');
            var_dump($user->getUser('locht','12345'));
        }
    }
}
