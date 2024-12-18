<?php

if( !class_exists('acf_field_pbmit_fonticonpicker_plugin') ){
class acf_field_pbmit_fonticonpicker_plugin {

	/**
	 *  Construct
	 *
	 *  @since: 1.0.0
	 */
	function __construct() {

		// Version 4
		add_action('acf/register_fields', array($this, 'register_fields'));

		// Version 5
		add_action('acf/include_field_types',  array($this, 'include_field_types'));

	}

	/**
	 *  register_fields()
	 *
	 *  @since: 1.0.0
	 */
	function register_fields() {
		include_once('pbmit_fonticonpicker-v4.php');
	}

	function include_field_types( $version ) {
		include_once('pbmit_fonticonpicker-v5.php');
	}

} // Class acf_field_pbmit_fonticonpicker_plugin
}

new acf_field_pbmit_fonticonpicker_plugin();