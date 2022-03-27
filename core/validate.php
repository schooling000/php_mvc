<?php

namespace core {

    class Validate
    {

        private $validateCondition = ['required', 'minlength', 'maxlength', 'email', 'zero'];

        private $validateErrorMessage = [
            'required' => 'Trường :field Không Được Trống',
            'minlength' => 'Trường :field Không Được Nhỏ Hơn :condition',
            'maxlength' => 'Trường :field Không Được Lớn Hơn :condition',
            'email' => 'Trường :field Không Phải Là Email'
        ];
        private $arrayMessageError = array();

        public function addError($key, $value)
        {
            if (isset($this->arrayMesssageError[$key])) {
                $this->arrayMessageError[$key][] = $value;
            } else {
                $this->arrayMessageError[$key] = $value;
            }
        }

        public function selectError($key = null)
        {
            if (isset($this->arrayMesssageError[$key])) {
                return $this->arrayMessageError[$key];
            } else {
                return $this->arrayMessageError;
            }
        }
        
        public function selectFistError($key = null)
        {
            if (isset($this->arrayMesssageError[$key])) {
                return $this->arrayMessageError[$key][0];
            } else {
                return $this->arrayMessageError[0];
            }
        }

        public function deleteError($key = null)
        {
            if (isset($this->arrayMesssageError[$key])) {
                unset($this->arrayMessageError[$key]);
                $this->arrayMessageError = array_values($this->arrayMessageError);
            } else {
                unset($this->arrayMessageError);
                $this->arrayMessageError = array();
            }
        }

        public function hasError($key = null)
        {
            if (isset($this->arrayMesssageError[$key])) {
                return count($this->arrayMessageError[$key]) > 0 ? true : false;
            } else {
                return count($this->arrayMessageError) > 0 ? true : false;
            }
        }

        public function removeScriptInput(array &$data)
        {
            foreach ($data as $key => $value) {
                $data[$key] = htmlspecialchars(trim($value)); 
            }
            return true;
        }

        public function check(array $fields, array $fieldCondition)
        {
            foreach ($fields as $field => $value) {
                if (in_array($field, array_keys($fieldCondition))) {
                    $this->validate([
                        'field' => $field,
                        'value' => $value,
                        'condition' => $fieldCondition[$field]
                    ]);
                }
            }
        }

        public function validate($item)
        {
            foreach ($item['condition'] as $condition => $conditionValue) {

                if ( in_array($condition, $this->validateCondition) ) {

                    if ( !call_user_func_array(array($this, $condition), [$item['field'], $item['value'], $conditionValue]) ) {

                        $this->addError(
                            $item['field'], 
                            str_replace([':field', ':condition'], [$item['field'], $conditionValue], $this->validateErrorMessage[$condition])
                        );
                    }
                }
            }
        }


        public function required($field, $value, $condition)
        {
            return !empty($value);
        }

        public function minlength($field, $value, $condition)
        {
            return strlen($value) >= $condition;
        }

        public function maxlength($field, $value, $condition)
        {
            return strlen($value) <= $condition;
        }

        public function email($field, $value, $condition)
        {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    } // END CLASS

}// END NAMESPACE
