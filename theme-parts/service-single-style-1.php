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
$style		= pbmit_get_base_option('service-single-style');
$single_style	= get_post_meta( get_the_ID(), 'pbmit-service-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list	= 'pbmit-service-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="pbmit-service-single">
		<div class="pbmit-service-feature-image">
			<?php pbmit_get_featured_data( array( 'featured_img_only' => false, 'size' => 'pbmit-img-1010x615', 'with_link' => false ) ); ?>
		</div>			
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
		$cpt_name = pbmit_get_base_option('service-cpt-singular-title');
		the_post_navigation( array(
			'prev_text' => pbmit_esc_kses( '<span class="pbmit-service-nav-icon"><i class="pbmit-base-icon-left-open"></i></span> <span class="pbmit-service-nav-wrapper"><span class="pbmit-service-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'xcare') , $cpt_name ) . '</span>' ) . pbmit_esc_kses( '<span class="pbmit-service-nav nav-title">%title</span> </span>' ),
			'next_text' => pbmit_esc_kses( '<span class="pbmit-service-nav-wrapper"><span class="pbmit-service-nav-head">' . sprintf( esc_attr__('Next %1$s', 'xcare') , $cpt_name ) . '</span>' ) . pbmit_esc_kses( '<span class="pbmit-service-nav nav-title">%title</span> </span> <span class="pbmit-service-nav-icon"><i class="pbmit-base-icon-right-open"></i></span>' ),
		) );
		?>
	</div>
</article><!-- #post-## -->
<?php pbmit_related_service() ?>
<?php pbmit_edit_link(); ?>
