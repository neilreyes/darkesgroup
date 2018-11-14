<section id="hero-banner" class="hb--custom">
	<div class="hb-container hb-container--d">
		<div class="hb-row">
			<?php
				$i = 1;
				while( have_rows('hero_banner',$module_ID) ): the_row();
			?>

				<?php
					$thumbnail = get_sub_field('thumbnail',$module_ID);
					$desktop = get_sub_field('desktop', $module_ID);
					$content = get_sub_field('content',$module_ID);
				?>
				<div class="hb-col" data-img-sm="<?php echo $i; ?>" style="background-image:url(<?php echo $thumbnail['url'];?>)">
					<img src="<?php echo $thumbnail['url'];?>" class="hb-image" style="display: none;">
				</div>
			
				<div class="hb-large" data-img-lg="<?php echo $i; ?>" style="background-image:url(<?php echo $desktop['url'];?>);">
					<caption class="hb-large-container">
						<div class="hb-content">
							<div class="hb-row-content">
								<div class="hb-col-content">
									<?php echo $content; ?>
								</div>
							</div>
						</div>
					</caption>
					<img class="dg-hb-img-large" src="<?php echo $desktop['url'];?>" style="display: none;">
				</div>
			<?php $i++; endwhile; ?>
		</div>
	</div>
	<div class="hb-container hb-container--m">
		<div class="hbs-slider-container">
			<div class="hbs-wrapper">
				<?php
					while( have_rows('hero_banner',$module_ID) ): the_row();

						$mob_image = get_sub_field('mobile',$module_ID);
						$mob_content = get_sub_field('content',$module_ID);
				?>
					<div class="hbs-slide" style="background-image:url(<?php echo $mob_image['url']; ?>);">
						<div class="hb-slide-container">
							<?php echo $mob_content; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="hbs-pagination">

		</div>
	</div>
</section>