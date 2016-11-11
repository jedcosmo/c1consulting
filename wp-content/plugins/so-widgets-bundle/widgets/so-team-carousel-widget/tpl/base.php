 <div id="teamcarousel" class="owl-clients-container text-center">
  <?php foreach( $instance['team_boxes'] as $i => $team_box ) : ?>
     <div class="owl-team entry">
        <?php $src = wp_get_attachment_image_src($team_box['image'], 'full');?>
        <img src="<?php echo $src[0];?>" alt="" class="img-responsive">       
        <p><?php echo wp_kses_post( $team_box['name'] ) ?></p>
        <small><?php echo wp_kses_post( $team_box['cpost'] ) ?></small>
        <div class="topsocial clearfix">
            <?php if (!empty($team_box['social_address']['twitter'])) : ?>
            <a class="twitter" href="<?php echo esc_url( $team_box['social_address']['twitter'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_twitter"></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['instagram'])) : ?>
            <a class="instagram" href="<?php echo esc_url( $team_box['social_address']['instagram'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_instagram"></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['tumblr'])) : ?>
            <a class="tumblr" href="<?php echo esc_url( $team_box['social_address']['tumblr'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_tumblr"></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['linkedin'])) : ?>
            <a class="linkedin" href="<?php echo esc_url( $team_box['social_address']['linkedin'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_linkedin"></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['facebook'])) : ?>
            <a class="facebook" href="<?php echo esc_url( $team_box['social_address']['facebook'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_facebook"></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['gplus'])) : ?>
            <a class="google" href="<?php echo esc_url( $team_box['social_address']['gplus'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_googleplus"></i></i></a></li>
            <?php endif;?>
            <?php if (!empty($team_box['social_address']['vimeo'])) : ?>
            <a class="vimeo" href="<?php echo esc_url( $team_box['social_address']['vimeo'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_vimeo"></i></a></li>
            <?php endif;?>
           
        </div><!-- end right -->
        <div class="magnifier">
            <p><?php echo wp_kses_post( $team_box['name'] ) ?></p>
            <small><?php echo wp_kses_post( $team_box['cpost'] ) ?></small>
             <span><?php echo wp_kses_post( $team_box['shortintro'] ) ?></span>
            <div class="topsocial clearfix">
              <?php if (!empty($team_box['social_address']['twitter'])) : ?>
                <a class="twitter" href="<?php echo esc_url( $team_box['social_address']['twitter'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_twitter"></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['instagram'])) : ?>
                <a class="instagram" href="<?php echo esc_url( $team_box['social_address']['instagram'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_instagram"></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['tumblr'])) : ?>
                <a class="tumblr" href="<?php echo esc_url( $team_box['social_address']['tumblr'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_tumblr"></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['linkedin'])) : ?>
                <a class="linkedin" href="<?php echo esc_url( $team_box['social_address']['linkedin'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_linkedin"></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['facebook'])) : ?>
                <a class="facebook" href="<?php echo esc_url( $team_box['social_address']['facebook'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_facebook"></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['gplus'])) : ?>
                <a class="google" href="<?php echo esc_url( $team_box['social_address']['gplus'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_googleplus"></i></i></a></li>
                <?php endif;?>
                <?php if (!empty($team_box['social_address']['vimeo'])) : ?>
                <a class="vimeo" href="<?php echo esc_url( $team_box['social_address']['vimeo'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) ?>"><i class="social_vimeo"></i></a></li>
                <?php endif;?>
            </div><!-- end right -->                 
        </div><!-- end magnifier -->
    </div><!-- end owl -->
  <?php endforeach;?>    
</div>
<br><br><br>

