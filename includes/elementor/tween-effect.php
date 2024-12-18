<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading
 */
class PBMIT_TweenEffect extends Widget_Base{

// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
public function get_name() {
	return 'pbmit_tween_effect_element';
}

// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
public function get_title() {
	return esc_attr__( 'Xcare Tween Effect', 'xcare' );
}

// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
public function get_icon() {
	return 'fas fa-magic';
}

// The get_categories method, lets you set the category of the widget, return the category name as a string.
public function get_categories() {
	return [ 'xcare_category' ];
}

public function __construct($data = [], $args = null) {
	parent::__construct($data, $args);
}

protected function register_controls() {

	// Style
	$this->start_controls_section(
		'select_style_section',
		[
			'label' => esc_attr__( 'Select Style', 'xcare' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		]
	);
	$this->add_control(
		'style',
		[
			'label'			=> esc_attr__( 'Select Tween Effect View Style', 'xcare' ),
			'description'	=> esc_attr__( 'Select Tween Effect View style.', 'xcare' ),
			'type'			=> 'pbmit_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> '1',
			'prefix'		=> 'pbmit-ihbox pbmit-ihbox-style-',
			'options'		=> pbmit_element_template_list( 'tween-effect', true ),
		]
	);
	$this->end_controls_section();

	//Content Service box
	$this->start_controls_section(
		'content_section',
		[
			'label'		=> esc_attr__( 'Tween Effect Content', 'xcare' ),
			'tab'		=> Controls_Manager::TAB_CONTENT,
		]
	);
	$this->add_control(
		'icon_type',
		[
			'label'		=> esc_attr__( 'Select Tween Animated Type', 'xcare' ),
			'type'		=> Controls_Manager::SELECT,
			'options'	=> [
				'image'	=> esc_attr__( 'Image', 'xcare' ),
				'text'	=> esc_attr__( 'Text', 'xcare' ),
			],
			'default'	=> esc_attr( 'image' ),
		]
	);

	$this->add_control(
		'icon_image',
		[
			'label' 	  => esc_attr__( 'Select Image for Tween Effect', 'xcare' ),
			'description' => esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'xcare' ),
			'type'		  => \Elementor\Controls_Manager::MEDIA,
			'default' 	  => [
				'url'		=> get_template_directory_uri() . '/images/static-box.jpg',
			],
			'condition'		=> [
				'icon_type'	=> 'image',
			]
		]
	);
	$this->add_group_control(
		\Elementor\Group_Control_Image_Size::get_type(),
		[
			'name'		=> 'thumbnail',
			'default'	=> 'full',
			'separator'	=> 'none',
			'condition'	=> [
				'icon_type' => 'image',
			]
		]
	);

	$this->add_control(
		'title',
		[
			'label'   => esc_attr__( 'Enter Tween Title', 'xcare' ),
			'type'	=> Controls_Manager::TEXTAREA,
			'dynamic' => [
				'active' => true,
			],
			'default'	  => esc_attr__( 'Tween Effect Animation', 'xcare' ),
			'placeholder' => esc_attr__( 'Enter your title', 'xcare' ),
			'label_block' => true,
			'condition'   => [
				'icon_type' => 'text',
			]
		]
	);
	$this->add_control(
		'start_x_value',
		[
			'label'   => esc_attr__( 'Starting X position', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '100' ),

 		]
	);
	$this->add_control(
		'end_x_value',
		[
			'label'   => esc_attr__( 'Ending X position', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '-50' ),
		]
	);
	$this->add_control(
		'start_y_value',
		[
			'label'   => esc_attr__( 'Starting Y position', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '10' ),
			'rows' 	  => 2,
 		]
	);
	$this->add_control(
		'end_y_value',
		[
			'label'   => esc_attr__( 'Ending Y position', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'seprator1',
		[
			'type' => \Elementor\Controls_Manager::DIVIDER,
		]
	);

	$this->add_control(
		'start_scale_x_value',
		[
			'label'   => esc_attr__( 'Startinng X Scale', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '1' ),
		]
	);
	$this->add_control(
		'end_scale_x_value',
		[
			'label'   => esc_attr__( 'Endinng X Scale', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '1' ),
		]
	);

	$this->add_control(
		'seprator2',
		[
			'type' => \Elementor\Controls_Manager::DIVIDER,
		]
	);

	$this->add_control(
		'start_skew_x_value',
		[
			'label'   => esc_attr__( 'Startinng X Skew', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'end_skew_x_value',
		[
			'label'   => esc_attr__( 'Endinng X Skew', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'start_skew_y_value',
		[
			'label'   => esc_attr__( 'Startinng Y Skew', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'end_skew_y_value',
		[
			'label'   => esc_attr__( 'Endinng Y Skew', 'xcare' ),
			'type'	=> Controls_Manager::NUMBER,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'seprator3',
		[
			'type' => \Elementor\Controls_Manager::DIVIDER,
		]
	);
	$this->add_control(
		'start_rotate_x_value',
		[
			'label'   => esc_attr__( 'Startinng X Rotation', 'xcare' ),
			'type'	=> Controls_Manager::TEXT,
			'default' => esc_attr( '0' ),
		]
	);
	$this->add_control(
		'end_rotate_x_value',
		[
			'label'   => esc_attr__( 'Endinng X Rotation', 'xcare' ),
			'type'	=> Controls_Manager::TEXT,
			'default' => esc_attr( '-4' ),
		]
	);

	$this->add_control(
		'seprator4',
		[
			'type' => \Elementor\Controls_Manager::DIVIDER,
		]
	);

	$this->end_controls_section();

	// HTML Tags
	$this->start_controls_section(
		'advanced_section',
		[
			'label' => pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag & Gap Settings', 'xcare' ),
			'tab'   => Controls_Manager::TAB_ADVANCED,
		]
	);

	// Tags
	$this->add_control(
		'tag_options',
		[
			'label'		=> esc_attr__( 'Tags for SEO', 'xcare' ),
			'type'		=> Controls_Manager::HEADING,
			'separator'	=> 'before',
		]
	);
	$this->add_control(
		'title_tag',
		[
			'label'   => esc_attr__( 'Heading Tag', 'xcare' ),
			'type'	=> Controls_Manager::SELECT,
			'options' => [
				'h1'	=> esc_attr( 'H1' ),
				'h2'	=> esc_attr( 'H2' ),
				'h3'	=> esc_attr( 'H3' ),
				'h4'	=> esc_attr( 'H4' ),
				'h5'	=> esc_attr( 'H5' ),
				'h6'	=> esc_attr( 'H6' ),
				'div'	=> esc_attr( 'DIV' ),
			],
			'default' => esc_attr( 'h3' ),
		]
	);
	$this->end_controls_section();
}

protected function render() {

	$settings = $this->get_settings_for_display();
	extract($settings);

	$title_html =  $image_html = '';

	if( file_exists( locate_template( '/theme-parts/tween-effect/tween-effect-style-'.esc_attr($style).'.php', false, false ) ) ){
		//image
		if( $settings['icon_type']=='image' ){
			$icon_alt		 = (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Tween-img', 'xcare') ;
			$image_html = pbmit_esc_kses( Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_image' ) );
		}
		// Title
		if( !empty($settings['title']) ) {
			$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h3' ;
			$title_html	= '<'. pbmit_esc_kses($title_tag) . ' class="pbmit-element-title">'.pbmit_esc_kses($settings['title']).'</'. pbmit_esc_kses($title_tag).'>';
		}

		echo '<div class="pbmit-tween-efect pbmit-tween-effect-style-'.esc_attr($style).'">';
			include( locate_template( '/theme-parts/tween-effect/tween-effect-style-'.esc_attr($style).'.php', false, false ) );
		echo '</div>';
	}
}

protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_TweenEffect() );