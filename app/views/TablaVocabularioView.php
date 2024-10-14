<?php
    if ($_SESSION['rol'] != "admin") {
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }
?>

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
                    <td><?php echo $fila[array_keys($fila)[0]]; ?></td>
                <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<a href="index.php?controller=Vocabularis&action=mostrarVocabularis">Volver</a>