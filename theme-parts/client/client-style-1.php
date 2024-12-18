<?php $hover_img = pbmit_client_hover_img(); ?>
<div class="pbmit-border-wrapper">
	<div class="pbmit-client-wrapper<?php if(!empty($hover_img)){ ?> pbmit-client-with-hover-img<?php } ?>">
		<h4 class="pbmit-hide"><?php echo get_the_title(); ?></h4>
		<?php pbmit_client_logo_link('start'); ?>
		<?php echo pbmit_esc_kses(pbmit_client_hover_img()); ?>
		<?php pbmit_get_featured_data( array( 'size' => 'pbmit-img-770x9999', 'with_link' => false ) ); ?>
		<?php pbmit_client_logo_link('end'); ?>
	</div>
</div>