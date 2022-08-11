"use strict"

$( document ).ready(function ()
{
    $('#employee_create [button-submit]').ajaxSubmit({
        url: 'index.php?c=monitor&m=create_employee',
        typeSend: 'click',
        formSubmit: $('form[name="employee_create"]'),
        textReDrawButton: true,
        onFatalError: function ( response )
        {
            alertify.error(response.message);
        },
        success: function ( response )
        {
            swal({
                title: 'Se agregó el empleado.',
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
