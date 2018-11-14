<?php
  $rows = 'columns';
  if( have_rows($rows) ):
?>
  <div class="tc-container">
    <div class="tc-row">
      <?php $i = 1; ?>
      <?php while( have_rows($rows) ): the_row(); ?>
        <?php
          $content = get_sub_field('content');
        ?>
        <div class="tc-col tc-col--<?php echo $i; ?>">
          <?php echo wpautop( $content, false ); ?>
        </div>
      <?php $i++; endwhile; ?>
    </div>
  </div>
<?php endif; ?>