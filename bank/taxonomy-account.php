<?php
/**
 * Taxonomy template for the product type
 */
get_header(); ?>
<?php get_template_part('template-parts/sticky-menu');?>
<div class="main-conatiner">
  
    <?php
      if (  function_exists('category_image_src') ) {
        $category_image = category_image_src( array( 'size' => 'full' ) , false );
      } else {
        $category_image = '';
      }

     if ( $category_image ): ?>
      <div class="inner-banner">
        <img src="<?php echo $category_image; ?>" alt="<?php echo get_the_title(); ?>">
      </div>
    <?php endif; ?>  

  <div class="container">

    <nav class="breadcrumb">
      <?php if ( function_exists( 'bcn_display' ) ) {
          bcn_display();
      } ?>
    </nav>

    <div class="inner-wrapper">
      <div class="common-tab">

        <div class="left-tab">
          <nav class="sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <?php
              /**
              * Reports taxonomy terms listing
              */
              $current_term_id = get_queried_object()->term_id;
              $taxonomy_name = 'account';
              $parent  = get_term_by( 'id', $current_term_id, $taxonomy_name);
              // climb up the hierarchy until we reach a term with parent = '0'
              while ( $parent->parent != '0' ) {
                  $term_id = $parent->parent;
                  $parent  = get_term_by( 'id', $term_id, $taxonomy_name );
              }
              $term_id = $parent->term_id;

              $term_children = get_term_children( $term_id, $taxonomy_name );
              if ( $term_children ) {
                echo '<ul id="side-menu">';
                foreach ( $term_children as $child ) {

                  $term = get_term_by( 'id', $child, $taxonomy_name );
                  $class = ( $current_term_id === $term->term_id ) ? 'active' : '';
                  echo '<li class="' . $class . '" ><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '<span class="fa arrow"></span></a>';

                    $account_arg = array(
                      'post_type'       => 'products',
                      'post_status'     => 'publish',
                      'posts_per_page'  => -1,
                      'tax_query'       => array(
                        array(
                            'taxonomy'         => $taxonomy_name,
                            'field'            => 'slug',
                            'terms'            => $term->slug,
                            'include_children' =>false,
                          )
                        ),
                      'order'    => 'ASC',
                      'order_by' => 'menu_order'
                    );
                    $accounts = new WP_query( $account_arg );
                    echo "<ul class='nav-second-level' >";
                    if( $accounts->have_posts() ):
                      while( $accounts->have_posts() ):$accounts->the_post();?>
                          <li>
                            <a href="<?php echo get_the_permalink(); ?>" >
                              <?php echo get_the_title(); ?>
                            </a>                        
                          </li>

                      <?php 
                      endwhile;
                    endif;
                    echo "</ul></li>";                    
                  }
                echo '</ul>';
              } else {
                echo '<ul id="side-menu">';
                  echo '<li class="active" ><a href="' . $parent->slug . '">' . $parent->name . '<span class="fa arrow"></span></a>';
                    $account_arg = array(
                      'post_type'      => 'products',
                      'post_status'    => 'publish',
                      'posts_per_page' => -1,
                      'tax_query'      => array(
                        array(
                            'taxonomy'         => $taxonomy_name,
                            'field'            => 'slug',
                            'terms'            => $parent->slug,
                            'include_children' =>false,
                          )
                        ),
                      'order'    => 'ASC',
                      'order_by' => 'menu_order'
                    );
                    $accounts = new WP_query($account_arg);
                    echo "<ul class='nav-second-level' >";
                    if( $accounts -> have_posts() ):
                      while( $accounts->have_posts() ):$accounts->the_post(); ?>
                          <li>
                            <a href="<?php echo get_the_permalink(); ?>" >
                              <?php echo get_the_title(); ?>
                            </a>                        
                          </li>

                      <?php 
                      endwhile;
                    endif;
                    echo "</ul></li></ul>";
              }
              wp_reset_query();        

              ?> 
            </div>                              
        </nav>

          <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
          <?php endif; ?>
          
        </div>
        
        <div class="right-tab">  
          <h2><?php echo single_term_title();?></h2>                               
          <?php echo wpautop( term_description() ); ?>
          
            <?php
              $account_arg = array(
                'post_type'      => 'products',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                      'taxonomy'         => 'account',
                      'field'            => 'slug',
                      'terms'            => get_queried_object()->slug,
                      'include_children' =>false,
                    )
                  ),
                'order' => 'ASC',
                'order_by' => 'menu_order'
              );
              $accounts = new WP_query($account_arg);
              
              if ($accounts->have_posts()) { ?>
              <div class="inside-bg-block">

              <?php
              if($accounts->have_posts()):                
                while($accounts->have_posts()):$accounts->the_post();

                  $display_as = get_post_meta( $post->ID, 'display_as', true );
                  if ( "faq" != $display_as ) { ?>

                      <div class="account-rpt-block">
                        <h5><?php echo get_the_title(); ?></h5>
                        <?php echo get_the_excerpt();?>
                        <div class="button-wrap">
                          <a href="<?php echo get_the_permalink(); ?>" class="btn-red">
                            <span>Read more</span>
                          </a>                        
                        </div>
                      </div>

                  <?php } else { ?>

                  <a href="#" class="faq-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/faq-icon.png" alt="<?php echo get_the_title(); ?> ">
                    <span>FAQ’s</span>
                  </a>
                  <div class="faq-block-wrap">
                    <h5><?php echo get_the_title(); ?></h5>
                    <div class="faq-content-wrap">
                      <?php 
                        echo wpautop( do_shortcode( get_the_content() ) );
                      ?>
                    </div> 
                  </div>

                <?php }                 
                endwhile;
              endif; ?>
            </div>
          <?php } ?>            
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/footer-image-menu');?>
</div>
<?php get_footer(); ?>
