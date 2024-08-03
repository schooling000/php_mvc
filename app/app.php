<?php

    declare(strict_types=1);

    namespace app\core{

        use core\request\Request;
        use core\request\Response;
        use core\request\Rounter;


        class App{
            private Request $request;
            private Response $response;
            public Router $router;

            public function __construct()
            {
                $this->request = new Request();
                $this->response = new Response();   
                $this->router = new Router($this->request, $this->response);   
            }

            public function __destruct()
            {
                unset($this->request);
                unset($this->response);
                unset($this->router);   
            }

            public function run(){
                $this->router->executed();
            }

        }
    }