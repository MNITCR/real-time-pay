document.addEventListener('DOMContentLoaded', function() {
    const hideLabel = document.querySelector('.hideLabel');
    const fileInput = document.getElementById('dropzone-file');
    const imagePreview = document.getElementById('image-preview');

    fileInput.addEventListener('change', function() {
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);

            // Show the image preview
            imagePreview.classList.remove('hidden');
            hideLabel.classList.add('hidden');
        } else {
            // If no file is selected, hide the image preview
            imagePreview.classList.add('hidden');
        }
    });

    // click on image preview
    imagePreview.addEventListener('click', function() {
        fileInput.click();
    });
});
