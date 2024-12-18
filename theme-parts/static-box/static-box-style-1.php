<div class="pbmit-bg-imgbox" style= "background-image: url(<?php echo  pbmit_esc_kses($box['image']['url'] );?>);" >
	<div class="pbmit-img-text" >		
		<div class= "pbmit-text d-flex align-items-center justify-content-center">
			<?php echo pbmit_esc_kses($box_number_html); ?>
			<?php echo pbmit_esc_kses($label_html); ?>
		</div>
	</div>
</div>
<div class= "pbmit-img">
	<?php echo pbmit_esc_kses($image_html); ?>
</div>
<div class="pbmit-contentbox">
	<div class="pbmit-contentbox-inner">
		<?php echo pbmit_esc_kses($icon_html); ?>
		<?php echo pbmit_esc_kses($label_html); ?>
		<?php echo pbmit_esc_kses($smalltext_html); ?>
		<?php echo pbmit_esc_kses($button_html); ?>
	</div>
</div>