<?php function dg_do_glenbenie_orchard(){
	$gop = get_field('glenbenie_orchard'); ?>

	<div id="db-sec1" class="orchard-banner" style="background-image:url('<?php echo esc_url($gop['background_image']['url']); ?>')">
		<div class="container">
			<div class="inner-cont">
				<div class="first-img">
					<?php if( $gop['featured_image'] ): ?>
						<img src="<?php echo esc_url($gop['featured_image']['url']); ?>" />
					<?php endif; ?>				
				</div>
				<div class="second-img">
					<?php if( $gop['logo'] ): ?>
						<img src="<?php echo esc_url($gop['logo']['url']); ?>" />
					<?php endif; ?>
				</div>
				<?php if( $gop['caption'] ): ?>
					<p><?php echo $gop['caption']; ?></p>
				<?php endif; ?>
				<?php if( $gop['links'] ): ?>
					<ul class="orchard-menu-banner">
					<?php foreach($gop['links'] as $link): ?>
						<li>
							<a href="#<?php echo $link['link']; ?>">
								<?php echo $link['title']; ?>
							</a>
						</li>
					<?php endforeach; ?>
						<div class="clear"></div>
					</ul>
				<?php endif; ?>
				
				</div>
			</div>
	</div>

	<div id="orchard-picking" class="dg-section" style="background-image:url('<?php echo esc_url($gop['go_fp_background_image']['url']); ?>')">
		<img src="<?php echo esc_url($gop['go_fp_background_image_mob']['url']); ?>" alt="" class="dgs-mob-img">
		<div class="container">
			<div class="tc-row">
				<div class="tc-col">
					<?php if( $gop['go_fp_subtitle'] ): ?>
						<p><sub><?php echo $gop['go_fp_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $gop['go_fp_title'] ): ?>
						<h2><?php echo $gop['go_fp_title']; ?></h2>
					<?php endif; ?>
					<?php if( $gop['go_fp_content'] ): ?>
						<p><?php echo $gop['go_fp_content']; ?></p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>

	<div id="orchard-tour" class="dg-section" style="background-image:url('<?php echo esc_url($gop['go_totf_background_image']['url']); ?>')">
		<img src="<?php echo esc_url($gop['go_totf_background_image_mob']['url']); ?>" alt="" class="dgs-mob-img">
		<div class="container">
			<div class="orchard-row3">
				<div class="inner-col">
					<?php if( $gop['go_totf_subtitle'] ): ?>
						<p><sub><?php echo $gop['go_totf_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $gop['go_totf_title'] ): ?>
						<h2><?php echo $gop['go_totf_title']; ?></h2>
					<?php endif; ?>
					<?php if( $gop['go_totf_content'] ): ?>
						<?php echo $gop['go_totf_content']; ?>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<div id="orchard-weddings" class="dg-section" style="background-image:url('<?php echo esc_url($gop['go_wedding_background_image']['url']); ?>')">
		<img src="<?php echo esc_url($gop['go_wedding_background_image_mob']['url']); ?>" alt="" class="dgs-mob-img">
		<div class="container">
			<div class="tc-row" style=""> <!-- padding: 80px 0 130px 0; -->
				<div class="tc-col">
					<?php if( $gop['go_wedding_subtitle'] ): ?>
						<p><sub><?php echo $gop['go_wedding_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $gop['go_wedding_title'] ): ?>
						<h2><?php echo $gop['go_wedding_title']; ?></h2>
					<?php endif; ?>
					<?php if( $gop['go_wedding_content'] ): ?>
						<p><?php echo $gop['go_wedding_content']; ?></p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>

	<div id="orchard-photography" class="dg-section" style="background-image:url('<?php echo esc_url($gop['go_photog_background_image']['url']); ?>')">
		<img src="<?php echo esc_url($gop['go_photog_background_image_mob']['url']); ?>" alt="" class="dgs-mob-img">
		<div class="container">
			<div class="orchard-row3">
				<div class="inner-col">
					<?php if( $gop['go_photog_subtitle'] ): ?>
						<p><sub><?php echo $gop['go_photog_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $gop['go_photog_title'] ): ?>
						<h2><?php echo $gop['go_photog_title']; ?></h2>
					<?php endif; ?>
					<?php if( $gop['go_photog_content'] ): ?>
						<?php echo $gop['go_photog_content']; ?>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<div id="orchard-events" class="dg-section" style="background-image:url('<?php echo esc_url($gop['go_event_background_image']['url']); ?>')">
		<div class="container">
			<div class="tc-row">
				<div class="tc-col orchard-img">
					<?php if( $gop['go_event_featured_image'] ): ?>
						<img src="<?php echo esc_url($gop['go_event_featured_image']['url']); ?>">
					<?php endif; ?>
				</div>
				<div class="tc-col orchard-content">
					<?php if( $gop['go_event_subtitle'] ): ?>
						<p><sub><?php echo $gop['go_event_subtitle']; ?></sub></p>
					<?php endif; ?>
					<?php if( $gop['go_event_title'] ): ?>
						<h2><?php echo $gop['go_event_title']; ?></h2>
					<?php endif; ?>
					<?php if( $gop['go_event_content'] ): ?>
						<?php echo $gop['go_event_content']; ?>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<?php do_action('dg_darkes_brewing_after_content'); ?>

<?php }

add_action('dg_glenbenie_orchard','dg_do_glenbenie_orchard');