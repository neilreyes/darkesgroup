<?php add_action('init','dg_remove_parent_footer_function');

function dg_remove_parent_footer_function(){
	remove_action('genesis_footer','genesis_do_footer');
}


add_action('genesis_footer', 'dg_do_footer', 10);

function dg_do_footer() { 
	$footer_logo = get_field('footer_logo','options');

	echo '<div class="sf-upper">';
		echo '<div class="sf-container">';
			echo '<div class="sf-row">';
				echo '<aside class="footer-sidebar-wide">';
					if( is_active_sidebar( 'dg-footer-wide-sidebar' ) ):
						dynamic_sidebar( 'dg-footer-wide-sidebar' );
					endif;
				echo '</aside>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	echo '<div class="sf-lower">';
		echo '<div class="sf-container">';
			echo '<div class="sf-row">';
				echo '<aside class="footer-sidebar-1">';
					if( is_active_sidebar( 'dg-footer-column-1' ) ):
						dynamic_sidebar( 'dg-footer-column-1' );
					endif;
				echo '</aside>';
				echo '<aside class="footer-sidebar-2">';
					if( is_active_sidebar( 'dg-footer-column-2' ) ):
						dynamic_sidebar( 'dg-footer-column-2' );
					endif;
				echo '</aside>';
				echo '<div class="footer-copyright-wrapper">';
					if( is_active_sidebar( 'dg-footer-column-3' ) ):
						dynamic_sidebar( 'dg-footer-column-3' );
					endif;
					//get_template_part('/lib/template-part/components/social','channels');
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

add_action('genesis_after','dg_do_after_footer', 10);

function dg_do_after_footer(){
	echo '<nav id="menu-mobile">';
		genesis_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => '',
		) );
	echo '</nav>';
};
