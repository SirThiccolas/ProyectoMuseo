<div class='tablaCopias'>
    <h1>Copias de Seguridad</h1>
    <table>
        <thead>
            <tr>
                <th>Nom de l'arxiu</th>
                <th>Data de creació</th>
                <th>Acció</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($copias)) : ?>
                <?php foreach ($copias as $copia) : ?>
                    <tr>
                        <td><?php echo $copia['nombre']; ?></td>
                        <td><?php echo $copia['fecha']; ?></td>
                        <td>
                            <a href="backups/<?php echo $copia['nombre']; ?>" download>Descarregar</a>
                            <a href="index.php?controller=CopiasSeguridad&action=eliminarCopia&archivo=<?php echo urlencode($copia['nombre']); ?>" onclick="return confirm('¿Estás seguro de eliminar esta copia?');">Esborrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">No hay copias de seguridad disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <form action="index.php?controller=CopiasSeguridad&action=generarCopia" method="post">
        <a href='index.php?controller=OpcionsGestions&action=mostrarOpcionsGestions'>Tornar</a>    
        <button type="submit">Generar nueva copia</button>
    </form>
</div>