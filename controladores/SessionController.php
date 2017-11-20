<?php
class SessionController {
    private $session;

    public function __construct(){
        $this->session = new UsuarioModel();
    }
}