<?php
if (!isset($id) || !isset($resultados)) {
    echo "Error: Les variables no estan definides.";
    echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarVocabularis'>";
}
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }
?>

<div class="extrasTaulaVoc">
    <a href="index.php?controller=Vocabularis&action=mostrarFormularioCrear&id=<?php echo $id; ?>" class="crearRegistreVoc"><img src='public/img/icono-mas.png' alt='Icono mas'>Crear nou registre</a>
    <div class="barra-busqueda">
        <img src="public/img/icono-lupa.png" alt=""><input type="text" placeholder="Cerca">
    </div>
</div>

<div class="gridVoc">   
    <div class="gridVoc-container">
        <table class="tablaVocabulario">
            <thead>
                <tr class="header">
                <?php if ($id == 'datacions'): ?>
                    <th>Datació<div>Datació</div></th>
                    <th>Any Inici<div>Any Inici</div></th>
                    <th>Any Final<div>Any Final</div></th>
                <?php else: ?>
                    <th><?php echo ucfirst($id); ?><div><?php echo ucfirst($id); ?></div></th>
                <?php endif; ?>
                    <th class="accionsTauVoc">Accions<div>Accions</div></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $fila): ?>
                <tr>
                <?php if ($id == 'datacions'): ?>
                    <td><?php echo $fila['datacio']; ?></td>
                    <td><?php echo $fila['any_inici']; ?></td>
                    <td><?php echo $fila['any_final']; ?></td>
                <?php else: ?>
                    <td><?php echo $fila[array_keys($fila)[1]]; ?></td>
                <?php endif; ?>
                    <td>
                        <a href='index.php?controller=Vocabularis&action=editarVocabulari&id=<?php echo $fila['id']?>&vocabulari=<?php echo  $id ?>'><img src='public/img/icono-lapiz.png' alt='Editar vocabulari'></a>
                        <a href='index.php?controller=Vocabularis&action=eliminarVocabulari&id=<?php echo $fila['id']?>&vocabulari=<?php echo  $id ?>'><img src='public/img/icono-papelera.png' alt='Eliminar vocabulari'></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="index.php?controller=Vocabularis&action=mostrarVocabularis"><button>Volver</button></a>
</div>

