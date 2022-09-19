$( document ).ready(function ()
{
    $('[data-ajax-delete-area]').on('click', function()
    {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            text: 'Se eliminará el área.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff5560',
            cancelButtonColor: '#508AEB',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: function ()
            {
                return new Promise(function (resolve)
                {
                    $.post('index.php?c=monitor&m=delete_area', { id: self.data('ajax-delete-area') }, function(data, status, jqXHR)
                    {
                        if ( data.status == 'OK' )
                        {
                            xhr_status = 'OK';
                        }
                        else
                        {
                            xhr_status = 'error';
                            message = ( !data.message ) ? 'Error' : data.message;
                        }

                        setTimeout(function ()
                        {
                            resolve();
                        }, 500);
                    });
                });
            }
        }).then(function ()
        {
            if ( xhr_status == 'OK' )
            {
                swal({
                    type: 'success',
                    text: 'Se eliminó el área.',
                    preConfirm: function ()
                    {
                        return new Promise(function (resolve)
                        {
                            location.reload();

                            setTimeout(function ()
                            {
                                resolve();
                            }, 5000);
                        });
                    }
                });
            }
            else
            {
                swal({
                    type: 'error',
                    text: 'Error',
                    html: message
                });
            }

        });
    });
});
