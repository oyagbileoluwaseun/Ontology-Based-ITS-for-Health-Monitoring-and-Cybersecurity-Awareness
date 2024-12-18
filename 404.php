<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<?php
$heading		= pbmit_get_base_option('error-404-heading');
$text			= pbmit_get_base_option('error-404-text');
$show_search	= pbmit_get_base_option('error-404-show-search');
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found clearfix">
				<div class="page-content">
					<?php if( !empty($heading) ) : ?>
						<h2 class="page-title"><?php echo esc_html($heading); ?></h2>
					<?php endif; ?>
					<?php if( !empty($text) ) : ?>
						<h5 class="footer-message"><?php echo pbmit_esc_kses($text); ?></h5>
					<?php endif; ?>
					<?php
					if( $show_search==true ){
						get_search_form();
					}
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pbmit-home-back"><?php esc_html_e('Back To Home Page','xcare') ?></a>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer();
