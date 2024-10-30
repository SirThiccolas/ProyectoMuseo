<?php

require_once("database.php");

class Restauracions extends Database
{
    public function getRestauracions()
    {
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
                bens_patrimonials bp ON bp.Num_Registro = r.id_obra";
                    
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
