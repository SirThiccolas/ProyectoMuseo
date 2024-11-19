<?php
if (!isset($id) || !isset($resultados)) {
    echo "Error: Les variables no estan definides.";
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarVocabularis'>";
}
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }
?>

<div class="extrasTaulaVoc">
    <a href="index.php?controller=Vocabularis&action=mostrarFormularioCrear&id=<?php echo $id; ?>" class="crearRegistreVoc"><img src='public/img/icono-mas.png' alt='Icono mas'>Crear nou registre</a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="Lupa">
        <input type="text" name="typeahead" id="search-box" placeholder="Cerca">
    </div>
</div>

<div class="gridVoc">   
    <div class="gridVoc-container">
        <table class="tablaVocabulario">
            <thead>
                <tr class="header">
                <?php if ($id == 'datacions'): ?>
                    <th>Datació<div>Datació</div></th>
                    <th>Any Inici<div>Any Inici</div></th>
                    <th>Any Final<div>Any Final</div></th>
                <?php else: ?>
                    <th><?php echo ucfirst($id); ?><div><?php echo ucfirst($id); ?></div></th>
                <?php endif; ?>
                    <th class="accionsTauVoc">Accions<div>Accions</div></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $fila): ?>
                <tr>
                <?php if ($id == 'datacions'): ?>
                    <td><?php echo $fila['datacio']; ?></td>
                    <td><?php echo $fila['any_inici']; ?></td>
                    <td><?php echo $fila['any_final']; ?></td>
                <?php else: ?>
                    <td><?php echo $fila[array_keys($fila)[1]]; ?></td>
                <?php endif; ?>
                    <td>
                        <a href='index.php?controller=Vocabularis&action=editarVocabulari&id=<?php echo $fila['id']?>&vocabulari=<?php echo  $id ?>'><img src='public/img/icono-lapiz.png' alt='Editar vocabulari'></a>
                        <a href='index.php?controller=Vocabularis&action=eliminarVocabulari&id=<?php echo $fila['id']?>&vocabulari=<?php echo  $id ?>'><img src='public/img/icono-papelera.png' alt='Eliminar vocabulari'></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="index.php?controller=Vocabularis&action=mostrarVocabularis"><button>Volver</button></a>
</div>

<script>
    // Pasar el rol del usuario a una variable de JavaScript
    const tablaVoc = "<?php echo $id; ?>";

    $(document).ready(function() {
        $('#search-box').on('input', function() {
            let query = $(this).val();

            $.get('app/views/search/busquedaVocabulari.php', { key: query, full: 1 }, function(data) {
                let tableRows = '';
                if (data.length > 0) {
                    data.forEach(exposicio => {
                        if (["datacions"].includes(tablaVoc)) {
                            tableRows += `<a href='#' class='openPopup' onclick='confirmarDeleteExposicio(${exposicio.ID_Expo})'>
                                            <img src='public/img/icono-papelera.png' alt='Eliminar exposicio'>
                                          </a>
                                          <a href='index.php?controller=Exposicions&action=editarExposicio&id=${exposicio.ID_Expo}'>
                                            <img src='public/img/icono-lapiz.png' alt='Editar exposicio'>
                                          </a>`;
                        } else {
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
                        tableRows += `</div>
                                    </td>
                                  </tr>`;
                        }
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