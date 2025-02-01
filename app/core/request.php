<?php

declare(strict_types=1);

namespace app\core {

    class Request
    {

        private function getPathURL(): string
        {
            $url = parse_url($_SERVER['REQUEST_URI']);
            return $url['path'] = !isset($url['path']) || empty($url['path']) ? $url['path'] = "/" : $url['path'];
        }

        private function getMethod(): string
        {
            return $_SERVER["REQUEST_METHOD"];
        }

        private function getParam(): array
        {
            switch ($this->getMethod()) {
                case 'GET':
                    return $_GET;
                    break;

                case 'POST':
                    return $_POST;
                    break;

                default:
                    return array();
                    break;
            }
        }

        public function getRequestParam(): array
        {
            return array(
                "path" => $this->getPathURL(),
                "method" => $this->getMethod(),
                "param" => $this->getParam()
            );
        }
    }
}
