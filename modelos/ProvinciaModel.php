<?php
require_once('model.php');

class ProvinciaModel extends model {

    public function set($provincia_data = array() ){
        foreach ($provincia_data as $key => $value){
            // Variables variable
            $$key = $value;
        }
        $this->query = "REPLACE INTO provincia SET id = $id, nombre = '$nombre', idDepartamento=$idDepartamento";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM provincia WHERE id = $id"
                :"SELECT * FROM provincia";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM provincia WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
