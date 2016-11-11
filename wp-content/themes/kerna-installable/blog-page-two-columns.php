<?php
/*
 * Template Name: Blog Template Two Columns
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $count;?>

<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
<section class="section w-section">           
        <div class="container">
            <div class="row">
                
                <!-- BEGIN BLOG POSTS -->       
                <div id="content" class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row two-columns">
                     <?php if (have_posts()) : $count=0; while (have_posts()) : the_post(); 
                        if($count<=1) $count++;
                        else $count--;
					 	get_template_part('partials/article-two-columns'); 
                        
                        
						endwhile; 
						if ($wp_query->max_num_pages>1) : 
							kerna_pagination();
						endif; 
						else : 
							get_template_part('partials/nothing-found'); 
						endif; ?>  
                    </div>
                </div>
               
                
        	</div>
       </div>  
            <!-- END: BLOG CONTAINER -->
</section>



<?php get_footer(); ?>