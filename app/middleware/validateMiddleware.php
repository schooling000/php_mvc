<?php

declare(strict_types=1);

namespace app\middleware {

    use app\core\middleware\Middleware as Middleware;
    use app\core\request\Request;

    class ValidateMiddleware extends Middleware
    {

        public function execute(array $request): array {
            return array(
                'path'=>'/',
                'method'=>'GET',
                'callback'=>'login',
                'param'=>array(
                    'message'=>'dsjflksadjflksd'
                )
            );
        }
    }
}
