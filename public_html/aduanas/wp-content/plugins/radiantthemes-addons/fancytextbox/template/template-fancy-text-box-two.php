<?php
/**
 * Fancy Text Box Template Style Two
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder matchHeight ' . esc_attr( $fancy_css ) . '">';
    $output .= '<div class="icon">';
        $output .= '<div class="icon-holder">';
            if ( $shortcode['fancy_textbox_icontype'] == 'image' && $shortcode['fancy_textbox_image'] !== '' ) {
                $output .= wp_get_attachment_image( $shortcode['fancy_textbox_image'], 'full' );
            }
            if ( $shortcode['fancy_textbox_icontype'] == 'icon' && $shortcode['fancy_textbox_icon_icofont'] !== '' ) {
                $output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
            }
        $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="heading">';
        if ( $shortcode['fancy_textbox_title'] !== '' ) {
            $output .= '<h3 class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ). '</h3>';
        }
        if ( $shortcode['fancy_textbox_subtitle'] !== '' ) {
            $output .= '<p class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ). '</p>';
        }
    $output .= '</div>';
    if ( $shortcode['fancy_textbox_content'] !== '' ) {
        $output .= '<div class="content">';
            $output .= '<p>' . wp_kses_post( $shortcode['fancy_textbox_content'] ) . '</p>';
        $output .= '</div>';
    }
$output .= '</div>';
