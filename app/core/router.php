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

        public function middleware(Middleware $middleware): Router
        {
            $this->routers[array_key_last($this->routers)]['middleware'][] = $middleware;
            return $this;
        }

        public function execute(): void
        {
            $callback = null;
            $middlewares = array();

            $request = $this->request->getRequestParam();

            foreach ($this->routers as $router) {
                if ($router['path'] == $request['path'] && $router['method'] == $request['method']) {
                    $callback = $router['callback'];
                    $middlewares = $router['middleware'];
                }
            }

            if (empty($callback)) {
                $this->responsive->render404Page($request['path']);
                exit;
            } elseif (empty($middleware)) {
                if (is_string($callback)) {
                    echo $callback;
                    return;
                } elseif (is_callable($callback)) {
                    call_user_func($callback, $request['param']);
                    return;
                } elseif (is_array($callback)) {
                    $controller = new $callback[0]();
                    $action = $callback[1];
                    call_user_func_array(array($controller, $action), $request['param']);
                }
            } else {

                foreach ($middlewares as $middleware) {
                    $request = $middleware->execute($request);
                }

                
            }
        }   

        public function debug(): void
        {
            echo "<pre>";
            print_r($this->request);
            print_r($this->responsive);
            print_r($this->routers);
            echo "</pre>";
        }

        public function __destruct()
        {
            unset($this->request);
            unset($this->responsive);
        }
    }
}
