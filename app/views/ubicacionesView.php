<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árbol de Ubicaciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
</head>
<body>
    <h1>Árbol de Ubicaciones</h1>

    <!-- Buttons -->
    <div>
        <button id="btn-add">Añadir</button>
        <button id="btn-edit">Modificar</button>
        <button id="btn-delete">Eliminar</button>
    </div>

    <!-- Tree -->
    <div id="jstree_demo"></div>

    <!-- Include jQuery and jsTree -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize jsTree
            $('#jstree_demo').jstree({
                'core': {
                    'data': <?php echo json_encode($ubicaciones); ?>,
                    'check_callback': true // Allow editing
                },
                "plugins": ["wholerow"]
            });

            // Get selected node
            function getSelectedNode() {
                const selected = $('#jstree_demo').jstree('get_selected', true); // Get full node object
                return selected.length > 0 ? selected[0] : null;
            }

            // Add new node
            $('#btn-add').click(function () {
                const selectedNode = getSelectedNode();
                if (!selectedNode) {
                    alert("Seleccione una ubicación donde añadir.");
                    return;
                }

                const newName = prompt("Ingrese el nombre de la nueva ubicación:");
                if (newName) {
                    $.ajax({
                        url: '../models/acciones.php',
                        method: 'POST',
                        data: {
                            action: 'add',
                            parent_id: selectedNode.id,
                            name: newName
                        },
                        success: function (response) {
                            const newNode = JSON.parse(response);
                            $('#jstree_demo').jstree().create_node(selectedNode.id, newNode);
                        }
                    });
                }
            });

            // Edit selected node
            $('#btn-edit').click(function () {
                const selectedNode = getSelectedNode();
                if (!selectedNode) {
                    alert("Seleccione una ubicación para modificar.");
                    return;
                }

                const newName = prompt("Ingrese el nuevo nombre de la ubicación:", selectedNode.text);
                if (newName) {
                    $.ajax({
                        url: '../models/acciones.php',
                        method: 'POST',
                        data: {
                            action: 'edit',
                            id: selectedNode.id,
                            name: newName
                        },
                        success: function () {
                            $('#jstree_demo').jstree().rename_node(selectedNode.id, newName);
                        }
                    });
                }
            });

            // Delete selected node
            $('#btn-delete').click(function () {
                const selectedNode = getSelectedNode();
                if (!selectedNode) {
                    alert("Seleccione una ubicación para eliminar.");
                    return;
                }

                if (confirm(`¿Está seguro de que desea eliminar la ubicación "${selectedNode.text}"?`)) {
                    $.ajax({
                        url: '../models/acciones.php',
                        method: 'POST',
                        data: {
                            action: 'delete',
                            id: selectedNode.id
                        },
                        success: function () {
                            $('#jstree_demo').jstree().delete_node(selectedNode.id);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>