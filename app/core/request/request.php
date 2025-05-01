<?php

declare(strict_types=1);

namespace app\core\request {

    class Request
    {

        private function getPath(): string
        {
            $strUrl = parse_url($_SERVER['REQUEST_URI']);
            return (!isset($strUrl['path']) || empty($strUrl['path']) ? '/' : $strUrl['path']);
        }

        private function getMethod(): string
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        private function getParam(): array
        {
            switch ($_SERVER['REQUEST_METHOD']) {
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

        public function getUrl(): array
        {
            return array(
                'path' => $this->getPath(),
                'method' => $this->getMethod(),
                'param' => $this->getParam()
            );
        }


    }
}
