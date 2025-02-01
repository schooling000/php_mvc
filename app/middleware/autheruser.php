<?php

declare(strict_types=1);

namespace app\middleware {

    use app\core\request\Request;
    use app\core\response\Response;
    use app\core\middlewares\Middlewares;

    class Autheruser extends Middlewares
    {
        public function executed(Request $request, Response $response): Response
        {
            return Response::renderPage('home');
        }
    }
}
