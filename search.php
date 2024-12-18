<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="primary" class="content-area <?php if( pbmit_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main pbmit-search-results-container">

	<div class="pbmit-search-results-main-wrapper skltbs-theme-light use-fade">
	<?php
	if ( have_posts() ) {
		?>

		<div class="pbmit-top-search-form">
			<?php get_search_form(); ?>
		</div>
		
			<?php
			$post_type			= array();
			$post_type_count	= array();
			$post_type_new		= array();

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				$post_type[] = get_post_type();
				if( !isset( $post_type_count[ get_post_type() ] ) ){
					$post_type_count[ get_post_type() ] = 1;
				} else {
					$post_type_count[ get_post_type() ] = $post_type_count[ get_post_type() ] + 1;
				}
			endwhile; // End of the loop.

			$post_type = array_unique($post_type); // currently ordered by most releved CPT

			// Remove excluded CPT
			$exclude_cpt = array( 'event_venue', 'event_organizer' , 'attachment', 'pbmit-client', 'elementor_library' );

			foreach( $post_type as $cpt_slug ){
				if ( in_array($cpt_slug, $exclude_cpt) && (($key = array_search($cpt_slug, $post_type)) !== false) ) {
					unset($post_type[$key]);
				}
			}

			// Sorting
			if( in_array('page', $post_type ) ){
				$cpt_slug = 'page';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}

			if( in_array('post', $post_type ) ){
				$cpt_slug = 'post';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}

			if( in_array('pbmit-portfolio', $post_type ) ){
				$cpt_slug = 'pbmit-portfolio';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}

			if( in_array('pbmit-service', $post_type ) ){
				$cpt_slug = 'pbmit-service';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}
			if( in_array('pbmit-team-member', $post_type ) ){
				$cpt_slug = 'pbmit-team-member';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}
			if( in_array('pbmit-testimonial', $post_type ) ){
				$cpt_slug = 'pbmit-testimonial';
				if (($key = array_search($cpt_slug, $post_type)) !== false) {
					unset($post_type[$key]);
				}
				$post_type_obj = get_post_type_object( $cpt_slug );
				$post_type_new[$cpt_slug] = $post_type_obj->label;
			}

			if( !empty($post_type) ){
				foreach( $post_type as $cpt ){
					$post_type_obj = get_post_type_object( $cpt );
					$post_type_new[$cpt] = $post_type_obj->label;
				}

			}

			// tabs
			if( !empty($post_type_new) && count($post_type_new)>0 ){
				$tab_html = '<ul class="pbmit-search-result-tab-links skltbs-tab-group">';
				foreach( $post_type_new as $cpt_slug=>$cpt_name ){
					$tab_html .= '<li class="pbmit-search-result-tab-link skltbs-tab-item">
						<button class="skltbs-tab">' . esc_attr( $cpt_name ) .' <span>' . $post_type_count[ $cpt_slug ] . '</span></button>
					</li>';
				}
				$tab_html .= '</ul>';

				echo pbmit_esc_kses($tab_html);
			}
			?>

			<?php

			$cpt_html = array();

			// Print each tab content
			foreach($post_type_new as $slug=>$name){
				if( !in_array( $slug, $exclude_cpt ) ){
					$cpt_html[$slug]['name']		= $name;
					$cpt_html[$slug]['content']		= array();
					$cpt_html[$slug]['total']		= 0;
					$cpt_html[$slug]['pagination']	= '';
				}
			}

			$post_return = $page_return = '';
			$post_return_total = $page_return_total = 0;

			while ( have_posts() ) : the_post();

				if( get_post_type() == 'post' ){ // Posts
					if( count($cpt_html['post']['content']) < 8 ){
						ob_start();
						echo pbmit_esc_kses('<div class="col-md-6">');
						get_template_part( 'theme-parts/post', 'classic' );
						echo pbmit_esc_kses('</div>');
						$cpt_html['post']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				} else if( get_post_type() == 'pbmit-portfolio' ){ // Portfolio
					if( count($cpt_html['pbmit-portfolio']['content']) < 9 ){
						$style = pbmit_get_base_option('portfolio-cat-style');
						ob_start();
						if( file_exists( get_template_directory() . '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php' ) ){
							echo pbmit_esc_kses('<article class="pbmit-ele pbmit-ele-portfolio pbmit-portfolio-style-'.esc_attr($style).' col-md-4">');
							include( get_template_directory() . '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php' );
							echo pbmit_esc_kses('</article>');
						}
						$cpt_html['pbmit-portfolio']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				} else if( get_post_type() == 'pbmit-service' ){ // Service
					if( count($cpt_html['pbmit-service']['content']) < 9 ){
						$style = pbmit_get_base_option('service-cat-style');
						ob_start();
						if( file_exists( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' ) ){
							echo pbmit_esc_kses('<article class="pbmit-ele pbmit-ele-service pbmit-service-style-'.esc_attr($style).' col-md-4">');
							include( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' );
							echo pbmit_esc_kses('</article>');
						}
						$cpt_html['pbmit-service']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				} else if( get_post_type() == 'pbmit-team-member' ){ // Team Member
					if( count($cpt_html['pbmit-team-member']['content']) < 9 ){
						$style = pbmit_get_base_option('team-group-style');
						ob_start();
						if( file_exists( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' ) ){
							echo pbmit_esc_kses('<article class="pbmit-ele pbmit-ele-team pbmit-team-style-'.esc_attr($style).' col-md-4 col-lg-4">');
							include( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' );
							echo pbmit_esc_kses('</article>');
						}
						$cpt_html['pbmit-team-member']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				}else if( get_post_type() == 'pbmit-testimonial' ){ // Team Member
					if( count($cpt_html['pbmit-testimonial']['content']) < 9 ){
						$style = pbmit_get_base_option('testimonial-default-view');
						ob_start();
						if( file_exists( get_template_directory() . '/theme-parts/testimonial/testimonial-style-'.esc_attr($style).'.php' ) ){
							echo pbmit_esc_kses('<article class="pbmit-ele pbmit-ele-testimonial pbmit-testimonial-style-'.esc_attr($style).' col-md-4 col-lg-4">');
							include( get_template_directory() . '/theme-parts/testimonial/testimonial-style-'.esc_attr($style).'.php' );
							echo pbmit_esc_kses('</article>');
						}
						$cpt_html['pbmit-testimonial']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				} else if( get_post_type() == 'event_listing' ){ // Events
					if( count($cpt_html['event_listing']['content']) < 9 ){
						$style = '1';
						ob_start();
						if( file_exists( get_template_directory() . '/wp-event-manager/content-event_listing.php' ) ){
							include( get_template_directory() . '/wp-event-manager/content-event_listing.php' );
						}
						$cpt_html['event_listing']['content'][] = ob_get_contents();
						ob_end_clean();
					}
					$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;

				} else {
					if( !in_array( get_post_type(), $exclude_cpt ) ){
						if( !isset($cpt_html[ get_post_type() ]['content']) ){
							$cpt_html[ get_post_type() ]			= array();
							$cpt_html[ get_post_type() ]['content']	= array();
							$cpt_html[ get_post_type() ]['total']	= 0;

							// name
							$post_type_obj = get_post_type_object( get_post_type() );
							$cpt_html[ get_post_type() ]['name'] = $post_type_obj->label;

						}
						if( count($cpt_html[ get_post_type() ]['content']) < 20 ){
							$cpt_html[ get_post_type() ]['content'][] = '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
						}
						$cpt_html[ get_post_type() ]['total'] = $cpt_html[ get_post_type() ]['total'] + 1;
					}
				}

			endwhile; // End of the loop.

			// Print each tab content
			echo pbmit_esc_kses('<div class="pbmit-search-result-tab-content-wrapper skltbs-panel-group">');
			echo pbmit_esc_kses('<div class="pbmit-search-result-loader"></div>');
			foreach( $cpt_html as $slug=>$data ){

				// Load More button
				$more_btn		= '';
				$link			= get_site_url() . '/page/2/?s='.get_query_var('s').'&post_type='.$slug;
				$global_link	= get_site_url() . '/?s='.get_query_var('s');

				$global_btn = '<div class="pbmit-search-results-back-global-btn"><a href="'.esc_url($global_link).'">'.esc_attr__( 'Back to Global Search Results', 'xcare' ).'</a></div>';
				if( in_array( $slug, array('pbmit-portfolio', 'pbmit-service', 'pbmit-team-member','pbmit-testimonial', 'event_listing') ) ){
					if( $data['total'] > 9 ){
						$more_btn = '<div class="pbmit-search-results-load-btn"><a href="'.esc_url($link).'"><span>'.esc_attr__( 'Load More', 'xcare' ).'</span></a></div>';
					}
				} else if( in_array( $slug, array('post') ) ){
					if( $data['total'] > 8 ){
						$more_btn = '<div class="pbmit-search-results-load-btn"><a href="'.esc_url($link).'"><span>'.esc_attr__( 'Load More', 'xcare' ).'</span></a></div>';
					}
				} else { // page and other cpt
					if( $data['total'] > 20 ){
						$more_btn = '<div class="pbmit-search-results-load-btn"><a href="'.esc_url($link).'"><span>'.esc_attr__( 'Load More', 'xcare' ).'</span></a></div>';
					}
				}

				$cpt_only_name = str_replace('pbmit-','',$slug);

				echo pbmit_esc_kses('<div class="pbmit-search-result-cpt pbmit-search-result-'.esc_attr( $slug ).' skltbs-panel" id="pbmit-result-'.esc_attr( $cpt_only_name ).'">');
					echo pbmit_esc_kses('<h3>'.esc_attr( $data['name'] ).'</h3>');

					if( in_array( $slug, array('pbmit-portfolio', 'pbmit-service', 'pbmit-team-member','pbmit-testimonial') ) ){
						echo pbmit_esc_kses('<div class="pbmit-element-posts-wrapper row multi-columns-row">');
					} else if( in_array( $slug, array('event_listing') ) ){
						echo pbmit_esc_kses('<div class="wpem-main wpem-event-listings event_listings wpem-row wpem-event-listing-box-view">');
					} else if( in_array( $slug, array('post') ) ){
						echo pbmit_esc_kses('<div class="pbmit-element-posts-wrapper row multi-columns-row">');
					} else {
						echo pbmit_esc_kses('<ul>');
					}

					foreach( $data['content'] as $content ){
						echo pbmit_esc_kses($content);
					}

					if( in_array( $slug, array('pbmit-portfolio', 'pbmit-service', 'pbmit-team-member', 'pbmit-testimonial') ) ){
						echo pbmit_esc_kses('</div>');
					} else if( in_array( $slug, array('event_listing') ) ){
						echo pbmit_esc_kses('</div>');
					} else if( in_array( $slug, array('post') ) ){
						echo pbmit_esc_kses('</div>');
					} else {
						echo pbmit_esc_kses('</ul>');
					}

					// Load More button
					if( !empty($more_btn) ){
						echo pbmit_esc_kses($more_btn);
					}

					// Back to Global Results button
					if( get_query_var('post_type')!='' && get_query_var('post_type')!='any' ){
						echo pbmit_pagination();
						echo pbmit_esc_kses($global_btn);
					}

				echo pbmit_esc_kses('</div>');
			}
			echo pbmit_esc_kses('</div>');

			/* ********************************************************************** */
		} else { ?>
			<?php
			$title	= pbmit_get_base_option('no-results-title');
			$text	= pbmit_get_base_option('no-results-text');
			?>
			<div class="search-no-results-content">
				<?php if( !empty($title) ) : ?>
				<h3 class="pbmit-no-results-heading"><?php echo esc_html($title); ?></h3>
				<?php endif; ?>
				<?php if( !empty($text) ) : ?>
				<p class="pbmit-no-results-text"><?php echo esc_html($text); ?></p>
				<?php endif; ?>
				<?php get_search_form(); ?>
			</div>
		<?php }; ?>

	</div><!-- .pbmit-search-results-main-wrapper -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();