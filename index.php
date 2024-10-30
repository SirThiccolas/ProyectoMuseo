<?php
session_start();
?>
<!--Controlador frontal: fichero que se encarga de cargarlo absolutamente todo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="shortcut icon" href="public/img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <title>Museu Apel·les Fenosa</title>
</head>
<body>
<?php 
require_once "autoload.php";

   
if (isset($_GET['controller'])){
    $nombreController = $_GET['controller']."Controller";
}
else{
    //Controlador per dedecte
    $nombreController = "LoginController";
}
if (class_exists($nombreController)){
    $controlador = new $nombreController(); 
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action ="loginForm";
    }

    $controlador->$action();   
}else{

    echo "No existe el controlador";
}
