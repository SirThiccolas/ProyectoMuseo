<?php

require_once("app/models/Vocabulari.php");

class VocabularisController
{
    private $vocabulari;

    public function __construct()
    {
        $this->vocabulari = new Vocabulari();
    }

    public function mostrarVocabularis()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header("Location: index.php?controller=Login&action=loginForm");
            exit();
        }
        require_once 'app/views/templates/header.php';
        require_once 'app/views/VocabularisView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function mostrarTabla()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header("Location: index.php?controller=Login&action=loginForm");
            exit();
        }

        $id = $_GET['id'] ?? '';

        switch ($id) {
            case 'autores':
                $resultados = $this->vocabulari->getAutores();
                break;
            case 'causasBaja':
                $resultados = $this->vocabulari->getCausasBaja();
                break;
            case 'datacions':
                $resultados = $this->vocabulari->getDatacions();
                break;
            case 'estatsConservacio':
                $resultados = $this->vocabulari->getEstadosConservacion();
                break;
            case 'formesIngres':
                $resultados = $this->vocabulari->getFormasIngreso();
                break;
            case 'tipusExposicio':
                $resultados = $this->vocabulari->getTiposExposicion();
                break;
            default:
                echo "No s'ha trobat el vocabulari.";
                break;
        }
        require_once 'app/views/templates/header.php';
        require_once 'app/views/TablaVocabularioView.php';
        require_once 'app/views/templates/footer.html';
    }
}
