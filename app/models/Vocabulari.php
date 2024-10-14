<?php

require_once("database.php");

class Vocabulari extends Database
{
    public function getAutores()
    {
        $sql = "SELECT nombre FROM vocabulario_autores";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getCausasBaja()
    {
        $sql = "SELECT causa FROM vocabulario_causas_baja";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getDatacions()
    {
        $sql = "SELECT datacio, any_inici, any_final FROM vocabulario_datacions";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getEstadosConservacion()
    {
        $sql = "SELECT estado FROM vocabulario_estados_conservacion";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getFormasIngreso()
    {
        $sql = "SELECT forma FROM vocabulario_formas_ingreso";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getTiposExposicion()
    {
        $sql = "SELECT tipo FROM vocabulario_tipos_exposicion";
        
        $db = $this->conectar();
        $rows = $db->query($sql);
        $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
