<?php

declare(strict_types=1);

namespace app\core {
    use app\core\Request;
    use app\core\Responsive;
    use app\core\Middleware;

    class Router
    {

        private Request $request;
        private Responsive $responsive;
        private $routers = array();

        public function __construct(Request &$request, Responsive &$responsive)
        {
            $this->request = $request;
            $this->responsive = $responsive;
        }

        public function get(?string $path, $callback): Router
        {
            $this->routers[] = array(
                'path' => $path,
                'method' => 'GET',
                'callback' => $callback,
                'middleware' => array()
            );
            return $this;
        }

        public function post(?string $path, $callback): Router
        {
            $this->routers[] = array(
                'path' => $path,
                'method' => 'POST',
                'callback' => $callback,
                'middleware' => array()
            );
            return $this;
        }

        public function middleware(Middleware $middleware) : Router {
            $this->routers[array_key_last($this->routers)]['middleware'][]=$middleware;
            return $this;
        }

        public function execute() : void {
            $controller = null;
            $action = null;
            $param = null;
            $middleware = array();

            foreach ($this->routers as $router) {
                
                if($router[$this->request->getRequestParam()['path']] & $router[$this->request->getRequestParam()['method']]){

                }
            }
        }

        public function debug() : void {
            echo "<pre>";
            print_r($this->request);
            print_r($this->responsive);
            print_r($this->routers);
            echo "<\pre>";
        }

        public function __destruct()
        {
            unset($this->request);
            unset($this->responsive);
        }
    }
}
