<?php

declare(strict_types=1);

use app\App;
use app\help\Help;
use app\middleware\User;
use app\middleware\user_management\Validate_login;
use app\controller\Home;
use app\controller\User_managerment;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DS . "..");

// echo "DẤU PHÂN CÁCH THÀNH PHẨN TRONG PATH FILE: ". DS ."<br>";
// echo "ĐƯỜNG DẪN THƯ MỤC GỐC CỦA TRANG WEB: ".ROOT_PATH."<br>";


spl_autoload_register(function ($className) {
    $class_path = ROOT_PATH . DS . $className . ".php";
    if (file_exists(strtolower($class_path))) {
        require_once $class_path;
    } else {
        throw new Exception(Help::FILE_NOT_FOUND . $className, 1);
        exit();
    };
});

$app = new App();
$app->router->get('/', array(User_managerment::class, 'view'));
$app->router->get('/login', array(User_managerment::class, 'login'))->middleware(new Validate_login());
$app->run();
    // $app->router->debug();
