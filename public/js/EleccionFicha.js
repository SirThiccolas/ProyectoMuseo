// POPUP MOVIMENTS FICHA
function popupEleccionFicha() {
    const popupFicha = document.getElementById('popupFicha');
    const closePopupBtn = document.getElementById('closePopup');
    
    const openPopupLinks = document.querySelectorAll('.openPopup');

    openPopupLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const obraId = this.getAttribute('data-id');

            popupFicha.style.display = 'block';

            document.getElementById('fichaBasicaBtn').addEventListener('click', function() {
                window.location.href = 'index.php?controller=Obres&action=verFicha&tipoficha=basica&id=' + obraId;
            });

            document.getElementById('fichaGeneralBtn').addEventListener('click', function() {
                window.location.href = 'index.php?controller=Obres&action=verFicha&tipoficha=general&id=' + obraId;
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
}