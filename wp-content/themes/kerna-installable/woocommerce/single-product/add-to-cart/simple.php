<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<div class="shop-button">

		<div class="input-group pull-left">
			<form class="cart" method="post" enctype='multipart/form-data'>

			 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
			 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
			 	<span class="pull-right">
			 		<button type="submit" class="btn btn-primary btn-sm border-radius single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
			 	</span>
			 	
			 	<?php
			 		if ( ! $product->is_sold_individually() )
			 			woocommerce_quantity_input( array(
			 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
			 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
			 			) );
			 	?>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
