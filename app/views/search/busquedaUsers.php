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
                usuaris 
            WHERE 
                CONCAT(Nom_Usuari, ' ', Email, ' ', Rol) LIKE '$searchTerm'";

$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);

$con->close();
?>


