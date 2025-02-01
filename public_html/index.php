<?php

use app\App;
use app\help\Help;
use app\controller\Autheruser;
use app\controller\Home;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DS . '..' . DS);
define('HOST_NAME', 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']);

spl_autoload_register(function ($className) {
    $path = ROOT_PATH . str_replace('\\', DS, strtolower($className . '.php'));
    if (file_exists($path)) {
        require_once $path;
    } else {
        Help::displayError([
            'type' => 'error',
            'message' => 'Không tìm thấy file chứa class: ' . $className
        ]);
    }
});

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$app = new App();
$app->router->get('/', array(Autheruser::class, 'view'));
$app->router->get('/login', array(Autheruser::class, 'login'));
$app->router->get('/logout', array(Autheruser::class, 'logout'));

$app->router->get('/home/view', array(Home::class, 'view'))->middleware(new \app\middleware\Autheruser());
$app->debug();
