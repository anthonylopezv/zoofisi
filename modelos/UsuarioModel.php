<?php
require_once('model.php');

class UsuarioModel extends model {

    public function set($usuario_data = array() ){
        foreach ($usuario_data as $key => $value){
            // Variables variable
            $$key = $value;
        }

        $this->query = "REPLACE INTO usuario 
                        SET user = '$user', email = '$email', password = MD5('$password'), 
                        idTrabajador = $idTrabajador, idTipoUsuario = $idTipoUsuario";
        $this->set_query();
    }

    public function get( $user = '' ){
        $this->query = ($user != '')
                ?"SELECT u.user, u.email, u.password, tr.nombres, tu.nombre
                  FROM usuario u
                  JOIN trabajador tr ON u.idTrabajador=tr.id
                  JOIN tipousuario tu ON u.idTipoUsuario=tu.id 
                  WHERE u.user = $user"
                :"SELECT u.user, u.email, u.password, tr.nombres, tu.nombre
                  FROM usuario u
                  JOIN trabajador tr ON u.idTrabajador=tr.id
                  JOIN tipousuario tu ON u.idTipoUsuario=tu.id ";

        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($user = '' ){
        $this->query = "DELETE FROM usuario WHERE user=$user";
        $this->set_query();
    }

    public function validate_usuario($user, $pass){
        $this->query = "SELECT u.user, u.email, u.password, tr.nombres, tu.nombre
                        FROM usuario u
                        JOIN trabajador tr ON u.idTrabajador=tr.id
                        JOIN tipousuario tu ON u.idTipoUsuario=tu.id 
                        WHERE u.user = '$user' AND u.password = MD5('$pass')";
        $this->get_query();

        $data = array();
        
        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;    }

    // public function __destruct() {
    //      unset($this);
    // }
}
