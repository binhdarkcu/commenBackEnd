<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
    
	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		 <ul>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				   $id = $related_product->get_id() 
				?>
   
                  <li class="col-md-2 col-sm-4 col-xs-12">
                  	<a href="?<php echo get_permalink($id);?>">
                            <?php
                         if ( has_post_thumbnail() ){
                              $thumbId = get_post_thumbnail_id($id);
                              $img = wp_get_attachment_image_src($thumbId,'thumb-home');
                             echo '<img src="'.$img[0].'" alt="'.$img[1].'">';
                           }  
                            ?>
                       </a>
                  </li>
				

			<?php endforeach; ?>

		</ul>
 
	</section>

<?php endif;

wp_reset_postdata();
