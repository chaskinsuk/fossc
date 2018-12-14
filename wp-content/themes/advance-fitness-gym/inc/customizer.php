<?php
/**
 * Advance Fitness Gym Theme Customizer
 *
 * @package advance-fitness-gym
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_fitness_gym_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_fitness_gym_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-fitness-gym'),
		'description'    => __('Description of what this panel does.', 'advance-fitness-gym'),
	));

	//Layouts
	$wp_customize->add_section('advance_fitness_gym_left_right', array(
		'title'    => __('Layout Settings', 'advance-fitness-gym'),
		'priority' => 30,
		'panel'    => 'advance_fitness_gym_panel_id',
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_fitness_gym_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-fitness-gym'),
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices',
	));
	$wp_customize->add_control('advance_fitness_gym_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-fitness-gym'),
		'section'        => 'advance_fitness_gym_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-fitness-gym'),
			'Right Sidebar' => __('Right Sidebar', 'advance-fitness-gym'),
			'One Column'    => __('One Column', 'advance-fitness-gym'),
			'Three Columns' => __('Three Columns', 'advance-fitness-gym'),
			'Four Columns'  => __('Four Columns', 'advance-fitness-gym'),
			'Grid Layout'   => __('Grid Layout', 'advance-fitness-gym')
		),
	));

	//Topbar section
	$wp_customize->add_section('advance_fitness_gym_topbar',array(
		'title'	=> __('Topbar Section','advance-fitness-gym'),
		'description'	=> __('Add Header Content here','advance-fitness-gym'),
		'priority'	=> null,
		'panel' => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_fitness_gym_contact',array(
		'label'	=> __('Add Phone Number','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar',
		'setting'	=> 'advance_fitness_gym_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('advance_fitness_gym_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_fitness_gym_email',array(
		'label'	=> __('Add Email','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar',
		'setting'	=> 'advance_fitness_gym_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('advance_fitness_gym_topbar_header',array(
		'title'	=> __('Social Icon Section','advance-fitness-gym'),
		'description'	=> __('Add Social Link here','advance-fitness-gym'),
		'priority'	=> null,
		'panel' => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_cont_facebook',array(
		'label'	=> __('Add Facebook link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_cont_twitter',array(
		'label'	=> __('Add Twitter link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_google_plus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_google_plus',array(
		'label'	=> __('Add Google Plus link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_google_plus',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_instagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_instagram',array(
		'label'	=> __('Add Instagram link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_instagram',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('advance_fitness_gym_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_fitness_gym_linkedin',array(
		'label'	=> __('Add Linkedin link','advance-fitness-gym'),
		'section'	=> 'advance_fitness_gym_topbar_header',
		'setting'	=> 'advance_fitness_gym_linkedin',
		'type'		=> 'url'
	));
	
	//Slider
	$wp_customize->add_section( 'advance_fitness_gym_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-fitness-gym' ),
		'priority'   => null,
		'panel' => 'advance_fitness_gym_panel_id'
	) );

	$wp_customize->add_setting('advance_fitness_gym_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_fitness_gym_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-fitness-gym'),
       'section' => 'advance_fitness_gym_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_fitness_gym_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_fitness_gym_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_fitness_gym_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-fitness-gym' ),
			'section'  => 'advance_fitness_gym_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Products Service
	$wp_customize->add_section( 'advance_fitness_gym_services_section' , array(
    	'title'      => __( 'Services', 'advance-fitness-gym' ),
		'priority'   => null,
		'panel' => 'advance_fitness_gym_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_fitness_gym_product_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices'
	));
	$wp_customize->add_control('advance_fitness_gym_product_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','advance-fitness-gym'),
		'section' => 'advance_fitness_gym_services_section',
	));

	//welcome More
	$wp_customize->add_section('advance_fitness_gym_post',array(
		'title'	=> __('Welcome Section','advance-fitness-gym'),
		'description'	=> __('Add Welcome sections below.','advance-fitness-gym'),
		'panel' => 'advance_fitness_gym_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}
	$wp_customize->add_setting('advance_fitness_gym_single_post',array(
		'sanitize_callback' => 'advance_fitness_gym_sanitize_choices',
	));	
	$wp_customize->add_control('advance_fitness_gym_single_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','advance-fitness-gym'),
		'section' => 'advance_fitness_gym_post',
	));

	//footer
	$wp_customize->add_section('advance_fitness_gym_footer_section', array(
		'title'       => __('Footer Text', 'advance-fitness-gym'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-fitness-gym'),
		'priority'    => null,
		'panel'       => 'advance_fitness_gym_panel_id',
	));

	$wp_customize->add_setting('advance_fitness_gym_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_fitness_gym_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-fitness-gym'),
		'section' => 'advance_fitness_gym_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_fitness_gym_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Fitness_Gym_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_fitness_gym_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Fitness_Gym_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Fitness_Gym_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Fitness Pro Theme', 'advance-fitness-gym'),
					'pro_text' => esc_html__('Go Pro', 'advance-fitness-gym'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-fitness-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('advance-fitness-gym-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
https://www.themeshopy.com/themes/wordpress-fitness-theme/
		wp_enqueue_style('advance-fitness-gym-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Fitness_Gym_Customize::get_instance();