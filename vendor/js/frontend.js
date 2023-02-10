jQuery(document).ready(function($) {

 var sobProduct= $('.sob_input_product');

 sobProduct.on(
     'click',
     function (){
         var product = $(this).attr('product-id');
         var ajaxurl = $(this).attr('data-ajax');
         console.log(product);
         jQuery.ajax({
             url: ajaxurl,
             type: 'post',
             data: {
                 action: 'add_product_to_cart',
                 product:product
                 // Agrega aquí tus datos adicionales
             },
             success: function( response ) {
                 console.log( response );
                 $('body').trigger('update_checkout');
                 // Actualiza dinámicamente el contenido del carrito
                 // location.reload();
             }
         });
     }
 );
});