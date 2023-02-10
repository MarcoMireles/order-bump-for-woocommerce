<?php
if (!class_exists('Ajax_Add_To_Cart')) {
  class Ajax_Add_To_Cart
  {
    public function __construct()
    {
      add_action('wp_ajax_add_product_to_cart', array($this, 'add_product_to_cart'));
      add_action('wp_ajax_nopriv_add_product_to_cart', array($this, 'add_product_to_cart'));
    }

    public function add_product_to_cart()
    {
      // Aquí puedes manejar la lógica de tu petición AJAX
      // Por ejemplo, puedes recuperar datos de la base de datos
      // y devolverlos en formato JSON

      $productID = $_POST['product'];
      // Verifica si el producto ya está en el carrito
            $product_in_cart = false;
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
              if ( $cart_item['product_id'] == $productID ) {
                $product_in_cart = true;
                break;
              }
            }
      // Agrega el producto al carrito si no está allí
       if ( ! $product_in_cart ) {
          $quantity = 1; // Cantidad que quieres agregar
          $variation_id = 0; // ID de la variación, en caso de que sea un producto variable. Si es un producto simple, usa 0
          $variation = array(); // Array con las opciones de la variación, en caso de que sea un producto variable. Si es un producto simple, deja en blanco
          $add = WC()->cart->add_to_cart( $productID,$quantity);
        }else{
         $cartId = WC()->cart->generate_cart_id( $productID );
         $cartItemKey = WC()->cart->find_product_in_cart( $cartId );
         WC()->cart->remove_cart_item( $cartItemKey );
       }
//      $add = WC()->cart->add_to_cart( $productID );


      $data = array(
        'success' => $add,
        'message' => 'La petición AJAX funciona! - Producto = 137'
      );

      wp_send_json($data);
    }
  }
}