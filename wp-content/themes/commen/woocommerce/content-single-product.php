<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<div class="cd-item-description">
            <h3 class="item-title">Product Details</h3>
            <?php //print_r($product); ?>
            <?php echo woocommerce_template_single_excerpt(); ?>
          </div>
	</div>
 <div class="borderLine"></div>
      <div class="relatedProduct">
	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */

	//	do_action( 'woocommerce_after_single_product_summary' );
		echo do_shortcode('[related_products limit="6" columns="6"]');
	?>
   </div>
  </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
<script>
        jQuery(document).ready(function ($) {
            setInterval(function () {
                    var flexNav = $(".flex-control-nav.flex-control-thumbs");
                    var fleClass = $(".flex-viewport");
                    fleClass.addClass("img-zoom");
                    flexNav.addClass("slider-imge");
                    if (flexNav.length > 0) {
                        flexNav.removeClass("flex-control-nav flex-control-thumbs");
                        $('.slider-imge img').each(function () {
                            var src_img = $(this).attr('src').split('-180x180');
                           // $(this).attr('src',src_img[0] + src_img[1]);
                        });
                        flexNav.on('init', function (event, slick) {

                        });
                        flexNav.slick({
                            dots: false,
                            arrow: true,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            vertical: true,
                            verticalSwiping: true,
                            responsive: [
                                {
                                    breakpoint: 1023,
                                    settings: {
                                        vertical: false,
                                        verticalSwiping: false
                                    }
                                }
                            ]
                        });
                    }
                },
                500)
        })
    </script>
