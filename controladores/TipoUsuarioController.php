<?php

class TipoUsuarioController {
    private $model;

    public function __construct() {
        $this->model = new TipoUsuarioModel();
        
    }

    public function set($TipoUsuario_data = array() ){
        return $this->model->set($TipoUsuario_data);
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