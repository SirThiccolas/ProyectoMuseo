<?php

require_once 'app/models/Restauracions.php';

class RestauracionsController
{
    private $modelrestauracions;
    public function mostrarRestauracions()
    {
        $modelrestauracions = new Restauracions();
        $restauracions = $modelrestauracions->getRestauracions();
        require_once 'app/views/templates/PopUps.php';
        require_once 'app/views/templates/header.php';
        require_once 'app/views/RestauracionsView.php';
        require_once 'app/views/templates/footer.html';
    }
}
?>