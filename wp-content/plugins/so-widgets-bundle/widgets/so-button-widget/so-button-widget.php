<?php
/*
idget Name: Button widget
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Button_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-button',
			__('SiteOrigin Button', 'siteorigin-widgets'),
			array(
				'description' => __('A customizable button widget.', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(		
					
				'text' => array(
					'type' => 'text',
					'label' => __('Button text', 'siteorigin-widgets'),
				),
				'url' => array(
					'type' => 'text',
					'sanitize' => 'url',
					'label' => __('Destination URL', 'siteorigin-widgets'),
				),

				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'siteorigin-widgets'),
				),
				'type' => array(
					'type' => 'select',
					'label' => __('Button type', 'siteorigin-widgets'),
					'options' => array(
						'default' => __('Default button', 'siteorigin-widgets'),
						'primary' => __('Primary button', 'siteorigin-widgets'),
						'success' => __('Success button', 'siteorigin-widgets'),
						'warning' => __('Warning button', 'siteorigin-widgets'),
						'info' => __('Information button', 'siteorigin-widgets'),
					),					
				),
				'size' => array(
					'type' => 'select',
					'label' => __('Button size', 'siteorigin-widgets'),
					'options' => array(
						'xs' => __('Extra small', 'siteorigin-widgets'),
						'sm' => __('Small', 'siteorigin-widgets'),
						'md' => __('Medium', 'siteorigin-widgets'),
						'lg' => __('Large', 'siteorigin-widgets'),
					),					
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
								'slideInDown' => __('slideindown', 'siteorigin-widgets'),
								'slideInUp' => __('slideinup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slideInRight' => __('slideinright', 'siteorigin-widgets'),
								'slideInLeft' => __('slideinleft', 'siteorigin-widgets'),
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
					'sow-button',
					siteorigin_widget_get_plugin_dir_url( 'button' ) . 'css/style.css',
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

siteorigin_widget_register('button', __FILE__);