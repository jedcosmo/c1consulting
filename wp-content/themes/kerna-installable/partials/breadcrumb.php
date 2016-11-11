<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h3>Forbidden</h3>'; exit();} 

global $kerna_options;



$pageid=get_the_ID();



$page_setting_activate=get_post_meta( $pageid, 'kerna_pagetitle_activate',true);?>

<div class="container"><?php

if(isset($page_setting_activate) && $page_setting_activate=='on') :

    $page_title_text=get_post_meta($pageid,'kerna_pagetitle_text',true);

    

?>

		<div class="row">           

            <div class="col-md-8">                 

                    <?php if (is_home()) :?>

                    <h3><?php echo esc_attr($page_title_text);?></h3>

                    <?php elseif (is_single()) :?>

                    <h3><?php echo esc_attr($page_title_text); ?></h3>

                    <?php elseif (is_page()) : ?>

                    <h3><?php echo esc_attr($page_title_text); ?></h3>

                    <?php elseif (is_author()) : ?>

                    <h3><?php _e('AUTHOR', 'kerna'); ?></h3>

                    <?php elseif (is_search()) : ?>

                    <h3><?php _e('SEARCH', 'kerna'); ?></h3>

                    <?php elseif (is_category()) : ?>

                    <h3><?php _e('CATEGORY', 'kerna'); ?></h3>

                    <?php elseif (is_tag()) : ?>

                    <h3><?php _e('TAG', 'kerna'); ?></h3>

                    <?php elseif (is_archive()) : ?>

                    <?php if (get_post_type() == 'product') : ?>

                    <h3><?php _e('PRODUCTS', 'kerna'); ?></h3>

                    <?php else: ?>

                    <h3><?php _e('ARCHIVE', 'kerna'); ?></h3>

                    <?php endif; ?>

                    <?php elseif (get_post_type() == 'product') : ?>

                    <h3><?php _e('PRODUCTS', 'kerna'); ?></h3>

                    <?php else : ?>

                    <h3><?php _e('PAGE NOT FOUND', 'kerna'); ?></h3>

                    <?php endif; ?>              

            </div>

            	<div class="col-md-4">

                    <ol class="breadcrumb text-right">

                      <?php if (function_exists('kerna_breadcrumbs')) kerna_breadcrumbs();  ?>

                    </ol>

                </div>

        </div>



<?php

else :

?>

<div class="row " >

            

            <div class="col-md-8" >

                    <?php if (is_home()) :?>

                    <h3><?php _e('BLOG', 'kerna'); ?></h3>

                    <?php elseif (is_single()) :?>

                    <h3><?php echo get_the_title(); ?></h3>

                    <?php elseif (is_page()) : ?>

                    <h3><?php echo get_the_title(); ?></h3>

                    <?php elseif (is_author()) : ?>

                    <h3><?php _e('AUTHOR', 'kerna'); ?></h3>

                    <?php elseif (is_search()) : ?>

                    <h3><?php _e('SEARCH', 'kerna'); ?></h3>

                    <?php elseif (is_category()) : ?>

                    <h3><?php _e('CATEGORY', 'kerna'); ?></h3>

                    <?php elseif (is_tag()) : ?>

                    <h3><?php _e('TAG', 'kerna'); ?></h3>

                    <?php elseif (is_archive()) : ?>

                    <?php if (get_post_type() == 'product') : ?>

                    <h3><?php _e('PRODUCTS', 'kerna'); ?></h3>

                    <?php else: ?>

                    <h3><?php _e('ARCHIVE', 'kerna'); ?></h3>

                    <?php endif; ?>

                    <?php elseif (get_post_type() == 'product') : ?>

                    <h3><?php _e('PRODUCTS', 'kerna'); ?></h3>

                    <?php else : ?>

                    <h3><?php _e('PAGE NOT FOUND', 'kerna'); ?></h3>

                    <?php endif; ?>


                </div>

                <div class="col-md-4">

                    <ol class="breadcrumb text-right">

                      <?php if (function_exists('kerna_breadcrumbs')) kerna_breadcrumbs();  ?>

                    </ol>

                </div>

            </div>

       

<?php endif; ?> 

</div>

