<?php

print('
    <h2 class="p1">GESTIÓN DE TRABAJADORES</h2>
');

$trabajadores_controller = new TrabajadoresController();
$trabajadores = $trabajadores_controller->get();

if (empty($trabajadores)) {
    print('
        <div class="container">
            <p class="item  error">No hay registros en la tabla</p>
        </div>
    ');
} else {
    $template_trabajadores = '
        <div class="item">
            <table>
                <tr>
                    <th>Id</th>
                    <th>DNI</th>
                    <th style="width:120px">Nombres</th>
                    <th style="width:140px">Apellidos</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th style="width:200px">Dirección</th>
                    <th colspan="2">
                        <form method="POST">
                            <input type="hidden" name="r" value="trabajadores-add">
                            <input class="button  add" type="submit" value="Agregar">
                        </form>
                    </th>
                </tr>';
        
        for ($n=0; $n < count($trabajadores); $n++) { 
            $template_trabajadores .= '
                <tr>
                    <td>'. $trabajadores[$n]['idTrabajador'] .'</td>
                    <td>'. $trabajadores[$n]['dni'] .'</td>
                    <td>'. $trabajadores[$n]['nombres'] .'</td>
                    <td>'. $trabajadores[$n]['apellidos'] .'</td>
                    <td>'. $trabajadores[$n]['user'] .'</td>
                    <td>'. $trabajadores[$n]['email'] .'</td>
                    <td>'. $trabajadores[$n]['telefono'] .'</td>
                    <td>'. $trabajadores[$n]['rol'] .'</td>
                    <td>'. $trabajadores[$n]['direccion'] .'</td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="r" value="trabajadores-edit">
                            <input type="hidden" name="idTrabajador" value="'. $trabajadores[$n]['idTrabajador'] .'">
                            <input class="button  edit" type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="r" value="trabajadores-delete">
                            <input type="hidden" name="idTrabajador" value="'. $trabajadores[$n]['idTrabajador'] .'">
                            <input class="button  delete" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            ';
        }        

        $template_trabajadores .= '        
            </table>
        </div>
    ';

    print($template_trabajadores);
}
