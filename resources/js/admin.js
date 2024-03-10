jQuery(document).ready(function () {
    // Get the blocked dates from PHP variable (passed from the controller)

    // Function to initialize TinyMCE for the new editor
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

    initializeTinyMCE('description-editor');
    initializeTinyMCE('about-company');
    initializeTinyMCE('services-list');
    initializeTinyMCE('additional-information');
    initializeTinyMCE('ads-content');
    initializeTinyMCE('excerpt-ads');
    initializeTinyMCE('real-estate-content');
    initializeTinyMCE('excerpt-real-estate');
    initializeTinyMCE('news-content');
    initializeTinyMCE('excerpt-news');
    // jQuery('#company-category').select2({
    //     placeholder: 'Select an option'
    // });
});

jQuery(document).ready(function () {
    // jQuery('#all-posts').on('change', 'input[type="checkbox"]', function ($) {
    //     var $selectedPostsList = jQuery('#selected-posts');
    //
    //     // Clear the selected posts list
    //     $selectedPostsList.empty();
    //
    //     // Iterate through checkboxes to add selected posts to the selected list
    //     jQuery('#all-posts input[type="checkbox"]:checked').each(function () {
    //         var postId = jQuery(this).val();
    //         var postTitle = jQuery(this).closest('li').text();
    //         $selectedPostsList.append('<li><input type="hidden" name="selected_posts[]" value="' + postId + '">' + postTitle + '</li>');
    //     });
    // });
    jQuery('.post-title').on('hover', function () {
        jQuery(this).find('.actions-list').show();
    });
    jQuery("#company-categories").DataTable();
    jQuery("#news-tags").DataTable();

    jQuery('#main-news-category,#news-category').select2({
        theme: "bootstrap"
    });
    // jQuery('#news-category').select2({
    //     theme: "bootstrap"
    // });
    jQuery('#tag_id').select2({
        theme: "bootstrap"
    });
    jQuery.each(jQuery('.nav-sidebar ul.nav').find('li'), function () {
        jQuery(this).toggleClass('active',
            window.location.pathname.indexOf(jQuery(this).find('a.nav-link').attr('href')) > -1);
    });
    // jQuery('.nav-link').on('click', function () {
    //     localStorage.setItem('activeLink', $(this).attr('href'));
    //     jQuery(this).parent('nav').addClass('menu-is-opening menu-open');
    // });
    // jQuery('.nav-link').on('click', function () {
    //     const activeLink = $(this).attr('href');
    //     jQuery(this).addClass('active').siblings().removeClass('active');
    //     $(this).closest('ul.nav').addClass('menu-is-opening menu-open');
    //
    //     localStorage.setItem('activeLink', activeLink);
    // });
    // const activeLink = localStorage.getItem('activeLink');
    //
    // if (activeLink) {
    //     jQuery('.nav-link').removeClass('active');
    //
    //     // Знайти лінк з потрібним href та додати клас active
    //     const $activeLink = jQuery(`.nav-link[href="${activeLink}"]`);
    //     $activeLink.addClass('active');
    //
    //     // Додавання класу до батьківського тегу <nav>
    //     $activeLink.closest('nav').addClass('menu-is-opening menu-open');
    // }
    // if (activeLink) {
    //     jQuery('.nav-link').removeClass('active');
    //     jQuery(`.nav-link[href="${activeLink}"]`).addClass('active');
    //     $(`.nav-link[href="${activeLink}"]`).closest('nav').addClass('menu-is-opening menu-open');
    //
    // }
});
