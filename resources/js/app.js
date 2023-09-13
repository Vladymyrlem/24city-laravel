jQuery(document).ready(function () {

    function initializeTinyMCE(editorId) {
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
            images_upload_url: '/upload/images',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                // input.name = '_token'; // Name of the CSRF token field
                // input.value = '{{ csrf_token() }}'; // Use Blade syntax to get the token value
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                };
                input.click();
            }
        });
    }

    initializeTinyMCE('myeditorinstance');
});
$(document).ready(function () {
    $('#all-posts').on('change', 'input[type="checkbox"]', function () {
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
});
