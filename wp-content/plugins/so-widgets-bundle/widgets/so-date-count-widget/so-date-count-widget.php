<?php
/*
Widget Name: Date Count widget
Description: A very date count widget.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Date_Count_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-date_count',
			__('SiteOrigin Date Count', 'siteorigin-widgets'),
			array(
				'description' => __('A simple date count widget .', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(	
					
				'date' => array(
					'type' => 'text',
					'label' => __('Enter Release Date', 'siteorigin-widgets'),
					'description' => __('Format: 2017-01-01', 'siteorigin-widgets'),
				),
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	
	function initialize() {
		
		$this->register_frontend_styles(
			array(
				array(
					'sow-date_count',
					siteorigin_widget_get_plugin_dir_url( 'date_count' ) . 'css/style.css',
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

siteorigin_widget_register('date_count', __FILE__);