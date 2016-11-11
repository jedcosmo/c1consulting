<div class="pricingbox text-center wow <?php echo $instance['animation'];?>"> 
    <div class="pricing-header">
        <h4><?php echo  esc_html($instance['title'])  ?></h4>
        <small><?php echo  esc_html($instance['subtitle'])  ?></small>
        <div class="pricing-circle border-radius" style="background:<?php echo $instance['color'].'!important';?>; border-color:<?php echo $instance['color'].'!important';?>;">
        <h3><sup><?php _e('$','siteorigin_widget')?></sup><?php echo esc_html($instance['price']) ?></h3>
        <p><?php echo esc_html($instance['per']) ?></p>
        </div>
    </div>
    <div class="pricing-body">
        <ul>
          <?php foreach($instance['features'] as $i => $feature) : ?>                          
             <li> <?php echo wp_kses_post($feature['text']) ?></li>         
          <?php endforeach;?>           
        </ul> 
    </div>
    <div class="pricing-button">
        <a href="<?php echo sow_esc_url($instance['url']) ?>" class="btn btn-default border-radius"><?php echo esc_html($instance['button']) ?></a>
    </div><!-- end button -->
</div><!-- end pricing-box -->
