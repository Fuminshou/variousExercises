<?php

require_once('Mail.php');
require_once('model.php');

class Controller {
    public $model;
    public $mail;

    public function __construct() {
        $this->mail = new Mail($_POST);
        $this->model = new Model();
    }

    public function invoke() {
        if($_SERVER['REQUEST_METHOD']=='POST' && $this->mail->stampaMail() != ""){
            $this->mail->saveToJson();
            return nl2br($this->mail->stampaMail());
        }
    }
    
    public function showOldMail() {
        return $this->model->readFromJson();
    }

    
    public function faiQualcosa() {
        
        $data = [1,2,3,4,5];
        
        $model = new Model();
        
        return $this->render('faiQualcosa.php', $model);
    }
}
