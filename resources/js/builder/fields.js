class FieldManager {

    init() {
        console.log('FieldManager initialized');
        $(document).on(
            'click',
            '#saveFieldBtn',
            this.createField.bind(this)
        );

        $(document).on(
            'click',
            '#updateFieldBtn',
            this.updateField.bind(this)
        );

        $(document).on(
            'click',
            '#deleteFieldBtn',
            this.deleteField.bind(this)
        );

        $(document).on(
            'change',
            '#add_field_screen_id',
            this.loadSections
        );

    }

    loadSections() {

        let screenId =
            $('#add_field_screen_id').val();

        $('#add_field_section_id')
            .html(
                '<option value="">Loading...</option>'
            );

        if (!screenId) {

            $('#add_field_section_id')
                .html(
                    '<option value="">Select Section</option>'
                );

            return;
        }

        $.ajax({

            url: FormBuilderConfig.sectionsByScreenUrl.replace(
                '__ID__',
                screenId
            ),

            type: 'GET',

            success: function (response) {

                console.log(response);

                let options =
                    '<option value="">Select Section</option>';

                $.each(
                    response.data,
                    function (index, section) {

                        console.log(section)

                        options +=
                            '<option value="' +
                            section.id +
                            '">' +
                            section.code +
                            ' - ' +
                            section.name +
                            '</option>';

                    }
                );

                $('#add_field_section_id')
                    .html(options);

            },

            error: function () {

                toastr.error(
                    'Unable to load sections'
                );

                $('#add_field_section_id')
                    .html(
                        '<option value="">Select Section</option>'
                    );

            }

        });

    }

    validateField() {

        clearErrors();

        let isValid = true;

        let fieldScreenId =
            $('#add_field_screen_id')
                .val();
        let fieldSectionId =
            $('#add_field_section_id')
                .val();

        let fieldLabel =
            $('#add_field_label')
                .val()
                .trim();
        let fieldName =
            $('#add_field_name')
                .val()
                .trim();

        if (!fieldScreenId) {

            showValidationError(
                'add_field_screen_id',
                'Screen is required'
            );

            isValid = false;
        }

        if (!fieldSectionId) {

            showValidationError(
                'add_field_section_id',
                'Section is required'
            );

            isValid = false;
        }

        if (fieldName === '') {

            showValidationError(
                'add_field_name',
                'Field Name is required'
            );

            isValid = false;
        }

        if (fieldLabel === '') {

            showValidationError(
                'add_field_label',
                'Field Label is required'
            );

            isValid = false;
        }

        console.log('isValid', isValid);
        return isValid;
    }

    createField() {

        if (!this.validateField()) {
            return;
        }

        $.ajax({

            url: FormBuilderConfig.saveFieldUrl,

            type: 'POST',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,
                screen_id: $('#add_field_screen_id').val(),
                section_id: $('#add_field_section_id').val(),
                label:
                    $('#add_field_label').val(),

                field_name:
                    $('#add_field_name').val(),

                field_type:
                    $('#add_field_type').val(),

                placeholder:
                    $('#add_placeholder').val(),

                default_value:
                    $('#add_default_value').val(),

                help_text:
                    $('#add_help_text').val(),

                min_length:
                    $('#add_min_length').val(),

                max_length:
                    $('#add_max_length').val(),

                min_value:
                    $('#add_min_value').val(),

                max_value:
                    $('#add_max_value').val(),

                validation_rules:
                    $('#add_validation_rules').val(),

                pattern:
                    $('#add_pattern').val(),

                options:
                    $('#add_options').val(),

                context:
                    $('#add_context').val(),

                column_width:
                    $('#add_column_width').val(),

                css_class:
                    $('#add_css_class').val(),

                tooltip:
                    $('#add_tooltip').val(),

                required:
                    $('#add_required').is(':checked') ? 1 : 0,

                is_readonly:
                    $('#add_is_readonly').is(':checked') ? 1 : 0,

                is_hidden:
                    $('#add_is_hidden').is(':checked') ? 1 : 0,

                is_active:
                    $('#add_is_active').is(':checked') ? 1 : 0

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Field created successfully'
                );

                setTimeout(() => {
                    location.reload();
                }   , 2000);

            },

            error: (xhr) => {

                this.handleValidationErrors(xhr, 'add');

            }

        });
    }

    validateUpdateField() {

        clearErrors();

        let isValid = true;

        let fieldLabel =
            $('#edit_field_label')
                .val()
                .trim();
        let fieldName =
            $('#edit_field_name')
                .val()
                .trim();

        if (fieldName === '') {

            showValidationError(
                'edit_field_name',
                'Field Name is required'
            );

            isValid = false;
        }

        if (fieldLabel === '') {

            showValidationError(
                'edit_field_label',
                'Field Label is required'
            );

            isValid = false;
        }

        return isValid;
    }

    updateField() {

        if (!this.validateUpdateField()) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.updateFieldUrl.replace(
                    '__ID__',
                    $('#field_id').val()
                ),

            type: 'PUT',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,

                label:
                    $('#edit_field_label').val(),

                field_name:
                    $('#edit_field_name').val(),

                field_type:
                    $('#edit_field_type').val(),

                placeholder:
                    $('#edit_placeholder').val(),

                default_value:
                    $('#edit_default_value').val(),

                help_text:
                    $('#edit_help_text').val(),

                min_length:
                    $('#edit_min_length').val(),

                max_length:
                    $('#edit_max_length').val(),

                min_value:
                    $('#edit_min_value').val(),

                max_value:
                    $('#edit_max_value').val(),

                validation_rules:
                    $('#edit_validation_rules').val(),

                pattern:
                    $('#edit_pattern').val(),

                options:
                    $('#edit_options').val(),

                context:
                    $('#edit_context').val(),

                column_width:
                    $('#edit_column_width').val(),

                css_class:
                    $('#edit_css_class').val(),

                tooltip:
                    $('#edit_tooltip').val(),

                required:
                    $('#edit_required').is(':checked') ? 1 : 0,

                is_readonly:
                    $('#edit_is_readonly').is(':checked') ? 1 : 0,

                is_hidden:
                    $('#edit_is_hidden').is(':checked') ? 1 : 0,

                is_active:
                    $('#edit_is_active').is(':checked') ? 1 : 0

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Field updated successfully'
                );

                setTimeout(() => {
                    location.reload();
                }   , 2000);

            },

            error: (xhr) => {

                this.handleValidationErrors(xhr, 'edit');

            }

        });
    }

    deleteField() {

        if (
            !confirm(
                'Are you sure you want to delete this field?'
            )
        ) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.deleteFieldUrl.replace(
                    '__ID__',
                    $('#field_id').val()
                ),

            type: 'DELETE',

            data: {

                _token:
                    FormBuilderConfig.csrfToken

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Field deleted successfully'
                );

                $('.field-node[data-id="' +
                    $('#field_id').val() +
                    '"]').remove();

                $('#property-panel')
                    .html('');

            },

            error: (xhr) => {

                toastr.error(
                    xhr.responseJSON?.message ||
                    'Unable to delete field'
                );

            }

        });
    }

    handleValidationErrors(xhr, mode) {

        if (xhr.status === 422) {

            $.each(
                xhr.responseJSON.errors,
                function (field, messages, mode) {

                    showValidationError(
                        mode + '_field_' + field,
                        messages[0]
                    );

                }
            );

            toastr.error(
                'Please fix validation errors'
            );

            return;
        }

        toastr.error(
            xhr.responseJSON?.message ||
            'Something went wrong'
        );
    }

}

window.fieldManager = new FieldManager();

$(function () {
    fieldManager.init();
});