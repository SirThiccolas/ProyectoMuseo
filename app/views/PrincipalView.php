
    <!-- Contenedor de la Barra de búsqueda y botón de creación -->
    <div class="extrasTaulaObres">
        <a href='index.php?controller=Obres&action=crearObra' class='crearRegistreObres'>
            <img src='public/img/icono-mas.png' alt='Icono más'>Donar d'alta
        </a>
        <div class="barra-busqueda">
            <img src="public/img/icono-lupa.png" alt="Lupa">
            <input type="text" name="typeahead" id="search-box" placeholder="Cerca">
        </div>
    </div>

    <!-- Tabla de Obras -->
    <div class="taulaObres">
        <table>
            <tr>
                <th>Foto</th>
                <th>Nº Registre</th>
                <th>Títol</th>
                <th>Autor</th>
                <th>Tecnica</th>
                <th>Ubicació</th>
                <th>Any</th>
                <th>Ficha</th>
            </tr>
            <?php
            if (!empty($obres)) {
                foreach ($obres as $obra) {
                    echo "<tr class='" . ($obra["Baixa"] == "Si" ? "row-red" : "") . "'>";
                    echo "<td><img src='public/img-bd/" . htmlspecialchars($obra["Fotografia"]) . "' alt='Foto de " . htmlspecialchars($obra["Titol"]) . "'></td>";
                    echo "<td>" . htmlspecialchars($obra["Num_registro"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Titol"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Autor"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Nombre_Tecnica"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Nombre_Ubicacion"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Any_Final"]) . "</td>";
                    echo "<td class='imagenFicha'>";
                    echo "<div class='imagen-contenedor'>";
                    echo "<a href='#' class='openPopup' onclick='popupEleccionFicha()' data-id='" . htmlspecialchars($obra['Num_registro']) . "'>";
                    echo "<img src='public/img/icono-ficha.png' alt='Veure fitxa'>";
                    echo "</a>";
                    if ($_SESSION['rol'] != "invitado") {
                        echo "<a href='index.php?controller=Obres&action=editarFicha&id=" . htmlspecialchars($obra['Num_registro']) . "'>";
                            echo "<img src='public/img/icono-lapiz.png' alt='Editar fitxa'>";
                        echo "</a>";
                        echo "<a href='#' class='openPopup' onclick='confirmarDeleteObra(\"" . htmlspecialchars($obra['Num_registro']) . "\", \"" . htmlspecialchars($obra['Fotografia']) . "\")'>";
                        echo "<img src='public/img/icono-papelera.png' alt='Eliminar obra'>";
                        echo "</a>";
                    }
                    echo "</div></td></tr>";
                    ?>
                    <!-- Div de confirmación único para cada obra -->
                    <div id="confirmarDeleteObra_<?php echo htmlspecialchars($obra['Num_registro']); ?>" style="display: none;" class='confirmarDeleteObra'>
                        <div class="popup-content">
                            <div class='izq'>
                                <p>Segur que vols esborrar aquest registre?</p>
                                <button onclick="confirmarDeleteObra('<?php echo htmlspecialchars($obra['Num_registro']); ?>')">Si</button>
                                <button onclick="cerrarPopup('<?php echo htmlspecialchars($obra['Num_registro']); ?>')">No</button>
                            </div>
                            <div class='der'>
                                <img src="public/img-bd/<?php echo htmlspecialchars($obra["Fotografia"]) ?>" alt="Imagen de la obra">
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }
            ?>
        </table>
    </div>
        
    <script>
        $(document).ready(function(){
            $('#search-box').on('input', function() {
                let query = $(this).val();

                $.get('app/views/search/busquedaObres.php', { key: query, full: 1 }, function(data) {
                    let tableRows = '';
                    if (data.length > 0) {
                        data.forEach(obra => {
                            tableRows += `<tr${obra.Baixa === 'Si' ? ' class="row-red"' : ''}>`;
                            tableRows += `<td><img src='public/img-bd/${obra.Fotografia}' alt='Foto de ${obra.Titol}'></td>`;
                            tableRows += `<td>${obra.Num_registro}</td>`;
                            tableRows += `<td>${obra.Titol}</td>`;
                            tableRows += `<td>${obra.Autor}</td>`;
                            tableRows += `<td>${obra.Nombre_Tecnica}</td>`;
                            tableRows += `<td>${obra.Nombre_Ubicacion}</td>`;
                            tableRows += `<td>${obra.Any_Final}</td>`;
                            tableRows += `<td class='imagenFicha'>
                                            <div class='imagen-contenedor'>
                                                <a href='#' class='openPopup' onclick='popupHistoria()' data-id='${obra.Num_registro}'>
                                                    <img src='public/img/icono-ficha.png' alt='Veure fitxa'>
                                                </a>`;
                            if (["admin", "tecnico"].includes("<?php echo $_SESSION['rol']; ?>")) {
                                tableRows += `<a href='index.php?controller=Obres&action=editarFicha&id=${obra.Num_registro}'>
                                                <img src='public/img/icono-lapiz.png' alt='Editar fitxa'>
                                              </a>`;
                            }
                            tableRows += `<a href='#' class='openPopup' onclick=confirmarDeleteObra()>
                                            <img src='public/img/icono-papelera.png' alt='Eliminar obra'>
                                          </a>
                                         </div></td></tr>`;
                        });
                    } else {
                        tableRows = `<tr><td colspan='7'>No hay registros</td></tr>`;
                    }
                    $('.taulaObres table').html(`
                        <tr>
                            <th>Foto</th>
                            <th>Nº Registre</th>
                            <th>Títol</th>
                            <th>Autor</th>
                            <th>Tecnica</th>
                            <th>Ubicació</th>
                            <th>Any</th>
                            <th>Ficha</th>
                        </tr>` + tableRows);
                }, 'json');
            });
        });
    </script>

<script src="public/js/EleccionFicha.js"></script>
<script src="public/js/Confirmaciones.js"></script>