<?php if($instance['style']=='colored'):?>
    <div class="wow <?php echo $instance['animation']; ?>">
        <h<?php  echo $instance['title']['size'];?> class="colorred" style="color:<?php echo $instance['title']['color'];?>"><?php  echo $instance['title']['heading'];?></h<?php  echo $instance['title']['size'];?>>
        <p><?php  echo nl2br($instance['description']);?></p>
    </div>
<?php else:?>
    <?php if($instance['style']=='service-one'):?>
        <div class="service-one">
    <?php elseif($instance['style']=='simple-style'):
        echo' <div class="text-'.$instance['align'].'">';
     elseif($instance['style']=='section-title-3'):
        echo '<div class="'.$instance['style'].' text-'.$instance['align'].'">';
     elseif($instance['style']=='section-title-2'):
        echo '<div class="'.$instance['style'].' text-'.$instance['align'].'">';
    else:
         echo '<div class="'.$instance['style'].' text-'.$instance['align'].'">';
     endif;?>
            <?php if(!empty( $instance['title']['heading'])):?>
                <h<?php  echo $instance['title']['size'];?>><?php  echo $instance['title']['heading'];?></h<?php  echo $instance['title']['size'];?>>
            <?php endif;?>
            <?php if(!empty( $instance['subtitle']['subheading'])):?>
                <h<?php  echo $instance['subtitle']['size'];?>><?php  echo $instance['subtitle']['subheading'];?></h<?php  echo $instance['subtitle']['size'];?>>
            <?php endif;?>
            <?php if(!empty($instance['line']))  { ?>
            
            <hr <?php if($instance['align']=='left') echo 'style="margin: 30px 0;"'; if($instance['align']=='right') echo 'style="margin: 20px 0 20px 1110px;"';?>>
           
            <?php } ?>
            <p><?php  echo nl2br($instance['description']);?></p>
    
       </div>
   
<?php endif;?>
