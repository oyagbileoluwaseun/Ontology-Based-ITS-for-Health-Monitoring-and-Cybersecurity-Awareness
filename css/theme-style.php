<?php
// Getting all options with values
$all_data = pbmit_get_all_option_array();

$gradient_first = '#ffff00';
$gradient_last  = '#ffff00';
$responsive_breakpoint	= '1200';
$preheader_responsive	= '1200';
if( function_exists('pbmit_get_base_option') ){
	$gradient_colors = pbmit_get_base_option('gradient-color');
	$gradient_first  = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ffff00' ;
	$gradient_last   = ( !empty($gradient_colors['last'])  ) ? $gradient_colors['last']  : '#ffff00' ;

	$responsive_breakpoint	= pbmit_get_base_option('responsive-breakpoint');
	$preheader_responsive	= pbmit_get_base_option('preheader-responsive');
	$service_single_image_hide	= pbmit_get_base_option('service-single-image-hide');
}

// new code start here
$new_all_data = array();
foreach( $all_data as $key=>$val ){
	$key			= str_replace( '_', '-', $key );
	$key			= str_replace( '_', '-', $key );
	$key			= str_replace( '_', '-', $key );
	$key			= str_replace( '_', '-', $key );
	$key			= str_replace( '_', '-', $key );
	$new_all_data[$key] = $val;
}

// allowed to create css variables
$allowed = array(
	'global-color',
	'secondary-color',
	'gradient-color',
	'white-color',
	'blackish-color',
	'light-bg-color',
	'blackish-bg-color',
	'body-bg-color',
	'header-height',
	'sticky-header-height',
	'responsive-breakpoint',
	'main-menu-typography',
	'main-menu-sticky-color',
	'main-menu-sticky-active-color',
	'preheader-bgcolor-custom',
	'header-background-color',
	'menu-background-color',
	'sticky-header-background-color',
	'link-color',
	'header-height',
	'logo-height',
	'responsive-logo-height',
	'burger-logo-height',
	'titlebar-height',
	'sticky-logo-height',
	'light-bg-color',
	'footer-1-col-width',
	'footer-2-col-width',
	'footer-3-col-width',
	'footer-4-col-width',
);
?>

:root {
<?php
foreach( $new_all_data as $key=>$val ){

	if( in_array( $key, array( 'sticky-logo-height', 'responsive-logo-height', 'header-height', 'sticky-header-height', 'logo-height', 'responsive-logo-height', 'responsive-breakpoint', 'titlebar-height' , 'burger-logo-height') ) ){
		$val .= 'px';
	}
	if( in_array( $key, array( 'footer-1-col-width', 'footer-2-col-width', 'footer-3-col-width', 'footer-4-col-width' ) ) ){
		$val .= '%';
	}

	if( in_array( $key, $allowed ) ){
		if( is_array($val) ){
			foreach( $val as $val_key=>$val_val ){
				if( !empty($val_val) ){
				?>
	--pbmit-xcare-<?php echo esc_attr($key); ?>-<?php echo esc_attr($val_key); ?>: <?php echo esc_attr($val_val); ?>;
<?php
				}
			}
		} else {
		?>
	--pbmit-xcare-<?php echo esc_attr($key); ?>: <?php echo esc_attr($val) ?>;
<?php

		}
	}
}

// value is color for the option
$colors = array(
	'global-color',
	'secondary-color',
	'white-color',
	'blackish-color',
	'light-bg-color',
	'blackish-bg-color',
	'main-menu-typography',
	'titlebar-breadcrumb-typography',
);

foreach( $new_all_data as $key=>$val ){
	if( in_array( $key, $colors ) ){
		if( is_array($val) && isset($val['color']) ){
			$key .= '-color';
			$val = $val['color'];
		}
		?>
	--pbmit-xcare-<?php echo esc_attr($key); ?>-rgb: <?php echo esc_attr( pbmit_hex2rgb_code($val) ) ?>;
<?php
	}
}
?>

} /* CSS :root ends here */

<?php echo pbmit_all_options_values('background'); ?>
<?php echo pbmit_all_options_values('typography'); ?>

/*====================================  End Min Break Point  ====================================*/

<?php if( !empty($preheader_responsive) ){ ?>
@media screen and (max-width: <?php echo esc_html($preheader_responsive); ?>px) {
	.pbmit-pre-header-wrapper{
		display: none;
	}
}
<?php } ?>
<?php
$footer_column	= pbmit_get_base_option('footer-column');
if( $footer_column=='custom' ) :
	$footer_column_1	= pbmit_get_base_option('footer-1-col-width');
	$footer_column_2	= pbmit_get_base_option('footer-2-col-width');
	$footer_column_3	= pbmit_get_base_option('footer-3-col-width');
	$footer_column_4	= pbmit_get_base_option('footer-4-col-width');
	?>
	@media screen and (min-width: 992px) {
		<?php if( !empty($footer_column_1) && $footer_column_1!='hide' ) : ?>
		.site-footer .pbmit-footer-widget.pbmit-footer-widget-col-1{
			-ms-flex: 0 0 var(--pbmit-xcare-footer-1-col-width);
			flex: 0 0 var(--pbmit-xcare-footer-1-col-width);
			max-width: var(--pbmit-xcare-footer-1-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_2) && $footer_column_2!='hide' ) : ?>
		.site-footer .pbmit-footer-widget.pbmit-footer-widget-col-2{
			-ms-flex: 0 0 var(--pbmit-xcare-footer-2-col-width);
			flex: 0 0 var(--pbmit-xcare-footer-2-col-width);
			max-width: var(--pbmit-xcare-footer-2-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_3) && $footer_column_3!='hide' ) : ?>
		.site-footer .pbmit-footer-widget.pbmit-footer-widget-col-3{
			-ms-flex: 0 0 var(--pbmit-xcare-footer-3-col-width);
			flex: 0 0 var(--pbmit-xcare-footer-3-col-width);
			max-width: var(--pbmit-xcare-footer-3-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_4) && $footer_column_4!='hide' ) : ?>
		.site-footer .pbmit-footer-widget.pbmit-footer-widget-col-4{
			-ms-flex: 0 0 var(--pbmit-xcare-footer-4-col-width);
			flex: 0 0 var(--pbmit-xcare-footer-4-col-width);
			max-width: var(--pbmit-xcare-footer-4-col-width);
		}
		<?php endif; ?>
	}
<?php endif; ?>

/* Hide single image in service */
<?php if($service_single_image_hide==true) { ?>
.single.single-pbmit-service .pbmit-service-single .pbmit-service-feature-image img {
	display: none;
}
<?php }?>
