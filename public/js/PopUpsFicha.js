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
