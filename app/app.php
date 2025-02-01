<?php

declare(strict_types=1);

namespace app {

    use app\core\request\Request;
    use app\core\response\Response;
    use app\core\router\Router;


    class App
    {

        public Router $router;
        private Request $request;
        private Response $response;

        public function __construct()
        {
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);
        }

        public function __destruct()
        {
            unset($this->router);
            unset($this->request);
            unset($this->response);
        }

        public function run()
        {
            $this->router->execute();
        }

        public function debug(): void
        {
            $this->request->debug();
            $this->router->debug();
        }
    }
}
