<?php

class DistritoController {
    private $model;

    public function __construct() {
        $this->model = new DistritoModel();
        
    }

    public function set($distrito_data = array() ){
        return $this->model->set($distrito_data);
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