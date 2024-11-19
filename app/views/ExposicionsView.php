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
            <th>Accions</th>
        </tr>

        <?php
        if ($exposicions) {
            foreach ($exposicions as $exposicio) {
                echo "<tr>";
                echo "<td>" . $exposicio["Nom_Expo"] . "</td>";
                echo "<td>" . $exposicio["Data_Inici_Expo"] . "</td>";
                echo "<td>" . $exposicio["Data_Fi_Expo"] . "</td>";
                echo "<td>" . $exposicio["Tipus_Expo"] . "</td>";
                echo "<td>" . $exposicio["Lloc_Exposicio"] . "</td>";
                echo "<td class='imagenFicha'>
                        <div class='imagen-contenedor'>
                            <a href='index.php?controller=Exposicions&action=mostrarObresExpuestas&id=" . $exposicio['ID_Expo'] . "'>
                                <img src='public/img/obrasExpuestas.png' alt='Veure obres exposades'>
                            </a>";
                if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico") {
                    echo "<a href='#' class='openPopup' onclick='confirmarDeleteExposicio(" . $exposicio['ID_Expo'] . ")'>
                            <img src='public/img/icono-papelera.png' alt='Eliminar exposicio'>
                        </a>
                        <a href='index.php?controller=Exposicions&action=editarExposicio&id=" . $exposicio['ID_Expo'] . "'>
                            <img src='public/img/icono-lapiz.png' alt='Editar exposicio'>
                        </a>";
                }
                echo "</div>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay registros</td></tr>";
        }
        ?>
    </table>
</div>

<script>
    // Pasar el rol del usuario a una variable de JavaScript
    const userRole = "<?php echo $_SESSION['rol']; ?>";

    $(document).ready(function() {
        $('#search-box').on('input', function() {
            let query = $(this).val();

            $.get('app/views/search/busquedaExposicions.php', { key: query, full: 1 }, function(data) {
                let tableRows = '';
                if (data.length > 0) {
                    data.forEach(exposicio => {
                        tableRows += `<tr>
                                        <td>${exposicio.Nom_Expo}</td>
                                        <td>${exposicio.Data_Inici_Expo}</td>
                                        <td>${exposicio.Data_Fi_Expo}</td>
                                        <td>${exposicio.Tipus_Expo}</td>
                                        <td>${exposicio.Lloc_Exposicio}</td>
                                        <td class='imagenFicha'>
                                            <div class='imagen-contenedor'>
                                                <a href='index.php?controller=Exposicions&action=mostrarObresExpuestas&id=${exposicio.ID_Expo}'>
                                                    <img src='public/img/obrasExpuestas.png' alt='Veure obres exposades'>
                                                </a>`;
                        if (["admin", "tecnico"].includes(userRole)) {
                            tableRows += `<a href='#' class='openPopup' onclick='confirmarDeleteExposicio(${exposicio.ID_Expo})'>
                                            <img src='public/img/icono-papelera.png' alt='Eliminar exposicio'>
                                          </a>
                                          <a href='index.php?controller=Exposicions&action=editarExposicio&id=${exposicio.ID_Expo}'>
                                            <img src='public/img/icono-lapiz.png' alt='Editar exposicio'>
                                          </a>`;
                        }
                        tableRows += `</div>
                                    </td>
                                  </tr>`;
                    });
                } else {
                    tableRows = "<tr><td colspan='6'>No hay registros</td></tr>";
                }
                $('.taulaExposicions table').html(`
                    <tr>
                        <th>Exposicio</th>
                        <th>Data Inici</th>
                        <th>Data Fi</th>
                        <th>Tipus Exposicio</th>
                        <th>Lloc Exposicio</th>
                        <th>Accions</th>
                    </tr>` + tableRows);
            }, 'json');
        });
    });
</script>

<script src="public/js/Confirmaciones.js"></script>
