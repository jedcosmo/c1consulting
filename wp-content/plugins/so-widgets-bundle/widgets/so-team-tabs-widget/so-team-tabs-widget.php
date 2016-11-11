<?php
/*
Widget Name: Team Tabs Widget
Description: Displays a block of tabs of team members information .
Version: trunk
Author: Sunil chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_TeamTabs_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-teamtabs',
			__( 'SiteOrigin Team Tabs', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a group of team tabs.', 'siteorigin-widgets' ),
			),
			array(),
			array(
				'tabs' => array(
					'type' => 'repeater',
					'label' => __('Tabs', 'siteorigin-widgets'),
					'item_name' => __('Tab', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='tabs-name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'image' => array(
							'type' => 'media',
							'label' => __('Team Image', 'siteorigin-widgets'),
						),
					
						'name' => array(
						'type' => 'text',
						'label' => __('Name', 'siteorigin-widgets'),
						),
						'cpost' => array(
						'type' => 'text',
						'label' => __('Designation', 'siteorigin-widgets'),
						),
						'shortintro' => array(
						  'type' => 'textarea',
						  'label' => __('Short Introduction', 'siteorigin-widgets'),
						  'description' => __('Enter the short introduction.', 'siteorigin-widgets'),
					  	),
						
						'social_address' => array(
						'type' => 'section',
						'label'  => __( 'Social Addresses', 'siteorigin-widgets' ),
						'hide'   => true,
						'fields' => array(
											
								'facebook' => array(
									'type' => 'text',
									'label' => __('Facebook personal address.', 'siteorigin-widgets'),
								),
								'twitter' => array(
									'type' => 'text',
									'label' => __('Twitter personal address.', 'siteorigin-widgets'),
								),
								
								'linkedin' => array(
									'type' => 'text',
									'label' => __('Linkedin personal address.', 'siteorigin-widgets'),
								),
				
								'gplus' => array(
									'type' => 'text',
									'label' => __('Google Plus personal address.', 'siteorigin-widgets'),
								),			
				
								'instagram' => array(
									'type' => 'text',
									'label' => __('Instagram personal address.', 'siteorigin-widgets'),
								),
								'tumblr' => array(
									'type' => 'text',
									'label' => __('Tumblr personal address.', 'siteorigin-widgets'),
								),
								'vimeo' => array(
									'type' => 'text',
									'label' => __('Vimeo personal address.', 'siteorigin-widgets'),
								),
									
						),
						),
						'active' => array(
							'type' => 'checkbox',
							'label' => __('Is this active tab ? ', 'siteorigin-widgets'),
							'default' => false,
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
					'siteorigin-teamtabs',
					siteorigin_widget_get_plugin_dir_url( 'teamtabs' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	
}
siteorigin_widget_register('teamtabs', __FILE__);