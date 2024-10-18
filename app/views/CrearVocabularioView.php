<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}
?>

<div class="formCrearVocabulari">
    <div class='form-container'>
        <h1>Crear nou registre</h1>

        <form action="index.php?controller=Vocabularis&action=crearVocabulari" method="post">
            <input type="hidden" name="vocabulari" value="<?php echo $id; ?>">
            <table>
                <?php if ($id == 'datacions'): ?>
                    <tr>
                        <td><label for="datacio">Datació:</label></td>
                        <td><input type="text" id="datacio" name="datacio" required></td>
                    </tr>
                    <tr>
                        <td><label for="any_inici">Any Inici:</label></td>
                        <td><input type="number" id="any_inici" name="any_inici" required></td>
                    </tr>
                    <tr>
                        <td><label for="any_final">Any Final:</label>
                        <td><input type="number" id="any_final" name="any_final" required></td>
                    </tr>
                <?php elseif ($id == 'autores'): ?>
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" id="nombre" name="nombre" required></td>
                    </tr>
                <?php elseif ($id == 'causasBaja'): ?>
                    <tr>
                        <td><label for="causa">Causa:</label></td>
                        <td><input type="text" id="causa" name="causa" required></td>
                    </tr>
                <?php elseif ($id == 'estatsConservacio'): ?>
                    <tr>
                        <td><label for="estado">Estado:</label></td>
                        <td><input type="text" id="estado" name="estado" required></td>
                    </tr>
                <?php elseif ($id == 'formesIngres'): ?>
                    <tr>
                        <td><label for="forma">Forma:</label></td>
                        <td><input type="text" id="forma" name="forma" required></td>
                    </tr>
                <?php elseif ($id == 'tipusExposicio'): ?>
                    <tr>
                        <td><label for="tipo">Tipo:</label></td>
                        <td><input type="text" id="tipo" name="tipo" required></td>
                    </tr>
                <?php elseif ($id == 'material'): ?>
                    <tr>
                        <td><label for="material">Material:</label></td>
                        <td><input type="text" id="material" name="material" required></td>
                    </tr>
                <?php elseif ($id == 'tecnica'): ?>
                    <tr>
                        <td><label for="tecnica">Tecnica:</label></td>
                        <td><input type="text" id="tecnica" name="tecnica" required></td>
                    </tr>
                <?php endif; ?>
                <tr class="botonesFormVoc">
                    <td><input type="reset" value="Neteja"></td>
                    <td><input type="submit" value="Crear"></td>
                </tr>
            </table>
        </form>

        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=<?php echo $id; ?>">Tornar</a>

        
    </div>
</div>
