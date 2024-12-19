<div class='ubicacions'>
    <h1>Árbol de Ubicaciones</h1>
    <div>
        <div ><button id="btn-add">Añadir</button></div>
        <div><button id="btn-edit">Modificar</button></div>
        <div><button id="btn-delete">Eliminar</button></div>
    </div>
    <div id="jstree_demo"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>

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
</div>