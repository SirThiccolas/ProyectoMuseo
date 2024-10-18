<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}

?>
<div class="esborrarVocabulari">
    <div>
        <h1>Esborrar registre</h1>
        <p>Segur que vols esborrar el registre?</p>
        <form action="index.php?controller=Vocabularis&action=eliminarVocabulari" method="POST">
            <input type="hidden" name="id" value="<?php echo $vocabularioActual['id']; ?>">
            <input type="hidden" name="vocabulario" value="<?php echo $_GET['vocabulari']; ?>">
            <table>
                <tr>
                    <td><input type="radio" name="opcio" value="si">Si</td>
                </tr>
                <tr>
                    <td><input type="radio" name="opcio" value="no">No</td>
                </tr>
            </table>
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>
