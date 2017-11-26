<?php
require_once('model.php');

class TipoUsuarioModel extends model {

    public function set($TipoUsuario_data = array() ){
        foreach ($TipoUsuario_data as $key => $value){
            // Variables variable
            $$key = $value;
        }
        $this->query = "REPLACE INTO tipousuario SET id = $id, nombre = '$nombre'";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM tipousuario WHERE id = $id"
                :"SELECT * FROM tipousuario";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM tipousuario WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
