<?php

class LogoutController
{
    public function cerrarSesion()
    {
        session_destroy();
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
}
?>