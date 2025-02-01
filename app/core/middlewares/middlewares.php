<?php

declare(strict_types=1);

namespace app\core\middlewares {

    use app\core\request\Request;
    use app\core\response\Response;

    abstract class Middlewares
    {
        abstract public function executed(Request $request, Response $response): Response;
    }
}
