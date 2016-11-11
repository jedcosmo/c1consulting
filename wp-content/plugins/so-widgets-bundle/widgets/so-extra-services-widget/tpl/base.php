<?php if($instance['style']=='1'):?>
<div class="row services service-style-4">
 <?php foreach( $instance['services'] as $i => $service ) : ?>
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="service">
          <h3 style="border-color:<?php echo $service['container_color'].'!important;'?>">
          <div class="border-radius wow <?php echo $instance['icon_animation']?>" style="background-color:<?php echo $service['container_color'] ?>">
          <?php $icon_styles = array();
          if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
          $icon_styles[] = 'color: '.($service['icon_color']);         
          echo siteorigin_widget_get_icon($service['icon'], $icon_styles);?>          
          </div>
          <?php echo wp_kses_post( $service['title'] ) ?></h3>
          <p><?php echo wp_kses_post( $service['text'] ) ?></p>
      </div><!-- end service -->
  </div><!-- end col -->
<?php endforeach;?>
</div>


<?php else:
$count=count($instance['services']);
if($count==5) :$count=4; endif;
$total=12;
$col=$total/$count;
?>
 <div class="row services style_2">
   <?php foreach( $instance['services'] as $i => $service ) : ?>
    <div class="col-md-<?php echo $col;?> col-sm-6 col-xs-12">
        <div class="service">
            <h3 style="border-color:<?php echo $service['border_color'];?>">
            <div class="border-radius wow <?php echo $instance['icon_animation']?> " >
            <?php $icon_styles = array();
            if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
            $icon_styles[] = 'color: '.($service['icon_color']);  
             $icon_styles[] = 'background-color: '.($service['container_color']);  
             $icon_styles[] = 'border-color: '.($service['border_color']);   
            echo siteorigin_widget_get_icon($service['icon'], $icon_styles);?>          
            </div>
            <?php echo wp_kses_post( $service['title'] ) ?></h3>
            <p><?php echo wp_kses_post( $service['text'] ) ?></p>
        </div><!-- end service -->
    </div><!-- end col -->
  <?php endforeach;?>    
</div><!-- end services -->
<?php endif;?>