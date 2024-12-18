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
		$atts = array();
		$atts['style']	= pbmit_get_base_option('team-group-style');
		$atts['style']	= str_replace('style-','', $atts['style'] );
		$atts['column']	= pbmit_get_base_option('team-group-column');
		$atts['show']	= pbmit_get_base_option('team-group-count');
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'team-member',
			'data'		=> $atts
		) );
		?>
		<?php
		if ( have_posts() ) :
			$style		= pbmit_get_base_option('team-group-style');
			$column		= pbmit_get_base_option('team-group-column');
			$style		= str_replace('style-','', $style );
			?>
			<div class="pbmit-element-cat-wrapper row multi-columns-row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if( file_exists( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' ) ){
					echo pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'team',
						'style'		=> $style,
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' );
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
				'cpt'		=> 'team-member',
				'data'		=> $atts
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
