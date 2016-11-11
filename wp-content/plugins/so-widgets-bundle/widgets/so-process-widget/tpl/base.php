<?php 
$count=count($instance['processes']);
if(!empty($instance['title'])||!empty($instance['text'])):
$count++;
endif;
if($count==5) :$count=4; endif;
$total=12;
$col=$total/$count;
?>
<div class="row ourprocess">
  <?php if(!empty($instance['title'])||!empty($instance['text'])):?>
    <div class="col-md-<?php echo $col;?> col-sm-6 col-xs-12">
        <h3><?php echo wp_kses_post( $instance['title'] ) ?></h3>
        <?php if(!empty($instance['line'])) :?>
        <hr>
        <?php endif;?>
        <p><?php echo wp_kses_post( $instance['text'] ) ?></p>
    </div><!-- end col -->
  <?php endif;?>
    <?php foreach( $instance['processes'] as $i => $process ) : ?>
    <div class="col-md-<?php echo $col;?> col-sm-6 col-xs-12 border-both text-center ourprocesswidget">
        <div class="icon-container border-radius">
        <?php $icon_styles = array();
        if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
        $icon_styles[] = 'color: '.($process['icon_color']);
        echo '<div class="wow '.$instance['icon_animation'].'">';
        echo siteorigin_widget_get_icon($process['icon'], $icon_styles);
        echo '</div>';?>           
        </div>
        <h3><?php echo wp_kses_post( $process['title'] ) ?></h3>
    </div><!-- end col -->
  <?php endforeach;?> 
</div>  
 