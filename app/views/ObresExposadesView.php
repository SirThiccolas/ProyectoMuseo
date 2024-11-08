<div class="extrasTaulaRestauracions">
    <a href='index.php?controller=Obres&action=crearObra' class='crearRegistreRestauracions'>
        <img src='public/img/icono-mas.png' alt='Icono mas'>Afegir Obra
    </a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="">
        <input type="text" placeholder="Cerca">
    </div>
</div>

<div class="taulaRestauracions">
    <div class="flex-container">
        <?php
        if (!empty($obresexpo)) {
            foreach ($obresexpo as $obraexpo) { ?>
                <div>
                    <div class="imagen-restuaracion"><img src="public/img-bd/<?php echo $obraexpo["Fotografia"] ?>" alt=""></div>
                    <p>Obra: <?php echo $obraexpo["Autor"] ?></p>
                    <p><?php echo $obraexpo["Titol"] ?></p>
                    <p><?php echo $obraexpo['Data_Inici_Expo']; echo " / "; echo $obraexpo['Data_Fi_Expo'];   ?></p>
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