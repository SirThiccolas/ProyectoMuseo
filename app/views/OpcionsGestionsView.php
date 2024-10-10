<?php
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
?>
    <div class="opcions-gestions">
        <a href="opcionsUsuaris.php">
            <div>
                <img src="public/img/icono-gestionUsuarios.png" alt="Icono gestion usuarios">
                <h3>Gestio de usuaris</h3>
            </div>
        </a>
        <a href="opcionsCopiesSeguretat.php">
            <div>
                <img src="public/img/icono-copiasSeguridad.png" alt="Icono gestion bienes">
                <h3>Copies de seguretat</h3>
            </div>
        </a>
        <a href="opcionsVocabularis.php">
            <div>
                <img src="public/img/icono-gestionVocabularios.png" alt="Icono gestion vocabularios">
                <h3>Gestio de vocabularis</h3>
            </div>
        </a>
    </div>