<?php
defined( 'ABSPATH' ) || exit('restricted access');

return array(
	'title' 		=> esc_html__( 'Our History', 'xcare' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Pages', 'xcare' ),
	),
	'tags'			 => array(
		esc_html__( 'Demo 1', 'xcare' ),
		esc_html__( 'Demo 1', 'xcare' ),
		esc_html__( 'Homepage', 'xcare' ),
	),
);
