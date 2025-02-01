<?php

declare(strict_types=1);

namespace app\core\router {

    use app\core\request\Request;
    use app\core\response\Response;
    use app\core\middlewares\Middlewares;

    class Router
    {

        private Request $request;
        private Response $response;
        private $routers = array();

        public function __construct(Request &$request, Response &$response)
        {
            $this->request = $request;
            $this->response = $response;
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

        public function middleware(Middlewares $middleware): Router
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
                $this->response->render404Page($request['path']);
                exit;
            }

            if (!empty($middlewares)) {
                foreach ($middlewares as $middleware) {
                    if (!empty($middleware->executed($this->request, $callback))) {
                        $request = $middleware->executed($this->request, $callback);
                        break;
                    }
                }
            }
            

            if (is_string($callback)) {
                echo $callback;
                return;
            } elseif (is_callable($callback)) {
                call_user_func($callback, $request['param']);
                return;
            } elseif (is_array($callback)) {
                $controller = new $callback[0]($this->response);
                $action = $callback[1];
                call_user_func_array(array($controller, $action), $request['param']);
            }
        }

        public function debug(): void
        {
            echo "<pre>";
            print_r($this->request);
            print_r($this->response);
            print_r($this->routers);
            echo "</pre>";
        }

        public function __destruct()
        {
            unset($this->request);
            unset($this->response);
        }
    }
}
