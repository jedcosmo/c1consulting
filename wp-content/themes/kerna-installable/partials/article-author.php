<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

 <div class="widget authorbox clearfix">
    <div class="widget-title">
        <h3 class="big-title"><?php _e('About the Author', 'kerna'); ?></h3>
    </div>
    <div class="authorcontainer">
        <div class="alignleft">
        	<?php echo str_replace('avatar-80', 'avatar-80', get_avatar(get_the_author_meta('email'), 80)); ?>
        </div> 
        <h3><?php the_author(); ?> <small><?php the_author_meta('designation'); ?></small></h3>
        <p><?php the_author_meta('description'); ?></p>
    </div>
</div><!-- end widget -->

<hr>