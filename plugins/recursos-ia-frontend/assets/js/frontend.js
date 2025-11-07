(function($) {
    'use strict';

    let categories = [];
    let subcategories = [];

    // Load categories on page load
    function loadCategories() {
        $.ajax({
            url: recursosIAFrontend.ajax_url,
            type: 'POST',
            data: {
                action: 'get_categories_ia',
                nonce: recursosIAFrontend.nonce
            },
            success: function(response) {
                if (response.success) {
                    categories = response.data.categories;
                    subcategories = response.data.subcategories;
                    populateCategories();
                    populateSubcategories();
                }
            }
        });
    }

    function populateCategories() {
        const $select = $('#recursCategory');
        $select.find('option:not(:first)').remove();

        categories.forEach(function(cat) {
            $select.append($('<option>', {
                value: cat.term_id,
                text: cat.name
            }));
        });
    }

    function populateSubcategories() {
        const $select = $('#recursSubcategory');
        $select.find('option:not(:first)').remove();

        subcategories.forEach(function(subcat) {
            $select.append($('<option>', {
                value: subcat.term_id,
                text: subcat.name
            }));
        });
    }

    // Open main modal
    $('#openRecursModal').on('click', function() {
        $('#recursModal').addClass('active');
        $('#recursForm')[0].reset();
        $('#recursFormMessage').removeClass('success error').hide();
    });

    // Close main modal
    $('#closeRecursModal, #cancelRecursBtn').on('click', function() {
        $('#recursModal').removeClass('active');
    });

    // Close modal on outside click
    $('.recurs-modal').on('click', function(e) {
        if (e.target === this) {
            $(this).removeClass('active');
        }
    });

    // Submit recurs form
    $('#recursForm').on('submit', function(e) {
        e.preventDefault();

        const formData = {
            action: 'save_recurs_ia',
            nonce: recursosIAFrontend.nonce,
            title: $('#recursTitle').val(),
            url: $('#recursUrl').val(),
            description: $('#recursDescription').val(),
            category: $('#recursCategory').val(),
            subcategory: $('#recursSubcategory').val()
        };

        $.ajax({
            url: recursosIAFrontend.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                const $message = $('#recursFormMessage');

                if (response.success) {
                    $message.removeClass('error').addClass('success').text(response.data.message).show();

                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    $message.removeClass('success').addClass('error').text(response.data.message).show();
                }
            },
            error: function() {
                $('#recursFormMessage').removeClass('success').addClass('error')
                    .text('Error de connexió. Torna-ho a provar.').show();
            }
        });
    });

    // Open add category modal
    $('#addCategoryBtn').on('click', function() {
        $('#addCategoryModal').addClass('active');
        $('#addCategoryForm')[0].reset();
        $('#categoryFormMessage').removeClass('success error').hide();
    });

    // Close add category modal
    $('.close-category-modal').on('click', function() {
        $('#addCategoryModal').removeClass('active');
    });

    // Submit add category form
    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();

        const formData = {
            action: 'create_category_ia',
            nonce: recursosIAFrontend.nonce,
            name: $('#newCategoryName').val(),
            description: $('#newCategoryDescription').val()
        };

        $.ajax({
            url: recursosIAFrontend.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                const $message = $('#categoryFormMessage');

                if (response.success) {
                    $message.removeClass('error').addClass('success').text(response.data.message).show();

                    // Add to categories array and update select
                    categories.push({
                        term_id: response.data.term_id,
                        name: response.data.name
                    });
                    populateCategories();
                    $('#recursCategory').val(response.data.term_id);

                    setTimeout(function() {
                        $('#addCategoryModal').removeClass('active');
                    }, 1500);
                } else {
                    $message.removeClass('success').addClass('error').text(response.data.message).show();
                }
            }
        });
    });

    // Open add subcategory modal
    $('#addSubcategoryBtn').on('click', function() {
        $('#addSubcategoryModal').addClass('active');
        $('#addSubcategoryForm')[0].reset();
        $('#subcategoryFormMessage').removeClass('success error').hide();
    });

    // Close add subcategory modal
    $('.close-subcategory-modal').on('click', function() {
        $('#addSubcategoryModal').removeClass('active');
    });

    // Submit add subcategory form
    $('#addSubcategoryForm').on('submit', function(e) {
        e.preventDefault();

        const formData = {
            action: 'create_subcategory_ia',
            nonce: recursosIAFrontend.nonce,
            name: $('#newSubcategoryName').val()
        };

        $.ajax({
            url: recursosIAFrontend.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                const $message = $('#subcategoryFormMessage');

                if (response.success) {
                    $message.removeClass('error').addClass('success').text(response.data.message).show();

                    // Add to subcategories array and update select
                    subcategories.push({
                        term_id: response.data.term_id,
                        name: response.data.name
                    });
                    populateSubcategories();
                    $('#recursSubcategory').val(response.data.term_id);

                    setTimeout(function() {
                        $('#addSubcategoryModal').removeClass('active');
                    }, 1500);
                } else {
                    $message.removeClass('success').addClass('error').text(response.data.message).show();
                }
            }
        });
    });

    // Initialize
    $(document).ready(function() {
        if (recursosIAFrontend.user_logged_in && recursosIAFrontend.user_can_edit) {
            loadCategories();
        }
    });

})(jQuery);
