<?php
/**
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
$titlebar_enable = pbmit_get_base_option('titlebar-enable');
if( is_page() || is_singular() || is_home() ){
	$page_id = get_the_ID();
	if( is_home() ){
		$page_id = get_option( 'page_for_posts');
	}
	
	$post_meta = get_post_meta( $page_id, 'pbmit-titlebar-hide', true );
	if( $post_meta=='1' ){
		$titlebar_enable = 0;
	}
}
if( $titlebar_enable==1 ) :
	?>
	<div class="pbmit-title-bar-wrapper <?php pbmit_titlebar_class(); ?>">
		<div class="container">
			<div class="pbmit-title-bar-content">
				<div class="pbmit-title-bar-content-inner">
					<?php echo pbmit_titlebar_headings(); ?>
					<?php echo pbmit_titlebar_breadcrumb(); ?>
				</div>
			</div><!-- .pbmit-title-bar-content -->
		</div><!-- .container -->
	</div><!-- .pbmit-title-bar-wrapper -->
<?php endif; ?>