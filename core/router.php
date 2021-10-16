<?php

namespace core {

    class Router
    {
        private static $_controller = DEFAULT_CONTROLLER;
        private static $_method = DEFAULT_METHOD;
        private static $_param = [];

        public static function route($url)
        {
            self::$_controller = isset($url[0]) && !empty($url[0]) ? ucwords($url[0]) : DEFAULT_CONTROLLER;
            unset($url[0]);$url = array_values($url);

            self::$_method = isset($url[0]) && !empty($url[0]) ? $url[0] : DEFAULT_METHOD;
            unset($url[0]); $url = array_values($url);

            self::$_param = isset($url) ? $url : [];

            if(file_exists(ROOT_PATH . DS . 'app' . DS . 'controller' . DS . strtolower(self::$_controller) . '.php')){
                self::$_controller = DS . 'app' . DS . 'controller' . DS . self::$_controller;
                self::$_controller = new self::$_controller();
                if(method_exists(self::$_controller, self::$_method)){
                    call_user_func_array(array(self::$_controller, self::$_method), self::$_param);
                }else{
                    exit('Không tìm thấy method ' .self::$_method. ' trong class ' . get_class(self::$_controller));
                }
            }else{
                exit('Không tìm thấy file controller chứa class ' . (self::$_controller));
            }
        }
    }
}
