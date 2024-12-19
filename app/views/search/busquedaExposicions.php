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
            e.ID_Expo,
            e.Nom_Expo,
            e.Data_Inici_Expo,
            e.Data_Fi_Expo,
            e.Lloc_Exposicio,
            v.tipo AS Tipus_Expo
        FROM 
            exposicions e 
        INNER JOIN
            vocabulario_tipos_exposicion v 
        ON 
            v.id = e.Tipus_Expo    
        WHERE 
            CONCAT(e.Nom_Expo, ' ', e.Data_Inici_Expo, ' ', e.Data_Fi_Expo, ' ', v.tipo, ' ', e.Lloc_Exposicio) LIKE '$searchTerm'";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$con->close();
?>


