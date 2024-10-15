<?php

require_once("app/models/Vocabulari.php");

class VocabularisController
{
    private $vocabulari;

    public function __construct()
    {
        $this->vocabulari = new Vocabulari();
    }

    // Mostrar tablas
    public function mostrarVocabularis()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            echo "<meta http-equiv='refresh' content:'0;url=index.php?controller=Login&action=loginForm'>";
        } else if ($_SESSION['rol'] !== 'admin') {
            echo "<meta http-equiv='refresh' content:'0;url=index.php?controller=Obres&action=mostrarObres'>";
        }
        require_once 'app/views/templates/header.php';
        require_once 'app/views/VocabularisView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function mostrarTabla()
    {
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
            case 'material':
                $resultados = $this->vocabulari->getMaterial();
                break;
            case 'tecnica':
                $resultados = $this->vocabulari->getTecnica();
                break;
            default:
                echo "No s'ha trobat el vocabulari.";
                break;
        }
        require_once 'app/views/templates/header.php';
        require_once 'app/views/TablaVocabularioView.php';
        require_once 'app/views/templates/footer.html';
    }

    // Actualizar
    public function editarVocabulari()
    {
        $vocabulario = $_GET['vocabulari'] ?? null;
        $id = $_GET['id'] ?? null;

        // Comprobar si se reciben los parámetros necesarios
        if ($vocabulario === null || $id === null) {
            echo "No s'han rebut els atributs necessaris.";
        }

        // Obtener el vocabulario actual para mostrar en el formulario
        $vocabularioActual = $this->vocabulari->getVocabulariById($id, $vocabulario);
        if (!$vocabularioActual) {
            echo "No s'ha trobat cap vocabulari amb aquest ID.";
        }

        // Cargar la vista de edición
        require_once 'app/views/EditarVocabulariView.php';
    }

    public function actualizarVocabulari()
    {
        // Obtener los parámetros necesarios
        $vocabulario = $_POST['vocabulario'] ?? null;
        $id = $_POST['id'] ?? null;

        // Comprobar si se reciben los parámetros necesarios
        if ($vocabulario === null || $id === null) {
            echo "No s'han rebut els atributs necessaris.";
        }

        // Obtener otros campos del formulario según el tipo de vocabulario
        switch ($vocabulario) {
            case 'autores':
                $nombre = $_POST['nombre'] ?? '';
                $this->vocabulari->updateAutor($id, $nombre);
                break;
            case 'causasBaja':
                $causa = $_POST['causa'] ?? '';
                $this->vocabulari->updateCausaBaja($id, $causa);
                break;
            case 'datacions':
                $datacio = $_POST['datacio'] ?? '';
                $any_inici = $_POST['any_inici'] ?? '';
                $any_final = $_POST['any_final'] ?? '';
                $this->vocabulari->updateDatacion($id, $datacio, $any_inici, $any_final);
                break;
            case 'estatsConservacio':
                $estado = $_POST['estado'] ?? '';
                $this->vocabulari->updateEstadoConservacion($id, $estado);
                break;
            case 'formesIngres':
                $forma = $_POST['forma'] ?? '';
                $this->vocabulari->updateFormaIngreso($id, $forma);
                break;
            case 'tipusExposicio':
                $tipo = $_POST['tipo'] ?? '';
                $this->vocabulari->updateTipoExposicion($id, $tipo);
                break;
            case 'material':
                $material = $_POST['material'] ?? '';
                $this->vocabulari->updateMaterial($id, $material);
                break;
            case 'tecnica':
                $tecnica = $_POST['tecnica'] ?? '';
                $this->vocabulari->updateTecnica($id, $tecnica);
                break;
            default:
                echo "No s'ha fet cap canvi.";
        }

        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarVocabularis'>";
    }


    public function mostrarFormularioCrear()
    {

        $id = $_GET['id'] ?? '';

        require_once 'app/views/templates/header.php';
        require_once 'app/views/FormularioCrearVocabularioView.php';
        require_once 'app/views/templates/footer.html';
    }

    public function crearVocabulari()
    {
        $vocabulari = $_POST['vocabulari'] ?? null;

        if ($vocabulari === null) {
            echo "No s'ha fet cap canvi.";
        }

        switch ($vocabulari) {
            case 'autores':
                $nombre = $_POST['nombre'] ?? '';
                $this->vocabulari->insertarAutor($nombre);
                break;
            case 'causasBaja':
                $causa = $_POST['causa'] ?? '';
                $this->vocabulari->insertarCausaBaja($causa);
                break;
            case 'datacions':
                $datacio = $_POST['datacio'] ?? '';
                $any_inici = $_POST['any_inici'] ?? '';
                $any_final = $_POST['any_final'] ?? '';
                $this->vocabulari->insertarDatacio($datacio, $any_inici, $any_final);
                break;
            case 'estatsConservacio':
                $estado = $_POST['estado'] ?? '';
                $this->vocabulari->insertarEstadoConservacion($estado);
                break;
            case 'formesIngres':
                $forma = $_POST['forma'] ?? '';
                $this->vocabulari->insertarFormaIngreso($forma);
                break;
            case 'tipusExposicio':
                $tipo = $_POST['tipo'] ?? '';
                $this->vocabulari->insertarTipoExposicion($tipo);
                break;
            case 'material':
                $material = $_POST['material'] ?? '';
                $this->vocabulari->insertarMaterial($material);
                break;
            case 'tecnica':
                $tecnica = $_POST['tecnica'] ?? '';
                $this->vocabulari->insertarTecnica($tecnica);
                break;
            default:
                echo "No s'ha fet cap canvi.";
        }

        echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarTabla&id=$vocabulari'>";
    }

    public function eliminarVocabulari()
    {
        $vocabulario = $_GET['vocabulari'] ?? null;
        $id = $_GET['id'] ?? null;

        // Comprobar si se reciben los parámetros necesarios
        if ($vocabulario === null || $id === null) {
            echo "No s'han rebut els atributs necessaris.";
        }

        // Obtener el vocabulario actual para mostrar en el formulario
        $vocabularioActual = $this->vocabulari->getVocabulariById($id, $vocabulario);
        if (!$vocabularioActual) {
            echo "No s'ha trobat cap vocabulari amb aquest ID.";
        }

        // Cargar la vista de edición
        require_once 'app/views/EliminarVocabulariView.php';
    }

    public function confirmarEliminarVocabulari()
    {
        $opcion = $_POST['opcio'];
        if ($opcion == "si") {
            $vocabulario = $_POST['vocabulario'] ?? null;
            $id = $_POST['id'] ?? null;
            if ($vocabulario === null || $id === null) {
                echo "No s'han rebut els atributs necessaris.";
            }
            switch ($vocabulario) {
                case 'autores':
                    $this->vocabulari->deleteAutor($id);
                    break;
                case 'causasBaja':
                    $this->vocabulari->deleteCausaBaja($id);
                    break;
                case 'datacions':
                    $this->vocabulari->deleteDatacion($id);
                    break;
                case 'estatsConservacio':
                    $this->vocabulari->deleteEstadoConservacion($id);
                    break;
                case 'formesIngres':
                    $this->vocabulari->deleteFormaIngreso($id);
                    break;
                case 'tipusExposicio':
                    $this->vocabulari->deleteTipoExposicion($id);
                    break;
                case 'material':
                    $this->vocabulari->deleteMaterial($id);
                    break;
                case 'tecnica':
                    $this->vocabulari->deleteTecnica($id);
                    break;
                default:
                    echo "No s'ha fet cap canvi.";
            }
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarVocabularis'>";
        } else {
            echo "<meta http-equiv='refresh' content='0;url=index.php?controller=Vocabularis&action=mostrarVocabularis'>";
        }
    }
}
