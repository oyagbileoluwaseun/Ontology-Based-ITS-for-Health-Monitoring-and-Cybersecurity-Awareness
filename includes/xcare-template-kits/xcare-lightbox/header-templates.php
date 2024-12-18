<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<script type="text/template" id="tmpl-xcare-header-templates">
	<div class="elementor-templates-modal__header" style="color: #fff; background-color: {{{ data.icon_bg_color }}}">
		<div class="elementor-templates-modal__header__logo-area">
			<div class="elementor-templates-modal__header__logo">
				<span class="elementor-templates-modal__header__logo__icon-wrapper e-logo-wrapper" style="background-color: {{{ data.icon_bg_color }}}">
					<img src="{{{ data.icon }}}" height="16px">
				</span>
				<span class="elementor-templates-modal__header__logo__title" style= "color:#fff;">{{{ data.title }}}</span>
			</div>
		</div>
		<div class="elementor-templates-modal__header__menu-area">
			<div id="elementor-template-library-filter-toolbar-remote" class="elementor-template-library-filter-toolbar">
				<#
				if ( data.categories ) {
					#>
					<div id="elementor-template-library-filter">
						<# _.each( data.categories, function( category_v, category_k ) {
							if ( 'sections' == category_k ) {
								#>
								<div data-value="{{ category_k }}" class="pbm-elementor-component-tab elementor-template-library-filter-tab selected">{{{ category_v }}}</div>
								<#
							} else {
								#>
								<div data-value="{{ category_k }}" class="pbm-elementor-component-tab elementor-template-library-filter-tab">{{{ category_v }}}</div>
								<#
							}
						} ); #>
					</div>
					<#
				}
				#>
			</div>
		</div>
		<div class="elementor-templates-modal__header__items-area">
			<# if ( data.closeType ) { #>
				<div class="elementor-templates-modal__header__close elementor-templates-modal__header__close--{{{ data.closeType }}} elementor-templates-modal__header__item" style="border-left: none;">
					<# if ( 'skip' === data.closeType ) { #>
					<span><?php echo esc_html__( 'Skip', 'xcare' ); ?></span>
					<# } #>
					<i class="eicon-close" aria-hidden="true" title="<?php echo esc_html__( 'Close', 'xcare' ); ?>" style="color: #fff"></i>
					<span class="elementor-screen-only"><?php echo esc_html__( 'Close', 'xcare' ); ?></span>
				</div>
			<# } #>
			<div id="elementor-template-library-header-tools">
				<div id="elementor-template-library-header-actions"></div>
			</div>
		</div>
	</div>
</script>
