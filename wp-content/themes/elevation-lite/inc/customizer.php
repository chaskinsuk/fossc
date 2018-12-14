<?php    
/**
 *Elevation Lite Theme Customizer
 *
 * @package Elevation Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elevation_lite_customize_register( $wp_customize ) {	
	
	function elevation_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function elevation_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'elevation_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'elevation-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
		'title' => __('Site Layout','elevation-lite'),			
		'priority' => 1,
		'panel' => 	'elevation_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	'section'   => 'layout_option',    	 
		'label' => __('Check to Box Layout','elevation-lite'),
		'description' => __('if you want to box layout please check the Box Layout Option.','elevation-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
		'default' => '#ff8a01',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','elevation-lite'),			
			'description' => __('More color options in PRO Version','elevation-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);	
	
	//Header Contact Info
	$wp_customize->add_section('hdr_contactinfo_sec',array(
		'title' => __('Header Contact Info','elevation-lite'),				
		'priority' => null,
		'panel' => 	'elevation_lite_panel_area',
	));
	
	$wp_customize->add_setting('hdr_phone_text',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('hdr_phone_text',array(	
		'type' => 'text',
		'label' => __('Add phone number here','elevation-lite'),
		'section' => 'hdr_contactinfo_sec',
		'setting' => 'hdr_phone_text'
	));	
	
	$wp_customize->add_setting('contact_emailid',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_emailid',array(
		'type' => 'text',
		'label' => __('Add email address here.','elevation-lite'),
		'section' => 'hdr_contactinfo_sec'
	));	
	 
	 //Header social icons
	$wp_customize->add_section('social_sec',array(
		'title' => __('Header social icons','elevation-lite'),
		'description' => __( 'Add social icons link here to display icons in header', 'elevation-lite' ),			
		'priority' => null,
		'panel' => 	'elevation_lite_panel_area', 
	));
	
	$wp_customize->add_setting('fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
		'label' => __('Add facebook link here','elevation-lite'),
		'section' => 'social_sec',
		'setting' => 'fb_link'
	));	
	
	$wp_customize->add_setting('twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
		'label' => __('Add twitter link here','elevation-lite'),
		'section' => 'social_sec',
		'setting' => 'twitt_link'
	));
	
	$wp_customize->add_setting('gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('gplus_link',array(
		'label' => __('Add google plus link here','elevation-lite'),
		'section' => 'social_sec',
		'setting' => 'gplus_link'
	));
	
	$wp_customize->add_setting('linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('linked_link',array(
		'label' => __('Add linkedin link here','elevation-lite'),
		'section' => 'social_sec',
		'setting' => 'linked_link'
	));
	
	$wp_customize->add_setting('show_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_socialicons', array(
	   'settings' => 'show_socialicons',
	   'section'   => 'social_sec',
	   'label'     => __('Check To show This Section','elevation-lite'),
	   'type'      => 'checkbox'
	 ));//Show Social icons Section 	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
		'title' => __('Slider Section', 'elevation-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 827 pixel.','elevation-lite'), 
		'panel' => 	'elevation_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','elevation-lite'),
		'section' => 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','elevation-lite'),
		'section' => 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','elevation-lite'),
		'section' => 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('slider_readmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','elevation-lite'),
		'section' => 'slider_options',
		'setting' => 'slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_slider',array(
		'default' => false,
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
	    'settings' => 'show_slider',
	    'section'   => 'slider_options',
	     'label'     => __('Check To Show This Section','elevation-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 // 3 Column Services Section
	$wp_customize->add_section('three_pageboxs_section', array(
		'title' => __('Three Column Services Section','elevation-lite'),
		'description' => __('Select pages from the dropdown for three column services section','elevation-lite'),
		'priority' => null,
		'panel' => 	'elevation_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('services-pagebox1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'services-pagebox1',array(
		'type' => 'dropdown-pages',			
		'section' => 'three_pageboxs_section',
	));		
	
	$wp_customize->add_setting('services-pagebox2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'services-pagebox2',array(
		'type' => 'dropdown-pages',			
		'section' => 'three_pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'services-pagebox3',array(
		'type' => 'dropdown-pages',			
		'section' => 'three_pageboxs_section',
	));
	
	$wp_customize->add_setting('servicesbox_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('servicesbox_readmore',array(	
		'type' => 'text',
		'label' => __('Add Read more button name here','elevation-lite'),
		'section' => 'three_pageboxs_section',
		'setting' => 'servicesbox_readmore'
	)); // services Read More Button Text
	
	$wp_customize->add_setting('show_servicesbox',array(
		'default' => false,
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
	   'settings' => 'show_servicesbox',
	   'section'   => 'three_pageboxs_section',
	   'label'     => __('Check To Show This Section','elevation-lite'),
	   'type'      => 'checkbox'
	 ));//Show wedding couple Section	
	 
	// How It Works section 
	$wp_customize->add_section('howitworks_section', array(
		'title' => __('How It Works Section','elevation-lite'),
		'description' => __('Select Pages from the dropdown for how it works section','elevation-lite'),
		'priority' => null,
		'panel' => 	'elevation_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('howitworks_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'howitworks_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'howitworks_section',
	));		
	
	$wp_customize->add_setting('show_howitworks_page',array(
		'default' => false,
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_howitworks_page', array(
	    'settings' => 'show_howitworks_page',
	    'section'   => 'howitworks_section',
	    'label'     => __('Check To Show This Section','elevation-lite'),
	    'type'      => 'checkbox'
	));//Show How It Works Page Section 	
	 
	// Theme Options Page section 
	$wp_customize->add_section('themeoptions_page_section', array(
		'title' => __('Theme Options Page Section','elevation-lite'),
		'description' => __('Select Pages from the dropdown for theme options page section','elevation-lite'),
		'priority' => null,
		'panel' => 	'elevation_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('themeoptions_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elevation_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'themeoptions_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'themeoptions_page_section',
	));		
	
	
	$wp_customize->add_setting('show_themeoptions_page',array(
		'default' => false,
		'sanitize_callback' => 'elevation_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_themeoptions_page', array(
	    'settings' => 'show_themeoptions_page',
	    'section'   => 'themeoptions_page_section',
	    'label'     => __('Check To Show This Section','elevation-lite'),
	    'type'      => 'checkbox'
	 ));//Show theme options Page Section 	 
	
		 
}
add_action( 'customize_register', 'elevation_lite_customize_register' );

function elevation_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .recent_articles h2 a:hover,
        #sidebar ul li a:hover,								
        .recent_articles h3 a:hover,					
        .recent-post h6:hover,					
        .three-column-box:hover .button,									
        .postmeta a:hover,
        .button:hover,
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,
        .nivo-caption .slide_more:hover,	
        .hwitwork-content h3 span,
        .hwitwork-content h3:hover,
        .three-column-box:hover h3 a,
        .header-top a:hover,
        .header-menu ul li a:hover, 
        .header-menu ul li.current-menu-item a,
        .header-menu ul li.current-menu-parent a.parent,
        .header-menu ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('color_scheme','#ff8a01')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .three-column-box .thumbbx,	
        .social-icons a:hover,			
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('color_scheme','#ff8a01')); ?>;}	
            
        .nivo-caption .slide_more:hover	,
        .three-column-box:hover .button,
        .button:hover
            { border-color:<?php echo esc_html( get_theme_mod('color_scheme','#ff8a01')); ?>;}		
    </style> 
<?php           
}
         
add_action('wp_head','elevation_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elevation_lite_customize_preview_js() {
	wp_enqueue_script( 'elevation_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'elevation_lite_customize_preview_js' );