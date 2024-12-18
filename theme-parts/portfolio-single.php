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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<div class="pbmit-portfolio-single">
		<?php pbmit_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full', 'with_link' => false ) ); ?>
		<?php pbmit_portfolio_details_list(); ?>
		<div class="pbmit-entry-content">
			<?php
			if( get_post_format()!='quote' && get_post_format()!='link' ){
				if( is_single() ){
					/* translators: %s: Name of current post */
					the_content( sprintf(
						'',
						get_the_title()
					) );
				} else {
					$limit = pbmit_get_base_option('portfolio-classic-limit');
					if ( has_excerpt() ){
						the_excerpt();
					} else if( $limit>0 ){
						$content = get_the_content('',FALSE,'');
						$content = wp_strip_all_tags($content);
						$content = strip_shortcodes($content);
						echo pbmit_esc_kses( wp_trim_words($content, $limit) );
					} else { 
						/* translators: %s: Name of current post */
						the_content( sprintf(
							'',
							get_the_title()
						) );
					}
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
		// Prev Next Post Link
		if( is_single() ){
			$cpt_name = pbmit_get_base_option('portfolio-cpt-singular-title');
			the_post_navigation( array(
				'prev_text' => pbmit_esc_kses( '<span class="pbmit-portfolio-nav-icon"><i class="pbmit-base-icon-left-open"></i></span> <span class="pbmit-portfolio-nav-wrapper"><span class="pbmit-portfolio-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'xcare') , $cpt_name ) . '</span>' ) . pbmit_esc_kses( '<span class="pbmit-portfolio-nav nav-title">%title</span> </span>' ),
				'next_text' => pbmit_esc_kses( '<span class="pbmit-portfolio-nav-wrapper"><span class="pbmit-portfolio-nav-head">' . sprintf( esc_attr__('Next %1$s', 'xcare') , $cpt_name ) . '</span>' ) . pbmit_esc_kses( '<span class="pbmit-portfolio-nav nav-title">%title</span> </span> <span class="pbmit-portfolio-nav-icon"><i class="pbmit-base-icon-right-open"></i></span>' ),
			) );
		}
		?>
	</div>
</article><!-- #post-## -->