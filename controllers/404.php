<?php
class NotFound extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->view->render('404/index');
    }
}