<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_PTableElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_ptable_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Pricing Table Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-dollar-sign';
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
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Pricing Table View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Pricing Table View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'pricing-table', true ),
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

		// Highlight Column
		$this->start_controls_section(
			'highlight_col_section',
			[
				'label' => esc_attr__( 'Highlight Column', 'xcare' ),
			]
		);
		$this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Highlight Column', 'xcare' ),
				'description' => esc_attr__( 'Select column which is highlighted in pricing table', 'xcare' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'xcare' ),
					'2'	=> esc_attr__( 'Second Column', 'xcare' ),
					'3'	=> esc_attr__( 'Third Column', 'xcare' ),
					'4'	=> esc_attr__( 'Fourth Column', 'xcare' ),
					'5'	=> esc_attr__( 'Fifth Column', 'xcare' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Highlight Text', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder'	=> esc_attr__( 'This will appear as special text', 'xcare' ),
				'default'		=> esc_attr( 'popular', 'xcare' ),				
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			$default_heading	= '';
			$default_price		= '';
			$default_desc		= '';
			$default_icon		= [
				'value'				=> 'fas fa-star',
				'library'			=> 'fa-solid',
				'url'				=> '',
			];
			if( $x == 1 ){
				$default_heading = esc_attr__( 'Basic', 'xcare' );
				$default_price	 = esc_attr__( '17', 'xcare' );
				$default_desc		= esc_attr__( 'Medical', 'xcare' );
				$default_icon		= [
					'value'				=> 'fas fa-user-alt',
					'library'			=> 'fa-solid',
					'url'				=> '',
				];

			} else if( $x == 2 ){
				$default_heading = esc_attr__( 'Advance', 'xcare' );
				$default_price	 = esc_attr__( '51', 'xcare' );
				$default_desc		= esc_attr__( 'Examination', 'xcare' );
				$default_icon		= [
					'value'				=> 'fas fa-user-tie',
					'library'			=> 'fa-solid',
					'url'				=> '',
				];

			} else if( $x == 3 ){
				$default_heading = esc_attr__( 'Enterprise', 'xcare' );
				$default_price	 = esc_attr__( '99', 'xcare' );
				$default_desc		= esc_attr__( 'Health Care', 'xcare' );
				$default_icon		= [
					'value'				=> 'fas fa-users',
					'library'			=> 'fa-solid',
					'url'				=> '',
				];
			}

			//Content
			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'xcare' ) , pbmit_ordinal($x) ) ,
				]
			);

			$this->add_control(
				$x.'_icon_type',
				[
					'label'		=> esc_attr__( 'Icon Type', 'xcare' ),
					'type'		=> Controls_Manager::SELECT,
					'options'	=> [
						'icon'		=> esc_attr__( 'Icon', 'xcare' ),
						'image'		=> esc_attr__( 'Image', 'xcare' ),
						'text'		=> esc_attr__( 'Text', 'xcare' ),
					],
					'default' => esc_attr( 'icon' ),
				]
			);
			$this->add_control(
				$x.'_icon',
				[
					'label'		=> esc_attr__( 'Icon', 'xcare' ),
					'type'		=> \Elementor\Controls_Manager::ICONS,
					'condition'	=> [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => esc_attr__( 'Select Image for Icon', 'xcare' ),
					'description' => esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'xcare' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			$this->add_control(
				$x.'_icon_text',
				[
					'label'			=> esc_attr__( 'Text for Icon', 'xcare' ),
					'description'	=> esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'xcare' ),
					'type'			=> Controls_Manager::TEXT,
					'dynamic'		=> [
						'active'		=> true,
					],
					'default'		=> esc_attr__( '01', 'xcare' ),
					'placeholder'	=> esc_attr__( 'Enter text here', 'xcare' ),
					'label_block'	=> true,
					'condition'		=> [
						$x.'_icon_type'	=> 'text',
					]
				]
			);
			$this->add_control(
				$x.'_heading',
				[
					'label'		 => esc_attr__( 'Heading', 'xcare' ),
					'type'		  => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_heading ),
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'xcare' ),
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_desc',
				[
					'label'			=> esc_attr__( 'Description', 'xcare' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_desc ),
					'description'	=> esc_attr__( 'Enter text used as description.', 'xcare' ),
					'separator'		=> 'after',
					'label_block'	=> true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'		 => esc_attr__( 'Price', 'xcare' ),
					'type'		  => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_price ),
					'description'   => esc_attr__( 'Enter Price.', 'xcare' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'		 => esc_attr__( 'Currency symbol', 'xcare' ),
					'type'		  => Controls_Manager::TEXT,
					'default'		=> esc_attr( '$' ),
					'description'   => esc_attr__( 'Enter currency symbol', 'xcare' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'xcare' ),
					'description'	=> esc_html__( 'Select currency position.', 'xcare' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> esc_attr('before'),
					'options' => [
						'after'		=> esc_attr__( 'After Price', 'xcare' ),
						'before'	=> esc_attr__( 'Before Price', 'xcare' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'		 => esc_attr__( 'Price Frequency', 'xcare' ),
					'type'		  => Controls_Manager::TEXT,
					'default'		=> esc_attr__( '/ Monthly', 'xcare' ),
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'xcare' ),
					'separator'	 => 'after',
				]
			);
			$this->add_control(
				$x.'_btn_text',
				[
					'label'		 => esc_attr__( 'Button Text', 'xcare' ),
					'type'		  => Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Purchase Now', 'xcare' ),
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'xcare' ),
				]
			);
			$this->add_control(
				$x.'_btn_link',
				[
					'label'		 => esc_attr__( 'Button Link', 'xcare' ),
					'type'		  => Controls_Manager::URL,
					'default'		=> array (
						'url'				=> '#',
						'is_external'		=> '',
						'nofollow'			=> '',
						'custom_attributes'	=> '',
					),
					'description'   => esc_attr__( 'Set link for button', 'xcare' ),
					'separator'	 => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label'			=> esc_attr__( 'Line Label', 'xcare' ),
					'type'			=> Controls_Manager::TEXT,
					'label_block'	=> true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'	 => esc_attr__( 'Icon', 'xcare' ),
					'type'	  => Controls_Manager::ICONS,
					'default'   => [
						'value'	 => 'fas fa-check',
						'library'   => 'fa-solid',
					],
				]

			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'xcare' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'xcare' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'Line One', 'xcare' ),
							'icon'		=> [
								'value'	 => 'fas fa-check',
								'library'   => 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Two', 'xcare' ),
							'icon'		=> [
								'value'	 => 'fas fa-check',
								'library'   => 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Three', 'xcare' ),
							'icon'		=> [
								'value'	 => 'fas fa-check',
								'library'   => 'fa-solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		} // end for loop

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'xcare' ),
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
				'separator'		=> 'before',
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
				'default' => esc_attr__( 'Our Plans', 'xcare' ),
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
				'default' => '',
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
				'selectors' => [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>

		<div class="pbminfotech-ele pbminfotech-ele-pricing-table pbminfotech-ele-ptable-style-<?php echo esc_attr($style); ?>">

			<?php pbmit_heading_subheading($settings, true); ?>

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}

			$col_start_div	= '';
			$col_end_div	= '';
			if ($style != '2'){
				if( !empty($columns) ){
					switch( count($columns) ){
						case 1:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-12">';
							$col_end_div	= '</div>';
							break;

						case 2:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-6">';
							$col_end_div	= '</div>';
							break;

						case 3:
							$col_start_div	= '<div class="pbmit-ptable-col col-lg-4 col-md-6 col-sm-12">';
							$col_end_div	= '</div>';
							break;

						case 4:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-3">';
							$col_end_div	= '</div>';
							break;

						case 5:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-20percent">';
							$col_end_div	= '</div>';
							break;
					}
				}
			}
			if ($style == '2'){
				if( !empty($columns) ){
					$col_start_div	= '<div class="pbmit-ptable-col col-md-12">';
					$col_end_div	= '</div>';
				}
			}
			if( !empty($columns) ){

				$return .= '<div class="pbmit-ptable-cols row multi-columns-row">';

				foreach( $columns as $col => $highlight_col ){

					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="pbmit-ptable-icon"><div class="pbmit-ptable-icon-wrapper pbmit-ptable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="pbmit-ptable-icon"><div class="pbmit-ptable-icon-wrapper pbmit-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							if($settings[$col.'_icon']['library']=='svg'){
								ob_start();
								Icons_Manager::render_icon( $settings[$col.'_icon'] , [ 'aria-hidden' => 'true' ] );
								$icon = ob_get_contents();
								ob_end_clean();

								$icon	   = '<div class="pbmit-ptable-svg"><div class="pbmit-ptable-svg-wrapper">' . $icon . '</div></div>';
								$icon_type_class = 'icon';
							} else {
								// This is real icon html code
								ob_start();
								Icons_Manager::render_icon( $settings[$col.'_icon'] , [ 'aria-hidden' => 'true' ] );
								$icon_code = ob_get_contents();
								ob_end_clean();
								
								$icon	   = '<div class="pbmit-ptable-icon"><div class="pbmit-ptable-icon-wrapper">' . pbmit_esc_kses( $icon_code ) . '</div></div>';
								$icon_type_class = 'icon';
							}
						}
					}

					// add highlighted class
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="pbmit-pricing-table-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_col']) ) ? '<div class="pbmit-ptablebox-featured-w">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="pbmit-pricing-table-featured-col ', 'class="', $col_start_div );
					}

					// Heading
					$heading = ( !empty($settings[$col.'_heading']) ) ? '<h3 class="pbminfotech-ptable-heading">'.$settings[$col.'_heading'].'</h3><div class="pbminfotech-sep"></div>' : '' ;

					// Description
					$desc = ( !empty($settings[$col.'_desc']) ) ? '<div class="pbminfotech-ptable-desc">'.$settings[$col.'_desc'].'</div>' : '' ;

					// Currency Symbol
					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="pbminfotech-ptable-symbol">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					// Price Frequency
					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="pbminfotech-ptable-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;

					// Price				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="pbminfotech-ptable-price">'.$settings[$col.'_price'].'</div>' : '' ;
					// Add currently symbol in price
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;

					// list of features
					$lines_html = '';
					$values  = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {
 
						  if($data['icon']['library']=='svg'){
								ob_start();
								Icons_Manager::render_icon( $data['icon'] , [ 'aria-hidden' => 'true' ] );
								$list_icon = ob_get_contents();
								ob_end_clean();
								$list_icon	   = '<div class="pbmit-ptable-line-svg">' . $list_icon . '</div>';
								$icon_type_class = 'icon';
							} else {
								ob_start();
								Icons_Manager::render_icon( $data['icon'] , [ 'aria-hidden' => 'true' ] );
								$list_icon = ob_get_contents();
								ob_end_clean();
								
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<div class="pbmit-ptable-line">'.$list_icon.$data['text'].'</div>' : '';
						}
					}

					// Button
					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="pbmit-btn">' . pbmit_link_render($settings[$col.'_btn_link'], 'start' ) . pbmit_esc_kses($settings[$col.'_btn_text']) . pbmit_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}

					// Template output
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/theme-parts/pricing-table/pricing-table-style-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo pbmit_esc_kses($return);
			?>

		</div><!-- pbminfotech-ele pbminfotech-ele-pricing-table -->

		<?php

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-ptable-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new PBMIT_PTableElement() );