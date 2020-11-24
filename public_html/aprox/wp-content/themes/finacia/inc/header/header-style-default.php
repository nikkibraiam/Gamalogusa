<?php
/**
 * Template for Default Header
 *
 * @package finacia
*/
?>

<!-- wraper_header -->
<header class="wraper_header style-default"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
						<?php if ( has_custom_logo() ) { ?>
        						<?php the_custom_logo(); ?>
        				<?php } else { ?>
        					    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p></a>
        				<?php } ?>
				</div>
				<!-- brand-logo -->
				<!-- responsive-nav -->
				<div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs">
					<i class="fa fa-bars"></i>
				</div>
				<!-- responsive-nav -->
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<li class="floating-searchbar">
							<i class="fa fa-search"></i>
							<i class="fa fa-times"></i>
							<!-- floating-search-bar -->
							<div class="floating-search-bar">
								<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="form-row">
									<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'finacia' ); ?>" value="" name="s" required>
									<button type="submit"><i class="fa fa-search"></i></button>
								</div>
								</form>
							</div>
							<!-- floating-search-bar -->
						</li>
					</ul>
				</div>
				<!-- header_main_action -->
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<!-- mobile-menu -->
<div class="mobile-menu hidden">
	<!-- mobile-menu-main -->
	<div class="mobile-menu-main">
		<!-- mobile-menu-close -->
		<div class="mobile-menu-close">
			<i class="fa fa-times"></i>
		</div>
		<!-- mobile-menu-close -->
		<!-- mobile-menu-nav -->
		<nav class="mobile-menu-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'top',
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<!-- mobile-menu-nav -->
	</div>
	<!-- mobile-menu-main -->
</div>
<!-- mobile-menu -->
