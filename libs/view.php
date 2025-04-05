<?php

class View
{
    public function __construct()
    {
    }

    public function render(string $view): void
    {
        $viewFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
        if (file_exists($viewFile)) {
            require VIEWS_PATH . $view . '.php';
        } else {
            trigger_error("La vista '$view' no fue encontrada en '$viewFile'.", E_USER_WARNING);
        }
    }
}
