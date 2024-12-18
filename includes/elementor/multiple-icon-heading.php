<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_MultipleIconHeading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_multiple_icon_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Multiple Icon Heading Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-grip-horizontal';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			wp_enqueue_script( 'swiper' );
			wp_enqueue_style( 'swiper' );
		}
	}

	protected function register_controls() {

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Icon Heading View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Icon Heading View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'prefix'		=> 'pbmit-ihbox pbmit-ihbox-style-',
				'options'		=> pbmit_element_template_list( 'icon-heading', true ),
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'xcare' ),
					'image'	=> esc_attr__( 'Image', 'xcare' ),
					'text'	=> esc_attr__( 'Text', 'xcare' ),
					'none'	=> esc_attr__( 'None', 'xcare' ),
				],
				'default' => esc_attr( 'icon' ),
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_attr__( 'Icon', 'xcare' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'pbmit-xcare-icon pbmit-xcare-icon-copywriting',
					'library' => 'pbmit-xcare-icon',
				],
				'condition' => [
					'icon_type' => 'icon',
				]
			]

		);
		$repeater->add_control(
			'icon_link',
			[
				'label' 	  => esc_attr__( 'Select Icon link for Style 3 Only', 'xcare' ),				
				'description' => esc_attr__( 'Set Icon link for Style 3 Only', 'xcare' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
				'condition'	  =>[
					'icon_type' => 'icon',
				],
			]
		);
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_attr__( 'Select Image for Icon', 'xcare' ),
				'description' => esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'xcare' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_type' => 'image',
				]
			]
		);
		$repeater->add_control(
			'icon_image2',
			[
				'label'			=> esc_attr__( 'Select Image for Style 3 and 18 Only', 'xcare' ),
				'description' 	=> esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file. ', 'xcare' ),
				'type'			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> get_template_directory_uri() . '/images/icon-img.png',
				],
				'condition'		=> [
					'icon_type'		=> 'icon',
				],
			]
		);
		$repeater->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'xcare' ),
				'description' => esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter text here', 'xcare' ),
				'label_block' => true,
				'condition' => [
					'icon_type' => 'text',
				]
			]
		);
		$repeater->add_control(
			'box_number',
			[
				'label' => esc_attr__( 'Box Number', 'xcare' ),
				'description' => esc_attr__( '(Optional) Add box number like "01". This will be shown as steps.', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '01',
				'placeholder' => esc_attr__( 'Enter number', 'xcare' ),
				'label_block' => true,
				'condition' => [
					'icon_type' => ['image','icon'],
				]
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => esc_attr__( 'Heading', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter your heading', 'xcare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label' => esc_attr__( 'Heading Link', 'xcare' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subheading', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter your subtitle', 'xcare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subheading Link', 'xcare' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,				
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder'	=> esc_attr__( 'Type your description here', 'xcare' ),
				'default'		=> esc_attr__( 'Our yoga trainers will build your perfect body workout ever and physique professionals.', 'xcare' ),
			]
		);

		$repeater->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Read More', 'xcare' ),
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title here', 'xcare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'xcare' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		// Tags
		$repeater->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'xcare' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$repeater->add_control(
			'title_tag',
			[
				'label' => esc_attr__( 'Heading Tag', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$repeater->add_control(
			'subtitle_tag',
			[
				'label' => esc_attr__( 'Subheading Tag', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);

		$this->add_control(
			'ihboxes',
			[
				'label'			=> esc_attr__( 'Each Icon Heading Box Content', 'xcare' ),
			   	'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ title }}}',
				'default'		=> array(
					array(
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array(
							'value'			=> 'far fa-check-circle',
							'library'		=> 'fa-regular',
						),
						'htmlbox'	=> '',
						'title'			=> esc_attr__('Welcome to our site', 'xcare'),
						'subtitle'		=> esc_attr__('This is subtitle', 'xcare'),
						'btn_title'		=> esc_attr__('Read More', 'xcare'),
						'title_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),

						'subtitle_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
					  'desc'			=> '',

					  'btn_link'		=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ),
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					),
					array(
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array(
							'value'			=> 'far fa-calendar-minus',
							'library'		=> 'fa-regular',
						),
						'htmlbox'	=> '',
						'title'			=> esc_attr__('Welcome to our site', 'xcare'),
						'subtitle'		=> esc_attr__('This is subtitle', 'xcare'),
						'btn_title'		=> esc_attr__('Read More', 'xcare'),
						'title_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),

						'subtitle_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
					  'desc'			=> '',

					  'btn_link'		=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ),
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					),
					array(
						'_id'			=> rand(100,999) . rand(100,999) . 'd' ,
						'icon'			=> array(
							'value'			=> 'far fa-calendar-check',
							'library'		=> 'fa-regular',
						),
						'htmlbox'	=> '',
						'title'			=> esc_attr__('Welcome to our site', 'xcare'),
						'subtitle'		=> esc_attr__('This is subtitle', 'xcare'),
						'btn_title'		=> esc_attr__('Read More', 'xcare'),
						'title_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						),

						'subtitle_link'	=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						),
					  'desc'			=> '',

					  'btn_link'		=> array(
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ),
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					),
				),
			]
		);
		$this->end_controls_section();

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'xcare' ),
				'condition' => [
					'style!'	=>	'19',
				]
			]
		);
		$this->add_control(
			'title_animation',
			[
				'label' 		=> esc_attr__( 'Heading Animation', 'xcare' ),
				'description'	=> esc_attr__( 'Select Heading Text Animation View style.', 'xcare' ) . ' ' . pbmit_esc_kses('<br><a target="_blank" href="' . esc_url('https://xcare-demo.pbminfotech.com/demo1/element/#heading-animations') . '">' . esc_attr__( 'See all anmiation demo here.', 'xcare' ) . '</a>' ),
				'type' 	  => Controls_Manager::SELECT,
				'options' => [
					''			=> esc_attr__( 'No animation', 'xcare' ),
					'1'			=> esc_attr__( 'Animation Style 1', 'xcare' ),
					'2'			=> esc_attr__( 'Animation Style 2', 'xcare' ),
					'3'			=> esc_attr__( 'Animation Style 3', 'xcare' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Heading', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter your heading', 'xcare' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_link',
			[
				'label' => esc_attr__( 'Heading Link', 'xcare' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subheading', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is Subheading', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter your subtitle', 'xcare' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subheading Link', 'xcare' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'xcare' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description here', 'xcare' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label' => esc_attr__( 'Reverse Heading', 'xcare' ),
				'description' => esc_attr__( 'Show Subheading before Heading', 'xcare' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'xcare' ),
				'label_off' => esc_attr__( 'No', 'xcare' ),
				'return_value' => 'yes',
				'default'		=> '',
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Alignment', 'xcare' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'	=> [
						'title' => esc_attr__( 'Left', 'xcare' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'xcare' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'xcare' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'pbmit-align-',
				'selectors' => [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'advanced_section',
			[
				'label' => pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag Settings', 'xcare' ),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			]
		);

		// HTML Tags
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'xcare' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_attr__( 'Heading Tag', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_attr__( 'Subheading Tag', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);

		$this->end_controls_section();

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Post box?', 'xcare' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);

		// Row Column: Heading
		$this->add_control(
			'row_col_options',
			[
				'label' => esc_attr__( 'Row-Column Options', 'xcare' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'row-column',
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Options', 'xcare' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);
		// Carousel : Loop
		$this->add_control(
			'carousel-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop', 'xcare' ),
				'description'	=> esc_attr__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '1',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xcare' ),
					'0'				=> esc_attr__( 'No', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Autoplay
		$this->add_control(
			'carousel-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'xcare' ),
				'description'	=> esc_attr__( 'Autoplay of carousel.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xcare' ),
					'0'				=> esc_attr__( 'No', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Center
		$this->add_control(
			'carousel-center',
			[
				'label'			=> esc_attr__( 'Carousel: Center', 'xcare' ),
				'description'	=> esc_attr__( 'Center item. Works well with even an odd number of items.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xcare' ),
					'0'				=> esc_attr__( 'No', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Nav
		$this->add_control(
			'carousel-nav',
			[
				'label'			=> esc_attr__( 'Carousel: Nav', 'xcare' ),
				'description'	=> esc_attr__( 'Show next/prev buttons.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xcare' ),
					'0'				=> esc_attr__( 'No', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Dots
		$this->add_control(
			'carousel-dots',
			[
				'label'			=> esc_attr__( 'Carousel: Dots', 'xcare' ),
				'description'	=> esc_attr__( 'Show dots navigation.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xcare' ),
					'0'				=> esc_attr__( 'No', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'xcare' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '5000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		// Columns
		$this->add_control(
			'columns',
			[
				'label'			=> esc_attr__( 'View in Column', 'xcare' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '3',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'miconheading',
			'data'		=> $settings
		) );

		?>

		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>
		</div>


		<div class="pbmit-element-posts-wrapper row multi-columns-row<?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?> swiper-container<?php } ?>">

			<?php

			foreach( $ihboxes as $box ){

				$box['style'] = $style;

				// Template
				if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){

					echo pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'miconheading',
						'taxonomy'	=> 'category',
						'style'		=> $style,
					) );

					extract($box);

					$icon_html = $htmlbox_html = $title_html = $subtitle_html = $desc_html = $nav_html = $button_html = $box_number_html = $image_html = $icon_image2 = $icon_image1 = $img_html  = $icon_link = '';

					if( !empty($box_number) ){
						$box_number_html = '<div class="pbmit-ihbox-box-number">'.esc_attr($box_number).'</div>';
					}

					if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){

						if( !empty($box['icon_type']) ){

							if( $box['icon_type']=='text' ){
								$icon_html = '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">' . $box['icon_text'] . '</div></div>';

							} else if( $box['icon_type']=='image' ){
								$icon_alt	= (!empty($box['title'])) ? trim($box['title']) : esc_attr__('Icon', 'xcare') ;
								$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
								$icon_html	= '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">' . $icon_image . '</div></div>';
							} else if( $box['icon_type']=='none' ){
								$icon_html = '';
							} else {
								if($icon['library']=='svg'){
									ob_start();
									Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
									$icon_html = ob_get_contents();
									ob_end_clean();
									$icon_html	   = '<div class="pbmit-ihbox-svg"><div class="pbmit-ihbox-svg-wrapper">' . $icon_html . '</div></div>';
									$icon_type_class = 'icon';
								} else {
									// This is real icon html code
									if(!empty($box['icon'])){
										ob_start();
										Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
										$icon_html_code = ob_get_contents();
										ob_end_clean();
					
										$icon_html	   = '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper"><div class="pbmit-icon-wrapper pbmit-icon-type-icon">' . pbmit_esc_kses( $icon_html_code ) . '</div></div></div>';
										$icon_type_class = 'icon';
									}
								}
							}
						}

					
						// image for style3
			
						if( !empty($box['icon_image2']['url']) ){
							$icon_alt	= (!empty($box['title'])) ? trim($box['title']) : esc_attr__('image', 'xcare') ;
							$image_html2 = '<img src="'.esc_url($box['icon_image2']['url']).'" alt="'.esc_attr($icon_alt).'" />';
							$image_html	= '<div class="pbmit-ihbox-wrapper"><div class="pbmit-ihbox-icon-type-image">' . $image_html2 . '</div></div>';
						}

						// Title
						if( !empty($box['title']) ) {
							$title_tag	= ( !empty($box['title_tag']) ) ? $box['title_tag'] : 'h2' ;
							$title_html	= '<'. pbmit_esc_kses($title_tag) . ' class="pbmit-element-title">
								'.pbmit_link_render($box['title_link'], 'start' ).'
									'.pbmit_esc_kses($box['title']).'
								'.pbmit_link_render($box['title_link'], 'end' ).'
								</'. pbmit_esc_kses($title_tag) . '>
							';
						}

						// SubTitle
						if( !empty($box['subtitle']) ) {
							$subtitle_tag	= ( !empty($box['subtitle_tag']) ) ? $box['subtitle_tag'] : 'h4' ;
							$subtitle_html	= '<'. pbmit_esc_kses($subtitle_tag) . ' class="pbmit-element-subtitle">
								'.pbmit_link_render($box['subtitle_link'], 'start' ).'
									'.pbmit_esc_kses($box['subtitle']).'
								'.pbmit_link_render($box['subtitle_link'], 'end' ).'
								</'. pbmit_esc_kses($subtitle_tag) . '>
							';
						}

						// Description text
						if( !empty($box['desc']) ){
							$desc_html = '<div class="pbmit-heading-desc">'.pbmit_esc_kses($box['desc']).'</div>';
						}

						// Button
						$button_link = $box['btn_link']['url'];
						if( !empty($box['btn_title']) && !empty($box['btn_link']['url']) ){
							$button_html = '<div class="pbmit-ihbox-btn">' . pbmit_link_render($box['btn_link'], 'start' ) . pbmit_esc_kses($box['btn_title']) . pbmit_link_render($box['btn_link'], 'end' ) . '</div>';
						} 
						
						if( !empty($box['icon_link']['url']) ){
							$icon_link = $box['icon_link']['url'];
						}
						?>

						<div class="pbmit-ihbox pbmit-ihbox-style-<?php echo esc_attr($style);?>">
							<?php include( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) );?> 	
						</div>

					<?php }

					echo pbmit_element_block_container( array(
						'position'	=> 'end',
					) );

				}

			} // foreach
			?>

		</div>

		<?php

		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'miconheading',
			'data'		=> $settings
		) );

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-portfolio-category', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

		 	if( $item ) {
				$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
		 	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_MultipleIconHeading() );