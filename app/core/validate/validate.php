<?php

declare(strict_types=1);

namespace app\core\validate {

    class Validate
    {

        private $fields = array();

        public function addField($name, $value, $message = ""): Validate
        {
            $this->fields[$name]=$value;
            return $this;
        }

        public function textField(): void {}
        public function numberField(): void {}
        public function phoneField(): void {}
        public function emailField(): void {}

        public function fieldIsError() : bool {}
        public function getMessageFieldError() : string {}
        public function hasFieldError() : bool {}
    }
}
