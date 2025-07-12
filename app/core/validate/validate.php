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

        public function textField(string $name, bool $required = true, int $min = 1, int $max = 244): void
        {
            if (!$required && empty($this->fields[$name]['value'])) {
                return;
            } elseif ($required && empty($this->fields[$name]['value'])) {
                $this->fields[$name]['message'] = "Trường này không được trống.";
                $this->fields[$name]['hasError'] = true;
                return;
            } elseif (strlen($this->fields[$name]['value']) < $min) {
                $this->fields[$name]['message'] = "Trường này quá ngắn.";
                $this->fields[$name]['hasError'] = true;
                return;
            } elseif (strlen($this->fields[$name]['value']) > $max) {
                $this->fields[$name]['message'] = "Trường này quá dài.";
                $this->fields[$name]['hasError'] = true;
                return;
            } else {
                return;
            }
        }
        public function numberField(): void {}
        public function phoneField(): void {}
        public function emailField(): void {}

        public function fieldIsError($name): bool
        {
            if ($this->fields[$name]['hasError']) {
                return true;
            } else {
                return false;
            }
        }
        public function getMessageFieldError($name): string
        {
            if ($this->fieldIsError($name)) {
                return $this->fields[$name]['message'];
            } else {
                return '';
            }
        }
        public function hasFieldError(): bool
        {
            foreach ($this->fields as $field) {
                if ($field['hasError']) {
                    return true;
                }
            }
            return false;
        }
        public function __destruct()
        {
            unset($this->fields);
        }
    }
}
