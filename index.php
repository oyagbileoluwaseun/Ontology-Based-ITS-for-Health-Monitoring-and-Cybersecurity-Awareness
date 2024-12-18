<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :
			$blogroll_view		= pbmit_get_base_option('blogroll-view');
			$columns			= pbmit_get_base_option('blogroll-column');
			$style				= str_replace('style-','', $blogroll_view );
			$select_blogroll_view	= pbmit_get_base_option('blogroll-view-select');
			if($style!='classic') { ?>
				<div class="pbmit-element-posts-wrapper row multi-columns-row">
			<?php }
			/* Start the Loop */
			$odd_even		= 'odd';
			$col_odd_even	= 'odd';
			$x				= 1;
			while ( have_posts() ) : the_post();
				if( $select_blogroll_view=='classic' ){
					get_template_part( 'theme-parts/post', 'classic' );
				} else {
					if( file_exists( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) ) ){
						echo pbmit_element_block_container( array(
							'position'		=> 'start',
							'column'		=> $columns,
							'cpt'			=> 'blog',
							'taxonomy'		=> 'category',
							'style'			=> $style,
							'odd_even'		=> $odd_even,
							'col_odd_even'	=> $col_odd_even,
						) );
						// calling template
						include( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) );
						echo pbmit_element_block_container( array(
							'position'	=> 'end',
						) );

						// odd or even
						if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
						if( !empty($columns) ){
							if( $x % $columns == 0 ){
								if( $col_odd_even == 'odd' ){ $col_odd_even = 'even'; } else { $col_odd_even = 'odd'; }
							}
						}
						$x++;

					} else {
						echo '<!-- Template file not found -->';
					}
				} // else
			endwhile;
			if($style!='classic') { ?>
				</div><!-- .pbmit-element-posts-wrapper -->
			<?php }
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