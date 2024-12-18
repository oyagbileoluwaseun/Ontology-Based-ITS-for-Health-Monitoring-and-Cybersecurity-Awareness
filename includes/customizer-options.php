<?php
// Default titles
$portfolio_cpt_singular_title	= esc_attr__('Portfolio','xcare');
$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','xcare');
$service_cpt_singular_title	= esc_attr__('Service','xcare');
$service_cat_singular_title	= esc_attr__('Service Category','xcare');
$team_cpt_singular_title	= esc_attr__('Team Member','xcare');
$team_group_singular_title	= esc_attr__('Team Group','xcare');
$testimonial_cpt_singular_title		= esc_attr__('Testimonial','xcare');
$testimonial_cat_singular_title	= esc_attr__('Testimonial Category','xcare');
if( class_exists('Kirki') ){
	// Portfolio
	$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
	$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	// Portfolio Category
	$portfolio_cat_singular_title2	= Kirki::get_option( 'portfolio-cat-singular-title' );
	$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;
	// Service
	$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
	$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	// Service Category
	$service_cat_singular_title2	= Kirki::get_option( 'service-cat-singular-title' );
	$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;
	// Team
	$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
	$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
	// Team Group
	$team_group_singular_title2	= Kirki::get_option( 'team-group-singular-title' );
	$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;
	// Testimonial
	$testimonial_cpt_singular_title2	= Kirki::get_option( 'testimonial-cpt-singular-title' );
	$testimonial_cpt_singular_title	= ( !empty($testimonial_cpt_singular_title2) ) ? $testimonial_cpt_singular_title2 : $testimonial_cpt_singular_title ;
	// Testimonial Category
	$testimonial_cat_singular_title2	= Kirki::get_option( 'testimonial-cat-singular-title' );
	$testimonial_cat_singular_title	= ( !empty($testimonial_cat_singular_title2) ) ? $testimonial_cat_singular_title2 : $testimonial_cat_singular_title ;
}
$pre_color_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_color_with_gradient_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'gradientcolor'		=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_two_color_list = array(
	''					=> get_template_directory_uri() . '/includes/images/precolor-default.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
);
$pre_text_color_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
);
$pre_text_color_2_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
);
$column_list = array(
	'1'	=> get_template_directory_uri() . '/includes/images/column-1.png',
	'2'	=> get_template_directory_uri() . '/includes/images/column-2.png',
	'3'	=> get_template_directory_uri() . '/includes/images/column-3.png',
);
// Total Header Styles
$header_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/header-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/header-style-2.jpg',
	'3'	=> get_template_directory_uri() . '/includes/images/header-style-3.jpg',
	'4'	=> get_template_directory_uri() . '/includes/images/header-style-4.jpg',
	'5'	=> get_template_directory_uri() . '/includes/images/header-style-5.jpg',
	'6'	=> get_template_directory_uri() . '/includes/images/header-style-6.jpg',
	'7'	=> get_template_directory_uri() . '/includes/images/header-style-7.jpg',
	'8'	=> get_template_directory_uri() . '/includes/images/header-style-8.jpg',
	'9'	=> get_template_directory_uri() . '/includes/images/header-style-9.jpg',
	'10' => get_template_directory_uri() . '/includes/images/header-style-10.jpg',
	'11' => get_template_directory_uri() . '/includes/images/header-style-11.jpg',
	'12' => get_template_directory_uri() . '/includes/images/header-style-12.jpg',
	'13' => get_template_directory_uri() . '/includes/images/header-style-13.jpg',
);
// Total Single Portfolio Styles
$portfolio_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg',
);
// Total Single Service Styles
$service_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/service-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/service-single-style-2.jpg',
);
// Total Single Team Styles
$team_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/team-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/team-single-style-2.jpg',
);
// Social links
$social_options_array = array();
if( function_exists('pbmit_social_links_list') ){
	$social_list = pbmit_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'type'			=> 'text',
			'settings'		=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'description'	=> esc_attr__( 'Write Social URL.', 'xcare' ),
			'default'		=> '',
		);
	}
}
$footer_col_width_array = array(
	'hide'	=> esc_attr__( 'Hide this column', 'xcare' ),
	'1'		=> esc_attr__( '1%', 'xcare' ),
	'2'		=> esc_attr__( '2%', 'xcare' ),
	'3'		=> esc_attr__( '3%', 'xcare' ),
	'4'		=> esc_attr__( '4%', 'xcare' ),
	'5'		=> esc_attr__( '5%', 'xcare' ),
	'6'		=> esc_attr__( '6%', 'xcare' ),
	'7'		=> esc_attr__( '7%', 'xcare' ),
	'8'		=> esc_attr__( '8%', 'xcare' ),
	'9'		=> esc_attr__( '9%', 'xcare' ),
	'10'	=> esc_attr__( '10%', 'xcare' ),
	'11'	=> esc_attr__( '11%', 'xcare' ),
	'12'	=> esc_attr__( '12%', 'xcare' ),
	'13'	=> esc_attr__( '13%', 'xcare' ),
	'14'	=> esc_attr__( '14%', 'xcare' ),
	'15'	=> esc_attr__( '15%', 'xcare' ),
	'16'	=> esc_attr__( '16%', 'xcare' ),
	'17'	=> esc_attr__( '17%', 'xcare' ),
	'18'	=> esc_attr__( '18%', 'xcare' ),
	'19'	=> esc_attr__( '19%', 'xcare' ),
	'20'	=> esc_attr__( '20%', 'xcare' ),
	'21'	=> esc_attr__( '21%', 'xcare' ),
	'22'	=> esc_attr__( '22%', 'xcare' ),
	'23'	=> esc_attr__( '23%', 'xcare' ),
	'24'	=> esc_attr__( '24%', 'xcare' ),
	'25'	=> esc_attr__( '25%', 'xcare' ),
	'26'	=> esc_attr__( '26%', 'xcare' ),
	'27'	=> esc_attr__( '27%', 'xcare' ),
	'28'	=> esc_attr__( '28%', 'xcare' ),
	'29'	=> esc_attr__( '29%', 'xcare' ),
	'30'	=> esc_attr__( '30%', 'xcare' ),
	'31'	=> esc_attr__( '31%', 'xcare' ),
	'32'	=> esc_attr__( '32%', 'xcare' ),
	'33'	=> esc_attr__( '33%', 'xcare' ),
	'34'	=> esc_attr__( '34%', 'xcare' ),
	'35'	=> esc_attr__( '35%', 'xcare' ),
	'36'	=> esc_attr__( '36%', 'xcare' ),
	'37'	=> esc_attr__( '37%', 'xcare' ),
	'38'	=> esc_attr__( '38%', 'xcare' ),
	'39'	=> esc_attr__( '39%', 'xcare' ),
	'40'	=> esc_attr__( '40%', 'xcare' ),
	'41'	=> esc_attr__( '41%', 'xcare' ),
	'42'	=> esc_attr__( '42%', 'xcare' ),
	'43'	=> esc_attr__( '43%', 'xcare' ),
	'44'	=> esc_attr__( '44%', 'xcare' ),
	'45'	=> esc_attr__( '45%', 'xcare' ),
	'46'	=> esc_attr__( '46%', 'xcare' ),
	'47'	=> esc_attr__( '47%', 'xcare' ),
	'48'	=> esc_attr__( '48%', 'xcare' ),
	'49'	=> esc_attr__( '49%', 'xcare' ),
	'50'	=> esc_attr__( '50%', 'xcare' ),
	'51'	=> esc_attr__( '51%', 'xcare' ),
	'52'	=> esc_attr__( '52%', 'xcare' ),
	'53'	=> esc_attr__( '53%', 'xcare' ),
	'54'	=> esc_attr__( '54%', 'xcare' ),
	'55'	=> esc_attr__( '55%', 'xcare' ),
	'56'	=> esc_attr__( '56%', 'xcare' ),
	'57'	=> esc_attr__( '57%', 'xcare' ),
	'58'	=> esc_attr__( '58%', 'xcare' ),
	'59'	=> esc_attr__( '59%', 'xcare' ),
	'60'	=> esc_attr__( '60%', 'xcare' ),
	'61'	=> esc_attr__( '61%', 'xcare' ),
	'62'	=> esc_attr__( '62%', 'xcare' ),
	'63'	=> esc_attr__( '63%', 'xcare' ),
	'64'	=> esc_attr__( '64%', 'xcare' ),
	'65'	=> esc_attr__( '65%', 'xcare' ),
	'66'	=> esc_attr__( '66%', 'xcare' ),
	'67'	=> esc_attr__( '67%', 'xcare' ),
	'68'	=> esc_attr__( '68%', 'xcare' ),
	'69'	=> esc_attr__( '69%', 'xcare' ),
	'70'	=> esc_attr__( '70%', 'xcare' ),
	'71'	=> esc_attr__( '71%', 'xcare' ),
	'72'	=> esc_attr__( '72%', 'xcare' ),
	'73'	=> esc_attr__( '73%', 'xcare' ),
	'74'	=> esc_attr__( '74%', 'xcare' ),
	'75'	=> esc_attr__( '75%', 'xcare' ),
	'76'	=> esc_attr__( '76%', 'xcare' ),
	'77'	=> esc_attr__( '77%', 'xcare' ),
	'78'	=> esc_attr__( '78%', 'xcare' ),
	'79'	=> esc_attr__( '79%', 'xcare' ),
	'80'	=> esc_attr__( '80%', 'xcare' ),
	'81'	=> esc_attr__( '81%', 'xcare' ),
	'82'	=> esc_attr__( '82%', 'xcare' ),
	'83'	=> esc_attr__( '83%', 'xcare' ),
	'84'	=> esc_attr__( '84%', 'xcare' ),
	'85'	=> esc_attr__( '85%', 'xcare' ),
	'86'	=> esc_attr__( '86%', 'xcare' ),
	'87'	=> esc_attr__( '87%', 'xcare' ),
	'88'	=> esc_attr__( '88%', 'xcare' ),
	'89'	=> esc_attr__( '89%', 'xcare' ),
	'90'	=> esc_attr__( '90%', 'xcare' ),
	'91'	=> esc_attr__( '91%', 'xcare' ),
	'92'	=> esc_attr__( '92%', 'xcare' ),
	'93'	=> esc_attr__( '93%', 'xcare' ),
	'94'	=> esc_attr__( '94%', 'xcare' ),
	'95'	=> esc_attr__( '95%', 'xcare' ),
	'96'	=> esc_attr__( '96%', 'xcare' ),
	'97'	=> esc_attr__( '97%', 'xcare' ),
	'98'	=> esc_attr__( '98%', 'xcare' ),
	'99'	=> esc_attr__( '99%', 'xcare' ),
	'100'	=> esc_attr__( '100%', 'xcare' ),
);

$blog_styles = pbmit_element_template_list('blog', 'customizer');
unset($blog_styles['classic'], $blog_styles['2']);

/*** Options array ***/
$kirki_options_array = array(
	// General Settings
	'general_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'General Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'color',
				'settings'		=> 'global-color',
				'label'			=> esc_attr__( 'Global Color', 'xcare' ),
				'description'	=> esc_attr__( 'This color will be globally applied to most of elements parts and special texts', 'xcare' ),
				'default'		=> '#3368c6',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'secondary-color',
				'label'			=> esc_attr__( 'Secondary Color', 'xcare' ),
				'description'	=> esc_attr__( 'This color will be used on some elements. Sometimes with Global Color. This should match with Global Color to look good.', 'xcare' ),
				'default'		=> '#010d27',
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'gradient-color',
				'label'		=> esc_attr__( 'Gradient Color', 'xcare' ),
				'choices'		=> array(
					'first'		=> esc_attr__( 'Starting Color', 'xcare' ),
					'last'		=> esc_attr__( 'Ending Color', 'xcare' ),
				),
				'default'	=> array(
				'first'		=> '#3368c6',
				'last'		=> '#4172c6',
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'logo',
				'label'				=> esc_attr__( 'Logo', 'xcare' ),
				'description'		=> esc_attr__( 'Main logo', 'xcare' ),
				'default'			=> get_template_directory_uri() . '/images/logo.svg',
				'partial_refresh'	=> array(
					'logo'				=> array(
						'selector'			=> '.site-title',
						'render_callback'	=> function() {
							return pbmit_logo( 'yes' );
						},
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'logo-height',
				'label'			=> esc_attr__( 'Logo Max Height', 'xcare' ),
				'default'		=> 60,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'sticky-logo',
				'label'			=> esc_attr__( 'Sticky Logo', 'xcare' ),
				'description'	=> esc_attr__( 'Sticky logo', 'xcare' ),
				'default'		=> '',
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-logo-height',
				'label'			=> esc_attr__( 'Sticky Logo Max Height', 'xcare' ),
				'default'		=> 60,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'responsive-logo',
				'label'			=> esc_attr__( 'Responsive Logo', 'xcare' ),
				'description'	=> esc_attr__( 'This logo appear in small devices like mobile/tablet etc', 'xcare' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-logo-height',
				'label'			=> esc_attr__( 'Responsive Logo Max Height', 'xcare' ),
				'default'		=> 60,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'link-color',
				'label'		=> esc_attr__( 'Link Color', 'xcare' ),
				'choices'		=> array(
					'normal'	=> esc_attr__( 'Normal Color', 'xcare' ),
					'hover'		=> esc_attr__( 'Mouse-Over (Hover) Color', 'xcare' ),
				),
				'default'	=> array(
					'normal'	=> '#031b4e',
					'hover'		=> '#3368c6',
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preloader',
				'label'			=> esc_attr__( 'Show Preloader?', 'xcare' ),
				'description'	=> esc_attr__( 'Show or hide preloader', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'preloader-image',
				'label'			=> esc_html__( 'Select preloader image', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'   => get_template_directory_uri() . '/images/loader1.svg',
					'2'   => get_template_directory_uri() . '/images/loader2.svg',
					'3'   => get_template_directory_uri() . '/images/loader3.svg',
					'4'   => get_template_directory_uri() . '/images/loader4.svg',
					'5'   => get_template_directory_uri() . '/images/loader5.svg',
					'6'   => get_template_directory_uri() . '/images/loader6.svg',
					'7'   => get_template_directory_uri() . '/images/loader7.svg',
					'8'   => get_template_directory_uri() . '/images/loader8.svg',
					'9'   => get_template_directory_uri() . '/images/loader9.svg',
				),
				'active_callback'=> array( array(
					'setting' => 'preloader',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-page',
				'label'		=> esc_html__( 'Page Sidebar', 'xcare' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),

			// Advanced Settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-advanced-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Special advanced options', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'body-bg-color',
				'label'			=> esc_attr__( 'Body Background Color', 'xcare' ),
				'description'	=> esc_attr__( 'This is default Body background color.', 'xcare' ),
				'default'		=> '#f0f7fd',
			),
			array(
				'type'		=> 'switch',
				'settings'	=> 'min',
				'label'	   => esc_attr__( 'Load Minified CSS and JS Files?', 'xcare' ),
				'description' => esc_attr__( 'Load minified files for CSS and JS code files. Select YES to reduce page load time.', 'xcare' ),
				'default'	 => '1',
				'choices'	 => array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'white-color',
				'label'			=> esc_attr__( 'White Color', 'xcare' ),
				'description'	=> esc_attr__( 'This is default white background color.', 'xcare' ),
				'default'		=> '#ffffff',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'light-bg-color',
				'label'			=> esc_attr__( 'Light Background Color', 'xcare' ),
				'description'	=> esc_attr__( 'This is default grey background color.', 'xcare' ),
				'default'		=> '#f0f7fd',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-color',
				'label'			=> esc_attr__( 'Blackish Text Color', 'xcare' ),
				'description'	=> esc_attr__( 'This is default blackish color for text.', 'xcare' ),
				'default'		=> '#031b4e',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-bg-color',
				'label'			=> esc_attr__( 'Blackish Background Color', 'xcare' ),
				'description'	=> esc_attr__( 'This is default blackish background color.', 'xcare' ),
				'default'		=> '#031b4e',
			),

			// Global image quality
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-image-qualityc-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Image quality Settings', 'xcare' ) . '</h2></div>',
			),

			array(
				'type'			=> 'select',
				'settings'		=> 'image-quality',
				'label'			=> esc_attr__( 'Image quality', 'xcare' ),
				'description'	=> esc_attr__( 'Select image quality level. Default is "82%". This will effect JPG and JPEG images only.', 'xcare' ),
				'default'		=> esc_attr('82'),
				'choices'		=>  array(
					'75'			=> esc_attr__( '75', 'xcare' ),
					'80'			=> esc_attr__( '80', 'xcare' ),
					'82'			=> esc_attr__( '82 (default)', 'xcare' ),
					'85'			=> esc_attr__( '85', 'xcare' ),
					'90'			=> esc_attr__( '90', 'xcare' ),
					'95'			=> esc_attr__( '95', 'xcare' ),
					'100'			=> esc_attr__( '100', 'xcare' ),

				),
			),
		)
	),
	// Typography Settings
	'typography_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Typography Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'typography',
				'settings'		=> 'global-typography',
				'label'			=> esc_attr__( 'Global Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array (
					'font-family'		=> 'Roboto',
					'variant'			=> 'normal',
					'font-size'			=> '16px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0px',
					'color'				=> '#6e778c',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'			=> 10,
				'pbmit-output'		=> 'body',
				'pbmit-all-variants'	=> true,
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h1-typography',
				'label'			=> esc_attr__( 'H1 Typography', 'xcare' ),
				'tooltip'	 => esc_attr__( 'This is tooltip', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '46px',
					'line-height'		=> '56px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h1',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h2-typography',
				'label'			=> esc_attr__( 'H2 Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '40px',
					'line-height'		=> '50px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h2',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h3-typography',
				'label'			=> esc_attr__( 'H3 Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '36px',
					'line-height'		=> '46px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h4-typography',
				'label'			=> esc_attr__( 'H4 Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '30px',
					'line-height'		=> '40px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h4',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h5-typography',
				'label'			=> esc_attr__( 'H5 Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '24px',
					'line-height'		=> '34px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h5',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h6-typography',
				'label'			=> esc_attr__( 'H6 Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '20px',
					'line-height'		=> '30px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h6',
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Special Heading Typography', 'xcare' ) . '</h2> <span>' . esc_html__( 'Heading typography options', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'heading-typography',
				'label'			=> esc_attr__( 'Heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '48px',
					'line-height'		=> '60px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-heading-subheading .pbmit-element-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'subheading-typography',
				'label'			=> esc_attr__( 'Sub-heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '600',
					'font-size'			=> '12px',
					'line-height'		=> '28px',
					'letter-spacing'	=> '0.6px',
					'color'				=> '#3368c6',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-heading-subheading .pbmit-element-subtitle,.pbmit-element-subtitle-new',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'content-typography',
				'label'			=> esc_attr__( 'Content Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Roboto',
					'variant'			=> 'normal',
					'font-size'			=> '16px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '0px',
					'color'				=> '#6e778c',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-ihbox.pbmit-ihbox-style-hsbox .pbmit-ihbox-content',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'widget-heading-typography',
				'label'			=> esc_attr__( 'Widget Heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '24px',
					'line-height'		=> '34px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '			
				.pbminfotech-sidebar .widget_search .wp-block-search__label, .pbminfotech-sidebar .widget_block .wp-block-group h2, 
				.widget-title, .pbmit-footer-copyright-box h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'footer-widget-heading-typography',
				'label'			=> esc_attr__( 'Footer Widget Heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '16px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '0px',
					'color'				=> '#3368c5',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-footer-widget .widget .widget-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'buttons-typography',
				'label'			=> esc_attr__( 'Button Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '13px',
					'line-height'		=> '23px',
					'letter-spacing'	=> '0.6px',
					'text-transform'	=> 'uppercase',					
					'font-style'		=> 'normal',
				),
				'pbmit-output'	=> 'pbmit-search-results-back-global-btn a, .pbmit-search-results-load-btn a, .pbmit-read-more-link a, .pbmit-service-btn a, .woocommerce ul.products li.product .onsale, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .elementor-widget-button .elementor-button, .pbmit-ptable-btn, .pbmit-ptable-btn a, .pbmit-service-btn, .pbmit-ihbox-btn a, .woocommerce .woocommerce-message .button, .woocommerce div.product form.cart .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, button, html input[type=button], input[type=reset], input[type=submit], .pbmit-ads-button,.pbmit-ajax-load-more-btn a, .pbmit-header-button2 a,.pbmit-btn a .pbmit-button-text,.pbmit-form .wpcf7-submit, .pbmit-element-service-style-5 .pbmit-btn a, .pbmit-service-ads .pbmit-btn a',
			),
			// Extra Load Fonts Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'css-only-custom-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'CSS only Typography', 'xcare' ) . '</h2> <span>' . esc_html__( 'This will not apply to any font style but this font will be loaded so we can use anywhere.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-1-typography',
				'label'			=> esc_attr__( 'First Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbmit-ihbox-style-7 .pbmit-ihbox-box-number,.pbminfotech-ele-fid-style-1 .pbmit-fid-inner,.pbminfotech-ele-fid-style-1 .pbmit-fid-inner, .pbmit-team-style-2 .pbmit-team-btn a, .pbmit-static-box-style-1 .pbmit-contentbox:before, .site .elementor-accordion .elementor-tab-title, .pbminfotech-ele-ptable-style-1 .pbmit-price-wrapper, .pbminfotech-ele-ptable-style-1 .pbminfotech-ptable-desc,.pbminfotech-ele-fid-style-3 .pbmit-fid-inner,.pbmit-static-box-style-1 .pbmit-bg-imgbox .pbmit-text .pbminfotech-static-box-number,.mptt-shortcode-wrapper .mptt-shortcode-list .mptt-column .mptt-events-list .mptt-list-event .mptt-event-title, .mptt-shortcode-wrapper .mptt-shortcode-table tbody .mptt-event-container .event-title, .pbmit-ihbox-style-10 .pbmit-heading-desc, .pbmit-ihbox-style-10 .pbmit-ihbox-box-number,.pbmit-service-style-1 .pbmit-serv-cat,.pbmit-service-style-2 .pbmit-serv-cat a,.pbmit-team-style-2 .pbminfotech-box-team-position,.pbmit-blog-style-1 .pbmit-meta-category a,.pbmit-blog-style-2 .pbmit-meta-category a,.site-content .pbmit_widget_list_all_posts ul>li a,.widget .download .item-download a,.pbmit-blog-classic blockquote:not(.wp-block-quote):not(.has-text-color),.post-navigation .nav-links .nav-title,.post-navigation .nav-links .pbmit-post-nav-head,.comments-area .pbmit-comment-meta,.pbmit-author-content .pbmit-author-name,.pbminfotech-sidebar .widget_categories ul li.cat-item .pbmit-cat-li>a,.pbm_addons_recent_posts_widget .pbmit-rpw-content,.pbmit-header-style-2 .pbmit-header-button a .pbmit-header-button-text-2,.pbmit-header-style-3 .pbmit-header-button a .pbmit-header-button-text-2,.pbmit-tab-content-title, .pbmit-tab-link,.pbmit-header-style-3 .pbmit-slider-social li span::before,.wpem-event-box-col .wpem-event-type a,.pbmit-footer-menu.elementor-widget .elementor-icon-list-items .elementor-icon-list-item,.wpem-single-event-page .wpem-single-event-footer .wpem-organizer-profile-wrapper .wpem-organizer-profile .wpem-organizer-name span,.wpem-single-event-page .wpem-single-event-footer .wpem-venue-profile-wrapper .wpem-venue-profile .wpem-venue-name, .wpem-single-event-footer .wpem-theme-button,.wpem-single-event-body .registration_button,.wpem-event-listings .wpem-event-layout-wrapper .wpem-event-infomation .wpem-event-details .wpem-event-title .wpem-heading-text,.wpem-event-organizer-tabs .wpem-tabs-wrapper .wpem-tabs-wrap .wpem-tab-link,.woocommerce div.product form.cart .variations label,.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a,.pbmit-team-style-2 .pbmit-team-btn,.pbmit-element-service-style-3 .pbmit-title-data-hover,.pbmit-team-single-style-2 .pbmit-team-title,.pbmit-team-single-style-2 .pbmit-single-team-info li label,.site-footer .widget.widget_categories ul li .pbmit-cat-li>a, .site-footer .widget.widget_archive ul li>.pbmit-arc-li>a,.site-content .widget.widget_archive ul li .pbmit-arc-li>a,.woocommerce table.shop_table th,.pbmit-team-style-1 .pbminfotech-box-team-position,.pbmit-testimonial-style-2 .pbminfotech-testimonial-detail,.pbmit-blog-style-2 .pbmit-meta-line, .pbmit-blog-style-2 .pbmit-meta-line a,.pbmit-blog-style-1 .pbmit-meta-line,.pbmit-portfolio-lines-wrapper .pbmit-portfolio-line-title,.error404 .search-form input[type="search"],.pbmit-spinner-box-style-1 .pbmit-ihbox-box text, .wpem-main-vmenu-dashboard-wrapper .wpem-main-vmenu-dashboard-content-wrap .wpem-dashboard-events-block-wrap .wpem-dashboard-event-list-wrapper .wpem-dashboard-event-list .wpem-dashboard-event-name a, .pbmit-static-box-style-1 .pbmit-contentbox-inner:before, .pbmit-ihbox-style-18 .pbmit-ihbox-box-number, .pbmit-ihbox-style-18 .pbmit-ihbox-icon-type-text, .elementor-widget-tabs .elementor-tab-desktop-title, body .elementor-widget-progress .elementor-title, body .elementor-progress-percentage, .pbmit-ihbox-style-20 .pbmit-ihbox-icon-type-text,.mptt-shortcode-wrapper .pbmit-select ul li a, .pbmit-header-style-5 .pbmit-header-button, .pbmit-header-style-6 .pbmit-header-button, .pbmit-ihbox-style-28 .pbmit-heading-desc > span, .pbmit-ihbox-style-29 .pbmit-ihbox-box-number, .pbminfotech-ele-fid-style-6 .pbmit-fid-inner, .pbminfotech-ele-ptable-style-2 .pbmit-ptable-price-wrapper, .pbmit-ihbox-style-30 .pbmit-heading-desc > span, .pbmit-header-style-9 .pbmit-header-button .pbmit-header-button-text-2, .pbmit-count-down-style-1 #main_countedown_1 .time_left, .pbmit-ihbox-style-32 .pbmit-ihbox-box-number, .pbmit-ihbox-style-39 .pbmit-heading-desc',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-2-typography',
				'label'			=> esc_attr__( 'Second Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '300',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbmit-testimonial-style-1 .pbminfotech-testimonial-text,.pbmit-testimonial-style-2 .pbminfotech-testimonial-text, .pbmit-element-service-style-5 .pbminfotech-box-number, .pbmit-element-service-style-5 .pbmit-title-inner, .pbmit-testimonial-style-3 .pbminfotech-testimonial-text',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-3-typography',
				'label'			=> esc_attr__( 'Third Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Roboto',
					'variant'			=> 'normal',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbminfotech-ele-fid-style-5 .pbmit-fid-title, .pbmit-appoinment-form.pbmit-form .wpcf7-date,#page .pbmit-appoinment-form.pbmit-form .select2-container--default .select2-selection--single .select2-selection__rendered, .pbmit-count-down-style-1 #main_countedown_1 .time_description',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-4-typography',
				'label'			=> esc_attr__( 'Fourth Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Roboto',
					'variant'			=> '300',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbmit-team-style-3 .pbmit-team-title-wapper::before, .pbmit-team-style-4 .pbminfotech-box-team-position',
			),
		)
	),
	// Pre-Header Options
	'preheader_options'	=> array(
		'section_settings'	=> array(
			'title'				=> esc_attr__( 'Pre-Header Options', 'xcare' ),
			'panel'				=> 'xcare_base_options',
			'priority'			=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-enable',
				'label'			=> esc_attr__( 'Show or hide Pre-header', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'			=> esc_attr__( 'Show', 'xcare' ),
					'off'			=> esc_attr__( 'Hide', 'xcare' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-text-color',
				'label'				=> esc_attr__( 'Select pre-header text color', 'xcare' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'preheader-enable',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-bgcolor',
				'label'				=> esc_html__( 'Select pre-header background color', 'xcare' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'preheader-bgcolor-custom',
				'label'			=> esc_attr__( 'Select pre-header background custom color', 'xcare' ),
				'description'	=> esc_attr__( 'Select custom color for pre-header background', 'xcare' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'preheader-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					),
					array(
						'setting'			=> 'preheader-enable',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'          => 'number',
				'settings'      => 'preheader-responsive',
				'label'         => esc_attr__( 'Hide in screen size', 'xcare' ),
				'description'   => esc_attr__( 'Select screen size to hide this pre-header below the selected screen size. Preferred Sizes: 1200, 1024, 992 and 768', 'wedgala' ),
				'default'       => 1200,
				'choices'       => array(
					'min'           => 1,
					'max'           => 2000,
					'step'          => 1,
				),
				'active_callback'   => array( array(
					'setting'           => 'preheader-enable',
					'operator'          => '==',
					'value'             => '1',
				) ),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'preheader-content-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Preheader content', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Manage preheader content from here', 'xcare' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-left',
				'label'			=> esc_attr__( 'Pre-header Left Content', 'xcare' ),
				'default'		=> pbmit_esc_kses('<ul class="pbmit-contact-info"><li><i class="pbmit-base-icon-location-2"></i>125, Suitland Street, Beverley Rd</li><li><i class="pbmit-base-icon-time"></i>Mon - Sat 8.00 - 18.00, Sun - Closed</li></ul>'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-left'		=> array(
						'selector'			=> '.pbmit-pre-header-left',
						'render_callback'	=> function() {
							return get_theme_mod('preheader-left');
						},
					)
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-right',
				'label'			=> esc_attr__( 'Pre-header Right Content', 'xcare' ),
				'default'		=> pbmit_esc_kses('<ul class="pbmit-contact-info"><li><i class="pbmit-base-icon-contact"></i> Make a call : +1 (212) 255-5511</li><li>[pbmit-social-links]</li></ul>'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-right'		=> array(
						'selector'			=> '.pbmit-pre-header-right',
						'render_callback'	=> function() {
							return get_theme_mod('preheader-right');
						},
					)
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-search',
				'label'			=> esc_attr__( 'Show Search Icon in Pre-header Right Area?', 'xcare' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in pre-header right side.', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
		),
	),
	// Header Options
	'header_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Header Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'header-style',
				'label'		=> esc_html__( 'Header Style', 'xcare' ),
				'description'	=> '<div class="pbmit-alert-message">'.esc_html__( 'NOTE: This will also change other options (like background color, menu color, logo etc) to set it with this header.', 'xcare' ).'</div>',
				'default'	=> '1',
				'choices'		=> $header_style_array,
			),

			// Header button
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-button-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Header Button', 'xcare' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'xcare' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
			),

			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-text',
				'label'				=> esc_attr__( 'Header Button Text (1st line)', 'xcare' ),
				'default'		=> esc_attr__( '+1(212)255-511', 'xcare' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn-text'	=> array(
						'selector'			=> '.pbmit-header-button',
						'render_callback'	=> function() {
							return pbmit_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),

			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-text2',
				'label'				=> esc_attr__( 'Header Button Text (2nd line)', 'xcare' ),
				'default'		=> esc_attr__( '+1(212)255-511', 'xcare' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn-text'	=> array(
						'selector'			=> '.pbmit-header-button',
						'render_callback'	=> function() {
							return pbmit_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),

			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-url',
				'label'				=> esc_attr__( 'Header Button Link (URL)', 'xcare' ),
				'default'	=> esc_url('tel:+ 1(212) 255-511'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
			),

			// Header Second button

			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-button2-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Header Button Second', 'xcare' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'xcare' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '10',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '12',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
			),

			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn2-text',
				'label'				=> esc_attr__( 'Header Button Text', 'xcare' ),
				'default'		=> esc_attr__( 'Have any Question ?', 'xcare' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '10',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '12',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn-text'	=> array(
						'selector'			=> '.pbmit-header-button',
						'render_callback'	=> function() {
							return pbmit_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn2-url',
				'label'				=> esc_attr__( 'Header Button Link (URL)', 'xcare' ),
				'default'			=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '7',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '8',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '10',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '11',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '12',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '13',
						),
					)
				),
			),

			// Burger Logo

			array(
				'type'				=> 'image',
				'settings'			=> 'burger-logo',
				'label'				=> esc_attr__( 'Burger Menu Logo', 'xcare' ),
				'default'			=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'burger-logo-height',
				'label'			=> esc_attr__( 'Burger Logo Max Height', 'xcare' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '9',
						),
					)
				),
			),

			// Burger Menu option

			array(
				'type'			=> 'switch',
				'settings'		=> 'header-burger-menu-switcher',
				'label'			=> esc_attr__( 'Show Burger Menu Social Media?', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
				'active_callback'=> array(		
						array(
							array(
								'setting'	=> 'header-style',
								'operator' 	=> '==',
								'value' 	=> '9',
							),
						),
					),		
				),


		// Social Links Options

		array(
			'type'			=> 'textarea',
			'settings'		=> 'header-social-link',
			'label'			=> esc_attr__( 'Social Links Options', 'xcare' ),
			'default'		=> pbmit_esc_kses('[pbmit-social-links]'),
			'description'	=> esc_attr__( 'You can use [pbmit-social-links] shortcode for social list with icon.', 'xcare' ),
			'active_callback'=> array(
				array(
					array(
						'setting'	=> 'header-style',
						'operator'	=> '==',
						'value'		=> '2',
					),
					array(
						'setting'	=> 'header-style',
						'operator'	=> '==',
						'value'		=> '4',
					),
				)
			),
		),

			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'General Options', 'xcare' ) . '</h2> <span>' . esc_html__( 'Common options that apply to all header styles', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'header-height',
				'label'			=> esc_attr__( 'Header Height (in pixel)', 'xcare' ),
				'description'	=> esc_attr__( 'Select header height', 'xcare' ),
				'default'		=> 90,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'xcare' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'header-background-color',
				'label'			=> esc_attr__( 'Header Background Color', 'xcare' ),
				'description'	=> esc_attr__( 'Select custom color for header background', 'xcare' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),

			// Search in Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-search-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Search in Header', 'xcare' ) . '</h2> <span>' . esc_html__( 'Options for search in header area', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'header-search',
				'label'			=> esc_attr__( 'Show Search Icon in Header Area?', 'xcare' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in header area.', 'xcare' ),
				'default'		=> 0,
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),

			// Sticky Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-sticky-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sticky Header Options', 'xcare' ) . '</h2> <span>' . esc_html__( 'Options for sticky header area', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'sticky-header',
				'label'			=> esc_attr__( 'Sticky Header on Scroll?', 'xcare' ),
				'description'	=> esc_attr__( 'Select YES to make header sticky on scroll.', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-header-height',
				'label'			=> esc_attr__( 'Sticky Area Height (in pixel)', 'xcare' ),
				'description'	=> esc_attr__( 'Select Area height for sticky header', 'xcare' ),
				'default'		=> 90,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 300,
					'step'			=> 1,
				),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'sticky-header',
							'operator'	=> '==',
							'value'		=> '1',
						),
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'sticky-header-bgcolor',
				'label'				=> esc_html__( 'Sticky Area Background Color', 'xcare' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'sticky-header-background-color',
				'label'			=> esc_attr__( 'Sticky Header Background Custom Color', 'xcare' ),
				'description'	=> esc_attr__( 'Select custom color for sticky header background', 'xcare' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						'setting'	=> 'sticky-header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Responsive Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'responsive-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Responsive Header Options', 'xcare' ) . '</h2> <span>' . esc_html__( 'Options for responsive (mobile or tablet mode) header area', 'xcare' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'responsive-header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'xcare' ),
				'default'			=> '',
				'choices'			=> $pre_two_color_list,
			),
		),
	),
	// Menu Options
	'menu_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Menu Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Main Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'main-menu-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Main Menu Options', 'xcare' ) . '</h2> <span>' . esc_html__( 'Set Main Menu font settings', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'main-menu-typography',
				'label'			=> esc_attr__( 'Main Menu Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '600',
					'font-size'			=> '12px',
					'line-height'		=> '22px',
					'letter-spacing'	=> '0.3px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'body:not(.mega-menu-pbminfotech-top) .pbmit-navbar div > ul > li > a, .pbmit-max-mega-menu-override #page #site-navigation .max-mega-menu > li.mega-menu-item > a.mega-menu-link, .pbmit-burger-menu-area .menu-main-menu-container ul > li > a',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'main-menu-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color', 'xcare' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active', 'xcare' ),
				'default'		=> 'globalcolor',
				'choices'		=> $pre_text_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-color',
				'label'			=> esc_attr__( 'Main Menu Text Color for Sticky Header', 'xcare' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu text when header is sticky', 'xcare' ),
				'default'		=> '#181a17',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color for Sticky Header', 'xcare' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active in sticky header', 'xcare' ),
				'default'		=> '#031b4e',
			),
			// Dropdown Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'drop-down-menu-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Dropdown Menu Options', 'xcare' ) . '</h2> <span>' . esc_html__( 'Set Dropdown font settings', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'dropdown-menu-typography',
				'label'			=> esc_attr__( 'Dropdown Menu Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '12px',
					'line-height'		=> '22px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-navbar ul ul a, 
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-flyout > ul.mega-sub-menu li.mega-menu-item a.mega-menu-link,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li > ul.mega-sub-menu li.mega-menu-item > a:hover, 
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li > ul.mega-sub-menu li.mega-menu-item > a:focus,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu ul:not(.menu) > li.mega-menu-item > a.mega-menu-link,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li .widget_nav_menu ul.menu > li.mega-menu-item > a.mega-menu-link, .pbmit-burger-menu-area .menu-main-menu-container ul ul a',
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'dropdown_background',
				'label'			=> esc_attr__( 'Dropdown Menu Background', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for Dropdown Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-flyout > ul.mega-sub-menu,.pbmit-navbar ul ul, .pbmit-navbar ul ul:before,.pbmit-navbar ul.sub-menu:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'drop-down-menu-active-color',
				'label'				=> esc_html__( 'Dropdown Menu Active Color', 'xcare' ),
				'default'			=> 'blackish',
				'choices'			=> $pre_text_color_list,
			),

			// Max Mega Menu Option
			array(
				'type'			=> 'custom',
				'settings'		=> 'max-mega-menu-override-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Max Mega Menu Plugin Option', 'xcare' ) . '</h2> <span>' . esc_html__( 'Option for Max Mega Menu plugin', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'max-mega-menu-override',
				'label'			=> esc_attr__( 'Override Max Mega Menu design?', 'xcare' ),
				'description'	=> esc_attr__( 'Select YES to override Max Mega Menu design. Make sure you are using "Max Mega Menu" plugin for mega menu', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'mmm-title-typography',
				'label'			=> esc_attr__( 'Max Mega Menu - Widget Title Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '700',
					'font-size'			=> '14px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'color'				=> '#031b4e',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, .pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, .pbmit-max-mega-menu-override .pbmit-burger-menu-area .main-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title',
			),

			array( // 1st dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-1-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 1st Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for first Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(1) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(1) > ul.mega-sub-menu:before',
			),
			array( // 2nd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-2-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 2nd Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for second Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(2) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(2) > ul.mega-sub-menu:before',
			),
			array( // 3rd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-3-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 3rd Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for third Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(3) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(3) > ul.mega-sub-menu:before',
			),
			array( // 4th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-4-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 4th Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for fourth Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(4) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(4) > ul.mega-sub-menu:before',
			),
			array( // 5th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-5-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 5th Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for fifth Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(5) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(5) > ul.mega-sub-menu:before',
			),
			array( // 6th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-6-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 6th Dropdown Menu Background Option', 'xcare' ),
				'description'	=> esc_attr__( 'Background settings for sixth Dropdown Menu in Max Mega Menu', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(6) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(6) > ul.mega-sub-menu:before',
			),

		)
	),
	// Titlebar Options
	'titlebar_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Titlebar Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-enable',
				'label'			=> esc_attr__( 'Show Titlebar?', 'xcare' ),
				'description'	=> esc_attr__( 'Show or hide Titlebar', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'titlebar-height',
				'label'			=> esc_attr__( 'Titlebar Height', 'xcare' ),
				'default'		=> 300,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'titlebar-style',
				'label'			=> esc_attr__( 'Titlebar Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select style for Titlebar', 'xcare' ),
				'default'		=> 'left',
				'choices'		=>  array(
					'left'			=> esc_attr__( 'All Left Aligned', 'xcare' ),
					'center'		=> esc_attr__( 'All Center Aligned', 'xcare' )
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-hide-breadcrumb',
				'label'			=> esc_attr__( 'Hide Breadcrumb?', 'xcare' ),
				'description'	=> esc_attr__( 'Show or hide breadcrumb in Titlebar', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'titlebar-bg-featured',
				'label'			=> esc_attr__( 'Featured Image as Titlebar Background', 'xcare' ),
				'description'	=> esc_attr__( 'Select which section (CPT) will show featured image as background image in Titlebar. NOTE: This will work for Single view only.', 'xcare' ),
				'default'		=> array(),
				'choices'		=> array(
					'post'				=> sprintf( esc_attr__('For %1$s', 'xcare') , '"Post"' ),
					'page'				=> sprintf( esc_attr__('For %1$s', 'xcare') , '"Page"' ),
					'pbmit-portfolio'	=> sprintf( esc_attr__('For %1$s', 'xcare') , '"'.$portfolio_cpt_singular_title.'"' ),
					'pbmit-team-member'	=> sprintf( esc_attr__('For %1$s', 'xcare') , '"'.$team_cpt_singular_title.'"' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'titlebar-bgcolor',
				'label'				=> esc_html__( 'Select Titlebar background color', 'xcare' ),
				'default'			=> 'globalcolor',
				'choices'			=> $pre_color_with_gradient_list,
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'titlebar-background',
				'label'			=> esc_attr__( 'Background', 'xcare' ),
				'description'	=> esc_attr__( 'Background Settings', 'xcare' ),
				'default'		=> array(
					'background-color'	  => 'rgba(0,0,0,0.2)',
					'background-repeat'	 => 'no-repeat',
					'background-position'   => 'center center',
					'background-size'	   => 'cover',
					'background-attachment' => 'scroll',
				),
				'pbmit-output'	=> '.pbmit-title-bar-wrapper, .pbmit-title-bar-wrapper.pbmit-bg-color-custom:before',
				'active_callback' => array( array(
					'setting'		=> 'titlebar-enable',
					'operator'		=> '==',
					'value'			=> '1',
				) ),
			),
			array(
				'type'		=> 'typography',
				'settings'	=> 'titlebar-heading-typography',
				'label'		=> esc_attr__( 'Titlebar Heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> '500',
					'font-size'			=> '60px',
					'line-height'		=> '60px',
					'letter-spacing'	=> '0px',
					'color'				=> '#fff',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-tbar-title',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-subheading-typography',
				'label'			=> esc_attr__( 'Titlebar Sub-heading Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> 'normal',
					'font-size'			=> '16px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#fff',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-tbar-subtitle',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-breadcrumb-typography',
				'label'			=> esc_attr__( 'Titlebar Breadcrumb Typography', 'xcare' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Sora',
					'variant'			=> 'regular',
					'font-size'			=> '15px',
					'line-height'		=> '25px',
					'letter-spacing'	=> '0.6px',
					'color'				=> '#fff',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
			'priority'				=> 10,
				'pbmit-output'		=> '.pbmit-breadcrumb, .pbmit-breadcrumb a',
				'active_callback'	=> array(
					array(
						'setting'			=> 'titlebar-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'titlebar-hide-breadcrumb',
						'operator'			=> '==',
						'value'				=> '0',
					)
				),
			),
		),
	),
	// Footer Options
		'footer_options' => array(
			'section_settings' => array(
				'title'			=> esc_attr__( 'Footer Options', 'xcare' ),
				'panel'			=> 'xcare_base_options',
				'priority'		=> 160,
			),
			'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-enable',
				'label'			=> esc_attr__( 'Show footer?', 'xcare' ),
				'description'	=> esc_attr__( 'Show or hide footer', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),

			// Footer Background settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-background-settings-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Footer Background Settings', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Manage footer background settings from here', 'xcare' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-style',
				'label'			=> esc_html__( 'Select Footer Style', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'				=> get_template_directory_uri() . '/includes/images/footer-style-1.jpg',
					'2'				=> get_template_directory_uri() . '/includes/images/footer-style-2.jpg',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-bgcolor',
				'label'			=> esc_html__( 'Select Full Footer background color', 'xcare' ),
				'description'	=> esc_attr__( 'This will be applied to full footer area including footer widget area and footer copyright area.', 'xcare' ),
				'default'		=> 'secondarycolor',
				'choices'		=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-background',
				'label'			=> esc_attr__( 'Full Footer Background', 'xcare' ),
				'description'	=> esc_attr__( 'This will be applied to full footer area including footer widget area and footer copyright area.', 'xcare' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center top',
					'background-size'		=> 'contain',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'pbmit-output'	=> '.site-footer, .site-footer.pbmit-bg-color-custom:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-text-color',
				'label'				=> esc_attr__( 'Select Footer Text Color', 'xcare' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),

			// Footer Boxes Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-boxes-area-heading',
				'default'		=> '<div class="xcare-option-heading"><h2>' . esc_html__( 'Footer Boxes Area', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Manage footer boxes from here', 'xcare' ) . '</span></div>',
				'active_callback'=> array(	
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),	
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '1',
						),
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
					),
				),
			),

			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-boxes-area',
				'label'			=> esc_attr__( 'Show footer boxes?', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
				'active_callback'=> array(	
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '1',
						),
					),
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'footer-right-area',
				'label'			=> esc_attr__( 'Footer Right Area', 'xcare' ),
				'default'		=> pbmit_esc_kses('<h3>Professional & modern, a theme designed to help <br> your business stand out from the rest.</h3>'),
				'active_callback'=> array(
					array(
					'setting'	=> 'footer-boxes-area',
					'operator' 	=> '==',
					'value' 		=> '1',
					),
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '3',
						),
					),
				),
			),

			array(
				'type'				=> 'image',
				'settings'			=> 'footer-logo',
				'label'				=> esc_attr__( 'Foorer Logo', 'xcare' ),
				'default'			=> get_template_directory_uri() . '/images/logo.svg',
				'active_callback'=> array(		
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						'setting'	=> 'footer-boxes-area',
						'operator' 	=> '==',
						'value' 		=> '1',
					),
					array(	
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '1',
						),					
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
					),
				),
			),


			// Footer Widget Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-widget-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Footer Widget Area', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Manage widget area settings', 'xcare' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'footer-column',
				'label'		=> esc_html__( 'Footer Widget Column Type', 'xcare' ),
				'description'	=> esc_html__( 'This will show widgets. You can manage it from "Admin > Appearance > Widgets" section.', 'xcare' ),
				'default'	=> 'custom',
				'choices'		=> array(
					'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
					'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
					'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
					'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
					'2-2-2-6'	=> get_template_directory_uri() . '/includes/images/footer-2-2-2-6.png',
					'6-2-2-2'	=> get_template_directory_uri() . '/includes/images/footer-6-2-2-2.png',
					'8-4'		=> get_template_directory_uri() . '/includes/images/footer-8-4.png',
					'4-8'		=> get_template_directory_uri() . '/includes/images/footer-4-8.png',
					'custom'	=> get_template_directory_uri() . '/includes/images/footer-col-custom.png',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-1-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 1st Column', 'xcare' ),
				'description'	=> esc_attr__( 'Set custom width of the 1st column in footer widget area', 'xcare' ),
				'default'		=> '38',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-2-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 2nd Column', 'xcare' ),
				'description'	=> esc_attr__( 'Set custom width of the 2nd column in footer widget area', 'xcare' ),
				'default'		=> '20',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-3-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 3rd Column', 'xcare' ),
				'description'	=> esc_attr__( 'Set custom width of the 3rd column in footer widget area', 'xcare' ),
				'default'		=> '21',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-4-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 4th Column', 'xcare' ),
				'description'	=> esc_attr__( 'Set custom width of the 4th column in footer widget area', 'xcare' ),
				'default'		=> '21',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),	

			array(
				'type'			=> 'editor',
				'settings'		=> 'copyright-text',
				'label'			=> esc_attr__( 'Footer Copyright Text', 'xcare' ),
				'default'		=> sprintf( esc_attr__( 'Copyright &copy; %1$s %2$s, All Rights Reserved.', 'xcare' ), date('Y'), '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a>' ),
				'priority'		=> 10,
				'partial_refresh'	=> array(
					'copyright-text'		=> array(
						'selector'			=> '.pbmit-footer-copyright-text',
						'render_callback'	=> function() {
							return get_theme_mod('copyright-text');
						},
					)
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),

			array(
				'type'			=> 'select',
				'settings'		=> 'footer-copyright-right-content',
				'label'			=> esc_attr__( 'Footer Right Area', 'xcare' ),
				'description'	=> esc_attr__( 'What you like to show at right side or copyright text', 'xcare' ),
				'default'		=> 'menu',
				'choices'		=> array(
					'social'		=> esc_attr__( 'Show Social Links', 'xcare' ),
					'menu'			=> esc_attr__( 'Show Footer Menu', 'xcare' ),
					'none'			=> esc_attr__( 'None', 'xcare' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),	
			),
		)
	),

	// Social Links Options
	'social_links_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Social Links Options', 'xcare' ),
			'description'	=> esc_attr__( 'You can use [pbmit-social-links] shortcode for social list with icon.', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => $social_options_array
	),
	// Blog Settings
	'blog_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Blog Options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Settings for Blogroll, Category, Tag, Archives etc section.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'radio',
				'settings'		=> 'blogroll-view-select',
				'label'			=> esc_html__( 'Select Blogroll view', 'xcare' ),
				'default'		=> 'classic',
				'choices'	 	=> [
					'classic'   	=> esc_html__( 'Classic View', 'xcare' ),
					'grid' 			=> esc_html__( 'Grid View', 'xcare' ),
				],
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-view',
				'label'			=> esc_html__( 'Blogroll view', 'xcare' ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('blog', 'customizer'),
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view-select',
						'operator'		=> '==',
						'value'			=> 'grid',
					)
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-column',
				'label'			=> esc_html__( 'Blogroll column', 'xcare' ),
				'default'		=> '2',
				'choices'		=> $column_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view-select',
						'operator'		=> '==',
						'value'			=> 'grid',
					)
				),
			),
			array(
			'type'			=> 'switch',
			'settings'		=> 'blog-show-related',
			'label'			=> esc_attr__( 'Show Related Post?', 'xcare' ),
			'default'		=> '0',
			'choices'	 => array(
				'on'  => esc_attr__( 'Yes', 'xcare' ),
				'off' => esc_attr__( 'No', 'xcare' ),
			),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'blog-related-title',
				'label'			=> esc_attr__( 'Related Post Section Title', 'xcare' ), 
				'description'	=> esc_attr__( 'Related Area Title', 'xcare' ),
				'default'		=> esc_attr__( 'Related Post', 'xcare' ),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-related-count',
				'label'			=> esc_attr__( 'How many post you like to show', 'xcare' ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-column',
				'label'			=>  esc_html__('Related Post Column', 'xcare' ),
				'default'		=> '2',
				'choices'	 => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-style',
				'label'			=> esc_html__( 'Related Post View', 'xcare' ),
				'default'		=> '1',
				'choices'	 => $blog_styles,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-classic-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Classic Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Classic view.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-classic-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Classic view?', 'xcare' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-classic-limit',
				'label'			=> esc_attr__( 'Set Word Limit for Blog Classic view', 'xcare' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link. This is useful if you didn\'t added Read More link in posts.', 'xcare' ),
				'default'		=> 30,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-classic-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-element-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Style Elements (boxes) Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Style Elements.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-element-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Element view?', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-element-limit',
				'label'			=> esc_attr__( 'Limit Words for Blog Element view', 'xcare' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link.', 'xcare' ),
				'default'		=> 15,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-element-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-sidebar-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Select sidebar position Page and Blog section.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-post',
				'label'		=> esc_html__( 'Blog Sidebar', 'xcare' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Portfolio Settings
	'portfolio_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xcare' ) , $portfolio_cpt_singular_title ) ,
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xcare' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Options for Single %1$s Section', 'xcare' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'portfolio-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $portfolio_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-detailsbox-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Details Box Options', 'xcare' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . esc_attr__( 'Details Box Settings', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-details-title',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box Title', 'xcare' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Details Box Title', 'xcare' ),
				'default'		=> esc_attr__( 'Project info', 'xcare' ),
			),
			array(
				'type'			=> 'repeater',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box', 'xcare' ), $portfolio_cpt_singular_title ),
				'row_label'		=> array(
					'type'			=> 'field',
					'value'			=> esc_attr__('Line', 'xcare' ),
					'field'			=> 'line_title',
				),
				'button_label'	=> esc_attr__('Add New Line', 'xcare' ),
				'settings'		=> 'portfolio-details',
				'fields'		=> array(
					'line_title'	=> array(
						'type'			=> 'text',
						'label'			=> esc_attr__( 'Line Title', 'xcare' ),
						'description'	=> esc_attr__( 'This will be the label for the line', 'xcare' ),
						'default'		=> '',
					),
					'line_type'		=> array(
						'type'			=> 'select',
						'label'			=> esc_attr__( 'Line Type', 'xcare' ),
						'description'	=> esc_attr__( 'This will be type for the line', 'xcare' ),
						'default'		=> 'text',
						'choices'		=> array(
							'text'			=> esc_attr__( 'Normal Text', 'xcare' ),
							'category'		=> esc_attr__( 'Category List (without link)', 'xcare' ),
							'category-link'	=> esc_attr__( 'Category List (with link)', 'xcare' ),
						)
					),
				),
				'default'		=> array(
					array(
						'line_title'	=> esc_attr__('Client', 'xcare'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Tag', 'xcare'),
						'line_type'		=> 'category-link',
					),
					array(
						'line_title'	=> esc_attr__('Category', 'xcare'),
						'line_type'		=> 'text',
					),								
					array(
						'line_title'	=> esc_attr__('Date', 'xcare'),
						'line_type'		=> 'text',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-related-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Related %1$s Options', 'xcare' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_html__( 'Options for Related %1$s', 'xcare' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'portfolio-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s?', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-related-title',
				'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'xcare' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Related Area Title', 'xcare' ),
				'default'		=> sprintf( esc_attr__( 'Related %1$s', 'xcare' ), $portfolio_cpt_singular_title ),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('portfolio', 'customizer'),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-cat-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xcare' ), $portfolio_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xcare' ) , $portfolio_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xcare' ), $portfolio_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('portfolio', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xcare' ), $portfolio_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xcare' ), $portfolio_cpt_singular_title, $portfolio_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xcare' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $portfolio_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $portfolio_cat_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'portfolio-advanced-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xcare' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xcare' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xcare' ),
				'default'		=> esc_attr__( 'Portfolio', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xcare' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Portfolio', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xcare' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'portfolio' ),
				'priority'		=> 10,
			),
			// Portfolio Category
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xcare' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xcare' ),
				'default'		=> esc_attr__( 'Portfolio Categories', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xcare' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Portfolio Category', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xcare' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug', 'xcare' ),
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'priority'		=> 10,
			),
		)
	),
	// Service Settings
	'service_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xcare' ) , $service_cpt_singular_title ) ,
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-service-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xcare' ), $service_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xcare' ), $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'service-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xcare' ), $service_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $service_single_style_array,
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s', 'xcare' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'	 => array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
			'type'			=> 'text',
			'settings'		=> 'service-related-title',
			'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'xcare' ), $service_cpt_singular_title ),
			'description'	=> esc_attr__( 'Related Area Title', 'xcare' ),
			'default'		=> sprintf( esc_attr__( 'Related %1$s', 'xcare' ), $service_cpt_singular_title ),
			'active_callback' => array(
				array(
					'setting'	=> 'service-show-related',
					'operator'	=> '==',
					'value'		=> '1',
				),
			),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'xcare' ), $service_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'xcare' ), $service_cpt_singular_title ),
				'default'		=> '3',
				'choices'	 => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'xcare' ), $service_cpt_singular_title ),
				'default'		=> '1',
				'choices'	 => pbmit_element_template_list('service', 'customizer'),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-cat-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xcare' ), $service_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xcare' ) , $service_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xcare' ), $service_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('service', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xcare' ), $service_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xcare' ), $service_cpt_singular_title, $service_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xcare' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $service_cpt_singular_title ),
				'default'	=> 'left',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),	
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $service_cat_singular_title ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced - Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'service-advanced-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xcare' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(	
				'type'			=> 'text',
				'settings'		=> 'service-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xcare' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xcare' ),
				'default'		=> esc_attr__( 'Service', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xcare' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Service', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xcare' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service' ),
				'priority'		=> 10,
			),
			// Service Category
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xcare' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xcare' ),
				'default'		=> esc_attr__( 'Service Categories', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xcare' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Service Category', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xcare' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service-category' ),
				'priority'		=> 10,
			),
		)
	),
	// Team Member Settings
	'team_options' => array(
			'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xcare' ) , $team_cpt_singular_title ) ,
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-team-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xcare' ), $team_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xcare' ), $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'team-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xcare' ), $team_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $team_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-group-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xcare' ), $team_group_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xcare' ) , $team_group_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xcare' ), $team_group_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('team', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xcare' ), $team_group_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'team-group-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xcare' ), $team_cpt_singular_title, $team_group_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-member-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xcare' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-member',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $team_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-group',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xcare' ), $team_group_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'team_advanced_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xcare' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xcare' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xcare' ),
				'default'		=> esc_attr__( 'Team Members', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xcare' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Team Member', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xcare' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team' ),
				'priority'		=> 10,
			),
			// Team Member group
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xcare' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xcare' ),
				'default'		=> esc_attr__( 'Team Groups', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xcare' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Team Group', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xcare' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xcare' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xcare' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xcare' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team-group' ),
				'priority'		=> 10,
			),
		)
	),
	// Testimonial Settings
	'testimonial_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xcare' ) , $testimonial_cpt_singular_title ) ,
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'testimonial_advanced_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xcare' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xcare' ) , $testimonial_cpt_singular_title ) . '</span></div>',
			),

			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xcare' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xcare' ),
				'default'		=> esc_attr__( 'Testimonials', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xcare' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Testimonial', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xcare' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xcare' ),
				'default'		=> esc_attr__( 'Testimonial Categories', 'xcare' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xcare' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xcare' ),
				'default'		=> esc_attr__( 'Testimonial Category', 'xcare' ),
				'priority'		=> 10,
			),
		)
	),
	// Search Settings
	'search_results_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Search Results options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'search_results_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Search Results Settings', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Settings for Search Results page', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'no-results-title',
				'label'			=> esc_attr__( 'Title for "No Search Results" page', 'xcare' ),
				'description'	=> esc_attr__( 'Title to show when there is no search results', 'xcare' ),
				'default'		=> esc_attr__( 'No Results Found', 'xcare' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'no-results-text',
				'label'			=> esc_attr__( 'Text for "No Search Results" page', 'xcare' ),
				'description'	=> esc_attr__( 'Text to show when there is no search results', 'xcare' ),
				'default'		=> esc_attr__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','xcare'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'search-sidebar-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for search results page.', 'xcare' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-search',
				'label'		=> esc_html__( 'Search Results Sidebar', 'xcare' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Error 404 Settings
	'error_404_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Error 404 options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Settings', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Settings for error 404 page', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'error-404-heading',
				'label'			=> esc_attr__( 'Error 404 Heading', 'xcare' ),
				'description'	=> esc_attr__( 'This is heading for 404 page', 'xcare' ),
				'default'		=> esc_attr__( '404', 'xcare' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'error-404-text',
				'label'			=> esc_attr__( 'Error 404 Text', 'xcare' ),
				'description'	=> esc_attr__( 'This is text for 404 page', 'xcare' ),
				'default'		=> esc_attr__( 'Whoops! Whatever you are looking for cannot be found.', 'xcare' ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'error-404-show-search',
				'label'			=> esc_attr__( 'Show search form on 404 page', 'xcare' ),
				'default'		=> '1',
				'priority'		=> 10,
				'choices'		=> array(
					'on'			=> esc_attr__( 'Yes', 'xcare' ),
					'off'			=> esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_text_custom',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Text Color', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Settings for text color for 404 error page', 'xcare' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-text-color',
				'label'				=> esc_attr__( 'Select 404 page text color', 'xcare' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_2_list,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_bg_custom',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Background Option', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Settings for background color/image for 404 error page', 'xcare' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-bgcolor',
				'label'				=> esc_html__( 'Select 404 page background color', 'xcare' ),
				'default'			=> 'custom',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'e404-background',
				'label'			=> esc_attr__( 'Background', 'xcare' ),
				'description'	=> esc_attr__( 'Background Settings', 'xcare' ),
				'default'		=> array(				
					'background-color'	  => 'rgba(0,0,0,0.37)',
					'background-repeat'	 => 'no-repeat',
					'background-position'   => 'center center',
					'background-size'	   => 'cover',
					'background-attachment' => 'scroll',
				),
				'pbmit-output'	=> '.error404 .site-content-wrap, .error404 .pbmit-bg-color-custom > .site-content-wrap:before',
			),
		)
	),
	// Login Page Settings
	'login_page_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Login Page options', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'login_page_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Login Page Settings', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Settings for Login Page page', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'custom-login-logo',
				'label'			=> esc_attr__( 'Show different logo?', 'xcare' ),
				'description'	=> esc_attr__( 'Show different logo then the default logo you selected for your site.', 'xcare' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xcare' ),
					'off' => esc_attr__( 'No', 'xcare' ),
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'login-logo',
				'label'				=> esc_attr__( 'Login Page Custom Logo', 'xcare' ),
				'description'		=> esc_attr__( 'Select logo for the login page', 'xcare' ),
				'default'			=> get_template_directory_uri() . '/images/logo.svg',
				'active_callback'	=> array( array(
					'setting'			=> 'custom-login-logo',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'login-page-background',
				'label'			=> esc_attr__( 'Login Page Background', 'xcare' ),
				'description'	=> esc_attr__( 'Background Settings for the login page', 'xcare' ),
				'default'		=> array(				
					'background-color'	  => '#666666',
					'background-repeat'	 => 'no-repeat',
					'background-position'   => 'center top',
					'background-size'	   => 'cover',
					'background-attachment' => 'scroll',
				),
			),
		)
	),
	// Custom CSS/JS Options
	'custom_code_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'CSS/JS Code', 'xcare' ),
			'panel'			=> 'xcare_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'tracking_js_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Tracking Code', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Code for Google Tracking or other ', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'tracking-code',
				'label'			=> esc_attr__( 'Tracking Code', 'xcare' ),
				'description'	=> esc_attr__( 'This code will be added to HEAD element on your all pages.', 'xcare' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'cust_css_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Custom CSS Code', 'xcare' ) . '</h2> <span>' . esc_attr__( 'Custom CSS Code', 'xcare' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'css-code',
				'label'			=> esc_attr__( 'Custom CSS Code', 'xcare' ),
				'description'	=> esc_attr__( 'Add your custom CSS code here.', 'xcare' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'js-code',
				'label'			=> esc_attr__( 'Custom JS Code', 'xcare' ),
				'description'	=> esc_attr__( 'Add your custom JS code here.', 'xcare' ),
				'default'		=> '',
			),
		)
	),
);
// adding WooCommerce options
if( function_exists('is_woocommerce') ){
	$kirki_options_array2 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array2[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array2['woocommerce_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'WooCommerce Options', 'xcare' ),
					'panel'			=> 'xcare_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-shop',
						'label'		=> esc_html__( 'WooCommerce Shop Sidebar', 'xcare' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-single',
						'label'		=> esc_html__( 'WooCommerce Single Product Sidebar', 'xcare' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'text',
						'settings'	=> 'wc-title',
						'label'		=> esc_attr__( 'WooCommerce Shop Page Title', 'xcare' ),
						'description'	=> esc_attr__( 'This will appear in Titlebar on Shop page.', 'xcare' ),
						'default'	=> esc_attr('Shop'),
					),
					array(
						'type'			=> 'select',
						'settings'		=> 'wc-related-count',
						'label'			=> esc_attr__( 'How many related products will be shown?', 'xcare' ),
						'description'	=> esc_attr__( 'How many related products will be shown on single product page?', 'xcare' ),
						'default'		=> '3',
						'choices'		=> array(
							'1'		=> esc_attr__( '1 product', 'xcare' ),
							'2'		=> esc_attr__( '2 products', 'xcare' ),
							'3'		=> esc_attr__( '3 products', 'xcare' ),
							'4'		=> esc_attr__( '4 products', 'xcare' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-icon',
						'label'			=> esc_attr__( 'Show Cart Icon in Header?', 'xcare' ),
						'description'	=> esc_attr__( 'Show or hide cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'xcare' ),
						'default'		=> '1',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'xcare' ),
							'off'		=> esc_attr__( 'No', 'xcare' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-amount',
						'label'			=> esc_attr__( 'Show Amount with Cart Icon in Header?', 'xcare' ),
						'description'	=> esc_attr__( 'Show or hide cart amount with cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'xcare' ),
						'default'		=> '0',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'xcare' ),
							'off'		=> esc_attr__( 'No', 'xcare' ),
						),
						'active_callback' => array( array(
							'setting'		=> 'wc-show-cart-icon',
							'operator'		=> '==',
							'value'			=> '1',
						) ),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array2;
}

// adding Event options
if( class_exists('WP_Event_Manager') ){
	$kirki_options_array3 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array3[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array3['event_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'Event Options', 'xcare' ),
					'panel'			=> 'xcare_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'			=> 'custom',
						'settings'		=> 'custom-event-column-options',
						'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Column Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Select column for the Event listing.', 'xcare' ) . '</span></div>',
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'event-column',
						'label'		=> esc_html__( 'Event Column', 'xcare' ),
						'description'	=> esc_html__( 'Select column structure for Event', 'xcare' ),
						'default'	=> '3-3-3-3',
						'choices'		=> array(
							'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
							'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
							'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
							'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
						),
					),

					// Heading Options
					array(
						'type'			=> 'custom',
						'settings'		=> 'custom-event-sidebar-options',
						'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xcare' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for Event section.', 'xcare' ) . '</span></div>',
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-event',
						'label'		=> esc_html__( 'Event Sidebar', 'xcare' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-event-single',
						'label'		=> esc_html__( 'Event Single Sidebar', 'xcare' ),
						'default'	=> 'no',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array3;
}