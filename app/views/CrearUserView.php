<div class='main-formCrearUsuari'>
    <form action='index.php?controller=Usuaris&action=crearUser' method='post' class='form-crearUsuari'>
        <table>
            <tr>
                <td><p>Nom</p><input type='text' name='nom' placeholder='Paco' required></td>
                <td><p>Contrasenya</p><input type='password' name='contrasenya' placeholder='Paquito123' required></td>
            </tr>
            <tr>
                <td><p>Email</p><input type='text' name='mail' placeholder='pacogonzalez@gmail.com' required></td>
                <td><p>Torna a escriure la contrasenya</p><input type='password' name='contrasenya2' placeholder='Paquito123' required></td>
            </tr>
            <tr>
                <td colspan='2'><p>Rol</p>
                    <select name='rol'>
                        <option value='invitado'>Convidat</option>
                        <option value='tecnico'>Tecnic</option>
                        <option value='admin'>Administrador</option>
                    </select>
                </td>    
            </tr>
            <?php if (!empty($error)) : ?>
            <p class='error'><?= $error ?></p>
            <?php endif; ?>
            <tr>
                <td colspan='2'><input type='submit' value='Confirmar'></td>
            </tr>
        </table>
    </form>    
</div>