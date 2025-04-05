<?php

class Controller
{
    protected View $view;
    protected object|null $model = null;

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel(string $model): void
    {
        $modelFile = __DIR__ . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $model . 'Model.php';

        if (file_exists($modelFile)) {
            require_once $modelFile;

            $modelClass = $model . 'Model';

            if (class_exists($modelClass)) {
                $this->model = new $modelClass();
            } else {
                trigger_error("La clase del modelo '$modelClass' no existe.", E_USER_WARNING);
            }
        } else {
            trigger_error("El archivo del modelo '$modelFile' no fue encontrado.", E_USER_WARNING);
        }
    }
}
