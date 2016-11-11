<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header();  ?>
<section class="section w-section">            
        <div class="container">
            <div class="row"> 
                <?php if(kerna_detect_woocommerce()==true) : ?>   
                      <div id="content" class="col-md-12 col-sm-12 col-xs-12">
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
                <?php else:?>
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
                    <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">

                        <?php if(kerna_detect_woocommerce()==true) : ?>
                        <?php dynamic_sidebar('kerna-widgets-woocommerce-sidebar'); ?>
                        <?php else : ?>
                        <?php if ( is_active_sidebar( 'kerna-widgets-aside-right' ) ) { ?>          

                        <?php dynamic_sidebar( 'kerna-widgets-aside-right' ); ?>

                        <?php } ?>
                    </div>
                        <?php endif; ?>
                       
                    </div> 
                <?php endif;?>         
                      
            </div>
       </div>  
            <!-- END: BLOG CONTAINER -->
</section>
<?php get_footer(); ?>