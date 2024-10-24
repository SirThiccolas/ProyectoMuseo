<?php
if ($ficha) {
?>
<body class="fichaBasica">
    <div>
        <p>Fundacio Apel·les Fenosa</p>
        <div>
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
        <div class="taulaFichaBasicaMig">
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
        <div>
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
                    <td>Lloc de procedencia</td>
                    <td><?php echo $ficha[0]["Lloc_Procedencia"]?></td>
                </tr>
                <tr>
                    <td>Data de registre</td>
                    <td><?php echo $ficha[0]["Data_Registro"]?></td>
                </tr>
                <tr>
                    <td>Usuari que registra</td>
                    <td></td>
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