<?php

declare(strict_types=1);

namespace app\core\validate {

    class Validate
    {

        private $fields = array();

        public function addField($name, $value, $message = ""): Validate
        {
            $this->fields[$name]['value'] = $value;
            $this->fields[$name]['message'] = "";
            $this->fields[$name]['hasError'] = false;
            return $this;
        }

        public function textField(string $name, bool $required = true, int $min = 1, int $max = 244): void {}
        public function numberField(): void {}
        public function phoneField(): void {}
        public function emailField(): void {}

        public function fieldIsError(): bool {}
        public function getMessageFieldError(): string {}
        public function hasFieldError(): bool {}
        public function __destruct()
        {
            unset($this->fields);
        }
    }
}
