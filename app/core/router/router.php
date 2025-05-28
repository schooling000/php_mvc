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
            $callback = null;
            $middlewares = null;

            $request = $this->request->getUrl();

            foreach ($this->routers as $router) {
                if ($router['path'] == $request['path'] && $router['method'] == $request['method']) {
                    $currentRouter = $router;
                    $currentRouter['param'] = array();
                }
            }

            $callback = $cur

            if (!isset($callback)) {
                $this->responsive->render404Page();
                exit;
            }

            if(!empty($middlewares)){
                foreach ($middlewares as $middleware) {
                    var_dump( $middleware->execute($request));
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

        public function __destruct() {}
    }
}
