<?php if( $instance['style']=='1'):?>

<div class="row service-style-6">

   <?php foreach( $instance['services'] as $i => $service ) : ?>

      <div class="service-one firstservice col-md-4 ">

        <?php  echo '<a href="' . sow_esc_url( $service['url'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?>

          

          <?php $icon_styles = array();

          if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';

          $icon_styles[] = 'color: '.($service['icon_color']);

          echo '<div class="wow '.$instance['icon_animation'].'">';

          echo siteorigin_widget_get_icon($service['icon'], $icon_styles);

          echo '</div>';?>        

          

          <h3><?php echo wp_kses_post( $service['title'] ) ?></h3>

          <?php if(!empty($instance['divider'])):?>

            <hr>

          <?php endif;?>

          <p><?php echo wp_kses_post( $service['text'] ) ?></p>

        <?php echo '</a>'; ?>

      </div><!-- end col-md-3 -->

  <?php endforeach;?>

</div><!-- end row -->



<?php elseif( $instance['style']=='2'):

  $count=count($instance['services']);

  if($count==5) :$count=4; endif;

  $total=12;

  $col=$total/$count;

  ?>

  <div class="row servicesstyletwo text-center">

  <?php foreach( $instance['services'] as $i => $service ) : --$count;?>

       <div class="col-md-<?php echo $col;?> col-sm-6 col-sx-12 servicebox big-content <?php if($count>0) echo'noborder'; ?>">         

          <?php $icon_styles = array();

          if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';

          $icon_styles[] = 'color: '.($service['icon_color']);

          echo '<div class="wow '.$instance['icon_animation'].'">';

          echo siteorigin_widget_get_icon($service['icon'], $icon_styles);

          echo '</div>';?>         

          <h3><?php echo wp_kses_post( $service['title'] ) ?></h3>

          <?php if(!empty($instance['divider'])):?>

            <hr>

          <?php endif;?>

          <?php if(!empty($service['text'])):?>

            <p><?php echo wp_kses_post( $service['text'] ) ?></p>

          <?php endif;?>

      </div><!-- end col-md-3 -->

  <?php endforeach;?>   

  </div>

<?php else:

  $count=count($instance['services']);

  if($count==5) :$count=4; endif;

  $total=12;

  $col=$total/$count;?>

 <div class="row-flud">

  <?php foreach( $instance['services'] as $i => $service ) : ?>

     <div class="service-one <?php if(!empty($service['active'])) echo'active';?> col-md-<?php echo $col;?>">

          <?php  echo '<a href="' . sow_esc_url( $service['url'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?>

          <?php $icon_styles = array();

          if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';

          $icon_styles[] = 'color: '.($service['icon_color']);

          echo '<div class="wow '.$instance['icon_animation'].'">';

          echo siteorigin_widget_get_icon($service['icon'], $icon_styles);

          echo '</div>';?> 

          <h3><?php echo wp_kses_post( $service['title'] ) ?></h3>

          <?php if(!empty($instance['divider'])):?>

            <hr>

          <?php endif;?>

          <p><?php echo wp_kses_post( $service['text'] ) ?></p>

          </a>

      </div><!-- end col-md-3 -->

   <?php endforeach;?>   

  </div>



<?php endif;?>