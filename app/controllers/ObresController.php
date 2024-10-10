<?php

class ObresController
{
    private $modelobras;
    public function mostrarObres()
    {
        require_once 'app/models/Obres.php';
        $modelobras = new Obres();
        $obres = $modelobras->getObras();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/PrincipalView.php';
        require_once 'app/views/templates/footer.html';
    }
}
?>