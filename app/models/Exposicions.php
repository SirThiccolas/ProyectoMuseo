<?php

require_once("database.php");

class Exposicions extends Database
{   
    public function getExposicions()
    {
        $sql = 'SELECT * FROM exposicions';
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC); // Usamos fetchAll en lugar de fetch
        return $resultado;
    }

    public function updateExposicions($idExpo, $nomExpo, $dataIniciExpo, $dataFiExpo, $tipusExpo, $llocExpo)
    {
        $sql = "UPDATE exposicions SET Nom_Expo = :nomExpo, Data_Inici_Expo = :dataIniciExpo, Data_Fi_Expo = :dataFiExpo, Tipus_Expo = :tipusExpo, Lloc_Exposicio = :llocExpo WHERE ID_Expo = :idExpo";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idExpo', $idExpo);
        $stmt->bindParam(':nomExpo', $nomExpo);
        $stmt->bindParam(':dataIniciExpo', $dataIniciExpo);
        $stmt->bindParam(':dataFiExpo', $dataFiExpo);
        $stmt->bindParam(':tipusExpo', $tipusExpo);
        $stmt->bindParam(':llocExpo', $llocExpo);

        return $stmt->execute();
    }

    public function deleteExposicio($idExpo) 
    {
        $sql = "DELETE FROM bens_exposats WHERE id_exposicio = :idExpo";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idExpo', $idExpo, PDO::PARAM_INT);
        $stmt->execute();
        
        $sql = "DELETE FROM exposicions WHERE ID_Expo = :idExpo";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idExpo', $idExpo, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function createExposicio($nomExpo, $dataIniciExpo, $dataFiExpo, $tipusExpo, $llocExpo)
    {
        $db = $this->conectar();

        $comprNom = "SELECT * FROM exposicions WHERE Nom_Expo = :nomExpo";
        $stmt = $db->prepare($comprNom);
        $stmt->bindParam(':nomExpo', $nomExpo);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "Aquest nom no es troba disponible, prova de nou.";
        }

        $sql = "INSERT INTO exposicions (Nom_Expo, Data_Inici_Expo, Data_Fi_Expo, Tipus_Expo, Lloc_Exposicio) VALUES (:nomExpo, :dataIniciExpo, :dataFiExpo, :tipusExpo, :llocExpo)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nomExpo', $nomExpo);
        $stmt->bindParam(':dataIniciExpo', $dataIniciExpo); 
        $stmt->bindParam(':dataFiExpo', $dataFiExpo);
        $stmt->bindParam(':tipusExpo', $tipusExpo);
        $stmt->bindParam(':llocExpo', $llocExpo);


        return $stmt->execute();
    }

    public function getExposicioById($idExpo)
    {
        $sql = "SELECT * FROM exposicions WHERE ID_Expo = :idExpo";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idExpo', $idExpo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getObresExpuestas($idExpo)
    {
        $sql = "SELECT  bp.Fotografia, bp.Titol, bp.Autor, e.Data_Inici_Expo, e.Data_Fi_Expo FROM bens_patrimonials bp INNER JOIN bens_exposats be ON bp.Num_Registro = be.id_obra INNER JOIN exposicions e ON e.ID_Expo = be.id_exposicio AND e.ID_Expo = :idExpo";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idExpo', $idExpo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    
}