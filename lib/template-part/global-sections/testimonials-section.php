<section id="testimonial" class="testimonial-global" style="background-image: url(<?php the_field('testimonial_background_image', 'option'); ?>); ">
	<div class="container">
    <header class="pts-row">
      <div class="pts-col">
        <p><sub><?php the_field('testimonial_title', 'option'); ?></sub></p>
		<h2><?php the_field('testimonial_subtitle', 'option'); ?></h2>
		<?php the_field('testimonial_description', 'option'); ?>
      </div>
    </header>
    <div class="pts-row">
      <div class="testi-slider">
        <div class="testi-wrapper">
			
          <?php 
			$args = array(
				'post_type' => 'dg_testimonials',	
			);
			$query = get_posts( $args );
			foreach ($query as $post) { setup_postdata( $post ); ?>
            <?php //var_dump($post); ?>
            <div class="testi-slide">
              <blockquote class="ptc-quote">
                <img src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' )?>" alt="" class="pts-image">
                <?php echo wpautop( wp_trim_words( $post->post_content, 25, '...' ) ); ?>
                <cite class="ptc-cite"><?php echo $post->post_title; ?></cite>
              </blockquote>
            </div>
          <?php } wp_reset_postdata(); ?>
        </div>
        <div class="testi-pagination"></div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
<script>
var testimonials = new Swiper('.testi-slider', {
  	spaceBetween: 20,
  	autoplay: {
  		delay: 2500,
  		disableOnInteraction: false,
  	},
  	loop: true,
  	pagination: {
  	  	el: '.testi-pagination',
  	  	clickable: true,
  	  	bulletClass: 'testi-pagination-bullet',
  	  	bulletActiveClass: 'testi-pagination-bullet-active'
  	},
  	effect: 'fade',
  	containerModifierClass: 'testi-slider',
  	wrapperClass: 'testi-wrapper',
  	slidePrevClass: 'test-slide-prev',
  	slideNextClass: 'test-slide-next',
  	slideClass : 'testi-slide',
});
</script>