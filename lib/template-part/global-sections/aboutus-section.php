<section id="introduction" class="module about-global" style="background-image: url(<?php the_field('about_background_image','option'); ?>);">
	<div class="container">
		<div class="tc-row">
			<div class="tc-col tc-col--1">
			  	<p><sub><?php the_field('about_title','option'); ?></sub></p>
				<h2><?php the_field('about_subtitle','option'); ?></h2>
				<p class="lead"><?php the_field('about_quote','option'); ?></p>
				<p><?php the_field('about_description','option'); ?></p>
				<?php if(get_field('about_button_area', 'option')): ?>
					<?php $btn=0;?>
					<?php while(has_sub_field('about_button_area', 'option')): ?>
						<?php $btn++; ?>
						<?php if($btn==1) { ?>
							<a class="btn btn-primary" href="<?php the_sub_field('about_button_link', 'option'); ?>"><?php the_sub_field('about_button_label', 'option'); ?></a>
						<?php } else { ?>
							<a class="btn btn-primary-inverted" href="<?php the_sub_field('about_button_link', 'option'); ?>"><?php the_sub_field('about_button_label', 'option'); ?></a>
						<?php } ?>
					<?php endwhile; ?>
					
				<?php endif; ?>
				
				
			</div>
			<div class="tc-col tc-col--2">
			 <img src="<?php the_field('about_featured_image', 'option'); ?>">
			</div>
		</div>
	</div>
</section>