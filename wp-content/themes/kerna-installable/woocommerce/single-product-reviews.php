<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div class="widget comments-wrapper clearfix" id="comments">
		<div class="widget-title">
			<h3  class="big-title"><?php
				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = get_comments_number() ) )
					printf( _n( 'COMMENT: %s', 'COMMENTS: %s', $count, 'woocommerce' ), $count );
				else
					_e( 'COMMENT', 'woocommerce' );
			?></h3>
	 	</div>
		<?php if ( have_comments() ) : ?>

			<div class="comment-list">
                <div class="comments">
                    <ul class="media-list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'style'=> 'ul','callback'=> 'kerna_comment','avatar_size'=> 85, ) ) ); ?>
					</ul>
				</div>
			</div>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div class="widget comments-wrapper clearfix" id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( '<div class="widget-title"><h3 class="big-title">POST A COMMENT</h3></div>', 'woocommerce' ) : __( '', 'woocommerce' ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="col-md-4"><input id="author" name="author" type="text" placeholder="Name*" value="' . esc_attr( $commenter['comment_author'] ) . '" class="form-control" aria-required="true" /> </div>',
							'email'  => '<div class="col-md-4"><input id="email" name="email" type="text" placeholder="Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"  aria-required="true" /></div>',
							'phone'  => '<div class="col-md-4"><input id="phone" name="phone" type="text" placeholder="Phone number"  class="form-control"   /></div>',
					
						),
						'label_submit'  => '',
						'logged_in_as' => '<div class="col-md-4">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','dikka'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</div>',
            
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="col-md-12"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<div class="col-md-12"> <textarea id="comment" name="comment" class="form-control" rows="6" aria-required="true"></textarea>
                                        <button id="submit" name="submit" class="btn btn-primary btn-lg border-radius pull-right">SUBMIT COMMENT</button></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>	
</div>
