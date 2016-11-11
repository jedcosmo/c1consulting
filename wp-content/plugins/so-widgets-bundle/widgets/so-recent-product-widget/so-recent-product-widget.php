<?php
/*
Widget Name: Recent Product widget
Description: Displays Featured shop product
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_RecentProduct_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-recentproduct',
			__('SiteOrigin Recent Product', 'siteorigin-widgets'),
			array(
				'description' => __('A simple recent product widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				'number' => array(
						'type' => 'number',
						'label' => __('Products per page', 'siteorigin-widgets'),
						'default'=>9,
					),						

			),
			plugin_dir_path(__FILE__).'../'
		);
	}
	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-recent_product',
					siteorigin_widget_get_plugin_dir_url( 'recent_product' ) . 'css/style.css',
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

siteorigin_widget_register('recentproduct', __FILE__);