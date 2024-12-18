<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
	'title' 		=> esc_html__( 'Blog', 'xcare' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Sections', 'xcare' ),
	),
	'tags'			 => array(
		esc_html__( 'Demo 02', 'xcare' ),
		esc_html__( 'Demo 02', 'xcare' ),
		esc_html__( 'Homepage', 'xcare' ),
	),
);