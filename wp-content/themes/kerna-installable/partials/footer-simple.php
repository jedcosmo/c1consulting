<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} $pageid=get_the_ID();?>        

<?php  global $kerna_options; $total=12;

		$span1=3;

		$span2=2;

		?>     

    <?php if(isset($kerna_options['footer-on']) && $kerna_options['footer-on']==1) :		

			if (isset($kerna_options['footer-social'])&& $kerna_options['footer-social']==1) :			  

				if(isset($kerna_options['footer-social-number']) && $kerna_options['footer-social-number']!='' && $kerna_options['footer-social-number']<=6) :

					$number=  esc_attr($kerna_options['footer-social-number']); 

					$number=$total/$number;?>

								

		       		<div class="social-icons text-center clearfix">

				        <div class="row-fluid">

				        	<?php if (!empty($kerna_options['social_facebook'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])==5): echo esc_attr($span1); else: echo esc_attr($number); endif;?> col-sm-2 col-xs-6 social facebook-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_facebook']); ?>"><i class="social_facebook"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_twitter'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span1); endif;?> col-sm-2 col-xs-6 social twitter-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_twitter']); ?>"><i class="social_twitter"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_googlep'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])esc_attr(!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social google-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_googlep']); ?>"><i class="social_googleplus"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_dribbble'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social dribbble-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_dribbble']); ?>"><i class="social_dribbble"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_tumblr'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social tumblr-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_tumblr']); ?>"><i class="social_tumblr"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_rss'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social rss-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_rss']); ?>"><i class="social_rss"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_linkedin'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social linkedin-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>"><i class="social_linkedin"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_instagram'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social instagram-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_instagram']); ?>"><i class="social_instagram"></i></a>

				            </div><!-- end col --><?php endif;?><?php if (!empty($kerna_options['social_vimeo'])) : ?>

				            <div class="col-md-<?php if(esc_attr($kerna_options['footer-social-number'])!=5): echo esc_attr($number); else: echo esc_attr($span2); endif;?> col-sm-2 col-xs-6 social vimeo-icon">

				                <a href="<?php  echo esc_url($kerna_options['social_vimeo']); ?>"><i class="social_vimeo"></i></a>

				            </div><!-- end col --><?php endif;?>

				        </div><!-- end fluid -->

				    </div><!-- end social-icons -->

		<?php 	endif;

			endif;			

	endif;?>     

     

    </div><!--wrapper-->



    <?php wp_footer(); ?> 

    <script>

    (function($) {

    "use strict";

        $("#DateCountdown").TimeCircles({

            fg_width: 0.02, //  sets the width of the foreground circle.

            bg_width: 1, // sets the width of the backgroundground circle.

            text_size: 0.07, // This option sets the font size of the text in the circles.

            total_duration: "Auto", // This option can be set to change how much time will fill the largest visible circle.

        });

    })(jQuery);

    </script>  

        

    </body>

</html>