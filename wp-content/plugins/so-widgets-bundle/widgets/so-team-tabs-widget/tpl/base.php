<div class="teambox">

    <ul class="nav nav-pills nav-stacked col-md-2">

        <?php foreach( $instance['tabs'] as $i => $tab ) : ?>

            <?php $src = wp_get_attachment_image_src($tab['image'], 'full');?>

            <li class="<?php if( $tab['active'] ) echo 'active'; ?> " ><a href="#<?php echo $i;?>"  data-toggle="pill"><img src="<?php echo $src[0];?>" class="img-circle" alt=""></a></li>     

         

         <?php endforeach; ?>    

    </ul>

    <div class="tab-content col-md-10">

        <?php foreach( $instance['tabs'] as $i => $tab ) : ?>

            <div class="tab-pane <?php if( $tab['active'] ) echo 'active'; ?>" id="<?php echo $i;?>">  

                <div class="teamdesc clearfix">

                    <div class="pull-left">

                        <h4><?php echo wp_kses_post( $tab['name'] ) ?></h4>

                        <small><?php echo wp_kses_post( $tab['cpost'] ) ?></small>

                        <hr>

                    </div>

                    <div class="pull-right">

                        <div class="topsocial clearfix">

                             <?php if (!empty($tab['social_address']['twitter'])) : ?>

                            <a class="twitter" href="<?php echo esc_url( $tab['social_address']['twitter'] );?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';?>><i class="social_twitter"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['instagram'])) : ?>

                            <a class="instagram" href="<?php echo esc_url( $tab['social_address']['instagram'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';  ?>><i class="social_instagram"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['tumblr'])) : ?>

                            <a class="tumblr" href="<?php echo esc_url( $tab['social_address']['tumblr'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : ''; ?>><i class="social_tumblr"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['linkedin'])) : ?>

                            <a class="linkedin" href="<?php echo esc_url( $tab['social_address']['linkedin'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';?>><i class="social_linkedin"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['facebook'])) : ?>

                            <a class="facebook" href="<?php echo esc_url( $tab['social_address']['facebook'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';?>><i class="social_facebook"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['gplus'])) : ?>

                            <a class="google" href="<?php echo esc_url( $tab['social_address']['gplus'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';?>><i class="social_googleplus"></i></a>

                            <?php endif;?>

                            <?php if (!empty($tab['social_address']['vimeo'])) : ?>

                            <a class="vimeo" href="<?php echo esc_url( $tab['social_address']['vimeo'] ) ;?>" <?php echo $instance['new_window'] ? 'target="_blank"' : '';?>><i class="social_vimeo"></i></a>

                            <?php endif;?>

                        </div><!-- end right -->

                    </div><!--pull-right-->

                </div><!-- end teamdesc -->

                    <p><?php echo nl2br($tab['shortintro']) ?></p>                     

            </div>

          <?php endforeach; ?>  

        

    </div><!-- tab content -->

</div><!-- end teambox -->



