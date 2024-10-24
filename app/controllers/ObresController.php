<?php

require_once 'app/models/Obres.php';

class ObresController
{
    private $modelobras;
    private $verficha;
    public function mostrarObres()
    {
        $modelobras = new Obres();
        $obres = $modelobras->getObras();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/PrincipalView.php';
        require_once 'app/views/templates/footer.html';
    }
    public function veureFichaBasica()
    {
        $id = $_GET['id'] ?? '';
        $verficha = new Obres();
        $ficha = $verficha->verFicha($id);
        require_once 'app/views/FichaBasicaView.php';
    }
    public function veureFichaGeneral()
    {
        $id = $_GET['id'] ?? '';
        $verficha = new Obres();
        $ficha = $verficha->verFicha($id);
        require_once 'app/views/templates/PopUps.php';
        require_once 'app/views/FichaGeneralView.php';
    }}
?>