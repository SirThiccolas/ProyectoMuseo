<?php

require_once __DIR__ . '/../../config/config.php';

class User
{
    public function verifyUser($usuario, $contrasenya)
    {
        global $conn;
        $usuario = mysqli_real_escape_string($conn, $usuario);
        $contrasenya = mysqli_real_escape_string($conn, $contrasenya);
        
        $sql = "SELECT Id_Usuari, Nom_Usuari, Password, Rol FROM usuaris WHERE Nom_Usuari = '$usuario'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($contrasenya == $row['Password']) {
                return $row;
            }
        }
        return false;
    }

    public function getItems()
    {
        global $conn;
        $sql = "SELECT bens_patrimonials.Num_registro, bens_patrimonials.Fotografia, 
                bens_patrimonials.Autor, bens_patrimonials.Titol, bens_patrimonials.Any_Final, 
                ubicacions.Nom AS Nombre_Ubicacion 
                FROM bens_patrimonials 
                INNER JOIN ubicacions ON bens_patrimonials.ID_Ubicacio = ubicacions.ID_Ubicacio";

        $result = $conn->query($sql);

        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items;
    }
}
