<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_url('https://gmpg.org/xfn/11') ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php pbmit_preloader(); ?>
<?php 
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<div id="page" class="site pbmit-parent-header-style-<?php echo esc_attr(pbmit_get_base_option('header-style')); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'xcare' ); ?></a>
	<header id="masthead" class="site-header pbmit-header-style-<?php echo esc_attr(pbmit_get_base_option('header-style')); ?> <?php pbmit_check_sticky_logo_class(); ?>">
		<div class="pbmit-sticky-header <?php pbmit_sticky_class(); ?>"></div>
		<?php get_template_part( 'theme-parts/header/header-style',	pbmit_get_base_option('header-style') ); ?>
		<?php pbmit_header_slider(); ?>
		<?php get_template_part( 'theme-parts/header/title-bar',	pbmit_get_base_option('header-style') ); ?>
	</header><!-- #masthead -->
	<div class="site-content-contain <?php pbmit_site_content_class(); ?>">
		<div class="site-content-wrap">
			<div id="content" class="site-content container">
				<?php if( pbmit_check_sidebar() == true ){ ?>
					<div class="row multi-columns-row">
				<?php } ?>

				<div class="pbmit-header-search-form-wrapper">
					<div class="pbmit-search-close"><svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163"><rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect><rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect></svg></div>
					<?php get_search_form(); ?>
				</div>