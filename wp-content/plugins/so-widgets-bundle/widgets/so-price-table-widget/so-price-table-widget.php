<?php
/*
Widget Name: Price table widget
Description: A powerful yet simple price table widget for your sidebars or Page Builder pages.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com

*/

class SiteOrigin_Widget_PriceTable_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-price-table',
			__('SiteOrigin Price Table', 'siteorigin-widgets'),
			array(
				'description' => __('A simple Price Table.', 'siteorigin-widgets'),				
			),
			array(

			),
			array(	
						
						'title' => array(
							'type' => 'text',
							'label' => __('Title', 'siteorigin-widgets'),
						),	
						'subtitle' => array(
							'type' => 'text',
							'label' => __('Sub Title', 'siteorigin-widgets'),
						),		

						'price' => array(
							'type' => 'text',
							'label' => __('Price', 'siteorigin-widgets'),
						),
						'per' => array(
							'type' => 'text',
							'label' => __('Per', 'siteorigin-widgets'),
							'description' => __('eg:Per Month', 'siteorigin-widgets'),
						),
						'color' => array(
							'type' => 'color',
							'label' => __('Container color', 'siteorigin-widgets'),
							'default' => '#FFFFFF',
						),	
						
						'button' => array(
							'type' => 'text',
							'label' => __('Button text', 'siteorigin-widgets'),
						),
						'url' => array(
							'type' => 'text',
							'sanitize' => 'url',
							'label' => __('Button URL', 'siteorigin-widgets'),
						),
						'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'siteorigin-widgets'),
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
								'slideInDown' => __('slidedown', 'siteorigin-widgets'),
								'slideInUp' => __('slideup', 'siteorigin-widgets'),
								'slideInLeft' => __('slideleft', 'siteorigin-widgets'),
								'slideInRight' => __('slideright', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slidefade' => __('slidefade', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fade' => __('fade', 'siteorigin-widgets'),
							)
						),
						'features' => array(
							'type' => 'repeater',
							'label' => __('Features', 'siteorigin-widgets'),
							'item_name' => __('Feature', 'siteorigin-widgets'),
							'item_label' => array(
								'selector' => "[id*='columns-features-text']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
							'fields' => array(
								'text' => array(
									'type' => 'text',
									'label' => __('Text', 'siteorigin-widgets'),
								),
								
							),
						),
			
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'siteorigin-pricetable',
					siteorigin_widget_get_plugin_dir_url( 'price-table' ) . 'js/pricetable' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' )
				)
			)
		);
	}
	function get_template_name($instance) {
		return $this->get_style_name($instance);
	}

	function get_style_name($instance) {
		 return 'atom';
		
	}

}

siteorigin_widget_register('price-table', __FILE__);