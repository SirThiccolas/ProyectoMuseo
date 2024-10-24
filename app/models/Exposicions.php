<?php

require_once("database.php");

class Exposicions extends Database
{
    public function getExposicions()
    {
        $sql = "SELECT * FROM Exposicions";
                    
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC); // Usamos fetchAll en lugar de fetch
        return $resultado;
    }
}
