<?php
/*
Widget Name: Progressbar widget
Description: Displays Progressbar.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Progressbar_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-progressbar',
			__( 'SiteOrigin Progressbar', 'siteorigin-widgets' ),
			array(
				'description' => __('A Progress bar ', 'siteorigin-widgets'),
				
			),
			array(),
			array(
			'progressbar' => array(
					'type' => 'repeater',
					'label' => __('Progressbar Name', 'siteorigin-widgets'),
					'item_name' => __('Progressbar', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='progressbar-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
								'title' => array(
								'type' => 'text',
								'label' => __('Name', 'siteorigin-widgets'),							
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
					'siteorigin-progressbar',
					siteorigin_widget_get_plugin_dir_url( 'progressbar' ) . 'css/style.css',
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

siteorigin_widget_register('progressbar', __FILE__);
