<?php $src1 = wp_get_attachment_image_src($instance['main_image']['image1'],$instance['main_image']['size1']); ?>
<img src="<?php echo esc_url($src1[0]);?>" alt="" class="<?php if(!empty($instance['main_image']['custom_image'])): echo'customimg'; endif;?> wow <?php echo $instance['main_image']['animation1']?> img-responsive">

