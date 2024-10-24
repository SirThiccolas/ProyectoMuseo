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
        if ($obres) {
            // Inicializar contador para alternar colores
            $row_counter = 0;

            // Imprimir cada fila de la base de datos
            foreach ($obres as $obra) {
                // Alternar clase según la fila
                $row_class = ($row_counter % 2 == 0) ? "row-white" : "row-blue";

                echo "<tr class='$row_class'>";
                echo "<td>" . $obra["Num_registro"] . "</td>";
                echo "<td><img src='public/img-bd/" . $obra["Fotografia"] . "'></td>";
                echo "<td>" . $obra["Titol"] . "</td>";
                echo "<td>" . $obra["Autor"] . "</td>";
                echo "<td>" . $obra["Nombre_Ubicacion"] . "</td>";
                echo "<td>" . $obra["Any_Final"] . "</td>";
                echo "<td class='imagenFicha'>";
                        echo "<div class='imagen-contenedor'>
                            <a href='#' class='openPopup' data-id='".$obra['Num_registro']."'>
                                <img src='public/img/icono-ficha.png' alt='Veure fitxa'>
                            </a>";
                            if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico") {
                                echo "<a href='index.php?controller=Obres&action=editarFicha&id=".$obra['Num_registro']."'>";
                                    echo "<img src='public/img/icono-lapiz.png' alt='Editar fitxa'>";
                                echo "</a>";
                            }
                        echo "</div>";
                    echo "</td>";

                echo "</tr>";
                $row_counter++;
            }
        } else {
            echo "<tr><td colspan='7'>No hay registros</td></tr>";
        }
        ?>
    </table>    
</div>
<div id="popupFicha" class="popup">
    <div class="popup-content">
        <p>¿Quieres ver la ficha básica o la ficha general?</p>
        <button id="fichaBasicaBtn">Ficha Básica</button>
        <button id="fichaGeneralBtn">Ficha General</button>
        <button id="closePopup">Cerrar</button>
    </div>
</div>
<script src="public/js/EleccionFicha.js"></script>
