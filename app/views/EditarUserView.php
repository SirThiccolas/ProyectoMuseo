<div class='main-formEditarUsuari'>
    <form action='index.php?controller=Usuaris&action=editarUser&id=<?= $user['ID_Usuari'] ?>' method='post' class='form-editarUsuari'>
        <table>
            <tr>
                <td><p>Nom</p><input type='text' name='nom' value='<?= $user['Nom_Usuari'] ?>' required></td>
                <td><p>Email</p><input type='text' name='mail' value='<?= $user['Email'] ?>' required></td>
            </tr>
            <tr>
                <td colspan='2'><p>Rol</p>
                    <select name='rol'>
                        <option value='invitado' <?= $user['Rol'] == 'invitado' ? 'selected' : '' ?>>Convidat</option>
                        <option value='tecnico' <?= $user['Rol'] == 'tecnico' ? 'selected' : '' ?>>Tecnic</option>
                        <option value='admin' <?= $user['Rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                    </select>
                </td>    
            </tr>
            <tr>
                <td colspan='2'><input type='submit' value='Guardar canvis'></td>
            </tr>
        </table>
    </form>    
</div>
