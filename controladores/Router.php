<?php
class Router {
    public $route;

    public function __construct($route) {

        $session_options = array (
            // 'use_only_cookies' => 1,
            // // 'auto_start' => 1,
            // 'read_and_close' => true
        );

        if ( !isset($_SESSION) )  session_start($session_options);
        
        if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;
        
        if($_SESSION['ok']) {
            // Aqui va toda la programacion de la aplicacion web
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';

            $controller = new ViewController();

            switch ($this->route) { 
                case 'home':
                    $controller -> load_view('home');
                    break;
                
                case 'animales':
                    $controller -> load_view('animales');
                    break;
                
                case 'trabajadores':
                    $controller -> load_view('trabajadores');
                    break;

                case 'tipotrabajador':
                    if( !isset( $_POST['r'] )) $controller -> load_view('tipotrabajador');
                    elseif ($_POST['r'] == 'tipoTrabajador-add') $controller -> load_view('tipoTrabajador-add');
                    elseif ($_POST['r'] == 'tipoTrabajador-edit') $controller -> load_view('tipoTrabajador-edit');
                    elseif ($_POST['r'] == 'tipoTrabajador-delete') $controller -> load_view('tipoTrabajador-delete');
                    break;    
                
                case 'itinerario':
                    $controller -> load_view('itinerario');
                    break; 
                
                case 'habitad':
                    $controller -> load_view('habitad');
                    break;
                
                case 'zona':
                    $controller -> load_view('zona');
                    break;
                
                case 'salir':
                    $user_session = new SessionController();
                    $user_session -> logout();
                    break;    
                    
                default:
                    $controller -> load_view('error404');
                    break;
            }

        } 
        else {
            if (!isset($_POST['user']) && !isset($_POST['pass'])) {
                // Mostrar un formulario de autenticacion
                $login_form = new ViewController();
                $login_form -> load_view('login');     
            }
            else {
                $user_session = new SessionController();
                $session = $user_session->login($_POST['user'], $_POST['pass']);

                if (empty($session)) {
                    //echo 'El usuario y el password son incorrectos';
                    $login_form = new ViewController();
                    $login_form -> load_view('login');
                    header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password no coinciden');
                }else {
                    //echo 'El usuario y el password son correctos';
                    // var_dump($session);
                    $_SESSION['ok'] = true;

                    $id_controller = new UsuarioController();
                    $id = $id_controller->get();

                    foreach ($id as $row) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['idTrabajador'] = $row['nombres'];
                        $_SESSION['idTipoUsuario'] = $row['nombre'];
                    }

                    header ('Location: ./');
                }
            }
               
        }
        
    }

    // public function __destruct() {
    //     unset($this);
    // }
}
