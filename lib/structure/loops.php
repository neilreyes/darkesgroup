<?php
	function dg_remove_parent_loop(){
		remove_action('genesis_loop','genesis_do_loop');
	}

	add_action('init','dg_remove_parent_loop');

	function dg_do_loop(){
		if ( is_page_template( 'page_blog.php' ) ) {

			$include = genesis_get_option( 'blog_cat' );
			$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
			$paged   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

			// Easter Egg.
			$query_args = wp_parse_args(
				genesis_get_custom_field( 'query_args' ),
				array(
					'cat'              => $include,
					'category__not_in' => $exclude,
					'showposts'        => genesis_get_option( 'blog_cat_num' ),
					'paged'            => $paged,
				)
			);

			genesis_custom_loop( $query_args );
		} elseif( is_front_page() ) {

			if( have_rows('dg_sections') ):
				$counter = 1;
				while( have_rows('dg_sections') ): the_row();
					if(get_row_layout()=='two_columns'):

						$ID = get_sub_field('ID');
						//echo "tc--" . $counter;
						echo '<section class="tc--'.$counter.' module"';
						if( $ID ): echo ' id="'.$ID.'"';endif;
						echo '>';
						get_template_part('/lib/template-part/sections/two','columns' );
						echo '</section>';
						
					elseif(get_row_layout()=='services'):

						if( !wp_script_is( 'swiper-d-js', 'enqueued' ) ){
							wp_enqueue_script('swiper-d-js');
						}

						if( !wp_script_is( 'core-js', 'enqueued' ) ){
							wp_enqueue_script('core-js');
						}

						echo '<section class="service-entries module">';
						get_template_part('/lib/template-part/sections/services' );
						echo '</section>';
					
					elseif(get_row_layout()=='module'):

						$modul_h_ID = get_sub_field('ID');

						$modules = get_sub_field('module_entry');

						foreach ($modules as $post) {
							setup_postdata( $post );
							$module_ID = $post->ID;

							if( $module_ID == 286 ){
								echo "<section";
								if( $modul_h_ID ):
									echo " id=\"{$modul_h_ID}\"";
								endif;
								echo " class=\"pcta--{$module_ID} cta module \">";

								include(locate_template('/lib/template-part/sections/primary-cta.php'));

								echo "</section>";
							} elseif ( $module_ID == 344 ){

								if( !wp_script_is( 'swiper-d-js', 'enqueued' ) ){
									wp_enqueue_script('swiper-d-js');
								}

								if( !wp_script_is( 'core-js', 'enqueued' ) ){
									wp_enqueue_script('core-js');
								}
								
								echo "<section";
								if( $modul_h_ID ):
									echo " id=\"{$modul_h_ID}\"";
								endif;
								echo " class=\"pts--{$module_ID} testimonial module \">";

								include(locate_template('/lib/template-part/sections/testimonials.php'));

								echo "</section>";
							} elseif ( $module_ID == 357 ){

								if(have_rows('facts',$module_ID)):

									echo "<section";
									if( $modul_h_ID ):
										echo " id=\"{$modul_h_ID}\"";
									endif;
									echo " class=\"facts-{$module_ID} facts module \">";
									include( locate_template('/lib/template-part/sections/facts.php') );

									echo "</section>";

								endif;

							} elseif( $module_ID == 377 ) {
								include( locate_template('/lib/template-part/sections/hero-banner.php') );
							} elseif( $module_ID == 730 ) {
									include( locate_template('/lib/template-part/sections/awards.php') );
							}


						}

						wp_reset_postdata();
					endif;

					$counter++;
				endwhile;
			endif;
		} else {
			genesis_standard_loop();
		}
	}

	add_action( 'genesis_loop', 'dg_do_loop' );
?>