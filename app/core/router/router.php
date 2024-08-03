<?php

declare(strict_types=1);

namespace app\core\router {

    use app\core\request\Request;
    use app\core\response\Response;

    class router
    {

        private Request $request;
        private Response $response;
        private $routers = array();

        public function __construct(Request &$request, Response &$response)
        {
            $this->request = new Request();
            $this->response = new Response();
        }

        public function get(?string $path, $callback): Router
        {
            $this->routers[] = array(
                'path' => $path,
                'callback' => $callback,
                'method' => 'GET',
                'middleware' => array()
            );
            return $this;
        }
        public function post(?string $path, $callback): Router
        {
            $this->routers[] = array(
                'path' => $path,
                'callback' => $callback,
                'method' => 'POST',
                'middleware' => array()
            );
            return $this;
        }
        public function middleware($middleware): Router
        {
            $this->routers[array_key_last($this->routers)]['middleware'][] = $middleware;
            return $this;
        }


        public function debug() : void {
            $this->request->debug();
            echo '<br>';
            echo '-----------------------------------------------<br>';
            echo '-----------------------------------------------<br>';
            echo '-----------------------------------------------<br>';
            echo '-----------------------------------------------<br>';
            echo '';
        }
    }
}
