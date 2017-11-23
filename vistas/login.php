<?php

print('
  <h3 class="p_5" style="padding-top: 50px;">Iniciar Sesión</h3>
  <div class="divlogin">
    <form class="item" method="POST" >
      <div class="p_5">
        <input type="text" name="user" placeholder="Email" required>
      </div>
      <div class="p_5">
        <input type="password" name="pass" placeholder="Contraseña" required>
      </div>
      <div class="p_5">
        <input type="submit" class="button" value="Entrar">
      </div>
    </form>
  </div>
  
');
    
if( isset($_GET['error']) ){
    $template = '
          <div class="container">
            <p class="item error">%s</p>
          </div>
    ';
    printf($template, $_GET['error']);
}
  