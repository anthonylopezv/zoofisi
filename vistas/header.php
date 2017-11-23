<?php
print('
<!doctype html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <meta charset="UTF-8">
  <title>zooFISI</title>
  <link rel="shortcut icon" href="./public/imagenes/favicon.png" type="image/png">
  <link rel="stylesheet" href="./public/css/responsimple.min.css">
  <link rel="stylesheet" href="./public/css/zoofisi.css">
  
</head>
<body>
  <header class="container-full  center">
      <div class="item  i-b  v-middle  ph12  lg2">
        <h1 class="logo">zooFISI</h1>
      </div>
');

if($_SESSION['ok']){
  print('
    <nav class="item  i-b  v-middle  ph12  lg10  menu">
      <ul class="container">
        <li class="nobullet  item  inline"><a href="./">Inicio</a></li>
        <li class="nobullet  item  inline"><a href="animales">Animales</a></li>
        <li class="nobullet  item  inline"><a href="trabajadores">Trabajadores</a></li>
        <li class="nobullet  item  inline"><a href="tipotrabajador">Tipo de Trabajador</a></li>
        <li class="nobullet  item  inline"><a href="itinerario">Itinerario</a></li>
        <li class="nobullet  item  inline"><a href="habitad">Hábitad</a></li>
        <li class="nobullet  item  inline"><a href="zona">Zona</a></li>
        <li class="nobullet  item  inline"><a href="salir">Salir</a></li>
      </ul>
    </nav>
  ');
}

print('
  </header>
    <main  class="container  center  main">
');
      
  