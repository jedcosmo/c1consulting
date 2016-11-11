<?php
/*
Widget Name: Title widget
Description: Displays Title product
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/
class SiteOrigin_Widget_Title_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-title',
			__('SiteOrigin Title', 'siteorigin-widgets'),
			array(
				'description' => __('A simple title widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(
				'title' => array(
					'type' => 'section',
					'label'  => __( 'title', 'siteorigin-widgets' ),
					'hide'   => false,
					'fields' => array(
				'heading' => array(
					'type' => 'text',
					'label' => __('Title Text', 'siteorigin-widgets'),
				),			

				'size' => array(
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
				
				'color' => array(
						'type' => 'color',
						'label' => __('Title color', 'siteorigin-widgets'),
						'default' => '#FFFFFF',
						'description' => __('Only for colored title style', 'siteorigin-widgets'),
					),
				),
				),
				
				'subtitle' => array(
					'type' => 'section',
					'label'  => __( 'subtitle', 'siteorigin-widgets' ),
					'hide'   => false,
					'fields' => array(
				'subheading' => array(
					'type' => 'text',
					'label' => __('Sub Title Text', 'siteorigin-widgets'),
				),

				
				'size' => array(
					'type' => 'select',
					'label' => __('Sub Title Size', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('H1', 'siteorigin-widgets'),
						'2' => __('H2', 'siteorigin-widgets'),
						'3' => __('H3', 'siteorigin-widgets'),
						'4' => __('H4', 'siteorigin-widgets'),
						'5' => __('H5', 'siteorigin-widgets'),
						'6' => __('H6', 'siteorigin-widgets'),
						
					)
				),
				),
					),
				'description' => array(
							'type' => 'textarea',
							'label' => __('Description', 'siteorigin-widgets'),
						),
				'align' => array(
					'type' => 'select',
					'label' => __('Alignment', 'siteorigin-widgets'),
					'options' => array(
						'left' => __('Left', 'siteorigin-widgets'),
						'right' => __('Right', 'siteorigin-widgets'),
						'center' => __('Center', 'siteorigin-widgets'),
					)
				),
				'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'siteorigin-widgets'),
							'description' => __('Only for colored title style', 'siteorigin-widgets'),
							'options' => array(
								'none' => __('none', 'siteorigin-widgets'),
								'bounce' => __('bounce', 'siteorigin-widgets'),
								'flash' => __('flash', 'siteorigin-widgets'),
								'pulse' => __('pulse', 'siteorigin-widgets'),
								'rubberBand' => __('rubberBand', 'siteorigin-widgets'),
								'shake' => __('shake', 'siteorigin-widgets'),
								'swing' => __('swing', 'siteorigin-widgets'),
								'tada' => __('tada', 'siteorigin-widgets'),
								'wobble' => __('wobble', 'siteorigin-widgets'),
								'bounceIn' => __('bounceIn', 'siteorigin-widgets'),
								'bounceInDown' => __('bounceInDown', 'siteorigin-widgets'),
								'bounceInLeft' => __('bounceInLeft', 'siteorigin-widgets'),
								'bounceInRight' => __('bounceInRight', 'siteorigin-widgets'),
								'bounceInUp' => __('bounceInUp', 'siteorigin-widgets'),
								'zoomIn' => __('zoomin', 'siteorigin-widgets'),
								'fadeInDown' => __('fadeInDown', 'siteorigin-widgets'),
								'fadeInDownBig' => __('fadeInDownBig', 'siteorigin-widgets'),
								'fadeInLeft' => __('fadeInLeft', 'siteorigin-widgets'),
								'fadeInLeftBig' => __('fadeInLeftBig', 'siteorigin-widgets'),
								'fadeInRight' => __('fadeInRight', 'siteorigin-widgets'),
								'fadeInRightBig' => __('fadeInRightBig', 'siteorigin-widgets'),
								'fadeInUp' => __('fadeInUp', 'siteorigin-widgets'),
								'fadeInUpBig' => __('fadeInUpBig', 'siteorigin-widgets'),								
								'flipInX' => __('flipInX', 'siteorigin-widgets'),
								'flipInY' => __('flipInY', 'siteorigin-widgets'),
								'rotateIn' => __('rotateIn', 'siteorigin-widgets'),
								'rotateInDownLeft' => __('rotateInDownLeft', 'siteorigin-widgets'),
								'rotateInDownRight' => __('rotateInDownRight', 'siteorigin-widgets'),
								'rotateInUpLeft' => __('rotateInUpLeft', 'siteorigin-widgets'),
								'rotateInUpRight' => __('rotateInUpRight', 'siteorigin-widgets'),
								'slideInDown' => __('slidedown', 'siteorigin-widgets'),
								'slideInUp' => __('slideup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slidefade' => __('slidefade', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fadeIn' => __('fadein', 'siteorigin-widgets'),
							)
			
						),

				'style' => array(
					'type' => 'select',
					'label' => __('Title Style', 'siteorigin-widgets'),
					'options' => array(
						'simple-style' => __('Simple Style', 'siteorigin-widgets'),						
						'section-title' => __('Section Title 1', 'siteorigin-widgets'),
						'section-title-2' => __('Section Title 2', 'siteorigin-widgets'),
						'section-title-3' => __('Section Title 3', 'siteorigin-widgets'),
						'service-one' => __('Service Style hover', 'siteorigin-widgets'),
						'colored' => __('Colored Title style', 'siteorigin-widgets'),						
					)
				),

				'line' => array(
					'type' => 'checkbox',
					'label' => __('Display line below titles', 'siteorigin-widgets'),
				),
			)
		);
	}
function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'siteorigin-title',
					siteorigin_widget_get_plugin_dir_url( 'title' ) . 'css/style.css',
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
siteorigin_widget_register('title', __FILE__);