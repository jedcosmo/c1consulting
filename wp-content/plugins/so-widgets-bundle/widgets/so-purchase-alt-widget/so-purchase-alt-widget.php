<?php
/*
Widget Name: Purchase alternate  widget
Description: Displays Purchase button with text 
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_PurchaseAlt_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-purchasealt',
			__('SiteOrigin Purchase Alternate', 'siteorigin-widgets'),
			array(
				'description' => __('A simple purchase product widget', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				
				'title' => array(
					'type' => 'text',
					'label' => __('Title Text', 'siteorigin-widgets'),
				),	

				'title_size' => array(
					'type' => 'select',
					'label' => __('Title Size', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('H1', 'siteorigin-widgets'),
						'2' => __('H2', 'siteorigin-widgets'),
						'3' => __('H3', 'siteorigin-widgets'),
						'4' => __('H4', 'siteorigin-widgets'),
						'5' => __('H5', 'siteorigin-widgets'),
						'6' => __('H6', 'siteorigin-widgets'),
						
					)
				),	
				'letter_spacing' => array(
					'type' => 'checkbox',
					'label' => __('Letter Spacing in title', 'siteorigin-widgets'),
					'default' => false,
				),	
				'subtitle' => array(
					'type' => 'text',
					'label' => __('Subtitle Text', 'siteorigin-widgets'),
				),	

				'subtitle_size' => array(
					'type' => 'select',
					'label' => __('Subtitle Size', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('H1', 'siteorigin-widgets'),
						'2' => __('H2', 'siteorigin-widgets'),
						'3' => __('H3', 'siteorigin-widgets'),
						'4' => __('H4', 'siteorigin-widgets'),
						'5' => __('H5', 'siteorigin-widgets'),
						'6' => __('H6', 'siteorigin-widgets'),
						
					)
				),		
				
				'buttontext' => array(
							'type' => 'text',
							'label' => __('Button 1 Text', 'siteorigin-widgets'),
						),
				'type' => array(
					'type' => 'select',
					'label' => __('Button 1 type', 'siteorigin-widgets'),
					'options' => array(
						'default' => __('Default button', 'siteorigin-widgets'),
						'primary' => __('Primary button', 'siteorigin-widgets'),
						'success' => __('Success button', 'siteorigin-widgets'),
						'warning' => __('Warning button', 'siteorigin-widgets'),
						'info' => __('Information button', 'siteorigin-widgets'),
					),					
				),
				'buttonurl' => array(
							'type' => 'text',
							'label' => __(' Button 1 Url', 'siteorigin-widgets'),
						),	
				'buttontext_2' => array(
							'type' => 'text',
							'label' => __('Button 2 Text', 'siteorigin-widgets'),
							'description'=> __('Second button transparent', 'siteorigin-widgets'),
						),
				'buttonurl_2' => array(
							'type' => 'text',
							'label' => __('Button 2 Url', 'siteorigin-widgets'),
						),			
						
				
			)
		);
	}
function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-purchasealt',
					siteorigin_widget_get_plugin_dir_url( 'purchasealt' ) . 'css/style.css',
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
siteorigin_widget_register('purchasealt', __FILE__);