<div class="skills">
  <?php foreach( $instance['progressbar'] as $i => $progressbar ) : ?>
    <p><?php echo wp_kses_post($progressbar['title']); ?></p>
    <div class="progress active">
        <div class="progress-bar" style="background-color:<?php echo $progressbar['color']; ?>" role="progressbar" data-transitiongoal="<?php  echo esc_html($progressbar['percent']);?>"><span><?php  echo esc_html($progressbar['percent']);?></span></div>
    </div>
  <?php endforeach;?>   
</div><!-- end skills -->

	