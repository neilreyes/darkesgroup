<?php
  $rows = 'columns';
  $background = get_sub_field('background');
  $padding = get_sub_field('padding');
  $align_items = get_sub_field('align_items');
  $ID = get_sub_field('ID');

  
  if( have_rows($rows) ):

  //var_dump($align_items);
?>
  <section
    class="two-column module"
    <?php if( $ID ): echo 'id="'.$ID.'"';endif; ?>
    style="

      <?php

      $custom_css = "
        .{$ID}{
          padding-top: {$padding['top']};
          padding-right: {$padding['right']};
          padding-bottom: {$padding['bottom']};
          padding-left: {$padding['left']};
        }
      ";

      wp_add_inline_style( 'core-style', $custom_css );

      add_action( 'wp_enqueue_scripts', 'my_styles_method' );


      /*if( $padding ):
        echo 'padding-top:' . $padding['top'] . 'px;';
        echo 'padding-right:' . $padding['right'] . 'px;';
        echo 'padding-bottom:' . $padding['bottom'] . 'px;';
        echo 'padding-left:' . $padding['left'] . 'px;';
      endif;*/ ?>

      <?php if( $background['image'] ): echo 'background-image:url('. $background['image']['url'] .')';endif;?>
      <?php if( $background['color'] ) : echo 'background-color: ' . $background['color'] . ';' ; endif; ?>
    "
    >
    <div class="tc-container">
      <div class="tc-row"
        style="
          <?php if( $align_items ):
            echo 'align-items:' . $align_items . ';';
            echo '-webkit-box-align:' . $align_items . ';';
            echo '-ms-flex-align:' . $align_items . ';';
          endif; ?>
        "
        >
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
  </section>
<?php endif; ?>