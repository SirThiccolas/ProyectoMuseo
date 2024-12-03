<?php
    use Spipu\Html2Pdf\Html2Pdf;
    ob_start();
    ob_get_clean();
    $html2pdf = new Html2Pdf();

    $html2pdf->writeHTML("
    <style>
        .main {
            position: relative;
            display: inline-block;
        }      

        .a {
            position: absolute;
            top: -300px;
            left: 10px;
            z-index: 2;
        }

        .main img {
            position: relative;
            z-index: 1;
            top: 300px;
            width: 700px;
        }

        .layout-table {
            width: 100%;
            border-collapse: collapse;
        }

        .layout-table td {
            vertical-align: top;
            padding: 10px;
        }

        .informacio {
            width: 100%;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td, .info-table th {
            padding: 5px;
            padding-right: 10px;
            width: 25%;
        }
        .info-table td {
            border-right: 1px solid gray;
        }
        .info-table h3 {
            font-size: 12px;
            margin: 0;
        }

        .info-table p {
            font-size: 12px;
            margin: 0;
            padding-left: 10px;
        }

        .imagen {
            border: none;
        }
            
        .imagen img {
            height: 120px;
            width: auto;
            margin-bottom: 30px;
        }
        
        .extras {
            left: 30px;
            padding-top: 80px;
            margin-left: 13px;
        }

        .extras div {
            margin-bottom: 10px;
        }

        .extras h3 {
            font-size: 12px;
            margin: 5px 0;
        }

        .extras p {
            font-size: 12px;
        }
    </style>
    <div class='main'>
        <img src='public/img/logo-pdf.png' alt='logo'>
        <div class='a'>
            <table class='layout-table'>
                <tr>
                    <td class='informacio'>
                        <table class='info-table'>
                            <tr>
                                <td class='imagen'>
                                    <img src='public/img-bd/".$ficha[0]['Fotografia']."' alt='Imatge obra'>
                                </td>
                            </tr>
                            <tr>
                                <th><h3>Nº de registre</h3></th>
                                <td><p>".$ficha[0]['Num_Registro']."</p></td>
                                <th><h3>Classificacio</h3></th>
                                <td><p>".$ficha[0]['Classificacio_Generica']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Objecte</h3></th>
                                <td><p>".$ficha[0]['Nom_Objecte']."</p></td>
                                <th><h3>Mides</h3></th>
                                <td><p>".$ficha[0]['Mides_Maxima_Alcada_cm']." x ". $ficha[0]['Mides_Maxima_Amplada_cm']." x ". $ficha[0]['Mides_Maxima_Profunditat_cm']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Autor</h3></th>
                                <td><p>".$ficha[0]['Autor']."</p></td>
                                <th><h3>Material</h3></th>
                                <td><p>".$ficha[0]['Material']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Titol</h3></th>
                                <td><p>".$ficha[0]['Titol']."</p></td>
                                <th><h3>Conservacio</h3></th>
                                <td><p>".$ficha[0]['Estat_Conservacio']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Datacio</h3></th>
                                <td><p>".$ficha[0]['Nombre_Datacion']."</p></td>
                                <th><h3>Valoracio economica</h3></th>
                                <td><p>".$ficha[0]['Valoracio_Economica_Euros']."</p></td>
                            </tr>
                        </table>
                        <br><br>
                        <table class='info-table'>
                            <tr>
                                <th><h3>Forma d'ingres</h3></th>
                                <td><p>". $ficha[0]['Forma_Ingres']."</p></td>
                                <th><h3>Col·leccio de procedencia</h3></th>
                                <td><p>". $ficha[0]['Colleccio_Procedencia']."</p></td>
                            </tr>   
                            <tr>
                                <th><h3>Data d'ingres</h3></th>
                                <td><p>". $ficha[0]['Data_Ingres']."</p></td>
                                <th><h3>Tecnica</h3></th>
                                <td><p>". $ficha[0]['Tecnica']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Font d'ingres</h3></th>
                                <td><p>". $ficha[0]['Font_Ingres']."</p></td>
                                <th><h3>Any d'inici/final</h3></th>
                                <td><p>". $ficha[0]['Any_Inicial']." / ".$ficha[0]['Any_Final']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Data de registre</h3></th>
                                <td><p>". $ficha[0]['Data_Registro']."</p></td>
                                <th><h3>Nº Tiratge</h3></th>
                                <td><p>". $ficha[0]['Num_Tiratge']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Usuari que registra</h3></th>
                                <td><p>". $ficha[0]['Nom_Usuari_Registre']."</p></td>
                                <th><h3>Altres identificadors</h3></th>
                                <td><p>". $ficha[0]['Altres_Numeros_Identificacio']."</p></td>
                            </tr>
                        </table>
                        <br><br>
                        <table class='info-table'>
                            <tr>
                                <th><h3>Baixa</h3></th>
                                <td><p>". $ficha[0]['Baixa']."</p></td>
                                <th><h3>Estat de conservacio</h3></th>
                                <td><p>". $ficha[0]['Estat_Conservacio']."</p></td>
                            </tr>
                            <tr>   
                                <th><h3>Causa de baixa</h3></th>
                                <td><p>". $ficha[0]['Causa_Baixa']."</p></td>
                                <th><h3>Lloc de procedencia</h3></th>
                                <td><p>". $ficha[0]['Lloc_Procedencia']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Data de baixa</h3></th>
                                <td><p>". $ficha[0]['Data_Baixa']."</p></td>
                                <th><h3>Lloc d'execucio</h3></th>
                                <td><p>". $ficha[0]['Lloc_Execucio']."</p></td>
                            </tr>
                            <tr>
                                <th><h3>Persona autoritzada baixa</h3></th>
                                <td><p>". $ficha[0]['Nom_Usuari_Baixa']."</p></td>
                            </tr>
                        </table>
                    </td>
                </tr>
        </table>
        <div class='extras'>
                <div>
                        <h3>Bibliografia</h3>
                        <p>".$ficha[0]['Bibliografia']."</p>
                </div>
                <div>
                        <h3>Descripcio</h3>
                        <p>".$ficha[0]['Descripcio']."</p>
                </div>
                <div>
                        <h3>Historia de l'objecte</h3>
                        <p>".$ficha[0]['Historia_Objecte']."</p>
                </div>
        </div>
        </div>
    </div>
    ");
    
    ob_end_clean();
    $html2pdf->output("FICHA GENERAL " . $ficha[0]["Num_Registro"] . ".pdf", 'I');
?>
