<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-640x710'; } // Default image size 
// featured image src only
$img_src = '';
if ( has_post_thumbnail( get_the_ID() ) ) {
	$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'full' );
};
?>
<div class="post-item d-flex">
	<div class="pbmit-featured-container">
		<div class="pbmit-bg-image" <?php if( !empty( $img_src[0] ) ) : ?> style="background-image:url('<?php echo esc_url( $img_src[0]); ?>');" <?php endif; ?>>
			<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>	
		</div>
	</div>
	<div class="pbminfotech-box-wrap">
	<div class="pbminfotech-box-content">
		<div class= "pbmit-date-admin-wraper d-flex align-items-center">
			<div class="pbmit-meta-date pbmit-meta-line">
				<span class="pbmit-post-date"><i class=" pbmit-base-icon-calendar-3"></i><?php echo get_the_date( 'F  d. Y' ); ?></span>
			</div>
			<div class="pbmit-meta-author pbmit-meta-line">
				<span class="pbmit-post-author"><i class="pbmit-base-icon-user-3"></i><?php echo get_the_author(); ?></span>
			</div>
		</div>
		<h3 class="pbmit-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		<div class="pbminfotech-box-desc">
			<?php
			$limit  = pbmit_get_base_option('blog-element-limit');
			$limit_switch  = pbmit_get_base_option('blog-element-limit-switch');
			if ( has_excerpt() ){
				the_excerpt();
			} else if( $limit>0 && $limit_switch=='1' ){
				$content = get_the_content('',FALSE,'');
				$content = wp_strip_all_tags($content);
				$content = strip_shortcodes($content);
				echo pbmit_esc_kses( wp_trim_words($content, $limit) );
			} else {
				the_content( '' );
			}
			?> 
  		</div>
		  </div>
		<a class="pbmit-blog-btn" href="<?php the_permalink(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
		</div>
	
</div>