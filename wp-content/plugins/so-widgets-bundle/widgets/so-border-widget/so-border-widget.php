<?php
/*
Widget Name: Border widget
Description: Displays border between widgets
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Border_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-border',
			__('SiteOrigin Border', 'siteorigin-widgets'),
			array(
				'description' => __('A simple border widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				'line' => array(
					'type' => 'checkbox',
					'label' => __('Display border', 'siteorigin-widgets'),
				),
			)
		);
	}
function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-border',
					siteorigin_widget_get_plugin_dir_url( 'border' ) . 'css/style.css',
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
siteorigin_widget_register('border', __FILE__);