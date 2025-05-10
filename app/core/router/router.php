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
            $currentRouter = array();

            $request = $this->request->getRequestParam();

            foreach ($this->routers as $router) {
                if ($router['path'] == $request['path'] && $router['method'] == $request['method']) {
                    $currentRouter = $router;
                    $currentRouter['param'] = array();
                }
            }

            if (empty($currentRouter['callback'])) {
                $this->response->render404Page($request['path']);
                exit;
            }

            if (!empty($currentRouter['middleware'])) {
                foreach ($currentRouter['middleware'] as $middleware) {
                    if (!empty($middleware->executed($request, $currentRouter))) {
                        $currentRouter = $middleware->executed($request, $currentRouter);
                        break;
                    }
                }
            }



            if (is_string($currentRouter['callback'])) {
                return;
            } elseif (is_callable($currentRouter['callback'])) {
                call_user_func($currentRouter['callback'], $currentRouter['param']);
                return;
            } elseif (is_array($currentRouter['callback'])) {
                $controller = new $currentRouter['callback'][0]($this->response);
                $action = $currentRouter['callback'][1];
                call_user_func_array(array($controller, $action), $currentRouter['param']);
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
