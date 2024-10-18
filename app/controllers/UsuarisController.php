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
        if ($_POST) {
            $nomUser = $_POST['nom'];
            $pwdUser = $_POST['contrasenya'];
            $pwd2User = $_POST['contrasenya2'];
            $emailUser = $_POST['mail'];
            $rolUser = $_POST['rol'];

            if ($pwdUser !== $pwd2User) {
                $error = "Les contrasenyes no coincideixen.";
                require_once 'app/views/templates/header.php';
                require_once 'app/views/CrearUserView.php';
                require_once 'app/views/templates/footer.html';
            }

            $crearuser = new Users();
            $confUser = $crearuser->createUser($nomUser, $pwdUser, $emailUser, $rolUser);

            if ($confUser) {
                require_once 'app/views/templates/header.php';
                require_once 'app/views/CrearUserView.php';
                require_once 'app/views/templates/footer.html';
            }
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
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
            $nomUser = $_POST['nom'];
            $emailUser = $_POST['mail'];
            $rolUser = $_POST['rol'];

            $editaruser->updateUser($idUser, $nomUser, $emailUser, $rolUser);

            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
        } else {
            $user = $editaruser->getUserById($idUser);
            
            require_once 'app/views/templates/header.php';
            require_once 'app/views/EditarUserView.php';
            require_once 'app/views/templates/footer.html';
        }
    }
    
    public function deleteUser()
    {
        $eliminaruser = new Users();
        $idUser = $_GET['id'];

        if ($_POST) {
            $opcion = $_POST['opcio'];
            if ($opcion == "si") {
                $eliminaruser->deleteUser($idUser);
                echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
            } else {
                echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Usuaris&action=mostrarUsers'>";
            }
        } else {
            // Validar si el ID de usuario existe
            $user = $eliminaruser->getUserById($idUser);
            if (!$user) {
                echo "No s'ha trobat cap usuari amb aquest ID.";
                echo "<meta http-equiv='refresh' content='2;url=index.php?controller=Usuaris&action=mostrarUsers'>";
            } else {
                require_once 'app/views/templates/header.php';
                require_once 'app/views/EliminarUserView.php';
                require_once 'app/views/templates/footer.html';
            }
        }
    }
}
