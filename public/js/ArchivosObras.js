const addFileBtn = document.getElementById('addFileBtn');
const filePopup = document.getElementById('filePopup');
const closeFilePopup = document.getElementById('closeFilePopup');
const fileInput = document.getElementById('fileInput');
const filePreviewContainer = document.getElementById('filePreviewContainer');
const archivosInput = document.getElementById('archivosInput');

let filesArray = [];

addFileBtn.addEventListener('click', () => {
    filePopup.style.display = 'block';
});

closeFilePopup.addEventListener('click', () => {
    filePopup.style.display = 'none';
});

fileInput.addEventListener('change', (event) => {
    const files = event.target.files;
    for (const file of files) {
        filesArray.push(file);
        const icon = document.createElement('div');
        icon.classList.add('file-icon');
        icon.innerHTML = `
            <span class="file-type">${file.name.split('.').pop().toUpperCase()}</span>
            <p>${file.name}</p>
        `;
        filePreviewContainer.appendChild(icon);
    }
});

document.getElementById('addFiles').addEventListener('click', () => {
    const filesData = filesArray.map(file => file.name).join(', ');
    archivosInput.value = filesData;
    filePopup.style.display = 'none';
});