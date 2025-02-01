<?php

declare(strict_types=1);

namespace app\middleware {

    use app\core\Middleware;
    use app\core\Request;

    class User extends Middleware {

        public function execute(Request $request): Request
        {
            return $request;   
        }

    }
}