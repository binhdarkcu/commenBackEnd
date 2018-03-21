<?php get_header();?>
<div class="page">
<?php get_template_part('header-nav'); ?>
<section class="cartPage paddingBody">
  <div class="topText">
                <div class="container">
                    WHY NOT ADD A PAIR OF SHORTS TO SAVE €10 OFF THE TOTAL IN OUT BUNDLE OFFER
                </div>
        </div>
            <div class="container">
                <h2 class="bigTitle">Your bag</h2>
                  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                       <?php do_action( 'woocommerce_before_cart_table' ); ?>
                    <div class="col-md-6">
                        <div class="productList">
                            <ul>
                              <?php 
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                      $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                      $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                      if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                      }
                                        ?>
                                           <li>
                                    <div class="product-thumbnail">
                                     <?php
                                         $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                          if ( ! $product_permalink ) {
                                            echo $thumbnail;
                                          } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                          }
                                           ?>
                                   </div>
                                    <div class="productInfo">
                                        <h2><?php
            if ( ! $product_permalink ) {
              echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
            } else {
              echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
            }

            // Meta data.
            echo wc_get_formatted_cart_item_data( $cart_item );

            // Backorder notification.
            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
              echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
            }
            ?><br/><?php
                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
              ?></h2>
                                        <div class="cd-item-select">
                                           
                                          <table class="variations" cellspacing="0">
                                              <tbody>
                                                          <tr>
                                                              <td class="label"><label for="pa_size">Size</label></td>
                                                              <td class="value">
                                                                  <select id="pa_size" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes"><option value="">L</option><option value="m" class="attached enabled">M</option><option value="s" class="attached enabled">S</option></select>
                                                              </td>
                                                          </tr>
                                                </tbody>
                                            </table>
                                            <div class="single_variation_wrap">
                                              <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                                                       <?php
                                                                    if ( $_product->is_sold_individually() ) {
                                                                      $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                                    } else {
                                                                      $product_quantity = woocommerce_quantity_input( array(
                                                                        'input_name'    => "cart[{$cart_item_key}][qty]",
                                                                        'input_value'   => $cart_item['quantity'],
                                                                        'max_value'     => $_product->get_max_purchase_quantity(),
                                                                        'min_value'     => '0',
                                                                        'product_name'  => $_product->get_name(),
                                                                      ), $_product, false );
                                                                    }

                                                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                                                    ?>
                                            </div>
                                                <div class="product-remove">
                                                    <?php
                                                        
                                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                          '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                          esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                          __( 'Remove this item', 'woocommerce' ),
                                                          esc_attr( $product_id ),
                                                          esc_attr( $_product->get_sku() )
                                                        ), $cart_item_key );
                                                      ?>
                                                </div>
                                        </div>
                                    </div>
                                </li>


                                    <?php 
                                 }
                              ?>
                               
                               
                            </ul>
                            <div class="subTotal">
                                Sub Total: <?php
                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
              ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="totalCol">
                          <?php  do_action( 'woocommerce_cart_collaterals' ); ?>
                           <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                               <?php do_action( 'woocommerce_cart_actions' ); ?>
                               <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                            <span class="accept">We Accept: Visa / Mastercard / PayPal</span>
                        </div>
                    </div>
            </form>
      </div>
</section>
</div>
<?php get_footer() ?>