<?php
/**
 * Template part for displaying WooCommerce Single product view
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.2
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="pbmit-wc-single-classic">
		<?php pbmit_get_featured_data(); ?>
		<div class="pbmit-wc-single-classic-inner">			
			<div class="pbmit-entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					'',
					get_the_title()
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->