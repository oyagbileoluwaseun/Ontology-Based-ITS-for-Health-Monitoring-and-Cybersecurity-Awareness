<?php
/**
 * Template part for displaying post meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */

?>
<?php if ( is_singular('post') && has_tag() ) { ?>
	<div class="pbmit-blog-meta pbmit-blog-meta-bottom">
		<?php if( has_tag() ) : ?>
		<div class="pbmit-blog-meta-bottom-left">
			<?php echo pbmit_esc_kses( pbmit_meta_tag('') ); // Tag Meta ?>
		</div>
		<?php endif; ?>
	</div>
<?php } ?>