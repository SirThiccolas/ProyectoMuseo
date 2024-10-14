<?php
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != "admin") {
    header("Location: index.php?controller=Obres&action=mostrarObres");
    exit();
}
?>
<div class='eleccionVocabulario'>
    <h1>Selecciona un Vocabulario</h1>
    <div>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=autores">Autors</a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=causasBaja">Causes de baixa</a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=datacions">Datacions</a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=estatsConservacio">Estats de conservació</a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=formesIngres">Formes d'ingrès</a>
        <a href="index.php?controller=Vocabularis&action=mostrarTabla&id=tipusExposicio">Tipus d'exposició</a>
    </div>
</div>