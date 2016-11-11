<?php if($instance['style']=='1'):
    $class='custom';
    $list='ul';
elseif($instance['style']=='2'):
    $class='custom1';
    $list='ul';
elseif($instance['style']=='3'):
    $class='custom3';
    $list='ul';
else:
    $class='customorderlist';
    $list='ol';

endif;?>
<div class="wow <?php echo $instance['animation']; ?>">
    <<?php echo $list;?> class="<?php echo $class;?>">
        <?php foreach($instance['listitem'] as $i => $listitem) : ?>                          
             <li> <?php echo wp_kses_post($listitem['text']) ?></li>         
        <?php endforeach;?> 
        
    </<?php echo $list;?>>
</div>
