<?php
        //if ($_SESSION['rol'] != "admin") {
            //echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        //}
        ?>

<div class="barra-busqueda"><img src="public/img/icono-lupa.png" alt=""><input type="text" placeholder="Cerca"></div>
    <table>
        <tr>
            <th>ID Usuari</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Accions</th>
        </tr>
        <?php

        if ($users) {
        // Inicializar contador para alternar colores
            $row_counter = 0;

        // Imprimir cada fila de la base de datos
            foreach ($users as $user) {
            // Alternar clase según la fila
            
                $row_class = ($row_counter % 2 == 0) ? "row-white" : "row-blue";

                echo "<tr class='$row_class'>";
                    echo "<td>" . $user["ID_Usuari"] . "</td>";
                    echo "<td>" . $user["Nom_Usuari"] . "</td>";
                    echo "<td>" . $user["Email"] . "</td>";
                    echo "<td>" . $user["Rol"] . "</td>";
                    echo "<td class='imagenFicha'>";
                            echo "<a href='index.php&controller'><img src='public/img/icono-lapiz.png' 'alt='Modificar Usuari'></a>";
                            echo "<a href='index.php&controller'><img src='public/img/icono-papelera.png' 'alt='Eliminar Usuari'></a>";
                    echo  "</td>";
                    echo "</tr>";

            // Incrementar contador
            $row_counter++;
        }
    } else {
        echo "<tr><td colspan='5'>No hay registros</td></tr>";
    }

    ?>