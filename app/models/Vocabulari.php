<?php

require_once("database.php");

class Vocabulari extends Database
{

    // SELECTS
    public function getAutores()
    {
        $sql = "SELECT * FROM vocabulario_autores";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getCausasBaja()
    {
        $sql = "SELECT * FROM vocabulario_causas_baja";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getDatacions()
    {
        $sql = "SELECT * FROM vocabulario_datacions";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getEstadosConservacion()
    {
        $sql = "SELECT * FROM vocabulario_estados_conservacion";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getFormasIngreso()
    {
        $sql = "SELECT * FROM vocabulario_formas_ingreso";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getTiposExposicion()
    {
        $sql = "SELECT * FROM vocabulario_tipos_exposicion";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getMaterial()
    {
        $sql = "SELECT * FROM vocabulario_material";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getTecnica()
    {
        $sql = "SELECT * FROM vocabulario_tecnica";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    // INSERTS
    public function insertarAutor($nombre)
    {
        $sql = "INSERT INTO vocabulario_autores (nombre) VALUES (:nombre)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    public function insertarCausaBaja($causa)
    {
        $sql = "INSERT INTO vocabulario_causas_baja (causa) VALUES (:causa)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':causa', $causa);
        return $stmt->execute();
    }

    public function insertarDatacio($datacio, $any_inici, $any_final)
    {
        $sql = "INSERT INTO vocabulario_datacions (datacio, any_inici, any_final) VALUES (:datacio, :any_inici, :any_final)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':datacio', $datacio);
        $stmt->bindParam(':any_inici', $any_inici);
        $stmt->bindParam(':any_final', $any_final);
        return $stmt->execute();
    }

    public function insertarEstadoConservacion($estado)
    {
        $sql = "INSERT INTO vocabulario_estados_conservacion (estado) VALUES (:estado)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    public function insertarFormaIngreso($forma)
    {
        $sql = "INSERT INTO vocabulario_formas_ingreso (forma) VALUES (:forma)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':forma', $forma);
        return $stmt->execute();
    }

    public function insertarTipoExposicion($tipo)
    {
        $sql = "INSERT INTO vocabulario_tipos_exposicion (tipo) VALUES (:tipo)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        return $stmt->execute();
    }
    public function insertarMaterial($material)
    {
        $sql = "INSERT INTO vocabulario_material (material) VALUES (:material)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':material', $material);
        return $stmt->execute();
    }

    public function insertarTecnica($tecnica)
    {
        $sql = "INSERT INTO vocabulario_tecnica (tecnica) VALUES (:tecnica)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tecnica', $tecnica);
        return $stmt->execute();
    }


    // UPDATES
    public function getVocabulariById($id, $vocabulari)
    {
        $tableName = $this->getTableName($vocabulari);
        if (!$tableName) return null;

        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAutor($id, $nombre)
    {
        $sql = "UPDATE vocabulario_autores SET nombre = :nombre WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateCausaBaja($id, $causa)
    {
        $sql = "UPDATE vocabulario_causas_baja SET causa = :causa WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':causa', $causa, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateDatacion($id, $datacio, $any_inici, $any_final)
    {
        $sql = "UPDATE vocabulario_datacions SET datacio = :datacio, any_inici = :any_inici, any_final = :any_final WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':datacio', $datacio, PDO::PARAM_STR);
        $stmt->bindParam(':any_inici', $any_inici, PDO::PARAM_INT);
        $stmt->bindParam(':any_final', $any_final, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateEstadoConservacion($id, $estado)
    {
        $sql = "UPDATE vocabulario_estados_conservacion SET estado = :estado WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateFormaIngreso($id, $forma)
    {
        $sql = "UPDATE vocabulario_formas_ingreso SET forma = :forma WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':forma', $forma, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateTipoExposicion($id, $tipo)
    {
        $sql = "UPDATE vocabulario_tipos_exposicion SET tipo = :tipo WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    private function getTableName($vocabulari)
    {
        switch ($vocabulari) {
            case 'autores':
                return 'vocabulario_autores';
            case 'causasBaja':
                return 'vocabulario_causas_baja';
            case 'datacions':
                return 'vocabulario_datacions';
            case 'estatsConservacio':
                return 'vocabulario_estados_conservacion';
            case 'formesIngres':
                return 'vocabulario_formas_ingreso';
            case 'tipusExposicio':
                return 'vocabulario_tipos_exposicion';
            case 'material':
                return 'vocabulario_material';
            case 'tecnica':
                return 'vocabulario_tecnica';
            default:
                return null;
        }
    }

    // DELETE
    public function deleteAutor($id)
    {
        $sql = "DELETE FROM vocabulario_autores WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteCausaBaja($id)
    {
        $sql = "DELETE FROM vocabulario_causas_baja WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteDatacion($id)
    {
        $sql = "DELETE FROM vocabulario_datacions WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteEstadoConservacion($id)
    {
        $sql = "DELETE FROM vocabulario_estados_conservacion WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteFormaIngreso($id)
    {
        $sql = "DELETE FROM vocabulario_formas_ingreso WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteTipoExposicion($id)
    {
        $sql = "DELETE FROM vocabulario_tipos_exposicion WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteTecnica($id)
    {
        $sql = "DELETE FROM vocabulario_tecnica WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteMaterial($id)
    {
        $sql = "DELETE FROM vocabulario_material WHERE id = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
