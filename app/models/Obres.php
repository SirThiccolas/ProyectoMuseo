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
                    bp.Any_Final,
                    t.tecnica AS Nombre_Tecnica
                FROM 
                    bens_patrimonials bp
                INNER JOIN 
                    ubicacions u ON bp.ID_Ubicacio = u.ID_Ubicacio
                INNER JOIN 
                    vocabulario_autores a ON bp.Autor = a.id
                INNER JOIN
                    vocabulario_tecnica t ON bp.Tecnica = t.id
                ORDER BY 
                    bp.Num_registro ASC";

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
                LEFT JOIN 
                    ubicacions ub ON bp.ID_Ubicacio = ub.ID_Ubicacio
                LEFT JOIN
                    usuaris us ON bp.usuario_registra = us.Id_Usuari
                LEFT JOIN 
                    vocabulario_autores a ON bp.Autor = a.id
                LEFT JOIN 
                    vocabulario_classificacio_generica cg ON bp.Classificacio_Generica = cg.id
                LEFT JOIN
                    vocabulario_datacions d ON bp.Datacio = d.id
                LEFT JOIN
                    vocabulario_material m ON bp.Material = m.id
                LEFT JOIN
                    vocabulario_estados_conservacion ec ON bp.Estat_Conservacio = ec.id
                LEFT JOIN
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
                bp.Altres_Numeros_Identificacio,
                bp.Descripcio,
                bp.Historia_Objecte,
                bp.Bibliografia,
                a.nombre AS Autor, 
                m.material AS Material,
                ec.estado AS Estat_Conservacio,
                ub.descripcion AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion,
                d.any_inici AS Any_Inici_Datacio,
                d.any_final AS Any_Final_Datacio,
                cg.nombre AS Classificacio_Generica,
                fi.forma AS Forma_Ingres,
                us.Nom_Usuari AS Nom_Usuari_Registre,
                usu.Nom_Usuari AS Nom_Usuari_Baixa,
                t.tecnica AS Tecnica,
                cb.causa AS Causa_Baixa,
                bp.ID_Ubicacio AS FK_ID_Ubicacio,
                bp.usuario_registra AS FK_Usuari_Registra,
                bp.Autor AS FK_Autor,
                bp.Classificacio_Generica AS FK_Classificacio,
                bp.Datacio AS FK_Datacio,
                bp.Material AS FK_Material,
                bp.Estat_Conservacio AS FK_Estat_Conservacio,
                bp.Forma_Ingres AS FK_Forma_Ingres,
                bp.Tecnica AS FK_Tecnica,
                bp.Persona_Autoritz_Baixa AS FK_Persona_Autoritz_Baixa,
                bp.Causa_Baixa AS FK_Causa_Baixa
            FROM 
                bens_patrimonials bp
            LEFT JOIN 
                ubicacions ub ON bp.ID_Ubicacio = ub.ID_Ubicacio
            LEFT JOIN
                usuaris us ON bp.usuario_registra = us.Id_Usuari
            LEFT JOIN
                usuaris usu ON bp.Persona_Autoritz_Baixa = usu.Id_Usuari
            LEFT JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            LEFT JOIN 
                vocabulario_classificacio_generica cg ON bp.Classificacio_Generica = cg.id
            LEFT JOIN
                vocabulario_datacions d ON bp.Datacio = d.id
            LEFT JOIN
                vocabulario_material m ON bp.Material = m.id
            LEFT JOIN
                vocabulario_estados_conservacion ec ON bp.Estat_Conservacio = ec.id
            LEFT JOIN
                vocabulario_formas_ingreso fi ON bp.Forma_Ingres = fi.id
            LEFT JOIN
                vocabulario_tecnica t ON bp.Tecnica = t.id
            LEFT JOIN
                vocabulario_causas_baja cb ON bp.Causa_Baixa = cb.id
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

    public function deleteObra($id) 
    {
        $sql = "DELETE FROM bens_patrimonials WHERE Num_Registro = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
     
    public function verEditarFicha($id)
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
                bp.Altres_Numeros_Identificacio,
                bp.Descripcio,
                bp.Historia_Objecte,
                bp.Bibliografia,
                a.nombre AS Autor, 
                m.material AS Material,
                ec.estado AS Estat_Conservacio,
                ub.descripcion AS Nombre_Ubicacion, 
                d.datacio AS Nombre_Datacion,
                d.any_inici AS Any_Inici_Datacio,
                d.any_final AS Any_Final_Datacio,
                cg.nombre AS Classificacio_Generica,
                fi.forma AS Forma_Ingres,
                us.Nom_Usuari AS Nom_Usuari_Registre,
                usu.Nom_Usuari AS Nom_Usuari_Baixa,
                t.tecnica AS Tecnica,
                cb.causa AS Causa_Baixa,
                bp.ID_Ubicacio AS FK_ID_Ubicacio,
                bp.usuario_registra AS FK_Usuari_Registra,
                bp.Autor AS FK_Autor,
                bp.Classificacio_Generica AS FK_Classificacio,
                bp.Datacio AS FK_Datacio,
                bp.Material AS FK_Material,
                bp.Estat_Conservacio AS FK_Estat_Conservacio,
                bp.Forma_Ingres AS FK_Forma_Ingres,
                bp.Tecnica AS FK_Tecnica,
                bp.Persona_Autoritz_Baixa AS FK_Persona_Autoritz_Baixa,
                bp.Causa_Baixa AS FK_Causa_Baixa
            FROM 
                bens_patrimonials bp
            LEFT JOIN 
                ubicacions ub ON bp.ID_Ubicacio = ub.ID_Ubicacio
            LEFT JOIN
                usuaris us ON bp.usuario_registra = us.Id_Usuari
            LEFT JOIN
                usuaris usu ON bp.Persona_Autoritz_Baixa = usu.Id_Usuari
            LEFT JOIN 
                vocabulario_autores a ON bp.Autor = a.id
            LEFT JOIN 
                vocabulario_classificacio_generica cg ON bp.Classificacio_Generica = cg.id
            LEFT JOIN
                vocabulario_datacions d ON bp.Datacio = d.id
            LEFT JOIN
                vocabulario_material m ON bp.Material = m.id
            LEFT JOIN
                vocabulario_estados_conservacion ec ON bp.Estat_Conservacio = ec.id
            LEFT JOIN
                vocabulario_formas_ingreso fi ON bp.Forma_Ingres = fi.id
            LEFT JOIN
                vocabulario_tecnica t ON bp.Tecnica = t.id
            LEFT JOIN
                vocabulario_causas_baja cb ON bp.Causa_Baixa = cb.id
            WHERE 
                bp.Num_Registro = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateObra($idObra, $Nom_Objecte, $Autor, $Titol, $Nombre_Datacion, $Classificacio_Generica, $Mides_Maxima_Alcada_cm, $Mides_Maxima_Amplada_cm, $Mides_Maxima_Profunditat_cm,
    $Material, $Estat_Conservacio, $Valoracio_Economica_Euros, $Forma_Ingres, $Data_Ingres, $Font_Ingres, $Data_Registro, $Nom_Usuari_Registre, $Colleccio_Procedencia,
    $Tecnica, $Any_Inicial, $Any_Final, $Num_Tiratge, $Altres_Numeros_Identificacio, $Baixa, $Causa_Baixa, $Data_Baixa, $Persona_Autoritz_Baixa, $Lloc_Procedencia,
    $Lloc_Execucio, $Bibliografia, $Descripcio, $Historia) 
    {
        $sql = "UPDATE bens_patrimonials 
        SET Classificacio_Generica = :Classificacio_Generica, 
            Nom_Objecte = :Nom_Objecte, 
            Mides_Maxima_Alcada_cm = :Mides_Maxima_Alcada_cm,
            Mides_Maxima_Amplada_cm = :Mides_Maxima_Amplada_cm, 
            Mides_Maxima_Profunditat_cm = :Mides_Maxima_Profunditat_cm, 
            Material = :Material, 
            Tecnica = :Tecnica,
            Autor = :Autor, 
            Titol = :Titol, 
            Any_Inicial = :Any_Inicial, 
            Any_Final = :Any_Final, 
            Datacio = :Datacio, 
            Data_Registro = :Data_Registro, 
            Forma_Ingres = :Forma_Ingres,
            Data_Ingres = :Data_Ingres, 
            Font_Ingres = :Font_Ingres, 
            Baixa = :Baixa, 
            Causa_Baixa = :Causa_Baixa, 
            Data_Baixa = :Data_Baixa, 
            Persona_Autoritz_Baixa = :Persona_Autoritz_Baixa,
            Estat_Conservacio = :Estat_Conservacio, 
            Lloc_Execucio = :Lloc_Execucio, 
            Lloc_Procedencia = :Lloc_Procedencia, 
            Num_Tiratge = :Num_Tiratge, 
            Altres_Numeros_Identificacio = :Altres_Numeros_Identificacio,
            Valoracio_Economica_Euros = :Valoracio_Economica_Euros, 
            Bibliografia = :Bibliografia, 
            Descripcio = :Descripcio, 
            Historia_Objecte = :Historia_Objecte, 
            usuario_registra = :usuario_registra 
        WHERE Num_Registro = :id";

        $db = $this->conectar();
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':id', $idObra);
        $stmt->bindParam(':Classificacio_Generica', $Classificacio_Generica);
        $stmt->bindParam(':Nom_Objecte', $Nom_Objecte);
        $stmt->bindParam(':Mides_Maxima_Alcada_cm', $Mides_Maxima_Alcada_cm);
        $stmt->bindParam(':Mides_Maxima_Amplada_cm', $Mides_Maxima_Amplada_cm);
        $stmt->bindParam(':Mides_Maxima_Profunditat_cm', $Mides_Maxima_Profunditat_cm);
        $stmt->bindParam(':Material', $Material);
        $stmt->bindParam(':Tecnica', $Tecnica);
        $stmt->bindParam(':Autor', $Autor);
        $stmt->bindParam(':Titol', $Titol);
        $stmt->bindParam(':Any_Inicial', $Any_Inicial);
        $stmt->bindParam(':Any_Final', $Any_Final);
        $stmt->bindParam(':Datacio', $Nombre_Datacion);
        $stmt->bindParam(':Data_Registro', $Data_Registro);
        $stmt->bindParam(':Forma_Ingres', $Forma_Ingres);
        $stmt->bindParam(':Data_Ingres', $Data_Ingres);
        $stmt->bindParam(':Font_Ingres', $Font_Ingres);
        $stmt->bindParam(':Baixa', $Baixa);
        $stmt->bindParam(':Causa_Baixa', $Causa_Baixa);
        $stmt->bindParam(':Data_Baixa', $Data_Baixa);
        $stmt->bindParam(':Persona_Autoritz_Baixa', $Persona_Autoritz_Baixa);
        $stmt->bindParam(':Estat_Conservacio', $Estat_Conservacio);
        $stmt->bindParam(':Lloc_Execucio', $Lloc_Execucio);
        $stmt->bindParam(':Lloc_Procedencia', $Lloc_Procedencia);
        $stmt->bindParam(':Num_Tiratge', $Num_Tiratge);
        $stmt->bindParam(':Altres_Numeros_Identificacio', $Altres_Numeros_Identificacio);
        $stmt->bindParam(':Valoracio_Economica_Euros', $Valoracio_Economica_Euros);
        $stmt->bindParam(':Bibliografia', $Bibliografia);
        $stmt->bindParam(':Descripcio', $Descripcio);
        $stmt->bindParam(':Historia_Objecte', $Historia);
        $stmt->bindParam(':usuario_registra', $Nom_Usuari_Registre);

        return $stmt->execute();
    }
    
    public function createObra($idObra, $Nom_Objecte, $Autor, $Titol, $Nombre_Datacion, $Classificacio_Generica, $Mides_Maxima_Alcada_cm, $Mides_Maxima_Amplada_cm, $Mides_Maxima_Profunditat_cm,
        $Material, $Estat_Conservacio, $Valoracio_Economica_Euros, $Forma_Ingres, $Data_Ingres, $Font_Ingres, $Data_Registro, $Nom_Usuari_Registre, $Colleccio_Procedencia,
        $Tecnica, $Any_Inicial, $Any_Final, $Num_Tiratge, $Altres_Numeros_Identificacio, $Baixa, $Causa_Baixa, $Data_Baixa, $Persona_Autoritz_Baixa, $Lloc_Procedencia,
        $Lloc_Execucio, $Bibliografia, $Descripcio, $Historia) {
    
        $sql = "INSERT INTO bens_patrimonials (Num_Registro, Nom_Objecte, Autor, Titol, Datacio, Classificacio_Generica, Mides_Maxima_Alcada_cm, Mides_Maxima_Amplada_cm, Mides_Maxima_Profunditat_cm,
                Material, Estat_Conservacio, Valoracio_Economica_Euros, Forma_Ingres, Data_Ingres, Font_Ingres, Data_Registro, Colleccio_Procedencia,
                Tecnica, Any_Inicial, Any_Final, Num_Tiratge, Altres_Numeros_Identificacio, Baixa, Causa_Baixa, Data_Baixa, Persona_Autoritz_Baixa, Lloc_Procedencia,
                Lloc_Execucio, Bibliografia, Descripcio, Historia_Objecte, usuario_registra) 
                VALUES (:Num_Registro, :Nom_Objecte, :Autor, :Titol, :Nombre_Datacion, :Classificacio_Generica, :Mides_Maxima_Alcada_cm, :Mides_Maxima_Amplada_cm, :Mides_Maxima_Profunditat_cm,
                :Material, :Estat_Conservacio, :Valoracio_Economica_Euros, :Forma_Ingres, :Data_Ingres, :Font_Ingres, :Data_Registro, :Colleccio_Procedencia,
                :Tecnica, :Any_Inicial, :Any_Final, :Num_Tiratge, :Altres_Numeros_Identificacio, :Baixa, :Causa_Baixa, :Data_Baixa, :Persona_Autoritz_Baixa, :Lloc_Procedencia,
                :Lloc_Execucio, :Bibliografia, :Descripcio, :Historia_Objecte, :usuario_registra)";
    
        $db = $this->conectar();
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':Num_Registro', $idObra);
        $stmt->bindParam(':Nom_Objecte', $Nom_Objecte);
        $stmt->bindParam(':Autor', $Autor);
        $stmt->bindParam(':Titol', $Titol);
        $stmt->bindParam(':Nombre_Datacion', $Nombre_Datacion);
        $stmt->bindParam(':Classificacio_Generica', $Classificacio_Generica);
        $stmt->bindParam(':Mides_Maxima_Alcada_cm', $Mides_Maxima_Alcada_cm);
        $stmt->bindParam(':Mides_Maxima_Amplada_cm', $Mides_Maxima_Amplada_cm);
        $stmt->bindParam(':Mides_Maxima_Profunditat_cm', $Mides_Maxima_Profunditat_cm);
        $stmt->bindParam(':Material', $Material);
        $stmt->bindParam(':Estat_Conservacio', $Estat_Conservacio);
        $stmt->bindParam(':Valoracio_Economica_Euros', $Valoracio_Economica_Euros);
        $stmt->bindParam(':Forma_Ingres', $Forma_Ingres);
        $stmt->bindParam(':Data_Ingres', $Data_Ingres);
        $stmt->bindParam(':Font_Ingres', $Font_Ingres);
        $stmt->bindParam(':Data_Registro', $Data_Registro);
        $stmt->bindParam(':Colleccio_Procedencia', $Colleccio_Procedencia);
        $stmt->bindParam(':Tecnica', $Tecnica);
        $stmt->bindParam(':Any_Inicial', $Any_Inicial);
        $stmt->bindParam(':Any_Final', $Any_Final);
        $stmt->bindParam(':Num_Tiratge', $Num_Tiratge);
        $stmt->bindParam(':Altres_Numeros_Identificacio', $Altres_Numeros_Identificacio);
        $stmt->bindParam(':Baixa', $Baixa);
        $stmt->bindParam(':Causa_Baixa', $Causa_Baixa);
        $stmt->bindParam(':Data_Baixa', $Data_Baixa);
        $stmt->bindParam(':Persona_Autoritz_Baixa', $Persona_Autoritz_Baixa);
        $stmt->bindParam(':Lloc_Procedencia', $Lloc_Procedencia);
        $stmt->bindParam(':Lloc_Execucio', $Lloc_Execucio);
        $stmt->bindParam(':Bibliografia', $Bibliografia);
        $stmt->bindParam(':Descripcio', $Descripcio);
        $stmt->bindParam(':Historia_Objecte', $Historia);
        $stmt->bindParam(':usuario_registra', $Nom_Usuari_Registre);
    
        $stmt->execute();
    }

    public function guardarEnlace($idObra, $enlace) {
        $sql = "INSERT INTO obra_enlaces (id_obra, enlace) VALUES (?, ?)";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute([$idObra, $enlace]);
    }
    
}