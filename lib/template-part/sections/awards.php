<?php

$fields = get_field('wcaf', 730);

if( $fields ):
	echo '<section id="world-cider-awards" style="background-color: #21262c; background-image:url('.esc_url($fields['background']['url']).')">';
		echo '<div class="container"><div class="row">';
			echo '<img src="'.esc_url($fields['badge']['url']).'">';
			echo '<h2>'.$fields['content'].'</h2>';
		echo '</div></div>';
	echo '</section>';
endif;