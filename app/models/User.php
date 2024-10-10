<?php

require_once("database.php");

class User extends Database
{
    public function verifyUser($usuario, $contrasenya)
    {
        $sql = "SELECT * FROM usuaris WHERE Nom_Usuari = '$usuario' AND Password = '$contrasenya'";
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getUser()
    {
        $sql = "SELECT * FROM usuaris";
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
