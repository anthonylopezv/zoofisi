<?php

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function set($usuario_data = array() ){
        return $this->model->set($usuario_data);
    }

    public function get( $user = '' ){
        return $this->model->get($user);
    }

    public function del($user = '' ){
        return $this->model->del($user);
    }

    // public function __destruct() {
    //      unset($this);
    // }

    
}