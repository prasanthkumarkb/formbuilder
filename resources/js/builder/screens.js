class ScreenManager {

    init() {
         console.log('ScreenManager initialized');
        $(document).on(
            'click',
            '#saveScreenBtn',
            this.createScreen.bind(this)
        );

        $(document).on(
            'click',
            '#updateScreenBtn',
            this.updateScreen.bind(this)
        );

        $(document).on(
            'click',
            '#deleteScreenBtn',
            this.deleteScreen.bind(this)
        );

    }

    validateScreen() {

        clearErrors();

        let isValid = true;

        let screenName =
            $('#add_screen_name')
                .val()
                .trim();

        if (screenName === '') {

            showValidationError(
                'add_screen_name',
                'Screen Name is required'
            );

            isValid = false;
        }

        return isValid;
    }

    createScreen() {

        if (!this.validateScreen()) {
            return;
        }

        $.ajax({

            url: FormBuilderConfig.saveScreenUrl,

            type: 'POST',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,

                name:
                    $('#add_screen_name').val(),

                sort_order:
                    $('#add_screen_sort_order').val()

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Screen created successfully'
                );

               setTimeout(() => {
                    location.reload();
                }   , 2000);

            },

            error: (xhr) => {

                this.handleValidationErrors(xhr,'add');

            }

        });
    }

    validateUpdateScreen() {

        clearErrors();

        let isValid = true;

        let screenName =
            $('#edit_screen_name')
                .val()
                .trim();

        if (screenName === '') {

            showValidationError(
                'edit_screen_name',
                'Screen Name is required'
            );

            isValid = false;
        }

        return isValid;
    }

    updateScreen() {

        if (!this.validateUpdateScreen()) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.updateScreenUrl.replace(
                    '__ID__',
                    $('#screen_id').val()
                ),

            type: 'PUT',

            data: {

                _token:
                    FormBuilderConfig.csrfToken,

                name:
                    $('#edit_screen_name').val(),

                sort_order:
                    $('#edit_screen_sort_order').val()

            },

            success: (response) => {
              
                toastr.success(
                    response.message ||
                    'Screen updated successfully'
                );

              setTimeout(() => {
                    location.reload();
                }   , 2000);

            },

            error: (xhr) => {

                this.handleValidationErrors(xhr,'edit');

            }

        });
    }

    deleteScreen() {

        if (
            !confirm(
                'Are you sure you want to delete this screen?'
            )
        ) {
            return;
        }

        $.ajax({

            url:
                FormBuilderConfig.deleteScreenUrl.replace(
                    '__ID__',
                    $('#screen_id').val()
                ),

            type: 'DELETE',

            data: {

                _token:
                    FormBuilderConfig.csrfToken

            },

            success: (response) => {

                toastr.success(
                    response.message ||
                    'Screen deleted successfully'
                );

                $('.screen-node[data-id="' +
                    $('#screen_id').val() +
                    '"]').remove();

                $('#property-panel')
                    .html('');

            },

            error: (xhr) => {

                toastr.error(
                    xhr.responseJSON?.message ||
                    'Unable to delete screen'
                );

            }

        });
    }

    handleValidationErrors(xhr,mode) {

        if (xhr.status === 422) {

            $.each(
                xhr.responseJSON.errors,
                function (field, messages,mode) {

                    showValidationError(
                        mode+'_screen_'+field,
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

window.screenManager = new ScreenManager();

$(function () {
    screenManager.init();
});