<?php
if ($_SESSION['rol'] != "admin") {
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
}
?>
<div class="esborrarUsuari">
    <div>
        <h1>Esborrar usuari</h1>
        <p>Segur que vols esborrar l'usuari?</p>
        <form action="index.php?controller=Usuaris&action=deleteUser&id=<?= $_GET['id'] ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <table>
                <tr>
                    <td><input type="radio" name="opcio" value="si">Si</td>
                </tr>
                <tr>
                    <td><input type="radio" name="opcio" value="no" checked>No</td>
                </tr>
            </table>
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>