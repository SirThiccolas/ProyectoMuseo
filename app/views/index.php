<?php require 'app/views/templates/header.php'; ?>

<div class="main">
    <?php if ($_SESSION['rol'] == "admin" || $_SESSION['rol'] == "tecnico") : ?>
        <a href="app/views/editarRegistres.php" class='editar'><img src='public/img/icono-mas.png' alt='Icono mas'>Editar</a>
    <?php endif; ?>

    <div class="barra-busqueda"><img src="public/img/icono-lupa.png" alt=""><input type="text" placeholder="Cerca"></div>
    <table>
        <tr>
            <th>Nº Registre</th>
            <th>Foto</th>
            <th>Títol</th>
            <th>Autor</th>
            <th>Ubicació</th>
            <th>Datació</th>
        </tr>
        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['Num_registro'] ?></td>
                    <td><?= $row['Fotografia'] ?></td>
                    <td><?= $row['Titol'] ?></td>
                    <td><?= $row['Autor'] ?></td>
                    <td><?= $row['Nombre_Ubicacion'] ?></td>
                    <td><?= $row['Any_Final'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="6">No hay registros</td></tr>
        <?php endif; ?>
    </table>
</div>

<?php require 'app/views/templates/footer.php'; ?>
