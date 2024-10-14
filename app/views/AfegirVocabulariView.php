<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Vocabulari</title>
</head>
<body>
    <h1>Afegir Vocabulari</h1>
    <form action="ruta_del_controlador" method="post">
        <label for="tipus_vocabulari">Selecciona el tipus de vocabulari:</label>
        <select name="tipus_vocabulari" id="tipus_vocabulari">
            <option value="datacions">Datacions</option>
            <option value="altres_taula">Altres Taula</option>
        </select>

        <div id="datacions_fields" style="display:none;">
            <label for="any_inici">Any Inici:</label>
            <input type="number" name="any_inici" id="any_inici" required>

            <label for="any_final">Any Final:</label>
            <input type="number" name="any_final" id="any_final" required>
        </div>

        <input type="submit" value="Afegir">
    </form>

    <script>
        document.getElementById('tipus_vocabulari').addEventListener('change', function() {
            if (this.value === 'datacions') {
                document.getElementById('datacions_fields').style.display = 'block';
            } else {
                document.getElementById('datacions_fields').style.display = 'none';
            }
        });
    </script>
</body>
</html>
