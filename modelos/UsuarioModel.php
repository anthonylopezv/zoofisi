<?php
require_once('model.php');

class UsuarioModel extends model {

    public function set($usuario_data = array() ){
        foreach ($usuario_data as $key => $value){
            // Variables variable
            $$key = $value;
        }

        $this->query = "REPLACE INTO usuario 
                        SET id = $id, email = '$email', password = MD5('$password'), idTrabajador = $idTrabajador, idTipoUsuario = $idTipoUsuario";
        $this->set_query();
    }

    public function get( $id = '' ){
        $this->query = ($id != '')
                ?"SELECT u.id, u.email, u.password, tra.nombres, tu.nombre
                  from usuario AS u
                  JOIN trabajador AS tra ON u.idTrabajador=tra.id
                  JOIN tipousuario AS tu ON u.idTipoUsuario=tu.id 
                  WHERE u.id = $id"
                :"SELECT u.id, u.email, u.password, tra.nombres, tu.nombre
                  from usuario AS u
                  JOIN trabajador AS tra ON u.idTrabajador=tra.id
                  JOIN tipousuario AS tu ON u.idTipoUsuario=tu.id";

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

    public function validate_usuario($user, $pass){
        $this->query = "SELECT * FROM usuario WHERE email='$user'AND password= MD5('$pass')";
        $this->get_query();

        $data = array();
        
        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
?>