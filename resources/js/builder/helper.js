window.FormBuilder = {

    csrfToken:
        $('meta[name="csrf-token"]').attr('content'),

    showSuccess(message) {
 
        toastr.success(message);
        sleep(1000).then(() => {
            
        });

    },

    showError(message) {

        toastr.error(message);

    },

    showSaving() {

        $('#saveStatus')
            .removeClass('d-none')
            .removeClass('bg-success')
            .addClass('bg-warning')
            .text('Saving...');

    },

    showSaved() {

        $('#saveStatus')
            .removeClass('bg-warning')
            .addClass('bg-success')
            .text('Saved');

        setTimeout(function () {

            $('#saveStatus')
                .addClass('d-none');

        }, 1500);

        toastr.success('Saved');

    }

};