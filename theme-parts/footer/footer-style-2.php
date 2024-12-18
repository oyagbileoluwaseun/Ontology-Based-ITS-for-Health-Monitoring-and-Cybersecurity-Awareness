<?php
$footer_widget_columns	= pbmit_footer_widget_columns(); // array
$widget_exists			= $footer_widget_columns[0];
$footer_columns			= $footer_widget_columns[1];
$footer_column			= $footer_widget_columns[2];
$footer_boxes_area = pbmit_get_base_option('footer-boxes-area');

if( $footer_boxes_area == '1' ){ ?>
	<div class="pbmit-footer-section pbmit-footer-big-area-wrapper pbmit-bg-color-transparent">
		<div class="footer-wrap pbmit-footer-big-area">
			<div class="container">
				<div class="row">		
					<div class="col-xl-4 col-sm-12 pbmit-footer-left">
						<?php $footer_left_area = pbmit_get_base_option('footer-left-area');
						if( !empty($footer_left_area) ){
						echo pbmit_esc_kses( do_shortcode( $footer_left_area ) );
						} ?>
					</div>
					<div class="col-xl-8 col-sm-12 pbmit-footer-right">
						<?php $footer_right_area = pbmit_get_base_option('footer-right-area'); ?>
						<?php echo pbmit_esc_kses( $footer_right_area ); ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php if( $widget_exists==true ) : ?>
<div class=" pbmit-footer-section footer-wrap pbmit-footer-widget-area <?php pbmit_footer_widget_classes(); ?>">
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

<div class="pbmit-footer-section pbmit-footer-text-area <?php pbmit_footer_copyright_classes(); ?>">
	<div class="container">
		<div class="pbmit-footer-text-inner">
			<div class="row">
				<?php pbmit_footer_copyright_area(); ?>
			</div>
		</div>	
	</div>	
</div>