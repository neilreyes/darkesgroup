<?php
function dg_register_my_cpts() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = array(
		"name" => __( "Testimonials", "darkesgroup" ),
		"singular_name" => __( "Testimonial", "darkesgroup" ),
	);

	$args = array(
		"label" => __( "Testimonials", "darkesgroup" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "dg-testimonials",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonials", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-format-quote",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "dg_testimonials", $args );

	/**
	 * Post Type: Services.
	 */

	$labels = array(
		"name" => __( "Services", "darkesgroup" ),
		"singular_name" => __( "Service", "darkesgroup" ),
	);

	$args = array(
		"label" => __( "Services", "darkesgroup" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "dg-services",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "services", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-carrot",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "dg_services", $args );

	/**
	 * Post Type: Modules.
	 */

	$labels = array(
		"name" => __( "Modules", "darkesgroup" ),
		"singular_name" => __( "Module", "darkesgroup" ),
	);

	$args = array(
		"label" => __( "Modules", "darkesgroup" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "dg-modules",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "modules", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-image-filter",
		"supports" => array( "title" ),
	);

	register_post_type( "dg_modules", $args );
}

add_action( 'init', 'dg_register_my_cpts' );

?>