<?php

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function set($usuario_data = array() ){
        return $this->model->set($usuario_data);
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