<?php
	function dg_remove_parent_header_function(){
		remove_action('genesis_header','genesis_do_header', 10);
		remove_action('genesis_header','genesis_header_markup_open',10);
	}

	add_action('init','dg_remove_parent_header_function');

	
	function dg_header_markup_open() {

		genesis_markup( array(
			'open'    => '<header %s>',
			'context' => 'site-header',
		) );

		genesis_structural_wrap( 'header' );

	}

	add_action( 'genesis_before', 'dg_header_markup_open', 5 );

	function dg_do_header(){ ?>

		<?php $header_logo = get_field('header_logo','options'); ?>
	
		<div class="sh-top">
			<div class="sh-container">
				
				<div class="sh-row">
					<button class="m-toggle">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="26" height="26" viewBox="0 0 26 26">
						  <defs>
						    <style>
						      .cls-1 {
						        fill: #ffffff;
						        fill-rule: evenodd;
						      }
						    </style>
						  </defs>
						  <path d="M7.095,23.000 L7.095,20.500 L26.000,20.500 L26.000,23.000 L7.095,23.000 ZM3.429,11.750 L26.000,11.750 L26.000,14.250 L3.429,14.250 L3.429,11.750 ZM0.000,3.000 L26.000,3.000 L26.000,5.500 L0.000,5.500 L0.000,3.000 Z" class="cls-1"/>
						</svg>
					</button>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding">
						<?php if( $header_logo ): ?>
							<img src="<?php echo esc_url($header_logo['url']); ?>">
						<?php else: ?>
							<img src="<?php get_stylesheet_directory_uri() . '/assets/images/darkes-group-logo.svg' ?>">
						<?php endif; ?>
					</a>

					<?php
						// Do nothing if menu not supported.
						if ( ! genesis_nav_menu_supported( 'primary' ) || ! has_nav_menu( 'primary' ) )
							return;

						$class = 'menu genesis-nav-menu menu-primary';
						if ( genesis_superfish_enabled() ) {
							$class .= ' js-superfish';
						}

						if ( genesis_a11y( 'headings' ) ) {
							printf( '<h2 class="screen-reader-text">%s</h2>', __( 'Main navigation', 'genesis' ) );
						}

						genesis_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => $class,
						) );
					?>

					<div class="site-contact">
						<?php get_template_part('lib/template-part/components/contact','details'); ?>
					</div>

				</div>

			</div>
		</div>

		<div class="sh-bottom">
			<div class="sh-container">
				<div class="sh-row">
					<div class="sh-social-channels">
						<?php echo get_template_part('lib/template-part/components/social','channels'); ?>
					</div>
				</div>
			</div>
		</div>

	<?php }

	add_action('genesis_before','dg_do_header',10);

	
	function dg_header_markup_close() {

		genesis_structural_wrap( 'header', 'close' );
		genesis_markup( array(
			'close'   => '</header>',
			'context' => 'site-header',
		) );

	}

	add_action( 'genesis_before', 'dg_header_markup_close' );
?>