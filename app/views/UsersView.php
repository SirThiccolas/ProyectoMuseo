<!-- UsersView.php -->
<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}
?>
<div class="extrasTaulaUsers">
<a href='index.php?controller=OpcionsGestions&action=mostrarOpcionsGestions' class='crearRegistreUsers'>
        Tornar
    </a>
    <a href='index.php?controller=Usuaris&action=crearUser' class='crearRegistreUsers'>
        <img src='public/img/icono-mas.png' alt='Icono más'>Donar d'alta
    </a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt="Lupa">
        <input type="text" name="typeahead" id="search-box" placeholder="Cerca">
    </div>
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
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . $user["ID_Usuari"] . "</td>";
                echo "<td>" . $user["Nom_Usuari"] . "</td>";
                echo "<td>" . $user["Email"] . "</td>";
                echo "<td>" . $user["Rol"] . "</td>";
                echo "<td class='imagenFicha'>
                        <div>
                            <a href='index.php?controller=Usuaris&action=editarUser&id=" . $user['ID_Usuari'] . "'>
                                <img src='public/img/icono-lapiz.png'>
                            </a>
                            <a href='#' class='openPopup' onclick='confirmarDeleteUser(\"" . htmlspecialchars($user["ID_Usuari"]) . "\")'>
                                <img src='public/img/icono-papelera.png'>
                            </a>
                        </div>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay registros</td></tr>";
        }
        ?>
    </table>
</div>

<script>
$(document).ready(function(){
    $('#search-box').on('input', function() {
        let query = $(this).val();

        $.get('app/views/search/busquedaUsers.php', { key: query, full: 1 }, function(data) {
            let tableRows = '';
            if (data.length > 0) {
                data.forEach(user => {
                    tableRows += `<tr>
                                    <td>${user.ID_Usuari}</td>
                                    <td>${user.Nom_Usuari}</td>
                                    <td>${user.Email}</td>
                                    <td>${user.Rol}</td>
                                    <td class='imagenFicha'>
                                        <div>
                                            <a href='index.php?controller=Usuaris&action=editarUser&id=${user.ID_Usuari}'>
                                                <img src='public/img/icono-lapiz.png'>
                                            </a>
                                            <a href='#' class='openPopup' onclick='confirmarDeleteUser("${user.ID_Usuari}")'>
                                                <img src='public/img/icono-papelera.png'>
                                            </a>
                                        </div>
                                    </td>
                                  </tr>`;
                });
            } else {
                tableRows = "<tr><td colspan='5'>No hay registros</td></tr>";
            }
            $('.taulaUsers table').html(`
                <tr>
                    <th>ID Usuari</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Accions</th>
                </tr>` + tableRows);
        }, 'json');
    });
});
</script>
<script src="public/js/Confirmaciones.js"></script>
