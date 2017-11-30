<?php
$tipoTrabajador_controller = new TipoUsuarioController();

if ($_POST['r'] == 'tipoTrabajador-delete' && $_SESSION['idTipoUsuario'] == 'Administrador' && !isset($_POST['crud']) ) {
    
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
            <h2 class="p1">Eliminar Tipo de Trabajador</h2>
            <form method="POST" class="item">
                <div class="p1  f2">
                    ¿Estas seguro de eliminar este Tipo de trabajador:
                    <mark class="p1">%s</mark>?
                </div>
                <div class="p_25">
                    <input class="button  delete" type="submit" value="SI">
                    <input class="button  add" type="button" value="NO" onclick="history.back()">
                    <input type="hidden" name="id" value="%s">
                    <input type="hidden" name="r" value="tipoTrabajador-delete">
                    <input type="hidden" name="crud" value="del">
                </div>
            </form>            
        ';
        printf(
            $template_tipoTrabajador,
            $tipoTrabajador[0]['nombre'],
            $tipoTrabajador[0]['id']
        );
    }
}
elseif ($_POST['r'] == 'tipoTrabajador-delete' && $_SESSION['idTipoUsuario'] == 'Administrador' && $_POST['crud'] == 'del') {
        //programar la insercion
        $tipoTrabajador = $tipoTrabajador_controller->del($_POST['id']);

        $template = '
            <div style="padding-top: 20px;" ></div>
            <div class="container">
                <p class="item  delete">Tipo de Trabajador <b>%s</b> eliminado</p>
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
    //para generar una vista de no autorizado
    $controller = new ViewController();
    $controller -> load_view('error401');   
}
