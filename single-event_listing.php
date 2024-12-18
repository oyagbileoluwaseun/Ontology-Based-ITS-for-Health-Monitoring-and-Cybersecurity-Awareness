<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="primary" class="content-area <?php if( pbmit_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			the_content( sprintf(
				'',
				get_the_title()
			) );
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();