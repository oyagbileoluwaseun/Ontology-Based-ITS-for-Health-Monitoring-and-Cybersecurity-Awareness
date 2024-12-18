<?php

/*
 *  Customizer - PBMInfotech Icon picker
 */

if( !function_exists('pbmit_admin_enqueue_icon_library') ){
function pbmit_admin_enqueue_icon_library() {
	// Icon libraries
	$icon_libraries = pbmit_icon_library_list();
	wp_enqueue_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	foreach( $icon_libraries as $library_id=>$library_data ){
		wp_enqueue_style( $library_id, $library_data['css_path'] );
	}

}
}
add_action( 'admin_enqueue_scripts', 'pbmit_admin_enqueue_icon_library', 55 );

if( !function_exists('pbmit_enqueue_icon_base') ){
function pbmit_enqueue_icon_base() {
	// Icon class array file
	wp_enqueue_script( 'acf-pbmit_fonticonpicker-iconarray', get_template_directory_uri() . '/includes/customizer/pbminfotech-icon-picker/pbminfotech-icon-picker.js', array('jquery','acf-pbmit_fonticonpicker') );
	wp_enqueue_style( 'pbminfotech-icon-picker-base',  get_template_directory_uri() . '/includes/customizer/pbminfotech-icon-picker/pbminfotech-icon-picker.css' );
}
}
add_action( 'admin_enqueue_scripts', 'pbmit_enqueue_icon_base' );

add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_PBMInfotech_Icon_Picker_Control extends Kirki_Control_Base {
		public $type = 'pbminfotech_icon_picker';

		//public function content_template() {
		public function render_content() {

			// Define all icon libraries
			$icon_libraries = pbmit_icon_library_list();

			// Default icons for each library
			$default_icons = array();
			foreach( $icon_libraries as $library_id=>$library_data ){
				$default_icons[$library_id] = $library_data['default_icon'];
			}

			// Process value
			$allvalues	   = $this->value();
			$allvalues_array = explode( ';', $allvalues );
			$active_lib	  = '';

			foreach( $allvalues_array as $value ){
				$value_array = explode( ' ', $value );
				foreach( $icon_libraries as $library_id=>$library_data ){
					if( $library_data['common_class'] == $value_array[0] ){
						$default_icons[$library_id] = $value;

						$active_lib = ( empty($active_lib) ) ? $library_id : $active_lib ;
					}
				}
			}

			// First active library
			$selected_library = '';
			$allvalues_first = explode( ' ', $allvalues );
			$allvalues_first = $allvalues_first[0];
			foreach( $icon_libraries as $library_id=>$library_data ){
				if( $library_data['common_class'] == $allvalues_first ){
					$selected_library = $library_id;
				}
			}

			?>

			<div class="pbminfotech-icon-picker-element">

				<label class="customizer-text">
					<?php if( !empty($this->label) ) : ?><span class="customize-control-title"><?php echo esc_attr( $this->label ) ?></span><?php endif; ?>
					<?php if( !empty($this->description) ) : ?><span class="description customize-control-description"><?php echo esc_attr( $this->description ) ?></span><?php endif; ?>
				</label>

				<!-- Value will be stored here -->
				<div style="display:block; width:1px; height:1px; opacity:0;">
					<input type="text" value="<?php echo esc_attr($value); ?>" class="kirki-pbminfotech-icon-picker-control" data-id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?>>
				</div>

				<!-- Icon library selector -->
				<div class="pbminfotech-select-icon-library-wrapper">
					<select name="_customize-pbminfotech-icon-picker-<?php echo esc_attr( $this->id ); ?>test" class="pbminfotech-select-icon-library" >
						<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
							<option value="<?php echo esc_attr($library_id) ?>" <?php selected( $selected_library, $library_id ) ?> ><?php echo esc_attr($library_data['name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- Icon list wrapper -->
				<div class="pbminfotech-select-icons-list-wrapper">

				<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
					<div class="pbminfotech-select-icon-list-wrapper pbminfotech-select-icon-list-wrapper-<?php echo esc_attr($library_id); ?>" <?php if( $selected_library != $library_id ): ?> style="display:none;" <?php endif; ?> >

						<div class="pbminfotech-icon-picker-ele-w" data-pbmit-library="<?php echo esc_attr($library_id); ?>" data-pbmit-selected-icon="<?php echo esc_attr($default_icons[$library_id]); ?>" data-pbmit-common-class="<?php echo esc_attr($library_data['common_class']); ?>" data-pbmit-class-prefix="<?php echo esc_attr($library_data['class_prefix']); ?>"  >
							<div class="pbminfotech-icon-picker-ele-icon"><i class="<?php echo esc_attr( $default_icons[$library_id] ); ?>"></i></div>
							<div class="pbminfotech-icon-picker-ele-arrow"><i class="fa fa-arrow-down"></i></div>
							<div class="clear clr clearfix"></div>
						</div>
						<div class="pbminfotech-icon-picker-list-w" style="display:none;"></div>
					</div>
				<?php endforeach; ?>

				</div>

			</div>

			<?php
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['pbminfotech_icon_picker'] = 'Kirki_Controls_PBMInfotech_Icon_Picker_Control';
		return $controls;
	} );

} );
