<?php
if( !function_exists('pbmit_icon_library_list') ){
function pbmit_icon_library_list() {
	$icon_libraries = array(
		'pbmit-xcare-icon' => array(
			'name'			=> esc_attr__( 'Xcare Icon', 'xcare' ),
			'default_icon'	=> 'pbmit-xcare-icon pbmit-xcare-icon-light',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/pbmit-xcare-icon/flaticon_xcare.css' ),
			'common_class'	=> 'pbmit-xcare-icon',
			'class_prefix'	=> 'pbmit-xcare-icon-',
		),
		'pbmit-xcare-gastroenterology-icon' => array(
			'name'			=> esc_attr__( 'xcare Gastroenterology Icon', 'xcare' ),
			'default_icon'	=> 'pbmit-xcare-icon pbmit-xcare-icon-light',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/pbmit-xcare-icon/pbmit-xcare-gastroenterology-icon/flaticon_gastroenterology.css' ),
			'common_class'	=> 'pbmit-xcare-gastroenterology-icon',
			'class_prefix'	=> 'pbmit-xcare-gastroenterology-icon-',
		),
		'elementor-icons-fa-regular'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Regular', 'xcare' ),
			'default_icon'	=> 'far fa-address-book',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/regular.min.css' ),
			'common_class'	=> 'far',
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-solid'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Solid', 'xcare' ),
			'default_icon'	=> 'fas fa-star',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/solid.min.css' ),
			'common_class'	=> 'fas',
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-brands'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Brands', 'xcare' ),
			'default_icon'	=> 'fab fa-facebook-square',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/brands.min.css' ),
			'common_class'	=> 'fab',
			'class_prefix'	=> 'fa-',
		),
		'material-icons'	=> array(
			'name'			=> esc_attr__( 'Material Icons', 'xcare' ),
			'default_icon'	=> 'mdi mdi-group',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/material-icons/css/material-icons.min.css' ),
			'common_class'	=> 'mdi',
			'class_prefix'	=> 'mdi-',
		),
		'sgicon'	=> array(
			'name'			=> esc_attr__( 'Stroke Gap Icons', 'xcare' ),
			'default_icon'	=> 'sgicon sgicon-WorldWide',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/stroke-gap-icons/style.css' ),
			'common_class'	=> 'sgicon',
			'class_prefix'	=> 'sgicon-',
		),
	);
	return $icon_libraries;
}
}

/**
 *  Global function - This will return array of different templates for CPT and other boxes
 */
if( !function_exists('pbmit_element_template_list') ){
function pbmit_element_template_list( $for='portfolio', $section=true ){
	$return = array();
	if( !empty($for) ){
		// Default titles
		$portfolio_cpt_singular_title	= esc_attr__('Portfolio','xcare');
		$service_cpt_singular_title		= esc_attr__('Service','xcare');
		$team_cpt_singular_title		= esc_attr__('Team Member','xcare');
		$post_cpt_singular_title		= esc_attr__('Post','xcare');

		if( class_exists('Kirki') ){
			// Portfolio - singular
			$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
			$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
			// Service - singular
			$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
			$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
			// Team - singular
			$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
			$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;

			// Post - singular
			$post_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
			$post_cpt_singular_title	= ( !empty($post_cpt_singular_title2) ) ? $post_cpt_singular_title2 : $post_cpt_singular_title ;

		}
		$elements_array = array(

			'icon-heading'			=> array( 'name' => esc_attr__('Icon Heading', 'xcare'),
				'total_styles'			=> 40,
				'exclude_in_customizer' => array(), // add style number here
			),			
			'portfolio'				=> array( 'name' => $portfolio_cpt_singular_title,
				'total_styles'			=> 2,
				'exclude_in_customizer' => array('2'), // add style number heres
			),			
			'service'				=> array( 'name' => $service_cpt_singular_title,
				'total_styles'			=> 9,
				'exclude_in_customizer' => array('3','4','5'), // add style number here
			),
			'team'					=> array( 'name' => $team_cpt_singular_title,
				'total_styles'			=> 4,
				'exclude_in_customizer' => array('2'), // add style number here
			),
			'testimonial'			=> array( 'name' => esc_attr__('Testimonial', 'xcare'),
				'total_styles'			=> 4,
				'exclude_in_customizer' => array('2'), // add style number here
			),
			'client'				=> array( 'name' => esc_attr__('Client', 'xcare'),
				'total_styles'			=> 1,
				'exclude_in_customizer' => array(), // add style number here
			),
			'blog'					=> array( 'name' => esc_attr__('Blog', 'xcare'),
				'total_styles'			=> 4,
				'exclude_in_customizer' => array('2','3','4'), // add style number here
			),	
			'pricing-table'			=> array( 'name' => esc_attr__('Pricing Table', 'xcare'),
				'total_styles'			=> 2,
				'exclude_in_customizer' => array(), // add style number here
			),
			'facts-in-digits'		=> array( 'name' => esc_attr__('Facts In Digits', 'xcare'),
				'total_styles'			=> 8,
				'exclude_in_customizer' => array(), // add style number here
			),
			'static-box'			=> array( 'name' => esc_attr__('Static Box', 'xcare'),
				'total_styles'			=> 2,
				'exclude_in_customizer' => array(), // add style number here
			),
			'opening-hours-list'	=> array( 'name' => esc_attr__('Opening Hours List', 'xcare'),
				'total_styles'			=> 2,
				'exclude_in_customizer' => array(), // add style number here
			),
			'event'					=> array( 'name' => esc_attr__('Event', 'xcare'),
				'total_styles'			=> 1,
				'exclude_in_customizer' => array(), // add style number here
			),
			'marquee-effect'		=> array( 'name' => esc_attr__('Marquee Effect', 'xcare'),
				'total_styles'			=> 1,
				'exclude_in_customizer' => array(), // add style number here
			),
			'title-animation'		=> array( 'name' => esc_attr__('Title Animation ', 'xcare'),
				'total_styles'			=> 4,
				'exclude_in_customizer' => array(), // add style number here
			),
			'spinner-box'			=> array( 'name' => esc_attr__('Spinner Box', 'xcare'),
				'total_styles'			=> 1,
				'exclude_in_customizer' => array(), // add style number here
			),
			'timeline'				=> array( 'name' => esc_attr__('Timeline  Element', 'xcare'),
				'total_styles'			=> 2 ,
				'exclude_in_customizer' => array(), // add style number here
			),
			'tween-effect'			=> array( 'name' => esc_attr__('Tween Effect', 'xcare'),
				'total_styles'			=> 1,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'wooproducts'		=> array( 'name' => esc_attr__('Wooproducts  Element', 'xcare'),
				'total_styles' => 1,
				'exclude_in_customizer' => array(), // add style number here
			),
		);

		if( !empty($elements_array[$for]) ){
			for ($x = 1; $x <= $elements_array[$for]['total_styles']; $x++) {
				$thumb = get_template_directory_uri() . '/includes/images/no-style-thumb.jpg';
				if( file_exists( get_stylesheet_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_stylesheet_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				} else if( file_exists( get_template_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_template_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				}
				if( $section !== true && $section == 'customizer' ){
					if( !in_array( $x, $elements_array[$for]['exclude_in_customizer'] ) ){
						$return[$x] = $thumb;
					}
				} else{
					$return[$x] = $thumb;
				}
			}
		}
	}
	return $return;
}
}

/**
 *  Global function - Get category of CPT
 */
if( !function_exists('pbmit_get_category_of_cpt') ){
function pbmit_get_category_of_cpt( $cpt='post' ){
	$return = 'category';
	switch ($cpt) {
		case 'portfolio':
			$return = 'pbmit-portfolio-category';
			break;
		case 'service':
			$return = 'pbmit-service-category';
			break;
		case 'team':
			$return = 'pbmit-team-group';
			break;
		case 'testimonial':
			$return = 'pbmit-testimonial-cat';
			break;
		case 'client':
			$return = 'pbmit-client-group';
			break;
	}

	return esc_attr($return);
}
}

/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
if ( ! function_exists( 'pbmit_edit_link' ) ) {
function pbmit_edit_link() {
	edit_post_link(
		esc_attr__( 'Edit', 'xcare' ),
		'<span class="edit-link">',
		'</span>'
	);
}
}

if( !function_exists('pbmit_get_base_option') ) {
function pbmit_get_base_option( $option='' ){
	$return = '';
	if( class_exists('Kirki') && !defined('XCARE_TPC_ACTIVATED') ){
		$return = Kirki::get_option( $option );
	} else {
		if( empty($kirki_options_array) && file_exists(get_template_directory() . '/includes/customizer-options.php') ){
			include get_template_directory() . '/includes/customizer-options.php';
		}
		if( isset($kirki_options_array) && !empty($kirki_options_array) && is_array($kirki_options_array) && count($kirki_options_array)>0 ){
			foreach( $kirki_options_array as $kirki_options ){
				if( !empty($kirki_options['section_fields']) ){
					foreach( $kirki_options['section_fields'] as $field ){
						if( !empty($field['settings']) && $field['settings']==$option && isset($field['default']) ){
							$return = $field['default'];
						}
					}
				}
			}
		}
	}
	return $return;
}
}

/*
 *  PBMInfotech element container
 */
if( !function_exists('pbmit_element_container') ){
function pbmit_element_container( $settings = array( 'position' => 'start', 'cpt' => 'blog', 'data' => array() ) ){

	// New Vars
	$position	= ( !empty($settings['position']) ) ? $settings['position'] : 'start' ;
	$cpt		= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$view_type	= ( !empty($settings['data']['view-type']) ) ? $settings['data']['view-type'] : 'row-column' ;
	$show		= ( !empty($settings['data']['show']) ) ? $settings['data']['show'] : '3' ;

	$offset		= ( !empty($settings['data']['offset']) ) ? $settings['data']['offset'] : 0 ;
	$from_category	= ( !empty($settings['data']['from_category']) ) ? $settings['data']['from_category'] : '' ;
	$orderby	= ( !empty($settings['data']['orderby']) ) ? $settings['data']['orderby'] : '' ;
	$order		= ( !empty($settings['data']['order']) ) ? $settings['data']['order'] : '' ;

	$columns	= ( !empty($settings['data']['columns']) ) ? $settings['data']['columns'] : '3' ;
	$gap		= ( !empty($settings['data']['gap']) ) ? $settings['data']['gap'] : '' ;
	$style		= ( !empty($settings['data']['style']) ) ? $settings['data']['style'] : '1' ;
	$infinite_scroll	= ( !empty($settings['data']['infinite-scroll']) && $settings['data']['infinite-scroll']=='yes' ) ? 'yes' : 'no' ;
	$loadmore_btn		= ( !empty($settings['data']['infinite-scroll-show-loadmore-type']) && $settings['data']['infinite-scroll-show-loadmore-type']=='button' ) ? 'yes' : 'no' ;

	// Carousel
	$sticky_carousel	= ( !empty($settings['data']['sticky-carousel']) && $settings['data']['sticky-carousel']=='yes' ) ? 'true' : 'false' ;
	$car_loop			= ( !empty($settings['data']['carousel-loop']) && $settings['data']['carousel-loop']=='1' ) ? 'true' : 'false' ;
	$car_autoplay		= ( !empty($settings['data']['carousel-autoplay']) && $settings['data']['carousel-autoplay']=='1' ) ? 'true' : 'false' ;
	$car_center			= ( !empty($settings['data']['carousel-center']) && $settings['data']['carousel-center']=='1' ) ? 'true' : 'false' ;
	$car_dots			= ( !empty($settings['data']['carousel-dots']) && $settings['data']['carousel-dots']=='1' ) ? 'true' : 'false' ;
	$car_reverse		= ( !empty($settings['data']['carousel-reverse']) && $settings['data']['carousel-reverse']=='1' ) ? 'true' : 'false' ;
	$car_speed			= ( !empty($settings['data']['carousel-speed']) ) ? trim($settings['data']['carousel-speed']) : '1000' ;
	$car_delay			= ( !empty($settings['data']['carousel-delay']) ) ? trim($settings['data']['carousel-delay']) : '4000' ;
	$show_portion		= ( !empty($settings['data']['show-portion-column']) ) ? trim($settings['data']['show-portion-column']) : 'false' ;

	$car_nav = 'false';
	if( !empty($settings['data']['carousel-nav']) ) {
		if( $settings['data']['carousel-nav']=='1' ) {
			$car_nav = 'true';
		} else if( $settings['data']['carousel-nav']=='above' ) {
			$car_nav = 'above';
		}
	}

	if( $position=='start' ){

		// Enqueue scripts and styles
		if( $view_type=='carousel' ){
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
		}

		$cpt_name = $cpt;
		if( $cpt_name == 'blog' ){
			$cpt_name = 'post';
		} else if( $cpt_name == 'team' ){
			$cpt_name = 'pbmit-team-member';
		} else {
			$cpt_name = 'pbmit-'.$cpt_name;
		};

		// Preparing $args to get total posts
		$args = array(
			'post_type'				=> $cpt_name,
			'status'				=> 'publish',
			'posts_per_page'		=> 999999,
			'ignore_sticky_posts'	=> true,
			'offset'				=> $offset,
		);

		// From selected category/group
		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => pbmit_get_category_of_cpt($cpt),
					'field'	=> 'slug',
					'terms'	=> $from_category,
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
		// Total posts
		$total_posts = 0;
		if( !empty($posts->found_posts) ){
			$total_posts = $posts->found_posts;
		}
		// Pagination
		$pagination = 1;
		if( !empty($total_posts) ){
			$pagination = ceil($total_posts / $show);
		}

		?>

		<div class="pbminfotech-element
			pbminfotech-element-<?php echo esc_attr($cpt); ?>
			pbmit-element-<?php echo esc_attr($cpt); ?>-style-<?php echo esc_attr($style); ?>
			pbmit-element-viewtype-<?php echo esc_attr($view_type); ?>
			pbmit-element-column-<?php echo esc_attr(pbmit_number_to_words($columns)); ?>
			pbmit-element-sticky-carousel-<?php echo esc_attr($sticky_carousel); ?>
			pbmit-element-caroursel-dot-<?php echo esc_attr($car_dots); ?>
			pbmit-infinite-scroll-<?php echo esc_attr($infinite_scroll); ?>
			pbmit-infinite-scroll-button-<?php echo esc_attr($loadmore_btn); ?>
			<?php if( !empty($gap) ){ ?>pbminfotech-gap-<?php echo esc_attr($gap); ?><?php } ?>
			<?php if( !empty($settings['data']['ajax_pagination']) && $settings['data']['ajax_pagination']=='yes' ){ ?>pbmit-ajax-pagination-yes<?php } ?>
			<?php if( !empty($settings['data']['sortable']) ){ ?>pbmit-sortable-<?php echo esc_attr($settings['data']['sortable']); ?><?php } ?>
			<?php if( !empty($settings['data']['ajax_sortable']) ){ ?>pbmit-ajax-sortable-<?php echo esc_attr($settings['data']['sortable']); ?><?php } ?>"

			data-cpt="<?php echo esc_attr($cpt); ?>"
			data-totalpagination="<?php echo esc_attr($pagination); ?>"
			data-style="<?php echo esc_attr($style); ?>"
			data-show="<?php echo esc_attr($show); ?>"
			data-columns="<?php echo esc_attr($columns); ?>"
			data-loop="<?php echo esc_attr($car_loop); ?>"
			data-autoplay="<?php echo esc_attr($car_autoplay); ?>"
			data-center="<?php echo esc_attr($car_center); ?>"
			data-nav="<?php echo esc_attr($car_nav); ?>"
			data-dots="<?php echo esc_attr($car_dots); ?>"
			data-reverse="<?php echo esc_attr($car_reverse); ?>"
			data-speed="<?php echo esc_attr($car_speed); ?>"
			data-delay="<?php echo esc_attr($car_delay); ?>"
			data-margin="<?php echo esc_attr($gap); ?>"
			data-show-portion="<?php echo esc_attr($show_portion); ?>">

			<div class="pbmit-element-inner">
		

		<?php

	} else {
		?>
			</div><!-- .pbmit-element-inner -->
		</div><!-- .pbminfotech-element -->

		<?php
	}
}
}

if( !function_exists('pbmit_social_links_list') ){
function pbmit_social_links_list( $settings = array( 'position' => 'start', 'column' => '3' ) ){
	return array(
		array(
			'id'			=> 'facebook',
			'label'			=> esc_attr('Facebook'),
			'icon_class'	=> 'pbmit-base-icon-facebook-f',
		),
		array(
			'id'			=> 'twitter',
			'label'			=> esc_attr('Twitter'),
			'icon_class'	=> 'pbmit-base-icon-twitter-2',
		),
		array(
			'id'			=> 'linkedin',
			'label'			=> esc_attr('LinkedIn'),
			'icon_class'	=> 'pbmit-base-icon-linkedin-in',
		),
		array(
			'id'			=> 'instagram',
			'label'			=> esc_attr('Instagram'),
			'icon_class'	=> 'pbmit-base-icon-instagram',
		),
		array(
			'id'			=> 'youtube',
			'label'			=> esc_attr('Youtube'),
			'icon_class'	=> 'pbmit-base-icon-youtube-play',
		),
		array(
			'id'			=> 'flickr',
			'label'			=> esc_attr('Flickr'),
			'icon_class'	=> 'pbmit-base-icon-flickr',
		),
		array(
			'id'			=> 'pinterest',
			'label'			=> esc_attr('Pinterest'),
			'icon_class'	=> 'pbmit-base-icon-pinterest',
		),
		array(
			'id'			=> 'tiktok',
			'label'			=> esc_attr('Tiktok'),
			'icon_class'	=> 'pbmit-base-icon-tiktok',
		),
	);
}
}

if( !function_exists('pbmit_team_social_links') ){
function pbmit_team_social_links(){
	$return = '';
	$social_list = pbmit_social_links_list();
	foreach( $social_list as $social ){
		$social_link = get_post_meta( get_the_ID(), 'pbmit-social-links_' . $social['id'], true );
		if( !empty($social_link) ){
			$return .= '<li class="pbmit-social-li pbmit-social-'.$social['id'].'"><a href="' . esc_url($social_link) . '" title="' . esc_attr($social['label']) . '" target="_blank"><span><i class="' . esc_attr($social['icon_class']) . '"></i></span></a></li>';
		}
	}
	if( !empty($return) ){
		echo pbmit_esc_kses('<ul class="pbmit-social-links pbmit-team-social-links">'.$return.'</ul>');
	}
}
}

if( !function_exists('pbmit_social_share_list') ){
function pbmit_social_share_list( $for='' ){
	$list = array(
		'facebook'	=> array(
			'title'			=> esc_attr('Facebook'),
			'link'			=> 'https://facebook.com/sharer/sharer.php?u=%1$s&title=%2$s',
			'icon_class'	=> 'pbmit-base-icon-facebook-f',
		),
		'twitter'	=> array(
			'title' 		=> esc_attr('Twitter'),
			'link'			=> 'https://twitter.com/intent/tweet/?text=%2$s&amp;url=%1$s',
			'icon_class'	=> 'pbmit-base-icon-twitter',
		),
		'google-plus'	=> array(
			'title' 		=> esc_attr('Google Plus'),
			'link'			=> 'https://plus.google.com/share?url=%1$s',
			'icon_class'	=> 'pbmit-base-icon-gplus',
		),
		'tumblr'		=> array(
			'title' 		=> esc_attr('Tumblr'),
			'link'			=> 'https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=%2$s&amp;caption=%2$s&amp;content=%1$s&amp;canonicalUrl= &amp;shareSource=tumblr_share_button',
			'icon_class'	=> 'pbmit-base-icon-tumbler',
		),
		'pinterest'		=> array(
			'title'			=> esc_attr('Pinterest'),
			'link'			=> 'https://pinterest.com/pin/create/button/?url=%1$s&amp;media=%1$s&amp;description=%2$s',
			'icon_class'	=> 'pbmit-base-icon-pinterest',
		),
		'linkedin'		=> array(
			'title'			=> esc_attr('LinkedIn'),
			'link'			=> 'https://www.linkedin.com/shareArticle?mini=true&amp;url=%1$s&amp;title=%2$s&amp;summary=%2$s&amp;source=%1$s',
			'icon_class'	=> 'pbmit-base-icon-linkedin-squared',
		),
		'reddit'		=> array(
			'title'			=> esc_attr('Reddit'),
			'link'			=> 'https://reddit.com/submit/?url=%1$s&title=%2$s',
			'icon_class'	=> 'pbmit-base-icon-reddit',
		),
	);
	if( $for=='customizer' ){
		$return_array = array();
		foreach( $list as $social=>$data ){
			$return_array[$social] = $data['title'];
		}
		return $return_array;
	}
	return $list;
}
}

if( !function_exists('pbmit_team_designation') ){
function pbmit_team_designation(){
	// Designation
	$designation = get_post_meta( get_the_ID(), 'pbmit-team-details_designation', true );
	if( !empty($designation) ){
		?>
		<div class="pbminfotech-box-team-position"><?php echo esc_html($designation); ?></div>
		<?php
	}
}
}

if( !function_exists('pbmit_get_all_option_array') ) {
function pbmit_get_all_option_array(){
	$return = array();
	include get_template_directory() . '/includes/customizer-options.php';
	foreach( $kirki_options_array as $kirki_options ){
		if( !empty($kirki_options['section_fields']) ){
			foreach( $kirki_options['section_fields'] as $field ){
				$settings			= str_replace( '-', '_', $field['settings'] );
				$settings			= str_replace( '-', '_', $settings );
				$settings			= str_replace( '-', '_', $settings );
				$settings			= str_replace( '-', '_', $settings );
				$settings			= str_replace( '-', '_', $settings );
				$return[ $settings ] = pbmit_get_base_option( $field['settings'] );
			}
		}
	}
	return $return;
}
}

if( !function_exists('pbmit_inline_css') ) {
function pbmit_inline_css( $css='' ){
	if( !empty($css) ){
		global $pbmit_inline_css;
		if( empty($pbmit_inline_css) ){
			$pbmit_inline_css = '';
		}
		$pbmit_inline_css .= $css;
	}
}
}

// Footer Copyright box area

if( !function_exists('pbmit_footer_copyright_area') ){
	function pbmit_footer_copyright_area() {
		$footer_copyright_content	= array();
		$right_content				= '';

		$footer_style				= pbmit_get_base_option('footer-style');
		$footer_copyright_text		= pbmit_get_base_option('copyright-text');
		$footer_right_content		= pbmit_get_base_option('footer-copyright-right-content');

		if( $footer_style){
			if( $footer_right_content=='menu' ){
				if( has_nav_menu('pbminfotech-footer') ){
					ob_start();
					wp_nav_menu( array(
						'theme_location' => 'pbminfotech-footer',
						'menu_id'		=> 'pbmit-footer-menu',
						'menu_class'	 => 'pbmit-footer-menu',
					) );
					$right_content = ob_get_contents();
					ob_end_clean();
				}

			} else if( $footer_right_content=='social' ){
				// Social
				if( shortcode_exists('pbmit-social-links') ){
					$right_content = do_shortcode('[pbmit-social-links]');
				}

			}
		}

		if( !empty($footer_copyright_text) ){
			$footer_copyright_content[] = '<div class="pbmit-footer-copyright-text-area"> ' . pbmit_esc_kses( do_shortcode($footer_copyright_text) ) . '</div>';
		}
		if( !empty($right_content) ){
			$footer_copyright_content[] = '<div class=" pbmit-footer-' . pbmit_esc_kses($footer_right_content) . '-area">' . pbmit_esc_kses($right_content) . '</div>';
		}

		/* Footer Copyright Content area - column class */
		switch( count($footer_copyright_content) ){
			case 1;
				$footer_copyright_class = 'col-md-12';
				break;
			case 2;
				$footer_copyright_class = 'col-md-6';
				break;
			case 3;
				$footer_copyright_class = 'col-md-4';
				break;
		}
		if ( count($footer_copyright_content) == '3'){
			if( !empty($footer_copyright_text) || !empty($left_menu_content) ){
				echo pbmit_esc_kses('<div class="col-md-5"><div class="pbmit-footer-menu-area"> ' .pbmit_esc_kses( do_shortcode($left_menu_content) ) . '</div><div class="pbmit-footer-copyright-text-area"> ' . pbmit_esc_kses( do_shortcode($footer_copyright_text) ) . '</div></div>');
			}
		} else if( !empty($footer_copyright_content) ){
			foreach( $footer_copyright_content as $content ){
				echo pbmit_esc_kses('<div class="' . esc_attr( $footer_copyright_class ) . '">' . pbmit_esc_kses($content) . '</div>');
			}
		}
	}
}

/**
 *  footer overlay boxes
 */
if( !function_exists('pbmit_footer_overlay_boxes') ){
	function pbmit_footer_overlay_boxes() {
		$left	= pbmit_get_base_option('overlay-box-left');
		$right	= pbmit_get_base_option('overlay-box-right');

		if( !empty($left) || !empty($right) ){
			echo pbmit_esc_kses('<div class="pbmit-footer-overlay"><div class="pbmit-footer-overlay-inner"><div class="container"><div class="row">');
			if( !empty($left) ){
				echo pbmit_esc_kses('<div class="pbmit-footer-overlay-left col-md-6">');
				echo do_shortcode( $left );
				echo pbmit_esc_kses('</div>');
			}
			if( !empty($right) ){
				echo pbmit_esc_kses('<div class="pbmit-footer-overlay-right col-md-6">');
				echo do_shortcode( $right );
				echo pbmit_esc_kses('</div>');
			}
			echo pbmit_esc_kses('</div></div></div></div>');
		}
	}
}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
if( !function_exists('pbmit_color_luminance') ) {
function pbmit_color_luminance( $hex='#ff0000', $percent='0.1' ) {
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	if ( strlen( $hex ) < 6 ) {
		if( !empty($hex[0]) ){
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}
	}
	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 );
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}
	return $new_hex;
}
}

/*
 *  Main logo
 */
if( !function_exists('pbmit_logo') ) {
function pbmit_logo( $inneronly='' ) {
	$return				= '';
	$logo_img			= '';
	$main_logo			= pbmit_get_base_option('logo');
	$sticky_logo		= pbmit_get_base_option('sticky-logo');
	$responsive_logo	= pbmit_get_base_option('responsive-logo');
	$burger_logo		= pbmit_get_base_option('burger-logo');
	$header_style		= pbmit_get_base_option('header-style');

	if( !empty($main_logo) ){
		$logo_img .= '<img class="pbmit-main-logo" src="'.esc_url($main_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($sticky_logo) ){
		$logo_img .= '<img class="pbmit-sticky-logo" src="'.esc_url($sticky_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($responsive_logo) ){
		$logo_img .= '<img class="pbmit-responsive-logo" src="'.esc_url($responsive_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($burger_logo) && $header_style == '9'){
		$logo_img .= '<img class="pbmit-burger-logo" src="'.esc_url($burger_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}

	if( !empty($logo_img) ){
		if( $inneronly=='yes' ){
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . pbmit_esc_kses($logo_img) . '</a>';
		} else {
			$return .= ( is_front_page() ) ? '<h1 class="site-title">' : '<div class="site-title">' ;
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
			$return .= ( is_front_page() ) ? '<span class="site-title-text">' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . '</span>' : '' ;
			$return .= pbmit_esc_kses($logo_img);
			$return .= '</a>';
			$return .= ( is_front_page() ) ? '</h1>' : '</div>' ;
		}
	}
	return pbmit_esc_kses($return);
}
}

/*
 *  HTML Filter
 */
if( !function_exists('pbmit_esc_kses') ) {
function pbmit_esc_kses( $html = '' ) {
	$return = '';
	$allowed_html = array(
		'p'	=> array(
			'class'		=> array(),
			'id'		=> array(),
		),
		'noscript'	=> array(),
		'a'			=> array(
			'class'			=> array(),
			'href'			=> array(),
			'title'			=> array(),
			'target'		=> array(),
			'rel'			=> array(),
			'data-sortby'	=> array(),
			'data-balloon-pos'	=> array(),
			'data-balloon'	=> array(),
			'data-pagenum'	  => array(),
			'data-category'	=> array(),
		),
		'button'	=> array(
			'class'		=> array(),
			'href'		=> array(),
			'title'		=> array(),
		),
		'ul'		=> array(
			'class'		=> array(),
		),
		'ol'		=> array(
			'class'		=> array(),
		),
		'li'		=> array(
			'class'			=> array(),
			'data-content'	=> array(),
		),
		'br'		=> array(),
		'em'		=> array(),
		'strong'	=> array(),
		'i'			=> array(
			'class'		=> array(),
			'style'		=> array(),
		),
		'small'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'role'			=> array(),
			'data-bg'		=> array(),
			'data-iconset'	=> array(),
			'data-icon'		=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-size'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-max'			=> array(),
			'data-tag'			=> array(),
			'data-id'			=> array(),
			'data-model-id'		=> array(),
			'data-shortcode-controls'	=> array(),
			'data-x-start'		=> array(),
			'data-x-end'  		=> array(),
			'data-y-start'		=> array(),
			'data-y-end'  		=> array(),
			'data-scale-x-start'=> array(),
			'data-scale-x-end'  => array(),
			'data-scale-y-start'=> array(),
			'data-scale-y-end'  => array(),
			'data-skew-x-start'=> array(),
			'data-skew-x-end'  => array(),
			'data-skew-y-start'=> array(),
			'data-skew-y-end'  => array(),
			'data-rotate-x-start'=> array(),
			'data-rotate-x-end'  => array(),
			'data-rotate-y-start'=> array(),
			'data-rotate-y-end'  => array(),
			'data-frame-count'	 => array(),
			'data-height' 		 => array(),
			'data-width' 		 => array(),
			'data-cursor-text'   => array(),
			'data-magnetic'	  => array(),
			'data-cursor'		=> array(),
			'data-cursor-stick'  => array(),
			'data-cursor-tooltip'=> array(),
			'data-speed'		 => array(),
			'data-bgcolor'		 => array(),
		),
		'span'		=> array(
			'class'				=> array(),
			'id'				=> array(),
			'style'				=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-size'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-percentage-value'	=> array(),
			'data-value'		=> array(),
		),
		'h1'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h2'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'data-text'	=> array(),
		),
		'h3'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'data-text'	=> array(),
		),
		'h4'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'data-text'	=> array(),
		),
		'h5'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'data-text'	=> array(),
		),
		'h6'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'header'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'img'		=> array(
			'class'		=> array(),
			'src'		=> array(),
			'alt'		=> array(),
			'title'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'srcset'	=> array(),
			'sizes'		=> array(),
			'data-id'	=> array(),
			'data-srcset' => array(),
			'data-src'	=> array(),
		),
		'time'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'datetime'	=> array(),
		),
		'iframe'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'src'		=> array(),
			'frameborder'	=> array(),
			'allow'		=> array(),
			'allowfullscreen'	=> array(),
		),
		'blockquote'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'article'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'input'	=> array(
			'type'			=> array(),
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'checked'		=> array(),
		),
		'textarea'	=> array(
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'	=> array(
			'name'			=> array(),
			'method'		=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'data-id'		=> array(),
			'data-name'		=> array(),
		),
		'label'	=> array(
			'for'			=> array(),
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'aside'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'sup'	=> array(
			'class'			=> array(),
		),
		'sub'	=> array(
			'class'			=> array(),
		),
		'pre'	=> array(),
		'table'	=> array(
			'class'			=> array(),
			'style'			=> array(),
			'data-ninja_table_instance'	=> array(),
			'data-footable_id'	=> array(),
			'data-filter-delay'	=> array(),
			'aria-label'	=> array(),
			'id'			=> array(),
			'data-unique_identifier'	=> array(),
		),
		'thead'	=> array(
			'class'			=> array(),
		),
		'tr'	=> array(
			'class'			=> array(),
		),
		'th'	=> array(
			'class'			=> array(),
			'colspan'		=> array(),
			'scope'			=> array(),
		),
		'colgroup'	=> array(
			'class'			=> array(),
		),
		'tfoot'	=> array(
			'class'			=> array(),
		),
		'tspan'	=> array(
			'class'			=> array(),
		),
		'tbody'	=> array(
			'class'			=> array(),
		),
		'lottie-player'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'src'		=> array(),
			'mode'		=> array(),
			'loop'		=> array(),
			'controls'	=> array(),
			'autoplay'	=> array(),
			'speed'		=> array(),
			'background' => array(),
		),
		'script'	=> array(
			'class'			=> array(),
		),
		'line'	=> array(
			'x1'			=> array(),
			'y1'			=> array(),
			'x2'			=> array(),
			'y2'			=> array(),
		),
		'svg'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'xmlns'			=> array(),
			'xmlns:xlink'	=> array(),
			'x'				=> array(),
			'y'				=> array(),
			'viewbox'		=> array(),
			'style'			=> array(),
			'xml:space'		=> array(),
			'width'			=> array(),
			'height'		=> array(),
			'fill-rule'		=> array(),
			'clip-rule'		=> array(),
		),
		'g'		=> array(			
			'stroke-miterlimit'	  => array(),
			'stroke-linejoin'	  => array(),
			'stroke'			  => array(),
			'stroke-width'		  => array(),	
			'fill'				  => array(),	
		),
		'circle'		=> array(
			'cy'		=> array(),
			'cx'		=> array(),
			'r'			=> array(),	
			'class'		=> array(),	
		),
		'defs'	=> array(
			'class'		=> array(),
			'id'		=> array(),
		),
		'path'	=> array(
			'd'			=> array(),
			'stroke'	=> array(),
			'id' 		=> array(),
		),
		'text'	=> array(
			'class'		=> array(),
			'id'		=> array(),
		),
		'textPath'	 => array(
			'startOffset'   => array(),
			'xmlns:xlink'	=> array(),
		),
	);
	if( !empty($html) ){
		$return = wp_kses($html, $allowed_html);
	}
	return $return;
}
}

if ( !function_exists( 'pbmit_header_slider' ) ){
function pbmit_header_slider(){
	if( is_page() || is_singular() ){
		$slider_type = get_post_meta( get_the_ID(), 'pbmit-slider-type', true );
		if( !empty($slider_type) ){
			// Check if Slider Revolution
			if( $slider_type=='revolution-slider' ){
				$slider_slug = get_post_meta( get_the_ID(), 'pbmit-revolution-slider', true );
				if( !empty($slider_slug) && function_exists('add_revslider') ){
					echo pbmit_esc_kses('<div class="pbmit-slider-area">');
					add_revslider( esc_attr($slider_slug) );
					echo pbmit_esc_kses('</div>');
					// slider bottom content
					$below_content = get_post_meta( get_the_ID(), 'pbmit-slider-below-content', true );
					if( !empty($below_content) ){
						echo pbmit_esc_kses('<div class="container pbmit-slider-bottom-section"><div class="row">'.$below_content.'<div class="col-sm-5"></div></div></div>');
					}
				}
			} else if( $slider_type=='custom-code' ){
				$custom_slider_code = get_post_meta( get_the_ID(), 'pbmit-custom-slider-code', true );
				if( !empty($custom_slider_code) ){
					echo pbmit_esc_kses('<div class="pbmit-slider-area">');
					echo do_shortcode( pbmit_esc_kses($custom_slider_code) );
					echo pbmit_esc_kses('</div>');
				}
			}
		}
	}
}
}

if ( !function_exists( 'pbmit_get_featured_data' ) ){
function pbmit_get_featured_data( $settings = array() ){
	$return				= '';
	$post_id			= ( !empty($settings['post_id']) ) ? $settings['post_id'] : get_the_ID() ;
	$post_type			= get_post_type();
	$get_post_format	= get_post_format( $post_id );
	$post_format		= ( !empty( $get_post_format ) ) ? $get_post_format : 'standard' ;
	$featured_img_only	= ( isset($settings['featured_img_only']) && $settings['featured_img_only']==true ) ? true : false ;
	$image_size			= ( !empty($settings['size']) ) ? $settings['size'] : 'full' ;
	$with_link			= ( isset($settings['with_link']) && $settings['with_link'] == false ) ? false : true ;
	// for portfolio
	if( is_singular('pbmit-portfolio') ){
		$post_format = get_post_meta( $post_id, 'pbmit-featured-type', true );
		$post_format = ($post_format=='slider') ? 'gallery' : $post_format ;
	}
	if( $featured_img_only==true || !in_array($post_format, array('audio', 'video', 'gallery', 'quote', 'link')) ){
		if ( has_post_thumbnail( $post_id ) ) {
			if(  $with_link == true ) { $return .= '<a href="' . get_permalink( $post_id ) . '">'; }
			$return .= get_the_post_thumbnail( $post_id, $image_size );
			if( $with_link == true ) { $return .= '</a>'; }
		};
	} else {

		switch( $post_format ){

			case 'audio' :
				$audio_code = get_post_meta( $post_id, 'pbmit-pformat-audio', true );
				if( is_singular('pbmit-portfolio') ){
					$audio_code = get_post_meta( $post_id, 'pbmit-audio-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $audio_code, $attr );
				break;

			case 'video' :
				$video_code = get_post_meta( $post_id, 'pbmit-pformat-video', true );
				if( is_singular('pbmit-portfolio') ){
					$video_code = get_post_meta( $post_id, 'pbmit-video-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $video_code, $attr );
				break;

			case 'gallery' :
				// Enqueue scripts and styles
				wp_enqueue_script( 'lightslider' );
				wp_enqueue_style( 'lightslider' );
				$images = get_post_meta( $post_id, 'pbmit-photo-gallery', true );
				$images_pformat = get_post_meta( $post_id, 'pbmit-pformat-gallery', true );
				if( !empty($images_pformat) ){
					$images = $images_pformat;
				}
				if( !empty($images) ){
					$images_array = explode(',',$images);
					foreach( $images_array as $image_id ){
						$return .= '<div class="pbmit-gallery-image">'.wp_get_attachment_image($image_id, $image_size).'</div>';
					}
				}
				if( !empty($return) ){
					$return = '<div class="pbmit-gallery">'.$return.'</div>';
				}
				break;

			case 'quote' :
				$name		= get_post_meta( $post_id, 'pbmit-pformat-quote-source-name', true );
				$url		= get_post_meta( $post_id, 'pbmit-pformat-quote-source-url', true );
				$content	= get_the_content();
				if( !empty($url) && !empty($name) ){
					$name = '<a href="'.$url.'">'.$name.'</a>';
				}
				if( !empty($name) ){
					$name = '<div class="pbmit-block-quote-citation">'.$name.'</div>';
				}
				if( !empty($content) ){
					$return .= '<div class="pbmit-block-quote-content">'.nl2br($content) . $name .'</div>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							pbmit_inline_css( '.pbmit-block-quote-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					if( strpos($return, '<blockquote') === false ){
						$return = '<blockquote class="pbmit-block-quote">'.$return.'</blockquote>';
					}
					$return = '<div class="pbmit-block-quote-wrapper pbmit-block-quote-wrapper-'.$post_id.'">'.$return.'</div>';
				}
				break;

			case 'link' :
				$link		= get_post_meta( $post_id, 'pbmit-pformat-link-url', true );
				$title		= get_post_meta( $post_id, 'pbmit-pformat-link-title', true );
				if( empty($title) ){ $title = get_post_meta( $post_id, 'pbmit-pformat-link-url', true ); }

				if( !empty($link) ){
					$return = '<a href="'.$link.'">'.$title.'</a>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							pbmit_inline_css( '.pbmit-link-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					$return = '<div class="pbmit-link-wrapper pbmit-link-wrapper-'.$post_id.'"><div class="pbmit-link-inner">'.$return.'</div></div>';
				}
				break;
		}

	}
	if( !empty($return) ){
		$return = '<div class="pbmit-featured-img-wrapper"><div class="pbmit-featured-wrapper">'.$return.'</div></div>';
		echo pbmit_esc_kses($return);
	}
}
}

if ( !function_exists( 'pbmit_hex2rgb' ) ){
function pbmit_hex2rgb($color, $opacity='1'){
	$default = 'rgb(0,0,0)';
	if (empty($color))
		return $default;
	if ($color[0] == '#')
		$color = substr($color, 1);
	if (strlen($color) == 6)
		$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
	elseif (strlen($color) == 3)
		$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
	else
		return $default;
	$rgb = array_map('hexdec', $hex);
	if ($opacity) {
		if (abs($opacity) > 1)
			$opacity = 1.0;
		$output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
	} else {
		$output = 'rgb(' . implode(",", $rgb) . ')';
	}
	return $output;
}
}

if ( !function_exists( 'pbmit_hex2rgb_code' ) ){
function pbmit_hex2rgb_code($color){
	$default = 'rgb(0,0,0)';
	if (empty($color))
		return $default;
	if ($color[0] == '#')
		$color = substr($color, 1);
	if (strlen($color) == 6)
		$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
	elseif (strlen($color) == 3)
		$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
	else
		return $default;
	$rgb = array_map('hexdec', $hex);
	return implode(", ", $rgb);
}
}

if( !function_exists('pbmit_element_block_container') ){
function pbmit_element_block_container( $settings = array( 'position' => 'start', 'column' => '3', 'cpt' => 'blog', 'taxonomy' => 'category', 'style' => '1', 'odd_even' => '', 'col_odd_even' => '' ) ){
	$return = '';
	$cpt	= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$style	= ( !empty($settings['style']) ) ? $settings['style'] : '1' ;
	$terms	= '';
	 
	if( !empty($settings['taxonomy']) ){
		$terms = get_the_terms( get_the_ID(), $settings['taxonomy'] );
	}
	$odd_even_class = '';
	if( !empty($settings['odd_even']) ){
		$odd_even_class = 'pbmit-' . $settings['odd_even'] ;
	}
	$col_odd_even_class = '';
	if( !empty($settings['col_odd_even']) ){
		$col_odd_even_class = 'pbmit-col-' . $settings['col_odd_even'] ;
	}

	$term_slug = '';
	if( is_array($terms) && count($terms)>0 ){
		foreach( $terms as $term ){
			$term_slug .= $term->slug.' pbmit-term-' . $term->term_id . ' ';
		}
		$term_slug = trim($term_slug);
	}

	$style_class = 'pbmit-'.$cpt.'-style-'.$style;

	$column_class = '';

	if( $settings['position']=='start' ){
		switch( $settings['column'] ){
			case 'none':
				$column_class = '';
			break;
			case '1':
				$column_class = 'col-md-12';
			break;
			case '2':
				$column_class = 'col-md-6';
			break;
			case '3':
				$column_class = 'col-md-4';
			break;
			case '4':
				$column_class = 'col-md-6 col-lg-3';
			break;
			case '5':
				$column_class = 'col-md-20percent';
			break;
			case '6':
				$column_class = 'col-md-2';
				break;
		}

		$return = '<article class="pbmit-ele pbmit-ele-'.esc_attr($cpt).' '.esc_attr($style_class).' '.esc_attr($column_class).' '.esc_attr($term_slug).' '.esc_attr($odd_even_class).' '.esc_attr($col_odd_even_class).'">';

	} else {
		$return = '</article>';
	}
	return pbmit_esc_kses($return);
}
}

/** Client Hover image * */

if( !function_exists('pbmit_client_hover_img') ){
function pbmit_client_hover_img(){
	$return = '';
	$hover_logo = get_post_meta( get_the_ID(), 'pbmit-logo-image-for-hover', true );
	if( !empty($hover_logo) ){
		$hover_image = wp_get_attachment_image_src($hover_logo, 'full');
		if( !empty($hover_image[0]) ){
			$return = '<div class="pbmit-client-hover-img"><img src="'.esc_url($hover_image[0]).'" alt /></div>';
		}
	}
	return pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_client_logo_link') ){
function pbmit_client_logo_link( $type='start' ){
	$return = '';
	$link = get_post_meta( get_the_ID(), 'pbmit-logo-link', true );
	if( !empty($link['url']) ){
		if( $type=='start' ){
			$target_code = '';
			if( !empty($link['target']) && $link['target']=='_blank' ){ $target_code = ' target="_blank"'; }
			$return = '<a href="' . esc_url($link['url']) . '" title="' . esc_attr($link['title']) . '"' . $target_code . '>';
		} else {
			$return = '</a>';
		}
	}
	echo pbmit_esc_kses($return);
}
}

/* *  Titlebar Breadcrumb */

if( !function_exists('pbmit_titlebar_breadcrumb') ){
function pbmit_titlebar_breadcrumb(){
	$return = '';
	$hide_breadcrumb = pbmit_get_base_option('titlebar-hide-breadcrumb');
	if(function_exists('bcn_display') && $hide_breadcrumb!=true ){
		$return = '<div class="pbmit-breadcrumb"><div class="pbmit-breadcrumb-inner">' . bcn_display(true) . '</div></div>';
	}
	return pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_check_sticky_logo_class') ){
function pbmit_check_sticky_logo_class(){
	$sticky_logo = pbmit_get_base_option('sticky-logo');
	if( !empty($sticky_logo) ){
		echo esc_attr('pbmit-sticky-logo-yes');
	} else {
		echo esc_attr('pbmit-sticky-logo-no');
	}
}
}

if( !function_exists('pbmit_titlebar_headings') ){
function pbmit_titlebar_headings(){
	$title		= get_the_title();
	$subtitle	= '';
	if( is_singular() || is_home() ){
		if( is_home() ){
			$page_id	= get_option( 'page_for_posts' );
			$title		= esc_attr__( 'Blog', 'xcare' );  // Setting for Titlebar title
			$page_id	= get_option( 'page_for_posts' );
			$current_single_title		= get_post_meta( $page_id, 'pbmit-titlebar-title', true );
			$current_single_subtitle	= get_post_meta( $page_id, 'pbmit-titlebar-subtitle', true );
			$title				= ( !empty($current_single_title) )		? trim($current_single_title)		: $title ;
			$subtitle			= ( !empty($current_single_subtitle) )	? trim($current_single_subtitle)	: $subtitle ;
		} else if( is_singular('pbmit-team-member') ){
			$page_id	= get_the_ID();
			$cpt_title	= pbmit_get_base_option('team-cpt-singular-title');
			$subtitle	= $cpt_title;  // Setting for Titlebar title
		} else if( is_singular('pbmit-service') ){
			$page_id	= get_the_ID();
			$cpt_title	= pbmit_get_base_option('service-cpt-singular-title');
			$subtitle	= $cpt_title;  // Setting for Titlebar title
		} else if( is_singular('pbmit-portfolio') ){
			$page_id	= get_the_ID();
			$cpt_title	= pbmit_get_base_option('portfolio-cpt-singular-title');
			$subtitle	= $cpt_title;  // Setting for Titlebar title
		} else {
			$page_id	= get_the_ID();
		}
		
		if( is_singular() ){
			$current_single_title		= get_post_meta( get_the_ID(), 'pbmit-titlebar-title', true );
			$current_single_subtitle	= get_post_meta( get_the_ID(), 'pbmit-titlebar-subtitle', true );
			$title				= ( !empty($current_single_title) )		? trim($current_single_title)		: $title ;
			$subtitle			= ( !empty($current_single_subtitle) )	? trim($current_single_subtitle)	: $subtitle ;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){ // WooCommerce
			$title	= pbmit_get_base_option('wc-title');
			$subtitle = '';
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){ // WooCommerce
		$title	= pbmit_get_base_option('wc-title');
		$subtitle = '';
	} else if( is_category() ){ // Category
		$title = sprintf(
			esc_attr__('Category: %s', 'xcare'),
			esc_attr( single_cat_title( '', false) )
		);
	} else if( is_author() ){ // Author
		global $post;
		$author_id = $post->post_author;
		$title	   = sprintf(
			esc_attr__('Author: %s', 'xcare'),
			get_the_author_meta( 'display_name', $author_id )
		);
	} else if( is_post_type_archive() ){
		$title = post_type_archive_title('', false);
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		$title = esc_attr($tax->name);
	} else if( is_tag() ){ // Tag
		$title = sprintf(
			esc_attr__('Tag: %s','xcare'),
			esc_attr( single_tag_title( '', false) )
		);
	} else if( is_404() ){ // 404
		$title = esc_attr__( 'PAGE NOT FOUND', 'xcare' );
	} else if( is_search()  ){ // Search Results
		$title = sprintf( esc_attr__( 'Search Results for %s', 'xcare' ), ' <span class="pbmit-tbar-search-word">' . get_search_query() . '</span>' );
	} else if( is_archive() ){
		$title = esc_attr__( 'Archives', 'xcare' );
	} else {
		$title = get_the_title();
	}
	// return data
	$return  = '';
	$return .= ( !empty($subtitle) ) ? '<h3 class="pbmit-tbar-subtitle"> '. do_shortcode($subtitle) .'</h3>' : '' ;
	$return .= ( !empty($title) ) ? '<h1 class="pbmit-tbar-title"> '. do_shortcode($title) . '</h1>' : '' ;

	if( $return!='' ){
		$return = '<div class="pbmit-tbar"><div class="pbmit-tbar-inner container">'.$return.'</div></div>';
	}
	// Return data
	return pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_sticky_class') ){
function pbmit_sticky_class(){
	$return = '';
	$class = array();
	if( pbmit_get_base_option('sticky-header')=='1' ) {
		$class[] = 'pbmit-header-sticky-yes';
		$class[] = 'pbmit-sticky-type-'. pbmit_get_base_option('sticky-type');
	}
	// Sticky
	if( pbmit_get_base_option('sticky-header')=='1' ){
		$class[] = 'pbmit-sticky-bg-color-'. pbmit_get_base_option('sticky-header-bgcolor');
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_header_class') ){
function pbmit_header_class(){
	$return = '';
	$class = array();
	// Check if sticky logo exists
	$sticky_logo				= pbmit_get_base_option('sticky-logo');
	$responsive_logo			= pbmit_get_base_option('responsive-logo');
	$responsive_header_bgcolor	= pbmit_get_base_option('responsive-header-bgcolor');
	if( !empty($sticky_logo) ){
		$class[] = 'pbmit-sticky-logo-yes';
	} else {
		$class[] = 'pbmit-sticky-logo-no';
	}
	if( !empty($responsive_logo) ){
		$class[] = 'pbmit-responsive-logo-yes';
	} else {
		$class[] = 'pbmit-responsive-logo-no';
	}
	if( !empty($responsive_header_bgcolor) ){
		$class[] = 'pbmit-responsive-header-bgcolor-'.$responsive_header_bgcolor;
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_menu_count_class') ){
function pbmit_menu_count_class(){
	$return = '';

	$total_count	= 0;
	if ( has_nav_menu( 'pbminfotech-top' ) ) {  // if menu is set
		$menu_locations = get_nav_menu_locations();
		$menu			= wp_get_nav_menu_object( $menu_locations[ 'pbminfotech-top' ] );
		if( isset($menu->term_id) && !empty($menu->term_id) ){
			$menu_items		= wp_get_nav_menu_items($menu->term_id);
			foreach( $menu_items as $menu_item ){
				if( $menu_item->menu_item_parent === '0' ){
					$total_count++;
				}
			}
		} else {
			$pages = get_pages();
			$total_count = 1;
			foreach( $pages as $page ){
				if( $page->post_parent === 0 ){
					$total_count++;
				}
			}
		}

	} else {  // if menu not set so get total pages and count parent pages
		$pages = get_pages();
		$total_count = 1;
		foreach( $pages as $page ){
			if( $page->post_parent === 0 ){
				$total_count++;
			}
		}
	}
	$return	 .= ' pbmit-top-menu-total-' . $total_count;
	if( $total_count>6 ){
		$return .= ' pbmit-top-menu-more-than-six';
	}

	return $return;
}
}

if( !function_exists('pbmit_header_bg_class') ){
function pbmit_header_bg_class(){
	$return  = 'pbmit-header-wrapper';
	$bgcolor = pbmit_get_base_option('header-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'. pbmit_get_base_option('header-bgcolor');
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_header_box_contents') ){
	function pbmit_header_box_contents( $settings = array() ){
		for( $i=1 ; $i<=3 ; $i++ ){
			$title		= pbmit_get_base_option( 'header-box'.$i.'-title' );
			$content	= pbmit_get_base_option( 'header-box'.$i.'-content' );
			$link		= pbmit_get_base_option( 'header-box'.$i.'-link' );
			$icon		= pbmit_get_base_option( 'header-box'.$i.'-icon' );
			if( !empty($icon) ){
				$icon = explode(';',$icon);
				$icon = $icon[0];
				// load icon library
				$icon_array = explode(' ',$icon);
				$icon_prefix = $icon_array[0];
				$lib_list_array = pbmit_icon_library_list();
				foreach($lib_list_array as $lib_id=>$lib_data){
					if( $lib_data['common_class']==$icon_prefix ){
						wp_enqueue_style( $lib_id );
					}
				}
			}
			if( !empty($title) || !empty($content) ){
				?>
				<div class="pbmit-header-box pbmit-header-box-<?php echo esc_attr($i); ?>">
					<?php if( !empty($link) ) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
						<?php if( !empty($icon) ) : ?><span class="pbmit-header-box-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span><?php endif; ?>
						<span class="pbmit-header-box-title"><?php echo esc_html($title); ?></span>
						<span class="pbmit-header-box-content"><?php echo esc_html($content); ?></span>
					<?php if( !empty($link) ) : ?></a><?php endif; ?>
				</div>
				<?php
			}
		} // for loop
	}
	}
if( !function_exists('pbmit_header_box_contents') ){
function pbmit_header_box_contents( $settings = array() ){
	for( $i=1 ; $i<=3 ; $i++ ){
		$title		= pbmit_get_base_option( 'header-box'.$i.'-title' );
		$content	= pbmit_get_base_option( 'header-box'.$i.'-content' );
		$link		= pbmit_get_base_option( 'header-box'.$i.'-link' );
		$icon		= pbmit_get_base_option( 'header-box'.$i.'-icon' );
		if( !empty($icon) ){
			$icon = explode(';',$icon);
			$icon = $icon[0];
			// load icon library
			$icon_array = explode(' ',$icon);
			$icon_prefix = $icon_array[0];
			$lib_list_array = pbmit_icon_library_list();
			foreach($lib_list_array as $lib_id=>$lib_data){
				if( $lib_data['common_class']==$icon_prefix ){
					wp_enqueue_style( $lib_id );
				}
			}
		}
		if( !empty($title) || !empty($content) ){
			?>
			<div class="pbmit-header-box pbmit-header-box-<?php echo esc_attr($i); ?>">
				<?php if( !empty($link) ) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
					<?php if( !empty($icon) ) : ?><span class="pbmit-header-box-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span><?php endif; ?>
					<span class="pbmit-header-box-title"><?php echo esc_html($title); ?></span>
					<span class="pbmit-header-box-content"><?php echo esc_html($content); ?></span>
				<?php if( !empty($link) ) : ?></a><?php endif; ?>
			</div>
			<?php
		}
	} // for loop
}
}
if( !function_exists('pbmit_header_box') ){
function pbmit_header_box( $i='', $class='' ){
	if( !empty($i) && in_array( $i, array('1','2','3')) ){
		$title		= pbmit_get_base_option( 'header-box'.$i.'-title' );
		$content	= pbmit_get_base_option( 'header-box'.$i.'-content' );
		$link		= pbmit_get_base_option( 'header-box'.$i.'-link' );
		$icon		= pbmit_get_base_option( 'header-box'.$i.'-icon' );
		if( !empty($icon) ){
			$icon = explode(';',$icon);
			$icon = $icon[0];
			// load icon library
			$icon_array = explode(' ',$icon);
			$icon_prefix = $icon_array[0];
			$lib_list_array = pbmit_icon_library_list();
			foreach($lib_list_array as $lib_id=>$lib_data){
				if( $lib_data['common_class']==$icon_prefix ){
					wp_enqueue_style( $lib_id );
				}
			}
		}
		if( !empty($title) || !empty($content) ){
			?>
			<div class="pbmit-header-box pbmit-header-box-<?php echo esc_attr($i); ?> <?php echo esc_attr($class); ?>">
				<?php if( !empty($link) ) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
					<?php if( !empty($icon) ) : ?><span class="pbmit-header-box-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span><?php endif; ?>
					<span class="pbmit-header-box-title"><?php echo esc_html($title); ?></span>
					<span class="pbmit-header-box-content"><?php echo esc_html($content); ?></span>
				<?php if( !empty($link) ) : ?></a><?php endif; ?>
			</div>
			<?php
		}
	} // if
}
}
if( !function_exists('pbmit_header_button') ){
function pbmit_header_button( $settings = array() ){
	$btn_text  = pbmit_get_base_option('header-btn-text');
	$btn_text2 = pbmit_get_base_option('header-btn-text2');
	$btn_url   = pbmit_get_base_option('header-btn-url');
	if( (!empty($btn_text) || !empty($btn_text2)) && !empty($btn_url) ){
		?>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			<div class="pbmit-header-button">
		<?php } ?>
		<a href="<?php echo esc_url($btn_url); ?>">
			<?php if(!empty($btn_text)) : ?><span class="pbmit-header-button-text-1"><?php echo esc_html($btn_text); ?></span><?php endif; ?>
			<?php if(!empty($btn_text2)) : ?><span class="pbmit-header-button-text-2"><?php echo esc_html($btn_text2); ?></span><?php endif; ?>
		</a>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			</div>
		<?php } ?>
		<?php
	}
}
}

if( !function_exists('pbmit_header_button_second') ){
function pbmit_header_button_second( $settings = array() ){
	$btn_text  = pbmit_get_base_option('header-btn2-text');
	$btn_url   = pbmit_get_base_option('header-btn2-url');
	if( (!empty($btn_text)) && !empty($btn_url) ){
		?>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			<div class="pbmit-header-button2">
		<?php } ?>
		<a href="<?php echo esc_url($btn_url); ?>">
			<?php if(!empty($btn_text)) : ?><span class="pbmit-header-button2-text"><?php echo esc_html($btn_text); ?></span><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span><?php endif; ?>
		</a>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			</div>
		<?php } ?>
		<?php
	}
}
}

if( !function_exists('pbmit_header_search') ){
function pbmit_header_search(){
	$header_search = pbmit_get_base_option('header-search');
	if( !empty($header_search) && $header_search=='1' ){
		?>
		<div class="pbmit-header-search-btn"><a href="#" title="<?php echo esc_html_e( 'Search', 'xcare' ); ?>"><i class="pbmit-base-icon-search-1"></i></a></div>
		<?php
	}
}
}

if( !function_exists('pbmit_nav_class') ){
function pbmit_nav_class(){
	$return = '';
	$main_active_link_color = pbmit_get_base_option('main-menu-active-color');
	$drop_active_link_color = pbmit_get_base_option('drop-down-menu-active-color');
	if( !empty($main_active_link_color) ){
		$return .= ' pbmit-main-active-color-'.$main_active_link_color;
	}
	if( !empty($drop_active_link_color) ){
		$return .= ' pbmit-dropdown-active-color-'.$drop_active_link_color;
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_preheader_class') ){
function pbmit_preheader_class(){
	$return = '';
	$bgcolor = pbmit_get_base_option('preheader-bgcolor');
	$textcolor = pbmit_get_base_option('preheader-text-color');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'.$bgcolor;
	}
	if( !empty($textcolor) ){
		$return .= ' pbmit-color-'.$textcolor;
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_footer_classes') ){
function pbmit_footer_classes(){
	$return = '';

	// footer style
	$footer_style = pbmit_get_base_option('footer-style');
	$footer_style = ( empty($footer_style) ) ? '1' : $footer_style ;
	$return .= 'pbmit-footer-style-' . esc_attr($footer_style);

	$textcolor = pbmit_get_base_option('footer-text-color');
	if( !empty($textcolor) ){
		$return .= ' pbmit-text-color-'.$textcolor;
	}
	$bgcolor = pbmit_get_base_option('footer-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'.$bgcolor;
	}
	$background = pbmit_get_base_option('footer-background');
	if( !empty($background['background-image']) ){
		$return .= ' pbmit-bg-image-yes';
	}
	$bg_image_over = pbmit_get_base_option('footer-bg-image-over');
	if( !empty($bg_image_over) && $bg_image_over=='yes' ){
		$return .= ' pbmit-image-front';
	}
	if ( has_nav_menu( 'pbminfotech-footer' ) ){
		$return .= ' pbmit-footer-menu-yes';
	} else {
		$return .= ' pbmit-footer-menu-no';
	}
	$footer_widget_columns	= pbmit_footer_widget_columns(); // array
	if( $footer_widget_columns[0]==false ){
		$return .= ' pbmit-footer-widget-no';
	} else {
		$return .= ' pbmit-footer-widget-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_footer_widget_classes') ){
function pbmit_footer_widget_classes(){
	$return = '';
	$textcolor = pbmit_get_base_option('footer-widget-text-color');
	$switch	= pbmit_get_base_option('footer-widget-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' pbmit-color-'.$textcolor;
	}
	$bgcolor = pbmit_get_base_option('footer-widget-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'.$bgcolor;
	}
	$background = pbmit_get_base_option('footer-widget-background');
	if( !empty($background['background-image']) ){
		$return .= ' pbmit-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_footer_widget_columns') ){
function pbmit_footer_widget_columns(){
	$return			= array(false, false, false);
	$widget_exists	= false;
	$footer_column	= pbmit_get_base_option('footer-column');
	$footer_column	= ( empty($footer_column) ) ? '3-3-3-3' : $footer_column ;
	if( $footer_column=='custom' ){
		$footer_column_1	= pbmit_get_base_option('footer-1-col-width');
		$footer_column_2	= pbmit_get_base_option('footer-2-col-width');
		$footer_column_3	= pbmit_get_base_option('footer-3-col-width');
		$footer_column_4	= pbmit_get_base_option('footer-4-col-width');
		$footer_column_array = array();
		if( !empty($footer_column_1) && $footer_column_1!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_2) && $footer_column_2!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_3) && $footer_column_3!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_4) && $footer_column_4!='hide' ){ $footer_column_array[] = 'yes'; }
		if( count($footer_column_array)=='1' ){
			$footer_column = '12';
		} else if( count($footer_column_array)=='2' ){
			$footer_column = '6-6';
		} else if( count($footer_column_array)=='3' ){
			$footer_column = '4-4-4';
		} else if( count($footer_column_array)=='4' ){
			$footer_column = '3-3-3-3';
		}
	}
	if( !empty($footer_column) ){
		$footer_columns	= explode('-', $footer_column );
		// Checking if widget exists
		if( is_array($footer_columns) && count($footer_columns)>0 ){
			$col = 1;
			foreach( $footer_columns as $column ){
				if ( is_active_sidebar( 'pbmit-footer-'.$col ) ){
					$widget_exists = true;
				}
				$col++;
			} // end foreach
		}
		$return = array( $widget_exists, $footer_columns, $footer_column );
	}
	return $return;
}
}

if( !function_exists('pbmit_footer_copyright_classes') ){
function pbmit_footer_copyright_classes(){
	$return = '';
	$textcolor = pbmit_get_base_option('footer-copyright-text-color');
	$switch	= pbmit_get_base_option('footer-copyright-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' pbmit-color-'.$textcolor;
	}
	$bgcolor = pbmit_get_base_option('footer-copyright-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'.$bgcolor;
	}
	$background = pbmit_get_base_option('footer-copyright-background');
	if( !empty($background['background-image']) ){
		$return .= ' pbmit-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_all_options_values') ){
function pbmit_all_options_values( $for='typography', $admin=false ) {
	$return			= '';
	$css_code		= '';
	include( get_template_directory() . '/includes/customizer-options.php' );
	foreach( $kirki_options_array as $options_key=>$options_val ){
		if( !empty( $options_val['section_fields'] ) ){
			foreach( $options_val['section_fields'] as $key=>$option ){
				if( !empty($option['type']) && $option['type']==$for && !empty($option['default']) && !empty($option['pbmit-output']) ){
					$class		= $option['pbmit-output'];
					$css_code	= '';
					$values = pbmit_get_base_option( $option['settings'] );
					foreach( $values as $key=>$val ){
						if( !empty($val) & $key != 'font-weight'){
							if( $key == 'background-image' ){
								$val = 'url("'.$val.'")';
							} else if( $key == 'font-family' ){
								$val = trim($val);
								if( substr($val, -1)!=',' ){ $val = $val.','; }
								$val = $val.'sans-serif';
							} else if( $key == 'font-weight' ){
								continue;
							} else if( $key == 'variant' ){
								$key = 'font-weight';
								if( $val == 'regular' ){
									$val = 'normal';
								}
							}
							$css_code .= $key.':'.$val.';';
						}
					}
					if($admin==true){
						if( $class=='body' ){
							$class = $class.esc_attr('#tinymce.wp-editor');
						} else {
							$class = esc_attr('body#tinymce.wp-editor ').$class;
						}
					}
					$return .= $class.'{'.$css_code.'}';
				}
			}
		}
	}
	return $return;
}
}

if( !function_exists('pbmit_titlebar_class') ){
function pbmit_titlebar_class(){
	$return = '';
	$bgcolor = pbmit_get_base_option('titlebar-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' pbmit-bg-color-'.$bgcolor;
	}
	$background = pbmit_get_base_option('titlebar-background');
	if( !empty($background['background-image']) ){
		$return .= ' pbmit-bg-image-yes';
	}
	$style = pbmit_get_base_option('titlebar-style');
	if( !empty($style) ){
		$return .= ' pbmit-titlebar-style-'.$style;
	}
	echo esc_attr($return);
}
}

if( !function_exists('pbmit_pagination') ){
function pbmit_pagination($wp_query_data=false){
	if( $wp_query_data==false ){
		global $wp_query;
	} else {
		$wp_query = $wp_query_data;
	}
	$return  = '';
	$return .= pbmit_esc_kses('<div class="clearfix"></div>');
	$big	 = 999999999; // need an unlikely integer

	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}

	$pagination = paginate_links( array(
		'base'	  => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'	=> '?paged=%#%',
		'current'   => max( 1, $paged ),
		'total'	 => $wp_query->max_num_pages,
		'type'	  => 'array',
		'prev_text' => pbmit_esc_kses('<i class="pbmit-base-icon-left-open"></i>'),
		'next_text' => pbmit_esc_kses('<i class="pbmit-base-icon-right-open"></i>'),
	) );
	if( $pagination!=NULL ){
		$big = 999999999; // need an unlikely integer
		$return .= '<div class="pbmit-pagination"><div class="nav-links">';
		$return .= paginate_links( array(
			'base'	  => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'	=> '?paged=%#%',
			'current'   => max( 1, $paged ),
			'total'	 => $wp_query->max_num_pages,
			'prev_text' => pbmit_esc_kses('<i class="pbmit-base-icon-left-open"></i>'),
			'next_text' => pbmit_esc_kses('<i class="pbmit-base-icon-right-open"></i>'),
		) );
		$return .= '</div></div><!-- .pbmit-pagination -->';
	}
	echo pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_meta_author') ){
function pbmit_meta_author(){
	$author_name = get_the_author();
	if( empty($author_name) ){
		global $post;
		$author_name = get_userdata($post->post_author);
		$author_name = $author_name->display_name;
	}
	return '<span class="pbmit-meta pbmit-meta-author"><i class="pbmit-base-icon-user-3"></i>by<a class="pbmit-author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html($author_name) . '</a></span>';
}
}

if( !function_exists('pbmit_meta_date') ){
function pbmit_meta_date( $date_format='', $optional=false ){
	$return = '';
	if( $optional==false || ( $optional==true && !defined('PBM_ADDON_VERSION') ) ){
		if( empty($date_format) ){
			$date_format = get_option('date_format');
		}
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = sprintf( '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated pbmit-hide" datetime="%3$s">%4$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date( $date_format )
			);
		} else {
			$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ) // ,
			);
		}
		$return = '<span class="pbmit-meta pbmit-meta-date"><i class="pbmit-base-icon-calendar-3"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . pbmit_esc_kses($time_string) . '</a></span>';
	}
	return $return;
}
}

if( !function_exists('pbmit_meta_category') ){
function pbmit_meta_category( $separator = ', ' ){
	$return = '';
	$categories_list = get_the_category_list( $separator );
	if ( !empty($categories_list) ){
		$return = '<span class="pbmit-meta pbmit-meta-cat"><i class="pbmit-base-icon-folder-open-empty"></i>' . pbmit_esc_kses($categories_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('pbmit_meta_tag') ){
function pbmit_meta_tag( $separator = ', ', $title='' ){
	$return		= '';
	$tags_list	= get_the_tag_list( $title.' ' , $separator );
	if ( !empty($tags_list) ) {
		$return = '<span class="pbmit-meta pbmit-meta-tags"> ' . pbmit_esc_kses($tags_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('pbmit_meta_comment') ){
function pbmit_meta_comment( $hide_zero=false ){
	$return = '';
	$comments_number = get_comments_number();
	if ( !post_password_required() && comments_open() ) {
		$return = '<span class="pbmit-meta pbmit-meta-comments pbmit-comment-bigger-than-zero"><i class="pbmit-base-icon-chat-3"></i>' . get_comments_number_text( esc_attr__('No Comments','xcare'), esc_attr__('One Comment','xcare'), esc_attr__('% Comments','xcare') ) . '</span>';
	}
	return $return;
}
}

if( !function_exists('pbmit_author_social_links') ){
function pbmit_author_social_links(){
	$return = '';
	$social_list = array(
		'twitter'	=>	array(
			'name'			=> esc_attr('Twitter'),
			'link'			=> get_the_author_meta( 'twitter' ),
		),
		'facebook'	=>	array(
			'name'			=> esc_attr('Facebook'),
			'link'			=> get_the_author_meta( 'facebook' ),
		),
		'linkedin'	=>	array(
			'name'			=> esc_attr('LinkedIn'),
			'link'			=> get_the_author_meta( 'linkedin' ),
		),
		'google_plus'	=>	array(
			'name'			=> esc_attr('Google +'),
			'link'			=> get_the_author_meta( 'gplus' ),
		),
	);
	foreach( $social_list as $social_id => $social_data ){
		if( !empty($social_data['link']) ){
			$return .= '<li class="pbmit-author-social-li pbmit-author-social-'.esc_attr($social_id).'"><a href="'. esc_url($social_data['link']) .'" target="_blank"><i class="pbminfotech-base-icon-twitter"></i><span class="pbminfotech-hide">'. esc_attr($social_data['name']) .'</span></a></li>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="pbmit-author-social-icons"><ul class="pbmit-author-social-ul">' . $return . '</ul> <!-- .pbmit-author-social-ul -->  </div> <!-- .pbmit-author-social-icons -->';
	}
	// Return data
	return pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_comments_list_template') ){
function pbmit_comments_list_template($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag		= 'div';
		$add_below	= 'comment';
	} else {
		$tag		= 'li';
		$add_below	= 'div-comment';
	}?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="pbmit-comment"><?php
	} ?>
		<div class="pbmit-comment-avatar"><?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			} ?>
		</div>
		<div class="pbmit-comment-content">
			<div class="pbmit-comment-meta">
				<span class="pbmit-comment-author">
					by
					<span class="pbmit-comment-author-inner"><?php echo get_comment_author_link(); ?></span>
				</span>
				<span class="pbmit-comment-date">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( esc_attr_x( '%1$s ago', '%1$s = human-readable time difference', 'xcare' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
					</a>
					<?php edit_comment_link( esc_attr__( '(Edit)', 'xcare' ), '  ', '' ); ?>
				</span>
			</div>
			<?php
			if ( $comment->comment_approved == '0' ) { ?>
				<em class="pbmit-comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'xcare' ); ?></em><br/><?php
			} ?>
			<?php comment_text(); ?>
			<div class="reply"><?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => $add_below,
								'depth'	 => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					); ?>
			</div>
		</div>
	<?php
	if ( 'div' != $args['style'] ) : ?>
		</div><?php
	endif;
	?>
	<?php
}
}

if( !function_exists('pbmit_portfolio_details_list') ){
function pbmit_portfolio_details_list() {
	$return = '';
	$lines = pbmit_get_base_option('portfolio-details');
	$title = pbmit_get_base_option('portfolio-details-title');
	if( !empty($lines) ){
		foreach( $lines as $line ){
			$line_id = trim($line['line_title']);
			$line_id = str_replace( ' ', '_', $line_id );
			$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
			// Data
			if( $line['line_type']=='category-link' ){
				$line_data = get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' );
			} else if( $line['line_type']=='category' ){
				$line_data = strip_tags( get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' ) );
			} else {
				$line_data = get_post_meta( get_the_ID(), 'pbmit-portfolio-details_'.$line_id, true );
			}
			if( !empty($line_data) ){
				$return .= '<li class="pbmit-portfolio-line-li"> <span class="pbmit-portfolio-line-title">' . esc_attr($line['line_title']) . ' : </span> <span class="pbmit-portfolio-line-value">' . pbmit_esc_kses($line_data) . '</span></li>';
			}
		}
	}
	if( !empty($return) ){
		$return = '<div class="pbmit-portfolio-lines-wrapper"><ul class="pbmit-portfolio-lines-ul">' . $return . '</ul></div>';
	}
	if( !empty($title) ){
		$return = '<h3>' . esc_html($title) . '</h3> ' . $return;
	}
	echo pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_related_portfolio') ){
function pbmit_related_portfolio() {
	$return			= '';
	$related_title	= pbmit_get_base_option('portfolio-show-related');
	if($related_title==true){
		$related_title	= pbmit_get_base_option('portfolio-related-title');
		$show			= pbmit_get_base_option('portfolio-related-count');
		$columns		= pbmit_get_base_option('portfolio-related-column');
		$style			= pbmit_get_base_option('portfolio-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="pbmit-related-title">'.$related_title.'</h3>';
		}
		$terms = wp_get_post_terms( get_the_ID(), 'pbmit-portfolio-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}
		// Preparing $args
		$args = array(
			'post_type'				=> 'pbmit-portfolio',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'pbmit-portfolio-category',
					'field'	=> 'slug',
					'terms'	=> $term_list,
				),
			),
		);
		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {
			$return .= '<div class="pbmit-element-posts-wrapper row multi-columns-row">';
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'pbmit-odd':'pbmit-even';
				// Template
				if( file_exists( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) ) ){
					$return .= pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'portfolio',
						'taxonomy'	=> 'pbmit-portfolio-category',
						'style'		=> $style,
					) );
					ob_start();
					include( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= pbmit_element_block_container( array(
						'position'	=> 'end',
					) );
				}
				$i++;
			}
			$return .= '</div>';
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	}
	// Output
	if( !empty($return) ){
		echo '<div class="pbmit-portfolio-related">';
			echo pbmit_esc_kses($related_title);
			echo pbmit_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('pbmit_related_service') ){
function pbmit_related_service() {
	$return			= '';
	$related_title	= pbmit_get_base_option('service-show-related');

	if($related_title==true){

		$related_title	= pbmit_get_base_option('service-related-title');
		$show			= pbmit_get_base_option('service-related-count');
		$columns			= pbmit_get_base_option('service-related-column');
		$style			= pbmit_get_base_option('service-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="pbmit-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'pbmit-service-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'pbmit-service',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'pbmit-service-category',
					'field'	=> 'slug',
					'terms'	=> $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="pbmit-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'pbmit-odd':'pbmit-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'service',
						'taxonomy'	=> 'pbmit-service-category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= pbmit_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="pbmit-service-related">';
			echo pbmit_esc_kses($related_title);
			echo pbmit_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('pbmit_related_post') ){
function pbmit_related_post() {
	$return			= '';
	$related_title	= pbmit_get_base_option('blog-show-related');

	if($related_title==true){

		$related_title	= pbmit_get_base_option('blog-related-title');
		$show			= pbmit_get_base_option('blog-related-count');
		$column			= pbmit_get_base_option('blog-related-column');
		$style			= pbmit_get_base_option('blog-related-style');

		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="pbmit-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'post',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'category',
					'field'	=> 'slug',
					'terms'	=> $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="pbmit-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'pbmit-odd':'pbmit-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'blog',
						'taxonomy'	=> 'category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= pbmit_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="pbmit-post-related">';
			echo pbmit_esc_kses($related_title);
			echo pbmit_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('pbmit_preloader') ){
	function pbmit_preloader(){
		$preloader = pbmit_get_base_option('preloader');
		if( $preloader == true ){
			$preloader_img	= pbmit_get_base_option('preloader-image');
			if( !empty($preloader_img) ){
				echo pbmit_esc_kses('<div class="pbmit-preloader" style="background-image:url('.esc_url( get_template_directory_uri() . '/images/loader'.esc_attr($preloader_img).'.svg'  ).')"></div>');
			}
		}
	}
}

if( !function_exists('pbmit_testimonial_star_ratings') ){
function pbmit_testimonial_star_ratings() {
	$return = '';
	$ratings = get_post_meta( get_the_ID(), 'pbmit-star-ratings', true );
	if( !empty($ratings) && $ratings!='no' && $ratings>0 ){
		for($x = 1; $x <= 5; $x++) {
			$active_class = ( $x<=$ratings ) ? ' pbmit-active' : '' ;
			$return .= '<i class="pbmit-base-icon-star-1'.esc_attr($active_class).'"></i>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="pbminfotech-box-star-ratings">'.$return.'</div>';
	}
	echo pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_testimonial_details') ){
function pbmit_testimonial_details() {
	$return = '';
	$details = get_post_meta( get_the_ID(), 'pbmit-testimonial-details', true );
	if( !empty($details) ){
		$return = '<div class="pbminfotech-testimonial-detail">'.$details.'</div>';
	}
	echo pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_star_ratings_text') ){
function pbmit_star_ratings_text() {
	$return = '';
	$details = get_post_meta( get_the_ID(), 'pbmit-star-ratings-text', true );
	if( !empty($details) ){
		$return = '<div class="pbminfotech-star-ratings-text">'.$details.'</div>';
	}
	echo pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_check_widget_exists') ){
function pbmit_check_widget_exists( $sidebar_position='' ) {
	$return = '';
	$sidebar	= 'pbmit-sidebar-post';
	if( is_page() ){
		// page sidebar
		$sidebar	= 'pbmit-sidebar-page';
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = 'pbmit-sidebar-wc-shop';
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = 'pbmit-sidebar-wc-shop';
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = 'pbmit-sidebar-wc-single';
	} else if( is_search() ){
		$sidebar	= 'pbmit-sidebar-search';
	} else if( is_singular('event_listing') ){
		$sidebar		= 'pbmit-sidebar-event-single';
	} else if( is_tax('event_listing_category') || is_tax('event_listing_type') || is_singular( 'event_organizer' ) || is_singular( 'event_venue' ) ){
		$sidebar		= 'pbmit-sidebar-event';
	} else if( is_singular('pbmit-portfolio') ){
		$sidebar		= 'pbmit-sidebar-portfolio';
	} else if( is_tax('pbmit-portfolio-category') || is_post_type_archive('pbmit-portfolio') ){
		$sidebar		= 'pbmit-sidebar-portfolio-cat';
	} else if( is_singular('pbmit-service') ){
		$sidebar		= 'pbmit-sidebar-service';
	} else if( is_tax('pbmit-service-category') || is_post_type_archive('pbmit-service') ){
		$sidebar		= 'pbmit-sidebar-service-cat';
	} else if( is_singular('pbmit-team-member') ){
		$sidebar		= 'pbmit-sidebar-team';
	} else if( is_tax('pbmit-team-group') || is_post_type_archive('pbmit-team-member') ){
		$sidebar		= 'pbmit-sidebar-team-group';
	} else if( is_search() ){
		$sidebar		= 'pbmit-sidebar-search';
	}

	// check if content exists for the sidebar
	$sidebar_content = '';
	ob_start();
	dynamic_sidebar( $sidebar );
	$sidebar_content = ob_get_clean();

	if ( !is_active_sidebar( $sidebar ) || empty($sidebar_content) ){
		$return = 'pbmit-empty-sidebar';
	}
	return esc_attr($return);
}
}

/*
 *  Body Class
 */
if( !function_exists('pbmit_check_sidebar') ){
function pbmit_check_sidebar() {
	$return = false;
	// sidebar class
	$sidebar = pbmit_get_base_option('sidebar-post');
	if( is_page() ){
		$sidebar = pbmit_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = pbmit_get_base_option('sidebar-wc-shop');
		}
	} else if ( !is_front_page() && is_home() ) {
		$sidebar = pbmit_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$page_meta = get_post_meta( $page_for_posts, 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = pbmit_get_base_option('sidebar-wc-shop');
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = pbmit_get_base_option('sidebar-wc-single');
	} else if( is_singular('event_listing') ){
		$sidebar = pbmit_get_base_option('sidebar-event-single');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_tax('event_listing_category') || is_tax('event_listing_type') || is_singular( 'event_organizer' ) || is_singular( 'event_venue' ) ){
		$sidebar = pbmit_get_base_option('sidebar-event');
		if( is_singular( 'event_organizer' ) || is_singular( 'event_venue' ) ){
			$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
			if( !empty($page_meta) && $page_meta!='global' ){
				$sidebar = $page_meta;
			}
		}
	} else if( is_singular('post') ){
		$sidebar = pbmit_get_base_option('sidebar-post');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('pbmit-portfolio') ){
		$sidebar = pbmit_get_base_option('sidebar-portfolio');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('pbmit-service') ){
		$sidebar = pbmit_get_base_option('sidebar-service');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('pbmit-team-member') ){
		$sidebar = pbmit_get_base_option('sidebar-team-member');
		$page_meta = get_post_meta( get_the_ID(), 'pbmit-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_tax('pbmit-team-group') || is_post_type_archive('pbmit-team-member') ){
		$sidebar = pbmit_get_base_option('sidebar-team-group');
	} else if( is_tax('pbmit-portfolio-category') || is_post_type_archive('pbmit-portfolio') ){
		$sidebar = pbmit_get_base_option('sidebar-portfolio-category');
	} else if( is_tax('pbmit-service-category') || is_post_type_archive('pbmit-service') ){
		$sidebar = pbmit_get_base_option('sidebar-service-category');
	} else if( is_search() ){
		$sidebar = pbmit_get_base_option('sidebar-search');
	}
	if( $sidebar!='' && $sidebar!='no' ){
		$return = true;
	}
	if( !empty( pbmit_check_widget_exists() ) ){
		$return = false;
	}
	return $return;
}
}

if( !function_exists('pbmit_sortable_category') ){
function pbmit_sortable_category( $atts=array(), $taxonomy='' ){
	$return = '';
	$list = '';
	if( !empty($atts['sortable']) && $atts['sortable']=='yes' ){
		$list .= '<li><a href="#" class="pbmit-sortable-link pbmit-selected" data-category="*" data-sortby="*">' . esc_html__('All','xcare') . '</a></li>';
		if( !empty($atts['from_category']) ){
			// selected category
			$from_category = $atts['from_category'];
			if( !is_array($atts['from_category']) ){
				$from_category = explode(',',$atts['from_category']);
			}
			foreach( $from_category as $catslug ){
				$term = get_term_by( 'slug', $catslug, $taxonomy );
				$list .= '<li><a href="#" class="pbmit-sortable-link" data-category="'.esc_attr($catslug).'" data-sortby="pbmit-term-' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</a></li>';
			}
		} else {
			// all category
			$all_terms = get_terms( array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
			) );

			foreach( $all_terms as $term ){
				$catslug = $term->slug;
				$list .= '<li><a href="#" class="pbmit-sortable-link" data-category="'.esc_attr($catslug).'" data-sortby="pbmit-term-' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</a></li>';
			}
		}
		$return = '<div class="pbmit-sortable-list"><ul class="pbmit-sortable-list-ul">
			'.$list.'
		</ul></div>';
		return pbmit_esc_kses($return);
	}
}
}

if( !function_exists('pbmit_cart_icon') ){
function pbmit_cart_icon( $style='1' ){
	$show_cart = pbmit_get_base_option('wc-show-cart-icon');
	if( function_exists('is_woocommerce') && $show_cart==true ){
		$show_cart_amount_class = 'no';
		$show_cart_amount = pbmit_get_base_option('wc-show-cart-amount');
		if( $show_cart_amount == true ){ $show_cart_amount_class = 'yes'; }
		?>
		<div class="pbmit-cart-wrapper pbmit-cart-style-<?php echo esc_attr($style); ?> pbmit-show-cart-amount-<?php echo esc_attr($show_cart_amount_class); ?>">
			<?php
			$content = pbmit_woocommerce_header_fragement_content();
			echo pbmit_esc_kses($content);
			?>
		</div>
		<?php
	}
}
}

if( !function_exists('pbmit_woocommerce_header_fragement_content') ){
function pbmit_woocommerce_header_fragement_content() {
	global $woocommerce;
	$return = '<a href="'.esc_url(wc_get_cart_url()).'" class="pbmit-cart-link">
		<span class="pbmit-cart-details">
			<span class="pbmit-cart-icon"></span>
			<span class="pbmit-cart-count">'.esc_html($woocommerce->cart->cart_contents_count).'</span>
		</span>';
		$return .= pbmit_esc_kses( $woocommerce->cart->get_cart_total() );
	$return .= '</a>';
	return pbmit_esc_kses($return);
}
}

if( !function_exists('pbmit_site_content_class') ){
function pbmit_site_content_class(){
	$return = '';
	if( is_404() ){
		$bgcolor = pbmit_get_base_option('e404-bgcolor');
		if( !empty($bgcolor) ){
			$return .= ' pbmit-bg-color-'.$bgcolor;
		}
		$background = pbmit_get_base_option('e404-background');
		if( !empty($background['background-image']) ){
			$return .= ' pbmit-bg-image-yes';
		}
		$text_color = pbmit_get_base_option('e404-text-color');
		if( !empty($text_color) ){
			$return .= ' pbmit-text-color-'.$text_color;
		}
	}
	if( !empty($return) ){
		echo esc_attr($return);
	}
}
}

if( !function_exists('pbmit_ordinal') ){
function pbmit_ordinal($number) {
	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	if ((($number % 100) >= 11) && (($number%100) <= 13))
		return $number. 'th';
	else
		return $number. $ends[$number % 10];
}
}

if( !function_exists('pbmit_element_default_style') ){
function pbmit_element_default_style($data) {

	$return = '1'; // default style
	return $return;
}
}

if( !function_exists('pbmit_get_elements') ){
function pbmit_get_elements( $data = array() ){
	$el_array = array();

	if( !empty($data) && is_array($data) ){
		foreach( $data as $s1 ){

			if( isset($s1['elType']) && $s1['elType']!='section' && $s1['elType']!='column' && substr( $s1['widgetType'], 0 , 6 ) == 'pbmit_' ){

				$style = ( isset($s1['settings']['style']) && !empty($s1['settings']['style']) ) ? trim($s1['settings']['style']) : pbmit_element_default_style($s1) ;
				$el_array[] = $s1['widgetType'] . '___' . $style;
			}

			if( isset($s1['elements']) && !empty($s1['elements']) ){
				foreach($s1['elements'] as $s2){
					if( isset($s2['elType']) && $s2['elType']!='section' && $s2['elType']!='column' && substr( $s2['widgetType'], 0 , 6 ) == 'pbmit_' ){
						$style = ( isset($s2['settings']['style']) && !empty($s2['settings']['style']) ) ? trim($s2['settings']['style']) : pbmit_element_default_style($s2) ;
						$el_array[] = $s2['widgetType'] . '___' . $style;
					}

					if( isset($s2['elements']) && !empty($s2['elements']) ){
						foreach($s2['elements'] as $s3){
							if( isset($s3['elType']) && $s3['elType']!='section' && $s3['elType']!='column' && substr( $s3['widgetType'], 0 , 6 ) == 'pbmit_' ){
								$style = ( isset($s3['settings']['style']) && !empty($s3['settings']['style']) ) ? trim($s3['settings']['style']) : pbmit_element_default_style($s3) ;
								$el_array[] = $s3['widgetType'] . '___' . $style;
							}

							if( isset($s3['elements']) && !empty($s3['elements']) ){
								foreach($s3['elements'] as $s4){
									if( isset($s4['elType']) && $s4['elType']!='section' && $s4['elType']!='column' && substr( $s4['widgetType'], 0 , 6 ) == 'pbmit_' ){
										$style = ( isset($s4['settings']['style']) && !empty($s4['settings']['style']) ) ? trim($s4['settings']['style']) : pbmit_element_default_style($s4) ;
										$el_array[] = $s4['widgetType'] . '___' . $style;
									}

									if( isset($s4['elements']) && !empty($s4['elements']) ){
										foreach($s4['elements'] as $s5){
											if( isset($s5['elType']) && $s5['elType']!='section' && $s5['elType']!='column' && substr( $s5['widgetType'], 0 , 6 ) == 'pbmit_' ){
												$style = ( isset($s5['settings']['style']) && !empty($s5['settings']['style']) ) ? trim($s5['settings']['style']) : pbmit_element_default_style($s5) ;
												$el_array[] = $s5['widgetType'] . '___' . $style;
											}

											if( isset($s5['elements']) && !empty($s5['elements']) ){
												foreach($s5['elements'] as $s6){
													if( isset($s6['elType']) && $s6['elType']!='section' && $s6['elType']!='column' && substr( $s6['widgetType'], 0 , 6 ) == 'pbmit_' ){
														$style = ( isset($s6['settings']['style']) && !empty($s6['settings']['style']) ) ? trim($s6['settings']['style']) : pbmit_element_default_style($s6) ;
														$el_array[] = $s6['widgetType'] . '___' . $style;
													}
												}
											}

										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	// remove repeated values
	$el_array = array_unique($el_array);

	// final output
	return $el_array;
}
}

if( !function_exists('pbmit_sub_category_list') ){
function pbmit_sub_category_list( $data = array() ){
	if( is_tax() ){
		$category = get_queried_object();
		if( isset($category->term_id) && !empty($category->term_id) ){
			$cat_id			= $category->term_id;
			$term			= get_term( $cat_id );
			$sub_category	= get_terms( $term->taxonomy, array('parent' => $cat_id, 'hide_empty' => false) );
			if( is_array($sub_category) && count($sub_category)>0 ){
				?>
				<div class="pbmit-sub-cat-list-wrapper">
					<div class="pbmit-sub-cat-list-title"><?php esc_attr_e('Sub Categories', 'xcare'); ?></div>
					<ul class="pbmit-sub-cat-list">
					<?php
					foreach( $sub_category as $cat ){
						// Icon
						$icon_html = '';
						$icon_lib = get_term_meta( $cat->term_id, 'pbmit-category-icon-library', true );
						$icon_class = get_term_meta( $cat->term_id, 'pbmit-category-icon-'.$icon_lib, true );
						if( !empty($icon_class) ){
							$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
						}
						echo pbmit_esc_kses('<li><a href="'.esc_url( get_term_link($cat) ).'">'.$icon_html.' '.esc_html($cat->name).'</a></li>');
					}
					?>
					</ul>
				</div>
				<?php
			}
		}
	}
}
}

if( !function_exists('pbmit_icon_html') ){
function pbmit_icon_html( $icon = array(), $load_library = true ){
	$icon_html = $icon_type = '';
	if( !empty( $icon['value'] ) && !empty( $icon['library'] ) ){
		if( isset($icon['value']['url']) ){ // for SVG
			$value		= trim($icon['value']['url']);
		} else {
			$value		= trim($icon['value']);
		}
		$library	= trim($icon['library']);
		if ( $library == 'svg' ){
			$icon_type = 'svg';
			if( !empty($value) ){
				$icon_html = '<img src="'.esc_url($value).'"/>';
			}
		} else {
			$icon_type = 'icon';
			$icon_html = '<i class="' . esc_attr($value) . '"></i>';
			if ( $load_library == true ){
				if( isset( $library ) && !empty( $library ) ){
					$library = trim($library) ;
					if( in_array( $library, array( 'fa-regular', 'fa-solid', 'fa-brands' ) ) ){
						$library = 'elementor-icons-' . trim($library) ;
					}
					if( wp_style_is( $library, 'registered' ) ){
						wp_enqueue_style( $library );
					}
				}
			}
		}
	}
	if( !empty( $icon_html ) ){
		$icon_html = '<div class="pbmit-icon-wrapper pbmit-icon-type-' . $icon_type . '">' . $icon_html . '</div>';
	}
	return $icon_html;
}
}

if( !function_exists('pbmit_html_to_rgb') ) {
function pbmit_html_to_rgb($htmlCode) {
	if($htmlCode[0] == '#'){
		$htmlCode = substr($htmlCode, 1);
	}
	if (strlen($htmlCode) == 3) {
		$htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
	}
	$r = hexdec($htmlCode[0] . $htmlCode[1]);
	$g = hexdec($htmlCode[2] . $htmlCode[3]);
	$b = hexdec($htmlCode[4] . $htmlCode[5]);
	return $b + ($g << 0x8) + ($r << 0x10);
}
}

if( !function_exists('pbmit_rgb_to_hsl') ) {
function pbmit_rgb_to_hsl($RGB) {
	$r = 0xFF & ($RGB >> 0x10);
	$g = 0xFF & ($RGB >> 0x8);
	$b = 0xFF & $RGB;

	$r = ((float)$r) / 255.0;
	$g = ((float)$g) / 255.0;
	$b = ((float)$b) / 255.0;

	$maxC = max($r, $g, $b);
	$minC = min($r, $g, $b);

	$l = ($maxC + $minC) / 2.0;

	if($maxC == $minC) {
		$s = 0;
		$h = 0;
	} else {
		if($l < .5) {
			$s = ($maxC - $minC) / ($maxC + $minC);
		} else {
			$s = ($maxC - $minC) / (2.0 - $maxC - $minC);
		}
		if($r == $maxC){
			$h = ($g - $b) / ($maxC - $minC);
		}
		if($g == $maxC){
			$h = 2.0 + ($b - $r) / ($maxC - $minC);
		}
		if($b == $maxC){
			$h = 4.0 + ($r - $g) / ($maxC - $minC);
		}
		$h = $h / 6.0; 
	}
	$h = (int)round(255.0 * $h);
	$s = (int)round(255.0 * $s);
	$l = (int)round(255.0 * $l);
	return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}
}

if( !function_exists('pbmit_number_to_words') ){
function pbmit_number_to_words($num){ 
	$return = '';
	$words = array( 
		1 => "one",
		2 => "two",
		3 => "three",
		4 => "four",
		5 => "five",
		6 => "six",
	);
	if( !empty($words[$num]) ){
		$return = $words[$num];
	}
	return $return;
}
}
