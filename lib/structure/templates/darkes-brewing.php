<?php function dg_do_darkes_brewing(){
	$dg_page = get_field('darkes_brewing_page'); ?>
	<main class="content">
	
		<div id="db-sec1" class="dg-section" style="background-image:url('<?php echo esc_url($dg_page['bg_image']['url']); ?>')">
			<div class="container">
				<div class="inner-cont">
					<div class="first-img">
						<?php if( $dg_page['product'] ): ?>
							<img src="<?php echo esc_url($dg_page['product']['url']); ?>" />
						<?php endif; ?>				
					</div>
					<div class="second-img">
						<?php if( $dg_page['logo'] ): ?>
							<img src="<?php echo esc_url($dg_page['logo']['url']); ?>" />
						<?php endif; ?>
					</div>
					<p><?php echo wpautop( $dg_page['caption'], true ); ?></p>
				</div>
			</div>
		</div>
			
		<div id="db-sec2" class="dg-section" style="background-image:url('<?php echo esc_url($dg_page['dc_background_image']['url']); ?>')">
			<img src="<?php echo esc_url($dg_page['dc_background_image_mobile']['url']); ?>" alt="" class="dgs-mob-img">
			<div class="container">
				
				<div class="inner-cont">
					<?php if( $dg_page['dc_subtitle'] ): ?>
						<p><sub><?php echo $dg_page['dc_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $dg_page['dc_title'] ): ?>
						<h2><?php echo $dg_page['dc_title']; ?></h2>
					<?php endif; ?>
					<?php if( $dg_page['dc_content'] ): ?>
						<?php echo $dg_page['dc_content']; ?>
					<?php endif; ?>			
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div id="db-sec3" class="dg-section" style="background-image:url('<?php echo esc_url($dg_page['lb_background_image']['url']); ?>')">
			<img src="<?php echo esc_url($dg_page['lb_background_image_mobile']['url']); ?>" alt="" class="dgs-mob-img">
			<div class="container">
				
				<div class="inner-cont">
					<?php if( $dg_page['lb_subtitle'] ): ?>
						<p><sub><?php echo $dg_page['lb_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $dg_page['lb_title'] ): ?>
						<h2><?php echo $dg_page['lb_title']; ?></h2>
					<?php endif; ?>
					<?php if( $dg_page['lb_content'] ): ?>
						<?php echo $dg_page['lb_content']; ?>
					<?php endif; ?>				
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<div id="db-sec2" class="dg-section" style="background-image:url('<?php echo esc_url($dg_page['av_background_image']['url']); ?>')">
			<img src="<?php echo esc_url($dg_page['av_background_image_mobile']['url']); ?>" alt="" class="dgs-mob-img">
			<div class="container">

				<div class="inner-cont">
					<?php if( $dg_page['av_subtitle'] ): ?>
						<p><sub><?php echo $dg_page['av_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $dg_page['av_title'] ): ?>
						<h2><?php echo $dg_page['av_title']; ?></h2>
					<?php endif; ?>
					<?php if( $dg_page['av_subtitle'] ): ?>
						<?php echo $dg_page['av_content']; ?>
					<?php endif; ?>			
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div id="db-sec3" class="dg-section" style="background-image:url('<?php echo esc_url($dg_page['hwm_background_image']['url']); ?>')">
			<img src="<?php echo esc_url($dg_page['hwm_background_image_mobile']['url']); ?>" alt="" class="dgs-mob-img">
			<div class="container">
				<div class="inner-cont">
					<?php if( $dg_page['hwm_subtitle'] ): ?>
						<p><sub><?php echo $dg_page['hwm_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $dg_page['hwm_title'] ): ?>
						<h2><?php echo $dg_page['hwm_title']; ?></h2>
					<?php endif; ?>
					<?php if( $dg_page['hwm_content'] ): ?>
						<?php echo $dg_page['hwm_content']; ?>
					<?php endif; ?>				
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<?php do_action('dg_darkes_brewing_after_content'); ?>

	</main>
<?php }

add_action('dg_darkes_brewing','dg_do_darkes_brewing');