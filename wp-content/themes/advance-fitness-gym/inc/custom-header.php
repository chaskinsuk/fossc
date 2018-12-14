<?php
/**
 * @package advance-fitness-gym
 * @subpackage advance-fitness-gym
 * @since advance-fitness-gym 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses advance_fitness_gym_header_style()
*/

function advance_fitness_gym_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'advance_fitness_gym_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'advance_fitness_gym_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'advance_fitness_gym_custom_header_setup' );

if ( ! function_exists( 'advance_fitness_gym_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see advance_fitness_gym_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'advance_fitness_gym_header_style' );
function advance_fitness_gym_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'advance-fitness-gym-basic-style', $custom_css );
	endif;
}
endif; // advance_fitness_gym_header_style