<?php
header('Content-Type: application/json');

$key = $_GET['key'] ?? '';
$response = array();

$con = new mysqli("localhost", "root", "", "fenosa");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$searchTerm = '%' . $key . '%';

if (isset($_GET['full']) && $_GET['full'] === '1') {
    // Obtener detalles completos de la obra seleccionada
    $stmt = $con->prepare("SELECT 
                bp.Num_registro, 
                bp.Fotografia, 
                bp.Baixa, 
                a.nombre AS Autor, 
                bp.Titol, 
                u.Nom AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion
            FROM 
                bens_patrimonials bp
            INNER JOIN 
                ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
            INNER JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            INNER JOIN 
                vocabulario_datacions d ON bp.Datacio = d.id
            WHERE Titol LIKE ?
            ORDER BY bp.Num_Registro ASC");
    $stmt->bind_param("s", $searchTerm);
} else {
    // Búsqueda para el autocompletado
    $stmt = $con->prepare("SELECT 
                bp.Num_registro, 
                bp.Fotografia, 
                bp.Baixa, 
                a.nombre AS Autor, 
                bp.Titol, 
                u.Nom AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion
            FROM 
                bens_patrimonials bp
            INNER JOIN 
                ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
            INNER JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            INNER JOIN 
                vocabulario_datacions d ON bp.Datacio = d.id 
            WHERE Titol LIKE ?
            ORDER BY bp.Num_Registro ASC");
    $stmt->bind_param("s", $searchTerm);
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$stmt->close();
$con->close();
?>
