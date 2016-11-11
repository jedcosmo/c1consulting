  <div class="service-<?php echo $instance['align'] ?>">
    <?php foreach( $instance['features'] as $i => $feature ) : ?>
      <div class="service-style-1 text-<?php echo $instance['align'] ?> clearfix">
          <?php  echo '<a href="' . sow_esc_url( $feature['url'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?><div class="icon-container border-radius pull-<?php echo $instance['align'] ?> wow <?php echo $instance['icon_animation']?>">
          <?php $icon_styles = array();
          if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
          $icon_styles[] = 'color: '.($feature['icon_color']);          
          echo siteorigin_widget_get_icon($feature['icon'], $icon_styles);?>          
          </div></a>
          <div class="title">
              <?php  echo '<a href="' . sow_esc_url( $feature['url'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?><h3><?php echo wp_kses_post( $feature['title'] ) ?></h3></a>
              <hr>
              <p> <?php echo  $feature['text'];  ?> </p>
          </div><!-- end desctip -->
      </div><!-- end service-style-1 -->
    <?php endforeach;?>
     
      
  </div><!-- end service right -->


