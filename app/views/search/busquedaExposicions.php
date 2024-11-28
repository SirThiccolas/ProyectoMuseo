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
                * 
            FROM 
                exposicions 
            WHERE 
                CONCAT(Nom_Expo, ' ', Data_Inici_Expo, ' ', Data_Fi_Expo, ' ', Tipus_Expo, ' ', Lloc_Exposicio) LIKE '$searchTerm'";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$con->close();
?>


