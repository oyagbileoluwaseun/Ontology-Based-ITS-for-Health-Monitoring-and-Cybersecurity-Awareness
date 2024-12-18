<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class pbmit_TimelineElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_timeline_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Timeline Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-history';
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
	public function get_style_depends() {
		return [ 'pbmit-timeline' ];
	}

	protected function register_controls() {

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Style Options', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Timeline View Style', 'xcare' ),
				'description'	=> esc_attr__( 'Select Timeline View style.', 'xcare' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'timeline', true ),
			]
		);

		$this->end_controls_section();

		// Content
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'xcare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
					'url'	=> get_template_directory_uri() . '/images/award.jpg',
				],
			]
		);
		$repeater->add_control(
			'year_text',
			[
				'label'			=> esc_attr__( 'Small text like Label', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'description'	=> esc_attr__( 'Small text like Label.', 'xcare' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'small_text',
			[
				'label'			=> esc_attr__( 'Number of year', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'description'	=> esc_attr__( 'Number of year.', 'xcare' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'desc_text',
			[
				'label'			=> esc_attr__( 'Description', 'xcare' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'description'	=> esc_attr__( 'Description Text.', 'xcare' ),
				'show_label'	=> true,
			]
		);
		$this->add_control(
			'values',
			[
				'label'			=> esc_attr__( 'Values', 'xcare' ),
				'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'xcare' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'image'			=> get_template_directory_uri() . '/images/award.jpg',
						'year_text'		=> esc_attr__( 'Our Beginning', 'xcare' ),
						'small_text'	=> esc_attr__( '2010', 'xcare' ),
						'desc_text'		=> esc_attr__( 'Our 1st branch in USA', 'xcare' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/award.jpg',
						'year_text'		=> esc_attr__( 'Our Beginning', 'xcare' ),
						'small_text'	=> esc_attr__( '2012', 'xcare' ),
						'desc_text'		=> esc_attr__( 'Our 2nd branch in USA', 'xcare' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/award.jpg',
						'year_text'		=> esc_attr__( 'Our Beginning', 'xcare' ),
						'small_text'	=> esc_attr__( '2014', 'xcare' ),
						'desc_text'		=> esc_attr__( 'Our 3rd branch in USA', 'xcare' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/award.jpg',
						'year_text'		=> esc_attr__( 'Our Beginning', 'xcare' ),
						'small_text'	=> esc_attr__( '2016', 'xcare' ),
						'desc_text'		=> esc_attr__( 'Our 4th branch in USA', 'xcare' ),
					],
				],
				'title_field' => '{{{ small_text }}}',
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
				'label'		=> esc_attr__( 'Heading', 'xcare' ),
				'type'		=> Controls_Manager::TEXTAREA,
				'dynamic'	=> [
					'active'	=> true,
				],
				'default'	=> esc_attr__( 'Company History', 'xcare' ),
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
				'default'	=> esc_attr__( 'History', 'xcare' ),
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

		// Data Options
		$this->start_controls_section(
			'row_col_options_heading',
			[
				'label'			=> esc_attr__( 'Column and Carousel Options', 'xcare' ),
				'type'			=> Controls_Manager::HEADING,
				'condition'		=> [
					'style'		=> ['1'],
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
				'default'		=> 'carousel',
				'options'		=> [
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' 		=> esc_attr__( 'Carousel Options', 'xcare' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> [
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
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'xcare' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'xcare' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4000',
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
				'default'		=> '3',
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
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label'	 => esc_attr__( 'Subheading Tag', 'xcare' ),
				'type'	  => Controls_Manager::SELECT,
				'options'   => [
					'h1'	  => esc_attr( 'H1' ),
					'h2'	  => esc_attr( 'H2' ),
					'h3'	  => esc_attr( 'H3' ),
					'h4'	  => esc_attr( 'H4' ),
					'h5'	  => esc_attr( 'H5' ),
					'h6'	  => esc_attr( 'H6' ),
					'div'	 => esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
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
			'cpt'		=> 'timeline',
			'data'		=> $settings
		) );
		?>

		<div class="pbmit-timeline">

			<?php if($style == '1'){?> <div class="container"> <?php } ?>
				<div class="pbmit-ele-header-area">
					<?php pbmit_heading_subheading($settings, true); ?>
				</div>

			<?php if($style == '1'){ ?> </div> <?php }

			if ( $style == '1' ) { ?>
				<div class="pbmit-element-posts-wrapper row multi-columns-row <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?>">
					<?php if( !empty($settings['values']) && count($settings['values'])>0 ) {
						$return = '';
						foreach($settings['values'] as $value){
							$small_text	= ( !empty($value['small_text']) ) ? $value['small_text'] : '' ;
							$year_text	= ( !empty($value['year_text']) ) ? $value['year_text'] : '' ;
							$desc_text	= ( !empty($value['desc_text']) ) ? $value['desc_text'] : '' ;
							$image		= ( !empty($value['image']['url']) ) ? '<img src="'.esc_url($value['image']['url']).'" alt="'.esc_attr($year_text).'" />' : '' ;
							?>	
							<div class="pbmit-timeline-wrapper swiper-slide ">
								<?php if( !empty($image) ){ ?>
									<div class="pbmit-same-height steps-media pbmit-feature-image">
										<?php echo pbmit_esc_kses($image); ?>
									</div>
								<?php } ?>
								<div class="steps-dot"><i class="steps-dot-line"></i><span class="dot"></span></div>
								<div class="pbmit-same-height steps-content_wrap">
									<p class="pbmit-timeline-year"><?php echo esc_html($small_text); ?></p>
									<h3 class="pbmit-timeline-title"><?php echo esc_html($year_text); ?></h3>
									<p class="pbmit-timeline-desc"><?php echo pbmit_esc_kses($desc_text); ?></p>
								</div>
							</div>		
						<?php } //foreach 
						
						echo pbmit_esc_kses($return);
					} ?>					
				</div>
			<?php } else { ?>

			<div class="pbmit-first-timeline"></div>
			<div class="pbmit-timeline-post-items">
				<?php if( !empty($settings['values']) && count($settings['values'])>0 ) {
					foreach($settings['values'] as $value){								
						$year_text	= ( !empty($value['year_text']) ) ? $value['year_text'] : '' ;
						$small_text	= ( !empty($value['small_text']) ) ? $value['small_text'] : '' ;
						$desc_text	= ( !empty($value['desc_text']) ) ? $value['desc_text'] : '' ;
						$image		= ( !empty($value['image']['url']) ) ? '<img src="'.esc_url($value['image']['url']).'" alt="'.esc_attr($year_text).'" />' : '' ;
						?>		

						<div class="pbmit-timeline-inner">
							<div class=" col-sm-12 pbmit-ourhistory-type2">
								<div class="row pbmit-ourhistory-row">
									<div class="col-md-5 col-sm-12 col-xs-5 pbmit-ourhistory-right">

										<span class="label"><?php echo esc_html($small_text); ?></span>
										<div class="content">
											<h4 class="pbmit-title"><?php echo esc_html($year_text); ?></h4>
											<div class="simple-text">
												<p><?php echo pbmit_esc_kses($desc_text); ?></p>
											</div>
										</div>

									</div>
									<div class="col-md-2 pbmit-ourhistory-center">
										<span class="label"><?php echo esc_html($small_text); ?></span>
									</div>
									<div class="col-md-5 pbmit-ourhistory-left">
										<span class="pbmit-timeline-image"><?php echo pbmit_esc_kses($image); ?></span>
									</div>
								</div>
							</div>
						</div>					
						<?php } ?>
				<?php } ?>
			</div>
			<div class="pbmit-last-timeline"></div>
		<?php } ?>
	</div>

		<?php
	// Ending wrapper of the whole arear
	pbmit_element_container( array(
		'position'	=> 'end',
		'cpt'		=> 'timeline',
		'data'		=> $settings
	) );
	?>
		
	<?php }

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-timeline-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new pbmit_TimelineElement() );