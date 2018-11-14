<?php

function dg_do_appleshack(){
	$appleshack = get_field('appleshack_fields'); ?>

		<div id="db-sec1" class="appleshack-banner" style="background-image:url('<?php echo esc_url($appleshack['background_image']['url']); ?>')">
			<div class="container">
				<div class="inner-cont">
					<div class="first-img">
						<?php if( $appleshack['featured_image'] ): ?>
							<img src="<?php echo esc_url($appleshack['featured_image']['url']); ?>" />
						<?php endif; ?>				
					</div>
					<div class="second-img">
						<?php if( $appleshack['logo'] ): ?>
							<img src="<?php echo esc_url($appleshack['logo']['url']); ?>" />
						<?php endif; ?>
					</div>
					<?php if( $appleshack['caption'] ): ?>
						<p><?php echo $appleshack['caption']; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div id="orchard-picking" class="appleshack-section1" style="background-image:url('<?php echo esc_url($appleshack['ap_background_image']['url']); ?>')">
			<div class="container">
				<div class="tc-row">
					<div class="tc-col">
						<?php if( $appleshack['ap_subtitle'] ): ?>
							<p><sub><?php echo $appleshack['ap_subtitle']; ?></sub></p>
						<?php endif; ?>
						<?php if( $appleshack['ap_title'] ): ?>
							<h2><?php echo $appleshack['ap_title']; ?></h2>
						<?php endif; ?>
						<?php if( $appleshack['ap_content'] ): ?>
							<?php echo $appleshack['ap_content']; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>

		<div id="orchard-events" class="appleshack-section2" style="background-image:url('<?php echo esc_url($appleshack['ap_prod_background_image']['url']); ?>')">
			<div class="container">
				<div class="tc-row">
					<div class="tc-col appleshack-left">
						<?php if( $appleshack['ap_prod_subtitle'] ): ?>
							<p><sub><?php echo $appleshack['ap_prod_subtitle']; ?></sub></p>
						<?php endif; ?>
						<?php if( $appleshack['ap_prod_title'] ): ?>
							<h2><?php echo $appleshack['ap_prod_title']; ?></h2>
						<?php endif; ?>
					</div>
					<div class="tc-col appleshack-right">
						<?php if( $appleshack['ap_prod_content'] ): ?>
							<?php echo $appleshack['ap_prod_content']; ?>
						<?php endif; ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php if($appleshack['ap_products']): ?>

				<?php if( !wp_style_is( 'slick-style', 'enqueued' ) ){
					wp_enqueue_style('slick-style');
				}

				if( !wp_style_is( 'slick-style-theme', 'enqueued' ) ){
					wp_enqueue_style('slick-style-theme');
				} 

				if( !wp_script_is( 'slick-js', 'enqueued' ) ){
					wp_enqueue_script('slick-js');
				} ?>

				<div class="appleshack-products">
					<div class="container">
						<div class="appleshack-slider">
							
							<?php foreach( $appleshack['ap_products'] as $product ): ?>
								<div class="appleshack-slide">
									<img src="<?php echo esc_url($product['image']['url']); ?>">
									<div class="product-content">
										<h6><?php echo $product['title']; ?></h6>
										<?php echo $product['caption']; ?>
									</div>
								</div>
							<?php endforeach; ?>
							
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>

	<?php do_action('dg_darkes_brewing_after_content');
}

add_action('dg_appleshack','dg_do_appleshack');