
<div id="clients" class="owl-clients-container">
 <?php foreach( $instance['images'] as $i => $image ) : 
 $src = wp_get_attachment_image_src($image['client_image'], 'full');?>
 	<div class="owl-client">    
                <img src="<?php echo $src[0];?>" alt="">
    </div><!-- end client-item -->
 <?php endforeach;?>
 </div>
<br><br><br>