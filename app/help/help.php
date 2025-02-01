<?php
    declare(strict_types=1);

    namespace app\help{

        class Help{

            public const FILE_NOT_FOUND = "KHÔNG TÌM THẤY FILE VỚI ĐƯỜNG ĐẪN: ";

            public static function dnd($value) : void {
                echo "<pre>";
                print_r($value);
                echo "</pre>";
            }
        }
    }