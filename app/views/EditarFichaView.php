    <?php if($ficha): ?>
    <body class="fichaGeneral">
        <div>
            <p>Fundacio Apel·les Fenosa</p>
            <form action="index.php?controller=Obres&action=editarFicha&id=<?php echo $ficha[0]["Num_Registro"]?>" method="post">
                <div class="primera-fila">
                    <div class="item1">
                        <div>
                            <img src="public/img-bd/<?php echo $ficha[0]["Fotografia"]?>" alt="Imatge obra">
                        </div>
                        <table>
                            <tr>
                                <td>Nº de registre</td>
                                <td><input type="text" name="Num_Registro" value="<?php echo $ficha[0]["Num_Registro"]?>"></td>
                            </tr>
                            <tr>
                                <td>Objecte</td>
                                <td><input type="text" name="Nom_Objecte" value="<?php echo $ficha[0]["Nom_Objecte"]?>"></td>
                            </tr>
                            <tr>
                                <td>Autor</td>
                                <td><select name="Autor">
                                        <option><?php echo $ficha[0]["Autor"]?></option>
                                    <?php
                                        foreach ($vocabulariAutores as $autor) {
                                            if ($autor["nombre"] != $ficha[0]["Autor"]) {
                                                echo "<option>". $autor["nombre"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Titol</td>
                                <td><input type="text" name="Titol" value="<?php echo $ficha[0]["Titol"]?>"></td>
                            </tr>
                            <tr>
                                <td>Datacio</td>
                                <td><select name="Nombre_Datacion">
                                        <option><?php echo "".$ficha[0]["Nombre_Datacion"]." (".$ficha[0]["Any_Inici_Datacio"]." / ".$ficha[0]["Any_Final_Datacio"].")";?></option>
                                    <?php
                                        foreach ($vocabulariDataciones as $datacion) {
                                            if ($datacion["datacio"] != $ficha[0]["Nombre_Datacion"]) {
                                                echo "<option>". $datacion["datacio"] ." (".$datacion["any_inici"]." / ".$datacion["any_final"].")</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                        </table>
                    </div>
                    <div class="item2">
                        <table>
                            <tr>
                                <td>Classificacio</td>
                                <td><select name="Classificacio_Generica">
                                        <option><?php echo $ficha[0]["Classificacio_Generica"]?></option>
                                    <?php
                                        foreach ($vocabulariClasificacionGenerica as $clasificacion) {
                                            if ($clasificacion["nombre"] != $ficha[0]["Classificacio_Generica"]) {
                                                echo "<option>". $clasificacion["nombre"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Mides</td>
                                <td><input type="text" name="Mides_Maxima_Alcada_cm" value="<?php echo $ficha[0]["Mides_Maxima_Alcada_cm"]?>"> x <input type="text" name="Mides_Maxima_Amplada_cm" value="<?php echo $ficha[0]["Mides_Maxima_Amplada_cm"]?>"> x <input type="text" name="Mides_Maxima_Profunditat_cm" value="<?php echo $ficha[0]["Mides_Maxima_Profunditat_cm"]?>"></td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td><select name="Material">
                                        <option><?php echo $ficha[0]["Material"]?></option>
                                    <?php
                                        foreach ($vocabulariMaterial as $material) {
                                            if ($material["material"] != $ficha[0]["Material"]) {
                                                echo "<option>". $material["material"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Conservacio</td>
                                <td><select name="Estat_Conservacio">
                                        <option><?php echo $ficha[0]["Estat_Conservacio"]?></option>
                                    <?php
                                        foreach ($vocabulariEstadosConservacion as $estadoConservacion) {
                                            if ($estadoConservacion["estado"] != $ficha[0]["Estat_Conservacio"]) {
                                                echo "<option>". $estadoConservacion["estado"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Valoracio economica</td>
                                <td><input type="" name="Valoracio_Economica_Euros" value="<?php echo $ficha[0]["Valoracio_Economica_Euros"]?>"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="segunda-fila">
                    <div class="item3">
                        <table>
                            <tr>
                                <td>Forma d'ingres</td>
                                <td><select name="Forma_Ingres">
                                        <option><?php echo $ficha[0]["Forma_Ingres"]?></option>
                                    <?php
                                        foreach ($vocabulariFormasIngreo as $formaIngres) {
                                            if ($formaIngres["forma"] != $ficha[0]["Forma_Ingres"]) {
                                                echo "<option>". $formaIngres["forma"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Data d'ingres</td>
                                <td><input type="date" name="Data_Ingres"><?php echo $ficha[0]["Data_Ingres"]?></td>
                            </tr>
                            <tr>
                                <td>Font d'ingres</td>
                                <td><input type="text" name="Font_Ingres" value="<?php echo $ficha[0]["Font_Ingres"]?>"></td>
                            </tr>  
                            <tr>
                                <td>Data de registre</td>
                                <td><input type="date" name="Data_Registro"><?php echo $ficha[0]["Data_Registro"]?></td>
                            </tr>
                            <tr>
                                <td>Usuari que registra</td>
                                <td><select name="Nom_Usuari">
                                        <option><?php echo $ficha[0]["Nom_Usuari"]?></option>
                                    <?php
                                        foreach ($usuaris as $usuari) {
                                            if ($usuari["Nom_Usuari"] != $ficha[0]["Nom_Usuari"] && $usuari["rol"] === "admin") {
                                                echo "<option>". $usuari["Nom_Usuari"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                        </table>
                    </div>
                    <div class="item4">
                        <table>
                            <tr>
                                <td>Col·leccio de procedencia</td>
                                <td><input type="text" name="Colleccio_Procedencia" value="<?php echo $ficha[0]["Colleccio_Procedencia"]?>"></td>
                            </tr>
                            <tr>
                                <td>Tecnica</td>
                                <td><select name="Tecnica">
                                        <option><?php echo $ficha[0]["Tecnica"]?></option>
                                    <?php
                                        foreach ($vocabulariTecnica as $tecnica) {
                                            if ($tecnica["tecnica"] != $ficha[0]["Tecnica"]) {
                                                echo "<option>". $tecnica["tecnica"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Any d'inici/final</td>
                                <td><input type="date" name="Any_Inicial"> / <input type="date" name="Any_Inicial"></td>
                            </tr>  
                            <tr>
                                <td>Nº Tiratge</td>
                                <td><input type="text" name="Num_Tiratge" value="<?php echo $ficha[0]["Num_Tiratge"]?>"></td>
                            </tr>
                            <tr>
                                <td>Altres numeros d'identificacio</td>
                                <td><input type="text" name="Altres_Numeros_Identificacio" value="<?php echo $ficha[0]["Altres_Numeros_Identificacio"]?>"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tercera-fila">
                    <div class="item5">
                        <table>
                            <tr>
                                <td>Baixa</td>
                                <td><select name="Baixa">
                                        <option><?php echo $ficha[0]["Baixa"]?></option>
                                    <?php
                                        if ($ficha[0]["Baixa"] === "no") {
                                            echo "<option>Si</option>";
                                        } else {
                                            echo "<option>No</option>";
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Causa de baixa</td>
                                <td><select name="Causa_Baixa">
                                        <option><?php echo $ficha[0]["Causa_Baixa"]?></option>
                                    <?php
                                        foreach ($vocabulariCausasBaja as $causabaja) {
                                            if ($causabaja["causa"] != $ficha[0]["Causa_Baixa"]) {
                                                echo "<option>". $causabaja["causa"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Data de baixa</td>
                                <td><input type="date" name="Data_Baixa"><?php echo $ficha[0]["Data_Baixa"]?></td>
                            </tr>  
                            <tr>
                                <td>Persona autoritzada baixa</td>
                                <td><select name="Persona_Autoritz_Baixa">
                                        <option><?php echo $ficha[0]["Nom_Usuari"]?></option>
                                    <?php
                                        foreach ($usuaris as $usuari) {
                                            if ($usuari["Nom_Usuari"] != $ficha[0]["Nom_Usuari"] && $usuari["rol"] === "admin") {
                                                echo "<option>". $usuari["Nom_Usuari"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select><?php echo $ficha[0]["Persona_Autoritz_Baixa"]?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="item6">
                        <table>
                            <tr>
                                <td>Estat de conservacio</td>
                                <td><select name="Estat_Conservacio">
                                        <option><?php echo $ficha[0]["Estat_Conservacio"]?></option>
                                    <?php
                                        foreach ($vocabulariEstadosConservacion as $estatconservacio) {
                                            if ($estatconservacio["estado"] != $ficha[0]["Estat_Conservacio"]) {
                                                echo "<option>". $estatconservacio["estado"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Lloc de procedencia</td>
                                <td><input type="text" name="Lloc_Procedencia" value="<?php echo $ficha[0]["Lloc_Procedencia"]?>"></td>
                            </tr>
                            <tr>
                                <td>Lloc d'execucio</td>
                                <td><input type="text" name="Lloc_Execucio" value="<?php echo $ficha[0]["Lloc_Execucio"]?>"></td>
                            </tr>  
                            <tr>
                                <td>Registre de moviments</td>
                                <td><a href="#" onclick="popupMovimentsFicha()">Veure registre</a></td>
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
                    <a href="index.php?controller=Obres&action=editarFicha">Actualitza</a>
                </nav>
            </form>
        </div>
    </body>
<?php endif; ?>
<script src="public/js/PopUpsFicha.js"></script>