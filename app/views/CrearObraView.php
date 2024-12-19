<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>

<div class='fromCrearObra'>
    <form action="index.php?controller=Obres&action=crearObra" method="post" enctype="multipart/form-data">

        <!-- Grupo: Información básica -->
        <fieldset>
            <legend>Información básica</legend>
            <table>
                <tr>
                    <td rowspan="3"><img id="imagePreview" src="" alt="Vista previa de la imagen" style="display:none;"></td>
                </tr>
                <tr>
                    <td>Número de registro: <input type="hidden" name="letraregistro"><input type="text" name="idObra" required></td>
                </tr>
                <tr>
                    <td>Nombre del objeto: <input type="text" name="Nom_Objecte" required></td>
                </tr>
                <tr>
                    <td><input type="file" id="imageUpload" accept="image/*"></td>
                    <td>Titulo: <input type="text" name="Titol" equired></td>
                </tr>
            </table>
        </fieldset>

        <!-- Grupo: Dimensiones -->
        <fieldset>
            <legend>Dimensiones</legend>
            <table>
                <tr>
                    <td>Altura máxima (cm): <input type="text" name="Mides_Maxima_Alcada_cm" required></td>
                </tr>
                <tr>
                    <td>Anchura máxima (cm): <input type="text" name="Mides_Maxima_Amplada_cm" required></td>
                </tr>
                <tr>
                    <td>Profundidad máxima (cm): <input type="text" name="Mides_Maxima_Profunditat_cm" required></td>
                </tr>
            </table>
        </fieldset>

        <!-- Grupo: Información de ingreso -->
        <fieldset>
            <legend>Información de ingreso</legend>
            <table>
                <tr>
                    <td>Fecha de ingreso: <input type="date" name="Data_Ingres" required></td>
                </tr>
                <tr>
                    <td>Fuente de ingreso: <input type="text" name="Font_Ingres" required></td>
                </tr>
                <tr>
                    <td>Forma de ingreso: 
                        <select name="Forma_Ingres">
                            <?php
                                foreach ($vocabulariFormasIngreo as $formaIngres) {
                                    echo "<option value='" . $formaIngres["id"] . "'>" . $formaIngres["forma"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <!-- Grupo: Información adicional -->
        <fieldset>
            <legend>Información adicional</legend>
            <table>
                <tr>
                    <td>Valoración económica: <input type="text" name="Valoracio_Economica_Euros" required></td>
                    <td>Fecha de registro: <input type="date" name="Data_Registro" required></td>
                    <td>Año inicial: <input type="number" name="Any_Inicial"></td>
                </tr>
                <tr>
                    <td>Colección de procedencia: <input type="text" name="Colleccio_Procedencia" required></td>
                    <td>Lugar de procedencia: <input type="text" name="Lloc_Procedencia" required></td>
                    <td>Año final: <input type="number" name="Any_Final" required></td>
                <tr>
                    <td>Número de tiraje: <input type="text" name="Num_Tiratge" required></td>
                    <td>Otros números de identificación: <input type="text" name="Altres_Numeros_Identificacio" required></td>
                    <td>Lugar de ejecución: <input type="text" name="Lloc_Execucio" required></td>
                </tr>
                <tr>
                    <td><textarea id="Bibliografia" name="Bibliografia" rows="5" cols="40" placeholder="Bibliografía" required></textarea></td>
                    <td><textarea id="Descripcio" name="Descripcio" rows="5" cols="40" placeholder="Descripción" required></textarea></td>
                    <td><textarea id="Historia" name="Historia" rows="5" cols="40" placeholder="Historia" required></textarea></td>
                </tr>
            </table>
        </fieldset>
        
        <!-- Grupo: Clasificación y técnicas -->
        <fieldset>
            <legend>Clasificación y técnicas</legend>
            <table>
                <tr>
                    <td>Autor: 
                        <select name="Autor">
                            <?php
                                foreach ($vocabulariAutores as $autor) {
                                    echo "<option value='" . $autor["id"] . "'>" . $autor["nombre"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>Datación: 
                    <td colspan="2">
                        <select name="Nombre_Datacion">
                            <?php
                                foreach ($vocabulariDataciones as $datacion) {
                                    echo "<option value='" . $datacion["id"] . "'>" . $datacion["datacio"] . " (" . $datacion["any_inici"] . " / " . $datacion["any_final"] . ")</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Clasificación Generica:
                        <select name="Classificacio_Generica">
                            <?php
                                foreach ($vocabulariClasificacionGenerica as $clasificacion) {
                                    echo "<option value='" . $clasificacion["id"] . "'>" . $clasificacion["nombre"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                    <td>Material: 
                        <select name="Material">
                            <?php
                                foreach ($vocabulariMaterial as $material) {
                                    echo "<option value='" . $material["id"] . "'>" . $material["material"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                    <td>Estado de conservación: 
                        <select name="Estat_Conservacio">
                            <?php
                                foreach ($vocabulariEstadosConservacion as $estadoConservacion) {
                                    echo "<option value='" . $estadoConservacion["id"] . "'>" . $estadoConservacion["estado"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tecnica: 
                        <select name="Tecnica">
                            <?php
                                foreach ($vocabulariTecnica as $tecnica) {
                                    echo "<option value='" . $tecnica["id"] . "'>" . $tecnica["tecnica"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <!-- Archivos adicionales y enlaces -->
        <div class="botonesExtras">
        <button type="button" id="addLinkBtn">Añadir enlaces</button>
        <button type="button" id="addFileBtn">Añadir archivos</button>
        </div>

        <div id="linkPopup" class="popupAñadirEnlaces">
            <div class="popup-content">
                <span class="close-btn" id="closePopup">&times;</span>
                <h3>Añadir enlaces</h3>
                <div id="linkContainer">
                </div>
                <button type="button" id="addNewLink">+</button>
                <button type="button" id="saveLinks">Guardar</button>
            </div>
        </div>
        <input type="hidden" name="enlaces" id="enlacesInput">

        <div id="filePopup" class="popupSubirArchivos">
            <div class="popup-content">
                <span class="close-btn" id="closeFilePopup">&times;</span>
                <h3>Subir Archivos</h3>
                <input type="file" name="archivos" id="fileInput" multiple>

                <div id="filePreviewContainer">
                </div>
                <button type="button" id="addFiles">Añadir</button>
            </div>
        </div>
        <input type="hidden" name="archivos[]" id="archivosInput" multiple>

    
    <div id="popupUbicaciones" style="display:none;">
        <div id="jstree_demo"></div>
    </div>

<button id="btnSeleccionarUbicacion">Seleccionar Ubicación</button>
<input type="text" id="ubicacion" placeholder="Ubicación seleccionada" readonly>


        <input type="submit" value="Crear">
    </form>
</div>



<script src="public/js/EnlacesObras.js"></script>
<script src="public/js/ArchivosObras.js"></script>
<script>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    imageUpload.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imagePreview.src = e.target.result;
          imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
      }
    });
</script>

<script>
        $(document).ready(function () {
            const tree = $('#jstree_demo');

            // Inicializar jsTree con los datos iniciales
            let treeData = <?php echo json_encode($ubicaciones); ?>;
            tree.jstree({
                'core': {
                    'data': treeData,
                    'check_callback': true
                },
                "plugins": ["wholerow"]
            });

            // Añadir ubicación
            $('#btn-add').off('click').on('click', function () {
                const selectedNode = tree.jstree('get_selected', true)[0];
                if (!selectedNode) {
                    alert("Seleccione una ubicación donde añadir.");
                    return;
                }

                const newName = prompt("Ingrese el nombre de la nueva ubicación:");
                const description = prompt("Ingrese la descripción de la nueva ubicación:");
                if (newName && description) {
                    $.ajax({
                        url: 'index.php?controller=Ubicaciones&action=manejarAcciones',
                        method: 'POST',
                        data: {
                            action: 'add',
                            parent_id: selectedNode.id,
                            name: newName,
                            description: description
                        },
                        success: function (response) {
                            const newNode = {
                                id: response.id,  // ID del nodo
                                text: response.name,  // Nombre de la nueva ubicación
                                description: response.description  // Descripción, aunque no es visualizada por defecto
                            };

                            // Agregar el nuevo nodo al árbol
                            tree.jstree('create_node', selectedNode, newNode, 'last'); // Añade al final
                            tree.jstree('open_node', selectedNode);  // Expande el nodo donde se añadió el nuevo nodo

                            // Redirigir al usuario después de añadir el nodo
                            window.location.href = 'index.php?controller=Ubicaciones&action=obtenerArbolUbicaciones';
                        },
                        error: function (xhr) {
                            alert("Error al añadir: " + (xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido'));
                        }
                    });
                }
            });

            // Modificar ubicación
            $('#btn-edit').off('click').on('click', function () {
                const selectedNode = tree.jstree('get_selected', true)[0];
                if (!selectedNode) {
                    alert("Seleccione una ubicación para modificar.");
                    return;
                }

                const newName = prompt("Ingrese el nuevo nombre:", selectedNode.text);
                if (newName) {
                    $.ajax({
                        url: 'index.php?controller=Ubicaciones&action=manejarAcciones',
                        method: 'POST',
                        data: {
                            action: 'edit',
                            id: selectedNode.id,
                            name: newName
                        },
                        success: function () {
                            tree.jstree('rename_node', selectedNode.id, newName);
                        },
                        error: function (xhr) {
                            alert("Error al modificar: " + (xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido'));
                        }
                    });
                }
            });

            // Eliminar ubicación
            $('#btn-delete').off('click').on('click', function () {
                const selectedNode = tree.jstree('get_selected', true)[0];
                if (!selectedNode) {
                    alert("Seleccione una ubicación para eliminar.");
                    return;
                }

                if (confirm(`¿Está seguro de eliminar "${selectedNode.text}"?`)) {
                    $.ajax({
                        url: 'index.php?controller=Ubicaciones&action=manejarAcciones',
                        method: 'POST',
                        data: {
                            action: 'delete',
                            id: selectedNode.id
                        },
                        success: function () {
                            tree.jstree('delete_node', selectedNode.id);
                        },
                        error: function (xhr) {
                            alert("Error al eliminar: " + (xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido'));
                        }
                    });
                }
            });
        });
    </script>

<style>
    #popupUbicaciones {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}
.popup-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 50%;
        max-width: 600px;
        text-align: center;
    }

</style>