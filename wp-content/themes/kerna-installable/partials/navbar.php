<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<?php  

    global $kerna_options;

    global $post;

    if(is_home()){

        $pageid=get_option('page_for_posts');

    } else {

        $pageid=get_the_ID();

    }

    

    if($menu=get_post_meta( $pageid, 'kerna_menu_select',true)){

    $menu_object = get_term_by('term_taxonomy_id',$menu[0] , 'nav_menu');

    }

    global $woocommerce;    

    



?>

<header class="header header2">            

             <div class="topbar">

                <div class="container topbar-container">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                            <span class="sr-only"><?php _e('Toggle navigation','kerna')?></span>

                            <i class="icon_menu"></i>

                        </button>

                         <?php if (isset($kerna_options['logo']) && $kerna_options['logo']['url']!='') { ?>

                              <a id="brand" class="clearfix navbar-brand" href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url($kerna_options['logo']['url']); ?>" data-at2x="<?php echo esc_url($kerna_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>

				                <?php } else { ?>

                				    <a class="brand" href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a><br/>         

        		 		         <?php 

                        } ?>

                    </div><!-- end navbar-header -->

                    <?php if (!empty($kerna_options['topbar-socialicons']) && $kerna_options['topbar-socialicons']==1) : ?>

                        <div class="headersocial topsocial pull-right">

                         <?php if (!empty($kerna_options['social_facebook'])) : ?>

                             <a  class="facebook" href="<?php  echo esc_url($kerna_options['social_facebook']); ?>"  title="" target='_blank'><i class="social_facebook"></i></a>

                         <?php endif; ?>

                         <?php if (!empty($kerna_options['social_twitter'])) : ?>

                             <a class="twitter" href="<?php  echo esc_url($kerna_options['social_twitter']); ?>" title=""><i class="social_twitter"></i></a>

                         <?php endif; ?>                        

						            <?php if (!empty($kerna_options['social_googlep'])) : ?>

                          	<a class="google" href="<?php  echo esc_url($kerna_options['social_googlep']); ?>" title=""><i class="social_googleplus"></i></a>

                          <?php endif; ?>

                         

                          <?php if (!empty($kerna_options['social_linkedin'])) : ?>

                          	<a class="linkedin" href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>"  title="" target='_blank'><i class="social_linkedin"></i></a>

                          <?php endif; ?>

                          <?php if (!empty($kerna_options['social_instagram'])) : ?>

                          	<a class="instagram" href="<?php  echo esc_url($kerna_options['social_instagram']); ?>" title=""><i class="social_instagram"></i></a>

                          <?php endif; ?>

                          <?php if (!empty($kerna_options['social_dribbble'])) : ?>

                          	<a class="dribbble" href="<?php  echo esc_url($kerna_options['social_dribbble']); ?>"  title=""><i class="social_dribbble"></i></a>

                          <?php endif; ?>

                          

                          <?php if (!empty($kerna_options['social_vimeo'])) : ?>

                          	<a class="vimeo" href="<?php  echo esc_url($kerna_options['social_vimeo']); ?>"  title=""><i class="social_vimeo"></i></a>

                          <?php endif; ?> 

                          <?php if (!empty($kerna_options['social_rss'])) : ?>

                            <a class="rss" href="<?php  echo esc_url($kerna_options['social_rss']); ?>"  title=""><i class="social_rss"></i></a>

                          <?php endif; ?> 

                           <?php if (!empty($kerna_options['social_tumblr'])) : ?>

                            <a class="tumblr" href="<?php  echo esc_url($kerna_options['social_tumblr']); ?>"  title=""><i class="social_tumblr"></i></a>

                          <?php endif; ?> 

                       </div><!-- end right -->

                    <?php endif; ?>

                    <div class="topcontact pull-right">

					             <?php if (!empty($kerna_options['topbar-email'])) : ?><span><?php _e('Free Customer Support','kerna')?> <strong><?php  echo esc_attr($kerna_options['topbar-phone']); ?></strong></span><?php endif; ?> 

                       <?php if (!empty($kerna_options['topbar-phone'])) : ?><span><?php _e('Email us','kerna')?> <strong><?php echo esc_attr($kerna_options['topbar-email']); ?></strong></span><?php endif; ?>                                            

                    </div><!-- end left -->

                </div><!-- end container -->

        </div>  

	

   <div class="menu-container clearfix">

            <div class="container">

                <div class="menu-wrapper">

                    <nav id="navigation" class="navbar" role="navigation">

                        <div class="navbar-inner">

                        

                            <div id="navbar-collapse" class=" navbar-collapse collapse clearfix">

                            	<?php

            								  if(isset($menu_object) && is_object($menu_object)){

            									  $args = array(

            									  'menu'            => $menu_object->slug,

            									  'items_wrap' => '<ul class="nav navbar-nav yamm">%3$s</ul>',

            									  'echo'            => true,

            									  'fallback_cb'     => 'wp_page_menu()',

            									  'walker'  => new description_walker()

            								  );

            								  } else {

            			  

            									  $args = array(

            									  'theme_location' => 'primary',

            									  'items_wrap' => '<ul class="nav navbar-nav yamm">%3$s</ul>',

            									  'echo'            => true,

            									  'fallback_cb'     => 'wp_page_menu()',

            									  'walker'  => new description_walker()

            								  );

            			  

            								  }

            								  wp_nav_menu($args); 

            							  ?>

              

                <ul class="nav navbar-nav navbar-right"> 

                	<?php if (isset($kerna_options['search']) && $kerna_options['search'] == 1  ) { ?>                                

                    <li class="dropdown searchbutton"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon_search"></i><small><?php _e('Search','kerna')?></small></a>

                        <ul class="dropdown-menu" role="menu">

                            <li>                                             

                              <form>

                                 <input class="form-control" name="s" placeholder="Search on this site..." type="text">

                               </form>                               

                            </li>

                        </ul>

                    </li>

                  <?php } ?>                        

                    <?php if (isset($kerna_options['cart']) && $kerna_options['cart'] == 1 &&  is_plugin_active('woocommerce/woocommerce.php')) { ?>

                    <li class="dropdown cartbutton"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon_cart_alt"></i><small><?php echo sprintf(_n('%d Item', '%d Items', $woocommerce->cart->cart_contents_count, 'kerna'), $woocommerce->cart->cart_contents_count); ?></small></a>

                        <ul class="dropdown-menu topcart" role="menu">

                            <li>

                                <table>

                                    <tbody>                                        

                                         <?php  if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :

                                            $_product = $cart_item['data'];                                            

                                            if ($_product->exists() && $cart_item['quantity']>0) :                                                                                 

                                                echo '<tr><td class="image"><a href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image('cart_item_image_size').'</a></td>';                                                    

                                                echo '<td class="name">';

                                                    $kerna_product_title = $_product->get_title();

                                                    $kerna_short_product_title = (strlen($kerna_product_title) > 28) ? substr($kerna_product_title, 0, 25) . '...' : $kerna_product_title;

                                                    echo '<a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $kerna_short_product_title, $_product) . '</a>';

                                                    echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );

                                                    echo ( $sku = $_product->get_sku() ) ? $sku : __( '-N/A', 'woocommerce' );

                                                echo '</td>';

                                                echo '<td class="remove">';

                                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', $woocommerce->cart->get_remove_url( $cart_item_key ) , __('Remove this item', 'kerna') ), $cart_item_key );

                                                echo '</td>';                                                                               

                                            endif;                                        

                                        endforeach;                                                                       

                                        else: echo '<tr><td class="empty">'.__('No products in the cart.','woothemes').'</td> </tr>'; endif;  ?>                                           

                                       

                                    </tbody>

                                </table>

                                <table>

                                    <tbody>

                                        <tr> 

                                            <td><b><?php _e('Sub-Total:', 'kerna'); ?></b></td>

                                            <td><?php echo $woocommerce->cart->get_cart_total(); ?></td>

                                        </tr>

                                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>

                                            <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">

                                              <td><b><?php echo  $tax->label ; ?></b></td>

                                              <td><?php echo  $tax->formatted_amount ; ?></td>

                                            </tr>

                                          <?php endforeach; ?>

                                       

                                        <tr>

                                            <td><b><?php _e('Total:', 'kerna'); ?></b></td>

                                            <td><?php wc_cart_totals_order_total_html(); ?></td>

                                        </tr>

                                    </tbody>

                                </table>

                                 <a href="<?php echo $woocommerce->cart->get_checkout_url() ; ?>" class="btn btn-block btn-primary btn-sm"><?php _e('Checkout', 'kerna'); ?></a>

                       

                            </li>

                        </ul>

                    </li> <?php } ?>   

                </ul><!-- end navbar-right -->              

            </div><!-- end navbar-callopse -->

        </div><!-- end navbar-inner -->

    </nav><!-- end navigation -->

</div><!-- menu wrapper -->

</div><!-- end container -->

</div>  

</header>





