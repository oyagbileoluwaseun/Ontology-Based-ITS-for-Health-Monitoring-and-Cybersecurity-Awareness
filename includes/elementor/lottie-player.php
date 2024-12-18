<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class PBMIT_LottiePlayerElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_lottie_player_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xcare Lottie Player Element', 'xcare' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-bolt';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xcare_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}

	protected function register_controls() {

		$html_description = '
		<div class="pbmit-lottie-description">

			<div class="pbmit-lottie-video-link"><a href="https://www.youtube.com/watch?v=fudl96k22K4" target="_blank"> <i class="eicon-youtube" aria-hidden="true"></i> '.esc_html__('See video for how to use Lottie Animation', 'xcare').'</a></div>
			<br>
			<h3>'.esc_html__('Steps', 'xcare').'</h3>
			<ol>
				<li>' . sprintf( esc_html__('First go to %1$s site and signup and login. You can signup for free on this site.', 'xcare'), pbmit_esc_kses('<a href="https://lottiefiles.com/" target="_blank">Lottie</a>') ) . '</li>
				<li>' . sprintf( esc_html__('Then go to our %1$s Xcare Theme Collections %2$s. Here we created a list of all animations that we used in Xcare theme.', 'xcare'), pbmit_esc_kses('<a href="https://lottiefiles.com/collections/xcare-theme-collections/71404e0a-edc6-4486-bab7-74317d403aff" target="_blank">'), pbmit_esc_kses('</a>') ) . '</li>
				<li>' . esc_html__('Click on any animation and modify as per your requirement.', 'xcare') . '</li>
				<li>' . esc_html__('Click on the HTML icon. It will open a new box where you can copy the code.', 'xcare') . '</li>
				<li>' . esc_html__('Now paste the code in above box and save it.', 'xcare') . '</li>
			</ol>
		</div>

		';

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Lottie HTML Code', 'xcare' ),
			]
		);

		$this->add_control(
			'html',
			[
				'label'			=> '',
				'type'			=> Controls_Manager::CODE,
				'default'		=> pbmit_esc_kses('<lottie-player src="'.esc_url('https://assets5.lottiefiles.com/packages/lf20_B2qAl3/data.json').'"  background="transparent"  speed="1"  style="width: 600px; height: 600px;"  loop autoplay></lottie-player>'),
				'placeholder'	=> esc_html__( 'Enter your Lottie code', 'xcare' ),
				'description'	=> pbmit_esc_kses($html_description),
				'show_label'	=> false,
				'dynamic'		=> [
					'active'		=> true,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings	= $this->get_settings_for_display();

		if( !empty($settings['html']) ){

			echo pbmit_esc_kses($settings['html']);

		} else {
			?>
			<div class="pbmit-no-data-message"><?php esc_html_e('No Lottie code found. Please add Lottie Code.', 'xcare'); ?></div>
			<?php
		}
	}

	protected function content_template() {
		?>
		{{{ settings.html }}}
		<?php
	}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_LottiePlayerElement() );