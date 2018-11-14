<div id="hp-sec1" style="background-image:url('<?php the_field('sec1_background_image'); ?>');">
  <div class="my-container">
    
    <div class="left">
      <?php if( get_field('sec1_title')): ?>
      	<h4 class="title">
      		<?php the_field('sec1_title'); ?>
      	</h4>
      <?php endif; ?>
      
      <?php if( get_field('sec1_subtitle')): ?>
      	<h2 class="subtitle-black">
      		<?php the_field('sec1_subtitle'); ?>
      	</h2>
      <?php endif; ?>
      
      <?php if( get_field('sec1_qoute')): ?>
      	<div class="qoute">
      		<?php the_field('sec1_qoute'); ?>
      	</div>
      <?php endif; ?>
      
      <?php if( get_field('sec1_details')): ?>
      	<div class="details">
      		<?php the_field('sec1_details'); ?>
      	</div>
			<?php endif; ?>
      
      <?php if(get_field('sec1_button_area')): ?>
        <div class="button-area">
        <?php $a=0; ?>
        <?php while(has_sub_field('sec1_button_area')): ?>
        <?php $a++; ?>
          <a class="btn-<?php echo $a; ?>" href="<?php the_sub_field('sec1_button_link'); ?>">
            <?php the_sub_field('sec1_button_label'); ?>
          </a>
        <?php endwhile; ?>
        </div>
      <?php endif; ?>
      
    </div>
    
    <div class="right">
      	<?php if(get_field('sec1_feature_image')):?>
      			<div class="feature-img-cont">
              <img src="<?php the_field('sec1_feature_image'); ?>"/>
            </div>
      	<?php endif; ?>
    </div>
    
    <div class="clear"></div>
    
  </div><!-- .my-container -->
</div><!-- #hp-sec1 -->