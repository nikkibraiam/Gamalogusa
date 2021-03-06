<?php
/**
 * Template Style Two for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/Blank-Image-100x105.png' ) . '" alt="Blank Image" width="100" height="105">';
            if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
            } else {
                $output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
            }
        $output .= '</div>';
        $output .= '<div class="data">';
            if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<h5 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
            } else{
                $output .= '<h5 class="title">' . get_the_title() . '</h5>';
            }
            $terms = get_the_terms( get_the_ID(), 'profession' );
            if ( ! empty( $terms ) ) {
            	foreach ( $terms as $term ) {
            		$output .= '<p class="designation">' . $term->name . '</p>';
            	}
            }
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
