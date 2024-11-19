    <?php if($ficha): ?>
    <body class="editarFicha">
        <div>
            <p>Fundacio Apel·les Fenosa</p>
            <form action="index.php?controller=Obres&action=editarFicha&id=<?php echo $ficha[0]["Num_Registro"]?>" method="post">
                <input type="hidden" name="idObra" value="<?php echo $ficha[0]["Num_Registro"]?>">    
                <div class="primera-fila">
                    <div class="item1">
                        <div>
                            <img src="public/img-bd/<?php echo $ficha[0]["Fotografia"]?>" alt="Imatge obra">
                        </div>
                        <table>
                            <tr>
                                <td>Nº de registre</td>
                                <td><?php echo $ficha[0]["Num_Registro"]?></td>
                            </tr>
                            <tr>
                                <td>Objecte</td>
                                <td><input type="text" name="Nom_Objecte" value="<?php echo $ficha[0]["Nom_Objecte"]?>"></td>
                            </tr>
                            <tr>
                                <td>Autor</td>
                                <td><select name="Autor">
                                        <option value="<?php echo $ficha[0]["FK_Autor"]?>"><?php echo $ficha[0]["Autor"]?></option>
                                    <?php
                                        foreach ($vocabulariAutores as $autor) {
                                            if ($autor["nombre"] != $ficha[0]["Autor"]) {
                                                echo "<option value='".$autor["id"]."'>". $autor["nombre"] ."</option>";
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
                                        <option value="<?php echo $ficha[0]["FK_Datacio"]?>"><?php echo "".$ficha[0]["Nombre_Datacion"]." (".$ficha[0]["Any_Inici_Datacio"]." / ".$ficha[0]["Any_Final_Datacio"].")";?></option>
                                    <?php
                                        foreach ($vocabulariDataciones as $datacion) {
                                            if ($datacion["datacio"] != $ficha[0]["Nombre_Datacion"]) {
                                                echo "<option value='".$datacion["id"]."'>". $datacion["datacio"] ." (".$datacion["any_inici"]." / ".$datacion["any_final"].")</option>";
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
                                        <option value="<?php echo $ficha[0]["FK_Classificacio"]?>"><?php echo $ficha[0]["Classificacio_Generica"]?></option>
                                    <?php
                                        foreach ($vocabulariClasificacionGenerica as $clasificacion) {
                                            if ($clasificacion["nombre"] != $ficha[0]["Classificacio_Generica"]) {
                                                echo "<option value='".$clasificacion["id"]."'>". $clasificacion["nombre"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr class="medidas">
                                <td>Mides</td>
                                <td><input type="text" name="Mides_Maxima_Alcada_cm" value="<?php echo $ficha[0]["Mides_Maxima_Alcada_cm"]?>"> x <input type="text" name="Mides_Maxima_Amplada_cm" value="<?php echo $ficha[0]["Mides_Maxima_Amplada_cm"]?>"> x <input type="text" name="Mides_Maxima_Profunditat_cm" value="<?php echo $ficha[0]["Mides_Maxima_Profunditat_cm"]?>"></td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td><select name="Material">
                                        <option value="<?php echo $ficha[0]["FK_Material"]?>"><?php echo $ficha[0]["Material"]?></option>
                                    <?php
                                        foreach ($vocabulariMaterial as $material) {
                                            if ($material["material"] != $ficha[0]["Material"]) {
                                                echo "<option value='".$material["id"]."'>". $material["material"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Conservacio</td>
                                <td><select name="Estat_Conservacio">
                                        <option value="<?php echo $ficha[0]["FK_Estat_Conservacio"]?>"><?php echo $ficha[0]["Estat_Conservacio"]?></option>
                                    <?php
                                        foreach ($vocabulariEstadosConservacion as $estadoConservacion) {
                                            if ($estadoConservacion["estado"] != $ficha[0]["Estat_Conservacio"]) {
                                                echo "<option value='".$estadoConservacion["id"]."'>". $estadoConservacion["estado"] ."</option>";
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
                                        <option value="<?php echo $ficha[0]["FK_Forma_Ingres"]?>"><?php echo $ficha[0]["Forma_Ingres"]?></option>
                                    <?php
                                        foreach ($vocabulariFormasIngreo as $formaIngres) {
                                            if ($formaIngres["forma"] != $ficha[0]["Forma_Ingres"]) {
                                                echo "<option value='".$formaIngres["id"]."'>". $formaIngres["forma"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Data d'ingres</td>
                                <td>
                                <input type="date" name="Data_Ingres" value="<?php echo htmlspecialchars($ficha[0]["Data_Ingres"]); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Font d'ingres</td>
                                <td><input type="text" name="Font_Ingres" value="<?php echo $ficha[0]["Font_Ingres"]?>"></td>
                            </tr>  
                            <tr>
                                <td>Data de registre</td>
                                <td>
                                <input type="date" name="Data_Registro" value="<?php echo htmlspecialchars($ficha[0]["Data_Registro"]); ?>">
                                </td>

                            </tr>
                            <tr>
                                <td>Usuari que registra</td>
                                <td><select name="Nom_Usuari_Registre">
                                        <option value="<?php echo $ficha[0]["FK_Usuari_Registra"]?>"><?php echo $ficha[0]["Nom_Usuari"]?></option>
                                    <?php
                                        foreach ($usuaris as $usuari) {
                                            if ($usuari["Nom_Usuari"] != $ficha[0]["Nom_Usuari"] && $usuari["Rol"] === "admin") {
                                                echo "<option value='".$usuari["ID_Usuari"]."'>". $usuari["Nom_Usuari"] ."</option>";
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
                                        <option value="<?php echo $ficha[0]["FK_Tecnica"]?>"><?php echo $ficha[0]["Tecnica"]?></option>
                                    <?php
                                        foreach ($vocabulariTecnica as $tecnica) {
                                            if ($tecnica["tecnica"] != $ficha[0]["Tecnica"]) {
                                                echo "<option value='".$tecnica["id"]."'>". $tecnica["tecnica"] ."</option>";
                                            }
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr class="inici-final">
                                <td>Any d'inici/final</td>
                                <td>
                                <input type="number" name="Any_Inicial" value="<?php echo htmlspecialchars($ficha[0]["Any_Inicial"]); ?>"> / <input type="number" name="Any_Final" value="<?php echo htmlspecialchars($ficha[0]["Any_Final"]); ?>">
                                </td>
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
                                <td>
                                    <select name="Baixa" id="baixa">
                                        <option value="<?php echo ($ficha[0]["Baixa"] == 'Si') ? 'Si' : 'No'; ?>"><?php echo $ficha[0]["Baixa"] ?></option>
                                        <?php
                                            if ($ficha[0]["Baixa"] === "No") {
                                                echo "<option value='Si'>Si</option>";
                                            } else {
                                                echo "<option value='No'>No</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Causa de baixa</td>
                                <td>
                                    <select name="Causa_Baixa" id="causa_baixa">
                                        <option value="<?php echo $ficha[0]["FK_Causa_Baixa"] ?>"><?php echo $ficha[0]["Causa_Baixa"] ?></option>
                                        <?php
                                            foreach ($vocabulariCausasBaja as $causabaja) {
                                                if ($causabaja["causa"] != $ficha[0]["Causa_Baixa"]) {
                                                    echo "<option value='" . $causabaja["id"] . "'>" . $causabaja["causa"] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de baixa</td>
                                <td>
                                    <input type="date" name="Data_Baixa" id="data_baixa" value="<?php echo $ficha[0]["Data_Baixa"] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Persona autoritzada baixa</td>
                                <td>
                                    <select name="Persona_Autoritz_Baixa" id="persona_autoritz_baixa">
                                        <option value="<?php echo $ficha[0]["FK_Persona_Autoritz_Baixa"] ?>"><?php echo $ficha[0]["Nom_Usuari"] ?></option>
                                        <?php
                                            foreach ($usuaris as $usuari) {
                                                if ($usuari["Nom_Usuari"] != $ficha[0]["Nom_Usuari"] && $usuari["Rol"] != "invitado") {
                                                    echo "<option value='" . $usuari["ID_Usuari"] . "'>" . $usuari["Nom_Usuari"] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="item6">
                        <table>
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
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="extras">
                    <table>
                        <tr>
                            <td><a href="#" onclick="popupEditar('bibliografiaModal')">Bibliografia</a></td>
                            <td><a href="#" onclick="popupEditar('descripcionModal')">Descripcio</a></td>
                            <td><a href="#" onclick="popupEditar('historiaModal')">Historia de l'objecte</a></td>
                        </tr>
                    </table>
                </div>

                <input type="hidden" name="Bibliografia" id="bibliografiaInput" value="<?php echo $ficha[0]['Bibliografia']; ?>">
                <input type="hidden" name="Descripcio" id="descripcionInput" value="<?php echo $ficha[0]['Descripcio']; ?>">
                <input type="hidden" name="Historia" id="historiaInput" value="<?php echo $ficha[0]['Historia_Objecte']; ?>">

                <nav>
                    <a href="index.php?controller=Obres&action=mostrarObres">Volver</a>
                    <input type="submit" value="Actualitza">
                </nav>
            </form>
        </div>
    </body>
    <div id="bibliografiaModal" class="modal">
    <div class="modal-content">
        <h2>Editar Bibliografia</h2>
        <textarea id="bibliografiaText" rows="5"><?php echo $ficha[0]['Bibliografia']; ?></textarea>
        <button onclick="guardarTexto('bibliografiaText', 'bibliografiaInput')">Guardar</button>
        <button onclick="cerrarPopup('bibliografiaModal')">Cerrar</button>
    </div>
</div>

<div id="descripcionModal" class="modal">
    <div class="modal-content">
        <h2>Editar Descripcio</h2>
        <textarea id="descripcionText" rows="5"><?php echo $ficha[0]['Descripcio']; ?></textarea>
        <button onclick="guardarTexto('descripcionText', 'descripcionInput')">Guardar</button>
        <button onclick="cerrarPopup('descripcionModal')">Cerrar</button>
    </div>
</div>

<div id="historiaModal" class="modal">
    <div class="modal-content">
        <h2>Editar Historia de l'objecte</h2>
        <textarea id="historiaText" rows="5"><?php echo $ficha[0]['Historia_Objecte']; ?></textarea>
        <button onclick="guardarTexto('historiaText', 'historiaInput')">Guardar</button>
        <button onclick="cerrarPopup('historiaModal')">Cerrar</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const baixaSelect = document.getElementById("baixa");
        const causaBaixa = document.getElementById("causa_baixa");
        const dataBaixa = document.getElementById("data_baixa");
        const personaAutoritzBaixa = document.getElementById("persona_autoritz_baixa");

        function toggleFields() {
            const isNo = baixaSelect.value === "No";
            causaBaixa.disabled = isNo;
            dataBaixa.disabled = isNo;
            personaAutoritzBaixa.disabled = isNo;
        }

        baixaSelect.addEventListener("change", toggleFields);
        toggleFields();
    });
</script>
<script src="public/js/PopUpsFicha.js"></script>
<?php else: ?>
    <?php echo "soy imbecil";?>
<?php endif; ?>

