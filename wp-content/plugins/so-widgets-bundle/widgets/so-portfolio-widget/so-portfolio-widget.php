<?php
/*
Widget Name: Portfolio widget
Description: A very simple portfolio widget.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Portfolio_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-portfolio',
			__('SiteOrigin Portfolio', 'siteorigin-widgets'),
			array(
				'description' => __('A very simple portfolio widget.', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(		
					'style' => array(
						'type' => 'select',
						'label' => __( 'Style', 'siteorigin-widgets' ),							
						'options' => array(								
						'masonry' => __( 'Masonry Style', 'siteorigin-widgets' ),
						'classic' => __( 'Classic Style', 'siteorigin-widgets' ),
						'grid' => __( 'Grid Style', 'siteorigin-widgets' ),
										
						)
					),	
				'perpage' => array(
					'type' => 'number',
					'label' => __('Projects Per Page', 'siteorigin-widgets'),
					'default'=>3
				),


				),
				plugin_dir_path(__FILE__).'../'
				
		);
	}
	function get_template_name($instance) {
		return 'base';
	}
	function get_style_name($instance) {
		return false;
	}

}
siteorigin_widget_register('portfolio', __FILE__);