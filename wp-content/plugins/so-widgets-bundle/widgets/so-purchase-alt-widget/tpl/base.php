<div class="welcome text-center">
    <h<?php echo $instance['title_size'];?> <?php if(!empty($instance['letter_spacing'])) echo'class="letter-spacing"';?>><?php  echo $instance['title'];?></h<?php echo $instance['title_size'];?>>
    <h<?php echo $instance['subtitle_size'];?>><?php  echo $instance['subtitle'];?></h<?php echo $instance['subtitle_size'];?>>
    <br>
    <?php if(!empty($instance['buttontext'])):?>
    	<a href="<?php echo $instance['buttonurl'];?>" title="" class="btn btn-<?php echo $instance['type']?> btn-lg border-radius"><?php echo $instance['buttontext'];?></a>
	<?php endif;?><?php if(!empty($instance['buttontext_2'])):?>
    	<a href="<?php echo $instance['buttonurl_2'];?>" title="" class="btn btn-transparent btn-lg border-radius"><?php echo $instance['buttontext_2'];?></a>
    <?php endif;?>
    <br>
</div><!-- end welcome -->
