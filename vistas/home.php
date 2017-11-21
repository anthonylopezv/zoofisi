<?php
$template = '
<div class="item">
    <h2>Hola %s, bienvenid@ a zooFISI</h2>
</div>
    
';

printf($template, $_SESSION['email']);

