<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package businessup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
<header class="businessup-standhead">
  <div class="businessup-main-nav">
    <nav class="navbar navbar-default navbar-wp">
      <div class="container"> 
        <!-- Start Navbar Header -->
        <div class="navbar-header col-md-3"> 
          <?php if(has_custom_logo()) {
				// Display the Custom Logo
				the_custom_logo();
				} else { ?>
          	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <span> <?php bloginfo('name'); ?> </span> <br>
            <?php $description = get_bloginfo( 'description', 'display' );
  				if ( $description || is_customize_preview() ) : ?>
          		<span class="site-description"><?php echo $description; ?></span> 
          	<?php endif;?></a><?php }?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php esc_html_e('Toggle Navigation','bugency'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /End Navbar Header --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbar-wp">
            <?php wp_nav_menu( array(  
				    'theme_location' => 'primary', 'container'  => '', 'menu_class' => 'nav navbar-nav','fallback_cb' => 'businessup_fallback_page_menu','walker' => new businessup_nav_walker()
				     ) );
		      	?>
          </div>
        <!-- /Navigation --> 
      </div>
    </nav>
  </div>
</header>
<!-- #masthead --> 