<?php
/**
 * Template for Case Studies Slider Style One
 *
 * @package RadiantThemes
 */
if( 'all' == $shortcode['case_studies_category'] || '' == $shortcode['case_studies_category'])
{
	$case_studies_category = '';
}else {
	$case_studies_category =  array(
		array(
			'taxonomy' => 'case-study-category',
			'field' => 'slug',
			'terms' => esc_attr( $shortcode['case_studies_category'] )
		)
	);
}
$output = '<div class="row radiantthemes-case-studies-slider element-one ' . esc_attr( $random_class ) . esc_attr( $enable_zoom ) . '">';

// WP_Query arguments.
global $wp_query;
$c=0;
$args     = array(
	'post_type'      => 'case-studies',
	'posts_per_page' => 3,
	'orderby'        => esc_attr( $shortcode['case_studies_slider_looping_order'] ),
	'order'          => esc_attr( $shortcode['case_studies_slider_looping_sort'] ),
	'tax_query'      => $case_studies_category
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'case-study-category' );
		if( !($c%3) ) {
    		$output .= '<!-- radiantthemes-case-studies-slider-item -->';
    		$output .= '<div class="radiantthemes-case-studies-slider-item first-item col-lg-6 col-md-6 col-sm-12 col-xs-12">';
    		    $output .= '<div class="holder matchHeight">';
    		        $output .= '<div class="table">';
    		            $output .= '<div class="table-cell">';
            	            $output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"></div>';
            		        $output .= '<div class="gradiant-overlay"></div>';
                			$output .= '<div class="data">';
                	            $output .= '<ul class="category-list">';
                        		    foreach ( $terms as $term ) {
                            			$output .= '<li>'. $term->name . '</li>';
                            		}
                            	 $output .= '</ul>';
                            	 $output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
                	            $output .= '<p class="excerpt">' . get_the_excerpt() . '</p>';
                	            $output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('Read More', 'radiantthemes-addon') . '</a>';
                			$output .= '</div>';
                			if ( 'yes' === $shortcode['case_studies_slider_enable_zoom'] ) {
            		            $output .= '<a class="zoom-overlay fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"></a>';
            		        }
    		            $output .= '</div>';
    		        $output .= '</div>';
    		    $output .= '</div>';
    		$output .= '</div>';
    		$output .= '<!-- radiantthemes-case-studies-slider-item -->';
		} else {
    		$output .= '<!-- radiantthemes-case-studies-slider-item -->';
    		$output .= '<div class="radiantthemes-case-studies-slider-item second-item col-lg-3 col-md-3 col-sm-6 col-xs-12">';
    		    $output .= '<div class="holder matchHeight">';
    		        $output .= '<div class="pic">';
    		            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/case-studies-slider/images/Blank-Image-100x65.png' ) . '" alt="blank image" width="100" height="65">';
    		            if ( 'yes' === $shortcode['case_studies_slider_enable_zoom'] ) {
        		            $output .= '<a class="pic-main fancybox" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"></a>';
        		        } else {
        		            $output .= '<a class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')" href="' . get_the_permalink() . '"></a>';
        		        }
    		        $output .= '</div>';
        			$output .= '<div class="data">';
        	            $output .= '<ul class="category-list">';
                		    foreach ( $terms as $term ) {
                    			$output .= '<li>'. $term->name . '</li>';
                    		}
                    	 $output .= '</ul>';
        	            $output .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
        	            $output .= '<p class="excerpt">' . get_the_excerpt() . '</p>';
        			$output .= '</div>';
    		    $output .= '</div>';
    		$output .= '</div>';
    		$output .= '<!-- radiantthemes-case-studies-slider-item -->';
		}
		$c++;
	endwhile;
}
$output .= '</div>';