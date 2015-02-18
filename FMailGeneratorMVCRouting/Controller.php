<?php

require_once('Mail.php');
require_once('Model.php');

class Controller {

    public $model;
    public $mail;

    public function __construct() {

        $this->mail = new Mail($_POST);
        $this->model = new Model();
    }

    public function invoke() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->mail->stampaMail() != "") {
            $this->mail->saveToJson();
            return nl2br($this->mail->stampaMail());
        }
    }

    /* NON SERVE PIù ? */
    public function showOldMail() {

        return $this->model->readFromJson();
    }

    public function output($view) {
        if ($view == false) {
            echo "File non trovato :(";
            return;
        }

        require_once $view;
    }
    
//    public function view() {
//
//        $model = new Model();
//
//        $template = file_get_contents('archive.php');
//
//        return $processedTemplate;
//    }

}
