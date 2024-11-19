<div class="extrasTaulaRestauracions">
    <a href='index.php?controller=Obres&action=crearObra' class='crearRegistreRestauracions'>
        <img src='public/img/icono-mas.png' alt='Icono mas'>Donar d'alta
    </a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="Lupa">
        <input type="text" name="typeahead" id="search-box" placeholder="Cerca">
    </div>
</div>
<div class="taulaRestauracions">
    <div class="flex-container">
        <?php
        if (!empty($restauracions)) {
            foreach ($restauracions as $restauracio) { ?>
                <div>
                    <div class="imagen-restuaracion"><img src="public/img-bd/<?php echo $restauracio["Fotografia"] ?>" alt=""></div>
                    <p>Restaurador/a: <?php echo $restauracio["nom_restaurador"] ?></p>
                    <p><?php echo $restauracio["comentari"] ?></p>
                    <p><?php echo $restauracio['data_inici']; echo " / "; echo $restauracio['data_fi'];   ?></p>
                </div>
            <?php }
        } else {
            echo "<p>No hay registros<p>";
        }
        ?>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#search-box').on('input', function() {
        let query = $(this).val();

        $.get('app/views/search/busquedaRestauracions.php', { key: query }, function(data) {
            let content = '';
            if (data.length > 0) {
                data.forEach(restauracio => {
                    content += `
                        <div>
                            <div class="imagen-restuaracion">
                                <img src="public/img-bd/${restauracio.Fotografia}" alt="">
                            </div>
                            <p>Restaurador/a: ${restauracio.nom_restaurador}</p>
                            <p>${restauracio.comentari}</p>
                            <p>${restauracio.data_inici} / ${restauracio.data_fi}</p>
                        </div>`;
                });
            } else {
                content = "<p>No hay registros</p>";
            }
            $('.flex-container').html(content);
        }, 'json');
    });
});
</script>


<script src="public/js/EleccionFicha.js"></script>
<script src="public/js/Confirmacion.js"></script>