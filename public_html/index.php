<?php
    declare(strict_types=1);

    use app\App;
    use app\help\Help;

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].DS."..");

    echo "DẤU PHÂN CÁCH THÀNH PHẨN TRONG PATH FILE: ". DS ."<br>";
    echo "ĐƯỜNG DẪN THƯ MỤC GỐC CỦA TRANG WEB: ".ROOT_PATH."<br>";


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
    $app->run();