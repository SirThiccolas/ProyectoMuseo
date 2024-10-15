<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}

?>

<h2>Editar <?php echo ucfirst($_GET['vocabulari']); ?></h2>
<form action="index.php?controller=Vocabularis&action=confirmarEliminarVocabulari" method="POST">
    <input type="hidden" name="id" value="<?php echo $vocabularioActual['id']; ?>">
    <input type="hidden" name="vocabulario" value="<?php echo $_GET['vocabulari']; ?>">

    <label for="opcions">
        <p><input type="radio" name="opcio" value="si">Si</p>
        <p><input type="radio" name="opcio" value="no">No</p>
    </label>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=Vocabularis&action=mostrarVocabularis"><button>Volver</button></a>
