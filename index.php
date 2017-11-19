<?php
require_once('./controladores/Autoload.php');
$autoload = new Autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home';  
$zoofisi = new Router($route); 

// $a = new TipoTrabajadorModel();