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
});
