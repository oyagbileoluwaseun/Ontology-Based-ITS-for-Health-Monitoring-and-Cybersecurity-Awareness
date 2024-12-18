<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class PBMIT_TabsElement extends Widget_Base{

 	/**
	 * Get widget name.
	 *
	 * Retrieve tabs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pbmit_tabs_element';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve tabs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Xcare Tabs Element', 'xcare' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve tabs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-box';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'tabs', 'accordion', 'toggle' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr( 'Tabs', 'xcare' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_attr( 'Title & Description', 'xcare' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr( 'Tab Title', 'xcare' ),
				'placeholder' => esc_attr( 'Tab Title', 'xcare' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_attr( 'Content', 'xcare' ),
				'default' => esc_attr( 'Tab Content', 'xcare' ),
				'placeholder' => esc_attr( 'Tab Content', 'xcare' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_attr( 'Tabs Items', 'xcare' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_attr( 'Tab #1', 'xcare' ),
						'tab_content' => esc_attr( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'xcare' ),
					],
					[
						'tab_title' => esc_attr( 'Tab #2', 'xcare' ),
						'tab_content' => esc_attr( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'xcare' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="pbmit-tabs">
			<?php if ( $settings['tabs'] ) : ?>
			<ul class="pbmit-tabs-heading">
				<?php $i = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_li_class = ( $i==1 ) ? 'pbmit-tab-li-active' : '' ; ?>
				<li class="pbmit-tab-link <?php echo esc_attr($active_li_class); ?>" data-pbmit-tab="<?php echo esc_attr($i); ?>"><span><?php echo esc_html($tabs['tab_title']); ?></span><i class="pbmit-base-icon-black-arrow-1"></i></li>
				<?php $i++; } ?>
			</ul>

			<div class="pbmit-tab-content-wrapper">
				<?php $j = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_class = ( $j==1 ) ? 'pbmit-tab-active' : '' ; ?>
					<div class="pbmit-tab-content pbmit-tab-content-<?php echo esc_attr($j); ?> <?php echo esc_attr($active_class); ?>">
						<div class="pbmit-tab-content-title" data-pbmit-tab="<?php echo esc_attr($j); ?>"><?php echo esc_html($tabs['tab_title']); ?><i class="pbmit-base-icon-black-arrow-1"></i></div>
						<div class="pbmit-tab-content-inner">
							<?php echo pbmit_esc_kses($tabs['tab_content']); ?>
						</div>
					</div>
				<?php $j++; } ?>
			</div>

			<?php endif; ?>
		</div>

		<?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_TabsElement() );