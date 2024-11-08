<div class='main-formEditarUsuari'>
    <form action='index.php?controller=Exposicions&action=editarExposicio&id=<?= $expo['ID_Expo'] ?>' method='post' class='form-editarUsuari'>
        <table>
        <tr>
                <td><p>Nom Exposicio</p><input type='text' name='nom_expo' placeholder=<?php echo $expo['Nom_Expo'] ?> required></td>
                <td><p>Data Inici Exposicio</p><input type='text' name='data_inici' placeholder=<?php echo $expo['Data_Inici_Expo'] ?> required></td>
            </tr>
            <tr>
                <td><p>Tipus de Exposicio</p><input type='text' name='tipus_expo' placeholder=<?php echo $expo['Tipus_Expo'] ?> required></td>
                <td><p>Data Final Exposicio</p><input type='text' name='data_fi' placeholder=<?php echo $expo['Data_Fi_Expo'] ?> required></td>
            </tr>
            <tr>
                <td colspan='2'><p>Lloc Exposicio</p><input type='text' name='lloc_expo' placeholder=<?php echo $expo['Lloc_Exposicio'] ?> required></td>    
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
    <a href="index.php?controller=Exposicions&action=mostrarExposicions">Tornar</a>
</div>