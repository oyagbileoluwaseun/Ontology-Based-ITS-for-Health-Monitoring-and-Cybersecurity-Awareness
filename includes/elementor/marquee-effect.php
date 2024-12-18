<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects horizontal snap slide
 */
class PBMIT_MarqueeEffectElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_marquee_effect_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Marquee Effect Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-stream';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
			wp_enqueue_script( 'swiper' );
			wp_enqueue_style( 'swiper' );
	}
	protected function register_controls() {

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Tag Style', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Tag Style View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Tag Style View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'marquee-effect', true ),
			]
		);
		$this->add_control(
			'carousel-reverse',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay reverse', 'xcare' ),
				'description'	=> esc_attr__( 'SWITCHER Yes Than reverse of carousel.', 'xcare' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_attr__( 'Yes', 'xcare' ),
				'label_off' 	=> esc_attr__( 'No', 'xcare' ),
				'return_value'  => '1',
				'default' 		=> '0',
				'condition' => [
					'style' => '',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tag_title',
			[
				'label' 	  => esc_attr__( 'Tag Title', 'xcare' ),
				'type' 		  => Controls_Manager::TEXT,
				'default' 	  => esc_attr__( 'Tag Title', 'xcare' ),
				'placeholder' => esc_attr__( 'Tag Title', 'xcare' ),
				'label_block' => true,

			]
		);
		$repeater->add_control(
			'tag_link',
			[
				'label' => esc_html__( 'Tag Link', 'xcare' ),
				'type'  => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://pbminofotech.com', 'xcare' ),
			]
		);

		$this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Add data for each Tag', 'xcare' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'tag_title'	=> esc_attr__( 'Cardiothoracic', 'xcare' ),
					],
					[
						'tag_title'	=> esc_attr__( 'Neurosurgery', 'xcare' ),
					],
					[
						'tag_title'	=> esc_attr__( 'Surgery', 'xcare' ),
					],
					[
						'tag_title'	=> esc_attr__( 'Healthcare', 'xcare' ),
					],
				],
				'title_field' => '{{{ tag_title }}}',
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
				'label' => esc_attr__( 'Title Tag', 'xcare' ),
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
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$swiper_class = '';
			$swiper_class = ' swiper-wrapper';
		//}
		?>

		<?php
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'marquee-effect',
			'data'		=> $settings
		) );
		?>

		<div class="pbmit-marquee-effect-section">		

			<div class="pbmit-marquee-container pbmit-tag-top pbmit-element-posts-wrapper swiper-container">
				<?php
				$return = '';
				foreach( $settings['boxes'] as $box ){
					$title_html =  $image_html = '' ;
					// Title
					$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
					$title_html	= '<'. pbmit_esc_kses($title_tag) . ' class="pbmit-element-title" data-text="'.pbmit_esc_kses($box['tag_title']).'">
						'.pbmit_link_render($box['tag_link'], 'start' ).'
							'.pbmit_esc_kses($box['tag_title']).'
						'.pbmit_link_render($box['tag_link'], 'end' ).'
						</'. pbmit_esc_kses($title_tag) . '>';

					// Template
					if( file_exists( locate_template( '/theme-parts/marquee-effect/marquee-effect-style-'.esc_attr($style).'.php', false, false ) ) ){

						$return .= pbmit_element_block_container( array(
							'position'	=> 'start',
							'column'	=> 'none',
							'cpt'		=> 'marquee-effect',
							'style'		=> $style) );

						ob_start();
						include( locate_template( '/theme-parts/marquee-effect/marquee-effect-style-'.esc_attr($style).'.php', false, false ) );
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
		</div>

		<?php

		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'marquee-effect',
			'data'		=> $settings
		) );
		
		?>
		<?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_MarqueeEffectElement() );