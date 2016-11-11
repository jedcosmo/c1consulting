<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $kerna_options; 
$terms_slug_str='';
$portfolio_title = get_the_title( $post->ID );
$postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
$portfolio_client_name =esc_attr(get_post_meta( $post->ID, 'kerna_add_name', true ));
$portfolio_releasedate =esc_attr(get_post_meta($post->ID, 'kerna_add_releasedate', true ));
$portfolio_url =esc_url(get_post_meta( $post->ID, 'kerna_add_url', true ));
$portfolio_designedby =(get_post_meta( $post->ID, 'kerna_add_designedby', true ));
$portfolio_releasedate = strtotime( $portfolio_releasedate );?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 

   $terms = get_the_terms( $post->ID, 'portfolio_categories' );
    if ($terms && ! is_wp_error($terms)) :
    $term_slugs_arr = array();
      foreach ($terms as $term) {
        $term_slugs_arr[] = $term->name;
      }
      $terms_slug_str = join( ", ", $term_slugs_arr);
    endif;?>
 <section class="section w-section">
    <div class="container">
      <div class="portfolio-title clearfix">
          <div class="pull-left">
              <h3><?php echo esc_attr($portfolio_title);?></h3>
          </div>
          <div class="pull-right">
              <nav>
                  <ul class="pager">
                   <li><?php previous_post_link('%link','PREVIOUS');?></li>                     
                   <li><?php next_post_link('%link','NEXT');    ?></li>
                  </ul>
              </nav>
          </div>
      </div><!-- end title -->
       <div class="row single-portfolio1 clearfix">
       <?php  if ($kerna_options['single_portfolio'] == 0) :  ?>
          <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="portfolio-media">
                <?php if (has_post_thumbnail()&& !get_post_gallery() ) :                      
                     echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'img-responsive','title'=> ''));
                     endif;?>
                <?php if(has_post_thumbnail()&& get_post_gallery() ):?> 
                  <div class="portfolio-slider">                  
                  <?php if ( get_post_gallery() ) : 
                      $gallery = get_post_gallery( get_the_ID(), false );
                      foreach( $gallery['src'] AS $src ):?>                       
                        <div class="slider-item">
                            <img  src="<?php echo esc_url($src); ?>" alt="" class="img-responsive">
                        </div>                    
                      <?php endforeach;
                      endif;
                     ?>                     
                  </div><!-- end slider --><?php  endif;?>
              </div><!-- end media -->
          </div><!-- end col -->

          <div class="col-md-5 col-sm-5 col-xs-12">
              <div class="portfolio-desc">
                  <h3><?php _e('Brief Description','kerna')?></h3>
                  <hr>
                  <p><?php echo wp_kses_post($postContentStr);?></p>
              </div><!-- end desc -->
              <div class="portfolio-details">
                  <ul>
                      <li><strong><?php _e('Launch Date: ','kerna')?></strong><?php echo date( 'F jS Y', $portfolio_releasedate ); ?></li>
                      <li><strong><?php _e('Client: ','kerna')?></strong><?php echo esc_attr($portfolio_client_name);?></li>
                      <li><strong><?php _e('Category: ','kerna')?></strong><?php echo esc_attr($terms_slug_str);?></li>
                      <li><strong><?php _e('Designed By: ','kerna')?></strong><?php echo esc_attr($portfolio_designedby);?> </li>
                  </ul>
              </div>
              <div class="portfolio-button">
                  <div class="pull-left">
                      <a href="<?php echo esc_url($portfolio_url);?>" title="" class="btn btn-primary border-radius"><?php _e('LAUNCH PROJECT','kerna')?></a>
                  </div>
                 
              </div><!-- end button -->
          </div><!-- end col -->
      </div><!-- end row -->
       <?php  else:  ?>
          <div class="col-md-5 col-sm-5 col-xs-12">
              <div class="portfolio-desc">
                  <h3><?php _e('Brief Description','kerna')?></h3>
                  <hr>
                  <p><?php echo wp_kses_post($postContentStr);?></p>
              </div><!-- end desc -->
              <div class="portfolio-details">
                  <ul>
                      <li><strong><?php _e('Launch Date: ','kerna')?></strong><?php echo date( 'F jS Y', $portfolio_releasedate ); ?></li>
                      <li><strong><?php _e('Client: ','kerna')?></strong><?php echo esc_attr($portfolio_client_name);?></li>
                      <li><strong><?php _e('Category: ','kerna')?></strong><?php echo esc_attr($terms_slug_str);?></li>
                      <li><strong><?php _e('Designed By: ','kerna')?></strong><?php echo esc_attr($portfolio_designedby);?> </li>
                  </ul>
              </div>
              <div class="portfolio-button">
                  <div class="pull-left">
                      <a href="<?php echo esc_url($portfolio_url);?>" title="" class="btn btn-primary border-radius"><?php _e('LAUNCH PROJECT','kerna')?></a>
                  </div>
                 
              </div><!-- end button -->
          </div><!-- end col -->     
          <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="portfolio-media">
                <?php if (has_post_thumbnail()&& !get_post_gallery() ) :                      
                     echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'img-responsive','title'=> ''));
                     endif;?>
                <?php if(has_post_thumbnail()&& get_post_gallery() ):?> 
                  <div class="portfolio-slider">                  
                  <?php if ( get_post_gallery() ) : 
                      $gallery = get_post_gallery( get_the_ID(), false );
                      foreach( $gallery['src'] AS $src ):?>                       
                        <div class="slider-item">
                            <img  src="<?php echo esc_url($src); ?>" alt="" class="img-responsive">
                        </div>                    
                      <?php endforeach;
                      endif; ?>                     
                  </div><!-- end slider -->
                <?php  endif;?>
              </div><!-- end media -->
          </div><!-- end col -->
    </div><!-- end row -->
    <?php endif;?>
    </div>
  </section>
<?php if (isset($kerna_options['related_portfolio']) && $kerna_options['related_portfolio']==1)
      get_template_part('partials/portfolio-related'); 
      endwhile;
endif;?>
<?php get_footer(); ?>