<?php if( have_rows('social_media_channels','options') ): ?>
	<ul class="social-media-channels">
		<?php while ( have_rows('social_media_channels','options') ) { the_row(); ?>
			<li class="sc-entry sc--<?php echo strtolower(get_sub_field('social_media_name','options')); ?>"><a href="<?php echo esc_url( get_sub_field('link','options') ); ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-<?php echo strtolower(get_sub_field('social_media_name','options')); ?> fa-stack-1x fa-inverse"></i>
				</span>
			</a></li>
		<?php } ?>
	</ul>
<?php endif;