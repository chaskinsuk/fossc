<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php do_action( 'advance_fitness_gym_above_slider' ); ?>

<section id="slider">
  <?php if( get_theme_mod( 'advance_fitness_gym_slider_hide') != '') { ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'advance_fitness_gym_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt,20 ) ); ?></p>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <?php } ?>
  <div class="clearfix"></div>
</section>

<?php do_action( 'advance_fitness_gym_below_slider' ); ?>

<?php if( get_theme_mod( 'advance_fitness_gym_product_service') != '') { ?>

<section id="fitness-content">
  <div class="container">
  <div class="fitnes-post">      
    <div class="row">
      <?php
        $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('advance_fitness_gym_product_service'),'theblog')));?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>                
            <div class="col-md-3 col-sm-3">
              <div class="service-border">
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt,10 ) ); ?></p>
              </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
      ?>
    </div>
    </div>
  </div>
</section>

<?php } ?>

<?php do_action( 'advance_fitness_gym_below_fitness_content' ); ?>

<?php if( get_theme_mod( 'advance_fitness_gym_single_post') != '') { ?>

<section id="fitness-togym">
  <div class="container">
    <div class="fitness-single-post">      
      <?php
       $args = array( 'name' => get_theme_mod('advance_fitness_gym_single_post',''));
       $query = new WP_Query( $args );
       if ( $query->have_posts() ) :
         while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="row">
            <div class="col-md-6">
              <div class="img-box">
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-content">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <hr class="wlcm-hr">
                 <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt,70 ) ); ?></p>
                 <div class="know-btn">
                   <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Know More', 'advance-fitness-gym' ); ?>"><?php esc_html_e('Know More','advance-fitness-gym'); ?>
                   </a>
                 </div>
              </div>
            </div>
          </div>
         <?php endwhile; 
         wp_reset_postdata();?>
         <?php else : ?>
           <div class="no-postfound"></div>
         <?php
     endif; ?>
    </div>
  </div>
</section>

<?php }?>

<?php do_action( 'advance_fitness_gym_below_fitness_togym' ); ?>

<div id="content">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>