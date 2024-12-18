<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor select control.
 *
 * A base control for creating select control. Displays a simple select box.
 * It accepts an array in which the `key` is the option value and the `value` is
 * the option name.
 *
 * @since 1.0.0
 */
class PBMIT_imgselect extends \Elementor\Base_Data_Control {

	/**
	 * Get select control type.
	 *
	 * Retrieve the control type, in this case `select`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'pbmit_imgselect';
	}

	public function enqueue() {
		// Styles
		wp_register_style( 'pbmit-elementor-base', get_template_directory_uri() . '/includes/elementor-base.css' );
		wp_enqueue_style( 'pbmit-elementor-base' );
	}

	/**
	 * Get select control default settings.
	 *
	 * Retrieve the default settings of the select control. Used to return the
	 * default settings while initializing the select control.
	 *
	 * @since 2.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'options' => [],
		];
	}

	/**
	 * Render select control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">
			<# if ( data.label ) {#>
				<label for="<?php echo esc_attr($control_uid); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>
			<div class="elementor-control-input-wrapper elementor-control-unit-5">

				<div class="pbmit-imgselect-thumbs">
					<#
						var printImgOptions = function( options ) {
							_.each( options, function( option_title, option_value ) { #>

									<label class="pbmit-imgselect-thumb">
										<input type="radio" id="<?php echo esc_attr($control_uid); ?>" name="<?php echo esc_attr($control_uid); ?>" data-setting="{{ data.name }}" value="{{{option_value}}}" data-value="{{{option_value}}}">
										<img src="{{ option_title }}" <# if ( data.thumb_width ) {#> style="width:{{{data.thumb_width}}}" <# } #> />
										<i class="fas fa-check"></i>
									</label>

							<# } );
						};
						printImgOptions( data.options );
					#>
				</div>

			</div>
		</div>
		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
}
