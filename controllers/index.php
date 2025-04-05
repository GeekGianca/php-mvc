<?php
class Index extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function render(): void
    {
        $this->view->render('index/index');
    }
}