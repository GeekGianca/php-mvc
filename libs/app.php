<?php
require_once '../controllers/error.php';
class App{
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $arccontroller = '../controllers/'.$url[0].'.php';
        if (file_exists($arccontroller)){
            require_once $arccontroller;
            $controller = new $url[0];
            if (isset($url[1])){
                $controller->{$url[1]}();
            }
        } else {
            $controller = new Error();
        }
    }
}