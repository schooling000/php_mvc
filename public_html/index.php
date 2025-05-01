<?php

declare(strict_types=1);

use app\App;
use app\core\responsive\Responsive;
use app\middleware\ValidateMiddleware;

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
$app->router->get('/',"dsafasdfsadf")->middleware(new ValidateMiddleware());
$app->run();
$app->debug();
