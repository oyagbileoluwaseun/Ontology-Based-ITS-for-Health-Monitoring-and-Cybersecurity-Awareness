<?php
/**
 *
 * @package WordPress
 * @subpackage xcare
 * @since 1.0
 * @version 1.0
 */
$burger_menu_floting = pbmit_get_base_option('header-burger-menu-switcher');
?>
<div class="pbmit-header-overlay">
	<?php get_template_part( 'theme-parts/header/pre-header',	pbmit_get_base_option('header-style') ); ?>
	<div class="pbmit-header-height-wrapper" style="min-height:<?php echo pbmit_get_base_option('header-height'); ?>px;">
		<div class="pbmit-main-header-area <?php pbmit_header_class(); ?> <?php pbmit_header_bg_class(); ?>">
			<div class="container">
				<div class="pbmit-header-content d-flex justify-content-between align-items-center">
					<div class="pbmit-logo-button-box">
						<div class="pbmit-logo-menuarea">
							<div class="site-branding pbmit-logo-area">
								<div class="wrap">
									<?php echo pbmit_logo(); ?><!-- Logo area -->
								</div><!-- .wrap -->
							</div><!-- .site-branding -->
						</div>
						<div class="pbmit-button-box">
							<?php pbmit_header_button(); ?>
						</div>
					</div>
					<div class="pbmit-menuarea">
						<!-- Top Navigation Menu -->
						<div class="navigation-top">
							<div class="wrap">
								<nav id="site-navigation" class="main-navigation pbmit-navbar <?php pbmit_nav_class(); ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'xcare' ); ?>">
									<?php wp_nav_menu( array(
										'theme_location' => 'pbminfotech-top',
										'menu_id'		 => 'pbmit-top-menu',
										'menu_class'	 => 'menu',
									) ); ?>
								</nav><!-- #site-navigation -->
							</div><!-- .wrap -->
						</div><!-- .navigation-top -->
					</div>
					<div class="pbmit-right-box d-flex align-items-center">
						<div class="pbmit-search-cart-box">
							<?php pbmit_header_search(); ?>
							<?php pbmit_cart_icon(); ?>
						</div>
						<div class="pbmit-button-box-second">
							<?php pbmit_header_button_second(); ?>
						</div>
						<div class="pbmit-burger-menu-wrapper">
							<div class="pbmit-mobile-menu-bg"></div>
							<button id="menu-toggle" class="nav-menu-toggle">
								<i class="pbmit-base-icon-menu-1"></i>
							</button>
						</div>
						<button class="pbmit-burger-menu-link pbmit-nav-menu-toggle" id="pbmit-menu-toggle">
							<svg class="pbmit-svg-icon" xmlns="http://www.w3.org/2000/svg" width="36" height="21" viewBox="0 0 36 21"><path d="M0,0H36V1H0Z" transform="translate(0 20)"></path><path d="M0,0H36V1H0Z" transform="translate(0 10)"></path><path d="M0,0H36V1H0Z"></path></svg>
						</button>
					</div>
				</div><!-- pbmit-header-content-end -->
			</div><!-- pbmit-header-inner-end -->
		</div><!-- container-end -->
	</div><!-- pbmit-header-height-wrapper-end -->
</div><!-- pbmit-header-overlay-end -->

<div class="pbmit-burger-menu-area pbmit-burger-menu-yes">
	<div class="pbmit-burger-headerarea">
		<span class="pbmit-closepanel">
			<svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 26.163 26.163"><rect width="70" height="1" transform="translate(0.707) rotate(45)"></rect><rect width="70" height="1" transform="translate(0 25.456) rotate(-45)"></rect></svg>
		</span>
	</div>

	<div class="pbmit-burger-menu-area-inner">
		<div class="pbmit-burger-logo-area">
			<?php echo pbmit_logo(); ?>
		</div>
		<?php if( $burger_menu_floting == true ) { ?>
			<div class="pbmit-burger-content">
				<div class="pbmit-burger-content-scoialbox-icon">					
					<?php echo pbmit_esc_kses( do_shortcode('[pbmit-social-links]') ); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
