<?php

require_once 'Model.php';

class View {

    private $model;
    private $route;

    public function __construct($route, Model $model) {
        $this->route = $route;
        $this->model = $model;
    }

    public function output() {
        return '<a href="app.php?route=' . $this->route . '&action=textclicked">' . $this->model->text . '</a>';
    }

}
