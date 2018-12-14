<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Yogaclub Lite
 */
?>

<div class="footer-copyright">
        	<div class="container">
            	<div class="copyright-txt">
					<?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'yogaclub-lite');?>           
                </div>
                <div class="design-by">
				  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/yogaclub-lite/', 'yogaclub-lite' ) ); ?>"><?php printf( __( 'Theme by %s', 'yogaclub-lite' ), 'Grace Themes' ); ?></a>
                </div>
                 <div class="clear"></div>
            </div>           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>