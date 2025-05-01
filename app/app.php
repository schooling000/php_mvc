<?php

namespace app {

    use app\core\request\Request;
    use app\core\responsive\Responsive;
    use app\core\router\Router;

    class App
    {
        private $request = null;
        private $responsive = null;
        public  $router = null;

        public function __construct()
        {
            $this->request = new Request();
            $this->responsive = new Responsive();
            $this->router = new Router($this->request, $this->responsive);
        }

        public function run(): void
        {
            $this->router->run();
        }

        public function debug() : void {
            var_dump($this->router);
        }

        public function __destruct()
        {
            unset($this->request);
            unset($this->responsive);
            unset($this->router);
        }
    }
}
