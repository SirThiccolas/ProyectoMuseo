<div class="main">
        <?php
        if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico" ) {
            echo "<a href='opcionsRegistres.php' class='editar'><img src='public/img/icono-mas.png' alt='Icono mas'>Editar</a>";
        }
        ?>
        <div class="barra-busqueda"><img src="public/img/icono-lupa.png" alt=""><input type="text" placeholder="Cerca"></div>
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
                    echo "<td>" . $obra["Fotografia"] . "</td>";
                    echo "<td>" . $obra["Titol"] . "</td>";
                    echo "<td>" . $obra["Autor"] . "</td>";
                    // Mostrar el nombre de la ubicación en lugar de su ID
                    echo "<td>" . $obra["Nombre_Ubicacion"] . "</td>";
                    echo "<td>" . $obra["Any_Final"] . "</td>";
                    echo "<td class='imagenFicha'><a href='verFicha.php?id=".$obra['Num_registro']."'><img src='public/img/icono-ficha.png' alt='Veure ficha'></a></td>";
                    echo "</tr>";

                    // Incrementar contador
                    $row_counter++;
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }

            ?>

        </table>
    </div>