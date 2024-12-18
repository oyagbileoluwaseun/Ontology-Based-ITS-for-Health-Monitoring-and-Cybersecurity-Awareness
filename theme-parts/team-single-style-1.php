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

// Phone
$phone			= get_post_meta( get_the_ID(), 'pbmit-team-details_phone', true ); 
if( !empty($phone) ){ $phone = '<li><label>'.esc_html__('Phone Number :', 'xcare').'</label> ' . esc_attr($phone) . '</li>'; }

// Email
$email	= get_post_meta( get_the_ID(), 'pbmit-team-details_email', true ); 
if( !empty($email) ){ $email = '<li><label>'.esc_html__('Email Address :', 'xcare').'</label> <a href="mailto:' . sanitize_email($email) . '">' . esc_attr($email) . '</a></li>'; }
$sitetitle		= get_post_meta( get_the_ID(), 'pbmit-team-details_sitetitle', true );
$siteurl		= get_post_meta( get_the_ID(), 'pbmit-team-details_siteurl', true ); 
$site			= '';
if( !empty($siteurl) ){
	$sitetitle		= ( empty($sitetitle) ) ? $siteurl : $sitetitle ;
	$site = '<li><label>'.esc_html__('Website', 'xcare').'</label> <a href="' . esc_url($siteurl) . '">' . esc_attr($sitetitle) . '</a> </li>';
}

// Fax
$fax			= get_post_meta( get_the_ID(), 'pbmit-team-details_fax', true ); 
if( !empty($fax) ){ $fax = '<li><label>'.esc_html__('Experience', 'xcare').'</label> ' . esc_attr($fax) . '</li>'; }

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="pbmit-team-single">
		<div class="pbmit-team-single-inner pbmit-sticky-section">
			<div class="pbmit-team-single-info">
				<div class="row ">
					<div class="col-md-12 col-xl-3">
						<div class="pbmit-sticky-col">
							<div class="pbmit-team-left-inner">
								<div class="pbmit-featured-wrapper">
									<?php pbmit_get_featured_data( array( 'featured_img_only' => false, 'size' => 'pbmit-img-770x750', 'with_link' => false ) ); ?>
								</div>										
								<div class="pbmit-team-detail">
									<div class="pbmit-team-detail-inner">
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
											<?php echo pbmit_esc_kses($fax); ?>
											<?php echo pbmit_esc_kses($site); ?>
										</ul>
									</div>
									<div class="pbmit-team-share-btn">
										<div class="pbmit-share-icon-wrapper">
											<span class="pbmit-share-icon">
											<i class="pbmit-base-icon-share-2"></i>
											</span>
											<?php echo pbmit_team_social_links(); ?>
											<div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
												</svg>
											</div>
											<div class="pbmit-sticky-corner pbmit-top-right-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-9">
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
				</div>
			</div>
		</div>
	</div><!-- .pbmit-team-single -->
</article><!-- #post-## -->
<?php pbmit_edit_link(); ?>