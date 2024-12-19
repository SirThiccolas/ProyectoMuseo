<?php

require_once("database.php");

class CopiasSeguridad extends Database
{
    public function obtenerCopias($ruta)
    {
        $copias = [];

        if (is_dir($ruta)) {
            $archivos = scandir($ruta);
            foreach ($archivos as $archivo) {
                if (strpos($archivo, '.zip') !== false) {
                    $fechaModificacion = filemtime($ruta . $archivo);
                    $fecha = date("d-m-Y H:i:s", $fechaModificacion);
                    $copias[] = ['nombre' => $archivo, 'fecha' => $fecha, 'timestamp' => $fechaModificacion];
                }
            }

            usort($copias, function ($a, $b) {
                return $b['timestamp'] - $a['timestamp'];
            });
        }

        return $copias;
    }

    public function crearBackup($nombreArchivoSQL, $rutaSQL, $nombreArchivoZIP, $rutaZIP)
    {
        $comando = "C:/xampp/mysql/bin/mysqldump --host=localhost --user=root --databases fenosa > $rutaSQL";

        exec($comando . " 2>&1", $output, $resultadoSQL);

        if ($resultadoSQL === 0) {
            $zip = new ZipArchive();
            if ($zip->open($rutaZIP, ZipArchive::CREATE) === TRUE) {
                $zip->addFile($rutaSQL, $nombreArchivoSQL);

                $this->agregarCarpetaAlZip('public/img-bd', $zip, 'img-bd');

                $zip->close();
                unlink($rutaSQL); 
                return true;
            }
        }

        return false;
    }

    public function eliminarBackup($rutaArchivo)
    {
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo);
            return true;
        }
        return false;
    }

    private function agregarCarpetaAlZip($carpeta, $zip, $rutaDentroDelZip)
    {
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
