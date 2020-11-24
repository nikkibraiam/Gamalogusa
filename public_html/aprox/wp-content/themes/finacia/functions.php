<?php
/**
 * RadiantThemes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RadiantThemes
 */

/**
 * Custom template tags for this theme.
 */

require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */

require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */

require get_parent_theme_file_path( '/inc/customizer.php' );

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Load TGMPA file.
 */
require get_parent_theme_file_path( '/inc/tgmpa/tgmpa.php' );

// Admin pages.
if ( is_admin() ) {
	include_once get_template_directory() . '/inc/radiantthemes-dashboard/rt-admin.php';
}

if ( ! function_exists( 'finacia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function finacia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Finacorp, use a find and replace
		 * to change 'finacia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'finacia', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for woocommerce lightbox gallery.
		*/
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top'             => esc_html__( 'Primary', 'finacia' ),
				'footer'          => esc_html__( 'Footer', 'finacia' ),
				'side-panel-menu' => esc_html__( 'Side Panel Menu', 'finacia' ),
				'full-width-menu' => esc_html__( 'Full Width Menu', 'finacia' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		$finacia_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $finacia_args );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Registers an editor stylesheet for the theme.
		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Muli:400,500,700' );
		add_editor_style( $font_url );
		add_editor_style( 'assets/css/radiantthemes-editor-styles.css' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Require Redux Framework.
		require_once get_parent_theme_file_path( '/inc/redux-framework/admin-init.php' );

		/**
		 * Redux custom css
		 */
		function finacia_custom_redux_css() {
			/**
			 * [finacia_custom_redux_css description]
			 */
			function finacia_override_css_fonts_url() {
				$google_font_url = '';

				/*
				Translators          : If there are characters in your language that are not supported
				by chosen font(s), translate this to 'off'. Do not translate into your own language.
				*/
				if ( 'off' !== _x( 'on', 'Google font: on or off', 'finacia' ) ) {
					$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
				}
				return $google_font_url;
			}
			wp_enqueue_style(
				'finacia-google-fonts',
				finacia_override_css_fonts_url(),
				array(),
				'1.0.0'
			);
			wp_register_style(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/css/jquery.simple-dtpicker.min.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'simple-dtpicker' );

			wp_register_style(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/css/radiantthemes-redux-custom.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-redux-custom' );

			wp_enqueue_script(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/js/jquery.simple-dtpicker.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/js/radiantthemes-redux-custom.js' ),
				array( 'jquery' ),
				false,
				true
			);

		}
		// This example assumes your opt_name is set to finacia_theme_option, replace with your opt_name value.
		add_action( 'redux/page/finacia_theme_option/enqueue', 'finacia_custom_redux_css', 2 );
	}
endif;
add_action( 'after_setup_theme', 'finacia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function finacia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'finacia_content_width', 640 );
}
add_action( 'after_setup_theme', 'finacia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function finacia_widgets_init() {

	// ADD MAIN SIDEBAR.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'finacia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'finacia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// ADD PRODUCT SIDEBAR.
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Product | Sidebar', 'finacia' ),
				'id'            => 'finacia-product-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'finacia' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}

	// ADD FOOTER WIDGET AREA.
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		// finacia Footer Areas.
		for ( $j = 1; $j <= 4; $j++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer | #', 'finacia' ) . $j . '',
					'id'            => 'finacia-footer-area-' . $j,
					'description'   => esc_html__( 'Add widgets here.', 'finacia' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h5 class="widget-title">',
					'after_title'   => '</h5>',
				)
			);
		}
	}

	// ADD HAMBURGER WIDGET AREA.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hamburger | Sidebar', 'finacia' ),
			'id'            => 'finacia-hamburger-sidebar',
			'description'   => esc_html__( 'Add widgets for "Hamburger" menu from here. To turn it on/off please navigate to "Theme Options > Header" and select "Hamburger" for respetive header styles.', 'finacia' ),
			'before_widget' => '<div id="%1$s" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 matchHeight widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);

}
add_action( 'widgets_init', 'finacia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function finacia_scripts() {

	// ENQUEUE STYLESHEETS.
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'font-awesome-css' );
	wp_enqueue_style( 'radiantthemes-all', get_parent_theme_file_uri( '/assets/css/radiantthemes-all.min.css' ), array(), null );
	wp_enqueue_style( 'js-composer-front' );
	wp_enqueue_style( 'radiantthemes-custom', get_parent_theme_file_uri( '/assets/css/radiantthemes-custom.css' ), array(), null );
	wp_enqueue_style( 'radiantthemes-responsive', get_parent_theme_file_uri( '/assets/css/radiantthemes-responsive.css' ), array(), null );

	// CALL RESET CSS IF REDUX NOT ACTIVE.
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
		wp_enqueue_style( 'radiantthemes-reset', get_parent_theme_file_uri( '/assets/css/radiantthemes-reset.css' ), array(), null );

		/**
		 * Load Montserrat Google Font when redux framework is not installed.
		 */
		function finacia_default_google_fonts_url() {
			$google_font_url = '';

			/*
			Translators          : If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			*/
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'finacia' ) ) {
				$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins:700|Muli:400,500,700' ), '//fonts.googleapis.com/css' );
			}
			return $google_font_url;
		}
		wp_enqueue_style(
			'finacia-google-fonts',
			finacia_default_google_fonts_url(),
			array(),
			'1.0.0'
		);
	}

	// ENQUEUE PRELOADER STYLE.
	if ( ! empty( finacia_global_var( 'preloader_switch', '', false ) ) ) {
		wp_enqueue_style(
			'preloader',
			get_parent_theme_file_uri( '/assets/css/spinkit.min.css' ),
			array(),
			null
		);
	}

	// ENQUEUE HEADER STYLE.
	if ( is_404() && ! empty( finacia_global_var( 'error_custom_header_style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . finacia_global_var( 'error_custom_header_style', '', false ),
			get_parent_theme_file_uri( '/assets/css/radiantthemes-' . finacia_global_var( 'error_custom_header_style', '', false ) . '.css' ),
			array(),
			null
		);
	} elseif ( ! empty( finacia_global_var( 'header-style', '', false ) ) ) {
		$id = get_the_ID();

		if ( ( 'default' != get_post_meta( $id, 'selectheader', true ) ) && ( ! empty( get_post_meta( $id, 'selectheader', true ) ) ) ) {
			wp_enqueue_style(
				'radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ),
				get_parent_theme_file_uri( '/assets/css/radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ) . '.css' ),
				array(),
				null
			);
		} else {
			wp_enqueue_style(
				'radiantthemes-' . finacia_global_var( 'header-style', '', false ),
				get_parent_theme_file_uri( '/assets/css/radiantthemes-' . finacia_global_var( 'header-style', '', false ) . '.css' ),
				array(),
				null
			);
		}
	} else {
		wp_enqueue_style(
			'radiantthemes-header-style-default',
			get_parent_theme_file_uri( '/assets/css/radiantthemes-header-style-default.css' ),
			array(),
			null
		);
	}

	// ENQUEUE FOOTER STYLE.
	if ( ! empty( finacia_global_var( 'footer-style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . finacia_global_var( 'footer-style', '', false ),
			get_parent_theme_file_uri( '/assets/css/radiantthemes-' . finacia_global_var( 'footer-style', '', false ) . '.css' ),
			array(),
			null
		);
	} else {
		wp_enqueue_style(
			'radiantthemes-footer-style-one',
			get_parent_theme_file_uri( '/assets/css/radiantthemes-footer-style-one.css' ),
			array(),
			null
		);
	}

	// ENQUEUE STYLE.CSS.
	wp_enqueue_style( 'radiantthemes-style', get_stylesheet_uri() );

	// ENQUEUE RAIDNATTHEMES USER CUSTOM - GERERATED FROM REDUX CUSTOM CSS.
	wp_enqueue_style(
		'radiantthemes-user-custom',
		get_parent_theme_file_uri( '/assets/css/radiantthemes-user-custom.css' ),
		array(),
		time()
	);

	// ENQUEUE RADIANTTHEMES DYNAMIC - GERERATED FROM REDUX FRAMEWORK.
	wp_enqueue_style(
		'radiantthemes-dynamic',
		get_parent_theme_file_uri( '/assets/css/radiantthemes-dynamic.css' ),
		array(),
		time()
	);

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'Radiantthemes_Addons' ) ) {

		$buttonradius  = '';
		$buttonradius  = esc_html( finacia_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( finacia_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( finacia_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( finacia_global_var( 'border-radius', 'margin-top', true ) );

		$buttonborderradius = '.gdpr-notice .btn, .team.element-six .team-item > .holder .data .btn, .radiantthemes-button > .radiantthemes-button-main, .rt-fancy-text-box > .holder > .more .btn, .rt-call-to-action-wraper .rt-call-to-action-item .btn:hover, .radiant-contact-form .form-row input[type=submit], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn {  border-radius:' . $buttonradius . ' ; }';

		wp_enqueue_style(
			'radiantthemes-button-element-one',
			plugins_url( 'radiantthemes-addons/button/css/radiantthemes-button-element-one.css' ),
			plugin_dir_url( __FILE__ ) . 'css/radiantthemes-button-element-one.css',
			array(),
			null
		);
		wp_add_inline_style( 'radiantthemes-button-element-one', $buttonborderradius );
	}

	/**
	 * ENQUEUE SCRIPTS
	 */

	// ENQUEUE BOOTSTRAP JQUERY.
	wp_enqueue_script(
		'bootstrap',
		get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE SIDR JQUERY.
	wp_enqueue_script(
		'sidr',
		get_parent_theme_file_uri( '/assets/js/jquery.sidr.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE MATCHHEIGHT JQUERY.
	wp_enqueue_script(
		'matchHeight',
		get_parent_theme_file_uri( '/assets/js/jquery.matchHeight-min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE WOW JQUERY.
	wp_enqueue_script(
		'wow',
		get_parent_theme_file_uri( '/assets/js/wow.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE NICESCROLL JQUERY.
	wp_enqueue_script(
		'nicescroll',
		get_parent_theme_file_uri( '/assets/js/jquery.nicescroll.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE STICKY JQUERY.
	wp_enqueue_script(
		'sticky',
		get_parent_theme_file_uri( '/assets/js/jquery.sticky.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE RETINA JQUERY.
	wp_enqueue_script(
		'retina',
		get_parent_theme_file_uri( '/assets/js/retina.min.js' ),
		false,
		true
	);

	// ENQUEUE ISOTOPE JQUERY.
	wp_enqueue_script(
		'isotope',
		get_parent_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE RADIANTTHEMES CUSTOM JQUERY.
	wp_enqueue_script(
		'radiantthemes-custom',
		get_parent_theme_file_uri( '/assets/js/radiantthemes-custom.js' ),
		array( 'jquery' ),
		false,
		true
	);


	// Load comment-reply.js into footer.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// enqueue the javascript that performs in-link comment reply fanciness.
		wp_enqueue_script( 'comment-reply' );
	}

	// Load Countdown JS and Coming Soon JS.
	if ( ! is_user_logged_in() && ! empty( finacia_global_var( 'coming_soon_switch', '', false ) ) ) {
		wp_enqueue_script(
			'countdown',
			get_parent_theme_file_uri( '/assets/js/jquery.countdown.min.js' ),
			array( 'jquery' ),
			true
		);
		wp_enqueue_script(
			'radiantthemes-comingsoon',
			get_parent_theme_file_uri( '/assets/js/radiantthemes-comingsoon.js' ),
			array( 'jquery' ),
			true
		);
	}

}
add_action( 'wp_enqueue_scripts', 'finacia_scripts' );

/**
 * RadiantThemes Dynamic CSS.
 */
global $wp_filesystem;

if ( defined( 'FS_CHMOD_FILE' ) ) {
	$chmod = FS_CHMOD_FILE;
} else {
	$chmod = 0644;
}

$radiantthemes_theme_options = get_option( 'finacia_theme_option' );
ob_start();
require_once get_parent_theme_file_path( '/inc/dynamic-style/radiantthemes-dynamic-style.php' );
$css      = ob_get_clean();
$filename = get_parent_theme_file_path( '/assets/css/radiantthemes-dynamic.css' );

if ( empty( $wp_filesystem ) ) {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}

if ( $wp_filesystem ) {
	$wp_filesystem->put_contents(
		$filename,
		$css,
		$chmod // predefined mode settings for WP files.
	);
}

/**
 * Woocommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * [finacia_wrapper_start description]
 */
function finacia_wrapper_start() {
	echo wp_kses_post( '<section id="main">' );
}
add_action( 'woocommerce_before_main_content', 'finacia_wrapper_start', 10 );

/**
 * [finacia_wrapper_end description]
 */
function finacia_wrapper_end() {
	echo wp_kses_post( '</section>' );
}
add_action( 'woocommerce_after_main_content', 'finacia_wrapper_end', 10 );

/**
 * [woocommerce_support description]
 */
function finacia_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'finacia_woocommerce_support' );

// Remove the product rating display on product loops.
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Ajax cart basket.
add_filter( 'woocommerce_add_to_cart_fragments', 'finacia_iconic_cart_count_fragments', 10, 1 );

// Woocommerce product per page.
add_filter( 'loop_shop_per_page', 'finacia_shop_per_page', 20 );

/**
 * Undocumented function
 *
 * @param [type] $cols Column.
 */
function finacia_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = esc_html( finacia_global_var( 'shop-products-per-page', '', false ) );
	return $cols;
}
/**
 * [finacia_iconic_cart_count_fragments description]
 *
 * @param  [type] $fragments description.
 * @return [type]            [description]
 */
function finacia_iconic_cart_count_fragments( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}

/**
 * Set Site Icon
 */
function finacia_site_icon() {
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		if ( finacia_global_var( 'favicon', 'url', true ) ) :
			?>
			<link rel="icon" href="<?php echo esc_url( finacia_global_var( 'favicon', 'url', true ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( finacia_global_var( 'apple-icon', 'url', true ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( finacia_global_var( 'apple-icon', 'url', true ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( finacia_global_var( 'apple-icon', 'url', true ) ); ?>" />
		<?php else : ?>
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-Default.ico' ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-Default.ico' ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-Default.ico' ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/Favicon-Default.ico' ) ); ?>" />
		<?php endif; ?>
		<?php
	}
}
add_filter( 'wp_head', 'finacia_site_icon' );

add_filter(
	'wp_prepare_attachment_for_js',
	function( $response, $attachment, $meta ) {
		if (
			'image/x-icon' === $response['mime'] &&
			isset( $response['url'] ) &&
			! isset( $response['sizes']['full'] )
		) {
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
				),
			);
		}
		return $response;
	},
	10, 3
);

if ( ! function_exists( 'finacia_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function finacia_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next Page &raquo;', 'finacia' ),
				'prev_text' => esc_html__( '&laquo; Previous Page', 'finacia' ),
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php echo wp_kses_post( $paginate_links ); ?>
			</div>

			<?php
		endif;
	}
}


/**
 * Display the breadcrumbs.
 */
function finacia_breadcrumbs() {

	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	if ( ! finacia_global_var( 'breadcrumb_arrow_style', '', false ) ) {
		$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
	} else {
		$delimiter = '<span class="gap"><i class="' . finacia_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
	}

	$home         = esc_html__( 'Home', 'finacia' ); // text for the 'Home' link.
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before       = '<span class="current">'; // tag before the current crumb.
	$after        = '</span>'; // tag after the current crumb.

	global $post;
	$home_link = get_home_url( 'url' );

	if ( is_home() && is_front_page() ) {

		if ( 1 === $show_on_home ) {
			echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'finacia' ) . '</a></div>';
		}
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
		/**
		 * Undocumented function
		 *
		 * @return array
		 */
		function my_woocommerce_breadcrumbs() {
			if ( ! finacia_global_var( 'breadcrumb_arrow_style', '', false ) ) {
				$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
			} else {
				$delimiter = '<span class="gap"><i class="' . finacia_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
			}
			return array(
				'delimiter'   => $delimiter,
				'wrap_before' => '<div id="crumbs" itemprop="breadcrumb">',
				'wrap_after'  => '</div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'finacia' ),
			);
		}
		add_filter( 'woocommerce_breadcrumb_defaults', 'my_woocommerce_breadcrumbs' );
		woocommerce_breadcrumb();
	} else {

		echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'finacia' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
		if ( is_home() ) {
			echo wp_kses_post( $before ) . get_the_title( get_option( 'page_for_posts', true ) ) . wp_kses_post( $after );
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			if ( 0 != $this_cat->parent ) {
				echo wp_kses_post( get_category_parents( $this_cat->parent, true, ' ' . wp_kses_post( $delimiter ) . ' ' ) );
			}
			echo wp_kses_post( $before ) . esc_html__( 'Archive by category "', 'finacia' ) . single_cat_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_search() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Search results for "', 'finacia' ) . get_search_query() . '"' . wp_kses_post( $after );
		} elseif ( is_day() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . esc_html( get_the_time( 'd' ) ) . wp_kses_post( $after );
		} elseif ( is_month() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . esc_html( get_the_time( 'F' ) ) . wp_kses_post( $after );
		} elseif ( is_year() ) {
			echo wp_kses_post( $before ) . esc_html( get_the_time( 'Y' ) ) . wp_kses_post( $after );
		} elseif ( class_exists( 'Tribe__Events__Main' ) && ( is_singular( 'tribe_events' ) || ( tribe_is_past() || tribe_is_upcoming() && ! is_tax() ) || ( tribe_is_month() && ! is_tax() ) || ( tribe_is_day() && ! is_tax() ) ) ) {
			echo wp_kses_post( $before ) . esc_html( finacia_global_var( 'event_banner_title', '', false ) ) . wp_kses_post( $after );
		} elseif ( is_single() && ! is_attachment() ) {
			if ( 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;

				$cpost_label = $slug['slug'];
				$cpost_label = implode( '-', array_map( 'ucfirst', explode( '-', $cpost_label ) ) );
				$cpost_label = str_replace( '-', ' ', $cpost_label );

				if ( 'team' == get_post_type() || 'portfolio' == get_post_type() || 'case-studies' == get_post_type() ) {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $cpost_label ) . '</a>';
				} else {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
				}

				if ( 1 == $show_current ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' . wp_kses_post( $delimiter ) . ' ' );
				if ( 0 == $show_current ) {
					$cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
				}
				echo wp_kses_post( $cats );
				if ( 1 == $show_current ) {
					echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			}
		} elseif ( ! is_single() && ! is_page() && 'post' != get_post_type() && ! is_404() ) {
			$post_type = get_post_type_object( get_post_type() );
			echo wp_kses_post( $before ) . esc_html( $post_type->labels->singular_name ) . wp_kses_post( $after );
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo wp_kses_post( get_category_parents( $cat, true, ' ' . $delimiter . ' ' ) );
			echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 == $show_current ) {
				echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs       = array_reverse( $breadcrumbs );
			$count_breadcrumbs = count( $breadcrumbs );
			for ( $i = 0; $i < $count_breadcrumbs; $i++ ) {
				echo wp_kses_post( $breadcrumbs[ $i ] );
				if ( ( count( $breadcrumbs ) - 1 ) != $i ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ';
				}
			}
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_tag() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Posts tagged "', 'finacia' ) . single_tag_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo wp_kses_post( $before ) . esc_html__( 'Articles posted by ', 'finacia' ) . esc_html( $userdata->display_name ) . wp_kses_post( $after );
		} elseif ( is_404() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Error 404', 'finacia' ) . wp_kses_post( $after );
		}

		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html_e( 'Page', 'finacia' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}

		echo '</div>';
	}
}

/**
 * [finacia_template_caching description]
 *
 * @param  WP_Screen $current_screen description.
 */
function finacia_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash    = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label         = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'finacia_template_caching' );

/**
 * Undocumented function
 *
 * @param [type] $url check link.
 */

function rt_check_url( $url ) {
	$headers = @get_headers( $url );
	$headers = ( is_array( $headers ) ) ? implode( "\n ", $headers ) : $headers;
	return (bool) preg_match( '#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers );
}

if ( 'success' === get_option( 'radiant_purchase_validation', '' ) ) {

	if ( ! function_exists( 'finacia_import_files' ) ) :

		/**
		 * [finacia_import_files description]
		 */
		function finacia_import_files() {
            if ( class_exists( 'woocommerce' ) ) {
				$local_import_file = get_parent_theme_file_path( '/inc/import/content.xml' );
			} else {
			    $local_import_file = get_parent_theme_file_path( '/inc/import/content-1.xml');
			}

			return array(
				array(
					'import_file_name'             => esc_html__( 'Demo One', 'finacia' ),
					'import_file_key'              => 'demo-1',
					'categories'                   => array( '' ),
					'local_import_file'            => $local_import_file,
					'local_import_widget_file'     => get_parent_theme_file_path( '/inc/import/widgets.wie' ),
					'local_import_redux'           => array(
						array(
							'file_path'   => get_parent_theme_file_path( '/inc/import/redux.json' ),
							'option_name' => 'finacia_theme_option',
						),
					),
					'import_notice'                => esc_html__( 'By clicking import button, you’re sending a file download request to our server which might get stored in server log. Also, by clicking import button, you’re giving consent to download demo content data from our server.', 'finacia' ),
					'preview_url'                  => '//themes.radiantthemes.com/finacia/',
				),
			);
		}
		add_filter( 'pt-ocdi/import_files', 'finacia_import_files' );
	endif;

	if ( ! function_exists( 'finacia_after_import' ) ) :
		/**
		 * [finacia_after_import description]
		 *
		 * @param  [type] $selected_import description.
		 */
		function finacia_after_import( $selected_import ) {

			// Set Menu.
			$main_menu       = get_term_by( 'name', 'Header Menu', 'nav_menu' );
			$footer_menu     = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			$full_width_menu = get_term_by( 'name', 'Minimal Header Menu', 'nav_menu' );
			set_theme_mod(
				'nav_menu_locations',
				array(
					'top'             => $main_menu->term_id,
					'footer'          => $footer_menu->term_id,
					'full-width-menu' => $full_width_menu->term_id,
				)
			);

			// Set Front page.
			$home_page = get_page_by_title( 'Home Version One' );
			if ( isset( $home_page->ID ) ) :
				update_option( 'page_on_front', $home_page->ID );
				update_option( 'show_on_front', 'page' );
			endif;

			// Set Blog page.
			$blog_page = get_page_by_title( 'Blog' );
			if ( isset( $blog_page->ID ) ) {
				update_option( 'page_for_posts', $blog_page->ID );
			}

			$old_url        = 'https://themes.radiantthemes.com/finacia';
			$old_url_encode = rawurlencode( 'https://themes.radiantthemes.com/finacia' );
			$new_url        = site_url();
			$new_url_encode = rawurlencode( site_url() );

			global $wpdb;

			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->options SET option_value = replace(option_value, %s, %s) WHERE option_name = 'home' OR option_name = 'siteurl'", $old_url, $new_url ) );

			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)", $old_url, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)", $old_url_one, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)", $old_url_encode, $new_url_encode ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)", $old_url_one_encode, $new_url_encode ) );

			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)", $old_url, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)", $old_url_one, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)", $old_url_encode, $new_url_encode ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)", $old_url_one_encode, $new_url_encode ) );

			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)", $old_url, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)", $old_url_one, $new_url ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)", $old_url_encode, $new_url_encode ) );
			$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)", $old_url_one_encode, $new_url_encode ) );

			$favicon_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Favicon-Default.ico' ),
			);
			$apple_icon_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Apple-Touch-Icon-192x192-Default.png' ),
			);
			$header_one_logo_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Logo-Default-White-Orange.png' ),
			);
			$header_two_logo_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Logo-Default-White-Violet.png' ),
			);
			$header_three_logo_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Logo-Default-Black-Orange.png' ),
			);
			$header_four_logo_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Logo-Default-White-Green.png' ),
			);
			$header_six_logo_array = array(
				'url'       => site_url( '/wp-content/themes/finacia/assets/images/Logo-Default-White-Red.png' ),
			);
			$footer_two_background_array['media'] = array(
				'thumbnail' => site_url( '/wp-content/uploads/2018/09/Footer-Background-Image.png' ),
			);
			$error_one_background_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/404-Error-Style-One-Background-Image.png' ),
			);
			$error_one_array = array(
				'url' => site_url( '/wp-content/themes/finacia/assets/images/404-Error-Style-One-Image.png' ),
			);
			$error_two_array = array(
				'url' => site_url( '/wp-content/themes/finacia/assets/images/404-Error-Style-Two-Image.png' ),
			);
			$error_three_array = array(
				'url' => site_url( '/wp-content/themes/finacia/assets/images/404-Error-Style-Three-Image.png' ),
			);
			$error_four_array = array(
				'url' => site_url( '/wp-content/themes/finacia/assets/images/404-Error-Style-Four-Image.png' ),
			);
			$maintenance_mode_one_background_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Maintenance-More-Style-One-Image.png' ),
			);
			$maintenance_mode_two_background_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Maintenance-More-Style-Two-Image.png' ),
			);
			$maintenance_mode_three_background_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Maintenance-More-Style-Three-Image.png' ),
			);
			$coming_soon_one_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Coming-Soon-Style-One-Background-Image.png' ),
			);
			$coming_soon_two_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Coming-Soon-Style-Two-Background-Image.png' ),
			);
			$coming_soon_three_array = array(
				'background-image' => site_url( '/wp-content/themes/finacia/assets/images/Coming-Soon-Style-Three-Background-Image.png' ),
			);

			Redux::setOption( 'finacia_theme_option', 'favicon', $favicon_array );
			Redux::setOption( 'finacia_theme_option', 'apple-icon', $apple_icon_array );
			Redux::setOption( 'finacia_theme_option', 'header_one_logo', $header_one_logo_array );
			Redux::setOption( 'finacia_theme_option', 'header_two_logo', $header_two_logo_array );
			Redux::setOption( 'finacia_theme_option', 'header_three_logo', $header_three_logo_array );
			Redux::setOption( 'finacia_theme_option', 'header_four_logo', $header_four_logo_array );
			Redux::setOption( 'finacia_theme_option', 'header_six_logo', $header_six_logo_array );
			Redux::setOption( 'finacia_theme_option', 'footer_two_background', $footer_two_background );
			Redux::setOption( 'finacia_theme_option', '404_error_one_background', $error_one_background_array );
			Redux::setOption( 'finacia_theme_option', '404_error_one_image', $error_one_array );
			Redux::setOption( 'finacia_theme_option', '404_error_two_image', $error_two_array );
			Redux::setOption( 'finacia_theme_option', '404_error_three_image', $error_three_array );
			Redux::setOption( 'finacia_theme_option', '404_error_four_image', $error_four_array );
			Redux::setOption( 'finacia_theme_option', 'maintenance_mode_one_background', $maintenance_mode_one_background_array );
			Redux::setOption( 'finacia_theme_option', 'maintenance_mode_two_background', $maintenance_mode_two_background_array );
			Redux::setOption( 'finacia_theme_option', 'maintenance_mode_three_background', $maintenance_mode_three_background_array );
			Redux::setOption( 'finacia_theme_option', 'coming_soon_one_background', $coming_soon_one_array );
			Redux::setOption( 'finacia_theme_option', 'coming_soon_two_background', $coming_soon_two_array );
			Redux::setOption( 'finacia_theme_option', 'coming_soon_three_background', $coming_soon_three_array );

			$widget_media           = get_option( 'widget_media_image' );
			$widget_media[1]['url'] = site_url( '/wp-content/uploads/2018/10/Logo-Default-White-Violet.png' );
			$widget_media[2]['url'] = site_url( '/wp-content/uploads/2018/09/Logo-Default-Black-Orange.png' );
			update_option( 'widget_media_image', $widget_media );
		}
		add_action( 'pt-ocdi/after_import', 'finacia_after_import' );
	endif;

	add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

}

/**
 * Change slug of custom post types
 *
 * @param  [type] $args      description.
 * @param  [type] $post_type description.
 * @return [string]
 */
function finacia_register_post_type_args( $args, $post_type ) {

	if ( 'portfolio' === $post_type ) {
		$args['rewrite']['slug'] = finacia_global_var( 'change_slug_portfolio', '', false );
	}

	if ( 'team' === $post_type ) {
		$args['rewrite']['slug'] = finacia_global_var( 'change_slug_team', '', false );
	}

	if ( 'case-studies' === $post_type ) {
		$args['rewrite']['slug'] = finacia_global_var( 'change_slug_casestudies', '', false );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'finacia_register_post_type_args', 10, 2 );

/**
 * Add new mimes for custom font upload
 */
if ( ! function_exists( 'finacia_upload_mimes' ) ) {
	/**
	 * [finacia_upload_mimes description]
	 *
	 * @param array $existing_mimes description.
	 */
	function finacia_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['ttf']  = 'application/x-font-ttf';
		$existing_mimes['svg']  = 'font/svg';
		$existing_mimes['eot']  = 'font/eot';
		return $existing_mimes;
	}
}
add_filter( 'upload_mimes', 'finacia_upload_mimes' );

/**
 * UNWANTED NOTICE REMOVE
 *
 * @return void
 */
function radiantthemes_unwanted_notice_remove() {
	echo '<style type="text/css">.rs-update-notice-wrap,.vc_license-activation-notice{display:none;}</style>';
}
add_action( 'admin_head', 'radiantthemes_unwanted_notice_remove' );

/**
 * Undocumented function
 *
 * @return void
 */
function enqueue_scripts() {

	$validate_old_theme = get_option( 'radiant_purchase' ) && ! get_option( 'radiant_purchase_validation' ) ? true : false;

	wp_enqueue_style(
		'radiantthemes-admin-styles',
		get_template_directory_uri() . '/inc/radiantthemes-dashboard/css/admin-pages.css'
	);

	wp_enqueue_script(
		'radiantthemes-admin-script',
		get_parent_theme_file_uri( '/inc/radiantthemes-dashboard/js/admin-pages.js' ),
		array( 'jquery' ),
		false,
		true
	);

	wp_localize_script(
		'radiantthemes-admin-script', 'ajaxObject', array(
			'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
			'colornonce'         => wp_create_nonce( 'colorCategoriesNonce' ),
			'validate_old_theme' => $validate_old_theme,
		)
	);
}
add_action( 'admin_enqueue_scripts', 'enqueue_scripts' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_dashboard_submenu_page() {
	add_submenu_page(
		'themes.php',
		'RadiantThemes Dashboard',
		'RadiantThemes Dashboard',
		'manage_options',
		'radiantthemes-dashboard',
		'radiantthemes_screen_welcome'
	);
}
add_action( 'admin_menu', 'radiantthemes_dashboard_submenu_page' );

/**
 * Undocumented function
 *
 * @return void
 */
function radiantthemes_screen_welcome() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/welcome.php' );
}

function radiantthemes_plugins_submenu_page() {

	add_submenu_page(
		'themes.php',
		'Radiantthemes Install Plugins',
		'Radiantthemes Install Plugins',
		'manage_options',
		'radiantthemes-admin-plugins',
		'radiantthemes_screen_plugin'
	);

}
add_action( 'admin_menu', 'radiantthemes_plugins_submenu_page' );

function radiantthemes_screen_plugin() {

	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/install-plugins.php' );

}

/**
 * Redirect to welcome page
 *
 * @return void
 */
function after_switch_theme() {
	if ( current_user_can( 'manage_options' ) ) {
		wp_safe_redirect( admin_url( 'themes.php?page=radiantthemes-dashboard' ) );
	}
}
add_action( 'after_switch_theme', 'after_switch_theme' );

/**
 * Check Purchase Code
 */
function get_purchase_code() {

	check_ajax_referer( 'colorCategoriesNonce', 'nonce' );

	$purchase_code     = $_POST['purchaseCodeVal'];
	$purchase_code_val = trim( $purchase_code );
	$user_name         = $_POST['userNameVal'];
	$user_name_val     = trim( $user_name );

	update_option( 'radiant_purchase', $purchase_code_val );
	update_option( 'radiant_user_name', $user_name_val );

	$verify_url = "https://api.envato.com/v3/market/author/sale?code={$purchase_code_val}";

	$headers = array(
		'Authorization' => 'Bearer kJGTj79tKIlW6YuLVXHeKlTHRBpBc1At',
	);

	$request = array(
		'headers' => $headers,
	);

	$get_file = wp_remote_get( $verify_url, $request );

	$data = wp_remote_retrieve_body( $get_file );

	if ( is_wp_error( $data ) ) {
		return false;
	}

	$final_data = json_decode( $data, true );

	$result = ( ( $final_data['buyer'] === $user_name_val ) && 22653109 === $final_data['item']['id'] ) ? 'success' : 'failed';

	update_option( 'radiant_purchase_validation', $result );

	echo esc_html( $result );

	wp_die(); // this is required to terminate immediately and return a proper response.

}
add_action( 'wp_ajax_rtGetPurchaseCode', 'get_purchase_code' );

function ocdi_change_time_of_single_ajax_call() {
	return 5;
}
add_action( 'pt-ocdi/time_for_one_ajax_call', 'ocdi_change_time_of_single_ajax_call' );
