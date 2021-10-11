<?php

namespace core {

    class Router
    {
        private static $_controller = DEFAULT_CONTROLLER;
        private static $_method = DEFAULT_METHOD;
        private static $_param = [];

        public static function route($url)
        {
            if(!isset($_SESSION['nhan_vien']) && empty($_SESSION['nhan_vien'])){
                if(file_exists(ROOT_PATH. DS .self::$_controller . '.php')){
                    self::$_controller = new self::$_controller();
                    if(method_exists(self::$_controller, self::$_method)){
                        call_user_func_array(array(self::$_controller, self::$_method), self::$_param);
                    }else{
                        exit('Không tồn tại method ' . self::$_method . ' trong class ' . get_class(self::$_controller) . '<br>');    
                    }
                }else{
                    exit('Không tồn tại file chứa class ' . self::$_controller . '<br>');
                }
            }else{
                self::$_controller = isset($url[0]) ? ucwords($url[0]) : DEFAULT_CONTROLLER;
                unset($url[0]);

                self::$_method = isset($url[0]) ? ucwords($url[0]) : DEFAULT_METHOD;
                unset($url[0]);

                self::$_param = isset($url) ? $url[0] : [];

            }
        }
    }
}
