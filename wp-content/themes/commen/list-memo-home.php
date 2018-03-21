 <!-- Filter -->
      <section class="section-filter" id="filter">
          <h2>Memoirs</h2>
          <div class="container">
            <div class="row">
              <div class="section-filter__main">
                <div class="section-filter__main--nav">
                    <a href="#">All</a>
                  <?php
                     $categories = get_categories( array(
                          //'orderby' => 'name',
                          'parent'  => 0
                      ) );
                      foreach ( $categories as $category ) {
                          printf( '<a href="%1$s">%2$s</a>',
                              esc_url( get_category_link( $category->term_id ) ),
                              esc_html( $category->name )
                          );
                      }
                   ?>
                </div>
                <div class="section-filter__main--content clearfix">
                  <!-- item -->
                  <?php 
                  wp_reset_query();
                  query_posts('post_type=post&posts_per_page=3');
                    if(have_posts()){
                         while(have_posts()){
                              the_post();
                            ?>
                           <div class="col-md-4">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
                            <div class="filter-item">
                             <?php
                                if ( has_post_thumbnail() ){
                                       the_post_thumbnail('thumb-memo');
                                   }  
                                ?>
                              <?php the_excerpt(); ?>
                              <span >READ MORE</span>
                            </div>
                          </a>
                        </div>
                            <?php 
                         }
                   }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <a href="<?php echo HOME_URL(); ?>/memoirs/" class="btn-style">See All</a>
      </section>
      <!-- End filter -->