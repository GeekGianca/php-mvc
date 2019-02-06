<?php
require_once 'controllers/404.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if (empty($url[0])) {
            $arccontroller = 'controllers/main.php';
            require_once $arccontroller;
            $controller = new Main();
            return false;
        }

        $arccontroller = 'controllers/' . $url[0] . '.php';

        if (file_exists($arccontroller)) {
            require_once $arccontroller;
            $controller = new $url[0];
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        } else {
            $controller = new NotFound();
        }
    }
}