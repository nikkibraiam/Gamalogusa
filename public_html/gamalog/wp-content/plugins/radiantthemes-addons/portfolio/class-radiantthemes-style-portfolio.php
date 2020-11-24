<?php
/**
 * Portfolio Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Portfolio' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Portfolio extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Portfolio', 'radiantthemes-addons' ),
					'base'        => 'rt_portfolio_style',
					'description' => esc_html__( 'Add Portfolio with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/portfolio/icon/Portfolio-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_portfolio_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Masonry - Title and Category)', 'radiantthemes-addons' )          => 'one',
								esc_html__( 'Style Two (Flipbox)', 'radiantthemes-addons' )                               => 'two',
								esc_html__( 'Style Three (Masonry - Zoom Center)', 'radiantthemes-addons' )               => 'three',
								esc_html__( 'Style Four (Overlay - Title Bottom)', 'radiantthemes-addons' )               => 'four',
								esc_html__( 'Style Five (Overlay - Zoom Center)', 'radiantthemes-addons' )                => 'five',
								esc_html__( 'Style Six (Overlay - Title Center)', 'radiantthemes-addons' )                => 'six',
								esc_html__( 'Style Seven (Overlay - Title and Details)', 'radiantthemes-addons' )         => 'seven',
								esc_html__( 'Style Eight (Overlay - Title, Zoom and Details)', 'radiantthemes-addons' )   => 'eight',
								esc_html__( 'Style Nine (Masonry - Left Title and Right Arrow)', 'radiantthemes-addons' ) => 'nine',
								esc_html__( 'Style Ten (Masonry - Overlay Category and Title)', 'radiantthemes-addons' )  => 'ten',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Portfolio Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter portfolio category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_category',
							'value'       => 'all',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Display Filter', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_display_filter',
							'dependency' => array(
								'element' => 'portfolio_category',
								'value'   => 'all',
							),
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Filter Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_filter_style',
							'dependency' => array(
								'element' => 'portfolio_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Filter Align', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_filter_alignment',
							'dependency' => array(
								'element' => 'portfolio_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Box Align', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_box_alignment',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_max_posts',
							'description' => esc_html__( 'Use -1 to dislay all posts. ', 'radiantthemes-addons' ),
							'value'       => '8',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Portfolio Box Number', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_box_number',
							'description' => esc_html__( 'Number of Portfolio Box to display in a grid.', 'radiantthemes-addons' ),
							'value'       => array(
								'1',
								'2',
								'3',
								'4',
							),
							'std'         => '3',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Link?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_link',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Enable Title?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_title',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Enable excerpt?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_excerpt',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Spacing between Portfolio Items', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_spacing',
							'description' => esc_html__( 'Enter only the spacing value without unit. E.g. 30', 'radiantthemes-addons' ),
							'value'       => '0',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_looping_order',
							'value'      => array(
								esc_html__( 'Date', 'radiantthemes-addons' )       => 'date',
								esc_html__( 'ID', 'radiantthemes-addons' )         => 'ID',
								esc_html__( 'Title', 'radiantthemes-addons' )      => 'title',
								esc_html__( 'Modified', 'radiantthemes-addons' )   => 'modified',
								esc_html__( 'Random', 'radiantthemes-addons' )     => 'random',
								esc_html__( 'Menu order', 'radiantthemes-addons' ) => 'menu_order',
							),
							'std'        => 'ID',
							'group'      => 'Looping',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Offset Posts', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_looping_offset',
							'description' => esc_html__( 'Use this field to ignore few posts (Eg.: 2 ).', 'radiantthemes-addons' ),
							'group'       => 'Looping',
						),

						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Add Animation?', 'radiantthemes-addons' ),
							'param_name' => 'add_animation',
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Name', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'param_name'       => 'rt_animation',
							'description'      => sprintf( wp_kses_post( 'Choose your animation name. Powered By:  <a href="%s" target="_blank">Animate css</a>).', 'radiantthemes-addons' ), 'https://daneden.github.io/animate.css' ),
							'value'            => array(
								esc_html__( 'Attention Seekers', 'radiantthemes-addons' )    => 'attention_seekers',
								esc_html__( 'Bouncing Entrances', 'radiantthemes-addons' )   => 'bouncing_entrances',
								esc_html__( 'Bouncing Exits', 'radiantthemes-addons' )       => 'bouncing_exits',
								esc_html__( 'Fading Entrances', 'radiantthemes-addons' )     => 'fading_entrances',
								esc_html__( 'Fading Exits', 'radiantthemes-addons' )         => 'fading_exits',
								esc_html__( 'Flippers', 'radiantthemes-addons' )             => 'flippers',
								esc_html__( 'Lightspeed', 'radiantthemes-addons' )           => 'lightspeed',
								esc_html__( 'Rotating Entrances', 'radiantthemes-addons' )   => 'rotating_entrances',
								esc_html__( 'Rotating Exits', 'radiantthemes-addons' )      => 'rotating_exits',
								esc_html__( 'Sliding Entrances', 'radiantthemes-addons' )    => 'sliding_entrances',
								esc_html__( 'Sliding Exits', 'radiantthemes-addons' )        => 'sliding_exits',
								esc_html__( 'Zoom Entrances', 'radiantthemes-addons' )       => 'zoom_entrances',
								esc_html__( 'Zoom Exits', 'radiantthemes-addons' )           => 'zoom_exits',
								esc_html__( 'Specials', 'radiantthemes-addons' )             => 'specials',
							),
							'std'              => 'attention_seekers',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
							),

						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'attention_seekers',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'Bounce', 'radiantthemes-addons' )     => 'bounce',
								esc_html__( 'Flash', 'radiantthemes-addons' )      => 'flash',
								esc_html__( 'Pulse', 'radiantthemes-addons' )      => 'pulse',
								esc_html__( 'rubberBand', 'radiantthemes-addons' ) => 'rubberBand',
								esc_html__( 'shake', 'radiantthemes-addons' )      => 'shake',
								esc_html__( 'swing', 'radiantthemes-addons' )      => 'swing',
								esc_html__( 'tada', 'radiantthemes-addons' )       => 'tada',
								esc_html__( 'wobble', 'radiantthemes-addons' )     => 'wobble',
								esc_html__( 'jello', 'radiantthemes-addons' )      => 'jello',
							),
							'std'              => 'bounce',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'attention_seekers',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'bouncing_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'BounceIn', 'radiantthemes-addons' )      => 'bounceIn',
								esc_html__( 'BounceInDown', 'radiantthemes-addons' )  => 'bounceInDown',
								esc_html__( 'BounceInLeft', 'radiantthemes-addons' )  => 'bounceInLeft',
								esc_html__( 'BounceInRight', 'radiantthemes-addons' ) => 'bounceInRight',
								esc_html__( 'BounceInUp', 'radiantthemes-addons' )    => 'bounceInUp',

							),
							'std'              => 'bounceIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'bouncing_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'bouncing_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'bounceOut', 'radiantthemes-addons' )      => 'bounceOut',
								esc_html__( 'bounceOutDown', 'radiantthemes-addons' )  => 'bounceOutDown',
								esc_html__( 'bounceOutLeft', 'radiantthemes-addons' )  => 'bounceOutLeft',
								esc_html__( 'bounceOutRight', 'radiantthemes-addons' ) => 'bounceOutRight',
								esc_html__( 'bounceOutUp', 'radiantthemes-addons' )    => 'bounceOutUp',

							),
							'std'              => 'bounceOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'bouncing_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'fading_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'fadeIn', 'radiantthemes-addons' )         => 'fadeIn',
								esc_html__( 'fadeInDown', 'radiantthemes-addons' )     => 'fadeInDown',
								esc_html__( 'fadeInDownBig', 'radiantthemes-addons' )  => 'fadeInDownBig',
								esc_html__( 'fadeInLeft', 'radiantthemes-addons' )     => 'fadeInLeft',
								esc_html__( 'fadeInLeftBig', 'radiantthemes-addons' )  => 'fadeInLeftBig',
								esc_html__( 'fadeInRight', 'radiantthemes-addons' )    => 'fadeInRight',
								esc_html__( 'fadeInRightBig', 'radiantthemes-addons' ) => 'fadeInRightBig',
								esc_html__( 'fadeInUp', 'radiantthemes-addons' )       => 'fadeInUp',
								esc_html__( 'fadeInUpBig', 'radiantthemes-addons' )    => 'fadeInUpBig',

							),
							'std'              => 'fadeIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'fading_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'fading_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'fadeOut', 'radiantthemes-addons' )         => 'fadeOut',
								esc_html__( 'fadeOutDown', 'radiantthemes-addons' )     => 'fadeOutDown',
								esc_html__( 'fadeOutDownBig', 'radiantthemes-addons' )  => 'fadeOutDownBig',
								esc_html__( 'fadeOutLeft', 'radiantthemes-addons' )     => 'fadeOutLeft',
								esc_html__( 'fadeOutLeftBig', 'radiantthemes-addons' )  => 'fadeOutLeftBig',
								esc_html__( 'fadeOutRight', 'radiantthemes-addons' )    => 'fadeOutRight',
								esc_html__( 'fadeOutRightBig', 'radiantthemes-addons' ) => 'fadeOutRightBig',
								esc_html__( 'fadeOutUp', 'radiantthemes-addons' )       => 'fadeOutUp',
								esc_html__( 'fadeOutUpBig', 'radiantthemes-addons' )    => 'fadeOutUpBig',

							),
							'std'              => 'fadeOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'fading_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'flippers',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'flip', 'radiantthemes-addons' )     => 'flip',
								esc_html__( 'flipInX', 'radiantthemes-addons' )  => 'flipInX',
								esc_html__( 'flipInY', 'radiantthemes-addons' )  => 'flipInY',
								esc_html__( 'flipOutX', 'radiantthemes-addons' ) => 'flipOutX',
								esc_html__( 'flipOutY', 'radiantthemes-addons' ) => 'flipOutY',

							),
							'std'              => 'flip',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'flippers',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'lightspeed',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'lightSpeedIn', 'radiantthemes-addons' )  => 'lightSpeedIn',
								esc_html__( 'lightSpeedOut', 'radiantthemes-addons' )  => 'lightSpeedOut',
							),
							'std'              => 'lightSpeedIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'lightspeed',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'rotating_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'rotateIn', 'radiantthemes-addons' )          => 'rotateIn',
								esc_html__( 'rotateInDownLeft', 'radiantthemes-addons' )  => 'rotateInDownLeft',
								esc_html__( 'rotateInDownRight', 'radiantthemes-addons' ) => 'rotateInDownRight',
								esc_html__( 'rotateInUpLeft', 'radiantthemes-addons' )    => 'rotateInUpLeft',
								esc_html__( 'rotateInUpRight', 'radiantthemes-addons' )   => 'rotateInUpRight',

							),
							'std'              => 'rotateIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'rotating_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'rotating_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'rotateOut', 'radiantthemes-addons' )          => 'rotateOut',
								esc_html__( 'rotateOutDownLeft', 'radiantthemes-addons' )  => 'rotateOutDownLeft',
								esc_html__( 'rotateOutDownRight', 'radiantthemes-addons' ) => 'rotateOutDownRight',
								esc_html__( 'rotateOutUpLeft', 'radiantthemes-addons' )    => 'rotateOutUpLeft',
								esc_html__( 'rotateOutUpRight', 'radiantthemes-addons' )   => 'rotateOutUpRight',

							),
							'std'              => 'rotateIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'rotating_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'sliding_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'slideInUp', 'radiantthemes-addons' )    => 'slideInUp',
								esc_html__( 'slideInDown', 'radiantthemes-addons' )  => 'slideInDown',
								esc_html__( 'slideInLeft', 'radiantthemes-addons' )  => 'slideInLeft',
								esc_html__( 'slideInRight', 'radiantthemes-addons' ) => 'slideInRight',

							),
							'std'              => 'slideInUp',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'sliding_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'sliding_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'slideOutUp', 'radiantthemes-addons' )    => 'slideOutUp',
								esc_html__( 'slideOutDown', 'radiantthemes-addons' )  => 'slideOutDown',
								esc_html__( 'slideOutLeft', 'radiantthemes-addons' )  => 'slideOutLeft',
								esc_html__( 'slideOutRight', 'radiantthemes-addons' ) => 'slideOutRight',

							),
							'std'              => 'slideOutUp',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'sliding_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'zoom_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'zoomIn', 'radiantthemes-addons' )      => 'zoomIn',
								esc_html__( 'zoomInDown', 'radiantthemes-addons' )  => 'zoomInDown',
								esc_html__( 'zoomInLeft', 'radiantthemes-addons' )  => 'zoomInLeft',
								esc_html__( 'zoomInRight', 'radiantthemes-addons' ) => 'zoomInRight',
								esc_html__( 'zoomInUp', 'radiantthemes-addons' )    => 'zoomInUp',

							),
							'std'              => 'zoomIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'zoom_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'zoom_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'zoomOut', 'radiantthemes-addons' )      => 'zoomOut',
								esc_html__( 'zoomOutDown', 'radiantthemes-addons' )  => 'zoomOutDown',
								esc_html__( 'zoomOutLeft', 'radiantthemes-addons' )  => 'zoomOutLeft',
								esc_html__( 'zoomOutRight', 'radiantthemes-addons' ) => 'zoomOutRight',
								esc_html__( 'zoomOutUp', 'radiantthemes-addons' )    => 'zoomOutUp',

							),
							'std'              => 'zoomOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'zoom_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'specials',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'hinge', 'radiantthemes-addons' )        => 'hinge',
								esc_html__( 'jackInTheBox', 'radiantthemes-addons' ) => 'jackInTheBox',
								esc_html__( 'rollIn', 'radiantthemes-addons' )       => 'rollIn',
								esc_html__( 'rollOut', 'radiantthemes-addons' )      => 'rollOut',

							),
							'std'              => 'hinge',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'specials',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Animation Duration', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Put time is seconds. Eg. 2s', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'param_name'       => 'duration',
							'value'            => '2s',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Animation Delay', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Put time is seconds. Eg. 0s', 'radiantthemes-addons' ),
							'param_name'       => 'delay',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0s',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_portfolio_style', array( $this, 'radiantthemes_portfolio_style_func' ) );
		}

		/**
		 * [radiantthemes_portfolio_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_portfolio_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'portfolio_style_variation'  => 'one',
					'portfolio_category'         => 'all',
					'portfolio_display_filter'   => 'yes',
					'portfolio_filter_style'     => 'one',
					'portfolio_filter_alignment' => 'center',
					'portfolio_box_alignment'    => 'center',
					'portfolio_max_posts'        => '8',
					'portfolio_box_number'       => '3',
					'portfolio_enable_zoom'      => 'yes',
					'portfolio_enable_link'      => 'no',
					'portfolio_enable_title'     => '',
					'portfolio_enable_excerpt'   => '',
					'portfolio_spacing'          => '0',
					'extra_class'                => '',
					'extra_id'                   => '',
					'portfolio_looping_order'    => 'ID',
					'portfolio_looping_sort'     => 'DESC',
					'portfolio_looping_offset'   => '0',
					'add_animation'              => '',
					'rt_animation'               => 'attention_seekers',
					'attention_seekers'          => 'bounce',
					'bouncing_entrances'         => 'bounceIn',
					'bouncing_exits'             => 'bounceOut',
					'fading_entrances'           => 'fadeIn',
					'fading_exits'               => 'fadeOut',
					'flippers'                   => 'flip',
					'lightspeed'                 => 'lightSpeedIn',
					'rotating_entrances'         => 'rotateIn',
					'rotating_exits'             => 'rotateOut',
					'sliding_entrances'          => 'slideInUp',
					'sliding_exits'              => 'slideOutUp',
					'zoom_entrances'             => 'zoomIn',
					'zoom_exits'                 => 'zoomOut',
					'specials'                   => 'hinge',
					'duration'                   => '2s',
					'delay'                      => '0s',
				), $atts
			);

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_style(
				'radiantthemes_portfolio_element_filter_style',
				plugins_url( 'radiantthemes-addons/portfolio/css/radiantthemes-portfolio-element-filter-style.css' )
			);
			wp_enqueue_style( 'radiantthemes_portfolio_element_filter_style' );

			wp_register_style(
				'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/portfolio/css/radiantthemes-portfolio-element-' . $shortcode['portfolio_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] . '' );

			wp_register_script(
				'isotope',
				plugins_url( 'radiantthemes-addons/assets/js/isotope.pkgd.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'isotope' );

			wp_register_script(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/js/jquery.fancybox.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'fancybox' );

			wp_register_script(
				'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'],
				plugins_url( 'radiantthemes-addons/portfolio/js/radiantthemes-portfolio-element-' . $shortcode['portfolio_style_variation'] . '.js' ),
				array( 'jquery', 'isotope', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] );

			$hidden_filter = ( 'no' === $shortcode['portfolio_display_filter'] ) ? 'hidden' : '';

			$enable_zoom = ( 'yes' === $shortcode['portfolio_enable_zoom'] ) ? 'has-fancybox' : '';

			$spacing_value = ( $shortcode['portfolio_spacing'] / 2 );

			if ( '1' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
			} elseif ( '2' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
			} elseif ( '3' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
			} elseif ( '4' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
			} else {
				$portfolio_item_class = '';
			}
			// Build the animation classes.
						$time         = '';
						$rt_animation = '';
			if ( $shortcode['add_animation'] ) {
				$time  = 'data-wow-duration="' . $shortcode['duration'] . '"';
				$time .= ' data-wow-delay="' . $shortcode['delay'] . '"';

				if ( 'attention_seekers' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['attention_seekers'] ) ? esc_attr( $shortcode['attention_seekers'] ) : 'bounce';

				} elseif ( 'bouncing_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['bouncing_entrances'] ) ? esc_attr( $shortcode['bouncing_entrances'] ) : 'bounceIn';

				} elseif ( 'bouncing_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['bouncing_exits'] ) ? esc_attr( $shortcode['bouncing_exits'] ) : 'bounceOut';

				} elseif ( 'fading_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['fading_entrances'] ) ? esc_attr( $shortcode['fading_entrances'] ) : 'fadeIn';

				} elseif ( 'fading_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['fading_exits'] ) ? esc_attr( $shortcode['fading_exits'] ) : 'fadeOut';

				} elseif ( 'flippers' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['flippers'] ) ? esc_attr( $shortcode['flippers'] ) : 'flip';

				} elseif ( 'lightspeed' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['lightspeed'] ) ? esc_attr( $shortcode['lightspeed'] ) : 'lightSpeedIn';

				} elseif ( 'rotating_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['rotating_entrances'] ) ? esc_attr( $shortcode['rotating_entrances'] ) : 'rotateIn';

				} elseif ( 'rotating_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['rotating_exits'] ) ? esc_attr( $shortcode['rotating_exits'] ) : 'rotateOut';

				} elseif ( 'sliding_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['sliding_entrances'] ) ? esc_attr( $shortcode['sliding_entrances'] ) : 'slideInUp';

				} elseif ( 'sliding_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['sliding_exits'] ) ? esc_attr( $shortcode['sliding_exits'] ) : 'slideOutUp';

				} elseif ( 'zoom_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['zoom_entrances'] ) ? esc_attr( $shortcode['zoom_entrances'] ) : 'zoomIn';

				} elseif ( 'zoom_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['zoom_exits'] ) ? esc_attr( $shortcode['zoom_exits'] ) : 'zoomOut';

				} elseif ( 'specials' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['specials'] ) ? esc_attr( $shortcode['specials'] ) : 'hinge';

				}
				$rt_animation = 'wow ' . $rt_animation;
			}
			require 'template/template-portfolio-style-' . esc_attr( $shortcode['portfolio_style_variation'] ) . '.php';

			return $output;
		}

	}
}
