<?php

class IndexController
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['usuari'])) {
            header("Location: login.php");
            exit;
        }

        require_once 'app/models/User.php';
        $userModel = new User();
        $data = $userModel->getItems();
        require_once 'app/views/index.php';
    }
}
