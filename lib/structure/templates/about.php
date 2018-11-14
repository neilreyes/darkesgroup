<?php

function dg_do_about_before_content_wrap(){
	echo '<main class="content">';
}

add_action('dg_about_before_content_wrap','dg_do_about_before_content_wrap',5);

function dg_do_about_after_content_wrap(){
	echo '</main><!-- .content -->';
}

add_action('dg_about_after_content_wrap','dg_do_about_after_content_wrap',5);

function dg_do_about_hero_banner(){
	$abt = get_field('about_template');

	if( $abt ):
		
		echo '<section id="about-hero-banner" class="hb"';
			if( $abt['hero_image'] ){
				echo 'style="background-image:url('.esc_url($abt['hero_image']['url']).')"';
			}
		echo '>';
			echo '<div class="container">';
				echo '<div class="row">';

					echo '<div class="col hb-col--badge">';
						echo '<img src="'.esc_url($abt['hero_badge']['url']).'">';
					echo '</div><!-- .hb-col--badge -->';
					
					echo '<div class="col hb-col--caption">';
						echo '<p><sub>'.$abt['sub_healine'].'</sub></p>';
						echo '<h1>'.$abt['headline'].'</h1>';
						echo '<p>'.$abt['caption'].'</p>';
					echo '</div><!-- .hb-col--caption -->';

				echo '</div><!-- .hb-row -->';
			echo '</div><!-- .hb-container -->';
		echo '</section><!-- #about-hero-banner -->';
	endif;
}

add_action('dg_about_before_content','dg_do_about_hero_banner',5);

function dg_do_about_timeline(){
	$abt = get_field('about_template');

	if( $abt && $abt['dr_timeline'] ):

		if( !wp_script_is( 'swiper-d-js', 'enqueued' ) ){
			wp_enqueue_script('swiper-d-js');
		}

		if( !wp_script_is( 'swiper-timeline', 'enqueued' ) ){
			wp_enqueue_script( 'swiper-timeline' );
		}

		echo '<section id="about-timeline" class="module" style="background-image:url('.esc_url($abt['timeline_bg_image']['url']).');">';
			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col col--timeline">';
						echo '<div class="swiper-container">';
							echo '<div class="swiper-wrapper">';
								foreach ( $abt['dr_timeline'] as $t_entry ) :
									
									echo '<div class="swiper-slide t-entry" data-year="'.$t_entry['year'].'">';
										echo '<div class="wrapper">';
											// var_dump($t_entry);
											echo '<div class="wrapper-row">';
												echo '<div class="col--content col-12 col-lg-7">';
													echo '<p><sub>'.$t_entry['year'].'</sub></p>';
													echo '<h2>'.$t_entry['title'].'</h2>';
													echo $t_entry['content'];
												echo '</div><!-- .col -->';
												echo '<div class="col--image col-12 col-lg-5" style="background-image:url('.esc_url($t_entry['image']['url']).');">';
													//echo '<img src="'.esc_url($t_entry['image']['url']).'">';
												echo '</div><!-- .col -->';
											echo '</div><!-- .wrapper-row -->';
										echo '</div><!-- .wrapper -->';
									echo '</div><!-- .swiper-slide -->';
								endforeach;
							echo '</div><!-- .swiper-wrapper -->';

							echo '<div class="swiper-pagination"></div><!-- Add Arrows -->
								<div class="swiper-button-next swiper-buttons"></div>
								<div class="swiper-button-prev swiper-buttons"></div>';

						echo '</div><!-- .swiper-container -->';
					echo '</div><!-- .col col--timeline -->';
				echo '</div><!-- .row -->';
			echo '</div><!-- .container -->';
		echo '</section><!-- #about-timeline -->';
	endif;
}

add_action('dg_about_before_content','dg_do_about_timeline',5);

function dg_do_after_content(){

	if( have_rows('about_sections') ):
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

add_action('dg_about_after_content','dg_do_after_content');
