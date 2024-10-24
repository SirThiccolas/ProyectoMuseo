<?php
if ($ficha) {
?>
<body class="fichaGeneral">
    <div>
        <p>Fundacio Apel·les Fenosa</p>
        <div class="primera-fila">
            <div class="item1">
            <img src="public/img-bd/<?php echo $ficha[0]["Fotografia"]?>" alt="Imatge obra">
                <table>
                    <tr>
                        <td>Nº de registre</td>
                        <td><?php echo $ficha[0]["Num_Registro"]?></td>
                    </tr>
                    <tr>
                        <td>Objecte</td>
                        <td><?php echo $ficha[0]["Nom_Objecte"]?></td>
                    </tr>
                    <tr>
                        <td>Autor</td>
                        <td><?php echo $ficha[0]["Autor"]?></td>
                    </tr>
                    <tr>
                        <td>Titol</td>
                        <td><?php echo $ficha[0]["Titol"]?></td>
                    </tr>
                    <tr>
                        <td>Datacio</td>
                        <td><?php echo $ficha[0]["Datacio"]?></td>
                    </tr>
                </table>
            </div>
            <div class="item2">
                <table>
                    <tr>
                        <td>Classificacio</td>
                        <td><?php echo $ficha[0]["Classificacio_Generica"]?></td>
                    </tr>
                    <tr>
                        <td>Mides</td>
                        <td><?php echo $ficha[0]["Mides_Maxima_Alcada_cm"]?> x <?php echo $ficha[0]["Mides_Maxima_Amplada_cm"]?> x <?php echo $ficha[0]["Mides_Maxima_Profunditat_cm"]?></td>
                    </tr>
                    <tr>
                        <td>Material</td>
                        <td><?php echo $ficha[0]["Material"]?></td>
                    </tr>
                    <tr>
                        <td>Conservacio</td>
                        <td><?php echo $ficha[0]["Estat_Conservacio"]?></td>
                    </tr>
                    <tr>
                        <td>Valoracio economica</td>
                        <td><?php echo $ficha[0]["Valoracio_Economica_Euros"]?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="segunda-fila">
            <div class="item3">
                <table>
                    <tr>
                        <td>Forma d'ingres</td>
                        <td><?php echo $ficha[0]["Forma_Ingres"]?></td>
                    </tr>
                    <tr>
                        <td>Data d'ingres</td>
                        <td><?php echo $ficha[0]["Data_Ingres"]?></td>
                    </tr>
                    <tr>
                        <td>Font d'ingres</td>
                        <td><?php echo $ficha[0]["Font_Ingres"]?></td>
                    </tr>  
                    <tr>
                        <td>Data de registre</td>
                        <td><?php echo $ficha[0]["Data_Registro"]?></td>
                    </tr>
                    <tr>
                        <td>Usuari que registra</td>
                        <td>asd</td>
                    </tr>
                </table>
            </div>
            <div class="item4">
                <table>
                    <tr>
                        <td>Col·leccio de procedencia</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Tecnica</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Any d'inici/final</td>
                        <td>asd</td>
                    </tr>  
                    <tr>
                        <td>Nº Tiratge</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Altres numeros d'identificacio</td>
                        <td>asd</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="tercera-fila">
            <div class="item5">
                <table>
                    <tr>
                        <td>Baixa</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Causa de baixa</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Data de baixa</td>
                        <td>asd</td>
                    </tr>  
                    <tr>
                        <td>Persona autoritzada baixa</td>
                        <td>asd</td>
                    </tr>
                </table>
            </div>
            <div class="item6">
                <table>
                    <tr>
                        <td>Estat de conservacio</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Registre de moviments</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Lloc d'execucio</td>
                        <td>asd</td>
                    </tr>  
                    <tr>
                        <td>Lloc de procedencia</td>
                        <td>asd</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="extras">
            <table>
                <tr>
                    <td><a href="#" onclick="popupRestauraciones()">Restauracions</a></td>
                    <td><a href="#" onclick="popupExposiciones()">Exposicions</a></td>
                    <td><a href="#" onclick="popupBibliografia()">Bibliografia</a></td>
                    <td><a href="#" onclick="popupDescripcion()">Descripcio</a></td>
                    <td><a href="#" onclick="popupHistoria()">Historia de l'objecte</a></td>
                </tr>
            </table>
        </div>
        <nav>
            <a href="index.php?controller=Obres&action=mostrarObres">Volver</a>
            <a href="" alt="Icono descarga"><img src="public/img/icono-descarga.png"></a>
        </nav>
    </div>
</body>
<?php
} else {
    echo "No s'ha trobat aquesta ID.";
}

?>

<script src="public/js/PopUpsFicha.js"></script>