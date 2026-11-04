function loadProperty(type, id) {
    $('#property-panel').html(
        '<div class="text-center p-5">Loading...</div>'
    );

    $.get(
        '/admin/forms/builder/property/' +
        type +
        '/' +
        id,

        function (html) {

            $('#property-panel')
                .html(html);

        }
    );
}

$(document).on(
    'click',
    '.screen-node',
    function () {

        $('.screen-node')
            .removeClass('active');

        $(this)
            .addClass('active');

        loadProperty(
            'screen',
            $(this).data('id')
        );

    }
);

$(document).on(
    'click',
    '.section-node',
    function (e) {

        e.stopPropagation();

        loadProperty(
            'section',
            $(this).data('id')
        );

    }
);

$(document).on(
    'click',
    '.field-node',
    function (e) {

        e.stopPropagation();

        loadProperty(
            'field',
            $(this).data('id')
        );

    }
);


function loadSections(screenId) {
    $.get(
        '/admin/forms/screens/' + screenId + '/sections',
        function(sections) {

            let html = '';

            sections.forEach(function(section) {

                html += `
                    <option value="${section.id}">
                        ${section.code} - ${section.name}
                    </option>
                `;

            });

            $('#field_section_id')
                .html(html);

        }
    );
}

$(document).on('ready', function() {

    loadSections(
        $('#field_screen_id').val()
    );

});

$('#field_screen_id').on('change', function() {

    loadSections($(this).val());

});

$('#publishBtn').on('click', function() {

    $.post(
        '/admin/forms/' + FormBuilderConfig.formId + '/publish', {
            _token: '{{ csrf_token() }}'
        },
        function() {
            
            toastr.success(
                'Journey Published Successfully'
            );

        }
    );

});

$('#previewJsonBtn').on('click', function() {

    $.get(
        '/admin/forms/' + FormBuilderConfig.formId + '/json-preview',
        function(data) {

            $('#jsonPreview')
                .text(
                    JSON.stringify(
                        data,
                        null,
                        4
                    )
                );

            new bootstrap.Modal(
                document.getElementById(
                    'jsonPreviewModal'
                )
            ).show();

        }
    );

});