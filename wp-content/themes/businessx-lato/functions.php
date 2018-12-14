<?php
/**
 * Businessx Lato functions and definitions.
 *
 * @package businessx-lato
 * @since 1.0.0
 */

define( 'BUSINESSX_LATO_VERSION', '1.0.0' );

/**
 * Load assets.
 *
 * @since 1.0.0
 */
function businessx_lato_enqueue() {
    $parent = 'businessx-style';
    $style  = '/style.css';

    // Parent style
    wp_enqueue_style( 
        $parent, 
        get_template_directory_uri() . $style,
        array(),
        BUSINESSX_VERSION
    );

    // Child style
    wp_enqueue_style( 
        'businessx-lato-style', 
        get_stylesheet_directory_uri() . $style, 
        array( $parent ), 
        BUSINESSX_LATO_VERSION 
    );
}
add_action( 'wp_enqueue_scripts', 'businessx_lato_enqueue' );

/**
 * Dequeue default Google Fonts
 *
 * @since  1.0.0
 * @return void
 */
function businessx_lato_dequeue_fonts() {
    wp_dequeue_style( 'businessx-fonts' );
}
add_action( 'wp_enqueue_scripts', 'businessx_lato_dequeue_fonts', 15 );

/**
 * Enqueue Google Fonts
 *
 * @since  1.0.0
 * @return void
 */
function businessx_lato_enqueue_fonts() {
    wp_enqueue_style( 
        'businessx-lato-fonts', 
        businessx_lato_fonts_setup(), 
        array(), 
        BUSINESSX_LATO_VERSION 
    );
}
add_action( 'wp_enqueue_scripts', 'businessx_lato_enqueue_fonts', 5 );

/**
 * Google Fonts setup
 *
 * @since  1.0.0
 * @return string Google Fonts URL
 */
function businessx_lato_fonts_setup() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    $fonts[] = 'Lato:400,700,300';
    $fonts[] = 'Open Sans:400,300,700,900,300italic,400italic,700italic';

    $fonts_args = apply_filters( 'businessx_lato_fonts_setup', array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
    ), compact( 'fonts', 'subsets' ) );

    return add_query_arg( $fonts_args, 'https://fonts.googleapis.com/css' );
}