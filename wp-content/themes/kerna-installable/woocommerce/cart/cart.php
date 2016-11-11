<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

//do_action( 'woocommerce_before_cart' ); ?>
<div class="row">
	 <div class="col-md-12">
	 	<div class="shoptable">
			<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

			<?php do_action( 'woocommerce_before_cart_table' ); ?>
			<table class="table table-striped shop_table cart" cellspacing="0">
				<thead>
					<tr>
						<th class="product-remove">&nbsp;</th>
						<th><?php _e( 'Product', 'woocommerce' ); ?></th>
						<th ><?php _e( 'Price', 'woocommerce' ); ?></th>
						<th><?php _e( 'Quantity', 'woocommerce' ); ?></th>
						<th><?php _e( 'Total', 'woocommerce' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							?>
							<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

								<td class="product-remove">
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
									?>
								</td>

								<td class="product-thumbnail">
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $_product->is_visible() )
											echo $thumbnail;
										else
											printf( '<a href="%s" class="img-responsive alignleft">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
									?>
									<?php
										if ( ! $_product->is_visible() )
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
										else
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );

										// Meta data
										echo WC()->cart->get_item_data( $cart_item );

			               				// Backorder notification
			               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
			               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
									?>
								</td>
								<td class="product-price">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
								</td>

								<td class="product-quantity">
									<?php
										
										echo $cart_item['quantity'];
										
									?>
								</td>

								<td class="product-subtotal">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									?>
								</td>
							</tr>
							<?php
						}
					}

					do_action( 'woocommerce_cart_contents' );
					?>
					

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table><hr>
			<div class="col-md-6 ">
				<div class="widget-title">
		        	<h3><?php _e( 'Coupon', 'woocommerce' ); ?></h3>
		    	</div>
		    <div class="box2">
				<td  class="actions">

					<?php if ( WC()->cart->coupons_enabled() ) { ?>
						
						<div class="coupon">
							<span class="pull-left">
							<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?></label> 
							</span>
							<span class="pull-right">
							<input type="text" name="coupon_code" class="form-control input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> 
							</span><br><br><br>
							<span class="pull-left">
							<input type="submit" class="btn btn-primary border-radius button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
							</span>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>

						</div>
					
					<?php } ?>
					
					&nbsp;<input type="submit" class="btn btn-primary border-radius button" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />
					
					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</td>
			</div>
			</div>
			<?php do_action( 'woocommerce_after_cart_table' ); ?>

			</form>
		</div>
	</div>
</div>

<div class=" row calculate cart-collaterals">
	

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

	

</div>

<?php //do_action( 'woocommerce_after_cart' ); ?>
