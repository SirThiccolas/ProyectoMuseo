<header>
    <div class="wrapper">
        <div class="logo"><img src="public/img/logo.png" alt=""></div>
        <nav class="enlaces">
            <a href="index.php?controller=Obres&action=mostrarObres">Inici</a>
            <a href="#">Serveis</a>
            <a href="#">Projectes</a>
            <a href="#">Contacte</a>
        </nav>
        <nav class="usuari">
            <div class="paste-button">
                <button class="button"><?php echo $_SESSION['usuari']?> &nbsp; ▼</button>
                <div class="dropdown-content">
                  <a href="index.php?controller=OpcionsGestions&action=mostrarOpcionsGestions">Gestions</a>
                  <a href="index.php?controller=Logout&action=cerrarSesion">Tancar sessio</a>
                </div>
            </div>
            <img src="public/img/logo-usuario.png" alt="Logo usuari" class="logo-usuari">
        </nav>
    </div>
</header>