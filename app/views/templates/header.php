
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
                <p><?php echo $_SESSION['usuari']?></p>
                <a href="index.php?controller=Logout&action=cerrarSesion">Cerrar sesion</a>
                <img src="public/img/logo-usuario.png" alt="Logo usuari">
            </nav>
        </div>
    </header>
