<?php

declare(strict_types=1);

namespace app\core\requestException {

    use Exception;

    class RequestException extends Exception
    {

        public function __construct(string $message ) {
            echo "[ERROR] Request class ". $message;
        }
    }
}
