<?php

declare(strict_types=1);

use app\App;
<<<<<<< HEAD
use app\core\responsive\Responsive;
use app\middleware\ValidateMiddleware;
=======
use app\help\Help;
use app\controller\Users;
use app\middleware\validate\Login_validate;
>>>>>>> 51acd7fce59266461956ab6a56b828986da37793

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
<<<<<<< HEAD
$app->router->get('/',"dsfsdafs");
$app->debug();
=======
<<<<<<< HEAD
$app->router->get('/', array(User_managerment::class, 'view'));
$app->router->post('/login', array(User_managerment::class, 'login'))->middleware(new Validate_login());
=======
$app->router->get('/', array(Users::class, 'index'));
$app->router->post('/login',array(Users::class, 'login'))->middleware(new Login_validate());
>>>>>>> fef022836acf039a22e10e4edf508029311c5e55
>>>>>>> 51acd7fce59266461956ab6a56b828986da37793
$app->run();
