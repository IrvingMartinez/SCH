$( document ).ready(function ()
{
    $('form[name="create_category"]').ajaxSubmit({
        url: 'index.php?c=blog&m=create_category',
        textReDrawButton: true,
        onFatalError: function ( response )
        {
            alertify.error(response.message);
        },
        success: function ( response )
        {
            swal({
                text: 'Se agregó la categoría.',
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
