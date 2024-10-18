<?php

require_once 'app/models/Users.php';

class UsuarisController
{
    public function mostrarUsers()
    {
        $mostraruser = new Users();
        $users = $mostraruser->getUsers();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/UsersView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function crearUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomUser = $_POST['nom'];
            $pwdUser = $_POST['contrasenya'];
            $pwd2User = $_POST['contrasenya2'];
            $emailUser = $_POST['mail'];
            $rolUser = $_POST['rol'];

            // Valida que las contraseñas coincidan
            if ($pwdUser !== $pwd2User) {
                $error = "Les contrasenyes no coincideixen.";
                require_once 'app/views/templates/header.php';
                require_once 'app/views/CrearUserView.php';
                require_once 'app/views/templates/footer.html';
                return;
            }

            $crearuser = new Users();
            $error = $crearuser->createUser($nomUser, $pwdUser, $emailUser, $rolUser);

            if ($error) {
                require_once 'app/views/templates/header.php';
                require_once 'app/views/CrearUserView.php';
                require_once 'app/views/templates/footer.html';
            } else {
                echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
            }
        } else {
            require_once 'app/views/templates/header.php';
            require_once 'app/views/CrearUserView.php';
            require_once 'app/views/templates/footer.html';
        }
    }

    public function editarUser()
    {
        $idUser = $_GET['id'];
        $editaruser = new Users();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Capturar los datos del formulario
            $nomUser = $_POST['nom'];
            $emailUser = $_POST['mail'];
            $rolUser = $_POST['rol'];

            // Actualizar el usuario en la base de datos
            $editaruser->updateUser($idUser, $nomUser, $emailUser, $rolUser);

            // Redirigir de nuevo a la lista de usuarios
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
        } else {
            // Obtener los datos actuales del usuario
            $user = $editaruser->getUserById($idUser);
            
            // Mostrar la vista de edición
            require_once 'app/views/templates/header.php';
            require_once 'app/views/EditarUserView.php';
            require_once 'app/views/templates/footer.html';
        }
    }
    
    public function deleteUser()
    {
        $idUser = $_GET['id'];
        $eliminaruser = new Users();

        // Llamar al método para eliminar al usuario
        $eliminaruser->deleteUser($idUser);

        // Redirigir de nuevo a la lista de usuarios
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>"; 
    }

}
