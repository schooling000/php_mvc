<?php

declare(strict_types=1);

<<<<<<< HEAD
        class App{

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

            public function run(){
                $this->router->executed();
            }

            public function debug() : void {
                $this->request->debug();
                $this->router->debug();
            }

=======

namespace app {

    use app\core\Router;
    use app\core\Request;
    use app\core\Responsive;

    class App
    {

        private Request $request;
        private Responsive $responsive;
        public  Router $router;

        public function __construct()
        {
            $this->request = new Request();
            $this->responsive = new Responsive();
            $this->router = new Router($this->request, $this->responsive);
>>>>>>> 89dd71ea60023f4a2cef223c476d05002f28f2a0
        }



        public function run() : void {
            $this->router->debug();
            $this->router->execute();
        }
    }
}
