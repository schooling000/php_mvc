<?php

declare(strict_types=1);


namespace app {

    use app\core\Router;
    use app\core\Request;
    use app\core\Responsive;

    class App
    {

        private Request $request;
        private Responsive $responsive;
        public  Router $router;

        public function __construct()
        {
            $this->request = new Request();
            $this->responsive = new Responsive();
            $this->router = new Router($this->request, $this->responsive);
        }



        public function run() : void {
            $this->router->debug();
            $this->router->execute();
        }
    }
}
