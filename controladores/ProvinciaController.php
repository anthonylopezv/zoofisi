<?php

class ProvinciaController {
    private $model;

    public function __construct() {
        $this->model = new ProvinciaModel();
        
    }

    public function set($provincia_data = array() ){
        return $this->model->set($provincia_data);
    }

    public function get( $id = '' ){
        return $this->model->get($id);
    }

    public function del($id = '' ){
        return $this->model->del($id);
    }

    // public function __destruct() {
    //      unset($this);
    // }

    
}