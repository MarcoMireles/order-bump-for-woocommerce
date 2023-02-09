<?php
if (SOB_Settings::$sob_options['sob_active_sob'] === '' || empty(SOB_Settings::$sob_options['sob_active_sob']) || SOB_Settings::$sob_options['sob_active_sob'] == 'Desactive'){
  return;
}
$impressive_title = SOB_Settings::$sob_options['sob_impressive_title'];
$text_add_to_cart = SOB_Settings::$sob_options['sob_text_to_add_to_cart'];
$custom_product_title = SOB_Settings::$sob_options['sob_product_title'];
$custom_product_description = SOB_Settings::$sob_options['sob_product_description'];
$product_id = SOB_Settings::$sob_options['sob_product_bump'];
$product = wc_get_product( $product_id );
if ( $product ) {
  // Accede a los datos del producto
  $product_title = $product->get_title();
  $product_price = $product->get_price();
  $product_sku = $product->get_sku();
  $product_description = $product->get_description();
  $product_image = wp_get_attachment_image_src( $product->get_image_id(), 'full' );
?>
  <div id="sob-container">
    <div class="sob-box-product ">
      <h3 class="dummy"> </h3>
      <div class="sob-content">
        <div class="title">
          <h3 class="sob-title"><?php echo $impressive_title;?></h3>
        </div>
        <div class="sob-add-to-cart">
          <input type="checkbox" id="orderbump-<?php echo $product_id;?>" />
          <label for="orderbump-<?php echo $product_id;?>"><?php echo $text_add_to_cart . $product_price;?></label>
        </div>
        <div class="sob-product">
          <div class="sob-image">
            <img src="<?php echo $product_image[0];?>" alt="<?php echo $custom_product_title;?>">
          </div>
          <div class="sob-product-info">
            <h4 class="sob-product-title"><?php echo $custom_product_title;?></h4>
            <p class="sob-product-description"><?php echo $custom_product_description;?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>

