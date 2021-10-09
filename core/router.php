<?php
class Router
{
    private static $_controller = DEFAULE_CONTROLLER;
    private static $_method = DEFAULE_METHOD;
    private static $_param = [];

    public static function route($url)
    {
        if (!isset($_SESSION['nguoi_dung']) || !empty($_SESSION['nguoi_dung'])) {

            if (class_exists(self::$_controller)) {

                self::$_controller = new self::$_controller();

                if (method_exists(self::$_controller, self::$_method)) {

                    call_user_func_array(array(self::$_controller, self::$_method), self::$_param);
                } else {

                    exit('Method ' . self::$_method . 'của class ' . self::$_controller . ' không Tồn Tại');
                }
            } else {
                exit('Class ' . self::$_controller . ' Không Tồn Tại');
            }
        } else {

            self::$_controller = isset($url[0]) && !empty($url[0]) ? ucwords($url[0]) : DEFAULE_CONTROLLER;
            unset($url[0]);

            self::$_method = isset($url[0]) && !empty($url[0]) ? ucwords($url[0]) : DEFAULE_METHOD;
            unset($url[0]);

            self::$_param = isset($url) ? $url : [];

            if (class_exists(self::$_controller)) {
                self::$_controller = new self::$_controller();
            } else {
    
                exit('Class ' . self::$_controller . ' Không Tồn Tại');
            }
    
            if (method_exists(self::$_controller, self::$_method)) {
                call_user_func_array(array(self::$_controller, self::$_method), self::$_param);
            } else {
                exit('Method ' . self::$_method . 'của class ' . self::$_controller . ' không Tồn Tại');
            }
        }

        
    }
}
