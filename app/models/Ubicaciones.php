<?php
// app/models/Ubicaciones.php

require_once("database.php");

class Ubicaciones extends Database{
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conectar();
    }

    public function obtenerUbicaciones() {
        $stmt = $this->db->prepare("SELECT ID_Ubicacio, Nom, padre, descripcion FROM ubicacions");
        $stmt->execute();
        $ubicaciones = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ubicaciones[] = [
                "id" => $fila['ID_Ubicacio'],
                "parent" => $fila['padre'] ? $fila['padre'] : "#",
                "text" => $fila['Nom'] ?: $fila['descripcion']
            ];
        }

        return $ubicaciones;
    }
}
?>
