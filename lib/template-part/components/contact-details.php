<?php if( have_rows('contact_details','options') ): ?>
	<ul class="contact-details">
		<?php while ( have_rows('contact_details','options') ) { the_row(); ?>
			<?php //if(get_row_layout() == 'address'): ?>
				<!-- <li class="cd-entry--address">
					<span class="cd-icon"><i class="fa fa-address"></i></span>
					<span class="cd-value"><?php //the_sub_field('value','options'); ?></span>
				</li>-->
			<?php if (get_row_layout() == 'phone_number'): ?>
				<li class="cd-entry--phone">
					<a href="tel:<?php the_sub_field('value','options'); ?>">
					<span class="cd-icon"><i class="cd-phone"></i></span>
					<span class="cd-value"><?php the_sub_field('value','options'); ?></span>
					</a>
				</li>
			<?php //elseif (get_row_layout() == 'fax_number'): ?>
				<!-- <li class="cd-entry--fax">
					<span class="cd-icon"><i class="fa fa-fax"></i></span>
					<span class="cd-value"><?php //the_sub_field('value','options'); ?></span>
				</li>-->
			<?php elseif (get_row_layout() == 'email_address'): ?>
				<li class="cd-entry--email">
					<a href="mailto:<?php the_sub_field('value','options'); ?>">
					<span class="cd-icon"><i class="cd-envelope"></i></span>
					<span class="cd-value"><?php the_sub_field('value','options'); ?></span>
					</a>
				</li>
			<?php //elseif (get_row_layout() == 'custom_field'): ?>
				<!-- <li class="cd-entry--custom">
					<span class="cd-label"><?php //the_sub_field('label','options'); ?></span>
					<span class="cd-value"><?php //the_sub_field('value','options'); ?></span>
				</li>-->
			<?php endif; ?>
		<?php } ?>
	</ul>
<?php endif;