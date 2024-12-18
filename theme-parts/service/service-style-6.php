<?php

use Elementor\Icons_Manager;

if( empty($imgsize)){ $imgsize = 'pbmit-img-770x570'; } // Default image size

// Icon
$icon_html = $icon_array = '';
$custom_icon_enabled = get_post_meta( get_the_ID(), 'pbmit-custom-icon-enabled', true );
if( $custom_icon_enabled=='1' ){
	$img_src = '';
	$custom_icon_url = get_post_meta( get_the_ID(), 'pbmit-custom-icon', true );
	if( !empty($custom_icon_url) ){
		$img_src = wp_get_attachment_image_src($custom_icon_url, 'full');
		if( !empty($img_src[0]) ){ $custom_icon_url = $img_src[0]; }
	}
	$icon_html = '<img src="'.$custom_icon_url.'"/>';
}else{
	$icon_lib = get_post_meta( get_the_ID(), 'pbmit-service-icon-library', true );
	wp_enqueue_style($icon_lib);
	$icon_class = get_post_meta( get_the_ID(), 'pbmit-service-icon-'.$icon_lib, true );

	// icon library name for the function
	$icon_lib2 = $icon_lib;
	if( $icon_lib == 'elementor-icons-fa-regular' ){
		$icon_lib2 = 'fa-regular';
	} else if( $icon_lib == 'elementor-icons-fa-solid' ){
		$icon_lib2 = 'fa-solid';
	} else if( $icon_lib == 'elementor-icons-fa-brands' ){
		$icon_lib2 = 'fa-brands';
	}
	$icon_array = array(
		'value' => $icon_class,
		'library' => $icon_lib2,
	);
}

// featured image src only
$img_src = '';
if ( has_post_thumbnail( get_the_ID() ) ) {
	$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'full' );
};

?>

<div class="pbminfotech-post-item">
	<div class="pbminfotech-box-content">
		<div class="pbmit-box-content-wrap">
			<div class="pbmit-service-image-wrapper">
				<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
				<a class="pbmit-service-btn" href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
			</div>
			<div class="pbmit-box-content-inner">
				<div class="pbmit-contant-box">
					<div class="pbmit-serv-cat"><?php echo get_the_term_list( get_the_ID(), 'pbmit-service-category', '', ', ' ); ?></div>
					<h3 class="pbmit-service-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					<?php
					// Short Description
					$short_desc = get_post_meta( get_the_ID(), 'pbmit-short-description', true );
					if( !empty($short_desc) ){
						?>
						<div class="pbmit-service-description">
							<?php echo do_shortcode($short_desc); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<a class="pbmit-service-btn" href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
	</div>
	<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
</div>