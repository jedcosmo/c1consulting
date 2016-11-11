<?php if($instance['style']=='1'):
    echo'<div id="testimonials">';
else:
    echo '<div class="wow '.$instance['animation'].'">';
endif;?>

    <?php foreach( $instance['testimonials'] as $i => $testimonial ) : 
        $src = wp_get_attachment_image_src($testimonial['client_image'], 'full');?>
        <div class="owl-testimonial">
            <div class="owl-desc">
                <img src="<?php echo $src[0];?>" alt="" class="alignleft">
                <?php if(!empty($testimonial['icon'])){             
                    $icon_styles = array();                
                    if(!empty($instance['iconcolor'])) $icon_styles[] = 'color: '.$instance['iconcolor']; 
                    if(!empty($instance['iconsize'])) $icon_styles[] = 'font-size: '.intval($instance['iconsize']).'px';                                         
                     echo siteorigin_widget_get_icon($testimonial['icon'], $icon_styles);
                 }             
                ?>
                <h3><?php echo $testimonial['name'];?></h3>
                <small><?php echo $testimonial['company'];?></small>
                <p><?php echo $testimonial['body'];?></p>
            </div><!-- end desc -->
        </div><!-- end owl -->            
    <?php endforeach;?>    
</div>

