<div class="pbmit-ihbox-headingicon d-flex align-items-center">
	<div class="pbmit-ihbox-contents">
		<?php echo pbmit_esc_kses( $box_number_html ); ?>
		<?php echo pbmit_esc_kses( $subtitle_html ); ?>
		<?php echo pbmit_esc_kses( $title_html ); ?>
		<?php echo pbmit_esc_kses( $desc_html ); ?>
		<?php echo pbmit_esc_kses( $button_html ); ?>
	</div><!-- .pbmit-ihbox-contents -->
	<a class="pbmit-lightbox-video" href="<?php echo esc_attr($icon_link); ?>">
		<div class="pbmit-feature-wrapper-img">	
			<?php echo pbmit_esc_kses( $image_html ); ?>
		</div>
		<?php echo pbmit_esc_kses( $icon_html ); ?>
	</a>
</div>

