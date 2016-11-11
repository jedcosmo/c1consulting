<?php 
$number=$instance['number'];
$arg = array(
    'post_type'      => 'product',    
    'post_status'      => 'publish',
    'posts_per_page' =>  $number,
);   
    $r = new WP_Query( $arg );
    if ($r->have_posts()) : ?>
        <div class="classic-shop row">
            <?php while ($r->have_posts()) : $r->the_post(); $product = new WC_Product( get_the_ID() );?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="classic-item">
                            <div class="entry">
                               <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>'','title'=> '')); ?>
                                <div class="magnifier">
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <small><?php 
                                     $attributes=$product->get_attributes();
                                     foreach($attributes as $attribute){
                                        echo $attribute['name'];
                                        }?></small>
                                     <p><?php the_excerpt(); ?></p>    
                                    <hr>
                                    <?php        /**
                                     * woocommerce_after_shop_loop_item hook
                                     *
                                     * @hooked woocommerce_template_loop_add_to_cart - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop_item' ); 

                                    ?>          
                                    <span><a href="<?php the_permalink();?>"><i class="icon icon-Search"></i><?php _e(' View Details','siteorigin-widgets')?></a>
                                </div>
                             </div>
                         <h3><?php the_title(); ?></h3>
                        <small><?php $price = $product->get_price_html(); 
                        echo $price; ?></small>              
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>  