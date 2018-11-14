<?php
  $entries = get_field('pts_testimonials',$module_ID);
  $content = get_field('pts_content',$module_ID);
?>

<?php if( $entries ): ?>
  <div class="pts-container">
    <header class="pts-row">
      <div class="pts-col">
        <?php echo $content; ?>
      </div>
    </header>
    <div class="pts-row">
      <div class="testi-slider">
        <div class="testi-wrapper">
          <?php foreach ($entries as $post) { setup_postdata( $post ); ?>
            <?php //var_dump($post); ?>
            <div class="testi-slide">
              <blockquote class="ptc-quote">
                <img src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' )?>" alt="" class="pts-image">
                <?php echo wpautop( wp_trim_words( $post->post_content, 75, '...' ) ); ?>
                <cite class="ptc-cite"><?php echo $post->post_title; ?></cite>
              </blockquote>
            </div>
          <?php } wp_reset_postdata(); ?>
        </div>
        <div class="testi-pagination"></div>
      </div>
    </div>
  </div>
<?php endif; ?>