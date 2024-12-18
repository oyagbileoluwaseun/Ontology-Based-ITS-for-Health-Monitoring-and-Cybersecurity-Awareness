<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
	'title' 		=> esc_html__( 'Infobox', 'xcare' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Sections', 'xcare' ),
	),
	'tags'			 => array(
		esc_html__( 'Demo 03', 'xcare' ),
		esc_html__( 'Demo 03', 'xcare' ),
		esc_html__( 'Homepage', 'xcare' ),
	),
);