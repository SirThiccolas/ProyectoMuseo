<?php

require_once("database.php");

class CopiasSeguridad extends Database
{
    public function verifyUser($usuario, $contrasenya)
    {
        $sql = "SELECT * FROM usuaris WHERE Nom_Usuari = :usuario AND Password = :contrasenya";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasenya', $contrasenya);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
