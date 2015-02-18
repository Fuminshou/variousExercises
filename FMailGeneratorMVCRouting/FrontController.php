<?php

require_once 'Mail.php';
require_once 'Model.php';
require_once 'Controller.php';
require_once 'Router.php';

class FrontController {

    public function __construct(){
        
    }

    public function output($view) {
        
        //computa qualcosa con la view e un template (?)
        $qualcosa = $view;
        
        return $qualcosa;
    }

}
