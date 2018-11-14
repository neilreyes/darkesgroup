<div class="pcta-container">
  <div class="pcta-row">
    <?php
    if( have_rows('pcta_cols',$module_ID) ):
      while( have_rows('pcta_cols',$module_ID) ): the_row();
        echo "<div class=\"pcta-col\">";
          the_sub_field('column',$module_ID);
        echo "</div>";
      endwhile;
    endif;
    ?>
  </div>
</div>