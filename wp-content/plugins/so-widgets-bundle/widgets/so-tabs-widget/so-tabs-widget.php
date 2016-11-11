<?php
/*
Widget Name: Tabs Widget
Description: Displays a block of tabs .
Version: trunk
Author: Sunil chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Tabs_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-tabs',
			__( 'SiteOrigin Tabs', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a group of tabs.', 'siteorigin-widgets' ),
			),
			array(),
			array(
				'tabs' => array(
					'type' => 'repeater',
					'label' => __('Tabs', 'siteorigin-widgets'),
					'item_name' => __('Tab', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='tabs-tab_title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
					
						'tab_title' => array(
							'type' => 'text',
							'label' => __('Tab Title', 'siteorigin-widgets'),
						),
						'color' => array(
							'type' => 'color',
							'label' => __('Tab color', 'siteorigin-widgets'),
							'default' => '#FFFFFF',
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __('Description', 'siteorigin-widgets'),
						),
						'image' => array(
							'type' => 'media',
							'label' => __('Image file', 'siteorigin-widgets'),
						),
						'image_align' => array(
							'type' => 'select',
							'label' => __('Image Align', 'siteorigin-widgets'),
							'options' => array(
								'left' => __('Left', 'siteorigin-widgets'),
								'right' => __('Right', 'siteorigin-widgets'),								
							),
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
						'active' => array(
							'type' => 'checkbox',
							'label' => __('Is this active tab ? ', 'siteorigin-widgets'),
							'default' => false,
						),
						'extra_text' => array(
							'type' => 'textarea',
							'label' => __('Extra Description', 'siteorigin-widgets'),
							'description'=>__('Description displayed below features', 'siteorigin-widgets'),
						),
						
					),
				),
							

			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}

function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-tabs',
					siteorigin_widget_get_plugin_dir_url( 'tabs' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	
}
siteorigin_widget_register('tabs', __FILE__);