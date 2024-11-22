<?php
require_once("database.php");

class Ubicaciones extends Database {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conectar();
    }

    // Obtener todas las ubicaciones en formato para jsTree
    public function obtenerUbicaciones() {
        $stmt = $this->db->prepare("SELECT ID_Ubicacio, Nom, padre, descripcion FROM ubicacions");
        $stmt->execute();
        $ubicaciones = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ubicaciones[] = [
                "id" => $fila['ID_Ubicacio'],
                "parent" => $fila['padre'] ? $fila['padre'] : "#", // "#" para nodos raíz
                "text" => $fila['Nom'] ?: $fila['descripcion']
            ];
        }

        return $ubicaciones;
    }

    // Añadir una nueva ubicación
    public function addUbicacion($parentId, $name, $description) {
        $stmt = $this->db->prepare("INSERT INTO ubicacions (padre, Nom, descripcion) VALUES (:padre, :nom, :descripcion)");
        $stmt->bindParam(':padre', $parentId);
        $stmt->bindParam(':nom', $name);
        $stmt->bindParam(':descripcion', $description);
        $stmt->execute();

        return $this->db->lastInsertId(); // Devuelve la ID generada
    }

    // Modificar una ubicación existente
    public function updateUbicacion($id, $name) {
        $stmt = $this->db->prepare("UPDATE ubicacions SET Nom = :nom WHERE ID_Ubicacio = :id");
        $stmt->bindParam(':nom', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Eliminar una ubicación
    public function deleteUbicacion($id) {
        // Primero, elimina nodos hijos
        $stmtDeleteChildren = $this->db->prepare("DELETE FROM ubicacions WHERE padre = :id");
        $stmtDeleteChildren->bindParam(':id', $id);
        $stmtDeleteChildren->execute();

        // Luego, elimina el nodo seleccionado
        $stmtDeleteNode = $this->db->prepare("DELETE FROM ubicacions WHERE ID_Ubicacio = :id");
        $stmtDeleteNode->bindParam(':id', $id);
        $stmtDeleteNode->execute();
    }

    // Manejo de acciones dinámicamente
    public function manejarAccion($action, $data) {
        switch ($action) {
            case 'add':
                $parentId = $data['parent_id'] ?? null;
                $name = $data['name'] ?? null;
                $description = $data['description'] ?? null;

                if (!$parentId || !$name || !$description) {
                    throw new Exception("Faltan datos requeridos para añadir una ubicación.");
                }

                $newId = $this->addUbicacion($parentId, $name, $description);
                return [
                    "id" => $newId,
                    "parent" => $parentId,
                    "text" => $name
                ];

            case 'edit':
                $id = $data['id'] ?? null;
                $name = $data['name'] ?? null;

                if (!$id || !$name) {
                    throw new Exception("Faltan datos requeridos para modificar la ubicación.");
                }

                $this->updateUbicacion($id, $name);
                return "success";

            case 'delete':
                $id = $data['id'] ?? null;

                if (!$id) {
                    throw new Exception("Faltan datos requeridos para eliminar la ubicación.");
                }

                $this->deleteUbicacion($id);
                return "success";

            default:
                throw new Exception("Acción inválida.");
        }
    }
}

?>