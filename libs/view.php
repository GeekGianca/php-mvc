<?php
class View{
    public function __construct()
    {
    }

    function render($param){
        require 'views/'.$param.'.php';
    }
}