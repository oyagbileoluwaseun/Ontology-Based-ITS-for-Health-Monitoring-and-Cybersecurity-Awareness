<?php
$footer_widget_columns	= pbmit_footer_widget_columns(); // array
$widget_exists			= $footer_widget_columns[0];
$footer_columns			= $footer_widget_columns[1];
$footer_column			= $footer_widget_columns[2];

if( $widget_exists==true ) : ?>
<div class="pbmit-footer-section footer-wrap pbmit-footer-widget-area <?php pbmit_footer_widget_classes(); ?>">
	<div class="container">
		<div class="row">
			<?php 
			$col = 1;
			foreach( $footer_columns as $column ){
				$class = ( $footer_column == '3-3-3-3' ) ? 'col-md-6 col-lg-3' : 'col-md-'.$column ;
				if ( is_active_sidebar( 'pbmit-footer-'.$col ) ) { ?>
					<div class="pbmit-footer-widget pbmit-footer-widget-col-<?php echo esc_attr($col); ?> <?php echo esc_attr($class); ?>">
						<?php dynamic_sidebar( 'pbmit-footer-'.$col ); ?>
					</div><!-- .pbmit-footer-widget -->
				<?php };
				$col++;
			} // end foreach
			?>
		</div><!-- .row -->
	</div>	
</div>
<?php endif; ?>
<?php pbmit_footer_overlay_boxes(); ?>
<div class="pbmit-footer-section pbmit-footer-text-area <?php pbmit_footer_copyright_classes(); ?>">
	<div class="container">
		<div class="pbmit-footer-text-inner">
			<div class="row">
				<?php pbmit_footer_copyright_area(); ?>
			</div>
		</div>	
	</div>	
</div>