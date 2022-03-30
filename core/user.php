<?php
 namespace core{

     class User{

        public function setUser($id, $name, $email, $acount, $role, $roleName)
        {
            $_SESSION['user']['id']         = $id;
            $_SESSION['user']['name']       = $name;
            $_SESSION['user']['email']      = $email;
            $_SESSION['user']['acount']     = $acount;
            $_SESSION['user']['role']       = $role;
            $_SESSION['user']['roleName']   = $roleName;
        }

        public function setUserFunctions($functions)
        {
            $_SESSION['user']['functions'] = $functions;
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
            return !(!isset($_SESSION['user']['id']) || 
                     $_SESSION['user']['id'] == null || 
                     $_SESSION['user']['id'] <= 0) ? true : false;
        }

        public function checkRole($controller, $method)
        {
            
        }
        
        public function changPage($controller, $method, $parram = array())
        {
            $url = 'location:index.php?controller=' ;
        }

    } // end class
 } // end namespace