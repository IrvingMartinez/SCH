$( document ).ready(function ()
{
    $.app.uploadImagePreview()

    $( document ).on('imageIsValid', 'input[type="file"]', function ( event )
    {
        let self = event.detail.self;
        let container = event.detail.container;

        container.find('> figure').remove();
        container.prepend('<figure class="m-0"><img class="img-fluid" src="'+ event.detail.image +'"></figure>');
    });

    $('form[name="update_employee"]').ajaxSubmit({
        textReDrawButton: true,
        onFatalError: function ( response )
        {
            alertify.error(response.message);
        },
        success: function ( response )
        {
            swal({
                text: 'Se actualizó el empleado.',
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
