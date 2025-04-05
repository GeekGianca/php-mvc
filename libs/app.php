<?php

require_once 'controllers/404.php';

class App
{
    public function __construct()
    {
        $url = $_GET['url'] ?? '';
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $controllerName = $url[0] ?: 'index';
        $controllerFile = 'controllers/' . $controllerName . '.php';
        trigger_error($controllerFile, E_USER_WARNING);
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                $controller->loadModel($controllerName);

                $method = $url[1] ?? 'render';

                if (method_exists($controller, $method)) {
                    // iff has additional parameters (/user/edit/1), send
                    $params = array_slice($url, 2);
                    call_user_func_array([$controller, $method], $params);
                } else {
                    // Fallback render method if not found
                    if (method_exists($controller, 'render')) {
                        $controller->render();
                    } else {
                        $this->show404("Method '$method' not found in controller '$controllerName'.");
                    }
                }
            } else {
                $this->show404("The class '$controllerName' was not found.");
            }
        } else {
            $this->show404("File in controller '$controllerFile' was not found.");
        }
    }

    private function show404(string $message = ''): void
    {
        $controller = new NotFound();
        if (method_exists($controller, 'render')) {
            $controller->render();
        }

        if ($message) {
            trigger_error($message, E_USER_WARNING);
        }
    }
}
