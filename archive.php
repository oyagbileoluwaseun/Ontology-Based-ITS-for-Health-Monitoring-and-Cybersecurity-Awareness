<?php
/**
 * The template for displaying archive pages
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
		$style = '';
		$cpt = 'blog'; 
		if( get_post_type()=='pbmit-portfolio' ){
			$cpt	= 'portfolio';
			$style	= pbmit_get_base_option('portfolio-cat-style');
			$column	= pbmit_get_base_option('portfolio-cat-column');
			$style	= str_replace('style-','', $style );
		} else if( get_post_type()=='pbmit-service' ){	
			$cpt	= 'service';
			$style	= pbmit_get_base_option('service-cat-style');
			$column	= pbmit_get_base_option('service-cat-column');
			$style	= str_replace('style-','', $style );
		} else if( get_post_type()=='pbmit-team-member' ){
			$cpt	= 'team';
			$style	= pbmit_get_base_option('team-group-style');
			$column	= pbmit_get_base_option('team-group-column');
			$style	= str_replace('style-','', $style );
		} else if( get_post_type()=='post' ){
			$cpt	= 'blog';
			$style	= pbmit_get_base_option('blogroll-view');
			$column	= pbmit_get_base_option('blogroll-column');
			$style	= str_replace('style-','', $style );
		}

		if($style!='classic') { ?>
			<div class="pbmit-element-posts-wrapper row multi-columns-row">
		<?php }

		/* Start the Loop */
		while ( have_posts() ) : the_post();
		if( ( get_post_type()=='blog' && $style!='classic' ) || get_post_type()=='pbmit-portfolio' || get_post_type()=='pbmit-team-member' || get_post_type()=='pbmit-service' ){
				if( get_post_type()=='pbmit-service' ){
					// Icon
					$icon_html = '';
					$icon_lib = get_post_meta( get_the_ID(), 'pbmit-service-icon-library', true );
					$icon_class = get_post_meta( get_the_ID(), 'pbmit-service-icon-'.$icon_lib, true );
					if( !empty($icon_class) ){
						$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
					}
					$more_text	= esc_attr__('More','xcare'); // Show
				}
				if( file_exists( get_template_directory() . '/theme-parts/'.$cpt.'/'.$cpt.'-style-'.esc_attr($style).'.php' ) ){
					echo pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> $cpt,
						'style'		=> $style,
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/'.$cpt.'/'.$cpt.'-style-'.esc_attr($style).'.php' );
					echo pbmit_element_block_container( array(
						'position'	=> 'end',
					) );
				} else {
					echo '<!-- Template file not found -->';
				}
			} else {
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'theme-parts/post', 'classic' );
			}
		endwhile;

		if($style!='classic') { ?>
			</div>
		<?php }

		// Pagination
		pbmit_pagination();
	else :
		get_template_part( 'theme-parts/post', 'none' );
	endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();
