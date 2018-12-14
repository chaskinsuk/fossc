<?php
/**
 *Yogaclub Lite About Theme
 *
 * @package Yogaclub Lite
 */

//about theme info
add_action( 'admin_menu', 'yogaclub_lite_abouttheme' );
function yogaclub_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'yogaclub-lite'), __('About Theme Info', 'yogaclub-lite'), 'edit_theme_options', 'yogaclub_lite_guide', 'yogaclub_lite_mostrar_guide');   
} 

//Info of the theme
function yogaclub_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'yogaclub-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Yogaclub Lite is a Powerful flexible and multipurpose free Yoga WordPress theme. It is designed Specially for Yoga, Massage Spa, Fitness, Gym, Weight Loss, Health Care and physiotherapy.  It is a simple and attractive but still professional theme that is best suited for all health Related organizations. It is very easy to setup and it comes with all the basic features that is needed to create your own website.','yogaclub-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'yogaclub-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'yogaclub-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'yogaclub-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'yogaclub-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'yogaclub-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'yogaclub-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'yogaclub-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'yogaclub-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'yogaclub-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( YOGACLUB_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'yogaclub-lite'); ?></a> | 
            <a href="<?php echo esc_url( YOGACLUB_LITE_PROTHEME_URL ); ?>"><?php esc_html_e('Purchase Pro', 'yogaclub-lite'); ?></a> | 
            <a href="<?php echo esc_url( YOGACLUB_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'yogaclub-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>