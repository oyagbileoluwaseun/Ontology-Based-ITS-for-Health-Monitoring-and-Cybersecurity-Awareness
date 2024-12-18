<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-890x660'; } ?>
<div class="post-item">
	<div class="pbminfotech-box-content">
		<div class="pbmit-featured-container">
			<?php pbmit_get_featured_data( array( 'size' => esc_attr($imgsize) ) ); ?>
			<a class="pbmit-blog-btn" href="<?php the_permalink(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
			<div class="pbmit-meta-cat-wrapper pbmit-meta-line">
				<div class="pbmit-meta-category"><?php echo get_the_category_list( ' ' ); ?></div>
			</div>
			<?php
			$catlist = get_the_category_list( ', ' );
			if( !empty($catlist) ) : ?>
			<?php endif; ?>
			<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
		</div>
		<div class= "pbmit-category-date-wraper d-flex align-items-center">
			<div class="pbmit-meta-date-wrapper pbmit-meta-line">
				<div class="pbmit-meta-date">
					<span class="pbmit-post-date"><i class="pbmit-base-icon-calendar-3"></i><?php echo get_the_date( 'F  d. Y' ); ?></span>
				</div>
			</div>
			<div class="pbmit-meta-author pbmit-meta-line">
				<span class="pbmit-post-author"><i class="pbmit-base-icon-user-3"></i><?php echo get_the_author(); ?></span>
			</div>
		</div>
		<div class="pbmit-content-wrapper">
			<h3 class="pbmit-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
</div>