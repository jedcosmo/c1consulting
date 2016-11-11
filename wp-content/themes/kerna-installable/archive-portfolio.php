<?php 
/*
 * 
 */// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $kerna_options;?>

<?php $number=$kerna_options['portfolio_number'];  
 query_posts('post_type=portfolio&posts_per_page='.$number.'&post_status=publish&paged='. get_query_var('paged')); 
global $wp_query;

if($kerna_options['portfolio_style']=='masonry' || $kerna_options['portfolio_style']=='Masonry' ):
  echo' <section class="section w-section ">
        <div class="container">
            <div class="section-title text-center">
                <h3>'.esc_attr($kerna_options['portfolio_title']).'</h3>
                <h2>'.esc_attr($kerna_options['portfolio_subtitle']).'</h2>
                <hr>
                <p>'.wp_kses_post($kerna_options['portfolio_titletext']).'</p>
            </div><!-- end title -->
        </div><!-- end container -->';
    echo '<div class="portfolio-wrapper">';
    echo '<div class="portfolio-filtering text-center">';
    $args = array(
    'taxonomy'     => 'portfolio_categories',
    'orderby'      => 'name',
    'type'     => 'portfolio'
    );
    $categories = get_categories($args);
    if ($categories) :
    $cat_slugs_arr = array();
    echo ' <a href="#" class="filter active" data-filter="*">All</a>';
    foreach ($categories as $cat) { 
      if($cat->slug!='uncategorized'):
     echo '<a href="#" class="filter" data-filter=".'.$cat->slug.'">'.$cat->name.'</a>';
     endif;    
    }endif;

    echo '</div>';          
    echo '<div class="fullwidth-portfolio"><ul class="portfolio-container clearfix image-hover-red hover-titles-effect masonry" id="masonry_grid">';
            if (have_posts()) : while (have_posts()) : the_post(); 
             $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);

                foreach ($terms as $term) {
                  $term_slugs_arr[] = $term->slug;
                }
                $terms_slug_str = join( " ", $term_slugs_arr);
              endif;
                echo '<li class="portfolio-item mix ';if($terms!='')echo  $terms_slug_str;echo '">';  
                echo '<div class="portfolio-image">';
                if (has_post_thumbnail() ) :
                    $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                    $thumb = get_post($att);
                    if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                    else { $att_ID = $post->ID; $att_url = $post->guid; }
                    $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                    echo  get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
              endif;
              echo '</div><!-- end portfolio-image -->                              
                <div class="portfolio-hover-desc">
                      <h3 class="portfolio-hover-title">';
                        if($terms!=null)
                          foreach ($terms as $term) {
                                  $num--;
                                echo esc_attr($term->name);
                                if($num!=0)
                               echo ', ';
                          }echo '</h3>
                      <div class="portfolio-description">'.get_the_title($post->ID).'</div>
                      <div class="portfolio-buttons">
                           <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="'.wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ).'" title=""><i class="icon_search"></i></a>
                          <a href="'.get_the_permalink($post->ID).'" title=""><i class="icon_link_alt"></i></a>
                      </div><!-- end portfolio-buttons -->
              </div>  ';
            endwhile;
            else : get_template_part('partials/nothing-found');
            endif;            
            echo '</ul></div>
           </div> <!-- end portfolio-wrapper -->
      </section>
      ';


elseif($kerna_options['portfolio_style']=='classic' || $kerna_options['portfolio_style']=='Classic'):
  echo '<section class="section w-section">
        <div class="container">
            <div class="section-title text-center">
                <h3>'.esc_attr($kerna_options['portfolio_title']).'</h3>
                <h2>'.esc_attr($kerna_options['portfolio_subtitle']).'</h2>
                <hr>
                <p>'.wp_kses_post($kerna_options['portfolio_titletext']).'</p>
            </div><!-- end title -->';
    if (have_posts()) : echo '<div class="classic-portfolio row">';   
      while (have_posts()) : the_post(); 
      $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);  $num1=count($terms);               
              endif;                  
        echo '<div class="col-md-4 col-sm-6 col-xs-12">';
        echo '  <div class="classic-item">
                      <div class="entry">';
                        if (has_post_thumbnail() ) :
                            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                            $thumb = get_post($att);
                            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                            else { $att_ID = $post->ID; $att_url = $post->guid; }
                            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                            echo  get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
                        endif;
                      echo '<div class="magnifier">';
                        echo '<a href="'.get_the_permalink($post->ID).'"><h3>'.get_the_title($post->ID).'</h3></a>
                        <small>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num--;
                              echo esc_attr($term->name);
                              if($num!=0)
                             echo ', ';
                        } 
                        $excerpt = get_the_content();
                        $excerpt = strip_shortcodes($excerpt);
                        $excerpt = strip_tags($excerpt);
                        echo '</small>
                        <p>'. substr($excerpt, 0,100).'</p>
                        <span><a href="'.get_the_permalink($post->ID).'">Read More</a></span> '; 
                      echo '</div><!-- end magnifier -->';
         echo '   </div><!-- end entry -->';                   
                      echo '<a href="'.get_the_permalink($post->ID).'"><h3>'.get_the_title($post->ID).'</h3></a>
                        <small>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num1--;
                              echo esc_attr($term->name);
                              if($num1!=0)
                             echo ', ';
                        } 
                        echo '</small>                    
                  </div><!--classic item-->
                </div>';
      endwhile;echo '</div> <!-- end classic wrapper --> '; 
       if ($wp_query->max_num_pages>1) :
          kerna_pagination();

      endif; 
    else : get_template_part('partials/nothing-found');
    endif; 
  echo '</div> <!-- container --> 
  </section>';            
    
  
    else:
       echo' <section class="section w-section ">
        <div class="container">
            <div class="section-title text-center">
                <h3>'.esc_attr($kerna_options['portfolio_title']).'</h3>
                <h2>'.esc_attr($kerna_options['portfolio_subtitle']).'</h2>
                <hr>
                <p>'.wp_kses_post($kerna_options['portfolio_titletext']).'</p>
            </div><!-- end title -->
        </div><!-- end container -->';
       echo '<nav class="portfolio-filter text-center">
        <ul class="list-inline">    ';        
            $args = array(
            'taxonomy'     => 'portfolio_categories',
            'orderby'      => 'name',
            'type'     => 'portfolio'
            );
            $categories = get_categories($args);
            if ($categories) :
            $cat_slugs_arr = array();
            echo '<li> <a href="#" class="active" data-filter="*"><span></span> All</a></li>';
            foreach ($categories as $cat) { 
              if($cat->slug!='uncategorized'):
              echo '<li><a href="#"  data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
             endif;    
              }
            endif;

        echo '</ul>
      </nav>'; 
    echo  '<div class="portfolio">';  
    if (have_posts()) : while (have_posts()) : the_post(); 
      $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);

                foreach ($terms as $term) {
                  $term_slugs_arr[] = $term->slug;
                }
                $terms_slug_str = join( " ", $term_slugs_arr);
              endif;
        echo '<article class="item grid item-w1 ';if($terms!='')echo  $terms_slug_str;echo '">';        
        echo '  <div class="entry">';
                        if (has_post_thumbnail() ) :
                            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                            $thumb = get_post($att);
                            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                            else { $att_ID = $post->ID; $att_url = $post->guid; }
                            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                            echo  get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
                        endif;
                      echo '<a href="'.get_the_permalink($post->ID).'">
                        <div class="magnifier">
                          <div class="buttons">';
                        echo '<h3>'.get_the_title($post->ID).'</h3>
                        <h4>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num--;
                              echo esc_attr($term->name);
                              if($num!=0)
                             echo ', ';
                        } 
                        echo '</h4>';                        
               echo '</div>
                      </div></a><!-- end magnifier -->';                         
               echo '                    
                  </div><!--entry-->
                </article>';
    endwhile;    
    endif;            
    echo '</div> <!-- end  main div -->
    </section>';
    endif;
 get_footer(); ?>
