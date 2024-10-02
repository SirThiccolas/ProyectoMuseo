<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Museu Apel·les Fenosa</title>
    <link type="image/x-icon" href="public/img/logo.png" rel="icon" />
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo"><img src="public/img/logo.png" alt=""></div>
            <nav class="enlaces">
                <a href="#">Inicio</a>
                <a href="#">Servicios</a>
                <a href="#">Proyectos</a>
                <a href="#">Contacto</a>
            </nav>
            <nav class="usuario">
                <p><?= $_SESSION['usuari'] ?></p>
                <a href="logout.php">Cerrar sesion</a>
                <img src="public/img/logo-usuario.png" alt="Logo usuari">
            </nav>
        </div>
    </header>
