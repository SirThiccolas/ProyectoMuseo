<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}
?>

<div class="form-container">
    <h1>Crear nuevo <?php echo ucfirst($id); ?></h1>

    <form action="index.php?controller=Vocabularis&action=crearVocabulari" method="post">
        <input type="hidden" name="vocabulari" value="<?php echo $id; ?>">

        <?php if ($id == 'datacions'): ?>
            <label for="datacio">Datació:</label>
            <input type="text" id="datacio" name="datacio" required>
            <label for="any_inici">Any Inici:</label>
            <input type="number" id="any_inici" name="any_inici" required>
            <label for="any_final">Any Final:</label>
            <input type="number" id="any_final" name="any_final" required>
        <?php elseif ($id == 'autores'): ?>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        <?php elseif ($id == 'causasBaja'): ?>
            <label for="causa">Causa:</label>
            <input type="text" id="causa" name="causa" required>
        <?php elseif ($id == 'estatsConservacio'): ?>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>
        <?php elseif ($id == 'formesIngres'): ?>
            <label for="forma">Forma:</label>
            <input type="text" id="forma" name="forma" required>
        <?php elseif ($id == 'tipusExposicio'): ?>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
        <?php elseif ($id == 'material'): ?>
            <label for="material">Material:</label>
            <input type="text" id="material" name="material" required>
        <?php elseif ($id == 'tecnica'): ?>
            <label for="tecnica">Tecnica:</label>
            <input type="text" id="tecnica" name="tecnica" required>
        <?php endif; ?>

        <button type="submit">Crear nuevo</button>
    </form>

    <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=<?php echo $id; ?>"><button>Volver</button></a>
</div>
