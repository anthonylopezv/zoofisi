<?php

if ($_POST['r'] == 'trabajadores-add' && $_SESSION['idTipoUsuario'] == 'Administrador' && !isset($_POST['crud']) ) {

    $tipoTrabajador_controller = new TipoUsuarioController();
    $tipoTrabajador = $tipoTrabajador_controller->get();
    $tipoTrabajador_select = '';

    for ($n=0; $n < count($tipoTrabajador) ; $n++) { 
        $tipoTrabajador_select .= '<option value="' . $tipoTrabajador[$n]['id'] . '">
                                                  ' . $tipoTrabajador[$n]['nombre'] . '
                                   </option>';
    }

    

    printf('
        <h2 class="p1">Agregar Trabajador</h2>
        <form  style="background-color: #9E9E9E" method="POST" class="item">
            <div style="padding-left: 90px;" class="center">
                <div class="item clear p_25">
                    <h2 class="left">Datos Personales</h2>
                    <input class="floatl m_25" type="text" name="nombres" placeholder="Nombres completo">
                    <input class="floatl m_25" type="text" name="apellido_pat" placeholder="Apellido paterno">
                    <input class="floatl m_25" type="text" name="apellido_mat" placeholder="Apellido materno">
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="dni" placeholder="nro. DNI" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="user" placeholder="Usuario" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="left p_25">
                    <select style="height:30px" class="lg2 m_25" name="idTipoUsuario" placeholder="rol" required>
                        <option value="" disabled selected>Rol</option>
                        %s
                    </select>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="telefono" placeholder="Telefono" required>
                </div>                
    ',$tipoTrabajador_select);

    $distrito_controller = new DistritoController();
    $distrito = $distrito_controller->get();
    $distrito_select = '';

    for ($n=0; $n < count($distrito) ; $n++) { 
        $distrito_select .= '<option value="' . $distrito[$n]['id'] . '">
                                                  ' . $distrito[$n]['dis_nombre'] . '
                                   </option>';
    }
    printf('
    <div class="clear p_25">
        <h2 class="left">Dirección</h2>
            <input class="floatl m_25" type="text" name="calle" placeholder="calle">
            <input class="floatl m_25" type="number" name="nro" placeholder="nro">
        <select style="height:30px" class="floatl lg2 m_25" name="idDistrito" placeholder="Distrito" required>
            <option value="" disabled selected>Distrito</option>
            %s
        </select>
    ',$distrito_select);

    $provincia_controller = new ProvinciaController();
    $provincia = $provincia_controller->get();
    $provincia_select = '';

    for ($n=0; $n < count($provincia) ; $n++) { 
        $provincia_select .= '<option value="' . $provincia[$n]['id'] . '">
                                                  ' . $provincia[$n]['pro_nombre'] . '
                                   </option>';
    }
    printf('
    <select style="height:30px" class="floatl lg2 m_25" name="idProvincia" placeholder="Provincia" required>
        <option value="" disabled selected>Provincia</option>
        %s
    </select>
    ',$provincia_select);

    $departamento_controller = new DepartamentoController();
    $departamento = $departamento_controller->get();
    $departamento_select = '';

    for ($n=0; $n < count($departamento) ; $n++) { 
        $departamento_select .= '<option value="' . $departamento[$n]['id'] . '">
                                                  ' . $departamento[$n]['dep_nombre'] . '
                                   </option>';
    }
    printf('
                <select style="height:30px" class="floatl lg2 m_25" name="idDepartamento" placeholder="Departamento" required>
                    <option value="" disabled selected>Departamento</option>
                    %s
                </select>
            </div>
            <div class="left  p_25">
                <input class="button  add  m_25  f1_5" type="submit" value="Agregar">
                <input type="hidden" name="r" value="trabajadores-add">
                <input type="hidden" name="crud" value="set">
            </div>
        </div>    
    </form>
    ',$departamento_select);
}
elseif ($_POST['r'] == 'trabajadores-add' && $_SESSION['idTipoUsuario'] == 'Administrador' && $_POST['crud'] == 'set') {
        //programar la insercion
        $trabajadores_controller = new TrabajadoresController();

        $new_trabajadores = array(
            'id' => 0,
            'nombres' => $_POST['nombres'],
            'apellido_pat' => $_POST['apellido_pat'],
            'apellido_mat' => $_POST['apellido_mat'],
            'fecha_ingreso' => null,
            'dni' => $_POST['dni'],
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'idTipoUsuario' => $_POST['idTipoUsuario'],
            'telefono' => $_POST['telefono'],
            'id' => 0,
            'calle' => $_POST['calle'],
            'nro' => $_POST['nro'],
            'idDistrito' => $_POST['idDistrito'],
            'id' => 0,
            // 'dis_nombre'=> null,
            'idProvincia' => $_POST['idProvincia'],
            'id' => 0,
            // 'pro_nombre'=> null,
            'idDepartamento' => $_POST['idDepartamento']
        );
        $trabajadores = $trabajadores_controller->set($new_trabajadores);
        // echo $trabajadores;

        $template = '
            <div style="padding-top: 20px;" ></div>
            <div class="container">
                <p class="item  add">Trabajador <b>%s</b> salvado</p>
            </div>
            <script>
                window.onload = function () {
                    reloadPage("trabajadores")
                }
            </script>
        ';       
        printf($template, $_POST['nombres']);
} 
else {
    //para generar una vista de no autorizado
    $controller = new ViewController();
    $controller -> load_view('error401');   
}




