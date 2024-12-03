<?php
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }
?>
    <div class="opcions-gestions">
        <a href="index.php?controller=Usuaris&action=mostrarUsers">
            <div>
                <img src="public/img/icono-gestionUsuarios.png" alt="Icono gestion usuarios">
                <h3>Gestio de usuaris</h3>
            </div>
        </a>
        <a href="index.php?controller=CopiasSeguridad&action=mostrarCopias">
            <div>
                <img src="public/img/icono-copiasSeguridad.png" alt="Icono gestion bienes">
                <h3>Copies de seguretat</h3>
            </div>
        </a>
        <a href="index.php?controller=Ubicaciones&action=obtenerArbolUbicaciones">
            <div>
                <img src="public/img/icono-gestionUbicaciones.png" alt="Icono gestion ubicaciones">
                <h3>Ubicacions</h3>
            </div>
        </a>
        <a href="index.php?controller=Vocabularis&action=mostrarVocabularis">
            <div>
                <img src="public/img/icono-gestionVocabularios.png" alt="Icono gestion vocabularios">
                <h3>Gestio de vocabularis</h3>
            </div>
        </a>
    </div>