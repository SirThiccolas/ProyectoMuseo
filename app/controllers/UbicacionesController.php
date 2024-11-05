<?php
// app/controllers/UbicacionesController.php

require_once 'app/models/Ubicaciones.php';

class UbicacionesController {
    private $ubicacionesModel;

    public function __construct() {
        $this->ubicacionesModel = new Ubicaciones();
    }

    public function obtenerArbolUbicaciones() {
        header('Content-Type: application/json');
        $ubicaciones = $this->ubicacionesModel->obtenerUbicaciones();
        echo json_encode($ubicaciones);
        require_once 'app/views/ubicacionesView.php';
    }
}
?>
