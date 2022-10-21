"use strict";

$( document ).ready(function ()
{
    $.app.tableSearch();

    /* Table
    ------------------------------------------------------------------------------- */
    $(document).find('table').DataTable({
        dom: 'Bfrtip',
        buttons: [

        ],
        'columnDefs': [
            {
                'orderable': false,
                'targets': '_all'
            },
            {
                'className': 'text-left',
                'targets': '_all'
            }
        ],
        'order': [
            // [4,'asc']
        ],
        'searching': false,
        'info': false,
        'paging': true,
        'language': {
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    /* Get
    ------------------------------------------------------------------------------- */
    $('[data-ajax-user]').each(function ()
    {
        let self = $(this);

        self.ajaxSubmit({
            typeSend: 'click',
            textReDrawButton: true,
            data: {
                'action' : 'get_user',
                'id' : self.data('ajax-user')
            },
            success: function ( response )
            {
                let modal = $('#users_update');

                modal.find('[data-user-title]').html(response.data.username +' (#'+ response.data.id +')');
                modal.find('input[name="username"]').val(response.data.username);
                modal.find('input[name="password"]').val('');
                modal.find('select[name="level"]').val(response.data.level);
                modal.find('select[name="area"]').val(response.data.area);
                modal.find('input[type="checkbox"][name="permissions[]"]').prop( "checked", false );
                modal.find('form').append('<input name="id" type="hidden" value="'+ response.data.id +'"/>');

                if ( $.isArray(response.data.permissions) )
                {
                    for ( let permission of response.data.permissions )
                    {
                        modal.find('input[type="checkbox"][name="permissions[]"][value="'+ permission +'"]').prop( "checked", true );
                    }
                }

                modal.vkye_modal().open()
            }
        });
    });
});
