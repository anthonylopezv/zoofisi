<?php
require_once('model.php');

class UsuarioModel extends model {

    public function set($usuario_data = array() ){
        foreach ($usuario_data as $key => $value){
            // Variables variable
            $$key = $value;
        }

        $this->query = "REPLACE INTO usuario (id, email, password, idTrabajador, idTipoUsuario)
                        VALUES ($id, '$email', MD5('$password'), '$idTrabajador, '$idTipoUsuario')";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM usuario WHERE id = $id"
                :"SELECT * FROM usuario";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM usuario WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
?>