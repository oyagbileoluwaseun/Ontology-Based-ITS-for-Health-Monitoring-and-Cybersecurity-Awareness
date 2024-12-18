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

ob_start();
pbmit_get_featured_data();
$featured = ob_get_contents();
ob_end_clean();
$class = array();

if ( empty ( $featured ) ){
	$class[] = 'pbmit-no-img';
}
if ( !defined ( 'PBM_ADDON_VERSION' ) ){
	$class[] = 'pbmit-default-view';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="pbmit-blog-classic">
		<?php if( defined('PBM_ADDON_VERSION') ) : ?>
		<?php endif; ?>
			<div class="pbmit-img-wrapper">
				<?php pbmit_get_featured_data( array( 'with_link' => false )); ?>
				<?php echo pbmit_meta_category(); ?>
			</div>

		<div class="pbmit-blog-classic-inner">
			<?php
			if( get_post_format()!='status' && get_post_format()!='quote') : ?>

			<?php
			// Meta
			$meta_html = '';
			$meta_html .= pbmit_meta_category( );
			$meta_html .= pbmit_meta_date();
			$meta_html .= pbmit_meta_author();
			$meta_html .= pbmit_meta_comment( true );

			if( get_post_type() == 'post' && !empty($meta_html) ) : ?>					
			<div class="pbmit-blog-meta pbmit-blog-meta-top">						
				<?php echo pbmit_esc_kses($meta_html); ?>
			</div>
			<?php endif; 
			if( get_post_type() == 'post' && !is_singular('post') ){ ?>
				<h3 class="pbmit-post-title">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				</h3>
			<?php } ?>

			<?php endif; ?>

			<div class="pbmit-entry-content">
				<?php
				if( get_post_format()!='quote' ){
					if( is_single() ){
						/* translators: %s: Name of current post */
						the_content( sprintf(
							'',
							get_the_title()
						) );
					} else {
						$limit			= pbmit_get_base_option('blog-classic-limit');
						$limit_switch	= pbmit_get_base_option('blog-classic-limit-switch');
						if ( has_excerpt() ){
							the_excerpt();
							?>
							<div class="pbmit-read-more-link"><a class="pbmit-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More','xcare') ?></span><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a></div>
							<?php
						} else if( $limit>0 && $limit_switch=='1' ){
							$content = get_the_content('',FALSE,'');
							$content = wp_strip_all_tags($content);
							$content = strip_shortcodes($content);
							echo pbmit_esc_kses( wp_trim_words($content, $limit) );
							?>
							<div class="pbmit-read-more-link">						
										<a class="pbmit-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More','xcare') ?></span><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
									</div>
							<?php
						} else {
							/* translators: %s: Name of current post */
							the_content( sprintf(
								'',
								get_the_title()
							) );
							if( !is_single() ){
								global $post;
								if( strpos( $post->post_content, '<!--more-->' ) ) {
									?>
									<div class="pbmit-read-more-link">						
										<a class="pbmit-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More','xcare') ?></span><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
									</div>

									<?php
								}
							}
						}
						?>
						<?php
					}
				}
				wp_link_pages( array(
					'before'	  => '<div class="page-links">' . esc_attr__( 'Pages:', 'xcare' ),
					'after'	   => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php if( is_singular('post') ){ get_template_part( 'theme-parts/post', 'bottom-meta' ); }; ?>
		</div>
	</div>
	<?php
		// Prev Next Post Link
		if( is_singular('post') ){
			$cpt_name = pbmit_get_base_option('post-cpt-singular-title');
			$next_post = get_next_post();
			$previous_post = get_previous_post();
			$prevThumbnail = isset( $previous_post->ID ) ? get_the_post_thumbnail($previous_post->ID,'thumbnail') : '';
			$nextThumbnail = isset( $next_post->ID ) ? get_the_post_thumbnail($next_post->ID,'thumbnail') : '';
			the_post_navigation( array(
				'prev_text' => pbmit_esc_kses( '<span class="pbmit-post-nav-icon"><i class="pbmit-base-icon-left-arrow-1"></i><span class="pbmit-post-nav-head">' . sprintf( esc_attr__('Previous Post', 'xcare') , $cpt_name ) . '</span></span><span class="pbmit-post-nav-wrapper">' ) . pbmit_esc_kses( '<span class="pbmit-post-nav nav-title">%title</span> </span>' ),
				'next_text' => pbmit_esc_kses( '<span class="pbmit-post-nav-icon"><span class="pbmit-post-nav-head">' . sprintf( esc_attr__('Next Post', 'xcare') , $cpt_name ) . '</span><i class="pbmit-base-icon-next"></i></span><span class="pbmit-post-nav-wrapper">' ) . pbmit_esc_kses( '<span class="pbmit-post-nav nav-title">%title</span> </span>' ),
			) );
		}
		?>
			<?php if( is_singular('post') ) : ?>
		<?php pbmit_related_post() ?>
	<?php endif; ?>
	<?php if( is_singular('post') ){
		 get_template_part( 'theme-parts/post', 'author-info' );
	 } ?>
</article><!-- #post-## -->