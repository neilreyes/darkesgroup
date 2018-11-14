<div class="fc-container">
  <div class="fc-row">
    <ul class="fc-entries">
      <?php while( have_rows('facts',$module_ID) ): the_row();?>
        <?php
          $image = get_sub_field('image',$module_ID);
        ?>
        <li class="fc-entry">
          <img src="<?php echo $image['url'] ;?>" class="fc-image">
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</div>