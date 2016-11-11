<?php
$query = siteorigin_widget_post_selector_process_query( $instance['posts'] );
$the_query = new WP_Query( $query );
?>

<?php if($the_query->have_posts()) : ?>
		<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
					<div class="blog-item col-md-12 col-sm-6 col-xs-12">
						<div class="blog-media">
							<?php if( has_post_thumbnail() ) :							
							 echo the_post_thumbnail('post', array('alt'=>'','class'=>"img-responsive",'title'=> '')); 
							 else:?>
							 <div class="noimage">
							 	
							 </div>
							 <?php endif;
							 ?>
		                </div><!-- end blog-media -->
		                <div class="bloghovermeta col-md-6">
		                    <div class="meta">
		                        <div class="post-type">
		                        	<?php if (has_post_format('image')) :  ?>
		                        		<i class="icon icon-Picture"></i>                                    
                                    <?php elseif (has_post_format('video')) : ?>
                                    <i class="icon icon-MusicNote"></i>
                                    <?php elseif (has_post_format('gallery')) :  ?>
                                    <i class="icon icon-DSLRCamera"></i>
                                    <?php elseif (has_post_format('audio')) :  ?>
                                    <i class="icon icon-Volume"></i>
                                    <?php elseif (has_post_format('link')) :  ?>
                                    <i class="icon icon-Linked"></i> 
                                    <?php else :  ?>
                                    <i class="icon icon-Pencil"></i>
                                    <?php endif; ?>
		                            
		                        </div><!-- end type -->
		                        <div class="post-date">
		                            <h3><?php echo get_the_date('j') ?><small><?php echo get_the_date('F') ?></small></h3>
		                        </div><!-- end date -->
		                    </div><!-- end meta -->
		                </div><!-- end bloghovermeta -->
						<div class="bloghoverdesc col-md-6">
		                    <a href="<?php the_permalink() ?>" title=""><h3><?php the_title() ?></h3></a>
		                    <span><a href="<?php the_permalink(); ?>"><?php _e('Posted: ','siteorigin-widgets')?><?php echo get_the_date('j M Y') ?></a> <span><?php _e('|','siteorigin-widgets')?></span> 
		                    <?php if (get_the_category()) : ?>            
				              <?php the_category(', ');
				              endif; ?></span>
		                </div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>

<?php endif; ?>