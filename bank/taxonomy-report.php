<?php
/**
 * Reports taxonomy page 
 */
get_header(); ?>
<?php get_template_part('template-parts/sticky-menu');?>
<div class="main-conatiner">
  
  <?php
    if ( function_exists('category_image_src') ) {
      $category_image = category_image_src( array( 'size' => 'full' ) , false );
    } else {
      $category_image = '';
    }
  ?>
  <?php if( $category_image ): ?>
    <div class="inner-banner">
      <img src="<?php echo $category_image; ?>" alt="<?php echo get_the_title(); ?>">
    </div>
  <?php endif;?>

  <div class="container">
  
    <nav class="breadcrumb">
      <?php if ( function_exists( 'bcn_display' ) ) {
        bcn_display();
      } ?>
    </nav>

      <div class="inner-wrapper">
        <div class="common-tab"> 
          <div class="left-tab">              
                    <ul class="nav">
                    <?php
            /**
             * Reports taxonomy terms listing
             */ 
              $current_term_id = get_queried_object()->term_id;
              $terms = get_terms([
                  'taxonomy' => 'report',
                  'hide_empty' => false,
              ]);
              if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                echo '<ul class="nav nav-tabs" role="tablist">';
                  foreach ($terms as $term) {
                    $url = get_term_link($term); ?>
                      <li class="<?php if( $current_term_id == $term->term_id ) { echo "active"; } ?>">
                      <a href="<?php echo $url;?>">
                        <?php echo $term->name; ?>
                      </a>
                    </li>
                  <?php
                  }
                echo '</ul>';
              }
            ?>

                    <?php
                    /**
             * Post side bar widgets
             */
             if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
              <?php dynamic_sidebar( 'sidebar-3' ); ?>
            <?php endif; ?>
            
                </div>
          <div class="right-tab">               
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="FinancialResults">
                    <h2><?php echo single_term_title();?></h2> 
                    <div class="slim-scrol-01">
                      <ul class="financial-report">
                      <?php
            $report_args = array(
              'post_type' => 'reports',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'tax_query' => array(
                array('taxonomy' => 'report',
                    'field'    => 'slug',
                    'terms'    => get_queried_object()->slug,
                    'include_children' =>false,
                  )
                ),
              'order_by' => 'menu_order'
            );
          $reports = new WP_query($report_args);
          if($reports->have_posts()):
            while($reports->have_posts()):$reports->the_post();
          ?>
                        <li>
                          <a href="<?php echo get_post_meta(get_the_ID(),'upload_file', true);?>" target="_blank">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="<?php echo get_the_title();?>">
                            <span>
                              <img src="<?php echo get_template_directory_uri();?>/images/cloud-download.png" alt="">
                              <b><?php echo get_the_title();?></b>
                            </span>
                          </a>
                        </li>
                    <?php endwhile;?>
                <?php endif;?>
                    </ul> 
                    </div>
          </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <?php get_template_part('template-parts/footer-image-menu');?>
</div>
<?php get_footer(); ?>