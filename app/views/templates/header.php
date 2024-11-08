<header>
    <div class="wrapper">
        <div class="logo"><img src="public/img/logo.png" alt=""></div>
        <nav class="enlaces">
            <a href="index.php?controller=Obres&action=mostrarObres" <?php if ($_SESSION["controlador"] === "ObresController") { echo "class='pag-sel'"; }?>>Obres</a>
            <a href="index.php?controller=Exposicions&action=mostrarExposicions" <?php if ($_SESSION["controlador"] === "ExposicionsController") { echo "class='pag-sel'"; }?>>Exposicions</a>
            <a href="index.php?controller=Restauracions&action=mostrarRestauracions" <?php if ($_SESSION["controlador"] === "RestauracionsController") { echo "class='pag-sel'"; }?>>Restauracions</a>
        </nav>
        <nav class="usuari">
            <div class="paste-button">
                <button class="button"><?php echo $_SESSION['usuari']?> &nbsp; ▼</button>
                <div class="dropdown-content">
                    <?php 
                    if ($_SESSION['rol'] == "admin") {
                        echo "<a href='index.php?controller=OpcionsGestions&action=mostrarOpcionsGestions'>Gestions</a>";
                    }
                    ?>
                  <a href="index.php?controller=Logout&action=cerrarSesion">Tancar sessio</a>
                </div>
            </div>
            <img src="public/img/logo-usuario.png" alt="Logo usuari" class="logo-usuari">
        </nav>
    </div>
</header>