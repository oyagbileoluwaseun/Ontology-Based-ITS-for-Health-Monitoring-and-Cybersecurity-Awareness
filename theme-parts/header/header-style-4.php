<?php
/**
 *
 * @package WordPress
 * @subpackage xcare
 * @since 1.0
 * @version 1.0
 */

$header_social = pbmit_get_base_option('header-social-link');

?>

<div class="pbmit-header-overlay">
	<?php get_template_part( 'theme-parts/header/pre-header',	pbmit_get_base_option('header-style') ); ?>
	<div class="pbmit-header-height-wrapper" style="min-height:<?php echo pbmit_get_base_option('header-height'); ?>px;">
		<div class="pbmit-main-header-area <?php pbmit_header_class(); ?> <?php pbmit_header_bg_class(); ?>">
				<div class="pbmit-header-content">
					<div class="pbmit-header-menu-area">
						<div class="container">
							<div class="pbmit-header-content d-flex align-items-center justify-content-between">
								<div class="pbmit-logo-area d-flex justify-content-between align-items-center">
									<div class="pbmit-logo-area">
										<div class="site-branding pbmit-logo-area">
											<div class="wrap">
												<?php echo pbmit_logo(); ?><!-- Logo area -->
											</div><!-- .wrap -->
										</div><!-- .site-branding -->
									</div><!-- .justify-content-between -->
								</div>
								<!-- Top Navigation Menu -->
								<div class="pbmit-menuarea">
									<div class="navigation-top">
										<div class="wrap">
											<nav id="site-navigation" class="main-navigation pbmit-navbar <?php pbmit_nav_class(); ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'xcare' ); ?>">
												<?php wp_nav_menu( array(
													'theme_location' => 'pbminfotech-top',
													'menu_id'		=> 'pbmit-top-menu',
													'menu_class'	 => 'menu',
												) ); ?>
											</nav><!-- #site-navigation -->
										</div><!-- .wrap -->
									</div>
								</div><!-- .navigation-top -->
								<div class="pbmit-right-box d-flex align-items-center">					
									<div class="pbmit-search-cart-box ">
										<?php pbmit_header_search(); ?>
										<?php pbmit_cart_icon(); ?>
									</div>
									<div class="pbmit-button-box">
										<?php pbmit_header_button_second(); ?>
									</div>
									<div class="pbmit-burger-menu-wrapper">
										<div class="pbmit-mobile-menu-bg"></div>
										<button id="menu-toggle" class="nav-menu-toggle">
											<i class="pbmit-base-icon-menu-1"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div><!-- .pbmit-header-wrapper -->
	</div><!-- .pbmit-header-height-wrapper -->
</div><!-- .pbmit-header-overlay -->
<div class="pbmit-slider-social">
	<?php if( !empty($header_social) ){ 
		echo pbmit_esc_kses( do_shortcode( $header_social ) ); 
	}?>
</div>
