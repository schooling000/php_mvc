<?php
class Router{
    private $_controller = DEFAULE_CONTROLLER;
    private $_method = DEFAULE_METHOD;

    public static function route($url){
        $_controller = (isset($url[0]) && !empty($url[0])) 
    }
}