<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.2
 */

?>
				<?php if( pbmit_check_sidebar() == true ){ ?>
					</div><!-- .row -->
				<?php } ?>
				</div><!-- #content -->
			</div><!-- .site-content-wrap -->
		<?php

		$footer_enable = pbmit_get_base_option('footer-enable');
		if( is_page() || is_singular() || is_home() ){

			$page_id = get_the_ID();
			if( is_home() ){
				$page_id = get_option( 'page_for_posts');
			}

			$post_meta = get_post_meta( $page_id, 'pbmit-footer-hide', true );
			if( $post_meta=='1' ){
				$footer_enable = 0;
			}
		}
		if( $footer_enable==1 ) : ?>			
			<footer id="colophon" class="pbmit-footer-section site-footer <?php pbmit_footer_classes(); ?>">
					<?php get_template_part( 'theme-parts/footer/footer-style',	pbmit_get_base_option('footer-style') ); ?>
			</footer><!-- #colophon -->
		<?php endif; ?>

	</div><!-- .site-content-contain -->
</div><!-- #page -->

<div class="pbmit-progress-wrap">
	<svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
	</svg>
</div>
<?php wp_footer(); ?>
</body>
</html>
