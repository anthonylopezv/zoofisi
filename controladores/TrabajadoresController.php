<?php

class TrabajadoresController {
    private $model;

    public function __construct() {
        $this->model = new TrabajadoresModel();
    }

    public function set($trabajador_data = array() ){
        return $this->model->set($trabajador_data);
    }

    public function set_edit($trabajador_data = array() ){
        return $this->model->set_edit($trabajador_data);
    }

    public function get( $idTrabajador = '' ){
        return $this->model->get($idTrabajador);
    }

    public function del($id = '' ){
        return $this->model->del($id);
    }

    // public function __destruct() {
    //      unset($this);
    // }

    
}