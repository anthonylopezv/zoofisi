<?php
$trabajadores_controller = new TrabajadoresController();

if ($_POST['r'] == 'trabajadores-edit' && $_SESSION['idTipoUsuario'] != 'Administrador' && !isset($_POST['crud']) ) {
    
    $trabajadores = $trabajadores_controller->get($_POST['idTrabajador']);

    if (empty($trabajadores)) {
        $template = '
        <div class="container">
            <p class="item  error">No existe Trabajadores <b>%s</b></p>
        </div>
        <script>
            window.onload = function () {
                reloadPage("trabajadores")
            }
        </script>
        ';
        printf($template, $_POST['idTrabajador']);
    } 
    else {

        $tipoTrabajador_controller = new TipoUsuarioController();
        $tipoTrabajador = $tipoTrabajador_controller->get();
        $tipoTrabajador_select = '';
    
        for ($n=0; $n < count($tipoTrabajador) ; $n++) { 
            $selected = ($trabajadores[0]['nombre'] == $tipoTrabajador[$n]['nombre']) ? 'selected' : '';
            $tipoTrabajador_select .= '<option value="' . $tipoTrabajador[$n]['id'] . '"'. $selected .'>
                                                      ' . $tipoTrabajador[$n]['nombre'] . '
                                       </option>';
        }

        $template_trabajadores = '
            <h2 class="p1">Editar Trabajador</h2>
            <form method="POST" class="item">
                <div style="padding-left: 90px;" class="center"> 
                <div class="item clear p_25">
                    <h2 class="left">Datos Personales</h2>
                    <div class="left p_25">
                        <input class="m_25" type="text" placeholder="id" value="%s" disabled required>
                        <input type="hidden" name="idTrabajador" value="%s">
                    </div> 
                    <input class="floatl m_25" type="text" name="nombres" placeholder="Nombres completo" value="%s">
                    <input class="floatl m_25" type="text" name="apellido_pat" placeholder="Apellido paterno" value="%s">
                    <input class="floatl m_25" type="text" name="apellido_mat" placeholder="Apellido materno" value="%s">
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="dni" placeholder="nro. DNI" value="%s" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="user" placeholder="Usuario" value="%s" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="email" placeholder="Email" value="%s" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="password" name="password" placeholder="Contraseña" value="%s" required>
                </div>
                <div class="left p_25">
                    <select style="height:30px" class="lg2 m_25" name="nombre" placeholder="rol" required>
                        <option value="">rol</option>
                        %s
                    </select>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="telefono" placeholder="Telefono" value="%s" required>
                </div>
                ';

        $distrito_controller = new DistritoController();
                $distrito = $distrito_controller->get();
                $distrito_select = '';
            
                for ($n=0; $n < count($distrito) ; $n++) {
                    $selected = ($trabajadores[0]['dis_nombre'] == $distrito[$n]['dis_nombre']) ? 'selected' : ''; 
                    $distrito_select .= '<option value="' . $distrito[$n]['id'] . '"'. $selected .'>
                                                        ' . $distrito[$n]['dis_nombre'] . '
                                               </option>';
                }
                
        $template_trabajadores .= '
            <div class="clear p_25">
            <h2 class="left">Dirección</h2>
                <input class="floatl m_25" type="text" name="calle" placeholder="calle" value="%s">
                <input class="floatl m_25" type="number" name="nro" placeholder="nro" value="%s">
            <select style="height:30px" class="floatl lg2 m_25" name="dis_nombre" placeholder="Distrito" required>
                <option value="" disabled selected>Distrito</option>
                %s
            </select>
        '; 
        
        $provincia_controller = new ProvinciaController();
        $provincia = $provincia_controller->get();
        $provincia_select = '';
    
        for ($n=0; $n < count($provincia) ; $n++) {
            $selected = ($trabajadores[0]['pro_nombre'] == $provincia[$n]['pro_nombre']) ? 'selected' : ''; 
            $provincia_select .= '<option value="' . $provincia[$n]['id'] . '"'. $selected .'>
                                                      ' . $provincia[$n]['pro_nombre'] . '
                                       </option>';
        }

        $template_trabajadores .= '
            <select style="height:30px" class="floatl lg2 m_25" name="pro_nombre" placeholder="Provincia" required>
                <option value="" disabled selected>Provincia</option>
                %s
            </select>
        ';

        $departamento_controller = new DepartamentoController();
        $departamento = $departamento_controller->get();
        $departamento_select = '';
    
        for ($n=0; $n < count($departamento) ; $n++) {
            $selected = ($trabajadores[0]['dep_nombre'] == $departamento[$n]['dep_nombre']) ? 'selected' : ''; 
            $departamento_select .= '<option value="' . $departamento[$n]['id'] . '"'. $selected .'>
                                                      ' . $departamento[$n]['dep_nombre'] . '
                                       </option>';
        }

        $template_trabajadores .= '
                    <select style="height:30px" class="floatl lg2 m_25" name="dep_nombre" placeholder="Departamento" required>
                        <option value="" disabled selected>Departamento</option>
                        %s
                    </select>
            </div>
            <div class="left  p_25">
                <input class="button  add  m_25  f1_5" type="submit" value="Editar">
                <input type="hidden" name="r" value="trabajadores-edit">
                <input type="hidden" name="crud" value="set">
            </div>
            </div>    
            </form>
        ';

        printf(
            $template_trabajadores,
            $trabajadores[0]['idTrabajador'],
            $trabajadores[0]['idTrabajador'],
            $trabajadores[0]['nombres'],
            $trabajadores[0]['apellido_pat'],
            $trabajadores[0]['apellido_mat'],
            $trabajadores[0]['dni'],
            $trabajadores[0]['user'],
            $trabajadores[0]['email'],
            $trabajadores[0]['password'],
            $tipoTrabajador_select,
            $trabajadores[0]['telefono'],
            $trabajadores[0]['calle'],
            $trabajadores[0]['nro'],
            $distrito_select,
            $provincia_select,
            $departamento_select            

        );
    }
}
elseif ($_POST['r'] == 'trabajadores-edit' && $_SESSION['idTipoUsuario'] != 'Administrador' && $_POST['crud'] == 'set') {
        //programar la insercion
        
        $save_trabajadores = array(
            'id' => $_POST['idTrabajador'],
            'nombres' => $_POST['nombres'],
            'apellido_pat' => $_POST['apellido_pat'],
            'apellido_mat' => $_POST['apellido_mat'],
            'fecha_ingreso' => null,
            'dni' => $_POST['dni'],
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'idTipoUsuario' => $_POST['nombre'],
            'telefono' => $_POST['telefono'],
            'id' => 0,
            'calle' => $_POST['calle'],
            'nro' => $_POST['nro'],
            'idDistrito' => $_POST['dis_nombre'],
            'id' => 0,
            // 'dis_nombre'=> null,
            'idProvincia' => $_POST['pro_nombre'],
            'id' => 0,
            // 'pro_nombre'=> null,
            'idDepartamento' => $_POST['dep_nombre']
        );
        $trabajadores = $trabajadores_controller->set($save_trabajadores);

        $template = '
            <div style="padding-top: 20px;" ></div>
            <div class="container">
                <p class="item  edit">Trabajador <b>%s</b> editado</p>
            </div>
            <script>
                window.onload = function () {
                    // reloadPage("trabajadores")
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
