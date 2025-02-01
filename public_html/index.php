<?php
    declare(strict_types=1);

<<<<<<< HEAD
use app\App;
use app\help\Help;
use app\controller\Autheruser;
use app\controller\Home;
=======
    use app\App;
    use app\help\Help;
    use app\middleware\User;
    use app\middleware\Validate;
>>>>>>> 89dd71ea60023f4a2cef223c476d05002f28f2a0

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].DS."..");

    echo "DẤU PHÂN CÁCH THÀNH PHẨN TRONG PATH FILE: ". DS ."<br>";
    echo "ĐƯỜNG DẪN THƯ MỤC GỐC CỦA TRANG WEB: ".ROOT_PATH."<br>";


<<<<<<< HEAD

$app = new App();
$app->router->get('/', array(Autheruser::class, 'view'));
$app->router->get('/login', array(Autheruser::class, 'login'));
$app->router->get('/logout', array(Autheruser::class, 'logout'));

$app->router->get('/home/view', array(Home::class, 'view'))->middleware(new \app\middleware\Autheruser());
$app->debug();
=======
    spl_autoload_register(function($className){
        $class_path = ROOT_PATH.DS.$className.".php";
        if(file_exists(strtolower($class_path))){
            require_once $class_path;
        }else{
            throw new Exception(Help::FILE_NOT_FOUND.$className, 1);
            exit();            
        };
    });

    $app = new App();
    $app->router->get('/','chào bạn');

    $app->run();
>>>>>>> 89dd71ea60023f4a2cef223c476d05002f28f2a0
