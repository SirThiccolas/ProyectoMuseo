<?php

function autocargar($nombreClase){
    include "app/controllers/$nombreClase.php";
}
spl_autoload_register("autocargar");


?>

