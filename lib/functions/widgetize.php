<?php
	function dg_register_widgets(){

		unregister_sidebar( 'footer-1' );
		unregister_sidebar( 'footer-2' );
		unregister_sidebar( 'footer-3' );

		genesis_register_widget_area(
		    array(
		        'id'          => 'dg-footer-wide-sidebar',
		        'name'        => __( 'Footer Wide', 'darkes-group' ),
		        'description' => __( 'Footer Wide', 'darkes-group' ),
		    )
		);

		genesis_register_widget_area(
		    array(
		        'id'          => 'dg-footer-column-1',
		        'name'        => __( 'Footer Column 1', 'darkes-group' ),
		        'description' => __( 'Footer Column 1', 'darkes-group' ),
		    )
		);

		genesis_register_widget_area(
		    array(
		        'id'          => 'dg-footer-column-2',
		        'name'        => __( 'Footer Column 2', 'darkes-group' ),
		        'description' => __( 'Footer Column 2', 'darkes-group' ),
		    )
		);

		genesis_register_widget_area(
		    array(
		        'id'          => 'dg-footer-column-3',
		        'name'        => __( 'Footer Column 3', 'darkes-group' ),
		        'description' => __( 'Footer Branding and Copyright', 'darkes-group' ),
		    )
		);
	}

	add_action( 'widgets_init', 'dg_register_widgets' );
	
?>