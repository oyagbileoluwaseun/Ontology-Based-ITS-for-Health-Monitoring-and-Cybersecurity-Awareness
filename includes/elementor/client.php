<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_ClientElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_client_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Client Logo Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th';
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
		if( !empty($data['settings']["sortable"]) && $data['settings']["sortable"]=='yes' ){
			wp_enqueue_script( 'isotope' );
		}
	}

	protected function register_controls() {

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Client Logo Style Options', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Client Logo View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Client Logo View Style', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'client', true ),
			]
		);
		$this->end_controls_section();

		// Column and Carousel Options
		$this->start_controls_section(
			'row_column_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'xcare' ),

			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Logo box?', 'xcare' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				],

			]
		);
		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label'		=> esc_attr__( 'Carousel Options', 'xcare' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',

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
		// Carousel : delay
		$this->add_control(
			'carousel-delay',
			[
				'label'			=> esc_attr__( 'Carousel: delay', 'xcare' ),
				'description'	=> esc_attr__( 'Slide hold time (in ms).', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4000',
				'condition'		=> [
					'view-type'			=> 'carousel',
					'carousel-autoplay'	=> '1',
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
					'above'			=> esc_attr__( 'Yes, near heading area', 'xcare' ),
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
		// Carousel : Speed
		$this->add_control(
			'carousel-speed',
			[
				'label'			=> esc_attr__( 'Carousel:Speed', 'xcare' ),
				'description'	=> esc_attr__( 'Slider animation time (in ms.)', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '3000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		// Columns
		$this->add_control(
			'view-column-section-heading',
			[
				'label'			=> esc_attr__( 'Column Settings', 'xcare' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',

			]
		);
		$this->add_control(
			'columns',
			[
				'label'			=> esc_attr__( 'View in Column', 'xcare' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '5',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
					'5'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'6'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],

			]
		);
		$this->end_controls_section();

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
				'label' 	=> esc_attr__( 'Heading', 'xcare' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'dynamic' 	=> [
					'active' => true,
				],
				'default' 	  => esc_attr__( 'Our Clients', 'xcare' ),
				'placeholder' => esc_attr__( 'Enter your heading', 'xcare' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_link',
			[
				'label' => esc_attr__( 'Heading Link', 'xcare' ),
				'type' 	=> Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subheading', 'xcare' ),
				'type' 	=> Controls_Manager::TEXTAREA,
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
				'label' 	  	=> esc_attr__( 'Reverse Heading', 'xcare' ),
				'description' 	=> esc_attr__( 'Show Subheading before Heading', 'xcare' ),
				'type' 		  	=> Controls_Manager::SWITCHER,
				'label_on' 	  	=> esc_attr__( 'Yes', 'xcare' ),
				'label_off'   	=> esc_attr__( 'No', 'xcare' ),
				'return_value' 	=> 'yes',
				'default' 		=> '',
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label'   => esc_attr__( 'Alignment', 'xcare' ),
				'type' 	  => Controls_Manager::CHOOSE,
				'options' => [
					'left'	=> [
						'title' => esc_attr__( 'Left', 'xcare' ),
						'icon' 	=> 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'xcare' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'xcare' ),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'prefix_class' => 'pbmit-ele-header-align-',
				'selectors' => [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				/*
				'dynamic' => [
					'active' => true,
				],
				*/
			]
		);

		$this->end_controls_section();

		// Heading and Subheading
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Client Logo Content Options', 'xcare' ),
			]
		);

		$this->add_control(
			'from_category',
			[
				'label' 		=> esc_attr__( 'Show Logo from selected Client Group?', 'xcare' ),
				'type' 			=> Controls_Manager::SELECT2,
				'options' 		=> $this->select_category(),
				'multiple' 		=> true,
				'label_block'	=> true,
				'placeholder'   => esc_attr__( 'All Categories', 'xcare' ),
			]
		);
		$this->add_control(
			'show',
			[
				'label' 	  => esc_attr__( 'Logos to show', 'xcare' ),
				'description' => esc_attr__( 'How many Logo you want to show.', 'xcare' ),
				'separator'   => 'before',
				'type' 		  => Controls_Manager::NUMBER,
				'default' 	  => '6',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label' 	  => esc_attr__( 'Show Sortable Client Group?', 'xcare' ),
				'description' => esc_attr__( 'Select YES to show sortable Group.', 'xcare' ),
				'type' 		  => Controls_Manager::SWITCHER,
				'label_on' 	  => esc_attr__( 'Yes', 'xcare' ),
				'label_off'   => esc_attr__( 'No', 'xcare' ),
				'return_value'=> 'yes',
				'default' 	  => '',
				'condition'		=> [
					'view-type'			=> 'row-column',
				]
			]
		);
		$this->add_control(
			'ajax_sortable',
			[
				'label'			=> esc_attr__( 'Ajax based sortable Category?', 'xcare' ),
				'description'	=> esc_attr__( 'Select YES to load Client Group using Ajax on click on the category.', 'xcare' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xcare' ),
				'label_off'		=> esc_attr__( 'No', 'xcare' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'sortable'		=> 'yes',
					'view-type'		=> 'row-column',
					'offset!'		=> 'yes',
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> esc_attr__( 'Order', 'xcare' ),
				'description' 	=> esc_attr__( 'Designates the ascending or descending order.', 'xcare' ),
				'type' 			=> Controls_Manager::SELECT,
				'separator' 	=> 'before',
				'default' 		=> 'DESC',
				'options' 		=> [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'xcare' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'xcare' ),
				]
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' 	  => esc_attr__( 'Order By', 'xcare' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'xcare' ),
				'type' 		  => Controls_Manager::SELECT,
				'default' 	  => 'DESC',
				'options' 	  => [
					'none'		=> esc_attr__( 'No order', 'xcare' ),
					'ID'		=> esc_attr__( 'ID', 'xcare' ),
					'title'		=> esc_attr__( 'Title', 'xcare' ),
					'date'		=> esc_attr__( 'Date', 'xcare' ),
					'rand'		=> esc_attr__( 'Random', 'xcare' ),
				]
			]
		);
		$this->add_control(
			'offset',
			[
				'label'			=> esc_attr__( 'Skip Logos (offset)', 'xcare' ),
				'description'	=> esc_attr__( 'How many Logo you like to skip.', 'xcare' ),
				'type'			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> '',
				'options'		=> [
					''			=> esc_attr__( 'Show All Client Logo (No skip)', 'xcare' ),
					'1'			=> esc_attr__( 'Skip first Logo', 'xcare' ),
					'2'			=> esc_attr__( 'Skip two Logos', 'xcare' ),
					'3'			=> esc_attr__( 'Skip three Logos', 'xcare' ),
					'4'			=> esc_attr__( 'Skip four Logos', 'xcare' ),
					'5'			=> esc_attr__( 'Skip five Logos', 'xcare' ),
				],
				'condition'	=> [
					'ajax_sortable!' => 'yes',
				]
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
				'label'		=> esc_attr__( 'Heading Tag', 'xcare' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1'		=> esc_attr( 'H1' ),
					'h2'		=> esc_attr( 'H2' ),
					'h3'		=> esc_attr( 'H3' ),
					'h4'		=> esc_attr( 'H4' ),
					'h5'		=> esc_attr( 'H5' ),
					'h6'		=> esc_attr( 'H6' ),
					'div'		=> esc_attr( 'DIV' ),
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

		$this->add_control(
			'gap_options',
			[
				'label'			=> esc_attr__( 'Gap between Logo boxes', 'xcare' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',

			]
		);
		$this->add_control(
			'gap',
			[
				'label' 	  => esc_attr__( 'Box Gap', 'xcare' ),
				'description' => esc_attr__( 'Gap between each box.', 'xcare' ),
				'type' 		  => Controls_Manager::SELECT,
				'default' 	  => 'default',
				'options' 	  => [
					'default'	=> esc_attr__( 'Default Gap', 'xcare' ),
					'0px'		=> esc_attr__( 'No Gap (0px)', 'xcare' ),
					'5px'		=> esc_attr__( '5px', 'xcare' ),
					'10px'		=> esc_attr__( '10px', 'xcare' ),
					'15px'		=> esc_attr__( '15px', 'xcare' ),
					'20px'		=> esc_attr__( '20px', 'xcare' ),
					'25px'		=> esc_attr__( '25px', 'xcare' ),
					'30px'		=> esc_attr__( '30px', 'xcare' ),
					'35px'		=> esc_attr__( '35px', 'xcare' ),
					'40px'		=> esc_attr__( '40px', 'xcare' ),
					'45px'		=> esc_attr__( '45px', 'xcare' ),
					'50px'		=> esc_attr__( '50px', 'xcare' ),
				],

			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$swiper_class = '';
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			$swiper_class = ' swiper-wrapper';
		}

		$infinite_scroll_enabled = ( isset($settings['infinite-scroll']) && !empty($settings['infinite-scroll']) ) ? $settings['infinite-scroll'] : 'no' ;
		$loadmore_btn = ( isset($settings['infinite-scroll-show-loadmore-type']) && !empty($settings['infinite-scroll-show-loadmore-type']) ) ? $settings['infinite-scroll-show-loadmore-type'] : 'no' ;

		$loadmore_btn_title = ( isset($settings['infinite-scroll-loadmore-btn-title']) && !empty($settings['infinite-scroll-loadmore-btn-title']) ) ? $settings['infinite-scroll-loadmore-btn-title'] : '' ;

		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		?>

		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>

			<?php
			/* Sortable Category  */
			if( function_exists('pbmit_sortable_category') ){
				$sortable_html = pbmit_sortable_category( $settings, 'pbmit-client-group' );
				echo pbmit_esc_kses($sortable_html);
			}
			?>
		</div>

		<?php
		// Infinite scroll data
		$infinite_scroll_data = array();
		$infinite_scroll_data['cpt'] = 'client';
		$infinite_scroll_data['style'] = $style;

		if( !empty($settings['columns']) ){
			$infinite_scroll_data['columns'] = $settings['columns'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}

		if( !empty($settings['offset']) ){
			$infinite_scroll_data['offset'] = $settings['offset'];
		}
		if( !empty($settings['from_category']) ){
			$infinite_scroll_data['from_category'] = $settings['from_category'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}
		if( !empty($settings['order']) ){
			$infinite_scroll_data['order'] = $settings['order'];
		}
		if( !empty($settings['orderby']) ){
			$infinite_scroll_data['orderby'] = $settings['orderby'];
		}
		echo pbmit_esc_kses('<div class="pbmit-infinite-scroll-data">'.json_encode($infinite_scroll_data).'</div>');

		// Preparing $args
		$args = array(
			'post_type'				=> 'pbmit-client',
			'status'				=> 'publish',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);
		if( !empty($offset) ){
			$args['offset'] = $offset;
		}
		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}
		// From selected category/group
		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy'	=> 'pbmit-client-group',
					'field'		=> 'slug',
					'terms'		=> $from_category,
				),
			);
		};

		// Wp query to fetch posts
		$posts = new \WP_Query( $args );

		if ( $posts->have_posts() ) {
			?>

			<div class="pbmit-element-posts-wrapper row multi-columns-row <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?>">

				<?php
				$odd_even = 'odd';
				while ( $posts->have_posts() ) {
					$return = '';
					$posts->the_post();

					// Template
					if( file_exists( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) ) ){

						$return .= pbmit_element_block_container( array(
							'position'	=> 'start',
							'column'	=> $columns,
							'cpt'		=> 'client',
							'taxonomy'	=> 'pbmit-client-group',
							'style'		=> $style,
						) );

						ob_start();
						$r = include( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) );
						$return .= ob_get_contents();
						ob_end_clean();

						$return .= pbmit_element_block_container( array(
							'position'	=> 'end',
						) );

					}
					echo pbmit_esc_kses($return);

					// odd or even
					if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }

				}
				?>

			</div> <!-- .pbmit-element-posts-wrapper -->

			<?php } else { ?>

				<div class="pbmit-no-data-message"><?php esc_html_e('No data available.', 'xcare'); ?></div>

			<?php } ?>

		<?php wp_reset_postdata(); ?>

		<?php
		// infinite scroll

		if( $infinite_scroll_enabled=='yes' ){

			// Load More button
			if( $loadmore_btn == 'button' ){
				if( empty($loadmore_btn_title) ){
					$loadmore_btn_title = esc_attr__( 'Load More', 'xcare' );
				}
				echo pbmit_esc_kses( '<div class="pbmit-ajax-load-more-btn"><a href="#">' . esc_attr($loadmore_btn_title) . '</a></div>' );
			}

			echo pbmit_esc_kses( '<div class="pbmit-infinite-loader">
				<img src="' . get_template_directory_uri() . '/images/three-dots.svg" width="60" alt="' . esc_attr__( 'Loader', 'xcare' ) . '">
			</div>
			<div class="pbmit-infinite-scroll-last">' . esc_attr__( 'All content loaded', 'xcare' ) . '</div>' );

		}

		?>

		<?php

		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		?>

		<?php
	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-client-group', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new PBMIT_ClientElement() );
