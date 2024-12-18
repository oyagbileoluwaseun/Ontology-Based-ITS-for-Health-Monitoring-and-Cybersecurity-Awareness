<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.0
 */
?>
<?php
$sidebar	= 'pbmit-sidebar-post';
$aria_label	= esc_attr__( 'Blog Sidebar', 'xcare' );
if( is_page() ){
	// page sidebar
	$sidebar	= 'pbmit-sidebar-page';
	$aria_label	= esc_attr__( 'Page Sidebar', 'xcare' );
	if( function_exists('is_woocommerce') && is_woocommerce() ){
		$sidebar	= 'pbmit-sidebar-wc-shop';
		$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'xcare' );
	}
} else if( is_search() ){
	$sidebar	= 'pbmit-sidebar-search';
	$aria_label	= esc_attr__( 'Search Results Sidebar', 'xcare' );
} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
	$sidebar	= 'pbmit-sidebar-wc-shop';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'xcare' );
} else if( function_exists('is_product') && is_product() ){
	$sidebar	= 'pbmit-sidebar-wc-single';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'xcare' );
} else if( is_singular('event_listing') ){
	$sidebar		= 'pbmit-sidebar-event-single';
	$aria_label		= esc_attr__( 'Single Event Sidebar', 'xcare' );
} else if( is_tax('event_listing_category') || is_tax('event_listing_type') || is_singular( 'event_organizer' ) || is_singular( 'event_venue' ) ){
	$sidebar		= 'pbmit-sidebar-event';
	$aria_label		= esc_attr__( 'Event Sidebar', 'xcare' );
} else if( is_singular('pbmit-portfolio') ){
	$sidebar		= 'pbmit-sidebar-portfolio';
	$aria_label		= esc_attr__( 'Portfolio Sidebar', 'xcare' );
} else if( is_tax('pbmit-portfolio-category') || is_post_type_archive('pbmit-portfolio') ){
	$sidebar		= 'pbmit-sidebar-portfolio-cat';
	$aria_label		= esc_attr__( 'Portfolio Category Sidebar', 'xcare' );
} else if( is_singular('pbmit-service') ){
	$sidebar		= 'pbmit-sidebar-service';
	$aria_label		= esc_attr__( 'Service Sidebar', 'xcare' );
} else if( is_tax('pbmit-service-category') || is_post_type_archive('pbmit-service') ){
	$sidebar		= 'pbmit-sidebar-service-cat';
	$aria_label		= esc_attr__( 'Service Category Sidebar', 'xcare' );
} else if( is_singular('pbmit-team-member') ){
	$sidebar		= 'pbmit-sidebar-team';
	$aria_label		= esc_attr__( 'Team Member Sidebar', 'xcare' );
} else if( is_tax('pbmit-team-group') || is_post_type_archive('pbmit-team-member') ){
	$sidebar		= 'pbmit-sidebar-team-group';
	$aria_label		= esc_attr__( 'Team Group Sidebar', 'xcare' );
}

// check if content exists for the sidebar
$sidebar_content = '';
ob_start();
dynamic_sidebar( $sidebar );
$sidebar_content = ob_get_clean();

?>
<?php if ( is_active_sidebar( $sidebar ) && pbmit_check_sidebar()==true && !empty($sidebar_content) ) : ?>
<aside id="secondary" class="widget-area pbminfotech-sidebar col-md-3 col-lg-3" aria-label="<?php echo esc_attr( $aria_label ); ?>">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
<?php endif; ?>