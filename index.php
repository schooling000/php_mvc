<?php

# KHỞI TẠO PHIÊN LÀM VIỆC
session_start();

# ĐỊNH NGHĨA CÁC HẰNG SỐ TOÀN CỤC
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__));

# LẤY THÔNG TIN TRÊN THANH URL
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];


require_once ROOT_PATH . DS . 'lib' . DS . 'help_function.php';
require_once ROOT_PATH . DS . 'config' . DS . 'config.php';

spl_autoload_register(function ($ClassName) {
    if (file_exists(ROOT_PATH . DS . 'core' . DS . $ClassName . '.php')) {
        require_once ROOT_PATH . DS . 'core' . DS . $ClassName . '.php';
    } elseif (file_exists(ROOT_PATH . DS . 'app' . DS . 'controller' . DS . $ClassName . '.php')) {
        require_once ROOT_PATH . DS . 'app' . DS . 'controller' . DS . $ClassName . '.php';
    } elseif (file_exists(ROOT_PATH . DS . 'app' . DS . 'models' . DS . $ClassName . '.php')) {
        require_once ROOT_PATH . DS . 'app' . DS . 'models' . DS . $ClassName . '.php';
    } elseif (file_exists(ROOT_PATH . DS . 'app' . DS . 'views' . DS . $ClassName . '.php')) {
        require_once ROOT_PATH . DS . 'app' . DS . 'views' . DS . $ClassName . '.php';
    } else {
        echo 'Không Tìm Thấy File Chứa Class Với Tên ' . $ClassName;
    }
});

try {
    $db = new PDO("mysql:host=" . SERVER_DB_DRIVER . ";dbname=" . SERVER_DB_NAME
                  , SERVER_DB_USER
                  , SERVER_DB_PASSWORD);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}

Router::route($url);
