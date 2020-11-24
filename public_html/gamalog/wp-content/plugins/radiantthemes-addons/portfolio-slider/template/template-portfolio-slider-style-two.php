<?php
/**
 * Template for Portfolio Slider Style Two
 *
 * @package Radiantthemes
 */
if( 'all' == $shortcode['portfolio_category'] || '' == $shortcode['portfolio_category'])
{
	$portfolio_category = '';
}else {
	$portfolio_category =  array(
		array(
			'taxonomy' => 'portfolio-category',
			'field' => 'slug', 
			'terms' => esc_attr( $shortcode['portfolio_category'] ) 
		)
	);
}
$output = '<div class="rt-portfolio-slider element-two owl-carousel ' . esc_attr( $enable_zoom ) . '" data-portfolio-loop="' . esc_attr( $shortcode['portfolio_slider_allow_loop'] ) . '" data-portfolio-autoplay="' . esc_attr( $shortcode['portfolio_slider_allow_autoplay'] ) . '" data-portfolio-autoplaytimeout="' . esc_attr( $shortcode['portfolio_slider_autoplay_timeout'] ) . '" data-portfolio-desktopitem="' . esc_attr( $shortcode['portfolio_slider_items_in_desktop'] ) . '" data-portfolio-tabitem="' . esc_attr( $shortcode['portfolio_slider_items_in_tab'] ) . '" data-portfolio-mobileitem="' . esc_attr( $shortcode['portfolio_slider_items_in_mobile'] ) . '">';

// WP_Query arguments.
global $wp_query;

$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => -1,
	'orderby'        => esc_attr( $shortcode['portfolio_slider_looping_order'] ),
	'order'          => esc_attr( $shortcode['portfolio_slider_looping_sort'] ),
	'tax_query'      => $portfolio_category
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		$output .= '<div class="rt-portfolio-slider-item">';
		    $output .= '<div class="holder">';
		        $output .= '<div class="pic">';
		            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/portfolio-slider/images/Blank-Image-100x115.png' ) . '" alt="blank image" width="100" height="115">';
		            if ( 'yes' === $shortcode['portfolio_slider_enable_zoom'] ) {
		                $output .= '<a class="overlay fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"></a>';
		            } else {
		                $output .= '<a class="overlay" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"></a>';
		            }
		        $output .= '</div>';
    			$output .= '<div class="data">';
        		    $output .= '<p>';
        		    foreach ( $terms as $term ) {
            			$output .= '<span>'. $term->name . '</span>';
            		}
                    $output .= '</p>';
                    $output .= '<h4>' . get_the_title() . '</h4>';
    			$output .= '</div>';
		    $output .= '</div>';
		$output .= '</div>';
	endwhile;
}
$output .= '</div>';