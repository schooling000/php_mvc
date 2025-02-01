<?php

declare(strict_types=1);

namespace app\core\request {

    class Request
    {

        public function getPath()
        {
            return parse_url($_SERVER['REQUEST_URI'])['path'];
        }

        public function getMethod(): string
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        public function getParam(): array
        {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    return $_GET;
                    break;

                case 'POST':
                    return $_POST;
                    break;

                default:
                    return $_REQUEST;
                    break;
            }
        }

        public function debug(): void
        {
            echo '===================================<br>';
            echo '===========REQUEST================<br>';
            echo '===================================<br>';
            echo ('- Request path: ' . $this->getPath() . '<br>');
            echo ('- Request method: ' . $this->getMethod() . '<br>');
            echo '- ';print_r($this->getParam());
            echo '<br>';
            echo '===================================<br>';
            echo '===================================<br>';
            echo '===================================<br>';
        }
    }
}
