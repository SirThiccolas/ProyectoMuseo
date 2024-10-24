<?php

require_once 'app/models/Exposicions.php';

class ExposicionsController
{
    private $modelexposicions;
    public function mostrarExposicions()
    {
        $modelexposicions = new Exposicions();
        $exposicions = $modelexposicions->getExposicions();
        require_once 'app/views/templates/header.php';
        require_once 'app/views/ExposicionsView.php';
        require_once 'app/views/templates/footer.html';
    }
}
?>