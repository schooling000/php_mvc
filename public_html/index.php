<?php

declare(strict_types=1);

use app\App;
use app\help\Help;
use app\controller\Users;
use app\controller\Login;
use app\middleware\validate\Login_middleware;
use app\core\responsive\Responsive;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DS."..");

spl_autoload_register(function ($className) {
    $classPath =  ROOT_PATH . DS . strtolower($className) . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
    } else {
        $responsive = new Responsive();
        $responsive->renderErrorPage(array(
            'message' => 'Không tìm thấy file chứa class: ' . strtolower($className),
            'type' => 'ERROR',
            'locationError' => 'Nơi sẩy ra lổi là hàm autoload'
        ));
        unset($responsive);
        exit;
    }
});


$app = new App();
$app->router->get('/',array(Login::class, 'index'));
$app->router->post('/login', array(Login::class, 'login'))->middleware(new Login_middleware());
$app->run();
$app->debug();
