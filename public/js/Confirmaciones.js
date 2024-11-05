// Función para confirmar eliminación de usuario
function confirmarDeleteObra(ObraId) {
    const confirmarDeleteObraPopup = document.getElementById('confirmarDeleteObra');
    const confBtn = document.getElementById('confirmarPopupConfirmarDeleteObra');
    const closeBtn = document.getElementById("closePopupConfirmarDeleteObra");

    // Mostrar el popup
    confirmarDeleteObraPopup.style.display = "block";

    // Asignar el ID de usuario al botón de confirmación
    confBtn.onclick = function() {
        window.location.href = 'index.php?controller=Obres&action=deleteObra&id=' + ObraId;
    };

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        confirmarDeleteObraPopup.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == confirmarDeleteObraPopup) {
            confirmarDeleteObraPopup.style.display = "none"; 
        }
    };
}

// Función para confirmar eliminación de usuario
function confirmarDeleteUser(userId) {
    const confirmarDeleteUserPopup = document.getElementById('confirmarDeleteUser');
    const confBtn = document.getElementById('confirmarPopupConfirmarDeleteUser');
    const closeBtn = document.getElementById("closePopupConfirmarDeleteUser");

    // Mostrar el popup
    confirmarDeleteUserPopup.style.display = "block";

    // Asignar el ID de usuario al botón de confirmación
    confBtn.onclick = function() {
        window.location.href = 'index.php?controller=Usuaris&action=deleteUser&id=' + userId;
    };

    // Cerrar el popup cuando se haga clic en el botón "Cerrar"
    closeBtn.onclick = function() {
        confirmarDeleteUserPopup.style.display = "none";
    };

    // Cerrar el popup cuando se haga clic fuera de él
    window.onclick = function(event) {
        if (event.target == confirmarDeleteUserPopup) {
            confirmarDeleteUserPopup.style.display = "none"; 
        }
    };
}
