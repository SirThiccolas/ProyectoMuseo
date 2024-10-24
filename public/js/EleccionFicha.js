// Al cargar el DOM, se añaden los event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar el popup y el botón de cerrar
    const popupFicha = document.getElementById('popupFicha');
    const closePopupBtn = document.getElementById('closePopup');
    
    // Seleccionar todos los enlaces con la clase 'openPopup'
    const openPopupLinks = document.querySelectorAll('.openPopup');

    // Añadir evento a cada enlace para abrir el popup
    openPopupLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const obraId = this.getAttribute('data-id');

            // Mostrar el popup
            popupFicha.style.display = 'block';

            // Asignar los eventos a los botones dentro del popup
            document.getElementById('fichaBasicaBtn').addEventListener('click', function() {
                window.location.href = 'index.php?controller=Obres&action=veureFichaBasica&id=' + obraId;
            });

            document.getElementById('fichaGeneralBtn').addEventListener('click', function() {
                window.location.href = 'index.php?controller=Obres&action=veureFichaGeneral&id=' + obraId;
            });
        });
    });

    // Añadir evento para cerrar el popup
    closePopupBtn.addEventListener('click', function() {
        popupFicha.style.display = 'none';
    });

    // Cerrar el popup si se hace clic fuera del contenido del popup
    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popupFicha.style.display = 'none';
        }
    });
});

function popupRestauraciones() {
    var popupRestauraciones = document.getElementById('popupRestauraciones');
    var closeBtn = document.getElementById("closePopup");

    // Mostrar el popup
    popupRestauraciones.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupRestauraciones.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupRestauraciones) {
            popupRestauraciones.style.display = "none"; 
        } 
    };
}
