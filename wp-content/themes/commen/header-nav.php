<?php
 global $woocommerce;
  $cart_total = $woocommerce->cart->cart_contents_count;
  $checkout_url = $woocommerce->cart->get_checkout_url();

?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top ">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                  <a class="cartIcon" href="#"></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="<?php echo HOME_URL; ?>"><img src="<?php echo TEMPLATE_PATH ?>/images/logo.png"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <?php
                       wp_nav_menu( array(
                            'theme_location' =>'primary',
                            'container'=>'',
                            'menu'=>'',
                            'items_wrap'=>'%3$s'
                        ) );
                        ?>

                        <li class="visible-1024">
                            <a class="cartIcon" href="#">
                                <span class="total-cart"><?php echo $cart_total; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="signUpFree navbar-fixed-top">
        <div class="container">
            <div class="row">
            <span class="txt">SIGN UP FOR 10% OFF YOUR FIRST ORDER</span>
                <div class="signupBox">
                    <form action="" method="">
                        <div class="orangeBox">
                            <span class="title">EMAIL |</span>
                            <input type="text" value="" placeholder="" />
                        </div>
                        <input type="submit" class="btn-button" value="SIGN UP"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
