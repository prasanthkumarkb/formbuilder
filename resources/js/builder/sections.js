class SectionManager {

    init() {
        console.log('SectionManager initialized');
        $(document).on(
            'click',
            '#saveSectionBtn',
            this.createSection.bind(this)
        );

        $(document).on(
            'click',
            '#updateSectionBtn',
            this.updateSection.bind(this)
        );

        $(document).on(
            'click',
            '#deleteSectionBtn',
            this.deleteSection.bind(this)
        );

    }

    validateSection() {

        clearErrors();

        let isValid = true;

        let sectionName =
            $('#add_section_name')
                .val()
                .trim();
        let sectionCode =
            $('#add_section_code')
                .val()
                .trim();

        if (sectionName === '') {

            showValidationError(
                'add_section_name',
                'Section Name is required'
            );

            isValid = false;
        }

        if (sectionCode === '') {

            showValidationError(
                'add_section_code',
                'Section Code is required'
            );

            isValid = false;
        }

        return isValid;
    }

    createSection() {

        if (!this.validateSection()) {
            return;
        }

        $.ajax({

            url: FormBuilderConfig.saveSectionUrl,

            type: 'POST',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,

                name:
                    $('#add_section_name').val(),
                code:
                    $('#add_section_code').val(),
                screen_id:
                    $('#add_section_screen_id').val(),

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Section created successfully'
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

    validateUpdateSection() {

        clearErrors();

        let isValid = true;

        let sectionName =
            $('#edit_section_name')
                .val()
                .trim();
        let sectionCode =
            $('#edit_section_code')
                .val()
                .trim();

        if (sectionCode === '') {

            showValidationError(
                'edit_section_code',
                'Section Code is required'
            );

            isValid = false;

        }

        if (sectionName === '') {

            showValidationError(
                'edit_section_name',
                'Section Name is required'
            );

            isValid = false;
        }

        return isValid;
    }

    updateSection() {

        if (!this.validateUpdateSection()) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.updateSectionUrl.replace(
                    '__ID__',
                    $('#section_id').val()
                ),

            type: 'PUT',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,

                name:
                    $('#edit_section_name').val(),

                code: $('#edit_section_code').val(),

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Section updated successfully'
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

    deleteSection() {

        if (
            !confirm(
                'Are you sure you want to delete this section?'
            )
        ) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.deleteSectionUrl.replace(
                    '__ID__',
                    $('#section_id').val()
                ),

            type: 'DELETE',

            data: {

                _token:
                    FormBuilderConfig.csrfToken

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Section deleted successfully'
                );

                $('.section-node[data-id="' +
                    $('#section_id').val() +
                    '"]').remove();

                $('#property-panel')
                    .html('');

            },

            error: (xhr) => {

                toastr.error(
                    xhr.responseJSON?.message ||
                    'Unable to delete section'
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
                        mode + '_section_' + field,
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

window.sectionManager = new SectionManager();

$(function () {
    sectionManager.init();
});