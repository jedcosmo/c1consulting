<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<div class="clearfix"></div>
<?php if (comments_open()) : ?>
<div id="reviews">
  <div class="widget comments-wrapper clearfix" id="comments">

          <?php if ( post_password_required() ) { ?>
          <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kerna')?></p>
          <?php
          return;
          }$ncom = get_comments_number();
          ?>
          <?php if ( have_comments() ) : ?>
           <div class="widget-title">
                <h3 class="big-title"><?php _e('COMMENTS: ','kerna');?><span> <?php echo sprintf (__('%s','kerna'), $ncom);?></span></h3>
                
            </div><!-- end title -->
                                 
         <?php if ($ncom >= get_option('comments_per_page') && get_option('page_comments')) : ?>
                <nav id="comment-nav-above">
                    <?php paginate_comments_links(); ?>
                </nav>
            <?php endif; ?>
           
            <div class="comment-list">
                <div class="comments">
                    <ul class="media-list">
                     <?php  $args = array (
                              'paged' => true,
                              'avatar_size'       => 85,
                              'style'             => 'ul',
                              'callback'=> 'kerna_comment',                                                           
                              'per_page' =>'8',
                                 ); 
                          wp_list_comments($args);
                        ?>
                                    
                    </ul> 
                </div>                             
           </div>
           
         <?php if ($ncom >= get_option('comments_per_page') && get_option( 'page_comments' ) ) : ?>
                <nav id="comment-nav-below">
                    <?php paginate_comments_links(); ?>
                </nav>
            <?php endif; ?>
          <?php else : // this is displayed if there are no comments so far ?>
           
          <?php if ('open' == $post->comment_status) : ?>
          <!-- If comments are open, but there are no comments. -->
           
          <?php else : // comments are closed ?>
          <!-- If comments are closed. -->
          <p class="nocomments">Comments are closed.</p>
           
          <?php endif; ?>
          <?php endif; ?>
           
          
           
  </div>          
    <?php if ('open' == $post->comment_status) : ?>     
         <!--  <div class="comments-form" id="respond">-->
          <div class="widget comments-wrapper clearfix" id="review_form_wrapper">
            <div id="review_form">
              <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                  'title_reply'          =>  __( 'POST A COMMENT', 'woocommerce' )  ,
                  'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
                  'comment_notes_before' => '',
                  'comment_notes_after'  => '',
                  'fields'               => array(
                    'author' => '<div class="col-md-4"><input id="author" name="author" type="text" placeholder="Name*" value="' . esc_attr( $commenter['comment_author'] ) . '" class="form-control" aria-required="true" /> </div>',
                    'email'  => '<div class="col-md-4"><input id="email" name="email" type="text" placeholder="Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"  aria-required="true" /></div>',
                    'phone'  => '<div class="col-md-4"><input id="phone" name="phone" type="text" placeholder="Phone number"  class="form-control"   /></div>',
                
                  ),
                  'label_submit'  => '',
                  'id_submit'  => 'submit_hidden',
                  'logged_in_as' => '<div class="col-md-4">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','dikka'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</div>',
                  
                  'comment_field' => ''
                );
                $comment_form['comment_field'] .= '<div class="col-md-12"> <textarea id="comment" name="comment" class="form-control" rows="6" aria-required="true"></textarea>
                                              <button id="submit" name="submit" class="btn btn-primary btn-lg border-radius pull-right">SUBMIT COMMENT</button></div>';
                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
              ?>
            </div>
          </div>
    <?php endif; ?>
  </div>
 
<?php endif;?>
