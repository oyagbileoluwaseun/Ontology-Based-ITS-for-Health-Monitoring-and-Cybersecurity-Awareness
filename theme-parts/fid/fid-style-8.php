<div class="pbmit-fld-contents">
	<div class="pbmit-circle-outer"
			data-digit			= "<?php echo esc_html($digit); ?>"
			data-fill			= "<?php echo esc_html($white_color); ?>"
			data-emptyfill		= "transparent"
			data-before			= "<?php echo esc_html($before_text); ?>"
			data-before-type	= "<?php echo esc_html($beforetextstyle); ?>"
			data-after			= "<?php echo esc_html($after_text); ?>"
			data-after-type		= "<?php echo esc_html($aftertextstyle); ?>"
			data-thickness		= "3"
			data-size			= "130"
			>
		<div class="pbmit-circle">
			<h4 class="pbmit-fid-inner">
				<span class="pbmit-fid"><?php echo pbmit_esc_kses( $before_text ); ?></span>
				<span
				class					= "pbmit-number-rotate"
				data-appear-animation	= "animateDigits"
				data-from				= "0"
				data-to					= "<?php echo esc_html( $digit ); ?>"
				data-interval			= "<?php echo esc_html( $interval ); ?>"
				data-before				= ""
				data-before-style		= ""
				data-after				= ""
				data-after-style		= "">
					<?php echo esc_html( $digit ); ?>
				</span>
				<span class="pbmit-fid"><?php echo pbmit_esc_kses( $after_text ); ?></span>
			</h4>
		</div>
	</div>
	<div class="pbmit-fid-sub">
		<h3 class="pbmit-fid-title"><?php echo pbmit_esc_kses($title); ?></h3>
	</div>
</div><!-- .pbmit-fld-contents -->