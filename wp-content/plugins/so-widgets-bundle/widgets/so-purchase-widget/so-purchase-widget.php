<?php
/*
Widget Name: Purchase  widget
Description: Displays Purchase button with text 
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Purchase_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-purchase',
			__('SiteOrigin Purchase', 'siteorigin-widgets'),
			array(
				'description' => __('A simple purchase product widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				
				'title' => array(
					'type' => 'text',
					'label' => __('Title Text', 'siteorigin-widgets'),
				),			
				
				'description' => array(
							'type' => 'textarea',
							'label' => __('Description', 'siteorigin-widgets'),
						),
				'buttontext' => array(
							'type' => 'text',
							'label' => __('Button Text', 'siteorigin-widgets'),
						),
				'buttonurl' => array(
							'type' => 'text',
							'label' => __('Button Url', 'siteorigin-widgets'),
						),			
				
			)
		);
	}
function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-widgets',
					siteorigin_widget_get_plugin_dir_url( 'purchase' ) . 'css/style.css',
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
siteorigin_widget_register('purchase', __FILE__);