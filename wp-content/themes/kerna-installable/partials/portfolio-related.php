<?php global $kerna_options;?>

<section class="section w-section">

    <div class="container">

        <div class="section-title-2 text-center">

            <?php if (!empty($kerna_options['related_title']) ):?>

              <h3><?php echo esc_attr($kerna_options['related_title']); ?></h3>

            <?php endif;?>

            <hr>

            <?php if (!empty($kerna_options['related_text'])):?>

              <p><?php echo nl2br( wp_kses_post($kerna_options['related_text']));   ?></p>

            <?php endif;?>

        </div><!-- end title -->

       <?php

      $custom_taxterms = wp_get_object_terms( $post->ID, 'portfolio_categories', array('fields' => 'ids') );

      // arguments

      $args = array(

      'post_type' => 'portfolio',

      'post_status' => 'publish',

      'posts_per_page' => 3, // you may edit this number

      'orderby' => 'rand',

      'tax_query' => array(

          array(

              'taxonomy' => 'portfolio_categories',

              'field' => 'id',

              'terms' => $custom_taxterms,

              

          )

      ),

      'post__not_in' => array ($post->ID),

      );

      $related_items = new WP_Query( $args );                      

      if( $related_items->have_posts() ) :echo'<div class="classic-portfolio row">';

        while( $related_items->have_posts() )  :        

        $related_items->the_post();$ID=get_the_ID();?>

       <div class="col-md-4 col-sm-6 col-xs-12">

                <div class="classic-item">

                    <div class="entry">

                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'img-responsive','title'=> ''));?>

                        <div class="magnifier">

                            <a href="<?php the_permalink();?>"><h3><?php echo get_the_title();?></h3></a>

                             <small><?php   

                                 $terms = get_the_terms( $post->ID, 'portfolio_categories' );

                                if ($terms && ! is_wp_error($terms)) :

                                $term_slugs_arr = array();

                              

                                  foreach ($terms as $term) {

                                    $term_slugs_arr[] = $term->name;

                                  }

                                  $terms_slug_str = join( ", ", $term_slugs_arr);

                                  echo esc_attr($terms_slug_str);

                                endif;

                                ?></small>

                             <p><?php the_excerpt ();?></p>    

                            <span><a href="<?php the_permalink();?>"><?php _e('Read More','kerna')?></a></span>     

                        </div><!-- end magnifier -->

                    </div><!-- end entry -->

                    <a href="<?php the_permalink();?>"><h3><?php echo get_the_title();?></h3></a>

                    <small><?php echo esc_attr($terms_slug_str);?></small>

                </div>

            </div>                                      

                            

    <?php 

      endwhile;echo'</div>';

      endif;                                  

     wp_reset_postdata();?>                

       

    </div><!-- end container -->

</section><!-- end section -->