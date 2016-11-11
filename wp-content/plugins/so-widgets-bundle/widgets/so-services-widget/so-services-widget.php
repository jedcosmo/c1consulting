<?php
/*
Widget Name: Services widget
Description: Displays a block of services with icons.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-services',
			__( 'SiteOrigin Services', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a list of services.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(			
				'services' => array(
					'type' => 'repeater',
					'label' => __('Services', 'siteorigin-widgets'),
					'item_name' => __('Service', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='services-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(

						'icon' => array(
							'type' => 'icon',
							'label' => __('Icon', 'siteorigin-widgets'),
						),

						'container_color' => array(
							'type' => 'color',
							'label' => __('Container color', 'siteorigin-widgets'),
							'default' => '#FFFFFF',
						),	
						'icon_color' => array(
							'type' => 'color',
							'label' => __('Icon color', 'siteorigin-widgets'),
							'default' => '#FFFFFF',
						),						
					
						'title' => array(
							'type' => 'text',
							'label' => __('Title text', 'siteorigin-widgets'),
						),

						'text' => array(
							'type' => 'text',
							'label' => __('Text', 'siteorigin-widgets')
						),
						
					),
				),
				'icon_size' => array(
					'type' => 'number',
					'label' => __('Icon size', 'siteorigin-widgets'),
					'default' => 24,
				),	
				'icon_animation' => array(
							'type' => 'select',
							'label' => __('Icon animation', 'siteorigin-widgets'),
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
								'zoomIn' => __('zoomin', 'siteorigin-widgets'),
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
								'slideInDown' => __('slidedown', 'siteorigin-widgets'),
								'slideInUp' => __('slideup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slidefade' => __('slidefade', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fade' => __('fade', 'siteorigin-widgets'),
							)
						),
		

			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-services',
					siteorigin_widget_get_plugin_dir_url( 'services' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}

	
}

siteorigin_widget_register('services', __FILE__);