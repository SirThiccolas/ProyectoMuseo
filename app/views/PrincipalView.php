
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
                <th>Nº Registre</th>
                <th>Foto</th>
                <th>Títol</th>
                <th>Autor</th>
                <th>Ubicació</th>
                <th>Datació</th>
                <th>Ficha</th>
            </tr>
            <?php
            // Generar registros en la tabla de forma estática o mediante PHP (inicialmente vacía)
            if (!empty($obres)) {
                foreach ($obres as $obra) {
                    echo "<tr class='" . ($obra["Baixa"] == "si" ? "row-red" : "") . "'>";
                    echo "<td>" . htmlspecialchars($obra["Num_registro"]) . "</td>";
                    echo "<td><img src='public/img-bd/" . htmlspecialchars($obra["Fotografia"]) . "' alt='Foto de " . htmlspecialchars($obra["Titol"]) . "'></td>";
                    echo "<td>" . htmlspecialchars($obra["Titol"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Autor"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Nombre_Ubicacion"]) . "</td>";
                    echo "<td>" . htmlspecialchars($obra["Nombre_Datacion"]) . "</td>";
                    echo "<td class='imagenFicha'>";
                    echo "<div class='imagen-contenedor'>";
                    echo "<a href='#' class='openPopup' onclick='popupHistoria()' data-id='" . htmlspecialchars($obra['Num_registro']) . "'>";
                    echo "<img src='public/img/icono-ficha.png' alt='Veure fitxa'>";
                    echo "</a>";
                    if ($_SESSION['rol'] === "admin" || $_SESSION['rol'] === "tecnico") {
                        echo "<a href='index.php?controller=Obres&action=editarFicha&id=" . htmlspecialchars($obra['Num_registro']) . "'>";
                        echo "<img src='public/img/icono-lapiz.png' alt='Editar fitxa'>";
                        echo "</a>";
                    }
                    echo "<a href='#' class='openPopup' onclick='confirmarDeleteObra()'>";
                    echo "<img src='public/img/icono-papelera.png' alt='Eliminar obra'>";
                    echo "</a>";
                    echo "</div></td></tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Scripts necesarios -->
    <script src="public/js/EleccionFicha.js"></script>
    <script src="public/js/Confirmacion.js"></script>

    <!-- Script para búsqueda en tiempo real -->
    <script>
        $(document).ready(function(){
            $('#search-box').on('input', function() {
                let query = $(this).val();

                $.get('search.php', { key: query, full: 1 }, function(data) {
                    let tableRows = '';
                    if (data.length > 0) {
                        data.forEach(obra => {
                            tableRows += `<tr${obra.Baixa === 'si' ? ' class="row-red"' : ''}>`;
                            tableRows += `<td>${obra.Num_registro}</td>`;
                            tableRows += `<td><img src='public/img-bd/${obra.Fotografia}' alt='Foto de ${obra.Titol}'></td>`;
                            tableRows += `<td>${obra.Titol}</td>`;
                            tableRows += `<td>${obra.Autor}</td>`;
                            tableRows += `<td>${obra.Nombre_Ubicacion}</td>`;
                            tableRows += `<td>${obra.Nombre_Datacion}</td>`;
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
                            <th>Nº Registre</th>
                            <th>Foto</th>
                            <th>Títol</th>
                            <th>Autor</th>
                            <th>Ubicació</th>
                            <th>Datació</th>
                            <th>Ficha</th>
                        </tr>` + tableRows);
                }, 'json');
            });
        });
    </script>
