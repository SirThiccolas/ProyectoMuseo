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
                r.data_inici,
                r.data_fi,
                r.comentari,
                r.nom_restaurador,
                bp.Fotografia,
                r.id_obra
            FROM 
                restauracions r
            INNER JOIN 
                bens_patrimonials bp ON bp.Num_Registro = r.id_obra
            WHERE 
                CONCAT(r.id_obra, ' ', r.nom_restaurador, ' ', r.comentari, ' ', r.data_fi, ' ', r.data_inici, ' ', bp.Titol) LIKE '$searchTerm'";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$con->close();
?>


