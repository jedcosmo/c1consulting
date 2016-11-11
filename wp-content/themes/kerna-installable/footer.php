<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} $pageid=get_the_ID();?>

<?php  global $kerna_options; $total=12;

		$span1=3;

		$span2=2;

		?>

<?php if(isset($kerna_options['footer-on']) && $kerna_options['footer-on']==1) {?>

<?php $page_setting_activate=get_post_meta( $pageid, 'kerna_pagetitle_activate',true);	

		

			if (isset($kerna_options['footer-social'])&& $kerna_options['footer-social']==1) { 

				 if(isset($page_setting_activate) && $page_setting_activate=='on') :    

				 	$page_social_icons=get_post_meta( $pageid, 'kerna_pagetitle_social_icons',true); 

				 	$social_icons=get_post_meta( $pageid, 'kerna_social_icons',true); 				 	

				 else:

				 	$page_social_icons='';

				 	$social_icons='';

				 endif;

			if( $social_icons=='' && $page_social_icons=='') : 

				if(isset($kerna_options['footer-social-number']) && esc_attr($kerna_options['footer-social-number'])!='' && esc_attr($kerna_options['footer-social-number'])<=6) {

					$number=  esc_attr($kerna_options['footer-social-number']); 

					$number=$total/$number;?>



<div class="social-icons text-center clearfix">

    <div class="row-fluid">

        <?php if (!empty($kerna_options['social_facebook'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])==5): echo esc_attr($span1); else: echo esc_attr($number); endif;?> col-sm-2 col-xs-6 social facebook-icon"> <a href="<?php  echo esc_url($kerna_options['social_facebook']); ?>" target="_blank"><i class="social_facebook"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_twitter'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span1); endif;?> col-sm-2 col-xs-6 social twitter-icon"> <a href="<?php  echo esc_url($kerna_options['social_twitter']); ?>"><i class="social_twitter"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_googlep'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social google-icon"> <a href="<?php  echo esc_url($kerna_options['social_googlep']); ?>"><i class="social_googleplus"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_dribbble'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social dribbble-icon"> <a href="<?php  echo esc_url($kerna_options['social_dribbble']); ?>"><i class="social_dribbble"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_tumblr'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social tumblr-icon"> <a href="<?php  echo esc_url($kerna_options['social_tumblr']); ?>"><i class="social_tumblr"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_rss'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social rss-icon"> <a href="<?php  echo esc_url($kerna_options['social_rss']); ?>"><i class="social_rss"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_linkedin'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social linkedin-icon"> <a href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>" target="_blank"><i class="social_linkedin"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_instagram'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social instagram-icon"> <a href="<?php  echo esc_url($kerna_options['social_instagram']); ?>"><i class="social_instagram"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_vimeo'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social vimeo-icon"> <a href="<?php  echo esc_url($kerna_options['social_vimeo']); ?>"><i class="social_vimeo"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

    </div>

    <!-- end fluid --> 

</div>

<!-- end social-icons -->

<?php }endif;

			}

			?>

<footer class="footer clearfix">

    <div class="container">

        <?php get_template_part('partials/footer-layout'); ?>

    </div>

</footer >

<?php 

        if($social_icons=='' && isset($page_social_icons) && $page_social_icons=='on') :

			if (isset($kerna_options['footer-social'])&& $kerna_options['footer-social']==1) { 

				if(isset($kerna_options['footer-social-number']) && esc_attr($kerna_options['footer-social-number'])!='' && esc_attr($kerna_options['footer-social-number'])<=6) {

					$number=  esc_attr($kerna_options['footer-social-number']); 

				$number=$total/$number;?>

<div class="social-icons text-center clearfix">

    <div class="row-fluid">

        <?php if (!empty($kerna_options['social_facebook'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])==5): echo esc_attr($span1); else: echo esc_attr($number); endif;?> col-sm-2 col-xs-6 social facebook-icon"> <a href="<?php  echo esc_url($kerna_options['social_facebook']); ?>"><i class="social_facebook"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_twitter'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span1); endif;?> col-sm-2 col-xs-6 social twitter-icon"> <a href="<?php  echo esc_url($kerna_options['social_twitter']); ?>"><i class="social_twitter"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_googlep'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social google-icon"> <a href="<?php  echo esc_url($kerna_options['social_googlep']); ?>"><i class="social_googleplus"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_dribbble'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social dribbble-icon"> <a href="<?php  echo esc_url($kerna_options['social_dribbble']); ?>"><i class="social_dribbble"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_tumblr'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social tumblr-icon"> <a href="<?php  echo esc_url($kerna_options['social_tumblr']); ?>"><i class="social_tumblr"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_rss'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social rss-icon"> <a href="<?php  echo esc_url($kerna_options['social_rss']); ?>"><i class="social_rss"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_linkedin'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social linkedin-icon"> <a href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>"><i class="social_linkedin"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_instagram'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social instagram-icon"> <a href="<?php  echo esc_url($kerna_options['social_instagram']); ?>"><i class="social_instagram"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

        <?php if (!empty($kerna_options['social_vimeo'])) : ?>

        <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social vimeo-icon"> <a href="<?php  echo esc_url($kerna_options['social_vimeo']); ?>"><i class="social_vimeo"></i></a> </div>

        <!-- end col -->

        <?php endif;?>

    </div>

    <!-- end fluid --> 

</div>

<!-- end social-icons -->

<?php }

			}

			endif;?>

<?php }?>

<?php if(isset($kerna_options['secondfooter-on']) && $kerna_options['secondfooter-on']==1) {?>

<div class="copyrights clearfix">

    <div class="container">

        <?php if(isset($kerna_options['footer_text'])) :  ?>

        <!-- BEGIN: COPYRIGHTS -->

        <div class="pull-left text-left">

            <p>

                <?php  echo wp_kses_post($kerna_options['footer_text']); ?>

            </p>

        </div>

        <?php endif; ?>

        <?php if(isset($kerna_options['footer_text'])) :  ?>

        <div class="pull-right text-right">

            <?php

						  if(isset($menu_object) && is_object($menu_object)){

							  $args = array(

							  'menu'            => $menu_object->slug,

							  'items_wrap' => ' <ul class="list-inline">%3$s</ul>',

							  'echo'            => true,

							  'fallback_cb'     => 'wp_page_menu()',

							  'walker'  => new footer_description_walker()

						  );

						  } else {

	  

							  $args = array(

							  'theme_location' => 'secondary',

							  'items_wrap' => ' <ul class="list-inline">%3$s</ul>',

							  'echo'            => true,

							  'fallback_cb'     => 'wp_page_menu()',

							  'walker'  => new footer_description_walker()

						  );

	  

						  }

						  wp_nav_menu($args); 

					  ?>

        </div>

        <!-- end left -->

        <?php endif; ?>

    </div>

</div>

<div class="backtotop">

    <?php _e('Scroll to Top','kerna')?>

</div>

<?php }?>

</div>

<?php wp_footer(); ?>

</body></html>

<script src="<?php bloginfo('template_url') ?>/js/greenjobapi.js"></script>
<script type="text/javascript">

jQuery("#panel-w57ebcad947870-0-1-0 div.section-title").prepend("<h2>SAN FRANCISCO</h2>");
jQuery("#panel-w57ebcad947870-0-2-0 div.section-title").prepend("<h2>NEW YORK</h2>");
jQuery("#panel-w57ebcad947870-2-0-0 div.section-title").prepend("<h2>BOSTON</h2>");

</script>