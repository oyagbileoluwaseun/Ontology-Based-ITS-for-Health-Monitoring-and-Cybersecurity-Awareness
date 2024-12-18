<div class="pbminfotech-post-item">	
	<div class="pbmit-box-content-wrap">
	<?php pbmit_star_ratings_text() ?>
	<?php pbmit_testimonial_star_ratings(); ?>
		<div class="pbminfotech-box-desc">
			<blockquote class="pbminfotech-testimonial-text"><?php the_content(''); ?></blockquote>
		</div>
		<div class="pbminfotech-box-author d-flex align-items-center">
			<div class="pbminfotech-box-img">
				<?php pbmit_get_featured_data( array( 'size' => 'pbmit-img-780x630', 'with_link' => false ) ); ?>
			</div>
			<div class="pbmit-auther-content">
				<h3 class="pbminfotech-box-title"><?php echo get_the_title(); ?></h3>
				<?php pbmit_testimonial_details(); ?>
			</div>
		</div>
	</div>
</div>