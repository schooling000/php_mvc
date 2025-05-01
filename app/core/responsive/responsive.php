<?php

declare(strict_types=1);

namespace app\core\responsive {

    use app\core\responsiveException\responsiveException;

    class Responsive
    {

        public function renderPage(string $strPageName, $data = array()): void
        {
            echo '<pre>';
            var_dump($data);
            echo '<\pre>';
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
