<?php 

/**

 * 

 *

 * @package WordPress

 * @subpackage Kena

 * @since Kena 1.0

 */



if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_template_part('partials/header-simple'); ?>

<div class="notfoundcont">

        <div class="container text-center">

            <div class="logo">

                <?php  $logo=get_template_directory_uri().'/assets/images/404.png';?>

                <img src="<?php echo esc_url($logo);?>" alt="">

            </div>

            <div class="section-title text-center">

                <h2><?php _e('We Are Sorry,','kerna')?><br>

                <?php _e('But The Page Is Not Found !','kerna')?></h2>

                <a href="<?php echo esc_url(site_url()); ?>" class="btn btn-primary btn-lg border-radius"><?php _e('BACK TO THE HOMEPAGE')?></a>

            </div><!-- end title -->

            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <div id="imaginary_container"> 

                    <form class="form-search" method="post" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <div class="input-group stylish-input-group">

                        

                            <input type="text"  class="form-control" name="s" id="s" placeholder="<?php _e('Search blog...', 'kerna'); ?>" />        

                            <span class="input-group-addon">

                            

                                <button type="submit" id="searchsubmit">

                                    <span class="glyphicon glyphicon-search"></span>

                                </button>  

                            </span>

                        

                    </div>

                    </form>

                </div>

            </div><!-- end widget -->

        </div><!-- end container -->

    </div><!-- end notfoundcont -->

<?php get_footer(); ?>

