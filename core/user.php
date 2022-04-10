<?php

namespace core {

    class User
    {

        private function isset()
        {
            return  isset($_SESSION['user']['id']) &&
                !empty($_SESSION['user']['id']) &&
                $_SESSION['user']['id'] !== null &&
                $_SESSION['user']['id'] > 0 ? true : false;
        }

        public function setUser($id, $name, $email, $acount, $role, $roleName)
        {
            $_SESSION['user']['id']             = $id;
            $_SESSION['user']['name']           = $name;
            $_SESSION['user']['email']          = $email;
            $_SESSION['user']['acount']         = $acount;
            $_SESSION['user']['roleId']         = $role;
            $_SESSION['user']['roleName']       = $roleName;
            $_SESSION['user']['permissions']    = null;
        }

        public function setPermissions($permissions)
        {
            $_SESSION['user']['permissions'] = $permissions;
        }

        public function getUser()
        {
            return $this->isset() ? $_SESSION['user'] : false;
        }

        public function getPermissions()
        {
            return isset($_SESSION['user']['permissions']) & !empty($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : false;
        }

        public function getRoleId()
        {
            return  $this->isset() &&
                !empty($_SESSION['user']['roleId']) ? $_SESSION['user']['roleId'] : false;
        }


        public function clearUser()
        {
            $_SESSION['user']['id']             = null;
            $_SESSION['user']['name']           = null;
            $_SESSION['user']['email']          = null;
            $_SESSION['user']['acount']         = null;
            $_SESSION['user']['role']           = null;
            $_SESSION['user']['roleName']       = null;

            foreach ($_SESSION['user']['permissions'] as $key => $value) {
                unset($_SESSION['user']['permissions'][$key]);
            }
            $_SESSION['user']['permissions']    = null;
        }

        public function Logged()
        {
            return $this->isset() ? true : false;
        }

        public function haveAccess($controller, $method)
        {
            try {
                $permissions = array_change_key_case($this->getPermissions(), CASE_LOWER);
                if (in_array(strtolower($controller), array_keys($permissions))) {
                    $functionOfPermission = array_change_key_case($permissions[strtolower($controller)], CASE_LOWER);
                    return in_array(strtolower($method), array_keys($functionOfPermission)) && $functionOfPermission[strtolower($method)] == true ? true : false;
                } else {
                    return false;
                }
            } catch (\Exception $e) {
                echo ('Error Code: '    . $e->getCode()     . '<br>');
                echo ('Error: '         . $e->getMessage()  . '<br>');
                echo ('Line: '          . $e->getLine()     . '<br>');
                echo ('File: '          . $e->getFile()     . '<br>');
                exit();
            }
        }

        public function changPage($controller, $method, $param = array())
        {

            if (strlen($controller) > 0 & strlen($method) > 0){
                if(count($param) == 0){
                    header('location:index.php?controller=' . $controller . '&method=' . $method);
                }else{
                    $str_param = '';
                    foreach ($param as $key => $value) {
                        $str_param .= 'param[]=' . $value . '&';
                    }
                    header('location:index.php?controller=' . $controller . '&method=' . $method . '&' . $str_param);
                }
            }else{
                throw new \Exception('Controller Hoặc Method Không Được Trống', ERRNO_DATA_INPUT);
            }
                $url = 'location:index.php?controller=';
        }
    } // end class
} // end namespace