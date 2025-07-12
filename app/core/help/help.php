<?php

declare(strict_types=1);

namespace app\core\help {

    class Help
    {

        public static function dnd($value): void
        {
            echo "<pre>";
            var_dump($value);
            echo "</pre>";
        }
    }
}
