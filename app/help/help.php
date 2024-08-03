<?php

declare(strict_types=1);

namespace app\help {

    class Help
    {
        public static function dnd($value): void
        {
            echo '<pre>';
            print_r($value);
            echo '</pre>';
        }

        public static function displayError($data = array()): void
        {
            require_once ROOT_PATH . 'app' . DS . 'view' . DS . 'error' . DS . 'error.php';
        }
    }
}
