<?php

declare(strict_types=1);

namespace app\core\responsive {

    use app\core\responsiveException\responsiveException;

    class Responsive
    {

        public function renderPage(string $strPageName, $data = array()): void
        {
            require_once ROOT_PATH.DS.'app'.DS.'view'.DS.'body'.DS.$strPageName.'.php';
        }
        public function render404Page(): void
        {
            echo 'trang 404';
        }
        public function renderErrorPage($data = array()): void
        {

            echo '<pre>';
            var_dump($data);
            echo '</pre>';
        }
    }
}
