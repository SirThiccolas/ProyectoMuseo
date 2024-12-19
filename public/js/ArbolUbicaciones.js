$(document).ready(function () {
    // Abrir el popup
    $('#btnSeleccionarUbicacion').click(function () {
        $('#popupUbicaciones').show();

        // Cargar el árbol si no se ha cargado
        if (!$('#jstree-container').hasClass('jstree')) {
            $.ajax({
                url: 'index.php?controller=Ubicaciones&action=cargarArbolAjax',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (Array.isArray(data)) {
                        $('#jstree-container').jstree({
                            core: {
                                data: data
                            }
                        });
                    } else {
                        alert('El formato de los datos es inválido.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al cargar el árbol:", error);
                    alert('Error al cargar el árbol de ubicaciones.');
                }
            });            
        }
    });

    // Confirmar selección
    $('#btnConfirmarUbicacion').click(function () {
        var selectedNode = $('#jstree-container').jstree('get_selected', true)[0];
        if (selectedNode) {
            $('#ubicacion').val(selectedNode.text); // Mostrar el nombre de la ubicación seleccionada
            $('#popupUbicaciones').hide();
        } else {
            alert('Por favor, selecciona una ubicación.');
        }
    });

    // Cerrar el popup
    $('#btnCerrarPopup').click(function () {
        $('#popupUbicaciones').hide();
    });
});
