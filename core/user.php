<?php
 namespace core{
     class User{
        private static $id = null;
        private static $name = null;
        private static $email = null;
        private static $acount = null;
        private static $role = null;
        private static $roleName = null;
        private static $functions = array();

        public function setUser($id, $name, $email, $acount)
        {
            self::$id       = $id;
            self::$name     = $name;
            self::$email    = $email;
            self::$acount   = $acount;
        }
        
        public function clearUser()
        {
            self::$id       = null;
            self::$name     = null;
            self::$email    = null;
            self::$acount   = null;
        }

        public function Logged()
        {
            return (self::$id == null || self::$id <= 0) ? true : false;
        }
        
        public function changPage($controller, $method, $parram = array())
        {
            $url = 'location:index.php?controller=' ;
        }




     } // end class
 } // end namespace