<?php
require_once('model.php');

class DepartamentoModel extends model {

    public function set($departamento_data = array() ){
        foreach ($departamento_data as $key => $value){
            // Variables variable
            $$key = $value;
        }
        $this->query = "REPLACE INTO departamento SET id = $id, nombre = '$nombre'";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM departamento WHERE id = $id"
                :"SELECT * FROM departamento";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM departamento WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
