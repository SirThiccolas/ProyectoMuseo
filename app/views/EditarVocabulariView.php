<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}

?>

<h2>Editar <?php echo ucfirst($_GET['vocabulari']); ?></h2>
<form action="index.php?controller=Vocabularis&action=actualizarVocabulari" method="POST">
    <input type="hidden" name="id" value="<?php echo $vocabularioActual['id']; ?>">
    <input type="hidden" name="vocabulario" value="<?php echo $_GET['vocabulari']; ?>">

    <?php foreach ($vocabularioActual as $key => $value): ?>
        <?php if ($key !== 'id'): // Excluir el ID de los campos editables ?>
            <label><?php echo ucfirst($key); ?>:</label>
            <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" required>
            <br>
        <?php endif; ?>
    <?php endforeach; ?>

    <button type="submit">Actualizar</button>
</form>
<a href="index.php?controller=Vocabularis&action=mostrarVocabularis"><button>Volver</button></a>
