<?php

function dg_do_contact_before_content_wrap(){
	echo '<main class="content">';
}

add_action('dg_contact_before_content_wrap','dg_do_contact_before_content_wrap',5);

function dg_do_contact_after_content_wrap(){
	echo '</main><!-- .content -->';
}

add_action('dg_contact_after_content_wrap','dg_do_contact_after_content_wrap',5);

function dg_do_contact_map(){
	$contact = get_field('contact');

	if( !$contact ){
		return false;
	}

	if( !$contact['map'] ){
		return false;
	}

	if( !wp_script_is( 'google-map-api', 'enqueued' ) ){
		wp_enqueue_script('google-map-api');
	}

	if( !wp_script_is( 'dg-google-map', 'enqueued' ) ){
		wp_enqueue_script('dg-google-map');
	}

	echo '<section id="contact-map">';
		echo '<div class="acf-map">';
			echo '<div class="marker" data-lat="'.$contact['map']['lat'].'" data-lng="'.$contact['map']['lng'].'"></div>';
		echo '</div>';
	echo '</section><!-- #contact-map -->';
}

add_action('dg_contact_before_content','dg_do_contact_map',5);

function dg_do_contact_content(){
	$contact = get_field('contact');

	if( !$contact ){
		return false;
	}

	echo '<section id="contact-content" class="module">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col col--content">';
					//var_dump($contact);
					echo wpautop( $contact['content'], true );
				echo '</div><!-- .col col--content -->';
				echo '<div class="col col--form">';
					echo $contact['form'];
				echo '</div><!-- .col col--form -->';
			echo '</div><!-- .row -->';
		echo '</div><!-- .container -->';
	echo '</section><!-- #about-timeline -->';
}

add_action('dg_contact_before_content','dg_do_contact_content',5);
