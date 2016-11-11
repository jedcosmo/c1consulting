<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); global $kerna_options;?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>
<section class="section w-section">            
    <div class="container">
        <div class="row">
        	<?php if(esc_attr($kerna_options['single-page-layout'])=='2'): ?>
	        	<div id="content" class="col-md-9 col-sm-12 col-xs-12">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>

					<?php
						/**
						 * woocommerce_after_main_content hook
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						//do_action( 'woocommerce_after_main_content' );
					?>
					
				<div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
					<?php
						dynamic_sidebar('kerna-widgets-woocommerce-sidebar');
					?>
				</div>
			<?php else: ?>
                <div id="content" class="col-md-12 col-sm-12 col-xs-12">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>    
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer( 'shop' ); ?>
