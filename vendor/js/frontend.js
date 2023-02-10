jQuery(document).ready(function($) {

    $('.sob_input_product').on('click', function () {
        var product = $(this).attr('product-id');
        var ajaxurl = $(this).data('ajax');
        var security = $(this).data('nonce');
        var chkAction = $(this).is(":checked");
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'add_product_to_cart',
                product:product,
                security:security,
                chkAction: chkAction
            },
            success: function( response ) {
                console.log( response );
                if(response.success){
                    $('body').trigger('update_checkout');
                }
            }
        });
    });
});