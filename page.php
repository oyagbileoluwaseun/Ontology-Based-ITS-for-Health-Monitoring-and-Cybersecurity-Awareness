<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="primary" class="content-area <?php if( pbmit_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main pbmit-page-content-wrapper">
		<?php
		while ( have_posts() ) : the_post();
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php
						the_content();
						wp_link_pages( array(
							'before'	  => '<div class="pbmit-page-links">' . esc_html__( 'Pages:', 'xcare' ),
							'after'	   => '</div>',
							'link_before' => '<span class="pbmit-page-number">',
							'link_after'  => '</span>',
						) );
					?>
					<h3 class="pbmit-hide"><?php the_title(); ?></h3>
				</div><!-- .entry-content -->
			</div><!-- #post-## -->
			<?php pbmit_edit_link(); ?>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
if( pbmit_check_sidebar() ){
	get_sidebar();
}
?>
<?php get_footer();
