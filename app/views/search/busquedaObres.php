<?php
header('Content-Type: application/json');

$key = $_GET['key'] ?? '';
$response = array();

$con = new mysqli("localhost", "root", "", "fenosa");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$searchTerm = '%' . $con->real_escape_string($key) . '%';

$sql = "SELECT 
            bp.Num_registro, 
            bp.Fotografia, 
            bp.Baixa, 
            a.nombre AS Autor, 
            bp.Titol, 
            u.Nom AS Nombre_Ubicacion, 
            bp.Any_Final,
            t.tecnica AS Nombre_Tecnica
        FROM 
            bens_patrimonials bp
        INNER JOIN 
            ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
        INNER JOIN 
            vocabulario_autores a ON bp.Autor = a.id
        INNER JOIN
            vocabulario_tecnica t ON bp.Tecnica = t.id
        WHERE 
            CONCAT(bp.Num_registro, ' ', bp.Titol, ' ', a.nombre, ' ', u.Nom, ' ', bp.Any_Final, ' ', t.tecnica) LIKE '$searchTerm'
        ORDER BY 
            bp.Num_Registro ASC";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$con->close();
?>

