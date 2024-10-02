<?php

require_once 'app/controllers/LoginController.php';
require_once 'app/controllers/IndexController.php';
require_once 'app/controllers/LogoutController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'index':
        $controller = new IndexController();
        $controller->index();
        break;
    case 'logout':
        $controller = new LogoutController();
        $controller->logout();
        break;
    default:
        echo "Página no encontrada";
}
