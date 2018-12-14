<?php
/**
 * businessup Admin Class.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'businessup_Admin' ) ) :

/**
 * businessup_Admin Class.
 */
class businessup_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'businessup_admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'businessup_hide_notices' ) );
		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'businessup_activation_admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function businessup_admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'businessup' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'businessup' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'businessup-welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'businessup_enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function businessup_enqueue_styles() {
		global $businessup_version;

		wp_enqueue_style( 'businessup-welcome', get_template_directory_uri() . '/css/themeinfo.css', array(), $businessup_version );
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function businessup_hide_notices() {
		if ( isset( $_GET['businessup-hide-notice'] ) && isset( $_GET['_businessup_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_businessup_notice_nonce'], 'businessup_businessup_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'businessup' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'businessup' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['businessup-hide-notice'] );
		}
	}
	
	
	public function businessup_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'businessup_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function businessup_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Businessup! 
For the best use of Businessup theme, visit the Wecome page %swelcome page%s.', 'businessup' ), '<a href="' . esc_url( admin_url( 'themes.php?page=businessup-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=businessup-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Businessup', 'businessup' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * financeup_intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function businessup_intro() {
		global $businessup_version;

		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		$major_version = substr( $businessup_version, 0, 3 );
		?>
		<div class="businessup-theme-info">
			<h1>
				<?php esc_html_e('About', 'businessup'); ?>
				<?php echo $theme->display( 'Name' ); ?>
				<?php printf( '%s', $major_version ); ?>
			</h1>
		</div>

		<p class="businessup-actions">
			<a href="<?php echo esc_url( 'https://themeansar.com/themes/businessup/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'businessup' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/businessup/' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'businessup' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/businessup/default/' ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'businessup' ); ?></a>

			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/businessup/reviews/#new-post' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rating this theme', 'businessup' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'businessup-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'businessup-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo $theme->display( 'Name' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'businessup-welcome', 'tab' => 'supported_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Supported Plugins', 'businessup' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'businessup-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'businessup' ); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'import_dummy_data' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'businessup-welcome', 'tab' => 'import_dummy_data' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Import Businessup Demo Data', 'businessup' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->businessup_intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Theme Cusomization features availbale in Customizer setting : -   Appearance &#8594; Customize', 'businessup' ) ?></p>
						<p><a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'businessup' ); ?></a></p>
					</div>
					
					<div class="col">
						<h3><?php esc_html_e( 'Home Page Section Widget', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Homepage Section Widget like: BUP- Slider Widget, BUP- Service Widget availbale: -  Appearance &#8594; Widgets', 'businessup' ) ?></p>
						<p><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Widgets', 'businessup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'businessup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/docs/wp/businessup/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Documentation', 'businessup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Please Put your question / query on support forum.', 'businessup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/businessup' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support Forum', 'businessup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more functionality / features?', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features and functionlaity.', 'businessup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/businessup/' ); ?>" class="button button-secondary"><?php esc_html_e( 'View Pro', 'businessup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got sales related question?', 'businessup' ); ?></h3>
						<p><?php esc_html_e( 'Please send it via our sales contact page.', 'businessup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/contact/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Contact Page', 'businessup' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'businessup' );
							echo ' ' . $theme->display( 'Name' );
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'businessup' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/businessup' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'businessup' );
								echo ' ' . $theme->display( 'Name' );
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard businessup">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'businessup' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'businessup' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'businessup' ) : esc_html_e( 'Go to Dashboard', 'businessup' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the supported plugins screen.
	 */
	public function supported_plugins_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->businessup_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins:', 'businessup' ); ?></p>
			<ol>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>" target="_blank"><?php esc_html_e( 'Contact Form 7', 'businessup' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>" target="_blank"><?php esc_html_e( 'WooCommerce', 'businessup' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/polylang/' ); ?>" target="_blank"><?php esc_html_e( 'Polylang', 'businessup' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'businessup'); ?>
				</li>
				<li><a href="<?php echo esc_url( 'https://wpml.org/' ); ?>" target="_blank"><?php esc_html_e( 'WPML', 'businessup' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'businessup'); ?>
				</li>
			</ol>

		</div>
		<?php
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->businessup_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'businessup' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'businessup'); ?></h3></th>
						<th><h3><?php esc_html_e('businessup Lite', 'businessup'); ?></h3></th>
						<th><h3><?php esc_html_e('businessup Pro', 'businessup'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Slider', 'businessup'); ?></h3></td>
						<td><?php esc_html_e('3', 'businessup'); ?></td>
						<td><?php esc_html_e('Unlimited Slides', 'businessup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Slider Settings', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Slides type, duration & delay time', 'businessup'); ?></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Color Palette', 'businessup'); ?></h3></td>
						<td><?php esc_html_e('Primary Color Option', 'businessup'); ?></td>
						<td><?php esc_html_e('Multiple Color Options', 'businessup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Additional Top Header', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Social Icons + Menu + Header text option', 'businessup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Social Icons', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Boxed & Wide layout option', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Light & Dark Color skin', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Compatible', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Page Layouts', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Translation Ready', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WPML Compatible', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Polylang Compatible', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Footer Copyright Editor', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Demo Content', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Support', 'businessup'); ?></h3></td>
						<td><?php esc_html_e('Forum', 'businessup'); ?></td>
						<td><?php esc_html_e('Forum + Emails/Support Ticket', 'businessup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('MailChimp Subscriber', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Services widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Call to Action widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Single page widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured widget (Recent Work/Portfolio)', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Testimonial Widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Posts', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Our Clients widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('About us Template', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Teams Widget', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Portfolio 2 , 3 , 4 Column Template', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Template Template', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Contact us Template', 'businessup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'financeup_pro_theme_url', 'https://themeansar.com/themes/businessup-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'businessup' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
	
	public function import_dummy_data_screen() {
	?>
	<div class="wrap about-wrap">
	<?php $this->businessup_intro(); ?>
	<?php if ( has_action( 'businessup_import_content_tab' ) ) {
                    do_action( 'businessup_import_content_tab' );
                } else { ?>
                    <div id="plugin-filter" class="demo-import-boxed">
                        <?php
                        $plugin_name = 'one-click-demo-import';
                        $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
                        $button_class = 'install-now button';
                        $button_txt = esc_html__( 'Install Now', 'businessup' );
                        if ( ! $status ) {
                            $install_url = wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'install-plugin',
                                        'plugin' => $plugin_name
                                    ),
                                    network_admin_url( 'update.php' )
                                ),
                                'install-plugin_'.$plugin_name
                            );

                        } else {
                            $install_url = add_query_arg(array(
                                'action' => 'activate',
                                'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
                                'plugin_status' => 'all',
                                'paged' => '1',
                                
                                'external_url' => network_admin_url('themes.php?page=businessup-welcome&tab=import_dummy_data'),
                            ), network_admin_url('themes.php?page=businessup-welcome&tab=import_dummy_data'));
                            $button_class = 'activate-now button-primary';
                            $button_txt = esc_html__( 'Active Now', 'businessup' );
                        }

                        $detail_link = add_query_arg(
                            array(
                                'tab' => 'plugin-information',
                                'plugin' => $plugin_name,
                                'TB_iframe' => 'true',
                                'width' => '772',
                                'height' => '349',

                            ),
                            network_admin_url( 'plugin-install.php' )
                        );

                        ?>
                        <h3><?php _e('Import Dummy Data','businessup'); ?><h3>
                        <?php echo sprintf(__('<p><strong>One Click Demo Import</strong> is the WordPress Plugin helps to create exact replica of businessup theme. Click and Process.</p>','businessup')); ?>
                        <h4><?php _e('Key Notes:','businessup'); ?></h4>
                    
                            <li><?php _e('Click the button to install the plugin. Ignore if already installed.','businessup'); ?></li>
                            <li><?php _e('After activation go to Appreance >> Import Demo Data.','businessup'); ?></li>
                        
                        <?php
						echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
                        ?> 
                         
                        
                    </div>
                <?php } ?>
            </div>
	<?php }
}

endif;

return new businessup_Admin();