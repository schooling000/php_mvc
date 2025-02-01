<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;

    class User_managerment extends Controllers
    {

        public function view($data = array()): void
        {
            $this->response->renderPage('user_managerment', $data);
        }

        public function login($data=array()) : void {
            
        }
    }
}
