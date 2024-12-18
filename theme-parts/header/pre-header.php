<?php
/**
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
$preheader_enable = pbmit_get_base_option('preheader-enable');
if( $preheader_enable==1 ) :
	?>
	<div class="pbmit-pre-header-wrapper <?php pbmit_preheader_class(); ?>">
		<div class="container">
			<div class="d-flex justify-content-between">
				<?php
				$preheader_left = pbmit_get_base_option('preheader-left');
				if( !empty($preheader_left) ){ ?>
					<div class="pbmit-pre-header-left"><?php echo pbmit_esc_kses( do_shortcode($preheader_left) ); ?></div><!-- .pbmit-pre-header-left -->
				<?php } ?>
				<?php
				$preheader_right = pbmit_get_base_option('preheader-right');
				$preheader_search = pbmit_get_base_option('preheader-search');
				if( !empty($preheader_right) || $preheader_search==true ){ ?>
					<div class="pbmit-pre-header-right">

						<?php if( !empty($preheader_right) ) { echo pbmit_esc_kses( do_shortcode($preheader_right) ); } ?>
						<?php if( $preheader_search==true ) { echo pbmit_esc_kses( '<div class="pbmit-header-search-btn"><a href="#"><i class="pbmit-base-icon-search"></i></a></div>' ); } ?>

					</div><!-- .pbmit-pre-header-right -->
				<?php } ?>
			</div><!-- .justify-content-between -->
		</div><!-- .container -->
	</div><!-- .pbmit-pre-header-wrapper -->
<?php endif; ?>