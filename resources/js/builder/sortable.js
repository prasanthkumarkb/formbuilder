function saveScreenOrder(items)
{
    FormBuilder.showSaving();

    $.post(
        FormBuilderConfig.sortScreensUrl,
        {
            _token :
                FormBuilder.csrfToken,

            items : items
        },
        function(){

            FormBuilder.showSaved();

        }
    );
}

function saveSectionOrder(items)
{
    FormBuilder.showSaving();
    $.post(
        FormBuilderConfig.sortSectionsUrl,
        {
            _token :
                FormBuilder.csrfToken,

            items : items
        },
        function(){

            FormBuilder.showSaved();

        }
    );
}

function saveFieldOrder(items)
{
    FormBuilder.showSaving();

    $.post(
        FormBuilderConfig.sortFieldsUrl,
        {
            _token :
                FormBuilder.csrfToken,

            items : items
        },
        function(){

            FormBuilder.showSaved();

        }
    );
}

function initSortable()
{
    new Sortable(
        document.getElementById(
            'screen-sortable'
        ),
        {

            animation:150,

            handle:'.drag-handle',

            onEnd:function(){

                let items = [];

                $('#screen-sortable > .screen-node')
                    .each(function(index){

                        items.push({

                            id :
                                $(this).data('id'),

                            sort_order :
                                index + 1

                        });

                    });

                saveScreenOrder(items);
            }
        }
    );

    document
    .querySelectorAll('.section-sortable')
    .forEach(function(el){

        new Sortable(el,{

            animation:150,

            handle:'.drag-handle',

            onEnd:function(){

                let items = [];

                $(el)
                .children('.section-node')
                .each(function(index){

                    items.push({

                        id:
                            $(this).data('id'),

                        sort_order:
                            index + 1

                    });

                });

                saveSectionOrder(items);

            }

        });

    });

    document
    .querySelectorAll('.field-sortable')
    .forEach(function(el){

        new Sortable(el,{

            animation:150,

            handle:'.drag-handle',

            onEnd:function(){

                let items = [];

                $(el)
                .children('.field-node')
                .each(function(index){

                    items.push({

                        id:
                            $(this).data('id'),

                        sort_order:
                            index + 1

                    });

                });

                saveFieldOrder(items);

            }

        });

    });

}