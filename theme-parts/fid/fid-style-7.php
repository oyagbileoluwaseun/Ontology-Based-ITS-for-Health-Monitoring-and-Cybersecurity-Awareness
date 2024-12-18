<div class="pbmit-fld-contents">
	<div class="pbmit-fld-wrap">
		<h4 class="pbmit-fid-inner">
			<span class="pbmit-fid-before"><?php echo pbmit_esc_kses( $before_text ); ?></span>
			<span
				class					= "pbmit-number-rotate"
				data-appear-animation	= "animateDigits"
				data-from				= "0"
				data-to					= "<?php echo esc_html( $digit ); ?>"
				data-interval			= "<?php echo esc_html( $interval ); ?>"
				data-before				= ""
				data-before-style		= ""
				data-after				= ""
				data-after-style		= ""
				>
					<?php echo esc_html( $digit ); ?>
			</span>
			<span class="pbmit-fid"><?php echo pbmit_esc_kses( $after_text ); ?></span>
		</h4>
		<div class="pbmit-fid-sub">
			<h3 class="pbmit-fid-title"><?php echo pbmit_esc_kses($title); ?></h3>
		</div>
	</div>
</div><!-- .pbmit-fld-contents -->
<div class="pbmit-sticky-corner pbmit-top-left-corner">
	<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
	</svg>
</div>
<div class="pbmit-sticky-corner  pbmit-bottom-right-corner">
	<svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg">
		<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
	</svg>
</div>