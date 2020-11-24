<?php
/**
 * Header Style Seven Template
 *
 * @package finacia
 */

?>

<!-- wraper_header -->
<?php if ( true == finacia_global_var( 'header_seven_floating', '', false ) ) { ?>
	<header class="wraper_header style-seven floating-header">
<?php } else { ?>
	<header class="wraper_header style-seven static-header">
<?php } ?>
	<!-- wraper_header_main -->
	<?php if ( true == finacia_global_var( 'header_seven_sticky', '', false ) ) { ?>
		<div class="wraper_header_main i-am-sticky">
	<?php } else { ?>
		<div class="wraper_header_main">
	<?php } ?>
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<?php if ( finacia_global_var( 'header_seven_logo', 'url', true ) ) { ?>
					<!-- brand-logo -->
					<div class="brand-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( finacia_global_var( 'header_seven_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( finacia_global_var( 'header_seven_logo', 'alt', true ) ); ?>"></a>
					</div>
					<!-- brand-logo -->
				<?php } ?>
				<?php if ( ( true == finacia_global_var( 'header_seven_menu', '', false ) ) ) : ?>
					<!-- top-bar-toggle -->
					<div class="top-bar-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<!-- top-bar-toggle -->
					<!-- top-bar-menu -->
					<div class="top-bar-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'full-width-menu',
								'fallback_cb'    => false,
							)
						);
						?>
					</div>
					<!-- top-bar-menu -->
				<?php endif; ?>
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == finacia_global_var( 'header_cart_display', '', false ) ) ) : ?>
							<li class="header-cart-bar">
								<a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( true == finacia_global_var( 'header_seven_search_display', '', false ) ) : ?>
							<?php if ( 'floating-search' == finacia_global_var( 'header_seven_search_style', '', false ) ) { ?>
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
							<?php } elseif ( 'flyout-search' == finacia_global_var( 'header_seven_search_style', '', false ) ) { ?>
								<li class="flyout-searchbar-toggle">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
								</li>
							<?php } ?>
						<?php endif; ?>
						<?php if ( true == finacia_global_var( 'header_seven_hamburger_display', '', false ) ) : ?>
							<?php if ( true == finacia_global_var( 'header_seven_hamburger_mobile', '', false ) ) { ?>
								<li class="header-hamburger">
							<?php } else { ?>
								<li class="header-hamburger hidden-sm hidden-xs">
							<?php } ?>
								<?php if ( 'ellipsis' == finacia_global_var( 'header_seven_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-ellipsis-v"></i>
								<?php } elseif ( 'three-bars' == finacia_global_var( 'header_seven_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-bars"></i>
								<?php } elseif ( 'four-bars' == finacia_global_var( 'header_seven_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-justify"></i>
								<?php } elseif ( 'four-bars-left' == finacia_global_var( 'header_seven_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-left"></i>
								<?php } elseif ( 'four-bars-right' == finacia_global_var( 'header_seven_hamburger_iconstyle', '', false ) ) { ?>
									<i class="fa fa-align-right"></i>
								<?php } ?>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == finacia_global_var( 'header_seven_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == finacia_global_var( 'header_seven_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-one">
			<div class="table">
				<div class="table-cell">
					<!-- flyout-search-close -->
					<div class="flyout-search-close">
						<i class="fa fa-times"></i>
					</div>
					<!-- flyout-search-close -->
					<!-- flyout_search -->
					<div class="flyout_search">
						<!-- search-form -->
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-row">
							<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'finacia' ); ?>" value="" name="s" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
						</form>
						<!-- search-form -->
					</div>
					<!-- flyout_search -->
				</div>
			</div>
		</div>
		<!-- wraper_flyout_search -->
	<?php endif; ?>
<?php endif; ?>
