<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ubicaciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
</head>
<body>
    <h2>Árbol de Ubicaciones</h2>
    <div id="ubicaciones-arbol"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ubicaciones-arbol').jstree({
                'core' : {
                    'data' : {
                        "url" : "index.php?controller=ubicaciones&action=obtenerArbolUbicaciones",
                        "dataType" : "json"
                    }
                }
            });

            $('#ubicaciones-arbol').on("select_node.jstree", function (e, data) {
                alert("Ubicación seleccionada: " + data.node.text);
            });
        });
    </script>
</body>
</html>
