<?php

declare(strict_types=1);

namespace app\core\router {

    use app\core\request\Request;
    use app\core\middleware\Middleware;
    use app\core\responsive\Responsive;

    class Router
    {
        private $routers = array();
        private $request = null;
        private $responsive = null;

        public function __construct(Request &$request, Responsive &$responsive)
        {
            $this->request = $request;
            $this->responsive = $responsive;
        }

        public function get(string $path, $callback): Router
        {
            $this->routers[$path] = array(
                'path' => $path,
                'method' => 'GET',
                'callback' => $callback,
                'middleware' => array()
            );
            return $this;
        }
        public function post(string $path, $callback): Router
        {
            $this->routers[$path] = array(
                'path' => $path,
                'method' => 'POST',
                'callback' => $callback,
                'middleware' => array()
            );
            return $this;
        }
        public function middleware(Middleware $middleware): Router
        {
            $router = $this->routers[array_key_last($this->routers)]['middleware'][] = $middleware;
            return $this;
        }

        public function run(): void
        {
            $routerIsSelect = array();

            $request = $this->request->getUrl();

            foreach ($this->routers as $router) {
                if ($router['path'] == $request['path'] && $router['method'] == $request['method']) {
                    $routerIsSelect = $router;
                    $routerIsSelect['param'] = array('data'=>$request["param"]);
                }
            }

            if (!isset($routerIsSelect['callback']) ||  empty($routerIsSelect['callback'])) {
                $this->responsive->render404Page($request['path']);
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
                $controller = new $routerIsSelect['callback'][0]($this->responsive);
                $action = $routerIsSelect['callback'][1];
                $param = $routerIsSelect['param'];
                call_user_func_array(array($controller, $action), $param);
            }
        }

        public function __destruct() {}
    }
}
