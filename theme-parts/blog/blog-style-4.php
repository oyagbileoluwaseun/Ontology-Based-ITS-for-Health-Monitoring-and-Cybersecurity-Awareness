<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-400x400'; } ?>
<div class="post-item">
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-content-inner">
			<?php pbmit_get_featured_data( array( 'size' => esc_attr($imgsize) ) ); ?>
			<div class= "pbmit-meta-wraper">
				<div class="pbmit-meta-date-wrapper pbmit-meta-line">
					<div class="pbmit-meta-date">
						<span class="pbmit-post-date"><i class="pbmit-base-icon-calendar-3"></i><?php echo get_the_date( 'F  d. Y' ); ?></span>
					</div>
				</div>
				<div class="pbmit-meta-author pbmit-meta-line">
					<span class="pbmit-post-author"><i class="pbmit-base-icon-user-3"></i><?php echo get_the_author(); ?></span>
				</div>
				<div class="pbmit-content-wrapper">
					<h3 class="pbmit-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
				</div>
			</div>
		</div>
	</div>
	<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
</div>