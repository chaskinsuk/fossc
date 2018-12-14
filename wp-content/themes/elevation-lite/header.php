<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Elevation Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_socialicons 	  	= get_theme_mod('show_socialicons', false);
$show_slider 	  		= get_theme_mod('show_slider', false);
$show_servicesbox 	  	= get_theme_mod('show_servicesbox', false);
$show_howitworks_page	= get_theme_mod('show_howitworks_page', false);
$show_themeoptions_page	= get_theme_mod('show_themeoptions_page', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>">       
<div class="header-top">
  <div class="container">
   <?php if(!dynamic_sidebar('header-widget')): ?>
     <div class="left">             
      <?php if ( ! dynamic_sidebar( 'headerinfowidget' ) ) : ?>                              
       <?php 
	   $hdr_phone_text = get_theme_mod('hdr_phone_text');
	   if( !empty($hdr_phone_text) ){ ?>           		  
	   		<span class="phoneno"><i class="fas fa-phone-square"></i><?php echo esc_html($hdr_phone_text); ?></span>   
       <?php } ?>               
       <?php
	   $contact_emailid = get_theme_mod('contact_emailid');
	   if( !empty($contact_emailid) ){ ?>           		 
	   		<i class="fas fa-envelope"></i>
	   		<a href="<?php echo esc_url('mailto:'.get_theme_mod('contact_emailid')); ?>"><?php echo esc_html(get_theme_mod('contact_emailid')); ?></a>                 
       <?php } ?> 
   	   <?php endif; // end header info widget area ?>  
     </div>
     
     <div class="right">
     <?php if( $show_socialicons != ''){ ?> 
       <div class="social-icons">                   
           <?php $fb_link = get_theme_mod('fb_link');
           	if( !empty($fb_link) ){ ?>
           	<a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a>
           <?php } ?>
        
           <?php $twitt_link = get_theme_mod('twitt_link');
            if( !empty($twitt_link) ){ ?>
            <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
           <?php } ?>
    
          <?php $gplus_link = get_theme_mod('gplus_link');
            if( !empty($gplus_link) ){ ?>
            <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
          <?php }?>
    
          <?php $linked_link = get_theme_mod('linked_link');
            if( !empty($linked_link) ){ ?>
            <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
          <?php } ?>                  
      </div><!--end .social-icons--> 
    <?php } ?> 
    </div>
     <div class="clear"></div>
    <?php endif; ?>
  </div>
</div><!--end header-top-->

<div class="logonavigation">
<div class="container">    
  <div class="logo">
        <?php elevation_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
  </div><!-- logo -->
  <div class="head-rightpart">
  <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','elevation-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="header-menu">                   
        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
       </div><!--.header-menu -->  
 </div><!-- .head-rightpart --> 
<div class="clear"></div>  

</div><!-- container --> 
</div><!-- .logonavigation -->  
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('sliderpage'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('sliderpage'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p> 
    <?php
    $slider_readmore = get_theme_mod('slider_readmore');
    if( !empty($slider_readmore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($slider_readmore); ?></a>
    <?php } ?>       
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_servicesbox != ''){ ?>  
<section id="services-section-one">
<div class="container">                                               
<?php 
for($n=1; $n<=3; $n++) {    
if( get_theme_mod('services-pagebox'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('services-pagebox'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
	<div class="three-column-box <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="pagecontent">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<p><?php echo esc_html( wp_trim_words( get_the_content(), 15, '...' ) );  ?></p>   
		<?php
		$servicesbox_readmore = get_theme_mod('servicesbox_readmore');
		if( !empty($servicesbox_readmore) ){ ?>
		<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html($servicesbox_readmore); ?></a>
		<?php } ?>                                   
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- .services-section-one section-->                      	      
<?php } ?>

<?php if( $show_howitworks_page != ''){ ?>  
<section id="hwitwork-section">
<div class="container">                               
<?php 
if( get_theme_mod('howitworks_page',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('howitworks_page',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
     <?php if(has_post_thumbnail() ) { ?>
        <div class="hwitwork-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
      <?php } ?>                                   
     <div class="hwitwork-content">
       <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
       <p><?php echo esc_html( wp_trim_words( get_the_content(), 100, '...' ) );  ?></p>
       <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','elevation-lite'); ?></a>
    </div>                                      
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #how it work-section -->
<?php } ?>

<?php if( $show_themeoptions_page != ''){ ?>  
<section id="themeoptions-section">
<div class="container">                                   
<?php 
if( get_theme_mod('themeoptions_page',false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('themeoptions_page',true)) );				
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
		<h2><?php the_title(); ?></h2>
		<p><?php echo esc_html( wp_trim_words( get_the_content(), 100, '...' ) );  ?></p>
		<?php if(has_post_thumbnail() ) { ?>
		<div class="generalpage-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>   
	<?php endwhile;
	wp_reset_postdata(); ?>                                    
<?php } ?>                                 
<div class="clear"></div>                
</div><!-- container -->
</section><!-- #themeoptions-section -->
<?php } ?>
<?php } ?>