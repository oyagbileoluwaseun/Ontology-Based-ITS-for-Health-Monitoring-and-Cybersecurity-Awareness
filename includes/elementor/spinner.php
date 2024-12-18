<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_SpinnerBoxElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_spinner_box_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Spinner Box Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-spinner';
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
				'label'			=> esc_attr__( 'Select Spinner Box View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Spinner Box View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'spinner-box', true ),
			]
		);
		$this->add_control(
			'icon',
			[
				'label' 	=> esc_attr__( 'Icon', 'xcare' ),
				'type' 		=> \Elementor\Controls_Manager::ICONS,
				'default'	=> [
					'value' 	=> 'pbmit-xcare-icon pbmit-xcare-icon-down-arrow',
					'library'	=> 'pbmit-xcare-icon',
				],
			]
		);
		$this->add_control(
			'icon_link',
			[
				'label' 	  => esc_attr__( 'Set Icon Link', 'xcare' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'spinner_text',
			[
				'label' 	  => esc_attr__( 'Spinner Title', 'xcare' ),
				'type' 		  => Controls_Manager::TEXT,
				'default' 	  => esc_attr__( 'Meet Our Team Meet Our Team Meet Our Team', 'xcare' ),
				'placeholder' => esc_attr__( 'Spinner Title', 'xcare' ),
				'label_block' => true,
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
			'cpt'		=> 'spinner-box',
			'data'		=> $settings
		) );
		
		?>

		<div class="pbmit-element-posts-wrapper">

			<?php
			$title_html =  $icon_html =  $image_html = '' ;
			
			// Template
			if( file_exists( locate_template( '/theme-parts/spinner-box/spinner-box-style-'.esc_attr($style).'.php', false, false ) ) ){

			$title_html	= ( !empty($settings['spinner_text']) ) ? '<div class="pbminfotech-box-title"><h4>'.esc_html($settings['spinner_text']).'</h4></div>' : '' ;

			//icon

			// This is real icon html code

			if($icon['library']=='svg'){
				ob_start();
				Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
				$icon_html = ob_get_contents();
				ob_end_clean();
				
				$icon_html	   = '<div class="pbmit-ihbox-svg"><div class="pbmit-ihbox-svg-wrapper">' . $icon_html . '</div></div>';
				$icon_type_class = 'icon';
			} else {
				if(!empty($settings['icon'])){
					ob_start();
					Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
					$icon_html_code = ob_get_contents();
					ob_end_clean();
					
					$icon_html	   = '<div class="pbmit-ihbox-icon">' . pbmit_esc_kses( $icon_html_code ) . '</div>';
					$icon_type_class = 'icon';
				}
			}
			echo '<div class="pbmit-spinner pbmit-spinner-box-style-'.esc_attr($style).'">';

				include(locate_template( '/theme-parts/spinner-box/spinner-box-style-'.esc_attr($style).'.php', false, false ) );

			echo '</div>';

			}?>

		 </div>

		<?php

		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'spinner-box',
			'data'		=> $settings
		) );
		
		?>
		
		<?php
	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_SpinnerBoxElement() );