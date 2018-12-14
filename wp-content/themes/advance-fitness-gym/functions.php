<?php
/**
 * Advance Fitness Gym functions and definitions
 *
 * @package advance-fitness-gym
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if (!function_exists('advance_fitness_gym_setup')):

function advance_fitness_gym_setup() {

	$GLOBALS['content_width'] = apply_filters('advance_fitness_gym_content_width', 640);

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	));
	add_image_size('advance-fitness-gym-homepage-thumb', 250, 145, true);
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'advance-fitness-gym'),
	));

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', advance_fitness_gym_font_url()));
}

endif;
add_action('after_setup_theme', 'advance_fitness_gym_setup');

/* Theme Widgets Setup */
function advance_fitness_gym_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'advance-fitness-gym'),
		'description'   => __('Appears on blog page sidebar', 'advance-fitness-gym'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'advance-fitness-gym'),
		'description'   => __('Appears on page sidebar', 'advance-fitness-gym'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'advance-fitness-gym'),
		'description'   => __('Appears on page sidebar', 'advance-fitness-gym'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 1', 'advance-fitness-gym'),
		'description'   => __('Appears on footer', 'advance-fitness-gym'),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 2', 'advance-fitness-gym'),
		'description'   => __('Appears on footer', 'advance-fitness-gym'),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 3', 'advance-fitness-gym'),
		'description'   => __('Appears on footer', 'advance-fitness-gym'),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer Navigation 4', 'advance-fitness-gym'),
		'description'   => __('Appears on footer', 'advance-fitness-gym'),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Home Page Sidebar', 'advance-fitness-gym'),
		'description'   => __('Appears on home page', 'advance-fitness-gym'),
		'id'            => 'homepage-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'advance_fitness_gym_widgets_init');

/* Theme Font URL */
function advance_fitness_gym_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';

	$query_args = array(
		'family' => rawurlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */

function advance_fitness_gym_scripts() {
	wp_enqueue_style('advance-fitness-gym-font', advance_fitness_gym_font_url(), array());
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('advance-fitness-gym-basic-style', get_stylesheet_uri());
	wp_enqueue_style('advance-fitness-gym-customcss', get_template_directory_uri().'/css/custom.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/fontawesome-all.css');
	wp_enqueue_script('SmoothScroll-jquery', get_template_directory_uri().'/js/SmoothScroll.js', array('jquery'));
	wp_enqueue_script('advance-fitness-gym-customscripts-jquery', get_template_directory_uri().'/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery'));
	wp_enqueue_style('advance-fitness-gym-ie', get_template_directory_uri().'/css/ie.css', array('advance-fitness-gym-basic-style'));
	wp_style_add_data('advance-fitness-gym-ie', 'conditional', 'IE');
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'advance_fitness_gym_scripts');

function advance_fitness_gym_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

/*radio button sanitization*/
function advance_fitness_gym_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

/* Excerpt Limit Begin */
function advance_fitness_gym_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

define('ADVANCE_FITNESS_GYM_CREDIT', 'https://www.themeshopy.com/themes/free-wordpress-fitness-theme/', 'advance-fitness-gym');

if (!function_exists('advance_fitness_gym_credit')) {
	function advance_fitness_gym_credit() {
		echo "<a href=".esc_url(ADVANCE_FITNESS_GYM_CREDIT)." target='_blank'>".esc_html__('Advance Fitness Theme', 'advance-fitness-gym')."</a>";
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'advance_fitness_gym_loop_columns');
	if (!function_exists('advance_fitness_gym_loop_columns')) {
		function advance_fitness_gym_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Custom header additions. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';