<?php 
$count=count($instance['features']);
if(!empty($instance['title'])||!empty($instance['text'])):
$total=8;
else:
$total=12;
endif;
if($count==5) :$count=4; endif;

$col=$total/$count;
?>

<div class="row service-style-3">
  <?php if(!empty($instance['title'])||!empty($instance['text'])):?>
    <div class="service-one col-md-4 col-sm-6">
        <h2><?php echo wp_kses_post( $instance['title'] ) ?></h2>        
        <p><?php echo wp_kses_post( $instance['text'] ) ?></p>
    </div><!-- end col-md-6 -->
  <?php endif;?>
  <?php foreach( $instance['features'] as $i => $feature ) : ?>
    <div class="service-one text-center col-md-<?php echo $col;?> col-sm-6">
        <?php $icon_styles = array();
        if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
        $icon_styles[] = 'color: '.($feature['icon_color']);
        echo '<div class="wow '.$instance['icon_animation'].' feature">';
        echo siteorigin_widget_get_icon($feature['icon'], $icon_styles);
        echo '</div>';?> 
        
        <h3><?php echo wp_kses_post( $feature['title'] ) ?></h3>
    </div>
  <?php endforeach;?>
    
</div><!-- end row -->