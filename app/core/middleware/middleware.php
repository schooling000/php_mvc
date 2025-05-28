<?php

declare(strict_types=1);

namespace app\core\middleware {

    abstract class Middleware
    {
        abstract public function execute(array $request): array;
    }
}
