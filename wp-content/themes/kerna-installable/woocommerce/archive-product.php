<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); global $kerna_options; ?>
<?php if(esc_attr($kerna_options['product-page-layout'])=='1'):?>
		<section class="section w-section">            
	        <div class="container">
		      	 <div class="section-title-3 clearfix">
		        		 <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		                    <div class="pull-left">		                    
		                        <h3><?php woocommerce_page_title(); ?></h3>                  
		                   
		                    </div>
		                 <?php endif; ?>

		                <div class="pull-right">
		                
		                     <?php do_action( 'woocommerce_before_shop_loop' );?>
					       
		                </div>
		          </div><!-- end title -->
	            <hr><?php do_action( 'woocommerce_archive_description' ); ?>
	             <?php if (have_posts()) :  
			 	 woocommerce_product_loop_start(); 		
				 woocommerce_product_subcategories(); 
	            	while (have_posts()) : the_post(); 
	             		global $col;
	             		$col=3;
				 		wc_get_template_part( 'content', 'product' ); 
				 	
					endwhile; 
				 woocommerce_product_loop_end(); 
					if ($wp_query->max_num_pages>1) : 
											
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );

					endif; 
				    elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>      
	        	
	       </div> 		         
		</section>
<?php else:?>
		<section class="section w-section">            
		        <div class="container">
		            <div class="row">
		                   
		                <div id="content" class="col-md-9 col-sm-12 col-xs-12">
							 <div class="section-title-3 clearfix">
		                		 <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			                        <div class="pull-left">
				                        <h3><?php woocommerce_page_title(); ?></h3>	                        
				                     </div>
			                     <?php endif; ?>

		                        <div class="pull-right">
		                        
		                             <?php do_action( 'woocommerce_before_shop_loop' );?>
							       
		                        </div>
		                    </div><!-- end title -->
		                    <hr><?php do_action( 'woocommerce_archive_description' ); ?>
		                     <?php if (have_posts()) :  
							 woocommerce_product_loop_start(); 		
							 woocommerce_product_subcategories(); 
		                    
		                     	while (have_posts()) : the_post(); 
		                     		global $col;
		                     		$col=4;
							 		wc_get_template_part( 'content', 'product' ); 
							 	
								endwhile; 
							 woocommerce_product_loop_end(); 
								if ($wp_query->max_num_pages>1) : 
														
									/**
									 * woocommerce_after_shop_loop hook
									 *
									 * @hooked woocommerce_pagination - 10
									 */
									do_action( 'woocommerce_after_shop_loop' );
		
								endif; 
							    elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

									<?php wc_get_template( 'loop/no-products-found.php' ); ?>

								<?php endif; ?> 
		                </div>
		               
		                <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
		                    <?php
								dynamic_sidebar('kerna-widgets-woocommerce-sidebar');
							?>
		                   
		                </div>
		        	</div>
		       </div>  
		           
		</section>
<?php endif;?>

<?php get_footer( 'shop' ); ?>
