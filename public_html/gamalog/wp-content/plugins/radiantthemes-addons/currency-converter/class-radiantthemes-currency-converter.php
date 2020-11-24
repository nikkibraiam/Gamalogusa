<?php
/**
 * Currency Converter Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Currency_Converter' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Currency_Converter extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Currency Converter', 'radiantthemes-addons' ),
					'base'        => 'rt_currency_converter',
					'description' => esc_html__( 'Add Currency Converter.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/currency-converter/icon/Currency-Converter-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_currency_converter',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Choose Style', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'API Access Key', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_api_key',
							'description' => sprintf( wp_kses_post( 'Get API Access Key for <a href="https://fixer.io/" target="_blank">https://fixer.io/</a>. Without API Access Key, this element will not work.', 'radiantthemes-addons' )),
							'admin_label' => false,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_color',
							'description' => esc_html__( 'Set your Color Scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'currency_converter_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_currency_converter', array( $this, 'radiantthemes_currency_converter_func' ) );
		}

		/**
		 * [radiantthemes_currency_converter_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_currency_converter_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'currency_converter_style'        => 'one',
					'currency_converter_api_key'      => '',
					'currency_converter_color'        => '',
					'currency_converter_animation'    => '',
					'currency_converter_extra_class'  => '',
					'currency_converter_extra_id'     => '',
					'css'                             => '',
				), $atts
			);
			
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['currency_converter_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );
			
			// GET ID.
			$list_id = $shortcode['currency_converter_extra_id'] ? 'id="' . esc_attr( $shortcode['currency_converter_extra_id'] ) . '"' : '';
			
			// ADD MAIN CSS.
			wp_register_style(
				'radiantthemes_currency_converter_' . $shortcode['currency_converter_style'],
				plugins_url( 'radiantthemes-addons/currency-converter/css/radiantthemes-currency-converter-element-' . $shortcode['currency_converter_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_currency_converter_' . $shortcode['currency_converter_style'] );

			// ADD MAIN JS.
			wp_register_script(
				'radiantthemes_currency_converter_' . $shortcode['currency_converter_style'],
				plugins_url( 'radiantthemes-addons/currency-converter/js/radiantthemes-currency-converter-element-' . $shortcode['currency_converter_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_currency_converter_' . $shortcode['currency_converter_style'] );
			
			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . rand();
			
			if ( ! empty( $shortcode['currency_converter_color'] ) ) {
			// ADD CUSTOM CSS.
			$custom_css = ".radiantthemes-currency-converter.element-one.{$random_class} .radiantthemes-currency-converter-form .radiantthemes-currency-converter-form-row select{
			    color: {$shortcode['currency_converter_color']};
			}";

			wp_add_inline_style( 'radiantthemes_currency_converter_' . $shortcode['currency_converter_style'], $custom_css );
			}
			
			
			// MAIN LAYOUT.
			$output  = '<!-- radiantthemes-currency-converter -->';
            $output .= '<div class="radiantthemes-currency-converter element-' . $shortcode['currency_converter_style'] . ' ' . esc_attr( $random_class ) . ' ' . $animation_classes . ' ' . esc_attr( $css_class ) . ' ' . $shortcode['currency_converter_extra_class'] . '" ' . $list_id . '>';
            	require 'template/template-currency-converter-element-' . $shortcode['currency_converter_style'] . '.php';
            $output .= '</div>';
            $output .= '<!-- radiantthemes-currency-converter -->' . "\r";
			return $output;
		}
	}
}
