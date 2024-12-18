<div class="pbmit-fld-contents">
	<div class="pbmit-fld-wrap">
		<div class="pbmit-icon-wrap">
			<?php echo pbmit_esc_kses($icon); ?>
			<h3 class="pbmit-fid-title"><?php echo pbmit_esc_kses($title); ?></h3>
		</div>
		<h4 class="pbmit-fid-inner">
			<span class="pbmit-fid-before"><?php echo pbmit_esc_kses( $before_text ); ?></span>
			<span
				class				  = "pbmit-number-rotate"
				data-appear-animation = "animateDigits"
				data-from			 = "0"
				data-to			   = "<?php echo esc_html( $digit ); ?>"
				data-interval		 = "<?php echo esc_html( $interval ); ?>"
				data-before		   = ""
				data-before-style	 = ""
				data-after			= ""
				data-after-style	  = ""
				>
					<?php echo esc_html( $digit ); ?>
			</span>
			<span class="pbmit-fid"><?php echo pbmit_esc_kses( $after_text ); ?></span>
		</h4>
	</div>
</div><!-- .pbmit-fld-contents -->
