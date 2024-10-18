<div class="editarVocabulari">
    <div>
        <h1>Editar registre</h1>
        <form action="index.php?controller=Vocabularis&action=actualizarVocabulari" method="POST">
            <input type="hidden" name="id" value="<?php echo $vocabularioActual['id']; ?>">
            <input type="hidden" name="vocabulario" value="<?php echo $_GET['vocabulari']; ?>">
                <table>
                    <?php foreach ($vocabularioActual as $key => $value): ?>
                        <?php if ($key !== 'id'): // Excluir el ID de los campos editables ?>
                            <tr>
                                <td><label><?php echo ucfirst($key); ?>:</label></td>
                                <td><input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" required></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <tr class="botonesFormVoc">
                    <td><input type="reset" value="Neteja"></td>
                    <td><input type="submit" value="Actualitzar"></td>
                </tr>
            </table>
        </form>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=<?php echo $_GET['vocabulari']; ?>">Volver</a>
    </div>
</div>