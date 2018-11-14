<?php

function dg_do_modules(){
	if( get_field('dg_sections') ):
		
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
					}
				}

				wp_reset_postdata();
			endif;

			$counter++;
		endwhile;
	endif;
}

add_action('dg_darkes_brewing_after_content','dg_do_modules', 5);

?>