<?php

require_once 'app/models/Obres.php';
require_once 'app/models/Users.php';
require_once 'app/models/Vocabulari.php';

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
        $id = $_GET['id'] ?? '';
        if ($_POST) {
            echo "jeje";
        } else {
            $ficha = $this->modelobras->verFichaGeneral($id);
            $moviments = $this->modelobras->verMovimentsFicha($id); 
            $restauracions = $this->modelobras->verRestauracionsFicha($id);
            $exposicions = $this->modelobras->verExposicionsFicha($id);
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
            return;
        }

        $eliminarobra->deleteObra($idObra);
        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Obres&action=mostrarObres'>";
    }

}
