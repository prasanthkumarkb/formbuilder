function clearErrors() {
    $('.invalid-feedback').html('');
    $('.form-control,.form-select')
        .removeClass('is-invalid');
}

function showValidationError(field,message) {

    $('#' + field)
        .addClass('is-invalid');

    $('#error_' + field)
        .html(message).show();
    //toastr.error(message);

}

$(document).on(
    'input change',
    '.form-control,.form-select',
    function () {

        $(this)
            .removeClass('is-invalid');

        $('#error_' + $(this).attr('id'))
            .html('');

    }
);