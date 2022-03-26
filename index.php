<?php
ob_start();
session_start();

define('ROOT_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

require_once ROOT_PATH . DS . 'lib' . DS . 'help_function.php';
require_once ROOT_PATH . DS . 'config' . DS . 'config.php';

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DS, $class_name);
    //dnd($class_name);
    //echo (ROOT_PATH . DS . strtolower($class_name) . '.php' . '<br>');
    if (file_exists(ROOT_PATH . DS . strtolower($class_name) . '.php')) {
        require_once ROOT_PATH . DS . strtolower($class_name) . '.php';
    } else {
        echo 'Không tìm thấy file chứa Class ';
        exit();
    }
});

try {
    // CREATE VALUEBLE 
    $db         = null;
    $user       = null;
    $url        = null;
    $controller = null;
    $method     = null;
    $param      = array();

    // CREATE CONTROLL USER FOR APP
    $user = new \core\User();


    // CREATE CONNECT TO DB;
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // GET INFOR CONTROLLER, METHOD, PARAM IN URL;
    $url = $_REQUEST;



    // KIỂM TRA NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP CHƯA
    if ($user->Logged()) {
        // NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP
    } else {
        // NGƯỜI DÙNG CHƯA ĐĂNG NHẬP

        // + LẤY THÔNG TIN CONTROLLER, METHOD, PARAM DEFAULT APP
        $controller = ROOT_PATH . DS . 'app' . DS . 'controller' . DS . ucwords(DEFAULT_CONTROLLER);
        $method     = DEFAULT_METHOD;
        $param      = isset($_REQUEST['param']) ? $_REQUEST['param'] : [];

        $controller = new $controller();
        call_user_func_array(array($controller, $method), $param);
        unset($controller);
    }


    // DESTROY URL VALUABLE;
    unset($url);

} catch (\PDOException $e) {
    echo ('Error: ' . $e->getMessage()  . '<br>');
    echo ('Line: '  . $e->getLine()     . '<br>');
    echo ('File: '  . $e->getFile()     . '<br>');
    exit();
} catch (\Exception $e) {
    echo ('Error: ' . $e->getMessage()  . '<br>');
    echo ('Line: '  . $e->getLine()     . '<br>');
    echo ('File: '  . $e->getFile()     . '<br>');
    exit();
} finally {
    unset($db);
    unset($user);

    $db = null;
    $user = null;
}
ob_end_flush();
