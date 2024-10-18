<?php
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }
?>
<div class="extrasTaulaUsers">
    <a href='index.php?controller=Usuaris&action=crearUser' class='crearRegistreUsers'><img src='public/img/icono-mas.png' alt='Icono mas'>Donar d'alta</a>
    <div class="barra-busqueda"><img src="public/img/icono-lupa.png" alt=""><input type="text" placeholder="Cerca"></div>
</div>
<div class="taulaUsers">
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
                    $row_class = ($row_counter % 2 == 0) ? "row-white" : "row-blue";

                        echo "<tr class='$row_class'>";
                        echo "<td>" . $user["ID_Usuari"] . "</td>";
                        echo "<td>" . $user["Nom_Usuari"] . "</td>";
                        echo "<td>" . $user["Email"] . "</td>";
                        echo "<td>" . $user["Rol"] . "</td>";
                        echo "<td class='imagenFicha'><div>
                                    <a href='index.php?controller=Usuaris&action=editarUser&id=".$user['ID_Usuari']."'><img src='public/img/icono-lapiz.png'></a>
                                    <a href='index.php?controller=Usuaris&action=deleteUser&id=".$user['ID_Usuari']."'><img src='public/img/icono-papelera.png'></a>
                            </div></td>";
                        echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros</td></tr>";
            }
            
            ?>

        </table>
    </div>
