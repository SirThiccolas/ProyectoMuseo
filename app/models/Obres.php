<?php

require_once("database.php");

class Obres extends Database
{
    public function getObras()
{
    $sql = "SELECT 
                bp.Num_registro, 
                bp.Fotografia, 
                bp.Baixa, 
                a.nombre AS Autor, 
                bp.Titol, 
                u.Nom AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion
            FROM 
                bens_patrimonials bp
            INNER JOIN 
                ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
            INNER JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            INNER JOIN 
                vocabulario_datacions d ON bp.Datacio = d.id
            ORDER BY bp.Num_registro ASC";

    $db = $this->conectar();
    $rows = $db->query($sql);
    $resultado = $rows->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}


public function verFichaBasica($id)
{
    $sql = "SELECT 
                bp.Num_Registro, 
                bp.Fotografia,
                bp.Nom_Objecte,
                bp.Titol, 
                bp.Mides_Maxima_Alcada_cm,
                bp.Mides_Maxima_Amplada_cm,
                bp.Mides_Maxima_Profunditat_cm,
                bp.Valoracio_Economica_Euros,
                bp.Data_Ingres,
                bp.Font_Ingres,
                bp.Lloc_Procedencia,
                bp.Data_Registro,
                a.nombre AS Autor, 
                m.material AS Material,
                ec.estado AS Estat_Conservacio,
                ub.descripcion AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion,
                cg.nombre AS Classificacio_Generica,
                fi.forma AS Forma_Ingres,
                us.Nom_Usuari AS Nom_Usuari
            FROM 
                bens_patrimonials bp
            INNER JOIN 
                ubicacions ub ON bp.ID_Ubicacio = ub.ID_Ubicacio
            INNER JOIN
                usuaris us ON bp.usuario_registra = us.Id_Usuari
            INNER JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            INNER JOIN 
                vocabulario_classificacio_generica cg ON bp.Classificacio_Generica = cg.id
            INNER JOIN
                vocabulario_datacions d ON bp.Datacio = d.id
            INNER JOIN
                vocabulario_material m ON bp.Material = m.id
            INNER JOIN
                vocabulario_estados_conservacion ec ON bp.Estat_Conservacio = ec.id
            INNER JOIN
                vocabulario_formas_ingreso fi ON bp.Forma_Ingres = fi.id
            WHERE 
                bp.Num_Registro = :id";
    
    $db = $this->conectar();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR); 
    $stmt->execute(); 
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $resultado ? $resultado : null;
}

    public function verFichaGeneral($id)
    {
        $sql = "SELECT 
                bp.Num_Registro, 
                bp.Fotografia,
                bp.Nom_Objecte,
                bp.Titol, 
                bp.Mides_Maxima_Alcada_cm,
                bp.Mides_Maxima_Amplada_cm,
                bp.Mides_Maxima_Profunditat_cm,
                bp.Valoracio_Economica_Euros,
                bp.Data_Ingres,
                bp.Font_Ingres,
                bp.Lloc_Execucio,
                bp.Any_Inicial,
                bp.Any_Final,
                bp.Colleccio_Procedencia,
                bp.Lloc_Procedencia,
                bp.Data_Registro,
                bp.Num_Tiratge,
                bp.Baixa,
                bp.Data_Baixa,
                bp.Persona_Autoritz_Baixa,
                bp.Altres_Numeros_Identificacio,
                bp.Descripcio,
                bp.Historia_Objecte,
                bp.Bibliografia,
                a.nombre AS Autor, 
                m.material AS Material,
                ec.estado AS Estat_Conservacio,
                ub.descripcion AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion,
                cg.nombre AS Classificacio_Generica,
                fi.forma AS Forma_Ingres,
                us.Nom_Usuari AS Nom_Usuari,
                t.tecnica AS Tecnica,
                cb.causa AS Causa_Baixa
            FROM 
                bens_patrimonials bp
            INNER JOIN 
                ubicacions ub ON bp.ID_Ubicacio = ub.ID_Ubicacio
            INNER JOIN
                usuaris us ON bp.usuario_registra = us.Id_Usuari
            INNER JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            INNER JOIN 
                vocabulario_classificacio_generica cg ON bp.Classificacio_Generica = cg.id
            INNER JOIN
                vocabulario_datacions d ON bp.Datacio = d.id
            INNER JOIN
                vocabulario_material m ON bp.Material = m.id
            INNER JOIN
                vocabulario_estados_conservacion ec ON bp.Estat_Conservacio = ec.id
            INNER JOIN
                vocabulario_formas_ingreso fi ON bp.Forma_Ingres = fi.id
            INNER JOIN
                vocabulario_tecnica t ON bp.Tecnica = t.id
            INNER JOIN
                vocabulario_causas_baja cb ON bp.Forma_Ingres = cb.id
            WHERE 
                bp.Num_Registro = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verMovimentsFicha($id)
    {
        $sql = "SELECT * FROM moviments WHERE Obra_moguda = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function verRestauracionsFicha($id)
    {
        $sql = "SELECT * FROM restauracions WHERE id_obra = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verExposicionsFicha($id)
    {
        $sql = "SELECT id_exposicio FROM bens_exposats WHERE id_obra = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $bensexposats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($bensexposats)) {
            $idsExposicions = array_column($bensexposats, 'id_exposicio');
            $ids = implode(',', array_map('intval', $idsExposicions));

            $sql = "SELECT 
                    te.tipo AS Tipus_Expo,
                    e.Nom_Expo,
                    e.Data_Inici_Expo,
                    e.Data_Fi_Expo,
                    e.Lloc_Exposicio
                FROM exposicions e 
                INNER JOIN vocabulario_tipos_exposicion te ON e.Tipus_Expo = te.id
                WHERE ID_Expo 
                IN ($ids)";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
}