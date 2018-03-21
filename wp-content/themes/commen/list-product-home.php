<section class="carousel container">
  <div class="col-md-12">
      <div class="row">
        <div class="carousel-container">
            <div id="carousel1">
              <?php 
                query_posts('post_type=product&posts_per_page=14');
                if(have_posts()){
                     while(have_posts()){
                          the_post();
                          $id = get_the_ID();
                          $poppup .= loadDataPopup($id);

                        ?>
                      <div class="carousel-item">
                          <a href="javascript:void(0)">
                            <?php
                         if ( has_post_thumbnail() ){
                              $thumbId = get_post_thumbnail_id($id);
                              $img = wp_get_attachment_image_src($thumbId,'thumb-home');
                             echo '<img data-id="'.$id.'" src="'.$img[0].'" alt="'.$img[1].'">';
                           }  
                            ?>
                          </a>
                      </div>
                        <?php 
                     }
                }

              ?>
            </div>
            <a class="prev arr"></a>
            <a class="next arr"></a>
    	  </div>
      </div>
  </div>
  <div class="col-md-12 row-title">
    <h2>COMMEN TEE</h2>
  <?php 
     $shop_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
  ?>
    <a href="<?php echo $shop_url; ?>" class="btn-style">Shop Now</a>
  </div>
</section>
<div class="group-poup">
  <?php echo $poppup; ?>
</div>
