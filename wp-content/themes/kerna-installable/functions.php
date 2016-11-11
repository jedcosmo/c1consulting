<?php

/**

 * Kerna functions file.

 */



// Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();}



global $kerna_options;





if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxCore/framework.php' ) ) {

    require_once( dirname( __FILE__ ) . '/ReduxCore/framework.php' );

}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-config.php' ) ) {

    require_once( dirname( __FILE__ ) . '/theme-config.php' );

}



require_once( ABSPATH . 'wp-admin/includes/plugin.php' );



require_once( ABSPATH . 'wp-admin/includes/template.php' );



/*********************************************************************

* THEME SETUP

*/

function kerna_setup() {



    global $kerna_options;



    // Translations support. Find language files in kerna/languages

    load_theme_textdomain('kerna', get_template_directory().'/languages');

    $locale = get_locale();

    $locale_file = get_template_directory()."/languages/{$locale}.php";

    if(is_readable($locale_file)) { require_once($locale_file); }



    // Set content width

    global $content_width;

    if (!isset($content_width)) $content_width = 720;



    // Editor style (editor-style.css)

    add_editor_style(array('assets/css/editor-style.css'));



    // Load plugin checker

    require(get_template_directory() . '/inc/plugin-activation.php');





    add_filter('add_to_cart_fragments' , 'woocommerce_header_add_to_cart_fragment' );



     // Nav Menu (Custom menu support)

    if (function_exists('register_nav_menu')) :

        register_nav_menu('primary', __('Kerna Primary Menu', 'kerna'));

        register_nav_menu('secondary', __('Kerna Secondary Menu', 'kerna'));

    endif;





    // Theme Features: Automatic Feed Links

    add_theme_support('automatic-feed-links');



    // Theme Features: woocommerce

    add_theme_support( 'woocommerce' );



    // Theme Features: Dynamic Sidebar

    add_post_type_support( 'post', 'simple-page-sidebars' );





    // Theme Features: Post Thumbnails and custom image sizes for post-thumbnails

    add_theme_support('post-thumbnails', array('post', 'page','product','portfolio'));



    // Theme Features: Post Formats

    add_theme_support('post-formats', array( 'gallery', 'image', 'link', 'quote', 'video', 'audio'));





    

}

add_action('after_setup_theme', 'kerna_setup');





function kerna_widgets_setup() {



    global $kerna_options;

    // Widget areas

    if (function_exists('register_sidebar')) :

        // Sidebar right

        register_sidebar(array(

            'name' => "Blog Sidebar",

            'id' => "kerna-widgets-aside-right",

            'description' => __('Widgets placed here will display in the right sidebar', 'kerna'),

            'before_widget' => '<div id="%1$s" class="widget %2$s">',

            'after_widget'  => '</div>',

             'before_title' =>' <div class="widget-title"><h3>',

             'after_title'  => '</h3></div>',

                            



        ));



        // Woocommerce sidebar

        register_sidebar(array(

            'name' => "WooCommerce Sidebar",

            'id' => "kerna-widgets-woocommerce-sidebar",

            'description' => __('Widgets placed here will display in the product page sidebar', 'kerna'),

            'before_widget' => '<div id="%1$s" class="widget %2$s">',

            'after_widget'  => '</div>',

            'before_title' =>' <div class="widget-title"><h3>',

            'after_title'  => '</h3></div>',

        ));

        // Footer Block 1

        register_sidebar(array(

            'name' => "Footer Block 1",

            'id' => "kerna-widgets-footer-block-1",

            'description' => __('Widgets placed here will display in the first footer block', 'kerna'),

            'before_widget' => '<div  id="%1$s" class="widget wow fadeIn %2$s">',

            'after_widget'  => '</div>',

            'before_title' =>' <div class="widget-title"><h3>',

             'after_title'  => '</h3></div>',

             

                            

        ));

        // Footer Block 2

        register_sidebar(array(

            'name' => "Footer Block 2",

            'id' => "kerna-widgets-footer-block-2",

            'description' => __('Widgets placed here will display in the second footer block', 'kerna'),

            'before_widget' => '<div  id="%1$s" class="widget wow fadeIn %2$s">',

            'after_widget'  => '</div>',

            'before_title' =>' <div class="widget-title"><h3>',

            'after_title'  => '</h3></div>',

        ));

        // Footer Block 3

        if(isset($kerna_options['footer-layout']) && esc_attr($kerna_options['footer-layout'])>5) {

        register_sidebar(array(

            'name' => "Footer Block 3",

            'id' => "kerna-widgets-footer-block-3",

            'description' => __('Widgets placed here will display in the third footer block', 'kerna'),

             'before_widget' => '<div  id="%1$s" class="widget wow fadeIn %2$s">',

            'after_widget'  => '</div>',

            'before_title' =>' <div class="widget-title"><h3>',

            'after_title'  => '</h3></div>',

        ));

        }



        // Footer Block 4

        if(isset($kerna_options['footer-layout']) && esc_attr($kerna_options['footer-layout'])>9) {

        register_sidebar(array(

            'name' => "Footer Block 4",

            'id' => "kerna-widgets-footer-block-4",

            'description' => __('Widgets placed here will display in the third footer block', 'kerna'),

             'before_widget' => '<div  id="%1$s" class="widget wow fadeIn %2$s">',

            'after_widget'  => '</div>',

            'before_title' =>' <div class="widget-title"><h3>',

            'after_title'  => '</h3></div>',

        ));

        }

       

    endif;

   

}

add_action('widgets_init', 'kerna_widgets_setup');





// The excerpt "more" button

function kerna_excerpt($text) {

    return str_replace('[&hellip;]', '[&hellip;]<a class="" title="'. sprintf (__('Read more on %s','kerna'), get_the_title()).'" href="'.get_permalink().'">' . __(' Read more','kerna') . '</a>', $text);

}

add_filter('the_excerpt', 'kerna_excerpt');



// wp_title filter

function kerna_title( $title, $sep ) {

  global $paged, $page;



  if ( is_feed() ) {

    return $title;

  } // end if



  // Add the site name.

  $title .= get_bloginfo( 'name' );



  // Add the site description for the home/front page.

  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {

    $title = "$title $sep $site_description";

  } // end if



  // Add a page number if necessary.

  if ( $paged >= 2 || $page >= 2 ) {

    $title = sprintf( __( 'Page %s', 'kerna' ), max( $paged, $page ) ) . " $sep $title";

  } // end if



  return $title;



} // end mayer_wp_title

add_filter( 'wp_title', 'kerna_title', 10, 2 );



/*********************************************************************

 * Function to load all theme assets (scripts and styles) in header

 */

function kerna_load_theme_assets() {



    global $kerna_options;



    // Do not know any method to enqueue a script with conditional tags!

    echo '

    <!--[if lt IE 9]>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>

   <![endif]-->

    

    <!--[if IE]>

        <link rel="stylesheet" href="'.get_template_directory_uri().'/assets/css/ie.css" media="screen" type="text/css" />

        <![endif]-->



    ';



    //Enqueue google fonts 

    wp_enqueue_style('googleapis', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic');

    wp_enqueue_style('googlefont-Raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900');

    wp_enqueue_style('googlefont-italic', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic');



    // Enqueue all the theme CSS

    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');

    wp_enqueue_style('eleganticons', get_template_directory_uri().'/assets/css/eleganticons.css');  

    wp_enqueue_style('stroke-font', get_template_directory_uri().'/assets/css/stroke-font.css');

    wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/assets/css/prettyPhoto.css');    

    wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.min.css');   

    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl-carousel.css');

    wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.css');

    wp_enqueue_style('rs-plugin', get_template_directory_uri().'/assets/rs-plugin/css/settings.css');

    wp_enqueue_style('custom', get_template_directory_uri().'/assets/css/custom.css');

    if(isset($kerna_options['dark_layout']) && $kerna_options['dark_layout']==1):

        wp_enqueue_style('dark', get_template_directory_uri().'/assets/css/dark.css');

    endif;

   

   // Enqueue all the js files of theme

    wp_enqueue_script('google-map', 'http://maps.google.com/maps/api/js?sensor=false');   

    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap.min', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), FALSE, TRUE);   

    wp_enqueue_script('retina', get_template_directory_uri().'/assets/js/retina.js', array(), FALSE, TRUE);

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri().'/assets/js/owl.carousel.js', array(), FALSE, TRUE);

    wp_enqueue_script('progress-js', get_template_directory_uri().'/assets/js/progress.js', array(), FALSE, TRUE);

    wp_enqueue_script('parallax-js', get_template_directory_uri().'/assets/js/parallax.js', array(), FALSE, TRUE);   

    wp_enqueue_script('wow-js', get_template_directory_uri().'/assets/js/wow.js', array(), FALSE, TRUE);

    wp_enqueue_script('prettyPhoto-js', get_template_directory_uri().'/assets/js/jquery.prettyPhoto.js', array(), FALSE, TRUE);

    wp_enqueue_script('fitvids', get_template_directory_uri().'/assets/js/jquery.fitvids.js', array(), TRUE, TRUE);     

    wp_enqueue_script('jquery.themepunch.tools.min-js', get_template_directory_uri().'/assets/rs-plugin/js/jquery.themepunch.tools.min.js', array(), FALSE, TRUE);

    wp_enqueue_script('jquery.themepunch.revolution.min-js', get_template_directory_uri().'/assets/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), FALSE, TRUE);

    wp_enqueue_script('isotope-js', get_template_directory_uri().'/assets/js/isotope.js', array(), FALSE, TRUE);  

    wp_enqueue_script('portfolio4-js', get_template_directory_uri().'/assets/js/portfolio4.js', array(), FALSE, TRUE);  

    wp_enqueue_script('masonry-js', get_template_directory_uri().'/assets/js/masonry.js', array(), FALSE, TRUE);

    wp_enqueue_script('fitvids-js', get_template_directory_uri().'/assets/js/jquery.fitvids.js', array(), FALSE, TRUE);

    wp_enqueue_script('circle-js', get_template_directory_uri().'/assets/js/circle.js', array(), FALSE, TRUE);

    wp_enqueue_script('circle-progress-js', get_template_directory_uri().'/assets/js/circle-progress.js', array(), FALSE, TRUE);

    wp_enqueue_script('custom-js', get_template_directory_uri().'/assets/js/custom.js', array(), FALSE, TRUE);



    $color_variation ='';

    if(isset($kerna_options['custom_color_primary']) && $kerna_options['custom_color_primary']!=''){

    $main_custom_color_primary= esc_attr($kerna_options['custom_color_primary']);



    } else {

    $main_custom_color_primary= "#45b29d";

    }

    if(isset($kerna_options['custom_color_secondary']) && $kerna_options['custom_color_secondary']!=''){

    $main_custom_color_secondary= esc_attr($kerna_options['custom_color_secondary']);



    } else {

    $main_custom_color_secondary= "#df494a";

    }

    

          $hex_primary = str_replace("#", "", esc_attr($main_custom_color_primary));



           if(strlen($hex_primary) == 3) {

              $r = hexdec(substr($hex_primary,0,1).substr($hex_primary,0,1));

              $g = hexdec(substr($hex_primary,1,1).substr($hex_primary,1,1));

              $b = hexdec(substr($hex_primary,2,1).substr($hex_primary,2,1));

           } else {

              $r = hexdec(substr($hex_primary,0,2));

              $g = hexdec(substr($hex_primary,2,2));

              $b = hexdec(substr($hex_primary,4,2));

           }

            $new_custom_color_primary= array($r, $g, $b);



            $hex_secondary = str_replace("#", "", esc_attr($main_custom_color_secondary));



           if(strlen($hex_secondary) == 3) {

              $r1 = hexdec(substr($hex_secondary,0,1).substr($hex_secondary,0,1));

              $g1 = hexdec(substr($hex_secondary,1,1).substr($hex_secondary,1,1));

              $b1 = hexdec(substr($hex_secondary,2,1).substr($hex_secondary,2,1));

           } else {

              $r1 = hexdec(substr($hex_secondary,0,2));

              $g1 = hexdec(substr($hex_secondary,2,2));

              $b1 = hexdec(substr($hex_secondary,4,2));

           }

            $new_custom_color_secondary= array($r1, $g1, $b1);



     $color_variation='

        .colorgreen,

        .rating i,

        .custom li:before,

        .widget_categories li:before,.widget_pages li:before,

        .widget_archive li:before,

        .widget_pages li:before,

        .widget_meta li:before,

        .widget_recent_comments li:before,

        .widget_nav_menu li:before,

        .custom1 li:hover:before,

        .custom3 li:hover:before,

        .sharebuttons a i,

        .icon-container,

        .yamm .dropdown-menu li a:hover,

        .yamm .dropdown-menu li a:focus,

        .dropdown-menu > li > a:hover,

        .dropdown-menu > li > a:focus,

        .navbar-nav > li > a:hover,

        .navbar-nav > li > a:focus,

        .navbar-nav > li > a.active,

        .navbar-nav > li > a:active,

        .servicebox i,

        .service-one i,

        .owl-desc i {

            color: '.$main_custom_color_primary.';

        }



        .normalquote small,

        .colorred,

        .shop-button .input-group .btn-default,

        .tags-widget a:hover,

        .custom li:hover:before,

        .widget_categories li:hover:before,.widget_pages li:hover:before,

        .widget_nav_menu li:hover:before,

        .widget_archive li:hover:before,

        .widget_pages li:hover:before,

        .widget_meta li:hover:before,

        .widget_recent_comments li:hover:before,

        .big-contact i,

        .check li:before,

        .statwrap i {

            color: '.$main_custom_color_secondary.';

        }



        .pricing-circle,

        .dropdown-menu > li > .btn:hover,

        .panel-heading:hover,

        .stylish-input-group .input-group-addon {

            background: '.$main_custom_color_primary.' !important;

            border-color: '.$main_custom_color_primary.' !important;

            color:#ffffff !important;

        }





        #payment label:hover,

        .shoptable .table > thead > tr > th,

        .shop-button .input-group .btn-default:hover,

        .pager li a:hover,

        .portfolio-container.image-hover-red .portfolio-item:hover .portfolio-image:after,

        .portfolio-filtering a.active,

        .portfolio-filtering a:hover,

        .portfolio-filtering a:focus,

        .post-type,

        .welcome .btn-primary {

            background-color: '.$main_custom_color_primary.';

            border-color: '.$main_custom_color_primary.' !important;

        }



        .pricingbox:hover,

        .ourprocesswidget:hover .icon-container,

        #teamcarousel .magnifier,

        .classic-item .magnifier,

        .service-style-1:hover .icon-container,

        .slider-btn .btn-primary,

        .tp-caption.slider-btn .btn-primary,

        .servicebox:hover,

        .service:hover i,

        .portfolio-filter ul li a.active,

        .portfolio-filter ul li a:hover,

        .service-one.active,

        .service-one:hover,

        .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,

        .btn-primary,

        .wpcf7 input.btn-primary,

        .backtotop {

            background-color: '.$main_custom_color_secondary.';

        }

        .longdesc blockquote,

        .comment-list blockquote,

        .customquote,

        .ourprocesswidget:hover .icon-container,

        .section-title hr,

        .service-style-1:hover .icon-container,

        .slider-btn .btn-primary,

        .tp-caption.slider-btn .btn-primary,

        .servicebox:hover,

        .service:hover h3,

        .service:hover i,

        .portfolio-filter ul li a.active,

        .portfolio-filter ul li a:hover,

        .service-one.active,

        .service-one:hover,

        .section-title-2 hr,

        .form-control:focus,

        .wpcf7 input:focus, 

        .wpcf7 textarea:focus,

        .btn-primary,

        .wpcf7 input.btn-primary{

            border-color: '.$main_custom_color_secondary.';

        }



        .classic-shop .magnifier {

            background-color:rgba('.$new_custom_color_secondary['0'].','.$new_custom_color_secondary['1'].','.$new_custom_color_secondary['2'].'0.9);

        }

        .red-type,

        .colorfulservices {

            background-color: '.$main_custom_color_secondary.';

            border-color:'.$main_custom_color_primary.';

        }

        .style_2 .service:hover .sow-icon-fontawesome,

        .style_2 .service:hover .sow-icon-genericons,

        .style_2 .service:hover .sow-icon-icomoon,

        .style_2 .service:hover .sow-icon-elegantline,

        .style_2 .service:hover .sow-icon-typicons{



          background-color:'.$main_custom_color_secondary.'!important;

          border-color:'.$main_custom_color_secondary.' !important;

          color: #fff!important;



        }

    ';





    wp_add_inline_style( 'custom', $color_variation );

    

}

add_action('wp_enqueue_scripts', 'kerna_load_theme_assets');





/*********************************************************************

 * RETINA SUPPORT

 */

add_filter('wp_generate_attachment_metadata', 'kerna_retina_support_attachment_meta', 10, 2);

function kerna_retina_support_attachment_meta($metadata, $attachment_id) {



    // Create first image @2

    kerna_retina_support_create_images(get_attached_file($attachment_id), 0, 0, false);



    foreach ($metadata as $key => $value) {

        if (is_array($value)) {

            foreach ($value as $image => $attr) {

                if (is_array($attr))

                    kerna_retina_support_create_images(get_attached_file($attachment_id), $attr['width'], $attr['height'], true);

            }

        }

    }



    return $metadata;

}



function kerna_retina_support_create_images($file, $width, $height, $crop = false) {



    $resized_file = wp_get_image_editor($file);

    if (!is_wp_error($resized_file)) {



        if ($width || $height) {

            $filename = $resized_file->generate_filename($width . 'x' . $height . '@2x');

            $resized_file->resize($width * 2, $height * 2, $crop);

        } else {

            $filename = str_replace('-@2x','@2x',$resized_file->generate_filename('@2x'));

        }

        $resized_file->save($filename);



        $info = $resized_file->get_size();



        return array(

            'file' => wp_basename($filename),

            'width' => $info['width'],

            'height' => $info['height'],

        );

    }



    return false;

}



add_filter('delete_attachment', 'kerna_delete_retina_support_images');

function kerna_delete_retina_support_images($attachment_id) {

    $meta = wp_get_attachment_metadata($attachment_id);

    if(is_array($meta)){

        $upload_dir = wp_upload_dir();

        $path = pathinfo($meta['file']);



        // First image (without width-height specified

        $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . wp_basename($meta['file']);

        $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));

        if (file_exists($retina_filename)) unlink($retina_filename);



        foreach ($meta as $key => $value) {

            if ('sizes' === $key) {

                foreach ($value as $sizes => $size) {

                    $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];

                    $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));

                    if (file_exists($retina_filename))

                        unlink($retina_filename);

                }

            }

        }

    }

}



// Enqueue comment-reply script if comments_open and singular

function kerna_enqueue_comment_reply() {

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

                wp_enqueue_script( 'comment-reply' );

        }

}

add_action( 'wp_enqueue_scripts', 'kerna_enqueue_comment_reply' );





// Kerna Pagination



function kerna_pagination ($before = '', $after = '') {



    global $kerna_options;

    echo esc_attr($before);  

     

        global $wpdb, $wp_query;

        $request = $wp_query->request;

        $posts_per_page = intval(get_query_var('posts_per_page'));

        $paged = intval(get_query_var('paged'));

        $numposts = $wp_query->found_posts;

        $max_page = $wp_query->max_num_pages;

     

        if ($numposts <= $posts_per_page) return;

        if (empty($paged) || $paged == 0) $paged = 1;

        $pages_to_show=7;

        $pages_to_show_minus_1 = $pages_to_show - 1;

        $half_page_start = floor($pages_to_show_minus_1 / 2);

        $half_page_end = ceil($pages_to_show_minus_1 / 2);

        $start_page = $paged - $half_page_start;



        if ($start_page <= 0) $start_page = 1;

        $end_page = $paged + $half_page_end;

        if (($end_page - $start_page) != $pages_to_show_minus_1) {

            $end_page = $start_page + $pages_to_show_minus_1;

        }

        if ($end_page > $max_page) {

            $start_page = $max_page - $pages_to_show_minus_1;

            $end_page = $max_page;

        }

        if ($start_page <= 0) $start_page = 1;

       

        echo ' <nav>';

        echo ' <ul class="pager">';

        $var=$paged;

        if($paged!=$start_page)

            echo ( '<li class="previous"><a href="'.get_pagenum_link(--$var).'" ><span aria-hidden="true">&larr;</span>Older</a></li>' );

        else

            echo ( '<li class=" previous disabled"><a href="#" ><span aria-hidden="true">&larr;</span>Older</a></li>' );       

        $var2=$paged;

        if($paged==$end_page)   

            echo ( '<li class=" next disabled"> <a href="#" >Newer<span aria-hidden="true">&rarr;</span></a></li>' );

        else

            echo ( '<li class="next"><a href="'.get_pagenum_link(++$var2).'" >Newer<span aria-hidden="true">&rarr;</span></a></li>' );

        echo '</ul>';

        echo '</nav>';

    echo esc_attr($after);



    return ;

}









/* Code for font-awesome support in Menu*/



add_action('wp_update_nav_menu_item', 'kerna_nav_update',10, 3);

function kerna_nav_update($menu_id, $menu_item_db_id, $args ) {

   if (isset($_REQUEST['menu-item-faicon']) ) {

     $custom_faicon= $_REQUEST['menu-item-faicon'][$menu_item_db_id];

     update_post_meta( $menu_item_db_id, '_menu_item_faicon', $custom_faicon);  

     }



}

add_filter( 'wp_setup_nav_menu_item','kerna_nav_item' );



function kerna_nav_item($menu_item) {

$menu_item->faicon = get_post_meta( $menu_item->ID, '_menu_item_faicon', true );  

return $menu_item;

}







Class Description_Walker extends Walker_Nav_Menu {



    function start_lvl( &$output , $depth = 0 , $args = array() ) {

        $indent = str_repeat( "\t", $depth );

        $output .= "\n$indent<ul class=\"dropdown-menu \" role=\"menu\">\n";

    }



    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)

    {

        // check, whether there are children for the given ID and append it to the element with a (new) ID

        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);



        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

    }



   function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)

      {

           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



           $class_names = $value = '';



           $classes = empty( $item->classes ) ? array() : (array) $item->classes;



           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

          

           $class_names = ' '. esc_attr( $class_names ) . '';

           

           $output .= $indent . '<li >';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend='';

          

           $append = '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

          



            $item_output = $args->before;

            if($item->hasChildren){

                $item_output .='<li class="dropdown">';

                $item_output .= '<a class="dropdown-toggle '.esc_attr( $class_names ).'" data-toggle="dropdown"'. $attributes .'>';

            } else {

                $item_output .= '<a class="'.esc_attr( $class_names ).'" '. $attributes .'>';

            }

            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;

            $item_output .= $description.$args->link_after;

            $item_output .= '</a>';

            $item_output .= $args->after;

       

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );







            }



}



Class Footer_Description_Walker extends Walker_Nav_Menu {



    function start_lvl( &$output , $depth = 0 , $args = array() ) {

        $indent = str_repeat( "\t", $depth );

        $output .= "\n$indent<ul class=\"dropdown-menu \" role=\"menu\">\n";

    }



    



   function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)

      {

           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



           $class_names = $value = '';



           $classes = empty( $item->classes ) ? array() : (array) $item->classes;



           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

          

           $class_names = ' '. esc_attr( $class_names ) . '';

           

           $output .= $indent . '<li >';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend='';

          

           $append = '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

          



            $item_output = $args->before;

            if($depth<1){

                $item_output .= '<a class="'.esc_attr( $class_names ).'" '. $attributes .'>';

            } else {

                $item_output .= '<a class="'.esc_attr( $class_names ).'" '. $attributes .'>';

            }

            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;

            $item_output .= $description.$args->link_after;

            $item_output .= '</a>';

            

            $item_output .= $args->after;

       

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );



            }



}









function kerna_body_classes( $classes ) {

    if (!is_page_template('kerna-page-builder.php') ) :

    $classes[] = 'multipage';

    endif;  

    return $classes;

}

add_filter( 'body_class', 'kerna_body_classes' );







add_action( 'tgmpa_register', 'kerna_register_required_plugins' );



function kerna_register_required_plugins() {

 



    $plugins = array(

 

        array(

            'name'               => 'SiteOrigin Panel', // The plugin name.

            'slug'               => 'siteorigin-panels', // The plugin slug (typically the folder name).

            'source'             => get_stylesheet_directory() . '/inc/plugins/siteorigin-panels.zip', // The plugin source.

            'required'           => true, // If false, the plugin is only 'recommended' instead of required.

            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.

            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.

            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.

            'external_url'       => '', // If set, overrides default API URL and points to an external URL.

        ),

        array(

            'name'               => 'Contact Form 7', // The plugin name.

            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).

            'required'           => false,

        ), 

        array(

            'name'               => 'SiteOrigin Bundle', // The plugin name.

            'slug'               => 'so-widgets-bundle', // The plugin slug (typically the folder name).

            'source'             => get_stylesheet_directory() . '/inc/plugins/so-widgets-bundle.zip', // The plugin source.

            'required'           => true, // If false, the plugin is only 'recommended' instead of required.

            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.

            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.

            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.

            'external_url'       => '', // If set, overrides default API URL and points to an external URL.

        ),  



        array(

            'name'               => 'Theme Addons', // The plugin name.

            'slug'               => 'kerna-addons', // The plugin slug (typically the folder name).

            'source'             => get_stylesheet_directory() . '/inc/plugins/kerna-addons.zip', // The plugin source.

            'required'           => true, // If false, the plugin is only 'recommended' instead of required.

            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.

            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.

            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.

            'external_url'       => '', // If set, overrides default API URL and points to an external URL.

        ),  

        array(

            'name'               => 'MailChimp for WordPress', // The plugin name.

            'slug'               => 'mailchimp-for-wp', // The plugin slug (typically the folder name).

            'required'           => false,

        ),       





 

    );

 

    /**

     * Array of configuration settings. Amend each line as needed.

     * If you want the default strings to be available under your own theme domain,

     * leave the strings uncommented.

     * Some of the strings are added into a sprintf, so see the comments at the

     * end of each line for what each argument will be.

     */

    $config = array(

        'default_path' => '',                      // Default absolute path to pre-packaged plugins.

        'menu'         => 'tgmpa-install-plugins', // Menu slug.

        'has_notices'  => true,                    // Show admin notices or not.

        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.

        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.

        'is_automatic' => false,                   // Automatically activate plugins after installation or not.

        'message'      => '',                      // Message to output right before the plugins table.

        'strings'      => array(

            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),

            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),

            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.

            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),

            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).

            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).

            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).

            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).

            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).

            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).

            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).

            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).

            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),

            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),

            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),

            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),

            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.

            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.

        )

    );

 

    tgmpa( $plugins, $config );

 

}



/**

 * Configure the SiteOrigin page builder settings.

 * 

 * @param $settings

 * @return mixed

 */



function kerna_comment($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment;

    $class='';

    extract($args, EXTR_SKIP);



    if ( 'div' == $args['style'] ) {

        $tag = 'div';

        $add_below = 'comment';

    } else {

        $tag = 'li';

        $add_below = 'div-comment';

    }

?>

    <?php if($depth>1) $class='media comments-answer clearfix'; else $class='media clearfix';?>

    <<?php echo esc_attr($tag); ?> <?php comment_class( $class) ?>  id="comment-<?php comment_ID() ?>">      

    <?php if ( 'div' != $args['style'] ) : ?>

    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <?php if ( $args['avatar_size'] != 0 )?><a class="pull-left" href="#"><?php echo get_avatar( $comment, $args['avatar_size'] )?></a>

   <div class="media-body"> 

            <h4 class="media-heading"> <?php printf( __( '%s' ), get_comment_author_link() ); ?></h4>

             <p class="comment-meta"> <?php printf( __('%1$s . %2$s . ','kerna'), get_comment_date(),  get_comment_time('g:i A') ); ?>

             <?php if($args['max_depth']!=$depth):  ?>

             <?php comment_reply_link(array ('reply_text' => '<i class="arrow_left"></i>Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'])) ;

             endif;?>

              </p>   

            <?php if ($comment->comment_approved == '0') : ?>

            <em><?php _e('Your comment is awaiting moderation.') ?></em>

            <br />

            <?php endif; ?>  

            <?php comment_text(); ?>

            

        </div>

    <?php if ( 'div' != $args['style'] ) : ?>

    </div>

    <?php endif; ?>

    

<?php

}







add_filter('loop_shop_columns', 'kerna_product_loop_columns');

function kerna_product_loop_columns() {

    return 3; // 3 products per row

}



add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );





add_filter( 'cmb_meta_boxes', 'kerna_cmb_metaboxes' );



function kerna_cmb_metaboxes( array $meta_boxes ) {



    $prefix = 'kerna_';



     $meta_boxes['page_metabox'] = array(

        'id'         => 'page_metabox',

        'title'      => __( 'Kerna Page Settings', 'kerna' ),

        'pages'      => array( 'page', ), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(



            array(

                'name' => 'Activate Page Title ',

                'desc' => 'Do you want to enable inner page settings.',

                'id' => $prefix . 'pagetitle_activate',

                'type' => 'checkbox'

            ),



            array(

                'name'    => __( 'Page Title', 'kerna' ),

                'id'      => $prefix . 'pagetitle_text',

                'type'    => 'text',

            ),

           

           array(

                'name' => __( 'Page tite Background', 'kerna' ),

                'desc' => __( 'Upload an image or enter a URL.', 'kerna' ),

                'id'   => $prefix . 'pagetitle_image',

                'type' => 'file',

            ),

           array(

                'name' =>  __( 'No social icons?', 'kerna' ),

                'desc' => 'Donot display social icons on footer area',                

                'id' => $prefix . 'social_icons',

                'type' => 'checkbox'

            ), 



         array(

            'name' =>  __( 'Display social icons below footer?', 'kerna' ),

            'desc' => 'Shows Icons below footer',

            'id' => $prefix . 'pagetitle_social_icons',

            'type' => 'checkbox'

            ),     

        )

    );



 

    $meta_boxes['menu_metabox'] = array(

        'id'         => 'menu_metabox',

        'title'      => __( 'Menu Option', 'kerna' ),

        'pages'      => array( 'page', ), // Post type

        'context'    => 'side',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(

            array(

                'name'     => __( 'Menus', 'kerna' ),

                'desc'     => __( 'Select menu for this page', 'kerna' ),

                'id'       => $prefix . 'menu_select',

                'type'     => 'taxonomy_select',

                'taxonomy' => 'nav_menu', // Taxonomy Slug

                'default' => 'kerna-main-menu',

            ),

        )

    );

    $meta_boxes['details_meox'] = array(

        'id'         => 'details_meox',

        'title'      => __( 'Porject Details', 'kerna' ),

        'pages'      => array( 'portfolio', ), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(

            array(

                'name'     => __( 'Client', 'kerna' ),

                'desc'     => __( '', 'kerna' ),

                'id'       => $prefix . 'add_name',

                'type'     => 'text',

                 ),

            

             array(

                'name'     => __( 'Release Date', 'kerna' ),

                'desc'     => __( 'Add release date of project', 'kerna' ),

                'id'       => $prefix . 'add_releasedate',

                'type' => 'text_date',                

                

            ),

            array(

                'name'     => __( 'URL', 'kerna' ),

                'desc'     => __( 'Add url ', 'kerna' ),

                'id'       => $prefix . 'add_url',

                'type' => 'text',               

            ),

            array(

                'name'     => __( 'Designed By', 'kerna' ),

                'desc'     => __( 'Add designed by', 'kerna' ),

                'id'       => $prefix . 'add_designedby',

                'type' => 'text',               

            ),

        )

    );



    return $meta_boxes;

}



function woocommerce_header_add_to_cart_fragment( $fragments ) {

    global $woocommerce;

    ob_start();

    ?>

    <li class="dropdown cartbutton"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon_cart_alt"></i><small><?php echo sprintf(_n('%d Item', '%d Items', $woocommerce->cart->cart_contents_count, 'kerna'), $woocommerce->cart->cart_contents_count); ?></small></a>

        <ul class="dropdown-menu topcart" role="menu">

            <li>

                <table>

                    <tbody>                                        

                         <?php  if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :

                            $_product = $cart_item['data'];                                            

                            if ($_product->exists() && $cart_item['quantity']>0) :                                                                                 

                                echo '<tr><td class="image"><a href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image('cart_item_image_size').'</a></td>';                                                    

                                echo '<td class="name">';

                                    $kerna_product_title = $_product->get_title();

                                    $kerna_short_product_title = (strlen($kerna_product_title) > 28) ? substr($kerna_product_title, 0, 25) . '...' : $kerna_product_title;

                                    echo '<a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $kerna_short_product_title, $_product) . '</a>';

                                    echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );

                                    echo ( $sku = $_product->get_sku() ) ? $sku : __( '-N/A', 'woocommerce' );

                                echo '</td>';

                                echo '<td class="remove">';

                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', $woocommerce->cart->get_remove_url( $cart_item_key ), __('Remove this item', 'kerna') ), $cart_item_key );

                                echo '</td>';                                                                               

                            endif;                                        

                        endforeach;                                                                       

                        else: echo '<tr><td class="empty">'.__('No products in the cart.','woothemes').'</td> </tr>'; endif;  ?>                                           

                       

                    </tbody>

                </table>

                <table>

                    <tbody>

                        <tr> 

                            <td><b><?php _e('Sub-Total:', 'kerna'); ?></b></td>

                            <td><?php echo $woocommerce->cart->get_cart_total(); ?></td>

                        </tr>

                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>

                            <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">

                              <td><b><?php echo $tax->label ; ?></b></td>

                              <td><?php echo $tax->formatted_amount ; ?></td>

                            </tr>

                          <?php endforeach; ?>

                       

                        <tr>

                            <td><b><?php _e('Total:', 'kerna'); ?></b></td>

                            <td><?php wc_cart_totals_order_total_html(); ?></td>

                        </tr>

                    </tbody>

                </table>

                 <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="btn btn-block btn-primary btn-sm"><?php _e('Checkout', 'kerna'); ?></a>

       

            </li>

        </ul>

    </li> 

    <?php

    $fragments['div.kerna_dynamic_shopping_bag' ] = ob_get_clean();

    return $fragments;



}



function removeDemoModeLink() {

    if ( class_exists('ReduxFrameworkPlugin') ) {

        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );

    }

    if ( class_exists('ReduxFrameworkPlugin') ) {

        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    

    }

}



add_action( 'init', 'kerna_initialize_cmb_meta_boxes', 9999 );

/**

 * Initialize the metabox class.

 */

function kerna_initialize_cmb_meta_boxes() {



    if ( ! class_exists( 'cmb_Meta_Box' ) )

        require_once 'inc/cmb/init.php';



}



add_filter( 'woocommerce_enqueue_styles', '__return_false' );



function kerna_detect_woocommerce()

{

    global $post;

    if ( has_shortcode( $post->post_content, 'woocommerce_cart' ) || has_shortcode( $post->post_content, 'woocommerce_my_account' ) || has_shortcode( $post->post_content, 'woocommerce_checkout' ))

    {

        return true;

    } 

    return false;

}



function kerna_breadcrumbs() {

 

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

  $delimiter = '  /  '; // delimiter between crumbs

  $home = 'Home'; // text for the 'Home' link

  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show

  $before = '<span class="active">'; // tag before the current crumb

  $after = '</span>'; // tag after the current crumb

 

  global $post;

  $homeLink = home_url();

 ?>

  

 <?php 

echo '<li>';



  if (is_home() || is_front_page()) {

 

    if ($showOnHome == 1) echo '<a href="' . $homeLink . '">' . $home . '</a>';

 

  } else {

 

    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

 

    if ( is_category() ) {

      $thisCat = get_category(get_query_var('cat'), false);

      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');

      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

 

    } elseif ( is_search() ) {

      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

 

    } elseif ( is_day() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';

      echo $before . get_the_time('d') . $after;

 

    } elseif ( is_month() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo $before . get_the_time('F') . $after;

 

    } elseif ( is_year() ) {

      echo $before . get_the_time('Y') . $after;

 

    } elseif ( is_single() && !is_attachment() ) {

      if ( get_post_type() != 'post' ) {

        $post_type = get_post_type_object(get_post_type());

        $slug = $post_type->rewrite;

        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';

        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

      } else {

        $cat = get_the_category(); $cat = $cat[0];

        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);

        echo $cats;

        if ($showCurrent == 1) echo $before . get_the_title() . $after;

      }

 

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

      $post_type = get_post_type_object(get_post_type());

      echo $before . $post_type->labels->singular_name . $after;

 

    } elseif ( is_attachment() ) {

      $parent = get_post($post->post_parent);

      $cat = get_the_category($parent->ID); $cat = $cat[0];

      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

 

    } elseif ( is_page() && !$post->post_parent ) {

      if ($showCurrent == 1) echo $before . get_the_title() . $after;

 

    } elseif ( is_page() && $post->post_parent ) {

      $parent_id  = $post->post_parent;

      $breadcrumbs = array();

      while ($parent_id) {

        $page = get_page($parent_id);

        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';

        $parent_id  = $page->post_parent;

      }

      $breadcrumbs = array_reverse($breadcrumbs);

      for ($i = 0; $i < count($breadcrumbs); $i++) {

        echo $breadcrumbs[$i];

        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';

      }

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

 

    } elseif ( is_tag() ) {

      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

 

    } elseif ( is_author() ) {

       global $author;

      $userdata = get_userdata($author);

      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

 

    } elseif ( is_404() ) {

      echo $before . 'Error 404' . $after;

    }

 

    if ( get_query_var('paged') ) {

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';

      echo __('Page') . ' ' . get_query_var('paged');

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

    }

 

    echo '</li>';?>

   

    <?php

 

  }

} // end kerna_breadcrumbs()



/*

* Creating a function to create our CPT Portfolio

*/







function new_excerpt_more( $more ) {

    return '...';

}

add_filter('excerpt_more', 'new_excerpt_more');



/* Code for Image slider widget*/



class WP_Widget_Slide_Image_Kerna extends WP_Widget {

    /**

     * Sets up the widgets name etc

     */

    function __construct() {

         $widget_ops = array('classname' => 'Image Slider', 'description' => __( "Display slideshow of images.","flatty") );

        parent::__construct('slide_image_widget', __('Image Slider (Kerna)','kerna'), $widget_ops);

        $this->alt_option_name = 'slide_image';



    }



    

    public function widget( $args, $instance ) {

         $cache = wp_cache_get('slide_image', 'widget');



        if ( !is_array($cache) )

            $cache = array();



        if ( ! isset( $args['widget_id'] ) )

            $args['widget_id'] = $this->id;



        if ( isset( $cache[ $args['widget_id'] ] ) ) {

            echo esc_attr($cache[ $args['widget_id'] ]);

            return;

        }



        ob_start();

        extract($args);

        $title='';

        $image1='';

        $image2='';

        $image3='';

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $image1 = apply_filters( 'image1', empty( $instance['image1'] ) ? '' : $instance['image1'], $instance, $this->id_base );

        $image2 = apply_filters( 'image2', empty( $instance['image2'] ) ? '' : $instance['image2'], $instance, $this->id_base );

        $image3 = apply_filters( 'image3', empty( $instance['image3'] ) ? '' : $instance['image3'], $instance, $this->id_base );

?>

         <div class="widget wow fadeIn ">

                     <?php if ( ! empty( $title )) {



                        echo $args['before_title']; ?><?php echo $instance['title']?> <?php echo $args['after_title'];

                     } 

                    if ( ! empty( $title )) {?>

                        <div class="sidebar-slider">

                            <div class="sidslide">

                                <?php if ( ! empty( $title )) :?>

                                <img src="<?php echo esc_url($instance['image1']);?>" alt="">

                                <?php endif;?>

                            </div>

                            <div class="sidslide">

                               <?php if ( ! empty( $title )) :?>

                               <img src="<?php echo esc_url($instance['image2']);?>" alt="">

                                <?php endif;?>

                            </div>

                            <div class="sidslide">

                               <?php if ( ! empty( $title )) :?>

                               <img src="<?php echo esc_url($instance['image3']);?>" alt="">

                               <?php endif;?>

                            </div>

                        </div>

                    

                     <?php }

                    // Reset the global $the_post as this query will have stomped on it

                    wp_reset_postdata();    

                    ?>        

                    <?php  $content = ob_get_clean();

                    wp_cache_set('slide_widget', $cache, 'widget');

                    echo wp_kses_post($content);?>

                   

       </div> 

    

    <?php }



    

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '','image1'=>'','image2'=>'','image3'=>'' ) );

        $title = strip_tags($instance['title']);

        $image1    = strip_tags($instance['image1']);

        $image2    = strip_tags($instance['image2']);

        $image3    = strip_tags($instance['image3']);      

        

?>

        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'image1' )); ?>"><?php _e( 'First Image Url:','flatty' ); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image1' )); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'image2' )); ?>"><?php _e( 'Second Image Url:','flatty' ); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image2' )); ?>" type="text" value="<?php echo esc_attr($image2); ?>"  /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'image3' )); ?>"><?php _e( 'Third Image Url:','flatty' ); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image3' )); ?>" type="text" value="<?php echo esc_attr($image3); ?>"  /></p>

   

<?php

    

    

    }



    

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['image1'] = strip_tags($new_instance['image1']);

        $instance['image2'] = strip_tags($new_instance['image2']);

        $instance['image3'] = strip_tags($new_instance['image3']);      

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['slide_images']) )

            delete_option('slide_images');

            return $instance;

        

    }

 function flush_widget_cache() {



        wp_cache_delete('slide_image', 'widget');

    }

 

}

register_widget('WP_Widget_Slide_Image_Kerna');



/* Code for popular posts widget*/



class WP_Widget_Latest_Post_Kerna extends WP_Widget {

    /**

     * Sets up the widgets name etc

     */

    function __construct() {

         $widget_ops = array('classname' => 'Latest Post', 'description' => __( "Gives list of latest posts.","flatty") );

        parent::__construct('latest_post_widget', __('Latest Post(Kerna)','kerna'), $widget_ops);

        $this->alt_option_name = 'latest_post';



    }



    

    public function widget( $args, $instance ) {

         $cache = wp_cache_get('latest_post', 'widget');



        if ( !is_array($cache) )

            $cache = array();



        if ( ! isset( $args['widget_id'] ) )

            $args['widget_id'] = $this->id;



        if ( isset( $cache[ $args['widget_id'] ] ) ) {

            echo esc_attr($cache[ $args['widget_id'] ]);

            return;

        }



        ob_start();

        extract($args);

        $title='';

       

       

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $style = apply_filters( 'style', empty( $instance['style'] ) ? '' : $instance['style'], $instance, $this->id_base );

        

        $number = ( ! empty( $instance['number'] ) )? absint( $instance['number'] ) : 2;

         ?>

         <div class="widget wow fadeIn ">

         <?php if($number!=0):if ( ! empty( $title )) {



            echo $args['before_title']; ?><?php echo $instance['title']?> <?php echo $args['after_title'];

         } 

       ?>

        <div class="<?php if($style=='sidebar') echo'sidebar-list'; else echo 'recent-posts';?>">

         

          <?php

          $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

          if ($r->have_posts()) :

          ?><ul <?php if($style=='sidebar') echo'class="latest-posts"'; ?>>

            <?php while ( $r->have_posts() ) : $r->the_post(); ?>

                <li><?php if($style=='sidebar'):?>

                    <?php the_post_thumbnail('Latest-thumbnails',array('class'=>'alignleft','alt'=>'')); ?><a href="<?php echo the_permalink(); ?>">

                    <span><?php the_time('F j,  Y') ?></span>

                    <p><?php get_the_title() ? the_title() : the_ID(); ?></p></a>

                    <?php else:?>

                    <a href="<?php echo the_permalink(); ?>" title=""><?php get_the_title() ? the_title() : the_ID(); ?>

                    <span class="pull-right"><?php the_time('j  F   Y') ?></span></a>

                    <?php endif;?>

               </li>

              <?php endwhile; ?>

            </ul>

          <?php endif;?>

             

          </div>

        

        

         <?php

        // Reset the global $the_post as this query will have stomped on it

        wp_reset_postdata();    

        ?>           

     

        

        <?php  $content = ob_get_clean();

 

        wp_cache_set('latest_post', $cache, 'widget');

        echo wp_kses_post($content);?>

       

       </div>

        

    <?php endif;?>

    

    <?php }



    

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '','style'=>'sidebar' ) );

        $title = strip_tags($instance['title']);

        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 2;

        $style = $instance['style'];

        

?>

        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of products to show:','flatty' ); ?></label>

        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php _e( 'Style:','flatty' ); ?></label>

         <select id="<?php echo esc_attr($this->get_field_id('style')); ?>" name="<?php echo esc_attr($this->get_field_name('style')); ?>" > 

        <option <?php selected( $instance['style'], 'sidebar'); ?> value="sidebar"><?php _e('Sidebar style','kerna')?></option> 

        <option <?php selected( $instance['style'], 'footer'); ?> value="footer"><?php _e('Footer style','kerna')?></option> </select></p>

       

<?php

    

    

    }



    

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['style'] = strip_tags($new_instance['style']);

        $instance['number'] = (int) $new_instance['number'];        

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['latest_post']) )

            delete_option('latest_post');

            return $instance;

        

    }

 function flush_widget_cache() {



        wp_cache_delete('latest_post', 'widget');

    }

      

}

register_widget('WP_Widget_Latest_Post_Kerna');



/* Code for text and icons widget*/



class WP_Widget_Text_Kerna extends WP_Widget {

    /**

     * Sets up the widgets name etc

     */

    function __construct() {

         $widget_ops = array('classname' => 'Text and Icons', 'description' => __( "Display text with social icons.","flatty") );

        parent::__construct('text_widget', __('Text and Icons (Kerna)','kerna'), $widget_ops);

        $this->alt_option_name = 'text';



    }



    

    public function widget( $args, $instance ) {

        

        ob_start();

        extract($args);

        global $kerna_options;

        $imageurl = apply_filters( 'imageurl', empty( $instance['imageurl'] ) ? '' : $instance['imageurl'], $instance, $this->id_base );

        $text = apply_filters( 'text', empty( $instance['text'] ) ? '' : $instance['text'], $instance, $this->id_base );

        $check = $instance['check'] ? 'true' : 'false';

        echo $args['before_widget'];?>        

        

                     <?php if ( ! empty( $imageurl )) {?>

                        <img src="<?php echo esc_url($instance['imageurl']);?>" alt="" class="flogo">

                        

                    <?php  } 

                    if ( ! empty( $text )) {?>                        

                        <p><?php echo esc_attr($instance['text'])?></p>                   

                     <?php } if('on' == $instance['check'] ): ?>

                      <div class="topsocial clearfix">

                      <?php if (!empty($kerna_options['social_facebook'])) : ?>

                        <a class="facebook" href="<?php  echo esc_url($kerna_options['social_facebook']); ?>"  title="" target="_blank"><i class="social_facebook"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_twitter'])) : ?>

                        <a class="twitter" href="<?php  echo esc_url($kerna_options['social_twitter']); ?>"  title=""><i class="social_twitter"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_googlep'])) : ?>

                        <a class="google" href="<?php  echo esc_url($kerna_options['social_googlep']); ?>" title=""><i class="social_googleplus"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_rss'])) : ?>

                        <a class="rss" href="<?php  echo esc_url($kerna_options['social_rss']); ?>"  title=""><i class="social_rss"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_linkedin'])) : ?>

                        <a class="linkedin" href="<?php  echo esc_url($kerna_options['social_linkedin']); ?>"  title="" target="_blank"><i class="social_linkedin"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_instagram'])) : ?>

                        <a class="instagram" href="<?php  echo esc_url($kerna_options['social_instagram']); ?>"  title=""><i class="social_instagram"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_dribbble'])) : ?>

                        <a class="dribbble" href="<?php  echo esc_url($kerna_options['social_dribbble']); ?>" title=""><i class="social_dribbble"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_vimeo'])) : ?>

                        <a class="vimeo" href="<?php  echo esc_url($kerna_options['social_vimeo']); ?>"  title=""><i class="social_vimeo"></i></a>

                        <?php endif; ?><?php if (!empty($kerna_options['social_tumblr'])) : ?>

                        <a class="tumblr" href="<?php  echo esc_url($kerna_options['social_tumblr']); ?>" title=""><i class="social_tumblr"></i></a>

                        <?php endif; ?>                          

                        </div><!-- end right -->

                    <?php endif;?>      

                  

      

    <?php echo $args['after_widget']; }



    

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'imageurl' => '', 'text' => '','check' => 'on' ) );

        $imageurl = strip_tags($instance['imageurl']);

        $text    = esc_textarea($instance['text']);        

        $check = isset( $instance[ 'check' ] ) ? $instance[ 'check' ] : 'on';      

        

?>

        <p><label for="<?php echo esc_attr($this->get_field_id('imageurl')); ?>"><?php _e('Image Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('imageurl')); ?>" name="<?php echo esc_attr($this->get_field_name('imageurl')); ?>" type="text" value="<?php echo esc_attr($imageurl); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php _e('Text :'); ?></label>

        <textarea class="widefat" rows="8" cols="10" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>"><?php if (!empty($text)) echo esc_attr($text); ?></textarea>

        </p>

        

        <p><input class="checkbox" type="checkbox" <?php checked($instance['check'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('check')); ?>" name="<?php echo esc_attr($this->get_field_name('check')); ?>" /> 

        <label for="<?php echo esc_attr($this->get_field_id('check')); ?>"><?php _e('Display Social icons'); ?></label></p>

<?php

    

    

    }



    

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['imageurl'] = strip_tags($new_instance['imageurl']);

        $instance['text'] = strip_tags($new_instance['text']);

        $instance['check'] = $new_instance['check'];

        

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['texts']) )

            delete_option('texts');

            return $instance;

        

    }

 function flush_widget_cache() {



        wp_cache_delete('text', 'widget');

    }

 

}

register_widget('WP_Widget_Text_Kerna');





/* Code for Contact widget*/



class WP_Widget_Contact_Kerna extends WP_Widget {

    /**

     * Sets up the widgets name etc

     */

    function __construct() {

         $widget_ops = array('classname' => 'Contact', 'description' => __( "Display contact information.","flatty") );

        parent::__construct('contact_widget', __('Contact (Kerna)','kerna'), $widget_ops);

        $this->alt_option_name = 'contact';



    }



    

    public function widget( $args, $instance ) {

        $style='';

        ob_start();

        extract($args);

        

        $title = apply_filters( 'title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $address = apply_filters( 'address', empty( $instance['address'] ) ? '' : $instance['address'], $instance, $this->id_base );

        $phone = apply_filters( 'phone', empty( $instance['phone'] ) ? '' : $instance['phone'], $instance, $this->id_base );

        $email = apply_filters( 'email', empty( $instance['email'] ) ? '' : $instance['email'], $instance, $this->id_base );

        $contact_style = apply_filters( 'contact_style', empty( $instance['contact_style'] ) ? '' : $instance['contact_style'], $instance, $this->id_base );

        if($contact_style!='big-contact') echo $args['before_widget'];?>

        

         

            <?php if ( ! empty( $instance['title'] ) ) {

            echo $args['before_title'] . $instance['title']. $args['after_title'];

                }?>

            

            <div class="<?php echo esc_attr($contact_style);?>">

                <ul> <?php if ( ! empty( $instance['address'] ) ):?>

                    <li><i class="icon icon-House <?php if($contact_style=='big-contact') echo 'wow  fadeInLeft';?>"></i> <?php echo esc_attr($instance['address']);?></li>

                    <?php endif;?><?php if ( ! empty( $instance['phone'] ) ):?>

                    <li><i class="icon icon-Phone2 <?php if($contact_style=='big-contact') echo 'wow  fadeInLeft';?>"></i> <?php echo esc_attr($instance['phone']);?></li>

                    <?php endif;?><?php if ( ! empty( $instance['email'] ) ):?>

                    <li><i class="icon icon-Mail <?php if($contact_style=='big-contact') echo 'wow  fadeInLeft';?>"></i> <a href="mailto:<?php echo esc_attr($instance['email']);?>"><?php echo esc_attr($instance['email']);?></a></li>

                    <?php endif;?>

                </ul>

            </div><!-- end footer contact -->

      

    <?php  if($contact_style!='big-contact')  echo $args['after_widget'];

}



    

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'address' => '','phone' => '','email'=>'','contact_style'=>'footer-contact' ) );

        $title = strip_tags($instance['title']);

        $address    = strip_tags($instance['address']); 

        $phone    = strip_tags($instance['phone']); 

        $email    = strip_tags($instance['email']);

        $contact_style = $instance['contact_style'];?>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Address :'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" /></p>

        

        

        <p><label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php _e('Phone :'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" /></p>

        



        <p><label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('Email :'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id( 'contact_style' )); ?>"><?php _e( 'Style:','flatty' ); ?></label>

         <select id="<?php echo esc_attr($this->get_field_id('contact_style')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_style')); ?>" > 

        <option <?php selected( $instance['contact_style'], 'big-contact'); ?> value="big-contact"><?php _e('Builder style','kerna')?></option> 

        <option <?php selected( $instance['contact_style'], 'footer-contact'); ?> value="footer-contact"><?php _e('Footer style','kerna')?></option> </select></p>

    

    <?php

    }



    

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['address'] = strip_tags($new_instance['address']);

        $instance['phone'] = strip_tags($new_instance['phone']);

        $instance['email'] = strip_tags($new_instance['email']);

        $instance['contact_style'] = strip_tags($new_instance['contact_style']);

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['contact']) )

            delete_option('contact');

            return $instance;

        

    }

 function flush_widget_cache() {



        wp_cache_delete('contact', 'widget');

    }

 

}

register_widget('WP_Widget_Contact_Kerna');





/* Code for Contact widget*/



class WP_Widget_Images_Kerna extends WP_Widget {

    /**

     * Sets up the widgets name etc

     */

    function __construct() {

         $widget_ops = array('classname' => 'Images', 'description' => __( "Display list of images.","flatty") );

        parent::__construct('cimages_widget', __('Images (Kerna)','kerna'), $widget_ops);

        $this->alt_option_name = 'images';



    }



    

    public function widget( $args, $instance ) {

        

        ob_start();

        extract($args);

        

        $title = apply_filters( 'title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $image1    = ($instance['image1']); 

        $image2    = ($instance['image2']); 

        $image4    = ($instance['image4']); 

        $image5    = ($instance['image5']);

        $image6    = ($instance['image6']);

        $image3    = ($instance['image3']);

        echo $args['before_widget'];?>

        

         

            <?php if ( ! empty( $instance['title'] ) ) {

            echo $args['before_title'] . $instance['title']. $args['after_title'];

                }?>

            

            <div class="random-works">

                <ul class="list-inline">

                    <?php if(! empty( $instance['image1'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image1']);?>" alt=""></a></li>

                    <?php endif;?><?php if(! empty( $instance['image2'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image2']);?>" alt=""></a></li>

                    <?php endif;?><?php if(! empty( $instance['image3'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image3']);?>" alt=""></a></li>

                    <?php endif;?><?php if(! empty( $instance['image4'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image4']);?>" alt=""></a></li>

                    <?php endif;?><?php if(! empty( $instance['image5'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image5']);?>" alt=""></a></li>

                    <?php endif;?><?php if(! empty( $instance['image6'])):?>

                    <li><a href="single-portfolio.html" title=""><img src="<?php echo esc_url($instance['image6']);?>" alt=""></a></li>

                    <?php endif;?>

                </ul>

            </div><!-- end random-works -->

       

    <?php echo $args['after_widget'];

}



    

    public function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image1' => '','image2' => '','image3'=>'','image4'=>'','image5'=>'','image6'=>'' ) );

        $title = strip_tags($instance['title']);

        $image1    = strip_tags($instance['image1']); 

        $image2    = strip_tags($instance['image2']); 

        $image4    = strip_tags($instance['image4']); 

        $image5    = strip_tags($instance['image5']);

        $image6    = strip_tags($instance['image6']);

        $image3  = strip_tags($instance['image3']);?>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('image1')); ?>"><?php _e('Image1 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image1')); ?>" name="<?php echo esc_attr($this->get_field_name('image1')); ?>" type="text" value="<?php echo esc_attr($image1); ?>" /></p>

        

        

        <p><label for="<?php echo esc_attr($this->get_field_id('image2')); ?>"><?php _e(' Image2 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image2')); ?>" name="<?php echo esc_attr($this->get_field_name('image2')); ?>" type="text" value="<?php echo esc_attr($image2); ?>" /></p>

        



        <p><label for="<?php echo esc_attr($this->get_field_id('image3')); ?>"><?php _e('Image3 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image3')); ?>" name="<?php echo esc_attr($this->get_field_name('image3')); ?>" type="text" value="<?php echo esc_attr($image3); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('image4')); ?>"><?php _e('Image4 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image4')); ?>" name="<?php echo esc_attr($this->get_field_name('image4')); ?>" type="text" value="<?php echo esc_attr($image4); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('image5')); ?>"><?php _e('Image5 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image5')); ?>" name="<?php echo esc_attr($this->get_field_name('image5')); ?>" type="text" value="<?php echo esc_attr($image5); ?>" /></p>

        

        <p><label for="<?php echo esc_attr($this->get_field_id('image6')); ?>"><?php _e('Image6 Url:'); ?></label>

        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image6')); ?>" name="<?php echo esc_attr($this->get_field_name('image6')); ?>" type="text" value="<?php echo esc_attr($image6); ?>" /></p>

        

        

    <?php

    }



    

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['image1'] = strip_tags($new_instance['image1']);

        $instance['image2'] = strip_tags($new_instance['image2']);

        $instance['image3'] = strip_tags($new_instance['image3']);

        $instance['image4'] = strip_tags($new_instance['image4']);

        $instance['image5'] = strip_tags($new_instance['image5']);

        $instance['image6'] = strip_tags($new_instance['image6']);

        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );

        if ( isset($alloptions['images']) )

            delete_option('images');

            return $instance;

        

    }

 function flush_widget_cache() {



        wp_cache_delete('images', 'widget');

    }

 

}

register_widget('WP_Widget_Images_Kerna');







//thumbnails

if ( function_exists( 'add_theme_support' ) ) { 

        add_theme_support( 'post-thumbnails' );

         } 

    set_post_thumbnail_size( 200, 170, true ); 

    add_image_size( 'Latest-thumbnails', 100, 80, true );

    add_image_size( 'grid-thumbnails', 337, 253, true );

    add_image_size( 'thumbnails', 847, 353, true );

    add_image_size( 'post', 1110, 126, true ); 

    add_image_size( 'cart_item_image_size', 50, 56, true );

/*Add custom field in user profile*/



function kerna_add_custom_user_profile_fields( $user ) {

?>          <table class="form-table">

            <tr>

                <th> <label for="address"><?php _e('Desgination', 'kerna'); ?>

                </label></th>

                <td><input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>

            </tr>

            </table>

            

<?php }



function kerna_save_custom_user_profile_fields( $user_id ) {

    

    if ( !current_user_can( 'edit_user', $user_id ) )

        return FALSE;

    

    update_user_meta( $user_id, 'designation', $_POST['designation'] );

}



add_action( 'show_user_profile', 'kerna_add_custom_user_profile_fields' );

add_action( 'edit_user_profile', 'kerna_add_custom_user_profile_fields' );



add_action( 'personal_options_update', 'kerna_save_custom_user_profile_fields' );

add_action( 'edit_user_profile_update', 'kerna_save_custom_user_profile_fields' );



/*single product tabs*/

add_filter( 'woocommerce_product_tabs', 'kerna_rename_tabs', 98 );

function kerna_rename_tabs( $tabs ) {

    $count_reviews=get_comments_number();

    $tabs['description']['title'] = __( 'Description' );       // Rename the description tab

    $tabs['reviews']['title'] = __( 'Feedbacks'.' ('.$count_reviews.')' );                // Rename the reviews tab

   unset( $tabs['additional_information'] ); // Remove the additional information tab





    return $tabs;



}



//Builder functions



function kerna_row_style_fields($fields) {

    

$fields['row_id'] = array(

      'name'        => __('Row ID', 'siteorigin-panels'),

      'type'        => 'text',

      'group'       => 'attributes',

      'description' => __('Please give an id(without #)', 'siteorigin-panels'),

      'priority'    => 10,

);



$fields['row_stretch'] = array(

      'name'        => __('Row Styles', 'siteorigin-panels'),

      'type'        => 'select',

      'group'       => 'layout',

      'description' => __('Choose between contained or full row styple', 'siteorigin-panels'),

      'priority'    => 10,

      'options'     => array(

            'container'        => __('Container', 'siteorigin-panels'),

            'fluid-container'        => __('Full Width', 'siteorigin-panels'),

            ),

);



$fields['parallax'] = array(

      'name'        => __('Parallax', 'siteorigin-panels'),

      'type'        => 'checkbox',

      'group'       => 'design',

      'description' => __('If enabled, the background image will have a parallax effect.', 'siteorigin-panels'),

      'priority'    => 8,

);



$fields['parallax_rate'] = array(

      'name'        => __('Parallax Rate', 'siteorigin-panels'),

      'type'        => 'text',

      'group'       => 'design',

      'description' => __('Enter value such as 10,20,50,100 etc to control parallax speed', 'siteorigin-panels'),

      'priority'    => 9,

);



  return $fields;

}



add_filter( 'siteorigin_panels_row_style_fields', 'kerna_row_style_fields');





function kerna_panels_row_container_start( $grid, $attributes ) {

    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='')

    echo '<div id="'.$grid['style']['row_id'].'">';

    if(isset($grid['style']['row_stretch']))

    echo '<div class="'.$grid['style']['row_stretch'].'">';



}



add_filter('siteorigin_panels_row_container_start', 'kerna_panels_row_container_start', 10, 2);





function kerna_panels_row_container_end( $grid, $attributes ) { 

    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='')

    echo '</div>'; 

    if(isset($grid['style']['row_stretch']))

    echo '</div>';



}

add_filter('siteorigin_panels_row_container_end', 'kerna_panels_row_container_end', 10, 2);





function kerna_row_style_attributes( $attributes, $args ) {



    if( !empty( $args['parallax'] ) ) {

        array_push($attributes['class'], 'fullscreen');

        array_push($attributes['class'], 'background');

        array_push($attributes['class'], 'parallax');

        $attributes['data-diff']=$args['parallax_rate'];

        $attributes['data-img-width']=1600;

    }



    return $attributes;

}

add_filter('siteorigin_panels_row_style_attributes', 'kerna_row_style_attributes', 10, 2);



/*proceed to checkout*/

remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 10 ); 

add_action('woocommerce_proceed_to_checkout', 'kerna_woo_custom_checkout_button_text');



function kerna_woo_custom_checkout_button_text() {

    $checkout_url = WC()->cart->get_checkout_url();?>

  

       <a href="<?php echo esc_url($checkout_url); ?>" class="btn btn-primary border-radius"><?php  _e( 'Proceed To CheckOut', 'woocommerce' ); ?></a> 

    <?php }



/*Check out customization*/

add_filter("woocommerce_checkout_fields", "kerna_order_fields");



function kerna_order_fields($fields) {



    $order = array(

        "billing_first_name", 

        "billing_last_name", 

        "billing_company", 

        "billing_address_1", 

        "billing_address_2",

        "billing_city", 

        "billing_country",

        "billing_postcode",

        "billing_email", 

        "billing_phone"



    );

    foreach($order as $field)

    {

        $ordered_fields[$field] = $fields["billing"][$field];

    }



    $fields["billing"] = $ordered_fields;

    return $fields;



}

// Hook in

add_filter( 'woocommerce_checkout_fields' , 'kerna_custom_override_checkout_fields' );



// Our hooked in function - $fields is passed via the filter!

function kerna_custom_override_checkout_fields( $fields ) {

     $fields['billing']['billing_first_name']['placeholder'] = 'First Name';

     $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';

     $fields['billing']['billing_company']['placeholder'] = 'Company Name';

     $fields['billing']['billing_phone']['placeholder'] = 'Phone Number';

     $fields['billing']['billing_email']['placeholder'] = 'Email Address';



     $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';

     $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';

     $fields['shipping']['shipping_company']['placeholder'] = 'Company Name';

 

     return $fields;

}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' , 10);

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' , 5);

// Display 12 products per page. Goes in functions.php

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );