<?php

class acf_field_pbmit_fonticonpicker extends acf_field {

	// Vars
	var $settings, 		// Will hold info such as dir / path
		$defaults,		// Will hold default field options
		$json_content; 	// Hold the content of icons JSON config file

	/**
	 *  __construct
	 *
	 *  @since	1.0.0
	 */
	function __construct() {

		// Vars
		$this->name = 'pbmit_fonticonpicker';
		$this->label = esc_html__('Icon Picker', 'xcare');
		$this->category = __("jQuery", 'xcare');

		parent::__construct();

		// Settings
		$this->settings = array(
			'dir' 		=> 	apply_filters('acf/helpers/get_dir', __FILE__),
			'path'		=>	apply_filters('acf/helpers/get_path', __FILE__),
			'config' 	=> 	apply_filters('acf/helpers/get_path', __FILE__) . 'icons/config.json',
			'icons'		=>	apply_filters('acf/helpers/get_dir', __FILE__) . 'icons/css/fontello.css',
			'version' 	=> 	'1.0.0'
		);

		// Apply a filter so that you can load icon set from theme
		$this->settings = apply_filters( 'acf/acf_field_pbmit_fonticonpicker/settings', $this->settings );

		// Enqueue icons style in the frontend
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue' ) );

	}

	/**
	 *  frontend_enqueue()
	 *
	 *  @since	1.0.0
	 */
	function frontend_enqueue() {
		// Register icons style
		wp_register_style( 'acf-pbmit_fonticonpicker-icons', $this->settings['icons'] );
		wp_enqueue_style( 'acf-pbmit_fonticonpicker-icons' );
	}

	/**
	 *  create_field()
	 *
	 *  @param	$field - An array holding all the field's data
	 *
	 *  @since	1.0.0
	 */
	function create_field( $field ) {

		if ( !isset( $this->json_content['glyphs'] ) ){
			esc_html_e('No icons found', 'xcare');
			return;
		}

		// icons SELECT input
		echo '<select name="'. $field['name'] .'" id="'. $field['name'] .'" class="acf-iconpicker">';
		echo '<option value="">'.esc_html__('None', 'xcare').'</option>';
		foreach ( $this->json_content['glyphs'] as $glyph ) {
			$glyph_full = $this->json_content['css_prefix_text'] . $glyph['css'];
			echo '<option value="'. $glyph_full .'" '. selected( $field['value'], $glyph_full, false ) .'>'. $glyph['css'] .'</option>';
		}
		echo '</select>';

	}

	/**
	 *  input_admin_enqueue_scripts()
	 *
	 *  @since	1.0.0
	 */
	function input_admin_enqueue_scripts() {

		// Scripts
		wp_register_script( 'acf-pbmit_fonticonpicker', $this->settings['dir'] . 'js/jquery.pbmit_fonticonpicker.min.js', array('jquery'), $this->settings['version'] );
		wp_register_script( 'acf-pbmit_fonticonpicker-input', $this->settings['dir'] . 'js/input.js', array('acf-pbmit_fonticonpicker'), $this->settings['version'] );
		wp_enqueue_script( 'acf-pbmit_fonticonpicker-input' );

		// Styles
		wp_register_style( 'acf-pbmit_fonticonpicker-style', $this->settings['dir'] . 'css/jquery.pbmit_fonticonpicker.min.css', false, $this->settings['version'] );
		wp_register_style( 'acf-pbmit_fonticonpicker-icons', $this->settings['icons'] );
		wp_enqueue_style( array( 'acf-pbmit_fonticonpicker-style', 'acf-pbmit_fonticonpicker-icons' ) );

	}

} // Class acf_field_pbmit_fonticonpicker

// create field
new acf_field_pbmit_fonticonpicker();