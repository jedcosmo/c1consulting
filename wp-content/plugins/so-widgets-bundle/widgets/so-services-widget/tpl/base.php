<?php 
$count=count($instance['services']);
if($count==5) :$count=4; endif;
$total=12;
$col=$total/$count;
?>
<div class="row service-style-7">
   <?php foreach( $instance['services'] as $i => $service ) : ?>
      <div class="service-one col-md-<?php echo $col;?>">
        <div class="icon-container border-radius" style="background-color:<?php echo $service['container_color'].'!important;'?>">
        <?php $icon_styles = array();
        if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
        $icon_styles[] = 'color: '.($service['icon_color']);
        echo '<div class="wow '.$instance['icon_animation'].'">';
        echo siteorigin_widget_get_icon($service['icon'], $icon_styles);
        echo '</div>';?>        
        </div>
        <h3><?php echo wp_kses_post( $service['title'] ) ?></h3>
        <hr>
        <p><?php echo wp_kses_post( $service['text'] ) ?></p>
      </div><!-- end col-md-3 -->
  <?php endforeach;?>
</div><!-- end row -->
