<?php

require_once 'app/models/CopiasSeguridad.php';

class CopiasSeguridadController {
    private $modelo;

    public function __construct()
    {
        $this->modelo = new CopiasSeguridad();
    }

    public function mostrarCopias()
    {
        $ruta = 'backups/';
        $copias = $this->modelo->obtenerCopias($ruta);

        require_once 'app/views/templates/header.php';
        require_once 'app/views/CopiasSeguridadView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function generarCopia()
    {
        $fechaHora = date('Y-m-d_H-i-s');
        $nombreArchivoSQL = "backup-$fechaHora.sql";
        $nombreArchivoZIP = "backup-$fechaHora.zip";
        $rutaSQL = "backups/$nombreArchivoSQL";
        $rutaZIP = "backups/$nombreArchivoZIP";

        try {
            $exito = $this->modelo->crearBackup($nombreArchivoSQL, $rutaSQL, $nombreArchivoZIP, $rutaZIP);

            if ($exito) {
                echo "<script>alert('Copia de seguridad creada exitosamente');</script>";
            } else {
                echo "<script>alert('Error al crear la copia de seguridad');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Error al generar copia: {$e->getMessage()}');</script>";
        }

        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=CopiasSeguridad&action=mostrarCopias'>";
    }

    public function eliminarCopia()
    {
        if (isset($_GET['archivo'])) {
            $archivo = 'backups/' . basename($_GET['archivo']);

            if ($this->modelo->eliminarBackup($archivo)) {
                echo "<script>alert('Copia de seguridad eliminada exitosamente');</script>";
            } else {
                echo "<script>alert('Error: el archivo no existe');</script>";
            }
        }

        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=CopiasSeguridad&action=mostrarCopias'>";
    }
}
