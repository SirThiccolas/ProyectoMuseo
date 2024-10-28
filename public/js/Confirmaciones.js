// POPUP MOVIMENTS FICHA
function confirmarDeleteObra() {
    const confirmarDeleteObra = document.getElementById('confirmarDeleteObra');
    const confBtn = document.getElementById('confirmarPopupConfirmarDeleteObra');
    const closeBtn = document.getElementById("closePopupConfirmarDeleteObra");

    // Mostrar el popup
    confirmarDeleteObra.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        confirmarDeleteObra.style.display = "none";
    };

    confBtn.onclick = function() {
        window.location.href = 'index.php?controller=Obres&action=deleteObra&id=' + obraId;
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == confirmarDeleteObra) {
            confirmarDeleteObra.style.display = "none"; 
        } 
    };
}