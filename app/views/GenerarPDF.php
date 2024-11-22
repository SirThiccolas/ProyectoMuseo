<?php
        use Spipu\Html2Pdf\Html2Pdf;
        ob_start();
        ob_get_clean();
        $html2pdf = new Html2Pdf('L', 'A3', 'es');
        
        $html2pdf->writeHTML("
               <style>
        /* Estilo general */
        .main {
            display: flex;
            max-width: 100%;
            margin: auto;
            gap: 20px;
        }
        /* Imagen grande a la izquierda */
        .imagen-obra {
            flex: 1; /* La imagen ocupa 1/3 del espacio */
        }
        .imagen-obra img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
    
        /* Contenedor de las tablas */
        .informacio {
            flex: 2; /* Las tablas ocupan 2/3 del espacio */
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    
        /* Estilo de filas */
        .fila {
            display: flex;
            gap: 20px;
        }
    
        /* Cuadros dentro de filas */
        .item {
            flex: 1;
            border: 1px solid black;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        /* Cuadro de extras que ocupa toda la fila */
        .extras {
            border: 1px solid black;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        /* Estilo de tablas dentro de cuadros */
        th {
            text-align: left;
            width: 200px;
            padding-right: 10px;
        }
        td {
            word-wrap: break-word;
        }
    </style>
    
            
            
        <div class='main'>
                <div class='imagen-obra'>
                    <img src='public/img-bd/".$ficha[0]['Fotografia']."' alt='Imatge obra'>
                </div>
                <div class='informacio'>
                    <div class='fila'>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Nº de registre</th>
                                            <td>". $ficha[0]['Num_Registro']."</td>
                                    </tr>
                                    <tr>
                                            <th>Objecte</th>
                                            <td>". $ficha[0]['Nom_Objecte']."</td>
                                    </tr>
                                    <tr>
                                            <th>Autor</th>
                                            <td>". $ficha[0]['Autor']."</td>
                                    </tr>
                                    <tr>
                                            <th>Titol</th>
                                            <td>". $ficha[0]['Titol']."</td>
                                    </tr>
                                    <tr>
                                            <th>Datacio</th>
                                            <td>". $ficha[0]['Nombre_Datacion']."</td>
                                    </tr>
                                    </table>
                            </div>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Classificacio</th>
                                            <td>". $ficha[0]['Classificacio_Generica']."</td>
                                    </tr>
                                    <tr>
                                            <th>Mides</th>
                                            <td>a x b x c</td>
                                    </tr>
                                    <tr>
                                            <th>Material</th>
                                            <td>". $ficha[0]['Material']."</td>
                                    </tr>
                                    <tr>
                                            <th>Conservacio</th>
                                            <td>". $ficha[0]['Estat_Conservacio']."</td>
                                    </tr>
                                    <tr>
                                            <th>Valoracio economica</th>
                                            <td>". $ficha[0]['Valoracio_Economica_Euros']."</td>
                                    </tr>
                                    </table>
                            </div>
                    </div>
                    <div class='fila'>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Forma d'ingres</th>
                                            <td>". $ficha[0]['Forma_Ingres']."</td>
                                    </tr>
                                    <tr>
                                            <th>Data d'ingres</th>
                                            <td>". $ficha[0]['Data_Ingres']."</td>
                                    </tr>
                                    <tr>
                                            <th>Font d'ingres</th>
                                            <td>". $ficha[0]['Font_Ingres']."</td>
                                    </tr>  
                                    <tr>
                                            <th>Data de registre</th>
                                            <td>". $ficha[0]['Data_Registro']."</td>
                                    </tr>
                                    <tr>
                                            <th>Usuari que registra</th>
                                            <td>". $ficha[0]['Nom_Usuari_Registre']."</td>
                                    </tr>
                                    </table>
                            </div>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Col·leccio de procedencia</th>
                                            <td>". $ficha[0]['Colleccio_Procedencia']."</td>
                                    </tr>
                                    <tr>
                                            <th>Tecnica</th>
                                            <td>". $ficha[0]['Tecnica']."</td>
                                    </tr>
                                    <tr>
                                            <th>Any d'inici/final</th>
                                            <td>". $ficha[0]['Any_Inicial']." / ".$ficha[0]['Any_Final']."</td>
                                    </tr>  
                                    <tr>
                                            <th>Nº Tiratge</th>
                                            <td>". $ficha[0]['Num_Tiratge']."</td>
                                    </tr>
                                    <tr>
                                            <th>Altres numeros d'identificacio</th>
                                            <td>". $ficha[0]['Altres_Numeros_Identificacio']."</td>
                                    </tr>
                                    </table>
                            </div>
                    </div>
                    <div class='fila'>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Baixa</th>
                                            <td>". $ficha[0]['Baixa']."</td>
                                    </tr>
                                    <tr>
                                            <th>Causa de baixa</th>
                                            <td>". $ficha[0]['Causa_Baixa']."</td>
                                    </tr>
                                    <tr>
                                            <th>Data de baixa</th>
                                            <td>". $ficha[0]['Data_Baixa']."</td>
                                    </tr>  
                                    <tr>
                                            <th>Persona autoritzada baixa</th>
                                            <td>". $ficha[0]['Nom_Usuari_Baixa']."</td>
                                    </tr>
                                    </table>
                            </div>
                            <div class='item'>
                                    <table>
                                    <tr>
                                            <th>Estat de conservacio</th>
                                            <td>". $ficha[0]['Estat_Conservacio']."</td>
                                    </tr>
                                    <tr>
                                            <th>Lloc de procedencia</th>
                                            <td>". $ficha[0]['Lloc_Procedencia']."</td>
                                    </tr>
                                    <tr>
                                            <th>Lloc d'execucio</th>
                                            <td>". $ficha[0]['Lloc_Execucio']."</td>
                                    </tr>
                                    <tr>
                                            <th></th>
                                    </tr>
                                    </table>
                            </div>
                    </div>
                    <div class='extras'>
                        <table>
                            <tr>
                                <th>Bibliografia</th>
                                <td>". $ficha[0]['Bibliografia']."</td>
                            </tr>
                            <tr>
                                <th>Descripcio</th>
                                <td>". $ficha[0]['Descripcio']."</td>
                            </tr>
                            <tr>
                                <th>Historia de l'objecte</th>
                                <td>". $ficha[0]['Historia_Objecte']."</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
        ");
        
        ob_end_clean();
        $html2pdf->output("FICHA GENERAL " . $ficha[0]["Num_Registro"] . ".pdf", 'I');
        
?>