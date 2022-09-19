$( document ).ready(function ()
{
    $('form[name="create_municipality"]').ajaxSubmit({
        url: 'index.php?c=monitor&m=create_municipality',
        textReDrawButton: true,
        onFatalError: function ( response )
        {
            alertify.error(response.message);
        },
        success: function ( response )
        {
            swal({
                text: 'Se agregó el municipio.',
                type: 'success',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: function ()
                {
                    return new Promise(function (resolve)
                    {
                        window.location.href = response.redirect;

                        setTimeout(function ()
                        {
                            resolve();
                        }, 5000);
                    });
                }
            });
        }
    });

});
