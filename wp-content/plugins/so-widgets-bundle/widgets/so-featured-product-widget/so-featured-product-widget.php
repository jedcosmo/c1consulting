<?php
/*
Widget Name: Featured Product widget
Description: Displays Featured shop product
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_FeaturedProduct_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-featuredproduct',
			__('SiteOrigin Featured Product', 'siteorigin-widgets'),
			array(
				'description' => __('A customizable featured product widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				
						

			),
			plugin_dir_path(__FILE__).'../'
		);
	}
	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-featured_product',
					siteorigin_widget_get_plugin_dir_url( 'featured_product' ) . 'css/style.css',
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

siteorigin_widget_register('featuredproduct', __FILE__);