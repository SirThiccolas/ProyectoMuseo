<?php
// app/controllers/UbicacionesController.php

require_once 'app/models/Ubicaciones.php';

class UbicacionesController {
    private $ubicacionesModel;

    public function __construct() {
        $this->ubicacionesModel = new Ubicaciones();
    }

    public function obtenerArbolUbicaciones() {
        require_once 'app/views/templates/header.php';
        $ubicaciones = $this->ubicacionesModel->obtenerUbicaciones();
        include 'app/views/ubicacionesView.php'; // Asegúrate de que esta ruta sea correcta
        require_once 'app/views/templates/footer.html';

    }
}
?>