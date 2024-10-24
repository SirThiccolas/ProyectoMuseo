<?php

require_once("database.php");

class Obres extends Database
{
    public function getObras()
    {
        $sql = "SELECT bp.Num_registro, bp.Fotografia, bp.Autor, 
                    bp.Titol, bp.Any_Final, bp.Baixa, u.Nom AS Nombre_Ubicacion 
                    FROM bens_patrimonials bp
                    INNER JOIN ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
                    WHERE bp.Baixa = 0";
                    
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC); // Usamos fetchAll en lugar de fetch
        return $resultado;
    }
    public function verFicha($id)
    {
        $sql = "SELECT bp.* FROM bens_patrimonials bp WHERE Num_Registro LIKE '$id'";
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC); // Usamos fetchAll en lugar de fetch
        return $resultado;
    }
}
