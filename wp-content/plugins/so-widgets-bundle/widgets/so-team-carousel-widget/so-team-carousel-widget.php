<?php
/*
Widget Name: Team Carousel widget
Description: Displays a team member box.
Author: Greg Priday
Author URI: http://siteorigin.com
*/
class SiteOrigin_Widget_TeamCarousel_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-team-carousel',
			__( 'SiteOrigin Team Carousel', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays a team member carousel', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
			
					'team_boxes' => array(
					'type' => 'repeater',
					'label' => __('Teams', 'siteorigin-widgets'),
					'item_name' => __('Team', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='team_boxes-name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'name' => array(
						'type' => 'text',
						'label' => __('Name', 'siteorigin-widgets'),
						),
						'image' => array(
						'type' => 'media',
						'label' => __('Image', 'siteorigin-widgets'),
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
					
					),
					),
				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open In New Window', 'siteorigin-widgets'),
				),	
			)
		);	
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-team-carousel',
					siteorigin_widget_get_plugin_dir_url( 'team-carousel' ) . 'css/style.css',
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
siteorigin_widget_register('team-carousel', __FILE__);