<?php
        use Spipu\Html2Pdf\Html2Pdf;
        ob_start();
        $content = ob_get_clean();
        $html2pdf = new Html2pdf();


        $html = file_get_contents('app/views/FichasObrasView.php');
        $html2pdf->writeHTML("<p>Numero de registro: ". $ficha[0]["Num_Registro"] ."</p>");
        ob_end_clean();
        $html2pdf->output('ficha.pdf', 'I');
?>