<?php
/**
 * Template Style One Currency Converter
 *
 * @package Radiantthemes
 */
 
$output .= '<div class="radiantthemes-currency-converter-form">';
$output .= '<div class="radiantthemes-currency-converter-form-row">';
$output .= '<input type="hidden" value="' . $shortcode['currency_converter_api_key'] . '" class="RTCCAPIAccessKey">';
$output .= '<input type="number" value="1" class="RTCCFromValueInput">';
$output .= '<select class="RTCCFromValue"></select>';
$output .= '</div>';
$output .= '<label>=</label>';
$output .= '<div class="radiantthemes-currency-converter-form-row">';
$output .= '<input type="number" readonly value="" class="RTCCToValueInput">';
$output .= '<select class="RTCCToValue"></select>';
$output .= '</div>';
$output .= '</div>';
