<?php

require_once 'app/models/Exposicions.php';

class ExposicionsController
{
    private $modelexposicions;
    private $crearExpo;
    private $editarExpo;
    private $eliminarExpo;
    
    public function mostrarExposicions()
    {
        $modelexposicions = new Exposicions();
        $exposicions = $modelexposicions->getExposicions();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/ExposicionsView.php';
        require_once 'app/views/templates/footer.html';
        require_once 'app/views/templates/ConfirmarDeletes.php';
        
    }

    public function crearExposicio()
    {
        if ($_POST) {
            $nomExpo = $_POST['nom_expo'];
            $dataIniciExpo = $_POST['data_inici'];
            $dataFiExpo = $_POST['data_fi'];
            $tipusExpo = $_POST['tipus_expo'];
            $llocExpo = $_POST['lloc_expo'];


            $crearExpo = new Exposicions();
            $crearExpo->createExposicio($nomExpo, $dataIniciExpo, $dataFiExpo, $tipusExpo, $llocExpo);

            if ($confExpo) {
                require_once 'app/views/templates/header.php';
                require_once 'app/views/CrearExposicioView.php';
                require_once 'app/views/templates/footer.html';
            }
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Exposicions&action=mostrarExposicions'>";
        } else {
            require_once 'app/views/templates/header.php';
            require_once 'app/views/CrearExposicioView.php';
            require_once 'app/views/templates/footer.html';
        }
    }

    public function editarExposicio()
    {
        $idExpo = $_GET['id'];
        $editarExpo = new Exposicions();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomExpo = $_POST['nom_expo'];
            $dataIniciExpo = $_POST['data_inici'];
            $dataFiExpo = $_POST['data_fi'];
            $tipusExpo = $_POST['tipus_expo'];
            $llocExpo = $_POST['lloc_expo'];

            $editarExpo->updateExposicions($idExpo, $nomExpo, $dataIniciExpo, $dataFiExpo, $tipusExpo, $llocExpo);

            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Exposicions&action=mostrarExposicions'>";
        } else {
            $expo = $editarExpo->getExposicioById($idExpo);
            
            require_once 'app/views/templates/header.php';
            require_once 'app/views/EditarExposicioView.php';
            require_once 'app/views/templates/footer.html';
        }
    }

    public function eliminarExposicio()
    {
        $eliminarExpo = new Exposicions();
        $idExpo = $_GET['id'] ?? null;
    
        if (!$idExpo) {
            echo "No ha arribat l'ID de l'usuari.";
            echo "<meta http-equiv='refresh' content='2;url=index.php?controller=Exposicions&action=mostrarExposicions'>";
        
        } else {
            $eliminarExpo->deleteExposicio($idExpo);
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Exposicions&action=mostrarExposicions'>";
            }
    
    }
    
    
    public function mostrarObresExpuestas()
    {   
        $modelexposicions = new Exposicions();
        $idExpo = $_GET['id'];
        $obresexpo = $modelexposicions->getObresExpuestas($idExpo);
        require_once 'app/views/templates/header.php';
        require_once 'app/views/ObresExposadesView.php';
        require_once 'app/views/templates/footer.html';

    }
}

?>