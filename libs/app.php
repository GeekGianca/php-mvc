<?php
require_once 'controllers/404.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //Cuando ingresa sin definir un controlador
        if (empty($url[0])) {
            $arccontroller = 'controllers/main.php';
            require_once $arccontroller;
            $controller = new Main();
            $controller->loadmodel('main');
            $controller->render();
            return false;
        }

        $arccontroller = 'controllers/' . $url[0] . '.php';

        if (file_exists($arccontroller)) {
            require_once $arccontroller;
            //Se inicia el controlador
            $controller = new $url[0];
            //Se carga el modelo
            $controller->loadModel($url[0]);
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->render();
            }
        } else {
            $controller = new NotFound();
        }
    }
}