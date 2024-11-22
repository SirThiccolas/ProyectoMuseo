<?php
require_once 'app/models/Ubicaciones.php';

class UbicacionesController {
    private $ubicacionesModel;

    public function __construct() {
        $this->ubicacionesModel = new Ubicaciones();
    }

    // Carga inicial del árbol
    public function obtenerArbolUbicaciones() {
        $ubicaciones = $this->ubicacionesModel->obtenerUbicaciones();
        require_once 'app/views/templates/header.php';
        include 'app/views/ubicacionesView.php';
        require_once 'app/views/templates/footer.html';
    }

    // Manejar acciones AJAX
    public function manejarAcciones() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $action = $_POST['action'] ?? null;
                $response = $this->ubicacionesModel->manejarAccion($action, $_POST);
                echo json_encode($response);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(['error' => 'Método no permitido.']);
            exit;
        }
    }
}