<?php

require_once 'Model.php';

class Controller {

    private $model;

    public function getName() {
        return 'Controller';
        //In the real world this may well be get_class($this), and this method defined in a parent class.
    }

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function textClicked() {
        $this->model->text = 'Text Updated';
    }

}

