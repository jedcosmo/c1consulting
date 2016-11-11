<?php 
$count=count($instance['counts']);
if($count==5) :$count=4; endif;
$total=12;
$col=$total/$count;
?>
<div class="row statscounts">
	<?php foreach( $instance['counts'] as $i => $count ) : ?>
	    <div class="statwraper col-md-<?php echo $col;?> col-sm-6 col-xs-12">
	    	<?php $icon_styles = array();
				if(!empty($instance['icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['icon_size']).'px';
				if(!empty($count['icon_color'])) $icon_styles[] = 'color: '.$count['icon_color'];
				 echo '<div class="wow '.$instance['icon_animation'].' count">';
				echo siteorigin_widget_get_icon($count['icon'], $icon_styles);				
				echo '</div>';				
			?>		        
	        <span class="stat-count"><?php echo esc_html($count['number']) ?></span>
	        <small><?php echo esc_html($count['text'])?></small>
	    </div><!-- end col -->
	<?php endforeach;?>    
</div><!-- end row -->

