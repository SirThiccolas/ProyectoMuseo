<?php

require_once 'app/models/Obres.php';


class ObresController
{
    private $modelobras;

    public function __construct() {
        $this->modelobras = new Obres();
    }

    public function mostrarObres()
    {
        $obres = $this->modelobras->getObras();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/PrincipalView.php';
        require_once 'app/views/templates/PopUps.php';
        require_once 'app/views/templates/footer.html';
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

    public function deleteObra()
    {
        
    }
}
