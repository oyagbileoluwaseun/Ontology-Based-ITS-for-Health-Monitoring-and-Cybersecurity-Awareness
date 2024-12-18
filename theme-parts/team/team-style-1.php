<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-650x830'; } // Default image size ?>
<div class="pbminfotech-post-item">
	<div class="pbmit-featured-wrap">
		<?php pbmit_get_featured_data( array( 'size' => esc_attr($imgsize) ) ); ?>
		<div class="pbmit-team-btn"><a class="pbmit-team-text" href="#"><i class="pbmit-base-icon-share-1"></i></a>
			<div class="pbminfotech-box-social-links">
				<?php echo pbmit_team_social_links(); ?>
			</div>
		</div>
	</div>
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-box-content-inner">
			<?php pbmit_team_designation(); ?>
			<h3 class="pbmit-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
</div>