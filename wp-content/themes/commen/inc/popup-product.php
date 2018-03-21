<?php 

 function loadDataPopup($productID){
     ob_start();
     $product = wc_get_product($productID);
    ?>
    <div class="cd-quick-view" id="viewProduct-<?php echo $productID ?>">
    <div class="cd-wrapper-all clearfix">
      <div class="cd-slider-wrapper">
          <ul class="cd-slider">
              <li class="selected">
                <?php 
                    echo get_the_post_thumbnail($productID,'thumb-proudct-poppup');
                ?>
              </li>
          </ul> <!-- cd-slider -->
      </div> <!-- cd-slider-wrapper -->
      <div class="cd-item-info product-information">
          <h2><?php echo get_the_title($productID); ?><br/>
          <div>	<?php  echo woocommerce_price($product->get_price()); ?></div>
          </h2>
          <div class="cd-item-select">
           <p>
            <?php
                   echo woocommerce_template_single_add_to_cart();
              ?>
             </p>
          </div>
          <div class="cd-item-description">
            <h3 class="item-title">Product Details</h3>
            <?php //print_r($product); ?>
            <?php echo apply_filters( 'the_excerpt', $product->description ); ?>
          </div>
      </div> <!-- cd-item-info -->
      <a href="#0" onClick="SiteMain.closePopup('.cd-quick-view')" class="cd-close"></a>
    </div>
</div> 
<!-- cd-quick-view -->

    <?php 
    $data = ob_get_contents();
    ob_end_clean();
    return $data;
 }

?>