<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;

    class Users extends Controllers {


        public function index($data = array()) : void {
            $this->response->renderPage('user_login');
        }

        public function login(string $account = "", string $password = "") : void {
            echo "Users:login()";
        }

        public function logout() : void {
            
        }


    }
}
