<?php

declare(strict_types=1);

namespace app\core {

    use app\core\Request;

    abstract class Middleware
    {
        abstract public function execute(Request $request): Request;
        abstract public function errorMessage(): string;
    }
}
