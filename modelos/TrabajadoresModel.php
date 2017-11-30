<?php
require_once('model.php');

class TrabajadoresModel extends model {

    public function set($trabajador_data = array() ){
        foreach ($trabajador_data as $key => $value){
            // Variables variable
            $$key = $value;
        }

        $this->query = "REPLACE INTO usuario 
                        SET user = '$user', email = '$email', password = MD5('$password'), 
                        idTrabajador = $idTrabajador, idTipoUsuario = $idTipoUsuario";
        $this->set_query();
    }

    public function get( $idTrabajador = '' ){
        $this->query = ($idTrabajador != '')
                ?"SELECT td.idTrabajador, tra.dni, tra.nombres, CONCAT(tra.apellido_pat,' ',tra.apellido_mat) AS apellidos,
                    u.user,u.email,  tra.telefono,tu.nombre AS rol,
                    CONCAT(d.calle,' ',d.nro,' - ',dis.nombre,' - ',pro.nombre) AS direccion
                    FROM ((((((trabajador_direccion td
                    INNER JOIN trabajador tra ON td.idTrabajador=tra.id)
                    INNER JOIN usuario u ON tra.id=u.idTrabajador)
                    INNER JOIN tipousuario tu ON u.idTipoUsuario=tu.id)
                    INNER JOIN direccion d ON td.idDireccion=d.id)
                    INNER JOIN distrito dis ON d.idDistrito=dis.id)
                    INNER JOIN provincia pro ON dis.idProvincia=pro.id) 
                    WHERE td.idTrabajador = $idTrabajador"
                :"SELECT td.idTrabajador, tra.dni, tra.nombres, CONCAT(tra.apellido_pat,' ',tra.apellido_mat) AS apellidos,
                         u.user,u.email,  tra.telefono,tu.nombre AS rol,
                         CONCAT(d.calle,' ',d.nro,' - ',dis.nombre,' - ',pro.nombre) AS direccion
                    FROM ((((((trabajador_direccion td
                    INNER JOIN trabajador tra ON td.idTrabajador=tra.id)
                    INNER JOIN usuario u ON tra.id=u.idTrabajador)
                    INNER JOIN tipousuario tu ON u.idTipoUsuario=tu.id)
                    INNER JOIN direccion d ON td.idDireccion=d.id)
                    INNER JOIN distrito dis ON d.idDistrito=dis.id)
                    INNER JOIN provincia pro ON dis.idProvincia=pro.id)";

                    


        $this->get_query();
        
        $num_rows = count($this->rows);
        
        $data = array();

        foreach ($this->rows as $key => $value){    
            array_push($data, $value);

        }
        return $data;
    }
    
    public function del($id = '' ){
        $this->query = "DELETE FROM usuario WHERE user=$user";
        $this->set_query();
    }

    // public function __destruct() {
    //      unset($this);
    // }
}
