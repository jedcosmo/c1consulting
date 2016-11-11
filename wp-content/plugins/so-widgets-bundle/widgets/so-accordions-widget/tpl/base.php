<?php if($instance['style']=='1'):
    $indicator_active="icon_minus-06";
    $indicator_inactive="icon_plus";?>
<div class="wow <?php echo $instance['animation']?>">
    <div class="accordion-toggle-1">
        <div class="panel-group" id="accordion">
            
            <?php 
                $requestArray=explode('=',$_SERVER['QUERY_STRING']); 
                $requestArray[0]=$requestArray[1];
            ?>
            <?php foreach( $instance['accordions'] as $i => $accordion ) : $random=rand();?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $random;?>">
                                

                                
                                <h3><?php echo wp_kses_post( $accordion['title'] ) ?></h3>
                            </a><i class="indicator <?php if( !empty($accordion['active'] )) echo $indicator_active; else echo $indicator_inactive; ?> pull-right"></i>
                        </div>
                    </div>
                    
                    <div id="collapse<?php echo $random;?>" class="panel-collapse collapse <?php  if(!empty($requestArray[0])){?>in<?php }?> <?php if( $accordion['active'] ) echo 'in'; else echo 'collapse' ?>">
                        <div class="panel-body">
                            <p><?php echo wp_kses_post( $accordion['text'] ) ?></p>
                        </div>
                    </div>                    
                </div>                          
            <?php endforeach; ?> 
        </div>
    </div><!-- accordion -->
</div><!-- end col -->
<?php else:
    $indicator_active="arrow_carrot-up";
    $indicator_inactive="arrow_carrot-down";?>    
<div class="wow <?php echo $instance['animation']?>">
    <div class="accordion-toggle-2">
        <div class="panel-group" id="accordion1">
            <?php foreach( $instance['accordions'] as $i => $accordion ) : $random=rand();?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $random;?>">
                                <h3><?php echo wp_kses_post( $accordion['title'] ) ?></h3>
                            </a><i class="indicator <?php if( !empty($accordion['active'] )) echo $indicator_active; else echo $indicator_inactive; ?> pull-right"></i>
                        </div>
                    </div>
                    <div id="collapse<?php echo $random;?>" class="panel-collapse collapse <?php if( $accordion['active'] ) echo 'in'; else echo 'collapse' ?>">
                        <div class="panel-body">
                            <p><?php echo wp_kses_post( $accordion['text'] ) ?></p>
                        </div>
                    </div>                    
                </div>                          
            <?php endforeach; ?> 
        </div>
    </div><!-- accordion -->
</div><!-- end col -->

<?php endif;?>
