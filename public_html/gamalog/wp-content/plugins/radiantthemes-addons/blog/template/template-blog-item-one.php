<?php
/**
 * Template for Blog Item One.
 *
 * @package Radiantthemes
 */

$output .= '<!-- blog-item -->';
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder matchHeight">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/Blank-Image-100x71.png' ) . '" alt="blank image" width="100" height="71">';
            $output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></div>';
            $output .= '<a class="pic-overlay" href="' . get_the_permalink() . '"></a>';
        $output .= '</div>';
        $output .= '<div class="data">';
            $output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
            $output .= '<ul class="meta-data">';
                $output .= '<li class="date"><i class="fa fa-clock-o"></i>' . get_the_date() . '</li>';
                $output .= '<li class="date"><i class="fa fa-comment-o"></i>' . get_comments_number() . '</li>';
            $output .= '</ul>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
