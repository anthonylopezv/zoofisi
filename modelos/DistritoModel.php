<?php
require_once('model.php');

class DistritoModel extends model {

    public function set($distrito_data = array() ){
        foreach ($distrito_data as $key => $value){
            // Variables variable
            $$key = $value;
        }
        $this->query = "REPLACE INTO distrito SET id = $id, nombre = '$nombre', idProvincia=$idProvincia";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM distrito WHERE id = $id"
                :"SELECT * FROM distrito";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM distrito WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
