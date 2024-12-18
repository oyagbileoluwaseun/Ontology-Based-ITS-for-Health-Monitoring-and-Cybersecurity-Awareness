<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
	'title' 		=> esc_html__( 'Counter One', 'xcare' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Sections', 'xcare' ),
	),
	'tags'			 => array(
		esc_html__( 'Demo 12', 'xcare' ),
		esc_html__( 'Demo 12', 'xcare' ),
		esc_html__( 'Homepage', 'xcare' ),
	),
);