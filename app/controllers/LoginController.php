<?php

require_once 'app/models/User.php';

class LoginController
{
    public function login()
    {
        session_start();
        
        if ($_POST) {
            $user = new User();
            $usuario = $_POST['usuari'];
            $contrasenya = $_POST['contrasenya'];
            
            $userData = $user->verifyUser($usuario, $contrasenya);
            
            if ($userData) {
                $_SESSION['usuari'] = $userData['Nom_Usuari'];
                $_SESSION['rol'] = $userData['Rol'];

                // Redirigir a la página principal según la estructura MVC
                header("Location: index.php?controller=index&action=index");
                exit;
            } else {
                // Si las credenciales son incorrectas, mostrar un error
                $error = "Usuari o contrasenya incorrectes.";
                require_once 'app/views/login.php'; // Cargar la vista del login
            }
        } else {
            require_once 'app/views/login.php'; // Si no hay POST, mostrar el formulario de login
        }
    }
}
