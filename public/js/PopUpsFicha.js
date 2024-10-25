
// POPUP MOVIMENTS FICHA
function popupMovimentsFicha() {
    const popupMovimentsFicha = document.getElementById('popupMovimentsFicha');
    const closeBtn = document.getElementById("closePopupMovimentsFicha");

    // Mostrar el popup
    popupMovimentsFicha.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupMovimentsFicha.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupMovimentsFicha) {
            popupMovimentsFicha.style.display = "none"; 
        } 
    };
}

// POPUP RESTAURACIONES
function popupRestauraciones() {
    const popupRestauraciones = document.getElementById('popupRestauraciones');
    const closeBtn = document.getElementById("closePopupRestauraciones");

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

// POPUP EXPOSICIONES
function popupExposiciones() {
    const popupExposiciones = document.getElementById('popupExposiciones');
    const closeBtn = document.getElementById("closePopupExposiciones");

    // Mostrar el popup
    popupExposiciones.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupExposiciones.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupExposiciones) {
            popupExposiciones.style.display = "none"; 
        } 
    };
}

// POPUP BIBLIOGRAFIA
function popupBibliografia() {
    const popupBibliografia = document.getElementById('popupBibliografia');
    const closeBtn = document.getElementById("closePopupBibliografia");

    // Mostrar el popup
    popupBibliografia.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupBibliografia.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupBibliografia) {
            popupBibliografia.style.display = "none"; 
        } 
    };
}

// POPUP DESCRIPCION
function popupDescripcion() {
    const popupDescripcion = document.getElementById('popupDescripcion');
    const closeBtn = document.getElementById("closePopupDescripcion");

    // Mostrar el popup
    popupDescripcion.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupDescripcion.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupDescripcion) {
            popupDescripcion.style.display = "none"; 
        } 
    };
}

// POPUP HISTORIA
function popupHistoria() {
    const popupHistoria = document.getElementById('popupHistoria');
    const closeBtn = document.getElementById("closePopupHistoria");

    // Mostrar el popup
    popupHistoria.style.display = "block";

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        popupHistoria.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == popupHistoria) {
            popupHistoria.style.display = "none"; 
        } 
    };
}