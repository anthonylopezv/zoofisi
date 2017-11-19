<?php
require_once('model.php');

class TipoTrabajadorModel extends model {

    public function set($TipoTrabajador_data = array() ){
        foreach ($TipoTrabajador_data as $key => $value){
            // Variables variable
            $$key = $value;
        }

        $this->query = "REPLACE INTO tipotrabajador (id,nombre) VALUES ($id,'$nombre')";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT * FROM tipotrabajador WHERE id = $id"
                :"SELECT * FROM tipotrabajador";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM tipotrabajador WHERE id=$id";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
?>