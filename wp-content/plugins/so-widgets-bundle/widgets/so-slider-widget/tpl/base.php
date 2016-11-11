    <div class="slider-wrapper">    

		<div class="tp-banner-container">

			<div class="tp-banner">            

				<ul>

                <?php foreach($instance['frames'] as $frame) : 

                if($frame['style']==1):

                    $data_x='center';

                    $text_center='text-center'; 

                    $data_y='357';                  

                    

                elseif($frame['style']==2):

                    $data_x='600'; 

                    $text_center=''; 

                    $data_y='341';   

                else:

                    $data_x='50'; 

                    $text_center=''; 

                    $data_y='341'; 

                endif;?>

            

                <?php if( empty($frame['background_image']) ) $background_image = false;

					else $background_image = wp_get_attachment_image_src($frame['background_image'], 'full');

                    if( empty($frame['slider_image']) ) $slider_image = false;

                    else $slider_image=wp_get_attachment_image_src($frame['slider_image'], 'full');

					if(!empty($background_image)) {
                        $logo=get_template_directory_uri().'/assets/images/dummy.png';?>                    

				    <li data-transition="<?php if(!empty($instance['animation']) && $instance['animation']!='none') : echo $instance['animation']; endif; ?>" data-slotamount="3" data-masterspeed="<?php echo $instance['speed']?>" data-thumb="<?php echo esc_url($background_image[0]); ?>"  data-saveperformance="off"  data-title="Kerna Slider">

                        <img src="<?php echo $logo;?>"  alt="" data-lazyload="<?php echo esc_url($background_image[0]); ?>" data-bgposition="center top" data-bgfit="<?php echo $frame['background_image_type'] ?>" data-bgrepeat="no-repeat">

                        <div class="tp-caption slider-title <?php echo $text_center;?> tp-fade skewfromright randomrotateout tp-resizeme rs-parallaxlevel-2" 

                            data-x="<?php echo $data_x;?>" 

                            data-y="201"

                            data-speed="1000" 

                            data-start="800" 

                            data-easing="Power3.easeInOut" 

                            data-elementdelay="0.1" 

                            data-endelementdelay="0.1" 

                            data-endspeed="300" 

                            style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><strong><?php echo nl2br($frame['layertitle']); ?></strong>

                        </div>

                      

                         <div class="tp-caption slider-title1 <?php echo $text_center;?> tp-fade skewfromright randomrotateout tp-resizeme rs-parallaxlevel-2" 

                            data-x="<?php echo $data_x;?>" 

                            data-y="<?php echo $data_y;?>"

                            data-speed="1000" 

                            data-start="1000" 

                            data-easing="Power3.easeInOut" 

                            data-elementdelay="0.1" 

                            data-endelementdelay="0.1" 

                            data-endspeed="300" 

                            style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo nl2br($frame['layersubtitle']); ?>

                        </div>

                        

                        <div class="tp-caption slider-btn tp-fade skewfromright randomrotateout tp-resizeme rs-parallaxlevel-2" 

                            data-x="<?php echo $data_x;?>" 

                            data-y="425"

                            data-speed="1000" 

                            data-start="1000" 

                            data-easing="Power3.easeInOut" 

                            data-elementdelay="0.1" 

                            data-endelementdelay="0.1" 

                            data-endspeed="300" 

                            style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">

                            <?php if( !empty( $frame['moreurl'] ) ) echo '<a  href="' . esc_url( $frame['moreurl'] ) . '" ' . ( $frame['new_window'] ? 'target="_blank"' : '' ) . ' class="btn btn-primary btn-lg border-radius" >'; ?>

                            <?php echo wp_kses_post( $frame['moretext'] ) ?>

                            <?php if( !empty( $frame['moreurl'] ) ) echo '</a>'; ?>

                            

                            <?php if( !empty( $frame['purchasenowurl'] ) ) echo '<a href="' . esc_url( $frame['purchasenowurl'] ) . '" ' . ( $frame['new_window1'] ? 'target="_blank"' : '' ) . ' class="btn btn-lg btn-transparent border-radius" >'; ?>

                            <?php echo wp_kses_post( $frame['purchasenowtext'] ) ?>

                            <?php if( !empty( $frame['purchasenowurl'] ) ) echo '</a>'; ?>

                            <?php if( !empty($frame['slider_image']) ) :?><img src="<?php echo esc_url($slider_image[0]); ?>" alt=""><?php endif;?>

                        </div>                                           

                        

					</li>

                    <?php }

				?>

		<?php endforeach; ?>  

				</ul> 

                

			</div>

		</div>  

	</div>





	





