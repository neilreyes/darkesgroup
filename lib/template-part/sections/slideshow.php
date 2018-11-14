<?php if(get_field('slider_banner')): ?>
  <?php $z=0; ?>
	<div id="slider-banner">
    <?php while(has_sub_field('slider_banner')): ?>
    <?php $z++; ?>
      <div id="hp-banner<?php echo $z; ?>" class="hp-banner" style="background-image:url('<?php the_sub_field('banner_background_image'); ?>');">
        <div class="my-container">

          <?php if( get_sub_field('banner_logo') || get_sub_field('banner_text') || get_sub_field('banner_button_label') ): ?>
          <div class="left">
            <?php if( get_sub_field('banner_logo') ): ?>
              <div class="top">
                <img src="<?php the_sub_field('banner_logo'); ?>" />
              </div>
            <?php endif; ?>

            <?php if( get_sub_field('banner_text') || get_sub_field('banner_button_label') ): ?>
              <div class="bottom">

                <?php the_sub_field('banner_text'); ?>
                <div class="btn-area">
                  <a href="<?php the_sub_field('banner_button_link'); ?>">
                    <?php the_sub_field('banner_button_label'); ?>
                  </a>
                </div>
            <?php endif; ?>
              </div>
          </div>
          <?php endif; ?>

          <div class="clear"></div>
        </div><!-- .my-container -->
      </div><!-- #hp-banner -->
    <?php endwhile; ?>
    <div class="clear"></div>
  </div><!-- #slider-banner -->
<?php endif; ?>