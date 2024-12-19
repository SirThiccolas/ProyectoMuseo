<?php

require_once 'app/models/Users.php';

class LoginController
{
    public function loginForm()
    {
       require_once 'app/views/LoginView.php'; // Si no hay POST, mostrar el formulario de login
    
    }
    public function login(){
        $user = new Users();
        $usuario = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];
        
        $userData = $user->verifyUser($usuario, $contrasenya);
        if ($userData){
            $_SESSION['usuari'] = $userData['Nom_Usuari'];
            $_SESSION['rol'] = $userData['Rol'];
            $_SESSION['id'] = $userData['ID_Usuari'];
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
        } else {
            // Si las credenciales son incorrectas, mostrar un error
            $error = "Usuari o contrasenya incorrectes.";
            require_once 'app/views/LoginView.php'; 
        }
        
    }
}
