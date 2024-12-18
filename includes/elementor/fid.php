<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_FIDElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_fid_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Facts-in-Digits Element', 'xcare' );
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'jquery-waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
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
				'label'			=> esc_attr__( 'Select FID View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select FID View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '100px',
				'default'		=> '1',
				'prefix'		=> 'pbmit-fid pbmit-fid-style-',
				'options'		=> pbmit_element_template_list( 'facts-in-digits', true ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon',
			[
				'label'		=> esc_attr__( 'Icon', 'xcare' ),
				'type'		=> \Elementor\Controls_Manager::ICONS,
				'default'	=> [
					'value'		=> 'fas fa-check-circle',
					'library'	=> 'fa-solid',
				],
				'condition'		=> [
					'style'		=> ['5'],
				]
				
			]
		);
		$this->add_control(
			'title',
			[
				'label'			=> esc_attr__( 'Title', 'xcare' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> esc_attr__( 'Happy Customers', 'xcare' ),
				'placeholder'	=> esc_attr__( 'Enter your heading', 'xcare' ),
				'label_block'	=> true,
				'condition'		=> [
					'style!'		=> ['2','3'],
				]
			]
		);
		$this->add_control(
			'desc',
			[
				'label'			=> esc_attr__( 'Description', 'xcare' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> esc_attr__( 'Sed risus augue commodo ornare felis non eleifend.', 'xcare' ),
				'placeholder'	=> esc_attr__( 'Type your description here', 'xcare' ),
				'condition'		=> [
					'style!'		=> ['4','5','6','7','8'],
				]
			]
		);

		$this->add_control(
			'digit',
			[
				'label'			=> esc_attr__( 'Rotating Digit', 'xcare' ),
				'description'	=> esc_attr__( 'Enter rotating number digit here.', 'xcare' ),
				'separator'		=> 'before',
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> '85',
			]
		);

		$this->add_control(
			'interval',
			[
				'label'			=> esc_attr__( 'Rotating digit Interval', 'xcare' ),
				'description'	=> esc_attr__( 'Enter rotating interval number here.', 'xcare' ),
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number (Prefix)', 'xcare' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers. Example "$"', 'xcare' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'xcare' ),
				'description' => esc_attr__('Select text style for the text.', 'xcare') . '<br>' . esc_attr__('Superscript Example:','xcare') . pbmit_esc_kses('<sup>$</sup>85')  . '<br>' . esc_attr__('Subscript Example:','xcare') . pbmit_esc_kses('<sub>$</sub>85'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'xcare' ),
					'sub'		=> esc_attr__( 'Subscript', 'xcare' ),
					'span'		=> esc_attr__( 'Normal', 'xcare' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number (Suffix)', 'xcare' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '%',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'xcare' ),
				'description' => esc_attr__('Select text style for the text.', 'xcare') . '<br>' . esc_attr__('Superscript Example:','xcare') . pbmit_esc_kses('85<sup>$</sup>')  . '<br>' . esc_attr__('Subscript Example:','xcare') . pbmit_esc_kses('85<sub>$</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'xcare' ),
					'sub'		=> esc_attr__( 'Subscript', 'xcare' ),
					'span'		=> esc_attr__( 'Normal', 'xcare' ),
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$return =   $icon = '';
		$global_color		= '#ff00ff';
		$secondary_color	= '#f0ff0f';
		$light_bg_color		= '#ff00ff';
		$blackish_color		= '#000000';
		$white_color		= '#ffffff';
		$desc_html		  = '';

		if( function_exists('pbmit_get_base_option') ){
			// Global Color
			$global_color = pbmit_get_base_option('global-color');

			// Secondary Color
			$secondary_color = pbmit_get_base_option('secondary-color');

			// Light Background Color
			$light_bg_color = pbmit_get_base_option('light-bg-color');

			// Blackish Color
			$blackish_color = pbmit_get_base_option('blackish-color');

			// Secondary Color
			$gradient_color = pbmit_get_base_option('gradient-color');
			$gradient1 = ( !empty($gradient_color['first']) ) ? $gradient_color['first'] : '#ff00ff' ;
			$gradient2 = ( !empty($gradient_color['last'])  ) ? $gradient_color['last']  : '#ff0000' ;

		}
		// Description text
		if( !empty($settings['desc']) ){
			$desc_html = '<div class="pbmit-heading-desc">'.pbmit_esc_kses($settings['desc']).'</div>';
		}

		if( !empty($settings['icon']['value']) ){
			if($settings['icon']['library']=='svg'){
				ob_start();
				Icons_Manager::render_icon( $settings['icon'] , [ 'aria-hidden' => 'true' ] );
				$icon = ob_get_contents();
				ob_end_clean();

				$icon	   = '<div class="pbmit-fid-svg"><div class="pbmit-fid-svg-wrapper">' . $icon . '</div></div>';
				$icon_type_class = 'icon';
			} else {
				ob_start();
				Icons_Manager::render_icon( $settings['icon'] , [ 'aria-hidden' => 'true' ] );
				$icon_code = ob_get_contents();
				ob_end_clean();
				
				$icon = '<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">' . pbmit_esc_kses( $icon_code ) . '</div>';
			}
		} 

		//  Before or after text
		$before_text = '';
		$after_text  = '';
		if( !empty($before) && !empty($beforetextstyle) && in_array( $beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$before_text = '<'. esc_attr($beforetextstyle).'>'.esc_html($before).'</'.esc_attr($beforetextstyle).'>';
		}
		if( !empty($after) && !empty($aftertextstyle) && in_array( $aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$after_text = '<'. esc_attr($aftertextstyle).'>'.esc_html($after).'</'.esc_attr($aftertextstyle).'>';
		}

		if( file_exists( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) ) ){

			$return .= '<div class="pbminfotech-ele pbminfotech-ele-fid pbminfotech-ele-fid-style-'.esc_attr($style).'">';

			ob_start();
			include( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

			$return .= '</div>';

		}

		echo pbmit_esc_kses($return);

	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_FIDElement() );
