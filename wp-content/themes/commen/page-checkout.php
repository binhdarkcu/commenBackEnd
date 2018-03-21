<?php get_header() ?>
<div class="homepage">
<?php get_template_part('header-nav'); ?>
<section class="cartPage paddingBody">
     <div class="topText">
                <div class="container">
                    WHY NOT ADD A PAIR OF SHORTS TO SAVE €10 OFF THE TOTAL IN OUT BUNDLE OFFER
                </div>
        </div>
  <div class="container">
     <h2 class="bigTitle">Checkout</h2>
    <div class="row marginbottom">
      <?php 
          if(have_posts()){
             the_post();
             the_content();
          }
      ?>
    </div>
  </div>
</section>
</div>
<?php get_footer() ?>