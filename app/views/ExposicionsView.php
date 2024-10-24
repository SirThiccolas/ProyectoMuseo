<div class="taulaExposicions">
        <table>
            <tr>
                <th>Exposicio</th>
                <th>Data Inici</th>
                <th>Data Fi</th>
                <th>Tipus Exposicio</th>
                <th>Lloc Exposicio</th>
                <th></th>
            </tr>

            <?php

            if ($exposicions) {
                // Inicializar contador para alternar colores
                $row_counter = 0;

                // Imprimir cada fila de la base de datos
                foreach ($exposicions as $exposicio) {
                    $row_class = ($row_counter % 2 == 0) ? "row-white" : "row-blue";

                        echo "<tr class='$row_class'>";
                        echo "<td>" . $exposicio["Nom_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Data_Inici_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Data_Fi_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Tipus_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Lloc_Exposicio"] . "</td>";
                        echo "<td class='imagenFicha'>";
                        echo "<div class='imagen-contenedor'>
                            <a href='#' class='openPopup' data-id='".$exposicio['ID_Expo']."'>
                                <img src='public/img/icono-ficha.png' alt='Veure fitxa'>
                            </a>";
                            if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico") {
                                echo "<a href='index.php?controller=Exposicions&action=editarExposicio&id=".$exposicio['ID_Expo']."'>";
                                    echo "<img src='public/img/icono-lapiz.png' alt='Editar fitxa'>";
                                echo "</a>";
                            }
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }
            
            ?>

        </table>
    </div>