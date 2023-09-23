# CodeIgniter Image Manager Package

The CodeIgniter Image Manager Package provides a convenient way to manage and handle image uploads and selections in your CodeIgniter 4 projects.

## Features

- Upload images with ease.
- List uploaded images.
- Select images from the list.

## Installation

You can install this package via Composer:

```bash
composer require nexcoding/image-manager-ci4
```

<button type="button" class="btn btn-primary"  data-media-ci4-library="images" data-media-ci4-target-input-id="test">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
    Create new report
</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const openModalButtons = document.querySelectorAll('[data-media-ci4-library]');

        
        const myModal = new bootstrap.Modal(document.getElementById('modalId'));

        openModalButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetInputId = button.getAttribute('data-media-ci4-target-input-id');

                myModal.show();
                myModal._element.setAttribute('data-target-input-id', targetInputId);
            });
        });

        window.addEventListener('message', function(event) {
            if (event.data.type === 'imageSelected') {
                const selectedImage = event.data.image;
                const targetInputId = myModal._element.getAttribute('data-target-input-id');
                document.getElementById(targetInputId).value = selectedImage;
                myModal.hide();
            }
        });
    });
</script>