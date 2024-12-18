<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( !function_exists('pbmit_widget_positions_init') ){
function pbmit_widget_positions_init() {
	if( !defined('PBM_ADDON_VERSION') ){
		register_sidebar( array(
			'name'		  => esc_attr__( 'Blog Sidebar', 'xcare' ),
			'id'			=> 'pbmit-sidebar-post',
			'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Page Sidebar', 'xcare' ),
			'id'			=> 'pbmit-sidebar-page',
			'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on pages.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Search Results Sidebar', 'xcare' ),
			'id'			=> 'pbmit-sidebar-search',
			'description'   => esc_attr__( 'Add widgets here to appear on search result pages.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Footer Row - 1st Column', 'xcare' ),
			'id'			=> 'pbmit-footer-1',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Footer Row - 2nd Column', 'xcare' ),
			'id'			=> 'pbmit-footer-2',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Footer Row - 3rd Column', 'xcare' ),
			'id'			=> 'pbmit-footer-3',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Footer Row - 4th Column', 'xcare' ),
			'id'			=> 'pbmit-footer-4',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'		  => esc_attr__( 'Floting Bar', 'xcare' ),
			'id'			=> 'pbmit-floting-bar',
			'description'   => esc_attr__( 'Add widgets here to appear in your header floting bar.', 'xcare' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
}
add_action( 'widgets_init', 'pbmit_widget_positions_init' );

/**
 * Customizer icon picker
 */
if( !function_exists('pbmit_xcare_addons_configure_customizer') ){
function pbmit_xcare_addons_configure_customizer(){
	if( class_exists('Kirki') ){
		/** Kirki icon picker **/
		include( get_template_directory() . '/includes/customizer/pbminfotech-icon-picker/pbminfotech-icon-picker.php' );
	}
}
}
add_action( 'init', 'pbmit_xcare_addons_configure_customizer' );

/**
 *  Disable Legacy mode
 */
if( !function_exists('pbmit_elementor_set_legacy_mode') ){
function pbmit_elementor_set_legacy_mode(){
	$optimized_dom_output = get_option( 'elementor_optimized_dom_output' );
	if( $optimized_dom_output!='enabled' ){
		update_option( 'elementor_optimized_dom_output', 'enabled' );
	}
}
}
add_action( 'init', 'pbmit_elementor_set_legacy_mode' );

/**
 *  Customizer options
 */
if( !function_exists('pbmit_configure_customizer') ){
function pbmit_configure_customizer(){
	if( class_exists('Kirki') ){
		include( get_template_directory() . '/includes/kirki-config.php' );
	}
}
}
add_action( 'init', 'pbmit_configure_customizer', 99 );

/**
 *  Categories Widget - Wrap Post count in a span
 */
add_filter('wp_list_categories', 'pbmit_cat_count_span');
if( !function_exists('pbmit_cat_count_span') ){
function pbmit_cat_count_span($links) {
	if(strpos($links, '<span class="count">') !== false){
		// WooComerce call
		$links = str_replace('<span class="count">(', '<span class="count">', $links);
		$links = str_replace(')</span>', '</span>', $links);
	} else {
		$links = str_replace('<a ', '<span class="pbmit-cat-li"><a ', $links);
		$links = str_replace('</a> (', '</a> <span class="pbmit-brackets">( ',$links);
		$links = str_replace(')', ' )</span></span>', $links);
	}
	return $links;
}
}

/**
 *  Archives Widget - Wrap Post count in a span
 */
add_filter('get_archives_link', 'pbmit_archive_count_span');
if( !function_exists('pbmit_archive_count_span') ){
function pbmit_archive_count_span($links) {
	if( substr( trim($links), 0, 8 ) != '<option ' ){
		$links = str_replace('<a ', '<span class="pbmit-arc-li"><a ', $links);
		$links = str_replace('</a>&nbsp;(', '</a>&nbsp;<span class="pbmit-brackets"> ( ', $links);
		$links = str_replace(')',' ) <span></span>', $links);
	}
	return $links;
}
}

/**
 * Specially for Forminator plugin
 */
if( !function_exists('pbmit_forminator_plugin_js_correction') ){
function pbmit_forminator_plugin_js_correction(){
	$curr_screen = get_current_screen();
	if( !empty($curr_screen->base) && $curr_screen->base == 'customize' ){
		wp_enqueue_script( 'select2-forminator', get_template_directory_uri() . '/js/select2-forminator.min.js' );
	}
}
}
add_action( 'admin_enqueue_scripts', 'pbmit_forminator_plugin_js_correction', 99 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if( !function_exists('pbmit_pingback_header') ){
function pbmit_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
}
add_action( 'wp_head', 'pbmit_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
if( !function_exists('pbmit_style_scripts') ){
function pbmit_style_scripts() {

	$min = '';
	if( pbmit_get_base_option('min')=='1' ){
		$min = '.min';
	}

	// header style css
	$header_style = pbmit_get_base_option('header-style');
	if( empty($header_style) ){ $header_style = '1'; }
	if( file_exists( get_template_directory() . '/css/header/header-style-'.$header_style.$min.'.css' ) ){
		wp_enqueue_style( 'pbmit-xcare-header-style', get_template_directory_uri() . '/css/header/header-style-'.$header_style.$min.'.css' );
	}

	// Blog box styles
	$blog_styles = pbmit_element_template_list('blog', true);
	$total_blog_styles = count($blog_styles);
	if( is_array($blog_styles) && $total_blog_styles>0 ){
		foreach( $blog_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/blog/blog-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-blog-style-'.$style, get_template_directory_uri() . '/css/blog/blog-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-blog-style-'.$style, get_template_directory_uri() . '/css/blog/blog-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// blog but not classic
	$blogroll_view_select = pbmit_get_base_option('blogroll-view-select');
	$blogroll_view  = pbmit_get_base_option('blogroll-view');
	if( is_home() && $blogroll_view_select!='classic' ){
		wp_enqueue_style( 'pbmit-blog-style-'.$blogroll_view, get_template_directory_uri() . '/css/blog/blog-style-'.$blogroll_view.$min.'.css' );
	}

	// Client box styles
	$client_styles = pbmit_element_template_list('client', true);
	$total_client_styles = count($client_styles);
	if( is_array($client_styles) && $total_client_styles>0 ){
		foreach( $client_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/client/client-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-client-style-'.$style, get_template_directory_uri() . '/css/client/client-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-client-style-'.$style, get_template_directory_uri() . '/css/client/client-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// FID box styles
	$fid_styles = pbmit_element_template_list('facts-in-digits', true);
	$total_fid_styles = count($fid_styles);
	if( is_array($fid_styles) && $total_fid_styles>0 ){
		foreach( $fid_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/fid/fid-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-fid-style-'.$style, get_template_directory_uri() . '/css/fid/fid-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-fid-style-'.$style, get_template_directory_uri() . '/css/fid/fid-style-'.$style.$min.'.css' );
				}
			}
		}
	}


	// Icon Heading box styles
	$icon_heading_styles = pbmit_element_template_list('icon-heading', true);
	$total_icon_heading_styles = count($icon_heading_styles);
	if( is_array($icon_heading_styles) && $total_icon_heading_styles>0 ){
		foreach( $icon_heading_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-icon-heading-style-'.$style, get_template_directory_uri() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-icon-heading-style-'.$style, get_template_directory_uri() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Pricing Table box styles
	$pricing_table_styles = pbmit_element_template_list('pricing-table', true);
	$total_pricing_table_styles = count($pricing_table_styles);
	if( is_array($pricing_table_styles) && $total_pricing_table_styles>0 ){
		foreach( $pricing_table_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/ptable/ptable-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-ptable-style-'.$style, get_template_directory_uri() . '/css/ptable/ptable-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-ptable-style-'.$style, get_template_directory_uri() . '/css/ptable/ptable-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Testimonial box styles
	$testimonial_styles = pbmit_element_template_list('testimonial', true);
	$total_testimonial_styles = count($testimonial_styles);
	if( is_array($testimonial_styles) && $total_testimonial_styles>0 ){
		foreach( $testimonial_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-testimonial-style-'.$style, get_template_directory_uri() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-testimonial-style-'.$style, get_template_directory_uri() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Team box styles
	$team_styles = pbmit_element_template_list('team', true);
	$total_team_styles = count($team_styles);
	if( is_array($team_styles) && $total_team_styles>0 ){
		foreach( $team_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/team/team-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-team-style-'.$style, get_template_directory_uri() . '/css/team/team-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-team-style-'.$style, get_template_directory_uri() . '/css/team/team-style-'.$style.$min.'.css' );
				}
			}
		}
	}
	// Portfolio box styles
	$portfolio_styles = pbmit_element_template_list('portfolio', true);
	$total_portfolio_styles = count($portfolio_styles);
	if( is_array($portfolio_styles) && $total_portfolio_styles>0 ){
		foreach( $portfolio_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-portfolio-style-'.$style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-portfolio-style-'.$style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Service box styles
	$service_styles = pbmit_element_template_list('service', true);
	$total_service_styles = count($service_styles);
	if( is_array($service_styles) && $total_service_styles>0 ){
		foreach( $service_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/service/service-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-service-style-'.$style, get_template_directory_uri() . '/css/service/service-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-service-style-'.$style, get_template_directory_uri() . '/css/service/service-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Static box styles
	$static_box_styles = pbmit_element_template_list('static-box', true);
	$total_static_box_styles = count($static_box_styles);
	if( is_array($static_box_styles) && $total_static_box_styles>0 ){
		foreach( $static_box_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/static-box/static-box-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-static-box-style-'.$style, get_template_directory_uri() . '/css/static-box/static-box-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-static-box-style-'.$style, get_template_directory_uri() . '/css/static-box/static-box-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Marquee Effect Style
	$marquee_effect_styles = pbmit_element_template_list('marquee-effect', true);
	$total_marquee_effect_styles = count($marquee_effect_styles);
	if( is_array($marquee_effect_styles) && $total_marquee_effect_styles> 0 ){
		foreach( $marquee_effect_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/marquee-effect/marquee-effect-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-marquee-effect-style-'.$style, get_template_directory_uri() . '/css/marquee-effect/marquee-effect-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-marquee-effect-style-'.$style, get_template_directory_uri() . '/css/marquee-effect/marquee-effect-style-'.$style.$min.'.css' );
				}
			}
		}
	}


	// Spinner Box Style

	$spinner_box_styles = pbmit_element_template_list('spinner-box', true);
	$total_spinner_box_styles = count($spinner_box_styles);
	if( is_array($spinner_box_styles) && $total_spinner_box_styles> 0 ){
		foreach( $spinner_box_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/spinner-box/spinner-box-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-spinner-box-style-'.$style, get_template_directory_uri() . '/css/spinner-box/spinner-box-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-spinner-box-style-'.$style, get_template_directory_uri() . '/css/spinner-box/spinner-box-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Timeline Styles
	$timeline_styles = pbmit_element_template_list('timeline', true);
	$total_timeline_styles = count($timeline_styles);
	if( is_array($timeline_styles) && $total_timeline_styles>0 ){
		foreach( $timeline_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/timeline/timeline-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-timeline-style-'.$style, get_template_directory_uri() . '/css/timeline/timeline-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-timeline-style-'.$style, get_template_directory_uri() . '/css/timeline/timeline-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Tween Effect styles
	$tween_effect_styles = pbmit_element_template_list('tween-effect', true);
	$total_tween_effect_styles = count($tween_effect_styles);
	if( is_array($tween_effect_styles) && $total_tween_effect_styles>0 ){
		foreach( $tween_effect_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/tween-effect/tween-effect-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-tween-effect-style-'.$style, get_template_directory_uri() . '/css/tween-effect/tween-effect-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-tween-effect-style-'.$style, get_template_directory_uri() . '/css/tween-effect/tween-effect-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Wooproducts Styles
	$wooproducts_styles = pbmit_element_template_list('wooproducts', true);
	$total_wooproducts_styles = count($wooproducts_styles);
	if( is_array($wooproducts_styles) && $total_wooproducts_styles>0 ){
		foreach( $wooproducts_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/wooproducts/wooproducts-style-'.$style.$min.'.css' ) ){
				if( (defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode()) || is_search() ) ){
					wp_enqueue_style( 'pbmit-wooproducts-style-'.$style, get_template_directory_uri() . '/css/wooproducts/wooproducts-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'pbmit-wooproducts-style-'.$style, get_template_directory_uri() . '/css/wooproducts/wooproducts-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	if( is_singular( 'post' ) ){
		$style	= pbmit_get_base_option('blog-related-style');
		wp_enqueue_style( 'pbmit-blog-style-'.$style);
	} else if ( is_singular( 'pbmit-portfolio' ) ){
		$style	= pbmit_get_base_option('portfolio-related-style');
		wp_enqueue_style( 'pbmit-portfolio-style-'.$style);
	} else if ( is_singular( 'pbmit-service' ) ){
		$style	= pbmit_get_base_option('service-related-style');
		wp_enqueue_style( 'pbmit-service-style-'.$style);
	}

	// Portfolio Category view styles
	if( is_tax('pbmit-portfolio-category') || is_post_type_archive('pbmit-portfolio') ){
		$portfolio_cat_style = pbmit_get_base_option('portfolio-cat-style');
		$portfolio_cat_style = ( empty($portfolio_cat_style) ) ? '1' : $portfolio_cat_style ;
		wp_enqueue_style( 'pbmit-portfolio-style-'.$portfolio_cat_style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$portfolio_cat_style.$min.'.css' );
	}

	// Service Category view styles
	if( is_tax('pbmit-service-category') || is_post_type_archive('pbmit-service') ){
		$service_cat_style = pbmit_get_base_option('service-cat-style');
		$service_cat_style = ( empty($service_cat_style) ) ? '1' : $service_cat_style ;
		wp_enqueue_style( 'pbmit-service-style-'.$service_cat_style, get_template_directory_uri() . '/css/service/service-style-'.$service_cat_style.$min.'.css' );
	}

	// Team Group view styles
	if( is_tax('pbmit-team-group') || is_post_type_archive('pbmit-team-member') ){
		$team_group_style = pbmit_get_base_option('team-group-style');
		$team_group_style = ( empty($team_group_style) ) ? '1' : $team_group_style ;
		wp_enqueue_style( 'pbmit-team-style-'.$team_group_style, get_template_directory_uri() . '/css/team/team-style-'.$team_group_style.$min.'.css' );
	}

	// Post Category view styles
	if( is_archive('category') || is_post_type_archive('post') ){
		$post_cat_style = pbmit_get_base_option('blogroll-view');
		if( $post_cat_style!='classic') {
			$post_cat_style = ( empty($post_cat_style) ) ? '1' : $post_cat_style ;
			wp_enqueue_style( 'pbmit-post-category-style-'.$post_cat_style, get_template_directory_uri() . '/css/blog/blog-style-'.$post_cat_style.$min.'.css' );
		}
	}

	if( is_page() || is_singular() ){
		$elementor_data  = get_post_meta( get_the_ID() , '_elementor_data', true );
		$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

		if( !empty($elementor_data) && !empty($elementor_page) ){

			if( is_array($elementor_data) ){
				$contents_array = $elementor_data;
			} else {
				$contents_array = json_decode($elementor_data, true);
			}

			if( !empty($contents_array) && is_array($contents_array) ){
				$elements = pbmit_get_elements($contents_array);
				if( !empty($elements) && is_array($elements) && count($elements)>0 ){
					foreach( $elements as $element ){
						$ele = explode('___', $element);

						$css_id = $ele[0];
						$style = $ele[1];

						$css_id = str_replace('_element','-style', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );

						if( $css_id == 'pbmit-icon-heading' ){
							$css_id .= '-style';
						}
						if( $css_id == 'pbmit-multiple-icon-heading' ){
							$css_id = 'pbmit-icon-heading-style';
						}

						if( $css_id !='pbmit-heading' ){ // there is no style css for heading
							$css_id = $css_id.'-'.$style;
							wp_enqueue_style( esc_attr($css_id) );
						}

					}
				}
			}
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'pbmit_style_scripts', 10 );

/**
 * Enqueue scripts and styles.
 */
if( !function_exists('pbmit_scripts') ){
function pbmit_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$min = '';
	if( pbmit_get_base_option('min')=='1' ){
		$min = '.min';
	}

	// RTL
	$rtl = ( is_rtl() ) ? '.rtl' : '' ;

	// Font Awesome base
	if( !wp_style_is( 'elementor-icons-shared-0', 'registered' ) ){
		wp_register_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	}
	$icon_libraries = pbmit_icon_library_list();
	foreach( $icon_libraries as $library_id=>$library_data ){
		if( !wp_style_is( $library_id, 'registered' ) ){
			wp_register_style( $library_id, $library_data['css_path'] );
		}
	}

	if( defined('ELEMENTOR_VERSION') && ( \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search() ) ){
		$icon_libraries = pbmit_icon_library_list();
		foreach( $icon_libraries as $library_id=>$library_data ){
			if( wp_style_is( $library_id, 'registered' ) ){
				wp_enqueue_style( $library_id, $library_data['css_path'] );
			}
		}
		if( wp_style_is( 'elementor-icons-shared-0', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-shared-0' );
		}
		if( wp_style_is( 'elementor-icons-fa-regular', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-regular' );
		}
		if( wp_style_is( 'elementor-icons-fa-solid', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-solid' );
		}
		if( wp_style_is( 'elementor-icons-fa-brands', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-brands' );
		}
	}

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/libraries/bootstrap/css/bootstrap'.$rtl.'.min.css' );

	wp_register_script( 'jquery-waypoints', get_template_directory_uri() . '/libraries/waypoints/jquery.waypoints.min.js' , array( 'jquery' ) );
	wp_register_style( 'animate-css', get_template_directory_uri() . '/libraries/animate-css/animate.min.css' );

	wp_register_script( 'jquery-circle-progress', get_template_directory_uri() . '/libraries/jquery-circle-progress/circle-progress.min.js', array( 'jquery' ) );
	wp_register_script( 'numinate', get_template_directory_uri() . '/libraries/numinate/numinate.min.js', array( 'jquery' ) );

	// Timeline
	wp_register_style( 'pbmit-timeline', get_template_directory_uri() . '/css/timeline/timeline-style-1' . $min . '.css' );

	wp_enqueue_style( 'pbmit-elementor-style', get_template_directory_uri() . '/css/elementor'.$min.'.css' );

	wp_enqueue_style( 'pbmit-core-style', get_template_directory_uri() . '/css/core'.$min.'.css' );
	wp_enqueue_style( 'pbmit-theme-style', get_template_directory_uri() . '/css/theme'.$min.'.css' );
	wp_enqueue_style( 'pbmit-widget-style', get_template_directory_uri() . '/css/widget'.$min.'.css' );

	// WooCommerce
	if( function_exists('is_woocommerce') ){
		wp_enqueue_style( 'pbmit-woocommerce-style', get_template_directory_uri() . '/css/woocommerce'.$min.'.css' );
	}

	// Select2
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/libraries/select2/js/select2.min.js', array('jquery') );
	wp_enqueue_style( 'select2', get_template_directory_uri() . '/libraries/select2/css/select2.min.css' );

	// Magnific Popup Lightbox
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/jquery.magnific-popup.min.js', array('jquery') );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/magnific-popup.css' );
	// Base icon library
	wp_enqueue_style( 'pbmit-base-icons', get_template_directory_uri() . '/libraries/pbminfotech-base-icons/css/pbminfotech-base-icons.css' );
	// Sticky
	if( pbmit_get_base_option('sticky-header')==true ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/libraries/sticky-toolkit/jquery.sticky-kit.min.js' , array('jquery') );
	}
	// Theme base scripts
	wp_enqueue_script( 'pbmit-core-script', get_template_directory_uri() . '/js/core'.$min.'.js' , array('jquery') );
	wp_enqueue_script( 'pbmit-elementor-script', get_template_directory_uri() . '/js/elementor'.$min.'.js', array('jquery', 'pbmit-core-script') );

	// lottiefiles
	wp_enqueue_script( 'lottie-player', get_template_directory_uri() . '/js/lottie-player'.$min.'.js' , array('jquery') );	

	// Responsive variable
	$js_array = array(
		'responsive'	=> pbmit_get_base_option('responsive-breakpoint'),
		'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
		'ajaxnonce'		=> wp_create_nonce( 'pbmit_infinite_scroll_ajax_validation' ),
		'ajaxnonce_ajax_pagination'		=> wp_create_nonce( 'pbmit_ajax_pagination' ),
		'ajaxnonce_sortcat'				=> wp_create_nonce( 'pbmit_ajax_sortable_category_ajax_validation' )
	);
	wp_localize_script( 'pbmit-core-script', 'pbmit_js_variables', $js_array );
	// ballon tooltip
	wp_enqueue_style( 'balloon', get_template_directory_uri() . '/libraries/balloon/balloon.min.css' );
	// Light Slider
	wp_register_script( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/js/lightslider.min.js' , array('jquery') );
	wp_register_style( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/css/lightslider.min.css' );
	// Isotope
	wp_register_script( 'isotope', get_template_directory_uri() . '/libraries/isotope/isotope.pkgd.min.js' , array('jquery') );
	// Infinite Scroll
	wp_register_script( 'infinite-scroll', get_template_directory_uri() . '/libraries/infinite-scroll/infinite-scroll.pkgd.min.js' , array( 'jquery', 'isotope' ) );
	// Masonry
	wp_register_script( 'masonry', array( 'jquery', 'infinite-scroll' ) );

	// Gsap
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap'.$min.'.js' , array('jquery') );

	// ScrollTrigger
	wp_enqueue_script( 'scrolltrigger', get_template_directory_uri() . '/js/ScrollTrigger.js' , array('jquery') );

	// SplitText
	wp_enqueue_script( 'splitsext', get_template_directory_uri() . '/js/SplitText'.$min.'.js' , array('jquery') );	

	// ScrollSmoother
	wp_enqueue_script( 'scrollsmoother', get_template_directory_uri() . '/js/ScrollSmoother'.$min.'.js' , array('jquery') );

	// Magnetic Cursor
	wp_enqueue_script( 'magnetic', get_template_directory_uri() . '/js/magnetic'.$min.'.js' , array('jquery') );

	// gsap-effect
	wp_enqueue_script( 'gsap-animation-effect', get_template_directory_uri() . '/js/gsap-animation'.$min.'.js' , array('jquery') );

	// Max Mega Menu style
	$mmmenu_override = pbmit_get_base_option('max-mega-menu-override');
	if( $mmmenu_override == 1 && defined('MEGAMENU_VERSION') ){
		wp_enqueue_style( 'pbmit-max-mega-menu', get_template_directory_uri() . '/css/max-mega-menu'.$min.'.css' );
	}

	// Category icon library
	if( is_tax() ){
		if( is_tax() ){
			$category = get_queried_object();
			if( isset($category->term_id) && !empty($category->term_id) ){
				$cat_id			= $category->term_id;
				$term			= get_term( $cat_id );
				$sub_category	= get_terms( $term->taxonomy, array('parent' => $cat_id, 'hide_empty' => false) );
				if( is_array($sub_category) && count($sub_category)>0 ){
					foreach( $sub_category as $cat ){
						$icon_lib = get_term_meta( $cat->term_id, 'pbmit-category-icon-library', true );
						wp_enqueue_style($icon_lib);
					}
				}
			}
		}
	}

	/******************** */

	if( defined('PBM_ADDON_VERSION') ){
		// Addons plugin exists
		if( function_exists('is_customize_preview') && !is_customize_preview() ){
			wp_enqueue_style('pbmit-dynamic-style', admin_url('admin-ajax.php').'?action=pbm_addons_auto_css');
		} else {
			ob_start();
			include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
			$css	= ob_get_clean();
			wp_add_inline_style( 'pbmit-theme-style', $css );
		}
	} else {
		// Addons plugin not exists
		wp_enqueue_style( 'pbmit-dynamic-default-style', get_template_directory_uri() . '/css/dynamic-default-style'.$min.'.css' );
	}

	wp_enqueue_style( 'pbmit-global-color-style', get_template_directory_uri() . '/css/global-color'.$min.'.css' );
	wp_enqueue_style( 'pbmit-responsive-style', get_template_directory_uri() . '/css/responsive'.$min.'.css' );

	global $pbmit_inline_css;
	if( !empty($pbmit_inline_css) ){
		if( function_exists('pbm_addons_minify_css') ){
			$pbmit_inline_css = pbm_addons_minify_css( $pbmit_inline_css );
		}
		wp_add_inline_style( 'pbmit-theme-style', trim( $pbmit_inline_css ) );
	}

	if( is_page() || is_singular() ){
		if( wp_style_is( 'elementor-post-'.get_the_ID() , 'enqueued' ) ){
			wp_dequeue_style( 'elementor-post-'.get_the_ID() );
			wp_enqueue_style( 'elementor-post-'.get_the_ID() );
		}
	}

	if( is_singular('pbmit-team-member') ){
		wp_enqueue_script( 'jquery-waypoints' );
	}

	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script( 'jquery-waypoints' );
		wp_enqueue_style( 'animate-css' );

		wp_enqueue_script( 'jquery-circle-progress' );
		wp_enqueue_script( 'numinate' );

		wp_enqueue_script( 'swiper' );
		wp_enqueue_style( 'swiper' );

		wp_enqueue_script( 'lightslider' );
		wp_enqueue_style( 'lightslider' );
	}

	// For the Search Results page
	if( is_search() ){
		wp_enqueue_style( 'pbmit-search-results', get_template_directory_uri() . '/css/search-results'.$min.'.css' );
		wp_enqueue_style( 'skeletabs', get_template_directory_uri() . '/libraries/skeletabs/skeletabs.min.css' );
		wp_enqueue_script( 'skeletabs', get_template_directory_uri() . '/libraries/skeletabs/skeletabs.min.js' , array( 'jquery' ) );
	}

}
}
add_action( 'wp_enqueue_scripts', 'pbmit_scripts', 20 );

function pbmit_first_call_scripts(){
	if ( !wp_script_is( 'swiper', 'registered' ) ) {
		wp_register_script( 'swiper', get_template_directory_uri() . '/libraries/swiper/swiper.min.js', array('jquery') );
	}
	wp_register_style( 'swiper', get_template_directory_uri() . '/libraries/swiper/swiper.min.css' );
}
add_action( 'wp_enqueue_scripts', 'pbmit_first_call_scripts', 1 );

/**
 * Admin scripts and styles
 */
if( !function_exists('pbmit_wp_admin_scripts_styles') ){
function pbmit_wp_admin_scripts_styles() {
	wp_register_script( 'pbmit-admin-script', get_template_directory_uri() . '/includes/admin-script.js', array('jquery') );
	// Admin variable
	$admin_js_array = array(
		'theme_path' => get_template_directory_uri(),
	);
	wp_localize_script( 'pbmit-admin-script', 'pbmit_admin_js_variables', $admin_js_array );
	wp_enqueue_style( 'pbmit-admin-style', get_template_directory_uri() . '/includes/admin-style.css' );
	wp_enqueue_script( 'pbmit-admin-script' );
	wp_enqueue_style( 'wp-editor-classic-layout-styles' );

	// Admin widget view
	wp_enqueue_style( 'pbmit-admin-widget-style', get_template_directory_uri() . '/includes/admin-widget.css' );

	// color-thief library
	wp_enqueue_script( 'color-thief', get_template_directory_uri() . '/includes/color-thief.umd.js' );
}
}
add_action( 'admin_enqueue_scripts', 'pbmit_wp_admin_scripts_styles' );

/**
 * Enqueue script for custom customize control.
 */
function pbmit_customize_enqueue() {
	wp_enqueue_script( 'pbmit-customize-script', get_template_directory_uri() . '/includes/customizer-script.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'pbmit_customize_enqueue' );

/**
 * Elementor correction for customize bug
 */
if( !function_exists('pbmit_ele_correction') ){
function pbmit_ele_correction() {
	if( function_exists('is_customize_preview') && is_customize_preview() ){
		if( wp_style_is( 'elementor-common', 'enqueued' ) ){
			wp_dequeue_style('elementor-common');
		}
		if( wp_style_is( 'elementor-admin', 'enqueued' ) ){
			wp_dequeue_style('elementor-admin');
		}
	}
}
}
add_action( 'admin_enqueue_scripts', 'pbmit_ele_correction', 99 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Xcare 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
if( !function_exists('pbmit_widget_tag_cloud_args') ){
function pbmit_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']	 = 'em';
	$args['format']   = 'list';
	return $args;
}
}
add_filter( 'widget_tag_cloud_args', 'pbmit_widget_tag_cloud_args' );

/*
 *  Body Tag: Class
 */
if( !function_exists('pbmit_add_body_classes') ){
function pbmit_add_body_classes($classes) {
	// Widget class
	$widget_class = '';
	// sidebar class
	$sidebar_class = pbmit_get_base_option('sidebar-post');
	if( in_array( $sidebar_class, array('left','right') ) ){
		$widget_class = pbmit_check_widget_exists('pbmit-sidebar-page');
	}
	if( is_page() ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar_class = $page_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-page');
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-wc-shop');
		}
		// Curved style at slider bottom
		$slider_type	= get_post_meta( get_the_ID(), 'pbmit-slider-type', true );
		$curved_style	= get_post_meta( get_the_ID(), 'pbmit-slider-curved-style', true );
		if( !empty($slider_type) && $curved_style == true ){
			$classes[] = 'pbmit-slider-curved-style';
		}
	} else if ( !is_front_page() && is_home() ) {
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$post_meta = get_post_meta( $page_for_posts, 'pbmit-sidebar', true );
		if( !empty($post_meta) && $post_meta!='global' ){
			$sidebar_class = $post_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-post');
		}

	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-wc-shop');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-wc-shop');
		}
	} else if( function_exists('is_product') && is_product() ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-wc-single');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-wc-single');
		}
	} else if( is_singular() ){
		if( get_post_type()=='event_listing' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-event-single');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-event-single');
			}
		} else if( get_post_type()=='event_organizer' || get_post_type()=='event_venue' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-event');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-event');
			}
		} else if( get_post_type()=='pbmit-portfolio' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-portfolio');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-portfolio');
			}
		} else if( get_post_type()=='pbmit-service' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-service');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-service');
			}
		} else if( get_post_type()=='pbmit-team-member' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-team-member');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-team');
			}
		} else if( get_post_type()=='post' ){
			$widget_class = '';
			$sidebar_class = pbmit_get_base_option('sidebar-post');
			$post_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = pbmit_check_widget_exists('pbmit-sidebar-post');
			}
		}
	} else if( is_tax('event_listing_category') || is_tax('event_listing_type') ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-event');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-event');
		}
	} else if( is_tax('pbmit-portfolio-category') || is_post_type_archive('pbmit-portfolio') ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-portfolio-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-portfolio-cat');
		}
	} else if( is_tax('pbmit-service-category')  || is_post_type_archive('pbmit-service') ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-service-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-service-cat');
		}
	} else if( is_tax('pbmit-team-group') || is_post_type_archive('pbmit-team-member') ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-team-group');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-team-group');
		}
	} else if( is_search() ){
		$widget_class = '';
		$sidebar_class = pbmit_get_base_option('sidebar-search');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = pbmit_check_widget_exists('pbmit-sidebar-search');
		}
	}


	// count main menu class
	$classes[] = pbmit_menu_count_class();
	// widget exists class
	if( !empty($widget_class) ){
		$classes[] = 'pbmit-sidebar-no';
	} else {
		if( in_array( $sidebar_class, array('left','right') ) ){
			$classes[] = 'pbmit-sidebar-exists';
		}
		$classes[] = 'pbmit-sidebar-' . $sidebar_class;
	}
	// Max Mega Menu orverride class
	$mmmenu_override	= pbmit_get_base_option('max-mega-menu-override');
	$megamenu_settings	= get_option( 'megamenu_settings' );
	if( $mmmenu_override == 1 && defined('MEGAMENU_VERSION') && ( isset($megamenu_settings['pbminfotech-top']['enabled']) && !empty($megamenu_settings['pbminfotech-top']['enabled']) && $megamenu_settings['pbminfotech-top']['enabled']=='1' ) ){
		$classes[] = 'pbmit-max-mega-menu-override';
	}
	$diable_pbmit_cursor = pbmit_get_base_option('pbmit-cursor-disable');
	if( $diable_pbmit_cursor == true){
		$classes[] = 'pbmit-cursor-disable';
	}
	$flotingbar_show_hide = pbmit_get_base_option('flotingbar-show');
	if( $flotingbar_show_hide == true){
		$classes[] = 'pbmit-flotingbar-yes';
	}

	// Body class if footer hide

	$footer_hidden = get_post_meta( get_the_ID(), 'pbmit-footer-hide', true );

	if( !empty($footer_hidden) ){
		$classes[] = 'pbmit-visibility';
	}

	return $classes;
}
}
add_filter('body_class', 'pbmit_add_body_classes');
// Limit Posts Per Category/Archive Page
add_filter('pre_get_posts', 'pbmit_limit_category_posts');
function pbmit_limit_category_posts($query){
	if( is_tax( 'pbmit-portfolio-category' ) && !empty($query->query['pbmit-portfolio-category']) ){
		$count		= pbmit_get_base_option('portfolio-cat-count');
		$query->set('posts_per_page', $count);
	} else if( is_tax( 'pbmit-team-group' ) && !empty($query->query['pbmit-team-group']) ){
		$count		= pbmit_get_base_option('team-group-count');
		$query->set('posts_per_page', $count);
	} else if( is_tax( 'pbmit-service-category' ) && !empty($query->query['pbmit-service-category']) ){
		$count		= pbmit_get_base_option('service-cat-count');
		$query->set('posts_per_page', $count);
	}
	return $query;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'pbmit_woocommerce_header_add_to_cart_fragment' );
if( !function_exists('pbmit_woocommerce_header_add_to_cart_fragment') ){
function pbmit_woocommerce_header_add_to_cart_fragment( $fragments ) {
	$content = pbmit_woocommerce_header_fragement_content();
	$fragments['a.pbmit-cart-link'] = pbmit_esc_kses($content);
	return $fragments;
}
}

/**
 * Elementor core things
 */
include( get_template_directory() . '/includes/elementor-core.php' );

/**
 * Elementor global settings
 */
add_filter( 'admin_init', 'pbmit_elementor_global_settings' );
if( !function_exists('pbmit_elementor_global_settings') ){
function pbmit_elementor_global_settings() {

	if(get_option('pbmit_elementor_global_done') === false){

		// change default color
		$default_color = array (
			1 => '',
			2 => '',
			3 => '',
			4 => '',
		);
		update_option('elementor_scheme_color', $default_color );

		// change default typo
		$default_typo = array (
			1 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			2 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			3 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			4 => array (
				'font_family' => '',
				'font_weight' => '',
			),
		);
		update_option('elementor_scheme_typography', $default_typo );

		// Set a flag if the theme activation happened
		update_option('pbmit_elementor_global_done', true, '', false);
	}
}
}

/**
 * Init calls
 */
if( !function_exists('pbmit_init_calls') ){
function pbmit_init_calls(){
	$value = get_option('pbmit-widget-classes');
	if( $value != 'yes' ){
		update_option(
			'WCSSC_options',
			array (
				'show_id'			=> false,
				'type'				=> 3,
				'defined_classes'	=>
				array (
					0 => 'pbmit-two-column-menu',
				),
				'show_number'		=> true,
				'show_location'		=> true,
				'show_evenodd'		=> true,
				'fix_widget_params'	=> false,
				'filter_unique'		=> false,
				'translate_classes'	=> false,
				)
		);
		update_option('pbmit-widget-classes', 'yes');
	}

	// Removes the "shop" title on the main shop page
	add_filter( 'woocommerce_show_page_title', '__return_false' );

}
}
add_action( 'init', 'pbmit_init_calls' );

/**
 *  Inline code generator
 */
if( !function_exists('pbmit_inline_css_code_generator') ){
function pbmit_inline_css_code_generator(){
	$return		= '';
	$color_css	= '';
	if( is_page() || is_singular() || is_home() ){

		$page_id = get_the_ID();
		if( is_home() ){
			$page_id = get_option( 'page_for_posts');
		}

		// Body background
		$bg_img		= get_post_meta( $page_id, 'pbmit-bg-img', true );
		$bg_image	= $bg_color_css = $bg_color_opacity_css = '';

		if( !empty($bg_img) ){
			$img_src			= wp_get_attachment_image_src($bg_img, 'full');
			if( !empty($img_src[0]) ){ $bg_image = $img_src[0]; }
		}

		// Background color and color-opacity
		$bg_color			= get_post_meta( $page_id, 'pbmit-bg-color', true );
		$bg_color_opacity	= get_post_meta( $page_id, 'pbmit-bg-color-opacity', true );
		if( !empty($bg_color) ){
			$bg_color_css .= 'background-color:' . $bg_color . ' !important;';
		}
		if( !empty($bg_color_opacity) ){
			$bg_color_opacity_css .= 'opacity:' . $bg_color_opacity . ' !important;';
		}

		// Generating CSS for background
		if( !empty($bg_image) ){
			$return .= 'body{background-image:url(\'' . $bg_image . '\') !important;}';
			if( !empty($bg_color_css) ){
				$return .= 'body:before{' . $bg_color_css . $bg_color_opacity_css . '}';
			}

		} else {

			if( !empty($bg_color_css) ){
				$return .= 'body{' . $bg_color_css . '}';
			}

		}

		$titlebar_img = '';
		// Check if Titlebar bg imge is set in page or post
		$titlebar_bg_img	= get_post_meta( $page_id, 'pbmit-titlebar-bg-img', true );
		if( !empty($titlebar_bg_img) ){
			$img_src			= wp_get_attachment_image_src($titlebar_bg_img, 'full');
			if( !empty($img_src[0]) ){ $titlebar_img = $img_src[0]; }
			$titlebar_bg_color			= get_post_meta( $page_id, 'pbmit-titlebar-bg-color', true );
			$titlebar_bg_color_opacity	= get_post_meta( $page_id, 'pbmit-titlebar-bg-color-opacity', true );
			if( !empty($titlebar_bg_color) ){
				$color_css .= 'background-color:' . $titlebar_bg_color . ' !important;';
			}
			if( !empty($titlebar_bg_color_opacity) ){
				$color_css .= 'opacity:' . $titlebar_bg_color_opacity . ' !important;';
			}
		} else {
			// If not than check now if fetaured img as titlebar bg option is enabled or not
			$titlebar_bg_featured = pbmit_get_base_option('titlebar-bg-featured');
			if( !empty($titlebar_bg_featured) && is_array($titlebar_bg_featured) ){
				if( ( is_page()							&& in_array( 'page', $titlebar_bg_featured ) ) ||
					( is_singular('post')				&& in_array( 'post', $titlebar_bg_featured ) ) ||
					( is_singular('pbmit-portfolio')		&& in_array( 'pbmit-portfolio',   $titlebar_bg_featured ) ) ||
					( is_singular('pbmit-team-member')	&& in_array( 'pbmit-team-member', $titlebar_bg_featured ) ) ||
					( is_singular('pbmit-testimonial')	&& in_array( 'pbmit-testimonial', $titlebar_bg_featured ) ) ||
					( is_singular('pbmit-service')		&& in_array( 'pbmit-service',	 $titlebar_bg_featured ) )
				){
					if( has_post_thumbnail() ){
						$titlebar_img = get_the_post_thumbnail_url( $page_id , 'full' );
					}
				}
			}
		}
		// Titlebar bg
		if( !empty($titlebar_img) ){
			$return .= '.pbmit-title-bar-wrapper{background-image:url(\'' . $titlebar_img . '\') !important;}';
			if( !empty($color_css) ){
				$return .= '.pbmit-title-bar-wrapper:before{' . $color_css . '}';
			}
		}
		// Titlebar BG Color
		$titlebar_bg_color	= get_post_meta( get_the_ID(), 'pbmit-titlebar-bg-color', true );
		if( !empty($titlebar_bg_color) ){
			$opacity = get_post_meta( get_the_ID(), 'pbmit-titlebar-bg-color-opacity', true );
			if( empty($opacity) ){ $opacity = '0.5'; }
			$return .= '.pbmit-title-bar-wrapper:after{background-color:' . pbmit_hex2rgb($titlebar_bg_color, $opacity ) . ' !important;}';
		}
	}
	if( !empty($return) ){
		pbmit_inline_css( $return );
	}
}
}
add_action( 'wp', 'pbmit_inline_css_code_generator' );

/**
 * Register a custom menu page.
 */
if( !function_exists('pbmit_register_customizer_menu_page') ){
function pbmit_register_customizer_menu_page() {
	if( class_exists('Kirki') ){
		add_menu_page(
			esc_attr__( 'Xcare Options', 'xcare' ),
			esc_attr__( 'Xcare Options', 'xcare' ),
			'manage_options',
			esc_url( home_url() . '/wp-admin/customize.php' ),
			'',
			'',
			6
		);
	}
}
}
add_action( 'admin_menu', 'pbmit_register_customizer_menu_page' );

/**
 * Search Results settings
 */
if( !function_exists('pbmit_change_wp_search_size') ){
function pbmit_change_wp_search_size($query) {
	if ( $query->is_search ){ // Make sure it is a search page
		$post_type = get_query_var('post_type');
		if( !empty( get_query_var('s') ) && trim($post_type)=='' ){
			$query->query_vars['posts_per_page'] = -1;
		} else {
			if( $post_type=='post' ){
				$query->query_vars['posts_per_page'] = 8;
			} else if( in_array( $post_type, array('pbmit-portfolio','pbmit-service','pbmit-team-member','pbmit-testimonial','event_listing') ) ){
				$query->query_vars['posts_per_page'] = 9;
			} else {
				$query->query_vars['posts_per_page'] = 20;
			}
		}
	}

	return $query; // Return our modified query variables
}
}
add_filter('pre_get_posts', 'pbmit_change_wp_search_size'); // Hook our custom function onto the request filter

/** Disable the scrolling effect on field validation errors
 *
 *  @link   https://wpforms.com/developers/how-to-disable-the-scrolling-effect-on-field-validation/
 */
if( !function_exists('pbmit_wpforms_disable_scroll_to_error') ){
function pbmit_wpforms_disable_scroll_to_error( $forms ) {
	// If scrollToError is disabled for at least one form on the page, it will be disabled for all the forms on the page.
	?>
	<script type="text/javascript">wpforms.scrollToError = function(){};</script>
	<?php
}
}
add_action( 'wpforms_wp_footer_end', 'pbmit_wpforms_disable_scroll_to_error', 10, 1 );

if( !function_exists('pbmit_elementor_global_options') ){
function pbmit_elementor_global_options() {
	$page_id = get_option('elementor_active_kit');
	if( $page_id ){
		// Default data array
		$data = array( 'system_colors' =>
			array(
				array(
					'_id'	=> 'primary',
					'title'	=> esc_attr__( 'Primary', 'xcare' ),
					'color'	=> '#ffda2b', // global-color
				),
				array(
					'_id'	=> 'secondary',
					'title' => esc_attr__( 'Secondary', 'xcare' ),
					'color' => '#101010', // blackish-color
				),
				array(
					'_id'	=> 'text',
					'title' => esc_attr__( 'Text', 'xcare' ),
					'color' => '#666666', // global-typography - color
				),
				array(
					'_id'	=> 'accent',
					'title'	=> esc_attr__( 'Accent', 'xcare' ),
					'color'	=> '#0e47c0', // secondary-color
				),
			),
			'custom_colors'		=> array(),
			'system_typography' => array(
				array(
					'_id'						=> 'primary',
					'title'						=> esc_attr__( 'Primary', 'xcare' ),
					'typography_typography'		=> 'custom',
				),
				array(
					'_id'						=> 'secondary',
					'title'						=> esc_attr__( 'Secondary', 'xcare' ),
					'typography_typography'		=> 'custom',
				),
				array(
					'_id'						=> 'text',
					'title'						=> esc_attr__( 'Text', 'xcare' ),
					'typography_typography'		=> 'custom',
				),
				array(
					'_id'						=> 'accent',
					'title'						=> esc_attr__( 'Accent', 'xcare' ),
					'typography_typography'		=> 'custom',
				),
			),
			'custom_typography' => array(),
			'default_generic_fonts' => 'Sans-serif',
			'button_background_position' => '',
			'button_background_repeat' => '',
			'button_background_size' => '',
			'button_background_slideshow_background_size' => '',
			'button_background_slideshow_background_position' => '',
			'button_hover_background_position' => '',
			'button_hover_background_repeat' => '',
			'button_hover_background_size' => '',
			'button_hover_background_slideshow_background_size' => '',
			'button_hover_background_slideshow_background_position' => '',
			'site_name' => get_bloginfo( 'name' ),
			'site_description' => get_bloginfo( 'description' ),
			'body_background_position' => '',
			'body_background_repeat' => '',
			'body_background_size' => '',
			'body_background_slideshow_background_size' => '',
			'body_background_slideshow_background_position' => '',
			'page_title_selector' => 'h1.entry-title',
			'activeItemIndex' => 1,
			'viewport_md' => 768,
			'viewport_lg' => 1025,
		);

		// update details
		$return = update_post_meta( $page_id, '_elementor_page_settings', $data );
	}

}
}
add_action('after_switch_theme', 'pbmit_elementor_global_options', 21, 2);

/**
 * This function adds some styles to the WordPress Customizer
 */
if( !function_exists('pbmit_xcare_customizer_styles') ){
function pbmit_xcare_customizer_styles() {

	$global_color = '#ffff00';
	if( function_exists('pbmit_get_base_option') ){
		$global_color = pbmit_get_base_option('global-color');
		if( !empty($global_color) ){
			$rgb = pbmit_html_to_rgb($global_color);
			$hsl = pbmit_rgb_to_hsl($rgb);
			if( (!empty($hsl->lightness)) && $hsl->lightness > 190) {
				$global_color = pbmit_color_luminance( $global_color, -0.3 );
			}
		}
	}
	$secondary_color = '#ffff00';
	if( function_exists('pbmit_get_base_option') ){
		$secondary_color = pbmit_get_base_option('secondary-color');
	}

	$blackish_color = '#ffff00';
	if( function_exists('pbmit_get_base_option') ){
		$blackish_color = pbmit_get_base_option('blackish-color');
	}

	$gradient_first = '#ffff00';
	$gradient_last  = '#ffff00';
	if( function_exists('pbmit_get_base_option') ){
		$gradient_colors = pbmit_get_base_option('gradient-color');
		$gradient_first = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ffff00' ;
		$gradient_last = ( !empty($gradient_colors['last']) ) ? $gradient_colors['last'] : '#ffff00' ;
	}

	?>
	<style>
		/* Customizer option */
		#accordion-panel-xcare_base_options h3{
			background-color: <?php echo esc_attr($global_color); ?> !important;
			color: #ffffff !important;
			border-left-color: #2d2d2d !important;
		}
		#accordion-panel-xcare_base_options h3:after{
			color: #ffffff !important;
		}
		#accordion-panel-xcare_base_options:hover h3{
			border-left-color: #000000 !important;
		}
		#accordion-panel-xcare_base_options:hover h3:after{
			color: #000000 !important;
		}

		.accordion-section.control-section-kirki-default.control-subsection:hover h3,
		.accordion-section.control-section-kirki-default.control-subsection h3:focus{
			color: <?php echo esc_attr($global_color); ?> !important;
			border-left-color: <?php echo esc_attr($global_color); ?> !important;
		}
		.accordion-section.control-section-kirki-default.control-subsection:hover h3:after,
		.accordion-section.control-section-kirki-default.control-subsection h3:focus:after{
			color: <?php echo esc_attr($global_color); ?> !important;
		}

		/* Back Button */
		#sub-accordion-panel-xcare_base_options li.panel-meta .customize-panel-back{
			color: <?php echo esc_attr($global_color); ?> !important;
			border-left-color: <?php echo esc_attr($global_color); ?> !important;
		}
		ul.customize-pane-child.control-section-kirki-default .customize-section-back{
			color: <?php echo esc_attr($global_color); ?> !important;
			border-left-color: <?php echo esc_attr($global_color); ?> !important;
		}
		#sub-accordion-panel-xcare_base_options .panel-title{
			color: <?php echo esc_attr($global_color); ?> !important;
		}

		/* Customizer */
		label[class$="globalcolor"] img{
			background-color: <?php echo esc_attr($global_color); ?> !important;
		}
		label[class$="secondarycolor"] img{
			background-color: <?php echo esc_attr($secondary_color); ?> !important;
		}
		label[class$="blackish"] img{
			background-color: <?php echo esc_attr($blackish_color); ?> !important;
		}
		label[class$="gradientcolor"] img{
			background-color: <?php echo esc_attr($gradient_first); ?> !important;
			background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> ) !important;
			color: #ffffff !important;
		}
	</style>
	<?php
}
}
add_action( 'customize_controls_print_styles', 'pbmit_xcare_customizer_styles' );

/**
 *  add Global Color class style
 */
add_action( 'admin_head', 'pbmit_admin_globalcolor_css' );
if( !function_exists('pbmit_admin_globalcolor_css') ){
function pbmit_admin_globalcolor_css(){

	$white_color = '';
	if( function_exists('pbmit_get_base_option') ){
		$white_color = pbmit_get_base_option('white-color');
	}

	$blackish_color = '';
	if( function_exists('pbmit_get_base_option') ){
		$blackish_color = pbmit_get_base_option('blackish-color');
	}

	$light_bg_color = '';
	if( function_exists('pbmit_get_base_option') ){
		$light_bg_color = pbmit_get_base_option('light-bg-color');
	}

	$blackish_bg_color = '';
	if( function_exists('pbmit_get_base_option') ){
		$blackish_bg_color = pbmit_get_base_option('blackish-bg-color');
	}

	$global_color = '#ff0000';
	if( function_exists('pbmit_get_base_option') ){
		$global_color = pbmit_get_base_option('global-color');
		if( !empty($global_color) ){
			$rgb = pbmit_html_to_rgb($global_color);
			$hsl = pbmit_rgb_to_hsl($rgb);
			if( (!empty($hsl->lightness)) && $hsl->lightness > 190) {
				$global_color = pbmit_color_luminance( $global_color, -0.3 );
			}
		}
	}

	$secondary_color = '#00ff00';
	if( function_exists('pbmit_get_base_option') ){
		$secondary_color = pbmit_get_base_option('secondary-color');
	}

	$gradient_first = '#ff0000';
	$gradient_last  = '#00ff00';
	if( function_exists('pbmit_get_base_option') ){
		$gradient_colors = pbmit_get_base_option('gradient-color');
		$gradient_first = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ff0000' ;
		$gradient_last = ( !empty($gradient_colors['last']) ) ? $gradient_colors['last'] : '#00ff00' ;
	}

	?>
	<style>
		.pbmit-imgselector-thumb-white img{
			background-color: <?php echo esc_attr($white_color); ?> !important;
		}
		.pbmit-imgselector-thumb-blackish img{
			background-color: <?php echo esc_attr($blackish_color); ?> !important;
		}
		div.pbmit-imgselector-thumb-light[data-selector="pbmit-bg-color"] img{
			background-color: <?php echo esc_attr($light_bg_color); ?> !important;
		}
		div.pbmit-imgselector-thumb-blackish[data-selector="pbmit-bg-color"] img{
			background-color: <?php echo esc_attr($blackish_bg_color); ?> !important;
		}
		.pbmit-imgselector-thumb-globalcolor img{
			background-color: <?php echo esc_attr($global_color); ?> !important;
		}
		.pbmit-imgselector-thumb-secondarycolor img{
			background-color: <?php echo esc_attr($secondary_color); ?> !important;
		}
		.pbmit-imgselector-thumb-gradientcolor img{
			background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> );
		}
		/* pbmit Customize menu */
		li[id*="xcare-wp-admin-customize"],
		li[id*="xcare-wp-admin-customize"] a:active,
		li[id*="xcare-wp-admin-customize"] a:hover,
		li[id*="xcare-wp-admin-customize"] a:visited,
		li[id*="xcare-wp-admin-customize"] > a.menu-top:focus,
		li[id*="xcare-wp-admin-customize"].menu-top:hover,
		li[id*="xcare-wp-admin-customize"].opensub > a.menu-top {
			background-color: <?php echo esc_attr($global_color); ?> !important;
			color: #fff !important;
			text-shadow: 0 0 #fff !important;
		}
		li[id*="xcare-wp-admin-customize"] div.wp-menu-image.dashicons-before {
			font-family: dashicons;
			display: inline-block;
			line-height: 1;
			font-weight: 400;
			font-style: normal;
			speak: none;
			text-decoration: inherit;
			text-transform: none;
			text-rendering: auto;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			width: 20px;
			height: 20px;
			font-size: 20px;
			vertical-align: top;
			text-align: center;
			transition: color .1s ease-in;
			font-size: 240px;
			width: 240px;
			height: 240px;
			overflow: visible;
		}
		li[id*="xcare-wp-admin-customize"] a:focus div.wp-menu-image:before,
		li[id*="xcare-wp-admin-customize"].opensub div.wp-menu-image:before,
		li[id*="xcare-wp-admin-customize"]:hover div.wp-menu-image:before {
			color: #fff !important;
		}
		li[id*="xcare-wp-admin-customize"] div.wp-menu-image.dashicons-before:before {
			content: "\f139";
		}
	</style>
	<?php
}
}

/**
 * Widget custom class input
 */
function pbmit_widget_custom_class( $widget, $return, $instance ){

	$id		= $widget->get_field_id( 'pbmit-widget-class' );
	$name	= $widget->get_field_name( 'pbmit-widget-class' );
	$value	= ( !empty($instance['pbmit-widget-class']) ) ? $instance['pbmit-widget-class'] : '' ;

	$id_image		= $widget->get_field_id( 'pbmit-widget-bg-image' );
	$name_image		= $widget->get_field_name( 'pbmit-widget-bg-image' );
	$value_image	= ( !empty($instance['pbmit-widget-bg-image']) ) ? $instance['pbmit-widget-bg-image'] : '' ;

	?>
	<div class="pbmit-widget-option pbmit-widget-class-wrapper">
		<p><label for="widget-text-2-classes">Custom CSS Class:</label><input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>" class="widefat"></p>
	</div>

	<div class="pbmit-widget-option pbmit-widget-bg-image-wrapper">
		<p><label for="widget-text-2-classes">Custom Background Image for widget:</label><input type="text" name="<?php echo esc_attr($name_image); ?>" id="<?php echo esc_attr($id_image); ?>" value="<?php echo esc_attr($value_image); ?>" class="widefat"></p>
		<p class="pbmit-widget-small-text">NOTE: Add image full path only. The background image size should be <code>800x600</code> pixel.</p>
	</div>

	<?php
}
add_action( 'in_widget_form', 'pbmit_widget_custom_class', 10, 3 );

/**
 * Widget custom class store value
 */
function pbmit_save_widget_custom_class( $instance, $new_instance, $old_instance, $object ) {
	// ID
	if( isset( $new_instance['ids'] ) ){
		$instance['ids'] = sanitize_text_field( $new_instance['ids'] );
	}
	// Widget Class
	$instance['pbmit-widget-class'] = ( !empty( $new_instance['pbmit-widget-class'] ) ) ? sanitize_text_field( $new_instance['pbmit-widget-class'] ) : '' ;


	// Widget Background Image
	
	$instance['pbmit-widget-bg-image'] = ( !empty( $new_instance['pbmit-widget-bg-image'] ) ) ? sanitize_text_field( esc_url($new_instance['pbmit-widget-bg-image']) ) : '' ;

	return $instance;
}
add_filter( 'widget_update_callback', 'pbmit_save_widget_custom_class', 10, 4 );

/**
 * Add Class in frontend
 */
function pbmit_frontend_class_event($params){
	global $wp_registered_widgets;

	$widget_id			  = $params[0]['widget_id'];
	$widget_obj			 = $wp_registered_widgets[ $widget_id ];
	$widget_num				= $widget_obj['params'][0]['number'];
	$widget_opt				= pbmit_get_widget_info( $widget_obj );

	// Custom class
	if( !empty($widget_opt[ $widget_num ]['pbmit-widget-class']) ){
		$custom_class	= trim($widget_opt[ $widget_num ]['pbmit-widget-class']);

		$class						= 'class="'.$custom_class.' '; 
		$params[0]['before_widget']	= str_replace('class="', $class, $params[0]['before_widget']);

	}

	// Background image
	if( !empty($widget_opt[ $widget_num ]['pbmit-widget-bg-image']) ){
		$bg_image	= trim($widget_opt[ $widget_num ]['pbmit-widget-bg-image']);

		$bg_image_attr	= 'style="background-image:url(\''.$bg_image.'\');" class="'; 
		$params[0]['before_widget']	= str_replace('class="', $bg_image_attr, $params[0]['before_widget']);

	}

	return $params;
}
// add the action
add_action( "dynamic_sidebar_params", "pbmit_frontend_class_event" , 10, 1);

/**
 * Get specific widget information
 */
function pbmit_get_widget_info($widget_obj){
	global $post;
	$id = ( isset( $post->ID ) ? get_the_ID() : null );

	if( isset( $id ) && get_post_meta( $id, '_customize_sidebars' ) ){
		$custom_sidebarcheck = get_post_meta( $id, '_customize_sidebars' );
	}

	$option_name = '';
	if( isset( $widget_obj['callback'][0]->option_name ) ){
		$option_name = $widget_obj['callback'][0]->option_name;
	} else if( isset( $widget_obj['original_callback'][0]->option_name ) ){
		$option_name = $widget_obj['original_callback'][0]->option_name;
	}

	if( isset( $custom_sidebarcheck[0] ) && ( 'yes' === $custom_sidebarcheck[0] ) ){
		$widget_opt = get_option( 'widget_' . $id . '_' . substr( $option_name, 7 ) );
	} else if( $option_name ){
		$widget_opt = get_option( $option_name );
	}

	return $widget_opt;
}



/**
 * Elementor - Reset default colors
 */
if( !function_exists('pbmit_xcare_reset_elementor_kit') ){
function pbmit_xcare_reset_elementor_kit(){
	$elementor_kit_reseted = get_option('pbmit_elementor_kit_reseted');

	if( $elementor_kit_reseted != 'yes' ){

		// Reset Elementor Defailt Template Kit colors
		$elementor_active_kit = get_option('elementor_active_kit');
		if( !empty($elementor_active_kit) ){
			$default_options = array (
				'system_colors' => array (
					array (
						'_id' => 'primary',
						'title' => 'Primary',
					),
					array (
						'_id' => 'secondary',
						'title' => 'Secondary',
					),
					array (
						'_id' => 'text',
						'title' => 'Text',
					),
					array (
						'_id' => 'accent',
						'title' => 'Accent',
					),
				),
				'custom_colors' => array(),
				'system_typography' => array (
					array (
						'_id' => 'primary',
						'title' => 'Primary',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'secondary',
						'title' => 'Secondary',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'text',
						'title' => 'Text',
						'typography_typography' => 'custom',
					),
					array (
						'_id' => 'accent',
						'title' => 'Accent',
						'typography_typography' => 'custom',
					),
				),
			);
			update_post_meta( $elementor_active_kit, '_elementor_page_settings', $default_options );
		}
		update_option('pbmit_elementor_kit_reseted', 'yes');
	}

}
}
add_action( 'init', 'pbmit_xcare_reset_elementor_kit' );
add_action( 'admin_init', 'pbmit_xcare_reset_elementor_kit' );


/**
 * Clear Kirki font cache
 */
if( !function_exists('pbmit_clear_kirki_font_cache') ){
function pbmit_clear_kirki_font_cache(){
	$pbmit_theme_version	= get_option('pbmit-xcare-theme-version');
	$current_theme			= wp_get_theme();
	$current_theme_version	= $current_theme->Version;
	if( $pbmit_theme_version != $current_theme_version ){
		delete_option( 'kirki_downloaded_font_files' );
		delete_transient( 'kirki_remote_url_contents' );
		delete_transient( 'kirki_googlefonts_cache' );
		if( is_dir( WP_CONTENT_DIR . 'fonts' ) ){
			rmdir( WP_CONTENT_DIR . 'fonts' );
		}
	}
}
}
add_action( 'init', 'pbmit_clear_kirki_font_cache' );


/**
 * Elementor opitons changes
 */

if( !function_exists('pbmit_elementor_changes') ){
function pbmit_elementor_changes(){
	$container		= get_option('elementor_experiment-container');
	$container_grid	= get_option('elementor_experiment-container_grid');
	if( $container != 'inactive' ){
		update_option('elementor_experiment-container', 'inactive');
	}
	if( $container_grid != 'inactive' ){
		update_option('elementor_experiment-container_grid', 'inactive');
	}
}
}
add_action( 'init', 'pbmit_elementor_changes' );

// Ajax Pagination
if( !function_exists('pbmit_ajax_pagination') ){
function pbmit_ajax_pagination(){

	if ( ! wp_verify_nonce( $_POST['nonce'], 'pbmit_ajax_pagination' ) ) {
		return '';
		exit();
	}

	//$loopFile = $_POST['loop_file'];
	$nonce = '';
	if( isset($_POST['nonce']) && !empty($_POST['nonce']) ){
		$nonce = $_POST['nonce'];
	}
	$show = '3';
	if( isset($_POST['show']) && !empty($_POST['show']) ){
		$show = $_POST['show'];
	}

	$paged = '1';
	if( isset($_POST['pagination']) && !empty($_POST['pagination']) ){
		$paged = $_POST['pagination'];
	}


	$cpt = 'post';
	if( isset($_POST['cpt']) && !empty($_POST['cpt']) ){
		$cpt_name = $cpt = $_POST['cpt'];
		if( $cpt == 'blog' ){
			$cpt_name = 'post'; 
		} else if($cpt == 'team'){
			$cpt_name = 'pbmit-team-member';
		} else {
			$cpt_name = 'pbmit-'.$cpt;
		}
	}
	$columns = '3';
	if( isset($_POST['columns']) && !empty($_POST['columns']) ){
		$columns = $_POST['columns'];
	}
	$style = '1';
	if( isset($_POST['style']) && !empty($_POST['style']) ){
		$style = $_POST['style'];
	}
	$orderby = '';
	if( isset($_POST['orderby']) && !empty($_POST['orderby']) ){
		$orderby = $_POST['orderby'];
	}
	$order = '';
	if( isset($_POST['order']) && !empty($_POST['order']) ){
		$order = $_POST['order'];
	}
	$from_category = '';
	if( isset($_POST['from_category']) && !empty($_POST['from_category']) ){
		$from_category = $_POST['from_category'];
	}
	$offset = 0;
	if( isset($_POST['offset']) && !empty($_POST['offset']) ){
		$offset = $_POST['offset'];
	}

	if( $paged>1 ){
		$offset = $offset + ( ($paged-1) * $show);
	}

	// Preparing $args
	$args = array(
		'post_type'				=> $cpt_name,
		'status'				=> 'publish',
		'posts_per_page'		=> $show,
		'ignore_sticky_posts'	=> true,
		'offset'				=> $offset,
	);

	// From selected category/group
	if( !empty($from_category) && $from_category != '*' ){
		//$from_category = explode(',', $from_category);
		$args['tax_query'] = array(
			array(
				'taxonomy' => pbmit_get_category_of_cpt($cpt),
				'field'    => 'slug',
				'terms'    => $from_category,
			),
		);
	};

	if( !empty($orderby) && $orderby!='none' ){
		$args['orderby'] = $orderby;
		if( !empty($order) ){
			$args['order'] = $order;
		}
	}

	// Wp query to fetch posts
	$posts = new \WP_Query( $args );

	if ( $posts->have_posts() ) {

		$odd_even		= 'odd';
		$col_odd_even	= 'odd';
		$x				= 1;
		while ( $posts->have_posts() ) {
			$return = '';
			$posts->the_post();

			// Template
			if( file_exists( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) ) ){

				$return .= pbmit_element_block_container( array(
					'position'		=> 'start',
					'column'		=> $columns,
					'cpt'			=> $cpt,
					'taxonomy'		=> pbmit_get_category_of_cpt($cpt),
					'style'			=> $style,
					'odd_even'		=> $odd_even,
					'col_odd_even'	=> $col_odd_even,
				) );

				ob_start();
				$r = include( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) );
				$return .= ob_get_contents();
				ob_end_clean();

				$return .= pbmit_element_block_container( array(
					'position'	=> 'end',
				) );

			}

			echo pbmit_esc_kses($return);

			// odd or even
			if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
			if( $x % $columns == 0 ){
				if( $col_odd_even == 'odd' ){ $col_odd_even = 'even'; } else { $col_odd_even = 'odd'; }
			}
			$x++;

		}
		?>

		<?php

	}
	wp_reset_postdata();

	// ajax loader for ajax sortable category
	echo pbmit_esc_kses('<div class="pbmit-ajax-loader"><div class="pbmit-ajax-loader-inner"></div></div>');


	wp_die(); // this is required to terminate immediately and return a proper response
}
}
add_action('wp_ajax_pbmit_ajax_pagination', 'pbmit_ajax_pagination'); // for logged in user
add_action('wp_ajax_nopriv_pbmit_ajax_pagination', 'pbmit_ajax_pagination'); // if user not logged in