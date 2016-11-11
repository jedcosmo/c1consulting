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

    

    $page_setting_activate=get_post_meta( $pageid, 'kerna_pagetitle_activate',true);

    if(isset($page_setting_activate) && $page_setting_activate=='on') :

      $page_menu=get_post_meta($pageid,'kerna_pagetitle_menu',true);

    else:

      $page_menu='left';

    endif;



?>

<header class="header ">            

             <div class="topbar">

                <div class="container topbar-container">

                    <div class="topcontact pull-left">

                       <?php if (!empty($kerna_options['topbar-email'])) : ?><span><?php _e('Free Customer Support','kerna')?> <strong><?php  echo esc_attr($kerna_options['topbar-phone']); ?></strong></span><?php endif; ?> 

                       <?php if (!empty($kerna_options['topbar-phone'])) : ?><span><?php _e('Email us','kerna')?> <strong><?php echo esc_attr($kerna_options['topbar-email']); ?></strong></span><?php endif; ?>                                            

                    </div><!-- end left -->                    

                    <?php if (!empty($kerna_options['topbar-socialicons']) && $kerna_options['topbar-socialicons']==1) : ?>

                        <div class="headersocial topsocial pull-right">

                         <?php if (!empty($kerna_options['social_facebook'])) : ?>

                             <a  class="facebook" href="<?php  echo esc_url($kerna_options['social_facebook']); ?>"  title=""><i class="social_facebook"></i></a>

                         <?php endif; ?>

                         <?php if (!empty($kerna_options['social_twitter'])) : ?>

                             <a class="twitter" href="<?php  echo esc_url($kerna_options['social_twitter']); ?>" title=""><i class="social_twitter"></i></a>

                         <?php endif; ?>                        

						            <?php if (!empty($kerna_options['social_googlep'])) : ?>

                          	<a class="google" href="<?php  echo esc_url($kerna_options['social_googlep']); ?>" title=""><i class="social_googleplus"></i></a>

                          <?php endif; ?>

                         

                          <?php if (!empty($kerna_options['social_linkedin'])) : ?>

                          	<a class="linkedin" href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>"  title=""><i class="social_linkedin"></i></a>

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

                    

                </div><!-- end container -->

        </div>  


   <div class="menu-container clearfix">

            <div class="container">

                <div class="menu-wrapper">

                    <nav id="navigation" class="navbar" role="navigation">

                        <div class="navbar-inner">

                          <div class="navbar-header">

                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                                  <span class="sr-only"><?php _e('Toggle navigation','kerna')?></span>

                                  <i class="icon_menu"></i>

                              </button>

                               <?php if (isset($kerna_options['logo']) && $kerna_options['logo']['url']!='') {?>

                                    <a id="brand" class="clearfix navbar-brand" href="<?php echo esc_url(site_url()); ?>">
                                       <img src="<?php echo esc_url($kerna_options['logo']['url']); ?>" data-at2x="<?php echo esc_url($kerna_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

                                    </a>

                              <?php } else { ?>

                                  <a class="brand" href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">

                                  <?php echo esc_attr(get_bloginfo('name')); ?><br>     

                                  </a>         

                               <?php } ?>

                          </div><!-- end navbar-header -->                        

                          <div id="navbar-collapse" class="navbar-right navbar-collapse collapse clearfix">

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

                      </div><!-- end navbar-callopse -->

                  </div><!-- end navbar-inner -->

               </nav><!-- end navigation -->

            </div><!-- menu wrapper -->

        </div><!-- end container -->

      </div>  

</header>





