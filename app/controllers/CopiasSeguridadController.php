<?php

require_once 'app/models/database.php';

class CopiasSeguridadController {
    public function mostrarCopias() {
        $ruta = 'backups/';
        $copias = [];

        if (is_dir($ruta)) {
            $archivos = scandir($ruta);
            foreach ($archivos as $archivo) {
                if (strpos($archivo, '.zip') !== false) {
                    $fecha = date("d-m-Y H:i:s", filemtime($ruta . $archivo));
                    $copias[] = ['nombre' => $archivo, 'fecha' => $fecha];
                }
            }
        }
        require_once 'app/views/templates/header.php';
        require_once 'app/views/CopiasSeguridadView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function generarCopia() {
        $fechaHora = date('Y-m-d_H-i-s');
        $nombreArchivoSQL = "backup-$fechaHora.sql";
        $nombreArchivoZIP = "backup-$fechaHora.zip";
        $rutaSQL = "backups/$nombreArchivoSQL";
        $rutaZIP = "backups/$nombreArchivoZIP";
    
        try {
            $comando = "C:/xampp/mysql/bin/mysqldump --host=localhost --user=root fenosa > $rutaSQL";
    
            exec($comando . " 2>&1", $output, $resultadoSQL);
    
            if ($resultadoSQL === 0) {
                $zip = new ZipArchive();
                if ($zip->open($rutaZIP, ZipArchive::CREATE) === TRUE) {
                    $zip->addFile($rutaSQL, $nombreArchivoSQL);
                    $this->agregarCarpetaAlZip('public/img-bd', $zip, 'img-bd');
                    $zip->close();
                    unlink($rutaSQL);
                    echo "<script>alert('Copia de seguridad creada exitosamente');</script>";
                } else {
                    echo "<script>alert('Error al crear el archivo ZIP');</script>";
                }
            } else {
                echo "<script>alert('Error al crear la copia SQL: " . implode("\n", $output) . "');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Error al generar copia: {$e->getMessage()}');</script>";
        }
    
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=CopiasSeguridad&action=mostrarCopias'>";
    }
    

    public function eliminarCopia() {
        if (isset($_GET['archivo'])) {
            $archivo = 'backups/' . basename($_GET['archivo']);

            if (file_exists($archivo)) {
                unlink($archivo);
                echo "<script>alert('Copia de seguridad eliminada exitosamente');</script>";
            } else {
                echo "<script>alert('Error: el archivo no existe');</script>";
            }
        }

        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=CopiasSeguridad&action=mostrarCopias'>";
    }

    private function agregarCarpetaAlZip($carpeta, $zip, $rutaDentroDelZip) {
        $archivos = scandir($carpeta);
        foreach ($archivos as $archivo) {
            if ($archivo != '.' && $archivo != '..') {
                $rutaCompleta = $carpeta . '/' . $archivo;
                if (is_dir($rutaCompleta)) {
                    $this->agregarCarpetaAlZip($rutaCompleta, $zip, "$rutaDentroDelZip/$archivo");
                } else {
                    $zip->addFile($rutaCompleta, "$rutaDentroDelZip/$archivo");
                }
            }
        }
    }
}
?>
