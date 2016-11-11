<?php
/*
Widget Name: Progresscircle widget
Description: Displays Progress in circle.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Progresscircle_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-progresscircle',
			__( 'SiteOrigin Progress circle', 'siteorigin-widgets' ),
			array(
				'description' => __('Display progress in circle ', 'siteorigin-widgets'),
				
			),
			array(),
			array(
				'id' => array(
						'type' => 'text',
						'label' => __('CIrcle ID', 'siteorigin-widgets'),
						'description' => __('Give unique id from 1 to 10.', 'siteorigin-widgets'),
						'default' => 1,							
						),
				'title' => array(
						'type' => 'text',
						'label' => __('Name', 'siteorigin-widgets'),							
						),
				'icon' => array(
							'type' => 'icon',
							'label' => __('Icon', 'siteorigin-widgets'),
						),
					
				'percent' => array(
						'type' => 'text',
						'label' => __('Percentage (only number)', 'siteorigin-widgets'),
						),
				'color' => array(
						'type' => 'color',
						'label' => __('Bar Color', 'siteorigin-widgets'),
						'default' => '#FFFFFF',
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
				
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-progresscircle',
					siteorigin_widget_get_plugin_dir_url( 'progresscircle' ) . 'css/style.css',
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

siteorigin_widget_register('progresscircle', __FILE__);
