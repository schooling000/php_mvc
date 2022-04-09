<?php
 namespace core{

     class User{

        private function isset(){
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

        public function setUserPermissions($permissions)
        {
            $_SESSION['user']['permissions'] = $permissions;
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
            $_SESSION['user']['id']         = null;
            $_SESSION['user']['name']       = null;
            $_SESSION['user']['email']      = null;
            $_SESSION['user']['acount']     = null;
            $_SESSION['user']['role']       = null;
            $_SESSION['user']['roleName']   = null;
            $_SESSION['user']['functions']  = null;
        }

        public function Logged()
        {
            return $this->isset() ? true : false;
        }

        public function haveAccess($controller, $method)
        {
            
        }
        
        public function changPage($controller, $method, $parram = array())
        {
            
            if(strlen($controller) > 0 & strlen($method) > 0 )
            $url = 'location:index.php?controller=' ;
        }

    } // end class
 } // end namespace