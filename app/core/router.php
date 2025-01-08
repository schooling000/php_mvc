<?php

declare(strict_types=1);

namespace app\core {

    class Router
    {

        private Request $request;
        private Responsive $responsive;

        public function __construct(Request &$request, Responsive &$responsive)
        {
            $this->request = $request;
            $this->responsive = $responsive;
        }

        public function __destruct()
        {
            unset($this->request);
            unset($this->responsive);
        }
    }
}
