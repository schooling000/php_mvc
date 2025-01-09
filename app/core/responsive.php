<?php
    declare(strict_types=1);

    namespace app\core{

        class Responsive{

            public function renderPage(string $pageName, $data = array()) : void {

            }

            public function renderErrorPage($data = array()) : void {
                
            }

            public function setErrorCode(int $code) : void {}
        }
    }