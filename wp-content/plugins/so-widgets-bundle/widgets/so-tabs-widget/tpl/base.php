<div id="customtab" role="tabpanel">  <!-- Nav tabs -->
    <ul class="nav row nav-tabs" role="tablist">
     <?php foreach( $instance['tabs'] as $i => $tab ) : ?>
        <li class="<?php if( $tab['active'] ) echo 'active'; ?> col-md-3 colorful color<?php echo $i;?>" style="background-color:<?php echo $tab['color'] ?>" role="presentation"><a href="#<?php echo $i;?>" aria-controls="<?php echo $i;?>" role="tab" data-toggle="tab"><?php echo wp_kses_post( $tab['tab_title'] ) ?></a></li>        
     <style>
     #customtab .nav-tabs .color<?php echo $i;?> a:after{
        border-top-color: <?php echo $tab['color'] ?> !important;
      }
     </style>
     <?php endforeach; ?>
    </ul>
  <!-- Tab panes -->
    <div class="tab-content">
     <?php foreach( $instance['tabs'] as $i => $tab ) : ?>
        <div role="tabpanel" class="tab-pane <?php if( $tab['active'] ) echo 'active'; ?>" id="<?php echo $i;?>">
            <div class="row">
            <?php  $src = wp_get_attachment_image_src($tab['image'],'full');?>
                <img class="img-responsive align<?php echo $tab['image_align']?>" src="<?php echo esc_url($src[0]);?>" alt="">
                <p><?php echo wp_kses_post( $tab['text'] ) ?></p>

                <ul class="list-inline check">
                  <?php foreach($tab['features'] as $i => $feature) : ?>                          
                     <li> <?php echo wp_kses_post($feature['text']) ?></li>                  
                  <?php endforeach;?>                   
                </ul>
                <p><?php echo wp_kses_post( $tab['extra_text'] ) ?></p>
            </div><!-- end row -->
        </div>
      <?php endforeach; ?>        
    </div>
</div>

