<?php

if ($_POST['r'] == 'tipoTrabajador-add' && $_SESSION['idTipoUsuario'] == 'Administrador' ) {
    print('
        <h2 class="p1">Agregar Tipo de Trabajador</h2>
        <form method="POST" class="item">
            <div class="p_25">
                <input type="text" name="nombre" placeholder="Tipo de trabajador" required>
            </div>
            <div class="p_25">
                <input class="button  add" type="submit" value="Agregar">
                <input type="hidden" name="r" value="tipoTrabajador-add">
                <input type="hidden" name="crud" value="set">
            </div>
        </form>
    ');
}
// elseif ($_POST['r'] == 'tipoTrabajador-add' && 
//         $_SESSION['idTipoUsuario'] == 'administrador' && 
//         $_POST['crud'] == 'set') {
//         //programar la insercion
//         $tipoTrabajador_controller = new TipoUsuarioController();

//         $new_tipoTrabajador = array(
//             'id' => 0,
//             'nombre' => $_POST['nombre']
//         );
//         $tipoTrabajador = $tipoTrabajador_controller->set($new_tipoTrabajador);

//         $template = '
//             <div class="container">
//                 <p class="item  add">Tipo de Trabajador <b>%s</b> salvado</p>
//             </div>
//         ';

//         printf($template, $_POST['nombre']);
// } 
// else {
//     //para generar una vista de no autorizado   
// }
