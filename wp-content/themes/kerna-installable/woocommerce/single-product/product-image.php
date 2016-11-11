<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="col-md-5 shop-single-images">
	<article class="item">
        <div class="entry">                        
         <?php
		if ( has_post_thumbnail() ) {

			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			//$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( ' <img src="%s" alt="">', $image_link, $image ), $post->ID );
			?>
			<div class="magnifier">
	    		<div class="buttons">
	        		<h3><a data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="<?php echo esc_url($image_link);?>" title=""><i class="icon_zoom-in_alt"></i></a></h3>
	    		</div>
			</div><?php
		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	?>
		</div>
	</article>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		

</div>
