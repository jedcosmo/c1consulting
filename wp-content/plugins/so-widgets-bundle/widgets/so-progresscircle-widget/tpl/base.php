<div class="text-center wow <?php echo $instance['animation']?>">
    <div id="circle<?php echo $instance['id'];?>" class="circle-stat" data-circle="<?php  echo esc_html(($instance['percent'])/100);?>" data-color="<?php echo $instance['color']; ?>">
        <p><?php  echo esc_html($instance['percent']); _e('%','siteorigin-widgets');?></p>
        <div class="stat-details">
            <h3>
                <?php  $icon_styles = array();                   
                echo siteorigin_widget_get_icon($instance['icon'], $icon_styles);?>  
            </h3>
            <h4><?php echo wp_kses_post($instance['title']); ?></h4>
        </div>
    </div><!-- end circle-stat -->
</div><!-- end col -->
	
  