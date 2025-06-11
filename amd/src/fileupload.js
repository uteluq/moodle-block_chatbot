/**
 * @copyright 2025 Université TÉLUQ
 */
define(['jquery', 'core/str'], function($, str) {
    /**
     * Toggle the file upload modal display.
     */
    function toggleFileUploadModal() {
        const modal = document.getElementById('fileUploadModal');
        modal.style.display = modal.style.display === 'none' || modal.style.display === '' ? 'flex' : 'none';

        if (modal.style.display === 'none') {
            document.getElementById('fileUploadForm').reset();
            document.getElementById('uploadedFilesContainer').innerHTML = '';
        }
    }

    /**
     * Remove a selected file from the list.
     */
    function removeFile(button, fileName) {
        const container = document.getElementById('uploadedFilesContainer');
        container.removeChild(button.parentElement);

        const filesInput = document.getElementById('file');
        const dt = new DataTransfer();
        const files = Array.from(filesInput.files).filter(file => file.name !== fileName);
        files.forEach(file => dt.items.add(file));
        filesInput.files = dt.files;
    }

    /**
     * Set up the file input listener to display selected files.
     */
    function setupFileInputListener() {
        const fileInput = document.getElementById('file');
        const container = document.getElementById('uploadedFilesContainer');

        fileInput.addEventListener('change', function(e) {
            container.innerHTML = '';
            const files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileItem = document.createElement('div');
                fileItem.classList.add('uploaded-file');

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = `
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
                    </svg>
                `;

                removeBtn.addEventListener('click', () => removeFile(removeBtn, file.name));

                fileItem.appendChild(document.createTextNode(file.name));
                fileItem.appendChild(removeBtn);

                container.appendChild(fileItem);
            }
        });
    }

    return {
        init: function() {
            setupFileInputListener();
            window.toggleFileUploadModal = toggleFileUploadModal;
        }
    };
});
