<?php

$template = '
<article class="item">
    <h2 class="p1" >Hola %s, bienvenid@ a zooFISI</h2>
    <h3 class="p1" >Estamos aca para ayudarte en tu trabajo</h3>
    <p class="p1  f1_25" >Tu email es <b>%s</b></p>
    <p class="p1  f1_25" >Tu perfil de usuario tiene nivel de <b>%s</b></p>
</article>
    
';

printf(
    $template, 
    $_SESSION['idTrabajador'],
    $_SESSION['email'],
    $_SESSION['idTipoUsuario']
);

