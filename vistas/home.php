<?php

$template = '
<div class="item">
    <h2>Hola %s, bienvenid@ a zooFISI</h2>
    <h3>Estamos aca para ayudarte en tu trabajo</h3>
    <p>Tu perfil de usuario tiene nivel de <b>%s</b></p>
</div>
    
';

printf(
    $template, 
    $_SESSION['idTrabajador'],
    $_SESSION['idTipoUsuario']
);

