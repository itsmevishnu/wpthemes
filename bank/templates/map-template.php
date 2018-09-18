<?php
/**
 * Template Name: Map template
 */
get_header();
get_template_part('template-parts/sticky-menu');
if(have_posts()): the_post();
?>
<div class="main-conatiner">

  <?php if ( get_the_post_thumbnail_url( get_the_ID() ) ) { ?>
	  <div class="inner-banner">        
		  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID())?>" alt="banner image of <?php echo get_the_title();?>">       
	  </div>
  <?php } ?>
      
  <div class="container">

    <nav class="breadcrumb">
      <?php if ( function_exists( 'bcn_display' ) ) {
          bcn_display();
      } ?>
    </nav>
    
    <div class="inner-wrapper">
      <div class="common-tab"> 
        <div class="left-tab">
        

        </div>
        <div class="right-tab">
          <h2><?php echo get_the_title();?></h2> 
          <div class="google-map">
          	<?php echo do_shortcode(get_the_content());?>
          </div>

                     
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/footer-image-menu');?>
</div>
<?php
endif;
get_footer();