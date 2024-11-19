<?php

require_once 'app/models/Obres.php';
require_once 'app/models/Users.php';
require_once 'app/models/Vocabulari.php';
require_once 'vendor/autoload.php';

class ObresController
{
    private $modelobras;
    private $modelvoc;
    private $modelusers;

    public function __construct() {
        $this->modelobras = new Obres();
    }

    public function mostrarObres()
    {
        $obres = $this->modelobras->getObras();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/PrincipalView.php';
        require_once 'app/views/templates/footer.html';
        require_once 'app/views/templates/PopUps.php';
        require_once 'app/views/templates/ConfirmarDeletes.php';
    }

    public function verFicha()
    {
        $id = $_GET['id'] ?? '';
        $tipoficha = $_GET['tipoficha'] ?? '';
        if ($tipoficha == "basica") {
            $ficha = $this->modelobras->verFichaBasica($id);
        } else {
            $ficha = $this->modelobras->verFichaGeneral($id);
            $moviments = $this->modelobras->verMovimentsFicha($id); 
            $restauracions = $this->modelobras->verRestauracionsFicha($id);
            $exposicions = $this->modelobras->verExposicionsFicha($id);
        }
        require_once 'app/views/FichasObrasView.php';
        require_once 'app/views/templates/PopUps.php';
    }

    public function editarFicha()
    {
        $this->modelvoc = new Vocabulari();
        $this->modelusers = new Users();
        $actualizarobra = new Obres();
        $id = $_GET['id'] ?? '';
        if ($_POST) {
            $idObra = $_POST["idObra"];
            $Nom_Objecte = $_POST["Nom_Objecte"];
            $Autor = $_POST["Autor"];
            $Titol = $_POST["Titol"];
            $Nombre_Datacion = $_POST["Nombre_Datacion"];
            $Classificacio_Generica = $_POST["Classificacio_Generica"];
            $Mides_Maxima_Alcada_cm = $_POST["Mides_Maxima_Alcada_cm"];
            $Mides_Maxima_Amplada_cm = $_POST["Mides_Maxima_Amplada_cm"];
            $Mides_Maxima_Profunditat_cm = $_POST["Mides_Maxima_Profunditat_cm"];
            $Material = $_POST["Material"];
            $Estat_Conservacio = $_POST["Estat_Conservacio"];
            $Valoracio_Economica_Euros = $_POST["Valoracio_Economica_Euros"];
            $Forma_Ingres = $_POST["Forma_Ingres"];
            $Data_Ingres = $_POST["Data_Ingres"];
            $Font_Ingres = $_POST["Font_Ingres"];
            $Data_Registro = $_POST["Data_Registro"];
            $Nom_Usuari_Registre = $_POST["Nom_Usuari_Registre"];
            $Colleccio_Procedencia = $_POST["Colleccio_Procedencia"];
            $Tecnica = $_POST["Tecnica"];
            $Any_Inicial = $_POST["Any_Inicial"];
            $Any_Final = $_POST["Any_Final"];
            $Num_Tiratge = $_POST["Num_Tiratge"];
            $Altres_Numeros_Identificacio = $_POST["Altres_Numeros_Identificacio"];
            $Baixa = $_POST["Baixa"];
            if ($Baixa === "Si") {
                $Causa_Baixa = $_POST["Causa_Baixa"];
                $Data_Baixa = $_POST["Data_Baixa"];
                $Persona_Autoritz_Baixa = $_POST["Persona_Autoritz_Baixa"];
            } else {
                $Causa_Baixa = null;
                $Data_Baixa = null;
                $Persona_Autoritz_Baixa = null;
            }
            $Lloc_Procedencia = $_POST["Lloc_Procedencia"];
            $Lloc_Execucio = $_POST["Lloc_Execucio"];
            $Bibliografia = $_POST["Bibliografia"];
            $Descripcio = $_POST["Descripcio"];
            $Historia = $_POST["Historia"];
            
            try {
                $actualizarobra->updateObra(
                    $idObra, $Nom_Objecte, $Autor, $Titol, $Nombre_Datacion, $Classificacio_Generica, 
                    $Mides_Maxima_Alcada_cm, $Mides_Maxima_Amplada_cm, $Mides_Maxima_Profunditat_cm, 
                    $Material, $Estat_Conservacio, $Valoracio_Economica_Euros, $Forma_Ingres, 
                    $Data_Ingres, $Font_Ingres, $Data_Registro, $Nom_Usuari_Registre, $Colleccio_Procedencia,
                    $Tecnica, $Any_Inicial, $Any_Final, $Num_Tiratge, $Altres_Numeros_Identificacio, 
                    $Baixa, $Causa_Baixa, $Data_Baixa, $Persona_Autoritz_Baixa, $Lloc_Procedencia,
                    $Lloc_Execucio, $Bibliografia, $Descripcio, $Historia
                );
                echo "<meta http-equiv='refresh' content='1;URL=index.php?controller=Obres&action=editarFicha&id=$idObra'/>"; 
            } catch (Exception $e) {
                echo "Error al actualizar la ficha: " . $e->getMessage();
            }
        } else {
            $ficha = $this->modelobras->verEditarFicha($id);
            $vocabulariAutores = $this->modelvoc->getAutores();
            $vocabulariCausasBaja = $this->modelvoc->getCausasBaja();
            $vocabulariDataciones = $this->modelvoc->getDatacions();
            $vocabulariEstadosConservacion = $this->modelvoc->getEstadosConservacion();
            $vocabulariFormasIngreo = $this->modelvoc->getFormasIngreso();
            $vocabulariTiposExposicion = $this->modelvoc->getTiposExposicion();
            $vocabulariMaterial = $this->modelvoc->getMaterial();
            $vocabulariTecnica = $this->modelvoc->getTecnica();
            $vocabulariCodigoGetty = $this->modelvoc->getCogigoGetty();
            $vocabulariClasificacionGenerica = $this->modelvoc->getClasificacionGenerica();
            $usuaris = $this->modelusers->getUsers();
            require_once 'app/views/EditarFichaView.php';
            require_once 'app/views/templates/PopUps.php';
        }
    }

    public function deleteObra()
    {
        $eliminarobra = new Obres();
        $idObra = $_GET['id'] ?? null;

        if (!$idObra) {
            echo "No ha arribat l'ID de l'obra.";
            echo "<meta http-equiv='refresh' content='2;url=index.php?controller=Obres&action=mostrarObres'>";
        } else {
            $eliminarobra->deleteObra($idObra);
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
        }
    }

    public function crearObra() {
        $crearobra = new Obres();
        $idObra = $_GET['id'] ?? null;

        if ($_POST) {
            echo "form enviado";
            echo "<meta http-equiv='refresh' content='2;url=index.php?controller=Obres&action=mostrarObres'>";
        } else {
            require_once 'app/views/CrearObraView.php';
        }
    }

    public function generarPDF() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    
        $modelo = new Obres();
        $ficha = $this->modelobras->verFichaGeneral($id);
    
        if (empty($ficha)) {
            echo "Error: No se encontró la ficha con el ID especificado.";
            exit;
        }
  
        require_once 'app/views/pruebaPdf.php';
        
    }
    
}
