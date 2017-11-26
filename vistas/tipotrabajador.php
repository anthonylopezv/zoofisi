<?php

print('
    <h2 class="p1">GESTIÓN DE TIPO DE TRABAJADORES</h2>
');

$tipoTrabajador_controller = new TipoUsuarioController();
$tipoTrabajador = $tipoTrabajador_controller->get();

if (empty($tipoTrabajador)) {
    print('
        <div class="container">
            <p class="item  error">No hay registros en la tabla</p>
        </div>
    ');
} else {
    $template_tipoTrabajador = '
        <div class="item">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Tipo de trabajador</th>
                    <th colspan="2">
                        <form method="POST">
                            <input type="hidden" name="r" value="tipoTrabajador-add">
                            <input class="button  add" type="submit" value="Agregar">
                        </form>
                    </th>
                </tr>';
        
        for ($n=0; $n < count($tipoTrabajador); $n++) { 
            $template_tipoTrabajador .= '
                <tr>
                    <td>'. $tipoTrabajador[$n]['id'] .'</td>
                    <td>'. $tipoTrabajador[$n]['nombre'] .'</td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="r" value="tipoTrabajador-edit">
                            <input type="hidden" name="id" value="'. $tipoTrabajador[$n]['id'] .'">
                            <input class="button  edit" type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="r" value="tipoTrabajador-delete">
                            <input type="hidden" name="id" value="'. $tipoTrabajador[$n]['id'] .'">
                            <input class="button  delete" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            ';
        }        

        $template_tipoTrabajador .= '        
            </table>
        </div>
    ';

    print($template_tipoTrabajador);
}

