<?php

declare(strict_types=1);

namespace app\core\response {

    use Exception;

    class Response
    {

        public function renderPage(string $pageName, $data = array()): void
        {
            $pathFileView = ROOT_PATH . DS . 'app' . DS . 'view' . DS . strtolower($pageName) . '.html.php';
            if(file_exists($pathFileView)){
                require_once $pathFileView;
            }else{
                throw new Exception('Không tìm thấy view page mà bạn cần tìm: '.$pathFileView);
            }
        }

        public function renderErrorPage($data = array()): void {}

        public function renderString(string $str): void
        {
            echo $str;
        }

        public function render404Page(string $str): void
        {
            echo 'Không tìm thấy trang ban yêu cầu: ' . $str;
        }

        public function setErrorCode(int $code): void {}
    }
}
