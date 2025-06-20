/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
define(['jquery', 'core/str'], function ($, str) {
    /**
     * Toggle the file upload modal display.
     */
    const toggleFileUploadModal = function () {
        const modal = document.querySelector('.block_uteluqchatbot #fileUploadModal');
        if (modal) {
            modal.style.display = modal.style.display === 'none' || modal.style.display === '' ? 'flex' : 'none';

            if (modal.style.display === 'none') {
                const form = document.querySelector('.block_uteluqchatbot #fileUploadForm');
                const container = document.querySelector('.block_uteluqchatbot #uploadedFilesContainer');
                if (form) form.reset();
                if (container) container.innerHTML = '';
                
                // Reset accumulated files when modal is closed
                accumulatedFiles = [];
                console.log('Modal closed, files reset');
            }
        }
    };

    /**
     * Remove a selected file from the list.
     */
    function removeFile(button, fileName) {
        const container = document.querySelector('.block_uteluqchatbot #uploadedFilesContainer');
        if (container && button.parentElement) {
            container.removeChild(button.parentElement);
        }

        // Remove from accumulated files array
        accumulatedFiles = accumulatedFiles.filter(file => file.name !== fileName);
        console.log('Removed file:', fileName, 'Remaining files:', accumulatedFiles.length);

        // Update the file input with remaining files
        const filesInput = document.querySelector('.block_uteluqchatbot #file');
        if (filesInput) {
            const dt = new DataTransfer();
            accumulatedFiles.forEach(file => dt.items.add(file));
            filesInput.files = dt.files;
            
            // Re-display the remaining files
            displayFiles(accumulatedFiles);
        }
    }

    /**
     * Validate file before adding to list
     */
    function validateFile(file) {
        // Check file size (max 10MB)
        const maxSize = 10 * 1024 * 1024; // 10MB
        if (file.size > maxSize) {
            return {
                valid: false,
                message: 'File size exceeds 10MB limit'
            };
        }

        // Check file type - Allow PDF, TXT, MD files, and files with .text extension
        const allowedTypes = ['application/pdf', 'text/plain'];
        const allowedExtensions = ['.txt', '.text', '.md', '.pdf'];
        
        const fileExtension = '.' + file.name.split('.').pop().toLowerCase();
        const isValidType = allowedTypes.includes(file.type) || file.type === '';
        const isValidExtension = allowedExtensions.includes(fileExtension);
        
        if (!isValidType && !isValidExtension) {
            return {
                valid: false,
                message: 'Only PDF, TXT, TEXT, and MD files are allowed'
            };
        }

        return { valid: true };
    }

    /**
     * Display selected files in the container
     */
    function displayFiles(files) {
        const container = document.querySelector('.block_uteluqchatbot #uploadedFilesContainer');
        if (!container) return;

        // Clear existing content
        container.innerHTML = '';
        
        console.log(`Displaying ${files.length} files`); // Debug log

        // Process each file - NO DataTransfer manipulation here
        Array.from(files).forEach((file, index) => {
            console.log(`Displaying file ${index + 1}: ${file.name}`); // Debug log
            
            const validation = validateFile(file);

            if (!validation.valid) {
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.classList.add('file-error');
                errorDiv.style.color = 'red';
                errorDiv.style.marginTop = '10px';
                errorDiv.textContent = `${file.name}: ${validation.message}`;
                container.appendChild(errorDiv);
                return; // Skip this file
            }

            // Create file item display
            const fileItem = document.createElement('div');
            fileItem.classList.add('uploaded-file');

            const fileInfo = document.createElement('div');
            fileInfo.style.display = 'flex';
            fileInfo.style.flexDirection = 'column';
            
            const fileName = document.createElement('span');
            fileName.textContent = file.name;
            fileName.classList.add('file-name');
            fileName.style.fontWeight = 'bold';

            const fileSize = document.createElement('span');
            fileSize.textContent = `${(file.size / 1024 / 1024).toFixed(2)} MB`;
            fileSize.classList.add('file-size');
            fileSize.style.fontSize = '0.9em';
            fileSize.style.color = '#666';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.classList.add('remove-file-btn');
            removeBtn.setAttribute('aria-label', 'Remove file');
            removeBtn.style.marginLeft = 'auto';
            removeBtn.innerHTML = `
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
                </svg>
            `;

            removeBtn.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent event bubbling
                removeFile(removeBtn, file.name);
            });

            fileInfo.appendChild(fileName);
            fileInfo.appendChild(fileSize);
            
            fileItem.appendChild(fileInfo);
            fileItem.appendChild(removeBtn);

            container.appendChild(fileItem);
        });
    }

    // Store accumulated files
    let accumulatedFiles = [];

    /**
     * Set up the file input listener to display selected files.
     */
    function setupFileInputListener() {
        const fileInput = document.querySelector('.block_uteluqchatbot #file');
        const container = document.querySelector('.block_uteluqchatbot #uploadedFilesContainer');

        if (!fileInput || !container) {
            console.log('File input or container not found'); // Debug log
            return;
        }

        fileInput.addEventListener('change', function (e) {
            console.log('File input changed, new files:', e.target.files.length); // Debug log
            
            // Add new files to accumulated files (avoid duplicates by name)
            const newFiles = Array.from(e.target.files);
            newFiles.forEach(newFile => {
                const existingFile = accumulatedFiles.find(file => file.name === newFile.name);
                if (!existingFile) {
                    accumulatedFiles.push(newFile);
                    console.log('Added file:', newFile.name);
                } else {
                    console.log('File already exists:', newFile.name);
                }
            });

            // Update the file input with all accumulated files
            const dt = new DataTransfer();
            accumulatedFiles.forEach(file => dt.items.add(file));
            fileInput.files = dt.files;

            console.log('Total accumulated files:', accumulatedFiles.length);
            displayFiles(accumulatedFiles);
        });

        // Make the file-upload-box clickable, but NOT the entire container
        const uploadBox = document.querySelector('.block_uteluqchatbot .file-upload-box');
        if (uploadBox) {
            uploadBox.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Upload box clicked, opening file selector'); // Debug log
                fileInput.click();
            });
        }
    }

    /**
     * Initialize drag and drop functionality
     */
    function setupDragAndDrop() {
        const modal = document.querySelector('.block_uteluqchatbot #fileUploadModal');
        const fileInput = document.querySelector('.block_uteluqchatbot #file');

        if (!modal || !fileInput) {
            return;
        }

        const dropZone = modal.querySelector('.file-upload-container');
        if (!dropZone) {
            return;
        }

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop zone when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropZone.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropZone.classList.add('highlight');
            dropZone.style.borderColor = '#007bff';
            dropZone.style.backgroundColor = '#f8f9fa';
        }

        function unhighlight(e) {
            dropZone.classList.remove('highlight');
            dropZone.style.borderColor = '#ccc';
            dropZone.style.backgroundColor = 'transparent';
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            console.log(`Files dropped: ${files.length}`); // Debug log
            
            // Add dropped files to accumulated files (avoid duplicates)
            const newFiles = Array.from(files);
            newFiles.forEach(newFile => {
                const existingFile = accumulatedFiles.find(file => file.name === newFile.name);
                if (!existingFile) {
                    accumulatedFiles.push(newFile);
                    console.log('Added dropped file:', newFile.name);
                }
            });

            // Update the file input with all accumulated files
            const dataTransfer = new DataTransfer();
            accumulatedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
            
            // Display all accumulated files
            displayFiles(accumulatedFiles);
        }
    }

    return {
        init: function () {
            console.log('Initializing file upload module'); // Debug log
            setupFileInputListener();
            setupDragAndDrop();

            // Expose function to global scope if needed
            window.toggleFileUploadModal = toggleFileUploadModal;
        }
    };
});