<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Xcare
 * @since 1.0
 * @version 1.2
 */
// Class list
$progressbar_title = '';
$style		= pbmit_get_base_option('team-single-style');
$class_list	= 'pbmit-team-single-style-'.$style;
// Team Member details
$designation	= get_post_meta( get_the_ID(), 'pbmit-team-details_designation', true ); 
if( !empty($designation) ){ $designation = '<h4 class="pbmit-team-designation">' . esc_attr($designation) . '</h4>'; }
$email			= get_post_meta( get_the_ID(), 'pbmit-team-details_email', true ); 
if( !empty($email) ){ $email = '<li><label>'.esc_html__('Email', 'xcare').'</label> <a href="mailto:' . sanitize_email($email) . '">' . esc_attr($email) . '</a></li>'; }
$phone			= get_post_meta( get_the_ID(), 'pbmit-team-details_phone', true ); 
if( !empty($phone) ){ $phone = '<li><label>'.esc_html__('Phone', 'xcare').'</label> ' . esc_attr($phone) . '</li>'; }
$sitetitle		= get_post_meta( get_the_ID(), 'pbmit-team-details_sitetitle', true );
$siteurl		= get_post_meta( get_the_ID(), 'pbmit-team-details_siteurl', true ); 
$site			= '';
if( !empty($siteurl) ){
	$sitetitle		= ( empty($sitetitle) ) ? $siteurl : $sitetitle ;
	$site = '<li><label>'.esc_html__('Website', 'xcare').'</label> <a href="' . esc_url($siteurl) . '">' . esc_attr($sitetitle) . '</a> </li>';
}
$fax			= get_post_meta( get_the_ID(), 'pbmit-team-details_fax', true ); 
if( !empty($fax) ){ $fax = '<li><label>'.esc_html__('Experience', 'xcare').'</label> ' . esc_attr($fax) . '</li>'; }

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="pbmit-team-single">
		<div class="pbmit-team-single-inner">
			<div class="pbmit-team-single-info">
				<div class="row ">
					<div class="col-md-12 col-lg-6">
						<div class="pbmit-team-left-inner">
							<?php pbmit_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full', 'with_link' => false ) ); ?>
						</div>
					</div>
					<div class="col-md-12 col-lg-6 pbmit-team-detail">
						<div class="pbmit-team-des">
							<div class="pbmit-team-summary">							
								<?php echo pbmit_esc_kses($designation); ?>	
								<h2 class="pbmit-team-title"><?php the_title(); ?></h2>	
							</div>
							<?php
									// Short Description
									$short_desc = get_post_meta( get_the_ID(), 'pbmit-team-details_short-description', true );
									if( !empty($short_desc) ){
										?>
										<div class="pbmit-short-description">
											<?php echo do_shortcode($short_desc); ?>
										</div>	
									<?php } ?>

									<ul class="pbmit-single-team-info">
										<?php echo pbmit_esc_kses($phone); ?>
										<?php echo pbmit_esc_kses($email); ?>
										<?php echo pbmit_esc_kses($site); ?>
										<?php echo pbmit_esc_kses($fax); ?>
									</ul>	
							<?php echo pbmit_team_social_links(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="pbmit-entry-content">
						<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							'',
							get_the_title()
						) );
						?>
					</div>
				</div>
			</div><!-- .row -->
		</div>
	</div><!-- .pbmit-team-single -->
</article><!-- #post-## -->
<?php pbmit_edit_link( get_the_ID() ); ?>
