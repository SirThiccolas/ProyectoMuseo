<div class="extrasTaulaRestauracions">
    <a href='index.php?controller=Obres&action=crearObra' class='crearRegistreRestauracions'>
        <img src='public/img/icono-mas.png' alt='Icono mas'>Donar d'alta
    </a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="">
        <input type="text" placeholder="Cerca">
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



<script src="public/js/EleccionFicha.js"></script>
<script src="public/js/Confirmacion.js"></script>