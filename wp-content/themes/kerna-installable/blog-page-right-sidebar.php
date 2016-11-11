<?php

/*

 * Template Name: Blog Template with Right Sidebar

 *

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>



<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>

<section class="section w-section">            

        <div class="container">

            <div class="row">

                

                <!-- BEGIN BLOG POSTS -->       

                <div id="content" class="col-md-9 col-sm-12 col-xs-12">

                     <?php if (have_posts()) : while (have_posts()) : the_post(); 

					 	get_template_part('partials/article'); 

						endwhile; 

						if ($wp_query->max_num_pages>1) : 

							kerna_pagination();

						endif; 

						else : 

							get_template_part('partials/nothing-found'); 

						endif; ?>  

                </div>

               
                <?php if ( is_active_sidebar( 'kerna-widgets-aside-right' ) ) { ?>
                     <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">

                    

                        <?php dynamic_sidebar( 'kerna-widgets-aside-right' ); ?>

                   

                    </div>

                <?php } ?>
               
        	</div>

       </div>  

            <!-- END: BLOG CONTAINER -->

</section>







<?php get_footer(); ?>