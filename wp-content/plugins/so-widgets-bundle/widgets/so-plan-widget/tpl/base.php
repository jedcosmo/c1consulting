 <div class="colorfulservices  col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1" style="background-color:<?php echo $instance['color']?>">
    <div class="title text-center">
        <h3><?php echo wp_kses_post( $instance['title'] ) ?></h3>
    </div>

    <div class="clearfix"></div>
    <?php 
    $count=count($instance['plans']);
    
    if($count==5) :$count=4; endif;
    $total=12;
    $col=$total/$count;
    ?>

    <div class="row wow <?php echo $instance['animation']?>">
        <?php foreach( $instance['plans'] as $i => $plan ) : ?>
        <div class="col-md-4 col-sm-6 service-colorful">
            <?php $icon_styles = array();
            if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
            $icon_styles[] = 'color: '.($plan['icon_color']);   
            echo '<div class="alignleft border-radius">';     
            echo siteorigin_widget_get_icon($plan['icon'], $icon_styles);
            echo '</div>';
            ?>
            
            <h3><?php echo wp_kses_post( $plan['title'] ) ?></h3>
            <p><?php echo wp_kses_post( $plan['text'] ) ?></p>
        </div><!-- end service-colorful -->
        <?php endforeach;?> 
    </div><!-- end row -->
 </div><!-- end col -->
