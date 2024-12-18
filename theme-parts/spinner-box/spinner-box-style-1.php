<?php use Elementor\Icons_Manager; ?>

<a class="pbmit-scroll-section" href = "<?php echo pbmit_esc_kses($settings['icon_link']['url']) ?>" >
	<div class="pbmit-ihbox-box">
		<?php if ( !empty($icon_html)){
			echo pbmit_esc_kses( $icon_html );
		} else { ?>
			<?php Icons_Manager::render_icon( $icon_html, [ 'aria-hidden' => 'true' ] );
		} ?>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 200 200">
			<defs>
				<path d="M0, 100a100, 100 0 1, 0 200, 0a100, 100 0 1, 0 -200, 0" id="txt-path"></path>
			</defs>
			<circle cx="150" cy="100" r="75" fill="none"/>
			<text font-size="15" font-family="Sora,sans-serif" font-weight="500">
				<textPath startOffset="0" xlink:href="#txt-path"><?php echo esc_html( trim(strip_tags($title_html)) ); ?></textPath>
			</text>
		</svg>
	</div>
</a>