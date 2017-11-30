<?php

class DepartamentoController {
    private $model;

    public function __construct() {
        $this->model = new DepartamentoModel();
        
    }

    public function set($departamento_data = array() ){
        return $this->model->set($departamento_data);
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