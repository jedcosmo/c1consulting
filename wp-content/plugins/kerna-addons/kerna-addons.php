<?php
/*
Plugin Name: Kerna Addons
Plugin URI: http://tuchuk.com/plugins
Description: This is addon for kerna theme to generate custom post types and widgets
Version: 1.0
Author: Sunil Chaulgain
Author URI: http://tuchuk.com
Text Domain: kerna-addons
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class KernaAddons{
 
    public function __construct() {
 
        load_plugin_textdomain( 'kerna-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
        add_filter( 'init', array( $this, 'learn_addons_posttypes' ) );
        add_action( 'init', array( $this, 'custom_post_type' ) );
        add_action( 'init', array( $this, 'create_portfolio_taxonomies' ));
        add_filter( 'init', array( $this, 'learn_addons_shortcode' ) );
 
    }

    public function learn_addons_posttypes() {

    }

    public function learn_addons_shortcode() {
      add_shortcode( 'portfolio', array($this, 'portfolio_shortcode') );
    }

    function portfolio_shortcode( $atts ) {
  $test=extract( shortcode_atts(
          array(
             
              'category' => '',
              
              'excerpt' => 'false',
          ), $atts )
  );  $output = '';
  $per_page=$atts[1]; 
  
  $query_args = array(
    
      'posts_per_page'    =>   $per_page,      
      'post_type'         =>   'portfolio',     
  );
  $portfolio_posts = get_posts( $query_args );
$r = new WP_Query($query_args);
if($atts[0]=='masonry'):
  $output .= '<div class="portfolio-wrapper">';
    $output .= '<div class="portfolio-filtering text-center">';
    $args = array(
    'taxonomy'     => 'portfolio_categories',
    'orderby'      => 'name',
    'type'     => 'portfolio'
    );
    $categories = get_categories($args);
    if ($categories) :
    $cat_slugs_arr = array();
    $output.=' <a href="#" class="filter active" data-filter="*">All</a>';
    foreach ($categories as $cat) { 
      if($cat->slug!='uncategorized'):
     $output.='<a href="#" class="filter" data-filter=".'.$cat->slug.'">'.$cat->name.'</a>';
     endif;    
    }endif;

     $output.='</div>';          
    $output.='<div class="fullwidth-portfolio"><ul class="portfolio-container clearfix image-hover-red hover-titles-effect masonry" id="masonry_grid">';
            if ($r->have_posts()) : while ($r->have_posts()) : $r->the_post(); 
             $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);

                foreach ($terms as $term) {
                  $term_slugs_arr[] = $term->slug;
                }
                $terms_slug_str = join( " ", $term_slugs_arr);
              endif;
                $output.='<li class="portfolio-item mix ';if($terms!='')$output.= $terms_slug_str;$output.='">';  
                $output.='<div class="portfolio-image">';
                if (has_post_thumbnail() ) :
                    $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                    $thumb = get_post($att);
                    if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                    else { $att_ID = $post->ID; $att_url = $post->guid; }
                    $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                    $output.= get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
              endif;
              $output.='</div><!-- end portfolio-image -->                              
                <div class="portfolio-hover-desc">
                      <h3 class="portfolio-hover-title">';
                        if($terms!=null)
                          foreach ($terms as $term) {
                                  $num--;
                                $output.=$term->slug;
                                if($num!=0)
                               $output.=', ';
                          }$output.='</h3>
                      <div class="portfolio-description">'.get_the_title($post->ID).'</div>
                      <div class="portfolio-buttons">
                          <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="'.wp_get_attachment_url( get_post_thumbnail_id($post_id) ).'" title=""><i class="icon_search"></i></a>
                          <a href="'.get_the_permalink($post->ID).'" title=""><i class="icon_link_alt"></i></a>
                      </div><!-- end portfolio-buttons -->
              </div></li> ';
            endwhile;
            else : get_template_part('partials/nothing-found');
            endif;
            
            $output.='</ul></div>
           </div> <!-- end portfolio-wrapper -->';


elseif($atts[0]=='classic'):
  
    if ($r->have_posts()) : $output .= '<div class="classic-portfolio row">';   
      while ($r->have_posts()) : $r->the_post(); 
      $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);  $num1=count($terms);               
              endif;                  
        $output.='<div class="col-md-4 col-sm-6 col-xs-12">';
        $output.='  <div class="classic-item">
                      <div class="entry">';
                        if (has_post_thumbnail() ) :
                            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                            $thumb = get_post($att);
                            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                            else { $att_ID = $post->ID; $att_url = $post->guid; }
                            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                            $output.= get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
                        endif;
                      $output.='<div class="magnifier">';
                        $output.='<a href="'.get_the_permalink($post->ID).'"><h3>'.get_the_title($post->ID).'</h3></a>
                        <small>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num--;
                              $output.=$term->name;
                              if($num!=0)
                             $output.=', ';
                        } 
                        $output.='</small>
                        <p>'.get_the_excerpt($post->ID).'</p>
                        <span><a href="'.get_the_permalink($post->ID).'">Read More</a></span> '; 
                      $output.='</div><!-- end magnifier -->';
         $output.='   </div><!-- end entry -->';                   
                      $output.='<a href="'.get_the_permalink($post->ID).'"><h3>'.get_the_title($post->ID).'</h3></a>
                        <small>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num1--;
                              $output.=$term->name;
                              if($num1!=0)
                             $output.=', ';
                        } 
                        $output.='</small>                    
                  </div><!--classic item-->
                </div>';
      endwhile;$output.='</div> <!-- end classic wrapper --> '; 
       if ($r->max_num_pages>1) :
         $output.=kerna_pagination();

      endif; 
    else : get_template_part('partials/nothing-found');
    endif;            
    
  
    else:
       $output .= '<nav class="portfolio-filter text-center">
        <ul class="list-inline">    ';        
            $args = array(
            'taxonomy'     => 'portfolio_categories',
            'orderby'      => 'name',
            'type'     => 'portfolio'
            );
            $categories = get_categories($args);
            if ($categories) :
            $cat_slugs_arr = array();
            $output.='<li> <a href="#" class="active" data-filter="*"><span></span> All</a></li>';
            foreach ($categories as $cat) { 
              if($cat->slug!='uncategorized'):
              $output.='<li><a href="#"  data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
             endif;    
              }
            endif;

        $output.='</ul>
      </nav>'; 
    $output .= '<div class="portfolio">';  
    if ($r->have_posts()) : while ($r->have_posts()) : $r->the_post(); 
      $terms = get_the_terms($post->ID, 'portfolio_categories' );
              if ($terms && ! is_wp_error($terms)) :
                $term_slugs_arr = array();
                $num=count($terms);

                foreach ($terms as $term) {
                  $term_slugs_arr[] = $term->slug;
                }
                $terms_slug_str = join( " ", $term_slugs_arr);
              endif;
        $output.='<article class="item grid item-w1 ';if($terms!='')$output.= $terms_slug_str;$output.='">';        
        $output.='  <div class="entry">';
                        if (has_post_thumbnail() ) :
                            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                            $thumb = get_post($att);
                            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                            else { $att_ID = $post->ID; $att_url = $post->guid; }
                            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                            $output.= get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); 
                        endif;
                      $output.='<a href="'.get_the_permalink($post->ID).'">
                        <div class="magnifier">
                          <div class="buttons">';
                        $output.='<h3>'.get_the_title($post->ID).'</h3>
                        <h4>';if($terms!=null)
                        foreach ($terms as $term) {
                                $num--;
                              $output.=$term->name;
                              if($num!=0)
                             $output.=', ';
                        } 
                        $output.='</h4>';                        
               $output.='</div>
                      </div></a><!-- end magnifier -->';                         
               $output.='                    
                  </div><!--entry-->
                </article>';
    endwhile;    
    endif;            
    $output.='</div> <!-- end  main div -->';
    endif;
    wp_reset_postdata();

    return $output;
    }
 

    
    public function custom_post_type() {

        $labels = array(
            'name'                => _x( 'Portfolio', 'Post Type General Name', 'kerna-addons' ),
            'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'kerna-addons' ),
            'menu_name'           => __( 'Portfolio', 'kerna-addons' ),
            'parent_item_colon'   => __( 'Parent Portfolio', 'kerna-addons' ),
            'all_items'           => __( 'All Portfolio', 'kerna-addons' ),
            'view_item'           => __( 'View Portfolio', 'kerna-addons' ),
            'add_new_item'        => __( 'Add New Portfolio', 'kerna-addons' ),
            'add_new'             => __( 'Add New', 'kerna-addons' ),
            'edit_item'           => __( 'Edit Portfolio', 'kerna-addons' ),
            'update_item'         => __( 'Update Portfolio', 'kerna-addons' ),
            'search_items'        => __( 'Search Portfolio', 'kerna-addons' ),
            'not_found'           => __( 'Not Found', 'kerna-addons' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'kerna-addons' ),
        );
        
        $args = array(
            'label'               => __( 'portfolio', 'kerna-addons' ),
            'description'         => __( 'Portfolio details and list', 'kerna-addons' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor',  'thumbnail','tags', ),
            'taxonomies' => array('portfolio_category'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'register_meta_box_cb' => '',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        
        register_post_type( 'portfolio', $args );

    }

    public function create_portfolio_taxonomies()
    {
      $labels = array(
        'name' => _x( 'portfolio_category', 'Portfolio Category' ),
        'singular_name' => _x( 'portfolio_category', 'Portfolio Category' ),
        'search_items' =>  __( 'Search Portfolio Category' ,'kerna-addons' ),
        'popular_items' => __( 'Popular Portfolio Category' ,'kerna-addons'),
        'all_items' => __( 'All Portfolio Category' ,'kerna-addons'),
        'parent_item' => __( 'Parent Portfolio Category','kerna-addons' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:' ,'kerna-addons'),
        'edit_item' => __( 'Edit Portfolio Category','kerna-addons' ),
        'update_item' => __( 'Update Portfolio Category','kerna-addons' ),
        'add_new_item' => __( 'Add New Portfolio Category','kerna-addons' ),
        'new_item_name' => __( 'New Portfolio Category' ,'kerna-addons'),
       );
      register_taxonomy('portfolio_categories',array('portfolio'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio_categories' ),
      ));
    }
 
}

$addons = new KernaAddons();