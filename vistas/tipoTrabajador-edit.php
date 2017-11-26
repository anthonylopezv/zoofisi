<?php
$tipoTrabajador_controller = new TipoUsuarioController();

if ($_POST['r'] == 'tipoTrabajador-edit' && $_SESSION['idTipoUsuario'] == 'Administrador' && !isset($_POST['crud']) ) {
    
    $tipoTrabajador = $tipoTrabajador_controller->get($_POST['id']);

    if (empty($tipoTrabajador)) {
        $template = '
        <div class="container">
            <p class="item  error">No existe el id <b>%s</b></p>
        </div>
        <script>
            window.onload = function () {
                reloadPage("tipotrabajador")
            }
        </script>
        ';
        printf($template, $_POST['id']);
    } 
    else {
        $template_tipoTrabajador = '
            <h2 class="p1">Editar Tipo de Trabajador</h2>
            <form method="POST" class="item">
                <div class="p_25">
                    <input type="text" placeholder="id" value="%s" disabled required>
                    <input type="hidden" name="id" value="%s">
                </div>
                <div class="p_25">
                    <input type="text" name="nombre" placeholder="Tipo de trabajador" value="%s" required>
                </div>
                <div class="p_25">
                    <input class="button  edit" type="submit" value="Editar">
                    <input type="hidden" name="r" value="tipoTrabajador-edit">
                    <input type="hidden" name="crud" value="set">
                </div>
            </form>
        ';
        printf(
            $template_tipoTrabajador,
            $tipoTrabajador[0]['id'],
            $tipoTrabajador[0]['id'],
            $tipoTrabajador[0]['nombre']
        );
    }
}
elseif ($_POST['r'] == 'tipoTrabajador-edit' && $_SESSION['idTipoUsuario'] == 'Administrador' && $_POST['crud'] == 'set') {
        //programar la insercion
        
        $save_tipoTrabajador = array(
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre']
        );
        $tipoTrabajador = $tipoTrabajador_controller->set($save_tipoTrabajador);

        $template = '
            <div style="padding-top: 20px;" ></div>
            <div class="container">
                <p class="item  edit">Tipo de Trabajador <b>%s</b> editado</p>
            </div>
            <script>
                window.onload = function () {
                    reloadPage("tipotrabajador")
                }
            </script>
        ';       
        printf($template, $_POST['nombre']);
} 
else {
    //para generar una vista de no autorizado
    $controller = new ViewController();
    $controller -> load_view('error401');   
}
