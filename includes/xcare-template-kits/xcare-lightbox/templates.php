<script type="text/template" id="tmpl-xcare-templates">
	<#
	if ( data.templates ) {
		#>
		<div id="elementor-template-library-templates">
			<div id="elementor-template-library-toolbar">
				<div id="elementor-template-library-filter-text-wrapper">
					<label for="elementor-template-library-filter-text" class="elementor-screen-only"><?php echo esc_html__( 'Search Templates:', 'xcare' ); ?></label>
					<input id="elementor-template-library-filter-text" placeholder="<?php echo esc_attr__( 'Search', 'xcare' ); ?>">
				</div>
			</div>
			<div id="elementor-template-library-templates-container" class="xcare-template-kits-templates">
				<#
				_.each( data.templates, function( templates_data, templates_id ) {
					var cats = Object.keys( templates_data.category );
					var hidden_class = '';
					if( cats[0] != 'sections' ){
						hidden_class = 'cat-hidden';
					}
					#>
					<div class="xcare-template-kits-template elementor-template-library-template elementor-template-library-template-remote elementor-template-library-template-{{{ templates_data.type }}} {{{ hidden_class }}}" data-template_id="{{{ templates_id }}}" data-template_cat="{{{ cats }}}">
						<div class="elementor-template-library-template-body">
							<img src="{{{ templates_data.thumbnail }}}">
							<div class="elementor-template-library-template-preview">
								<i class="eicon-zoom-in-bold" aria-hidden="true"></i>
							</div>
						</div>
						<div class="elementor-template-library-template-footer">
							<a class="elementor-template-library-template-action elementor-template-library-template-insert elementor-button" data-template_id="{{{ templates_id }}}">
								<i class="eicon-file-download" aria-hidden="true"></i>
								<span class="elementor-button-title"><?php echo esc_html__( 'Insert', 'xcare' ); ?></span>
							</a>
							<div class="elementor-template-library-template-name">{{{ templates_data.title }}}</div>
						</div>
					</div>
					<#
				} );
				#>
			</div>
		</div>
		<#
	}
	#>
</script>
