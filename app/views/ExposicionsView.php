<div class="extrasTaulaObres">
        <a href='index.php?controller=Exposicions&action=crearExposicio' class='crearRegistreObres'>
            <img src='public/img/icono-mas.png' alt='Icono más'>Donar d'alta
        </a>
        <div class="barra-busqueda">
            <img src="public/img/icono-lupa.png" alt="Lupa">
            <input type="text" name="typeahead" id="search-box" placeholder="Cerca">
        </div>
    </div>
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
                    

                        echo "<tr>";
                        echo "<td>" . $exposicio["Nom_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Data_Inici_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Data_Fi_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Tipus_Expo"] . "</td>";
                        echo "<td>" . $exposicio["Lloc_Exposicio"] . "</td>";
                        echo "<td class='imagenFicha'>";
                            if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico") {
                                echo "<div class='imagen-contenedor'>";
                                echo "<a href='#' class='openPopup' onclick='confirmarDeleteExposicio(".$exposicio['ID_Expo'].")'>";
                                    echo "<img src='public/img/icono-papelera.png' alt='Eliminar exposicio'>";
                                echo "</a>";
                                echo "<a href='index.php?controller=Exposicions&action=editarExposicio&id=".$exposicio['ID_Expo']."'>";
                                    echo "<img src='public/img/icono-lapiz.png' alt='Editar exposicio'>";
                                echo "</a>";
                                echo "<a href='index.php?controller=Exposicions&action=mostrarObresExpuestas&id=".$exposicio['ID_Expo']."'>";
                                    echo "<img src='public/img/obrasExpuestas.png' alt='Veure obres exposades'>";
                                echo "</a>";
                            }
                        echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }
            
            ?>

        </table>
    </div>

<script src="public/js/Confirmaciones.js"></script>