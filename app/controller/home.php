<?php

declare(strict_types=1);

namespace app\controller {

    use app\core\controllers\Controllers;

    class Home extends Controllers
    {

        public function index($data = array()): void
        {
            echo "Home:index()<\br>";
            var_dump($data);
        }
    }
}
