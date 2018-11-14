<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding">
	<?php if( $header_logo ): ?>
		<img src="<?php echo esc_url($header_logo['url']); ?>">
	<?php else: ?>
		<img src="<?php get_stylesheet_directory_uri() . '/assets/images/darkes-group-logo.svg' ?>">
	<?php endif; ?>
</a>