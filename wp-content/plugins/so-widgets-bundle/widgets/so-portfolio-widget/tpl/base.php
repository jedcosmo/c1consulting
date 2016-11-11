 <?php            
    $shortcode_attr = array();
            foreach($instance as $k => $v){
                if(empty($v)) continue;
                $shortcode_attr[] =esc_attr($v);
            }

    echo do_shortcode('[portfolio '.implode(' ', $shortcode_attr).']');
    ?>


