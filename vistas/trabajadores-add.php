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
                    <input class="floatl m_25" placeholder="Nombres completo">
                    <input class="floatl m_25" placeholder="Apellido paterno">
                    <input class="floatl m_25" placeholder="Apellido materno">
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="nombre" placeholder="User" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="nombre" placeholder="email" required>
                </div>
                <div class="left p_25">
                    <input class="m_25" type="text" name="nombre" placeholder="password" required>
                </div>
                <div class="left p_25">
                    <select style="height:30px" class="floatl lg2 m_25" required>
                        <option value="" disabled selected>Rol</option>
                        %s
                    </select>
                </div>                
    ',$tipoTrabajador_select);

    $distrito_controller = new DistritoController();
    $distrito = $distrito_controller->get();
    $distrito_select = '';

    for ($n=0; $n < count($distrito) ; $n++) { 
        $distrito_select .= '<option value="' . $distrito[$n]['id'] . '">
                                                  ' . $distrito[$n]['nombre'] . '
                                   </option>';
    }
    printf('
    <div class="clear p_25">
    <h2 class="left">Dirección</h2>
    <input class="floatl m_25" placeholder="calle">
    <input class="floatl m_25" placeholder="nro">
    <select style="height:30px" class="floatl lg2 m_25" required>
        <option value="" disabled selected>Distrito</option>
        %s
    </select>
    ',$distrito_select);

    $provincia_controller = new ProvinciaController();
    $provincia = $provincia_controller->get();
    $provincia_select = '';

    for ($n=0; $n < count($provincia) ; $n++) { 
        $provincia_select .= '<option value="' . $provincia[$n]['id'] . '">
                                                  ' . $provincia[$n]['nombre'] . '
                                   </option>';
    }
    printf('
    <select style="height:30px" class="floatl lg2 m_25" required>
    <option value="" disabled selected>Provincia</option>
    %s
</select>
    ',$provincia_select);

    $departamento_controller = new DepartamentoController();
    $departamento = $departamento_controller->get();
    $departamento_select = '';

    for ($n=0; $n < count($departamento) ; $n++) { 
        $departamento_select .= '<option value="' . $departamento[$n]['id'] . '">
                                                  ' . $departamento[$n]['nombre'] . '
                                   </option>';
    }
    printf('
    <select style="height:30px" class="floatl lg2 m_25" required>
    <option value="" disabled selected>Departamento</option>
    %s
</select>
</div>

<div class="left  p_25">
    <input class="button  add  m_25  f1_5" type="submit" value="Agregar">
    <input type="hidden" name="r" value="tipoTrabajador-add">
    <input type="hidden" name="crud" value="set">
</div>
</div>    
</form>
    ',$departamento_select);
}
// elseif ($_POST['r'] == 'tipoTrabajador-add' && $_SESSION['idTipoUsuario'] == 'Administrador' && $_POST['crud'] == 'set') {
//         //programar la insercion
//         $tipoTrabajador_controller = new TipoUsuarioController();

//         $new_tipoTrabajador = array(
//             'id' => 0,
//             'nombre' => $_POST['nombre']
//         );
//         $tipoTrabajador = $tipoTrabajador_controller->set($new_tipoTrabajador);

//         $template = '
//             <div style="padding-top: 20px;" ></div>
//             <div class="container">
//                 <p class="item  add">Tipo de Trabajador <b>%s</b> salvado</p>
//             </div>
//             <script>
//                 window.onload = function () {
//                     reloadPage("tipotrabajador")
//                 }
//             </script>
//         ';       
//         printf($template, $_POST['nombre']);
// } 
// else {
//     //para generar una vista de no autorizado
//     $controller = new ViewController();
//     $controller -> load_view('error401');   
// }




