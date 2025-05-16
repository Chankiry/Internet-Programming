<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-white text-xl font-bold">Upload Document</h1>
                <p class="text-blue-100 text-sm mt-1">Select or drag a file to upload</p>
            </div>
            
            <div class="p-6">
                <form action="/upload" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <div class="mb-5">
                        <div id="drop-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors">
                            <div id="file-preview" class="hidden mb-4 flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span id="file-name" class="text-sm font-medium text-gray-900"></span>
                                <span id="file-size" class="text-xs text-gray-500"></span>
                            </div>
                            
                            <div id="upload-prompt">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Drag and drop your file here or</p>
                                <label for="file-input" class="mt-2 inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                                    Browse Files
                                </label>
                            </div>
                            
                            <input id="file-input" type="file" name="document" class="hidden" />
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Supported file types: PDF, DOC, DOCX, XLS, XLSX (Max 10MB)</p>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <button type="button" id="clear-btn" class="text-sm text-gray-600 hover:text-gray-900 hidden">
                            Clear selection
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Upload Document
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('file-input');
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');
            const uploadPrompt = document.getElementById('upload-prompt');
            const clearBtn = document.getElementById('clear-btn');
            
            // Open file dialog when clicking on the drop area, but not when clicking on the label
            dropArea.addEventListener('click', (e) => {
                // Only trigger file input click if the click wasn't on the label or its children
                if (!e.target.closest('label[for="file-input"]')) {
                    fileInput.click();
                }
            });
            
            // Handle file selection
            fileInput.addEventListener('change', handleFileSelect);
            
            // Handle drag and drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.classList.add('border-blue-500', 'bg-blue-50');
                dropArea.classList.remove('border-gray-300');
            }
            
            function unhighlight() {
                dropArea.classList.remove('border-blue-500', 'bg-blue-50');
                dropArea.classList.add('border-gray-300');
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length) {
                    fileInput.files = files;
                    handleFileSelect();
                }
            }
            
            function handleFileSelect() {
                if (fileInput.files.length) {
                    const file = fileInput.files[0];
                    
                    // Display file info
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                    
                    // Show preview, hide upload prompt
                    filePreview.classList.remove('hidden');
                    uploadPrompt.classList.add('hidden');
                    clearBtn.classList.remove('hidden');
                }
            }
            
            // Clear file selection
            clearBtn.addEventListener('click', () => {
                fileInput.value = '';
                filePreview.classList.add('hidden');
                uploadPrompt.classList.remove('hidden');
                clearBtn.classList.add('hidden');
            });
            
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
        });
    </script>
</body>
</html>
