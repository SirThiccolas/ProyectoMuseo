<?php

    use Spipu\Html2Pdf\Html2Pdf;
    // Crear instancia de Html2Pdf
    ob_start();
    ob_get_clean();
    $html2pdf = new Html2Pdf('L', 'A3', 'es'); // Orientación: 'L' (Horizontal), Tamaño: A3, Idioma: es
  

   // Agregar contenido HTML
    $html2pdf->writeHTML("
    <div class='main'>
        <img src='public/img/logo-pdf.png' alt='logo'>
        <div class ='a'>
        <img src='public/img-bd/".$ficha['Fotografia']." 'alt='Imatge obra'>
            <table class='info-table'>
                <tr>
                    <td>Nº de registre</td>
                    <td>".$ficha['Num_Registro']."</td>
                </tr>
                <tr>
                    <td>Objecte</td>
                    <td>".$ficha['Nom_Objecte']."</td>
                </tr>
                <tr>
                    <td>Autor</td>
                    <td>".$ficha['Autor']."</td>
                </tr>
                <tr>
                    <td>Titol</td>
                    <td>".$ficha['Titol']."</td>
                </tr>
                <tr>
                    <td>Datacio</td>
                    <td>".$ficha['Nombre_Datacion']."</td>
                </tr>
            </table>
        </div>
        <div class='taulaFichaBasicaMig'>
            <table>
                <tr>
                    <td>Classificacio</td>
                    <td>".$ficha['Classificacio_Generica']."</td>
                </tr>
                <tr>
                    <td>Mides</td>
                    <td>".$ficha['Mides_Maxima_Alcada_cm']." x ".$ficha['Mides_Maxima_Amplada_cm']." x ".$ficha['Mides_Maxima_Profunditat_cm']."</td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>".$ficha['Material']."</td>
                </tr>
                <tr>
                    <td>Conservacio</td>
                    <td>".$ficha['Estat_Conservacio']."</td>
                </tr>
                <tr>
                    <td>Valoracio economica</td>
                    <td>".$ficha['Valoracio_Economica_Euros']."</td>
                </tr>
            </table>
        </div>
        <div>
            <table>
                <tr>
                    <td>Forma d'ingres</td>
                    <td>".$ficha['Forma_Ingres']."</td>
                </tr>
                <tr>
                    <td>Data d'ingres</td>
                    <td>".$ficha['Data_Ingres']."</td>
                </tr>
                <tr>
                    <td>Font d'ingres</td>
                    <td>".$ficha['Font_Ingres']."</td>
                </tr>
                <tr>
                    <td>Lloc de procedencia</td>
                    <td>".$ficha['Lloc_Procedencia']."</td>
                </tr>
                <tr>
                    <td>Data de registre</td>
                    <td>".$ficha['Data_Registro']."</td>
                    
                </tr>
                <tr>
                    <td>Usuari que registra</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    ");
    ob_end_clean();
    // Generar y enviar el PDF al navegador (descarga directa)
    $html2pdf->output('FICHA BASICA'.$ficha['Num_Registro'].'.pdf', 'I'); // 'D': Descargar, 'I': Mostrar en el navegador