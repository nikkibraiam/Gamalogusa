<?php
/**
 * Fancy Text Box Template Style Nine
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder matchHeight ' . esc_attr( $fancy_css ) . '">';
    $output .= '<div class="pic">';
        if ( $shortcode['fancy_textbox_icontype'] == 'image' && $shortcode['fancy_textbox_image'] !== '' ) {
            $output .= '<div class="pic-image">';
                $output .= wp_get_attachment_image( $shortcode['fancy_textbox_image'], 'full' );
            $output .= '</div>';
        }
        if ( $shortcode['fancy_textbox_icontype'] == 'icon' && $shortcode['fancy_textbox_icon_icofont'] !== '' ) {
            $output .= '<div class="pic-icon">';
                $output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
            $output .= '</div>';
        }
    $output .= '</div>';
    $output .= '<div class="data">';
        if ( $shortcode['fancy_textbox_title'] !== '' ) {
            $output .= '<h3 class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ). '</h3>';
        }
        if ( $shortcode['fancy_textbox_subtitle'] !== '' ) {
            $output .= '<p class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ). '</p>';
        }
        if ( $shortcode['fancy_textbox_content'] !== '' ) {
            $output .= '<p class="content">' . wp_kses_post( $shortcode['fancy_textbox_content'] ) . '</p>';
        }
    $output .= '</div>';
$output .= '</div>';
