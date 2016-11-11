<?php
/*
Widget Name: Accordions Widget
Description: Displays block of accordions .
Version: trunk
Author: Sunil chaulagain
Author URI: http://tuchuk.com
*/


class SiteOrigin_Widget_Accordions_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-accordions',
			__( 'SiteOrigin Accordions ', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays  group of accordions.', 'siteorigin-widgets' ),
			),
			array(),
			array(
				'accordions' => array(
					'type' => 'repeater',
					'label' => __('Accordions', 'siteorigin-widgets'),
					'item_name' => __('Accordion', 'siteorigin-widgets'),
					'fields' => array(

						'title' => array(
							'type' => 'text',
							'label' => __('Title Text', 'siteorigin-widgets'),
						),

						'text' => array(
							'type' => 'text',
							'label' => __('Text', 'siteorigin-widgets'),
						),

						'active' => array(
							'type' => 'checkbox',
							'label' => __('Is this active accordion ? ', 'siteorigin-widgets'),
							'default' => false,
						),
						
					),
				),	
				'animation' => array(
								'type' => 'select',
								'label' => __('Animation Style', 'siteorigin-widgets'),
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
									'fadeIn' => __('fadein', 'siteorigin-widgets'),
								)
						),
				'style' => array(
							'type' => 'select',
							'label' => __('Acordion indicator Style', 'siteorigin-widgets'),
							'options' => array(
								'1' => __(' Style 1 ', 'siteorigin-widgets'),
								'2' => __(' Style 2', 'siteorigin-widgets'),	
													
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
					'siteorigin-accordions',
					siteorigin_widget_get_plugin_dir_url( 'accordions' ) . 'css/style.css',
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
siteorigin_widget_register('accordions', __FILE__);