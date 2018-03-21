<?php get_header() ?>
<section class="homepage aboutpage paddingBody commonpage">
  <h2>ABOUT US</h2>
  <div class="container">
    <div class="row marginbottom">
      <?php 
          if(have_posts()){
             the_post();
             the_content();
          }
      ?>
    </div>
  </div>
  <img src="<?php echo TEMPLATE_PATH; ?>/images/banner.jpg" class="img-responsive img-bottom" alt="">
  <div class="clear"></div>
</section>
<?php get_footer() ?>