<?php

declare(strict_types=1);

namespace app\core\router {

    use app\core\request\Request;
    use app\core\response\Response;
    use app\core\middlewares\Middlewares;
    use app\help\Help;

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
            $routerIsSelect = array();

            $request = $this->request->getRequestParam();

            foreach ($this->routers as $router) {
                if ($router['path'] == $request['path'] && $router['method'] == $request['method']) {
                    $routerIsSelect = $router;
                    $routerIsSelect['param'] = array('data'=>$request["param"]);
                }
            }

            if (!isset($routerIsSelect['callback']) ||  empty($routerIsSelect['callback'])) {
                $this->response->render404Page($request['path']);
                exit;
            }

            if (!empty($routerIsSelect['middleware'])) {
                foreach ($routerIsSelect['middleware'] as $middleware) {
                    $checkHasError = $middleware->executed($routerIsSelect);
                    if (!empty($checkHasError)) {
                        $routerIsSelect = $checkHasError;
                        break;
                    }
                }
            }

            if (is_string($routerIsSelect['callback'])) {
                echo $routerIsSelect['callback'];
                return;
            } elseif (is_callable($routerIsSelect['callback'])) {
                call_user_func($routerIsSelect['callback'], $routerIsSelect['data']);
                return;
            } elseif (is_array($routerIsSelect['callback'])) {
                $controller = new $routerIsSelect['callback'][0]($this->response);
                $action = $routerIsSelect['callback'][1];
                $param = $routerIsSelect['param'];
                call_user_func_array(array($controller, $action), $param);
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
