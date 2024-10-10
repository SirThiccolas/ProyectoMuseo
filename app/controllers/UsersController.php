<?php

class UsersController
{
    private $modeloUsers;
    public function mostrarUsers()
    {
        require_once 'app/models/User.php';
        $modeloUsers = new User();
        $users = $modeloUsers->getUser();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/UsersView.php';
        require_once 'app/views/templates/footer.html';
    }
}
?>