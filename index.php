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
    $message    = null;

    $url        = null;
    $controller = null;
    $method     = null;
    $param      = array();

    // CREATE CONTROLL USER FOR APP
    $user       = new \core\User();
    $message    = new \core\Message();

    // CREATE CONNECT TO DB;
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // GET INFOR CONTROLLER, METHOD, PARAM IN URL;
    $url = $_REQUEST;

    // NGƯỜI DÙNG CHƯA ĐĂNG NHẬP
    if (!$user->Logged()) {
        $controller = DS . 'app' . DS . 'controller' . DS . ucwords(DEFAULT_CONTROLLER);
        $method     = DEFAULT_METHOD;
        $param      = array();
    } else {
        if ($user->haveAccess($url['controller'], $url['method'])) {
            $controller = isset($url['controller']) & !empty($url['controller']) ? DS . 'app' . DS . 'controller' . DS . ucwords($url['controller']) : null;
            unset($url['controller']);

            $method = isset($url['method']) & !empty($url['method']) ? $url['method'] : null;
            unset($url['method']);

            $param = isset($url['param']) ? $url['param'] : array();
            unset($url['param']);
        } else {
            $controller = DS . 'app' . DS . 'controller' . DS . ucwords(DEFAULT_CONTROLLER);
            $method     = DEFAULT_METHOD;
            $param      = array();
            $message->deleteMessage();
            $message->addMessage('form_dang_nhap',MESSAGE_TYPE_ERROR,'Bạn Hiện Chưa Có Quyền Với Chức Năng Này Mời Đăng Nhập');
        }
    }

    $controller = class_exists($controller) ? new $controller($db) : false;
    $method     = $controller !== false && method_exists($controller, $method) ? $method : false;

    if ($controller !== false && $method !== false) {
        call_user_func_array(array($controller, $method), $param);
    } else {
        throw new Exception('Class Dang_nhap hoặc Method Dang_nhap Không Tồn Tại', ERRNO_NOT_FOUND);
    }

    unset($url);
} catch (\PDOException $e) {
    echo ('Error Code: '    . $e->getCode()     . '<br>');
    echo ('Error: '         . $e->getMessage()  . '<br>');
    echo ('Line: '          . $e->getLine()     . '<br>');
    echo ('File: '          . $e->getFile()     . '<br>');
    exit();
} catch (\Exception $e) {
    echo ('Error Code: '    . $e->getCode()     . '<br>');
    echo ('Error: '         . $e->getMessage()  . '<br>');
    echo ('Line: '          . $e->getLine()     . '<br>');
    echo ('File: '          . $e->getFile()     . '<br>');
    exit();
} finally {

    unset($db);
    unset($user);
    unset($message);

    $db         = null;
    $user       = null;
    $message    = null;
}
ob_end_flush();
