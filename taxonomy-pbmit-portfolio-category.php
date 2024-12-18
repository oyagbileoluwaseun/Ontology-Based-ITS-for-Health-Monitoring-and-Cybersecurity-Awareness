<?php
/**
 * The template for displaying category pages
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
	<main id="main" class="site-main">
		<?php
		// Term Description
		$desc = term_description();
		if( !empty($desc) ){
			?>
			<div class="pbmit-term-desc">
				<?php echo do_shortcode( $desc ); ?>
			</div>
			<?php
		}
		?>

		<?php
		// Sub category
		pbmit_sub_category_list();
		?>

		<?php
		$settings = array();
		$settings['style']	= pbmit_get_base_option('portfolio-cat-style');
		$settings['style']	= str_replace('style-','', $settings['style'] );
		$settings['column']	= pbmit_get_base_option('portfolio-cat-column');
		$settings['show']	= pbmit_get_base_option('portfolio-cat-count');
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'portfolio',
			'data'		=> $settings
		) );
		if ( have_posts() ) :
			$style		= pbmit_get_base_option('portfolio-cat-style');
			$column		= pbmit_get_base_option('portfolio-cat-column');
			$style		= str_replace('style-','', $style );
			?>
			<div class="pbmit-element-cat-wrapper row multi-columns-row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if( file_exists( get_template_directory() . '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php' ) ){
					echo pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'portfolio',
						'style'		=> $style,
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php' );
					echo pbmit_element_block_container( array(
						'position'	=> 'end',
					) );
				} else {
					echo '<!-- Template file not found -->';
				}
				?>
				<?php
			endwhile;
			?>
			<?php
			// Ending wrapper of the whole arear
			pbmit_element_container( array(
				'position'	=> 'end',
				'cpt'		=> 'portfolio',
				'data'		=> $settings
			) );
			?>
			<?php
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</div><!-- .pbmit-element-cat-wrapper row multi-columns-row -->
			<?php
			// Pagination
			pbmit_pagination();
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();
