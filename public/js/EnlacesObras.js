document.getElementById('addLinkBtn').addEventListener('click', mostrarPopup);
document.getElementById('closePopup').addEventListener('click', cerrarPopup);
document.getElementById('addNewLink').addEventListener('click', añadirEnlace);
document.getElementById('saveLinks').addEventListener('click', guardarEnlaces);

let enlaces = [];

function mostrarPopup() {
    document.getElementById('linkPopup').style.display = 'block';
}

function cerrarPopup() {
    document.getElementById('linkPopup').style.display = 'none';
}

function añadirEnlace() {
    const enlaceId = Date.now(); // Usamos el timestamp como ID único para cada enlace
    const linkHTML = `
        <div class="link-item" id="link-${enlaceId}">
            <input type="text" class="link-input" placeholder="Introduce un enlace" id="input-${enlaceId}">
            <button type="button" onclick="eliminarEnlace(${enlaceId})" class="delete-btn">Eliminar</button>
        </div>
    `;
    // Insertar el HTML para el nuevo enlace
    document.getElementById('linkContainer').insertAdjacentHTML('beforeend', linkHTML);
}

function eliminarEnlace(enlaceId) {
    // Eliminar el enlace de la interfaz
    document.getElementById(`link-${enlaceId}`).remove();
    
    // También eliminamos el enlace de la lista interna
    enlaces = enlaces.filter(enlace => enlace.id !== enlaceId);
    actualizarEnlacesInput();
}

function guardarEnlaces() {
    // Recoger los enlaces del formulario
    const linkInputs = document.querySelectorAll('.link-input');
    
    enlaces = Array.from(linkInputs).map((input, index) => ({
        id: Date.now() + index, // Aseguramos un ID único
        enlace: input.value
    }));
    
    // Actualizamos el campo oculto con los enlaces
    actualizarEnlacesInput();

    // No cerramos el popup al guardar
}

function actualizarEnlacesInput() {
    // Guardar los enlaces en el campo oculto como una cadena JSON
    document.getElementById('enlacesInput').value = JSON.stringify(enlaces.map(enlace => enlace.enlace));
}
