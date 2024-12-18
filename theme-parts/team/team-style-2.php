<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-360x400'; } // Default image size ?>
<div class="pbminfotech-post-item">
	<div class="pbminfotech-box-content">
		<div class="pbmit-team-title-wapper d-flex">
			<h3 class="pbmit-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<?php pbmit_team_designation(); ?>
		</div>
		<div class="pbminfotech-team-wrapper">
			<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
		</div>				
		<a class="pbmit-team-btn" href="<?php the_permalink(); ?>"><span class="pbmit-button-text"><?php echo esc_attr__('Read More','xcare'); ?></span><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
	</div>
	<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
</div>