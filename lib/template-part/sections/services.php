<?php
	if( have_rows('services_entries_repeater') ):
	$i = 1;
?>

	<div class="serv-container">
		<div class="serv-row">
			<div class="serv-slider">
				<div class="serv-wrapper">
					<?php while( have_rows('services_entries_repeater') ): the_row(); ?>
						<?php
							$title = get_sub_field('title');
							$content = get_sub_field('content');
							$link = get_sub_field('link');
							$image = get_sub_field('image');
						?>
						<div
							class="serv-slide"
							data-count="<?php echo $i;?>"
							>
							<img src="<?php echo $image['url']; ?>" alt="" class="serv-image">
							<div class="se-content-box">
								<h3 class="se-title"><?php echo $title; ?></h3>
								<p class="se-description"><?php echo $content; ?></p>
							</div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
				<div class="serv-button-prev"></div>
				<div class="serv-button-next"></div>
				<div class="serv-pagination"></div>
			</div>
		</div>
	</div>
	

<?php endif;
?>