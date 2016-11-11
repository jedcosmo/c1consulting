<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<span class="input-group-btn">
    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="<?php echo esc_attr( $input_name ); ?>">
        <span class="glyphicon glyphicon-minus"></span>
    </button>
</span>
<div class="quantity">
	<input type="text" step="<?php echo esc_attr( $step ); ?>" min="1" max="10" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php _ex( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="form-control input-number input-text qty text" >
</div>
 <span class="input-group-btn plus">
    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="<?php echo esc_attr( $input_name ); ?>">
        <span class="glyphicon glyphicon-plus"></span>
    </button>
</span>

