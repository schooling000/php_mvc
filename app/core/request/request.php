<?php

declare(strict_types=1);

namespace app\core\request {

    class Request
    {
        public function getPath(): string
        {
            return parse_url($_SERVER['REQUEST_URI'])[0];
        }

        public function getMethod(): string
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        public function getParam(): array
        {
            define('GET', 'GET');
            define('POST', 'POST');
            switch ($_SERVER['REQUEST_METHOD']) {
                case GET:
                    return $_GET;
                    break;

                case POST:
                    return $_POST;
                    break;

                default:
                    return $_REQUEST;
                    break;
            }
        }

        public function debug() : void {
            var_dump('Đường dẫn trang là: '.$this->getPath());
            var_dump('Phương thức gơi dữ liệu của trang là: '.$this->getMethod());
            echo('Dữ liệu của trang la');
            // print_r($this->getParam());
        }
    }
}
