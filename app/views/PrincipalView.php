<div class="extrasTaulaObres">
    <a href='index.php?controller=Obres&action=crearObra' class='crearRegistreObres'>
        <img src='public/img/icono-mas.png' alt='Icono mas'>Donar d'alta
    </a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="">
        <input type="text" placeholder="Cerca">
    </div>
</div>

<div class="taulaObres">
    <table>
        <tr>
            <th>Nº Registre</th>
            <th>Foto</th>
            <th>Títol</th>
            <th>Autor</th>
            <th>Ubicació</th>
            <th>Datació</th>
            <th>Ficha</th>
        </tr>
        <?php
        if (!empty($obres)) {

            foreach ($obres as $obra) {
                if ($obra["Baixa"] == "si") {
                    echo "<tr class='row-red'>";
                } else {
                    echo "<tr>";
                }
                
                echo "<td>" . htmlspecialchars($obra["Num_registro"]) . "</td>";
                echo "<div class='imagenFicha'>";
                echo "<td><img src='public/img-bd/" . htmlspecialchars($obra["Fotografia"]) . "' alt='Foto de " . htmlspecialchars($obra["Titol"]) . "'></td>";
                echo "</div>";
                echo "<td>" . htmlspecialchars($obra["Titol"]) . "</td>";
                echo "<td>" . htmlspecialchars($obra["Autor"]) . "</td>";
                echo "<td>" . htmlspecialchars($obra["Nombre_Ubicacion"]) . "</td>";
                echo "<td>" . htmlspecialchars($obra["Nombre_Datacion"]) . "</td>";
                echo "<td class='imagenFicha'>";
                echo "<div class='imagen-contenedor'>";
                echo "<a href='#' class='openPopup' data-id='" . htmlspecialchars($obra['Num_registro']) . "'>";
                echo "<img src='public/img/icono-ficha.png' alt='Veure fitxa'>";
                echo "</a>";
                if ($_SESSION['rol'] === "admin" || $_SESSION['rol'] === "tecnico") {
                    echo "<a href='index.php?controller=Obres&action=editarFicha&id=" . htmlspecialchars($obra['Num_registro']) . "'>";
                    echo "<img src='public/img/icono-lapiz.png' alt='Editar fitxa'>";
                    echo "</a>";
                }
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay registros</td></tr>";
        }
        ?>
    </table>
</div>

<div id="popupFicha">
    <div class="popup-content">
        <p>¿Quieres ver la ficha básica o la ficha general?</p>
        <button id="fichaBasicaBtn">Ficha Básica</button>
        <button id="fichaGeneralBtn">Ficha General</button>
        <button id="closePopup">Cerrar</button>
    </div>
</div>

<script src="public/js/EleccionFicha.js"></script>
