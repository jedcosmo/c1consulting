<?php
/*
Widget Name: Client Slider widget
Description: Displays client images.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Client_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-client_slider',
			__( 'SiteOrigin Client Slider', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays client images.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
					
				'images' => array(
					'type' => 'repeater',
					'label' => __('Client Images', 'siteorigin-widgets'),
					'item_name' => __('Client Image', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='images-client_image']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'client_image' => array(
							'type' => 'media',
							'library' => 'image',
							'label' => __('Client Image', 'siteorigin-widgets'),
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
					'siteorigin-client_slider',
					siteorigin_widget_get_plugin_dir_url( 'client_slider' ) . 'css/style.css',
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

siteorigin_widget_register('client_slider', __FILE__);