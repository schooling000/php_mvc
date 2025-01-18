<?php
    declare(strict_types=1);

    namespace app\core{

        class Responsive{

            public function renderPage(string $pageName, $data = array()) : void {

            }

            public function renderErrorPage($data = array()) : void {
                
            }

            public function renderString(string $str) : void {
                echo $str;
            }
            
            public function render404Page(string $str) : void {
                echo 'Không tìm thấy trang ban yêu cầu: '.$str;
            }

            public function setErrorCode(int $code) : void {}
        }
    }