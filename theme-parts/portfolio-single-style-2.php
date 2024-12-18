<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.2
 */
// Class list
$style			= pbmit_get_base_option('portfolio-single-style');
$single_style	= get_post_meta( get_the_ID(), 'pbmit-portfolio-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list		= 'pbmit-portfolio-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="pbmit-portfolio-single">
		<div class="pbmit-entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'',
				get_the_title()
			) );
			?>
		</div><!-- .entry-content -->
		<?php
		// Prev Next Post Link
		$cpt_name = pbmit_get_base_option('portfolio-cpt-singular-title');
		$next_post = get_next_post();
		$previous_post = get_previous_post();
		the_post_navigation( array(
			'prev_text' => pbmit_esc_kses( '<span class="pbmit-post-nav-icon"><i class="pbmit-base-icon-left-arrow-1"></i><span class="pbmit-post-nav-head">' . sprintf( esc_attr__('Previous Post', 'xcare') , $cpt_name ) . '</span></span><span class="pbmit-post-nav-wrapper">' ) . pbmit_esc_kses( '<span class="pbmit-post-nav nav-title">%title</span> </span>' ),
			'next_text' => pbmit_esc_kses( '<span class="pbmit-post-nav-icon"><span class="pbmit-post-nav-head">' . sprintf( esc_attr__('Next Post', 'xcare') , $cpt_name ) . '</span><i class="pbmit-base-icon-next"></i></span><span class="pbmit-post-nav-wrapper">' ) . pbmit_esc_kses( '<span class="pbmit-post-nav nav-title">%title</span> </span>' ),
		) );
		?>
	</div>
	
</article><!-- #post-## -->
<?php pbmit_related_portfolio(); ?>
<?php pbmit_edit_link(); ?>