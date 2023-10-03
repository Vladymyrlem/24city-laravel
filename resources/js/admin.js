jQuery(document).ready(function () {
    function initializeTinyMCE(editorId) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        tinymce.init({
            selector: '#' + editorId,
            // Additional TinyMCE settings...
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            images_file_types: 'jpg,svg,webp,png',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist advlist | code codesample | table | '
                + 'link image save visualblocks',
            image_title: true,
            automatic_uploads: true,
            browser_spellcheck: true, // Enable error alerts
            images_upload_url: '/upload/images',
            tinymce_debug: true, // Enable browser debugging mode

            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    // Prompt the user for image title, description, and alt text
                    var title = prompt('Enter image title', '');
                    var description = prompt('Enter image description', '');
                    var altText = prompt('Enter alt text for the image', '');

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // Include additional data (title, description, alt text) in the image tag
                        var imgTag = '<img src="' + blobInfo.blobUri() + '" alt="' + altText + '" title="' + title + '" data-description="' + description + '">';
                        cb(imgTag);
                    };
                };
                input.click();
            }

        });
    }

    // initializeTinyMCE('about-company');
});

jQuery(document).ready(function () {
    jQuery('#all-posts').on('change', 'input[type="checkbox"]', function ($) {
        var $selectedPostsList = $('#selected-posts');

        // Clear the selected posts list
        $selectedPostsList.empty();

        // Iterate through checkboxes to add selected posts to the selected list
        $('#all-posts input[type="checkbox"]:checked').each(function () {
            var postId = $(this).val();
            var postTitle = $(this).closest('li').text();
            $selectedPostsList.append('<li><input type="hidden" name="selected_posts[]" value="' + postId + '">' + postTitle + '</li>');
        });
    });
    jQuery('.post-title').on('hover', function () {
        jQuery(this).find('.actions-list').show();
    });
    // jQuery("#company-categories tbody").paginathing({
    //     perPage: 20,
    //     limitPagination: 5,
    //     prevNext: true,
    //     firstLast: true,
    //     prevText: '<',
    //     nextText: '>',
    //     firstText: '<<',
    //     lastText: '>>',
    //     activeClass: 'active',
    // });
    jQuery("#company-categories").DataTable();
});

