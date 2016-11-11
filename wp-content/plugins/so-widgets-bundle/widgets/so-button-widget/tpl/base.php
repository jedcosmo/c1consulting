<div class=" wow <?php echo $instance['animation']?>">
   
    <?php echo '<a href="' . esc_url( $instance['url'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . ' class="btn btn-'.$instance['type'].' btn-'.$instance['size'].' border-radius">'.wp_kses_post( $instance['text'] ).'</a>';?>
    
</div>
