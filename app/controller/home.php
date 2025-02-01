<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;

    class Home extends Controllers
    {
        public function index() : void {
            echo 'trang home';
        }
    }
}
