<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Elevation Lite
 */
?>

<div class="footer-copyright">
            <div class="container footercolumn">
             <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                </div>
           <?php endif; ?>  
            <div class="clear"></div>
            </div><!--end .container-->
            
        	<div class="container copyright">            	
                <div class="design-by">
				  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'elevation-lite');?>  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/parallax-wordpress-theme/', 'elevation-lite' ) ); ?>" target="_blank"><?php printf( __( 'Theme by %s', 'elevation-lite' ), 'Grace Themes' ); ?></a>
                </div>
                 <div class="clear"></div>
            </div><!--end .container-->           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>