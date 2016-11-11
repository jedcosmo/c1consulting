<?php
/*
Widget Name: Animated Image widget
Description: A very simple animated image widget.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Animated_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-animated_image',
			__('SiteOrigin Animated Image', 'siteorigin-widgets'),
			array(
				'description' => __('A simple animated image widget .', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(
			'main_image' => array(
					'type' => 'section',
					'label'  => __( 'Main Image', 'siteorigin-widgets' ),
					'hide'   => false,
					'fields' => array(
					
					'image1' => array(
					'type' => 'media',
					'label' => __('Main Image file', 'siteorigin-widgets'),
				),
				'custom_image' => array(
					'type' => 'checkbox',
					'label' => __('Image Overlap in bottom', 'siteorigin-widgets'),
					'default' => false,
				),
				'size1' => array(
					'type' => 'select',
					'label' => __('Image size', 'siteorigin-widgets'),
					'options' => array(
						'full' => __('Full', 'siteorigin-widgets'),
						'large' => __('Large', 'siteorigin-widgets'),
						'medium' => __('Medium', 'siteorigin-widgets'),
						'thumb' => __('Thumbnail', 'siteorigin-widgets'),
					),
					
				),
				'animation1' => array(
							'type' => 'select',
							'label' => __('Image Animation', 'siteorigin-widgets'),
							'options' => array(
								'none' => __('none', 'siteorigin-widgets'),
								'bounce' => __('bounce', 'siteorigin-widgets'),
								'flash' => __('flash', 'siteorigin-widgets'),
								'pulse' => __('pulse', 'siteorigin-widgets'),
								'rubberBand' => __('rubberBand', 'siteorigin-widgets'),
								'shake' => __('shake', 'siteorigin-widgets'),
								'swing' => __('swing', 'siteorigin-widgets'),
								'tada' => __('tada', 'siteorigin-widgets'),
								'wobble' => __('wobble', 'siteorigin-widgets'),
								'bounceIn' => __('bounceIn', 'siteorigin-widgets'),
								'bounceInDown' => __('bounceInDown', 'siteorigin-widgets'),
								'bounceInLeft' => __('bounceInLeft', 'siteorigin-widgets'),
								'bounceInRight' => __('bounceInRight', 'siteorigin-widgets'),
								'bounceInUp' => __('bounceInUp', 'siteorigin-widgets'),								
								'fadeInDown' => __('fadeInDown', 'siteorigin-widgets'),
								'fadeInDownBig' => __('fadeInDownBig', 'siteorigin-widgets'),
								'fadeInLeft' => __('fadeInLeft', 'siteorigin-widgets'),
								'fadeInLeftBig' => __('fadeInLeftBig', 'siteorigin-widgets'),
								'fadeInRight' => __('fadeInRight', 'siteorigin-widgets'),
								'fadeInRightBig' => __('fadeInRightBig', 'siteorigin-widgets'),
								'fadeInUp' => __('fadeInUp', 'siteorigin-widgets'),
								'fadeInUpBig' => __('fadeInUpBig', 'siteorigin-widgets'),								
								'flipInX' => __('flipInX', 'siteorigin-widgets'),
								'flipInY' => __('flipInY', 'siteorigin-widgets'),
								'rotateIn' => __('rotateIn', 'siteorigin-widgets'),
								'rotateInDownLeft' => __('rotateInDownLeft', 'siteorigin-widgets'),
								'rotateInDownRight' => __('rotateInDownRight', 'siteorigin-widgets'),
								'rotateInUpLeft' => __('rotateInUpLeft', 'siteorigin-widgets'),
								'rotateInUpRight' => __('rotateInUpRight', 'siteorigin-widgets'),
								'slideInDown' => __('slideindown', 'siteorigin-widgets'),
								'slideInUp' => __('slideinup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slideInRight' => __('slideinright', 'siteorigin-widgets'),
								'slideInLeft' => __('slideinleft', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fade' => __('fade', 'siteorigin-widgets'),
							)
						),
				
						),
					),
				
			

),
			plugin_dir_path(__FILE__).'../'
		);
	}

	
	function initialize() {
		
		$this->register_frontend_styles(
			array(
				array(
					'sow-animated_image',
					siteorigin_widget_get_plugin_dir_url( 'animated_image' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

	
}

siteorigin_widget_register('animated_image', __FILE__);