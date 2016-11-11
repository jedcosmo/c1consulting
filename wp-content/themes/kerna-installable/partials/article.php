<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} global $singlepost; ?>

<?php if ( has_post_format('link') ) :?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-wrapper green">
            <div class="blog-container text-center">
                <div class="blog-links">
                    <i class="icon_link"></i>
                    <?php $link = get_post_meta( $post->ID, 'l_url', true );?> 
                    <h4><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
                </div>
                <div class="blog-links-desc">
                    <?php the_excerpt (); ?>
                </div>
            </div><!-- end right -->
        </div><!-- end blog-wrapper -->
    </div>
 <?php if (is_single()) : ?>
  <?php if (get_next_post_link('&laquo; %link', '%title', 1) OR get_previous_post_link('%link &raquo;', '%title', 1)) : ?>
    <div class="prev-next-btn" style="display:none;">
      <ul class="pager">
        <li class="previous">
        <?php 
        previous_posts_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'lenard' ) . '</span> %title' ); ?>
        </li>
        <li class="next">
        <?php 
        next_posts_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'lenard' ) . '</span>' ); ?>
        </li>
      </ul>
    </div>
  <?php endif; ?>
<?php endif; ?>
    <?php  if (is_single()): ?>
      <?php if (get_next_post_link('&laquo; %link', '%title', 1) OR get_previous_post_link('%link &raquo;', '%title', 1)) : ?>
        <div class="nav">
          <ul class="pager">
            <li class="previous">
            <?php 
            previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'kerna' ) . '</span> %title' ); ?>
            </li>
            <li class="next">
            <?php 
            next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'kerna' ) . '</span>' ); ?>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    <?php endif; ?>

<?php else :?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if($singlepost!=1)  echo '<div class="blog-wrapper">';?> 
    <div class="alignnone">
        <div class="blog-media">            
            <?php if ( has_post_format('gallery') ) : $gallery = get_post_gallery( get_the_ID(), false );?>
                <div class="blog-slider">
                    <?php foreach( $gallery['src'] AS $src ){?>
                        <div class="sidslide"><img  src="<?php echo esc_url($src); ?>" /></div>
        
                     <?php }?>
                </div>
            <?php endif;  ?>
            <?php if (has_post_format('quote')) :  ?>
                <div class="post-quote">
                    <blockquote><i class="fa fa-quote-left"></i> <?php echo  the_content(); ?><i class="fa fa-quote-left"></i></blockquote>
                    <span class="author-quote"> - <?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></span>
                </div>          
            
            <?php else : ?> 
                                 
            <?php if (has_post_thumbnail() && !has_post_format('video') && !has_post_format('quote')&& !has_post_format('gallery') && !has_post_format('audio')&&(!is_single() || !is_page())) :
            
                $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                $thumb = get_post($att);
                if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                else { $att_ID = $post->ID; $att_url = $post->guid; }
                $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);?>            
                <a href="<?php the_permalink(); ?>" >
                    <?php echo the_post_thumbnail('thumbnails', array('alt'=>'','class'=>"img-responsive",'title'=> '')); ?>
                </a>           
            <?php endif; ?>      
                
                <?php if (has_post_format('video')) : 
                    $videoID = get_post_meta( $post->ID, 'video_id', true );?> 
                    <iframe class="vimeo" src="<?php echo esc_url($videoID);?>" width="500" height="281"></iframe> 
                <?php endif; ?>
                    
                <?php if (has_post_format('audio')) :
                    $audioID = get_post_meta( $post->ID, 'audio_id', true );?>           
                    <a href="<?php the_permalink(); ?>"> 
                    <?php echo wp_oembed_get(  $audioID ); ?> </a>
                <?php endif; ?>
            <?php endif; ?>    
        </div><!-- end media -->
    </div>

    <div class="blog-container">
        <?php if(!is_page()) : ?>
        <div class="blog-meta">        
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php _e('By ','kerna')?><?php echo get_the_author() ?></a> <span><?php _e('|','kerna')?></span> 
                <?php  if (get_the_category()) :
                 the_category(', ');
                  endif; ?>
                <span><?php _e('|','kerna')?></span> 
                <?php  if (the_tags()) :
                 the_tags(', '); ?>
                 <span><?php _e('|','kerna')?></span> 
                 <?php endif; ?>
                <?php $archive_year  = get_the_time('Y'); 
                  $archive_month = get_the_time('m'); 
                  $archive_day   = get_the_time('d'); 
                  ?>
                <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php _e('Posted at ','kerna')?><?php echo get_the_date('j M Y') ?></a>
                <span><?php _e('|','kerna')?></span> 
                <a href="<?php the_permalink(); ?>" title="">
                    <?php echo get_comments_number(); 
                    if (get_comments_number()>1): echo ' Comments';
                    else: echo ' Comment'; endif;?>
                </a>
            </p>
        </div><!-- end meta -->
        <?php endif; ?>
        
        <div class="longdesc">
            <?php // If displaying a single post or a page
            if (is_single() OR is_page()) :
                
                if(has_post_format('gallery')):
                    $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                    echo wp_kses_post($postContentStr);
                else:
                    the_content();
                endif;   
                     wp_link_pages(array(
                        'next_or_number' => 'number',
                        'nextpagelink' => __('Next page', 'lenard'),
                        'previouspagelink' => __('Previous page', 'lenard'),
                        'pagelink' => '%',
                        'link_before' => '<span class="ft-btn">',
                        'link_after' => '</span>',
                        'before' => '<div class="clearfix"></div>' . __('Pages:', 'lenard') . ' <div class="ft-article-pages">',
                        'after' => '</div>'
                        )); 
                   
            else :                
                if (has_post_format('audio') OR has_post_format('image') OR has_post_format('quote') OR has_post_format('link') OR  has_post_format('video'))
                    the_content();                
                else
                    the_excerpt ();                 
            endif;?>
            <?php if(!is_page()) : ?>
                <div class="portfolio-button clearfix">
                    <?php if ($singlepost!=1):?> 
                        <div class="pull-left">
                            <a href="<?php echo the_permalink();?>" class="btn btn-default border-radius"><?php _e('READ MORE','kerna')?></a>
                        </div>
                    <?php  endif;?>                    
                </div><!-- end button -->
            <?php endif;?>
        </div><!-- end desc -->
        <?php  if (is_single()): ?>
          <?php if (get_next_post_link('&laquo; %link', '%title', 1) OR get_previous_post_link('%link &raquo;', '%title', 1)) : ?>
            <nav>
              <ul class="pager">
                <li class="previous">
                    <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'kerna' ) . '</span> %title' ); ?>
                </li>
                <li class="next">
                    <?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'kerna' ) . '</span>' ); ?>
                </li>
              </ul>
            </nav>
          <?php endif; ?>
        <?php endif; ?>
    </div><!-- end right -->

<?php if($singlepost!=1)  echo '</div>';?>
</div>
<?php endif; ?>
