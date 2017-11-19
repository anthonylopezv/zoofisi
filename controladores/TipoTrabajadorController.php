<?php

class TipoTrabajadorController {
    private $model;

    public function __construct() {
        $this->model = new TipoTrabajadorModel();
        
    }

    public function set($TipoTrabajador_data = array() ){
        return $this->model->set($TipoTrabajador_data);
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