<?php
/**
 *Elevation Lite About Theme
 *
 * @package Elevation Lite
 */

//about theme info
add_action( 'admin_menu', 'elevation_lite_abouttheme' );
function elevation_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'elevation-lite'), __('About Theme Info', 'elevation-lite'), 'edit_theme_options', 'elevation_lite_guide', 'elevation_lite_mostrar_guide');   
} 

//Info of the theme
function elevation_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'elevation-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Elevation is a modern and gorgeous, handsome and colorful, creative and innovative, engaging and attractive, conceptually unique and tech-savvy, user and developer friendly, easy to use and highly responsive free parallax WordPress theme. This WordPress theme is a very high quality and resourceful website theme, developed specifically to satisfy the needs of web developers.','elevation-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'elevation-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'elevation-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'elevation-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'elevation-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'elevation-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'elevation-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'elevation-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'elevation-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'elevation-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( ELEVATION_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'elevation-lite'); ?></a> | 
            <a href="<?php echo esc_url( ELEVATION_LITE_PROTHEME_URL ); ?>"><?php esc_html_e('Purchase Pro', 'elevation-lite'); ?></a> | 
            <a href="<?php echo esc_url( ELEVATION_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'elevation-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>