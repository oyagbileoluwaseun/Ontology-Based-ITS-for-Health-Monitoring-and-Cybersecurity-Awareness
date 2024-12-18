<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_StaticBoxElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_static_box_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Static Box Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-boxes';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
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
				'label'			=> esc_attr__( 'Select StaticBox View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select StaticBox View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'static-box', true ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label'		=> esc_attr__( 'Choose Image', 'xcare' ),
				'type'		=> Controls_Manager::MEDIA,
				'dynamic'	=> [
					'active'	=> true,
				],
				'default'	=> [
					'url'	=> get_template_directory_uri() . '/images/static-box.jpg',
				],
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' 	=> esc_attr__( 'Icon', 'xcare' ),
				'type' 		=> \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'box-number',
			[
				'label'			=> esc_attr__( 'Box Number', 'xcare' ),
				'description'	=> esc_attr__( '(Optional) Add box number like "01". This will be shown as steps.', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,				
				'default'		=> '0',
				'placeholder'	=> esc_attr__( 'Enter number', 'xcare' ),
				'label_block'	=> true,

			]
		);
		$repeater->add_control(
			'label',
			[
				'label' 	  => esc_attr__( 'Box Title', 'xcare' ),
				'type' 		  => Controls_Manager::TEXT,
				'default' 	  => esc_attr__( 'Box Title', 'xcare' ),
				'placeholder' => esc_attr__( 'Box Title', 'xcare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'smalltext',
			[
				'label' 	  => esc_attr__( 'Box Content', 'xcare' ),
				'default' 	  => esc_attr__( 'Box Content', 'xcare' ),
				'placeholder' => esc_attr__( 'Box Content', 'xcare' ),
				'type' 		  => Controls_Manager::TEXTAREA,
				'show_label'  => true,
			]
		);
		$repeater->add_control(
			'btn_title',
			[
				'label'			=> esc_attr__( 'Button Title', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'dynamic'		=> [
					'active'	=> true,
				],
				'default'		=> esc_attr__( 'Learn More', 'xcare' ),
				'separator'		=> 'before',
				'placeholder'	=> esc_attr__( 'Enter button title here', 'xcare' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' 		=> esc_attr__( 'Button Link', 'xcare' ),
				'type' 			=> Controls_Manager::URL,
				'label_block' 	=> true,
				'default'		=> array (
					'url'				=> '#',
					'is_external'		=> '',
					'nofollow'			=> '',
					'custom_attributes'	=> '',
				),
			]
		);

		$this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Each Static Box Content', 'xcare' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'box-number'=>esc_attr__( '01', 'xcare' ),
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'label'		=> esc_attr__( 'Infection Prevention', 'xcare' ),
						'smalltext'	=> esc_attr__( 'There are many variations of passages of Lorem Ipsum available.', 'xcare' ),
					],
					[
						'box-number'=>esc_attr__( '02', 'xcare' ),
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'label'		=> esc_attr__( 'Individual Approach', 'xcare' ),
						'smalltext'	=> esc_attr__( 'There are many variations of passages of Lorem Ipsum available.', 'xcare' ),
					],
					[
						'box-number'=>esc_attr__( '03', 'xcare' ),
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'label'		=> esc_attr__( 'Personalized Treatment', 'xcare' ),
						'smalltext'	=> esc_attr__( 'There are many variations of passages of Lorem Ipsum available.', 'xcare' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' 		=> esc_attr__( 'Column and Carousel Options', 'xcare' ),
				'tab'   		=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'style!' => ['1']
				],
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
				],
				'condition' 	=> [
					'style!' => ['1']
				],
			]
		);

		// Row Column: Heading
		$this->add_control(
			'row_col_options',
			[
				'label' 	=> esc_attr__( 'Row-Column Options', 'xcare' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'row-column',
					'style!' => ['1']
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' 	=> esc_attr__( 'Carousel Options', 'xcare' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
					'style!' => ['1']
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
					'style!' => ['1']
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
					'style!' => ['1']
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
					'style!' => ['1']
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
					'above'			=> esc_attr__( 'Yes, near heading area', 'xcare' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
					'style!' => ['1']
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
					'style!' => ['1']
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
					'style!' => ['1']
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
				'condition'		=> [
					'style!' => ['1']
				]
			]
		);

		$this->end_controls_section();

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'title',
			[
				'label'	  => esc_attr__( 'Heading', 'xcare' ),
				'type' 	  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' 	  => esc_attr__( 'Welcome to our site', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter your heading', 'xcare' ),
				'label_block' => true,
			]
			);
		$this->add_control(
			'title_link',
			[
				'label' 	  => esc_attr__( 'Heading Link', 'xcare' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'   => esc_attr__( 'Subheading', 'xcare' ),
				'type' 	  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter your subtitle', 'xcare' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' 	  => esc_attr__( 'Subheading Link', 'xcare' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' 	  => esc_attr__( 'Description', 'xcare' ),
				'type' 		  => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description here', 'xcare' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label' 		=> esc_attr__( 'Reverse Heading', 'xcare' ),
				'description' 	=> esc_attr__( 'Show Subheading before Heading', 'xcare' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_attr__( 'Yes', 'xcare' ),
				'label_off' 	=> esc_attr__( 'No', 'xcare' ),
				'return_value' 	=> 'yes',
				'default' 		=> '',
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' 	=> esc_attr__( 'Alignment', 'xcare' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left'  => [
						'title' => esc_attr__( 'Left', 'xcare' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'xcare' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'xcare' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'pbmit-ele-header-align-',
				'selectors' => [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->end_controls_section();

		// HTML Tags
		$this->start_controls_section(
			'advanced_section',
			[
				'label' => pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag Settings', 'xcare' ),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			]
		);
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
				'label'   => esc_attr__( 'Heading Tag', 'xcare' ),
				'type' 	  => Controls_Manager::SELECT,
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
				'label'   => esc_attr__( 'Subheading Tag', 'xcare' ),
				'type' 	  => Controls_Manager::SELECT,
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

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		?>

		<?php
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );
		?>
		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>
		</div>

		<div class="pbmit-element-posts-wrapper <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?> row multi-columns-row">
				<?php
				$return = '';

					foreach( $settings['boxes'] as $box ){
						$image_html	= $label_html = $button_html = $box_number_html = '' ;
						$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="pbminfotech-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
						$label_html		= ( !empty($box['label']) ) ? '<div class="pbminfotech-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
						$box_number_html	= ( !empty($box['box-number']) ) ? '<div class="pbminfotech-static-box-number">'.esc_html($box['box-number']).'</div>' : '' ;
						$image_html	= ( !empty($box['image']['url']) ) ? '<img src="'.esc_url($box['image']['url']).'" alt="'.esc_attr($box['label']).'" />' : '' ;

						//icon
						if( !empty($box['icon']['value']) ){
							if($box['icon']['library']=='svg'){
								ob_start();
								Icons_Manager::render_icon( $box['icon'] , [ 'aria-hidden' => 'true' ] );
								$icon_html = ob_get_contents();
								ob_end_clean();
								$icon_html	   = '<div class="pbmit-static-box-svg">' . $icon_html . '</div>';
								$icon_type_class = 'icon';
							} else {
								ob_start();
								Icons_Manager::render_icon( $box['icon'] , [ 'aria-hidden' => 'true' ] );
								$icon_html_code = ob_get_contents();
								ob_end_clean();
								$icon_html = '<div class="pbmit-ihbox-icon">' . pbmit_esc_kses( $icon_html_code ) . '</div>';
								$icon_type_class = 'icon';
								wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
							}
						}

						// Button Arrow
						if( !empty($box['btn_title']) && !empty($box['btn_link']['url']) ){
							$button_html = '<div class="pbmit-btn">' . pbmit_link_render($box['btn_link'], 'start' ) . pbmit_esc_kses($box['btn_title']) . pbmit_link_render($box['btn_link'], 'end' ) . '</div>';
						}

						// Template
						if( file_exists( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) ) ){

							$return .= pbmit_element_block_container( array(
								'position'	=> 'start',
								'column'	=> $columns,
								'cpt'		=> 'static-box',
								'style'		=> $style

							) );

							ob_start();
							include( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) );
							$return .= ob_get_contents();
							ob_end_clean();

							$return .= pbmit_element_block_container( array(
								'position'	=> 'end',
							) );

						}

					} // foreach

				echo pbmit_esc_kses($return);
				?>

		 </div>

		<?php

		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );
		?>
		
		<?php
	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_StaticBoxElement() );