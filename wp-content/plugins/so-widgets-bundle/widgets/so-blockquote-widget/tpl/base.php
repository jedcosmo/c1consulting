<?php if($instance['style']=='customquote'):?>
    <div class="wow <?php echo $instance['animation']; ?>">
        <blockquote class="<?php echo $instance['style']?>" style="background-color:<?php echo $instance['color'];?>"><?php  echo $instance['quote'];?>
        <small><?php  echo $instance['name'];?></small>
        </blockquote>
    </div>
<?php else:?>
    <div class=" wow <?php echo $instance['animation']; ?>">
        <blockquote class="<?php echo $instance['style']?>"><span><?php _e('"','siteorigin_widgets')?></span> <?php  echo $instance['quote'];?><span><?php _e('"','siteorigin_widgets')?></span>
        <small><?php  echo $instance['name'];?></small>
        </blockquote>
    </div>
<?php endif;?>