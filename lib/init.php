<?php

// Darkes Constants
function dg_constants(){
	define( 'DARKES_LIB_DIR', dirname(__FILE__) . '/' );
	define( 'DARKES_FUNCTIONS_DIR', dirname(__FILE__) . '/functions/' );
	define( 'DARKES_STRUCTURE_DIR', dirname(__FILE__) . '/structure/' );
	define( 'DARKES_TEMPLATE_PART_DIR', dirname(__FILE__) . '/template-part/' );
}

add_action('dg_init','dg_constants');

// Darkes Load Framework
function dg_load_framework(){
	// Load Functions.
	require_once( DARKES_FUNCTIONS_DIR . 'cpts.php');
	require_once( DARKES_FUNCTIONS_DIR . 'widgetize.php');

	// Load Functions.
	require_once( DARKES_LIB_DIR . 'framework.php');

	// Load Structures.
	require_once( DARKES_STRUCTURE_DIR . 'templates/about.php');
	require_once( DARKES_STRUCTURE_DIR . 'templates/appleshack.php');
	require_once( DARKES_STRUCTURE_DIR . 'templates/contact.php');
	require_once( DARKES_STRUCTURE_DIR . 'templates/darkes-brewing.php');
	require_once( DARKES_STRUCTURE_DIR . 'templates/glenbenie-orchard.php');

	require_once( DARKES_STRUCTURE_DIR . 'footer.php' );
	require_once( DARKES_STRUCTURE_DIR . 'header.php' );
	require_once( DARKES_STRUCTURE_DIR . 'loops.php' );
	require_once( DARKES_STRUCTURE_DIR . 'menu.php' );
	require_once( DARKES_STRUCTURE_DIR . 'modules.php' );
	
}

add_action('dg_init','dg_load_framework');

function dg_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyALVDWH0Y6hEuqurGEM_qcGzKtKJ1qeIrY');
}

add_action('acf/init', 'dg_acf_init');

function dg_load_option_page(){
	// ACF add options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Darkes Group Settings',
			'menu_title'	=> 'Darkes Group Settings',
			'menu_slug' 	=> 'dg-theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> true
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'General Settings',
			'menu_title'	=> 'General Settings',
			'parent_slug'	=> 'dg-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Site Header Settings',
			'menu_title'	=> 'Site Header',
			'parent_slug'	=> 'dg-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Site Footer Settings',
			'menu_title'	=> 'Site Footer',
			'parent_slug'	=> 'dg-theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Social Media Channels',
			'menu_title'	=> 'Social Media Channels',
			'parent_slug'	=> 'dg-theme-general-settings',
		));
	}
}

add_action('dg_init','dg_load_option_page');

do_action('dg_init');

function dg_child_theme_setup(){
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	//Add viewport metatag
	add_theme_support( 'genesis-responsive-viewport' );
	//Add 3 footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );
	//Add support for custom background
	add_theme_support( 'custom-background' );
	//Add support for custom logo
	add_theme_support( 'custom-logo' );

    //* Remove the site title
    remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
    //* Remove the site description
    remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
}

add_action('genesis_setup','dg_child_theme_setup', 15);

function dg_custom_logo_setup() {
    $defaults = array(
        'height'      => 36,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'dg_custom_logo_setup' );

function dg_styles(){
	$parent_style = 'parent-style';

	// Google Fonts ( Montserrat, Open Sans, Roboto Slab )
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:400,400i|Roboto+Slab' );

	// Slick
	wp_register_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/src/slick/slick.css' );

	wp_register_style( 'slick-style-theme', get_stylesheet_directory_uri() . '/assets/src/slick/slick-theme.css' );

	// Style.css
	wp_enqueue_style( 'core-style', get_stylesheet_directory_uri() . '/style.css' , array( $parent_style, 'google-fonts'), wp_get_theme()->get('Version') );

	// Main.css
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/assets/src/css/main.css' );
	
}

add_action('wp_enqueue_scripts','dg_styles');

function dg_scripts(){
	// Slick
	wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/src/slick/slick.js', array('jquery'), false, true );

	// Swiper 
	wp_register_script( 'swiper-d-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array('jquery'), false, true );

	// Scroll Magic
	wp_enqueue_script( 'scroll-magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array('jquery'), false, true );

	// Scroll Magic Debug
	wp_enqueue_script( 'scroll-magic-debug', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array('jquery'), false, true );
 
	// GSAP Ease
	//wpp_enqueue_script( 'gsap-ease', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/easing/EasePack.min.js', array('jquery'), false, true );

	// GSAP Timeline Max
	wp_enqueue_script( 'gsap-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js', array('jquery'), null, true );

	// Slide out js
	wp_enqueue_script( 'slide-out-js', 'https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js', array('jquery'), null, true );

	// DG Hero Banner
	wp_enqueue_script( 'hero-banner-js', get_stylesheet_directory_uri() . '/assets/src/js/dg-hero-banner.js', array('gsap-max'), null, true );



	// DG Core
	wp_enqueue_script( 'core-js', get_stylesheet_directory_uri() . '/assets/src/js/dg-init.js', array('jquery','swiper-d-js'), null, true );

	// DG Timeline JS
	wp_register_script( 'swiper-timeline', get_stylesheet_directory_uri() . '/assets/src/js/dg-timeline.js', array('jquery','swiper-d-js'), null, true );

	wp_register_script('google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyALVDWH0Y6hEuqurGEM_qcGzKtKJ1qeIrY', array(), null, true);

	wp_register_script('dg-google-map', get_stylesheet_directory_uri() . '/assets/src/js/google-map.js', array('jquery','google-map-api'), null, true);
}

add_action('wp_enqueue_scripts','dg_scripts');

function dg_two_columns_inline_style(){
	
	if( have_rows('dg_sections') ){
		$counter = 1;
		wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/src/css/custom.css', array(), null, false);

		while( have_rows('dg_sections') ){
			the_row();

			if( get_row_layout() == 'two_columns' ){

				$tcc_ID = get_sub_field('ID');
				$tcc_padding = get_sub_field('padding');
				$tcc_align_items = get_sub_field('align_items');
				$tcc_background = get_sub_field('background');

				$tcc_style = "
					#{$tcc_ID}{
						background-image:url({$tcc_background['image']['url']});
						background-color:{$tcc_background['color']};
						padding-top: {$tcc_padding['top']}px;
						padding-right: {$tcc_padding['right']}px;
						padding-bottom: {$tcc_padding['bottom']}px;
						padding-left: {$tcc_padding['left']}px;
					}
						
					.tc--{$counter}{
						background-image:url({$tcc_background['image']['url']});
						background-color:{$tcc_background['color']};
						padding-top: {$tcc_padding['top']}px;
						padding-right: {$tcc_padding['right']}px;
						padding-bottom: {$tcc_padding['bottom']}px;
						padding-left: {$tcc_padding['left']}px;
					}

					.tc--{$counter} .tc-row{
						align-items: ". $tcc_align_items .";
					}
				";

				wp_add_inline_style( 'custom-style', $tcc_style );
			} elseif ( get_row_layout() == 'services' ){

				$service_ID = get_sub_field('ID');
				$service_padding = get_sub_field('padding');
				$service_align_items = get_sub_field('align_items');
				$service_background = get_sub_field('background');

				$service_style = "
					#{$service_ID}{
						background-image:url({$service_background['image']['url']});
						background-color:{$service_background['color']};
						padding-top: {$service_padding['top']}px;
						padding-right: {$service_padding['right']}px;
						padding-bottom: {$service_padding['bottom']}px;
						padding-left: {$service_padding['left']}px;
					}

					.service-entries{
						background-image:url({$service_background['image']['url']});
						background-color:{$service_background['color']};
						padding-top: {$service_padding['top']}px;
						padding-right: {$service_padding['right']}px;
						padding-bottom: {$service_padding['bottom']}px;
						padding-left: {$service_padding['left']}px;
					}

					.service-entries .serv-row{
						align-items: ". $service_align_items .";
					}
				";

				wp_add_inline_style( 'custom-style', $service_style );

			} elseif( get_row_layout()=='module' ){
				/*$pcta_mod = get_sub*/
				$pcta_ID = get_sub_field('ID');
				$pcta_padding = get_sub_field('padding');
				$pcta_align_items = get_sub_field('align_items');
				$pcta_background = get_sub_field('background');

				/*foreach ($modules as $post) {
					setup_postdata( $post );
					$module_ID = $post->ID;
				}*/

				$pcta_style = "
					#{$pcta_ID}{
						background-image:url({$pcta_background['image']['url']});
						background-color:{$pcta_background['color']};
						padding-top: {$pcta_padding['top']}px;
						padding-right: {$pcta_padding['right']}px;
						padding-bottom: {$pcta_padding['bottom']}px;
						padding-left: {$pcta_padding['left']}px;
					}

					.pcta--{$pcta_ID}{
						background-image:url({$pcta_background['image']['url']});
						background-color:{$pcta_background['color']};
						padding-top: {$pcta_padding['top']}px;
						padding-right: {$pcta_padding['right']}px;
						padding-bottom: {$pcta_padding['bottom']}px;
						padding-left: {$pcta_padding['left']}px;
					}

					#{$pcta_ID} .pcta-row{
						align-items: ". $pcta_align_items .";
					}
				";

				wp_add_inline_style( 'custom-style', $pcta_style );
			}
			$counter++;
		}
	}
}

add_action('wp_enqueue_scripts','dg_two_columns_inline_style');