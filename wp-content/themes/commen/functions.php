<?php 
include_once 'inc/filter-woo.php';
include_once 'inc/ajax.php';
include_once 'inc/popup-product.php';
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
//include_once 'inc/Mobile_Detect.php';

add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true', 50 );
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
remove_action('wp_head', 'wp_generator');
//include 'inc/filters-woocommerce.php';
if(session_id()) session_start();
add_action( 'admin_enqueue_scripts', 'rdsp_dequeue_script', 999 );
function rdsp_dequeue_script() {
     wp_dequeue_script( 'select2');
}
//add_theme_support( 'post-thumbnails', array( 'post', 'page','logos','chung-nhan','tuyen-dung','san-pham' ) );
define('TEMPLATE_PATH',get_bloginfo('template_url'));
define('HOME_URL',get_home_url());
define('BlOG_NAME',get_bloginfo('blog_name'));
define('SLOGAN', get_bloginfo('description'));
define('VAT', 10);
register_nav_menu( 'primary', 'Top Menu' );
register_nav_menu( 'footer', 'Footter Menu' );

add_image_size( 'thumb-home',270,270,true);
add_image_size( 'thumb-memo',361,218,true);
add_image_size( 'thumb-proudct-poppup',610,610,true);
// add_theme_support( 'wc-product-gallery-zoom' );
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );

function tk_add_scripts_styles(){
    wp_deregister_script('jquery');
    //  wp_deregister_script('underscore');
     //wp_deregister_script('backbone');
     wp_enqueue_script('jquery',TEMPLATE_PATH.'/js/jquery-2.1.1.min.js');
     $vars = array(
         'SITE_URL'=> HOME_URL,
         'TEMPLATE_PATH'=> TEMPLATE_PATH,
        //'CURRENCY_SYMBOL'=> get_woocommerce_currency_symbol(),
         'AJAX_URL'=> admin_url( 'admin-ajax.php' ),
         'SECURITY' => wp_create_nonce('ats-security-load')
      );

     if(is_user_logged_in()){
        $current_user = wp_get_current_user();
        $vars['UID'] = $current_user->ID;
     }
    wp_enqueue_script('tk-bootstrap-js',TEMPLATE_PATH.'/asset/js/bootstrap.min.js',array('jquery'));
    wp_enqueue_script('tk-easing-js',TEMPLATE_PATH.'/js/jquery.easing.1.3.js',array('jquery'));
   wp_enqueue_script('tk-modernizr-js',TEMPLATE_PATH.'/js/jquery.waterwheelCarousel.min.js',array('jquery'));
    wp_enqueue_script('tk-site-main',TEMPLATE_PATH.'/js/class.SiteMain.js',array('jquery'));
    wp_enqueue_script('tk-slick-js',TEMPLATE_PATH.'/js/slick.js',array('jquery'));
    wp_enqueue_script('tk-main',TEMPLATE_PATH.'/js/main.js',array('jquery','tk-site-main'));

    wp_localize_script('tk-main','TK_VARS',$vars);

    wp_enqueue_style('tk-bootstrap-css', TEMPLATE_PATH . '/asset/css/bootstrap.css', array(), false, 'all');
    wp_enqueue_style('all-css', TEMPLATE_PATH . '/css/all.css', array(), false, 'all');
    wp_enqueue_style('slick-theme-css', TEMPLATE_PATH . '/css/slick-theme.css', array(), false, 'all');
    wp_enqueue_style('slick-css', TEMPLATE_PATH . '/css/slick.css', array(), false, 'all');
     wp_enqueue_style('custom-css', TEMPLATE_PATH . '/css/custom.css', array(), false, 'all');

  //  $detect = new Mobile_Detect;
  // if( $detect->isMobile() ) {
  //     wp_enqueue_style('menu-mobile-css', TEMPLATE_PATH . '/css/jquery.mmenu.all.css', array(), false, 'all');
  // }
 
}
add_action('wp_enqueue_scripts', 'tk_add_scripts_styles');

function my_theme_add_editor_styles() {
    //add_editor_style('editor-style.css');
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );
if( function_exists('acf_add_options_page') ) {
 
   acf_add_options_page(array(
    'page_title'  => 'Tùy chỉnh',
    'menu_title' => 'Tùy chỉnh',
    'menu_slug'  => 'theme-general-settings'
   ));
 
     acf_add_options_sub_page(array(
      'page_title'  => 'Header',
      'menu_title' => 'Header',
      'parent_slug' => 'theme-general-settings',
     ));
   acf_add_options_sub_page(array(
    'page_title'  => 'SEO',
    'menu_title' => 'SEO',
    'parent_slug' => 'theme-general-settings',
     ));
  
   
}
//add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Hiện thi nội dung bên phải.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget'  => '</li>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>',
    ) );
}

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


  function custom_excerpt_length( $length ) {
           return 40;
      }
 add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function my_login_logo() { ?>
    <style type="text/css">
        .wc-social-login{
            display:none !important;
        }
        #login h1 a {
            background-image: url("<?php
              echo TEMPLATE_PATH;
             ?>/images/logo.png") !important;
              width:250px;
              height:72px;
              background-size:100%;
              -webkit-background-size:100%;
        }
    </style>
<?php } ?>
<?php 
add_action( 'login_enqueue_scripts', 'my_login_logo' );
 if(is_user_logged_in ()){
     global $current_user;  
     get_currentuserinfo();
     if($current_user->ID != 1){
         include 'inc/remove.php';
     }
}
function tk_wp_select($field){
    echo '<select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '">';
    foreach ( $field['options'] as $key => $value ) {
        echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
    }

    echo '</select> ';
}





?>