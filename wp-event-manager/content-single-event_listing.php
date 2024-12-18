<?php
global $post;
$start_date = get_event_start_date();
$end_date   = get_event_end_date();
$start_time = get_event_start_time();
$end_time   = get_event_end_time();
$address = get_event_address();
$location =  get_event_location();
$separator = get_wpem_date_time_separator();
$check_ticket_visibility = get_option('event_manager_enable_event_ticket_prices_filter', true);

wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
$event = $post; 

// Meta details
$time_html = $price_html = $event_visitor_html = '';
$show_additional_details = apply_filters('event_manager_show_additional_details', true);
if ($show_additional_details) {
	if (!class_exists('WP_Event_Manager_Form_Submit_Event')) {
		include_once(EVENT_MANAGER_PLUGIN_DIR . '/forms/wp-event-manager-form-abstract.php');
		include_once(EVENT_MANAGER_PLUGIN_DIR . '/forms/wp-event-manager-form-submit-event.php');
	}

	$form_submit_event_instance = call_user_func(array('WP_Event_Manager_Form_Submit_Event', 'instance'));
	$custom_fields = $form_submit_event_instance->get_event_manager_fieldeditor_fields();
	$default_fields = $form_submit_event_instance->get_default_event_fields();

	if (!empty($custom_fields) && isset($custom_fields) && !empty($custom_fields['event'])) {
		foreach ($custom_fields['event'] as $field_name => $field_data) {
			if (!array_key_exists($field_name, $default_fields['event'])) {
				if( $field_name == 'time' ){
					$meta_key = '_' . $field_name;
					$field_value = $event->$meta_key;									
					$time_html = '<div class="pbmit-event-meta-time">'.$field_value. '</div>';

				} else if( $field_name == 'event_visitor' ){
					$meta_key = '_' . $field_name;
					$field_value = $event->$meta_key;									
					$event_visitor_html = '<div class="pbmit-event-meta-eventvisitor">'.$field_value. '</div>';
				}
			}
		}									
	}
}; ?>

<div class="single_event_listing">
	<div class="wpem-main wpem-single-event-page">
		<?php 
		//check if event is expired/cancelled/preview mode then display message else display event details
		if (get_option('event_manager_hide_expired_content', 1) && 'expired' === $post->post_status) : ?>
			<div class="wpem-alert wpem-alert-danger"><?php esc_attr_e('This listing has been expired.', 'xcare'); ?></div>
		<?php else : 
			if (is_event_cancelled()) : ?>
				<div class="wpem-alert wpem-alert-danger">
					<span class="event-cancelled"><?php esc_attr_e('This event has been cancelled.', 'xcare'); ?></span>
				</div>
			<?php elseif (!attendees_can_apply() && 'preview' !== $post->post_status) : ?>
				<div class="wpem-alert wpem-alert-danger">
					<span class="listing-expired"><?php esc_attr_e('Registrations have closed.', 'xcare'); ?></span>
				</div>
			<?php endif;
			
			/**
			 * single_event_listing_start hook
			 */
			do_action('single_event_listing_start'); ?>
			<div class="wpem-single-event-wrapper">
				<div class="wpem-single-event-header-top">
					<div class="wpem-row">
						 <!-- Event banner section start-->
						<div class="wpem-col-xs-12 wpem-col-sm-12 wpem-col-md-12 wpem-single-event-images">
							<?php
							$event_banners = get_event_banner();
							if (is_array($event_banners) && sizeof($event_banners) >= 1) : ?>
								<div class="wpem-single-event-slider-wrapper">
									<div class="wpem-single-event-slider">
										<?php foreach ($event_banners as $banner_key => $banner_value) : ?>
											<div class="wpem-slider-items">
												<img src="<?php echo esc_url($banner_value); ?>" alt="<?php the_title(); ?>" />
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php else : ?>
								<div class="wpem-event-single-image-wrapper">
									<div class="wpem-event-single-image"><?php display_event_banner(); ?></div>
								</div>
							<?php endif; ?>
						</div>
						<!-- Event banner section end-->
					</div>
				</div>

				<div class="wpem-single-event-body">
					<div class="wpem-row">
						<div class="wpem-col-xs-12 wpem-col-md-8 wpem-single-event-left-content">
							<div class="wpem-single-event-short-info">
								<div class="wpem-event-details">
									<?php if (get_option('enable_event_organizer')) : ?>
										<div class="wpem-event-organizer d-flex align-items-center">									   
											<div class="pbmit-event-meta-line pbmit-event-time d-flex">
												<i class="pbmit-base-icon-time"></i>
												<?php echo pbmit_esc_kses($time_html); ?>
											</div>
										
											<div class="pbmit-event-meta-line wpem-event-registration-date d-flex">
												<i class="pbmit-base-icon-calendar-3"></i>						
												<span class="wpem-event-date-text">
													<?php display_event_registration_end_date(); ?>
												</span>						
											</div>
										</div>
									<?php endif;
									
							   
									do_action('single_event_ticket_overview_before'); 
									if(isset($check_ticket_visibility) && !empty($check_ticket_visibility)) : 
										if (get_event_ticket_price() && get_event_ticket_option()) : ?>
											<div class="wpem-event-ticket-price"><i class="wpem-icon-ticket"></i> <?php display_event_ticket_price('', '', true, $post); ?></div>
										<?php endif; 
										if (get_event_ticket_option()) : ?>
											<div class="wpem-event-ticket-type"><span class="wpem-event-ticket-type-text"><?php display_event_ticket_option(); ?></span></div>
										<?php endif; 
									endif; 
									do_action('single_event_ticket_overview_after'); ?>
								</div>
							</div>

							<?php do_action('single_event_overview_before'); ?>
							<!-- Event description section start-->
							<div class="wpem-single-event-body-content">
								<?php do_action('single_event_overview_start'); 
								echo wp_kses_post(apply_filters('display_event_description', get_the_content())); 
								do_action('single_event_overview_end'); ?>
							</div>
							<!-- Event description section end-->
							
							<!-- Additional Info Block Start -->
							<?php
							$show_additional_details = apply_filters('event_manager_show_additional_details', true);

							if ($show_additional_details) :
								if (!class_exists('WP_Event_Manager_Form_Submit_Event')) {
									include_once(EVENT_MANAGER_PLUGIN_DIR . '/forms/wp-event-manager-form-abstract.php');
									include_once(EVENT_MANAGER_PLUGIN_DIR . '/forms/wp-event-manager-form-submit-event.php');
								}

								$form_submit_event_instance = call_user_func(array('WP_Event_Manager_Form_Submit_Event', 'instance'));
								$custom_fields = $form_submit_event_instance->get_event_manager_fieldeditor_fields();
								$default_fields = $form_submit_event_instance->get_default_event_fields();

								$additional_fields = [];
								if (!empty($custom_fields) && isset($custom_fields) && !empty($custom_fields['event'])) {
									foreach ($custom_fields['event'] as $field_name => $field_data) {
										if (!array_key_exists($field_name, $default_fields['event'])) {
											$meta_key = '_' . $field_name;
											$field_value = $event->$meta_key;
											if (isset($field_value)) {
												$additional_fields[$field_name] = $field_data;
											}
										}
									}

									if (isset($additional_fields['attendee_information_type']))
										unset($additional_fields['attendee_information_type']);

									if (isset($additional_fields['attendee_information_fields']))
										unset($additional_fields['attendee_information_fields']);

									$additional_fields = apply_filters('event_manager_show_additional_details_fields', $additional_fields);
								}

							 
							endif; ?>
							<!-- Additional Info Block End  -->
							<?php do_action('single_event_overview_after'); ?>
						</div>
						<div class="wpem-col-xs-12 wpem-col-md-4 wpem-single-event-right-content">
							<div class="wpem-single-event-body-sidebar">
								<?php do_action('single_event_listing_button_start'); ?>
								<!-- Event registration button section start-->
							   <?php
								$post = $event;
								$date_format		   = WP_Event_Manager_Date_Time::get_event_manager_view_date_format();
								$registration_end_date = get_event_registration_end_date();
								$registration_end_date = !empty($registration_end_date) ? $registration_end_date . ' 23:59:59' : '';
								$registration_addon_form = apply_filters('event_manager_registration_addon_form', true);
								$event_timezone		  = get_event_timezone();

								// check if timezone settings is enabled as each event then set current time stamp according to the timezone
								// for eg. if each event selected then Berlin timezone will be different then current site timezone.
								if (WP_Event_Manager_Date_Time::get_event_manager_timezone_setting() == 'each_event') {
									$current_timestamp = WP_Event_Manager_Date_Time::current_timestamp_from_event_timezone($event_timezone);
								} else {
									$current_timestamp = strtotime(current_time('Y-m-d H:i:s'));
								}
								// If site wise timezone selected
								if (attendees_can_apply() && ((strtotime($registration_end_date) >= $current_timestamp) || empty($registration_end_date)) && $registration_addon_form) {
									get_event_manager_template('event-registration.php');
								} else if (!empty($registration_end_date) && strtotime($registration_end_date) < $current_timestamp) {
									echo wp_kses_post('<div class="wpem-alert wpem-alert-warning">' . esc_attr__('Event registration closed.', 'xcare') . '</div>');
								}
								?>
								<!-- Event registration button section end-->
								<?php do_action('single_event_listing_button_end'); ?>

								<div class="wpem-single-event-sidebar-info">

									<?php do_action('single_event_sidebar_start'); ?>
									<div class="clearfix">&nbsp;</div>
									<!-- Event date section start-->
									<h3 class="wpem-heading-text"><?php esc_attr_e('Date And Time', 'xcare') ?></h3>
									<div class="wpem-event-date-time">
										<span class="wpem-event-date-time-text">
											<?php if($start_date){ 
												echo  wp_kses_post(date_i18n($date_format, strtotime($start_date))); ?>
												<?php if ($start_time) {
													echo display_date_time_separator() . ' ' . esc_attr($start_time);
												}
											}else{echo esc_attr('-');  } ?>
										</span>
										<?php
										if (get_event_end_date() != '') {
											esc_attr_e(' to', 'xcare'); ?>
											<br />
											<span class="wpem-event-date-time-text"><?php echo  wp_kses_post(date_i18n($date_format, strtotime($end_date))); ?>
												<?php if ($end_time) {
													echo display_date_time_separator() . ' ' . esc_attr($end_time);
												}
												?>
											</span>
										<?php } ?>
									</div>
									<!-- Event date section end-->

									 <!-- Event location section start-->
									<div>
										<div class="clearfix">&nbsp;</div>
										<h3 class="wpem-heading-text"><?php esc_attr_e('Location', 'xcare'); ?></h3>
										<div>
											<?php
											if (get_event_address()) { ?>
												<a href="http://maps.google.com/maps?q=<?php display_event_address();?>">  
													<?php display_event_address();
													echo esc_attr(',');?>
												</a><?php
											}
											if (!is_event_online()) {?>
												<a href="http://maps.google.com/maps?q=<?php display_event_location();?>" target="_blank">  
													<?php display_event_location();?>
												</a>
											<?php } else {?>
												<?php esc_attr_e('Online event', 'xcare'); ?>
											<?php } ?>
										</div>
									</div>
									<!-- Event location section end-->
									<?php
									/* event categories section */
									if (get_option('event_manager_enable_categories') && get_event_category($event)) : ?>
										<div class="clearfix">&nbsp;</div>
										<h3 class="wpem-heading-text"><?php esc_attr_e('Event Category', 'xcare'); ?></h3>
										<div class="wpem-event-category"><?php display_event_category($event); ?></div>
									<?php endif; ?>

										<div class="clearfix">&nbsp;</div>
										<h3 class="wpem-heading-text"><?php esc_attr_e('Event Visitor', 'xcare'); ?></h3>
										<div class="wpem-event-visitor"> <?php echo pbmit_esc_kses($event_visitor_html); ?></div>
									<?php

									/* youtube video button section */	
									if (get_organizer_youtube($event)) : ?>
										<div class="clearfix">&nbsp;</div>
										<a id="event-youtube-button" data-modal-id="wpem-youtube-modal-popup" class="wpem-theme-button wpem-modal-button"><?php esc_attr_e('Watch video', 'xcare'); ?></a>
										<div id="wpem-youtube-modal-popup" class="wpem-modal" role="dialog" aria-labelledby="<?php esc_attr_e('Watch video', 'xcare'); ?>">
											<div class="wpem-modal-content-wrapper">
												<div class="wpem-modal-header">
													<div class="wpem-modal-header-title">
														<h3 class="wpem-modal-header-title-text"><?php _e('Watch video', 'xcare'); ?></h3>
													</div>
													<div class="wpem-modal-header-close"><a href="javascript:void(0)" class="wpem-modal-close" id="wpem-modal-close">x</a></div>
												</div>
												<div class="wpem-modal-content">
													<?php echo wp_oembed_get(get_organizer_youtube($event), array('autoplay' => '1', 'rel' => 0)); ?>
												</div>
											</div>
											<a href="#">
												<div class="wpem-modal-overlay"></div>
											</a>
										</div>
										<div class="clearfix">&nbsp;</div>
									<?php endif; ?>
									<?php do_action('single_event_sidebar_end'); ?>
									<div class="pbmit-event-share-btn">
										<div class="pbmit-share-icon-wrapper">
											<span class="pbmit-share-icon">
											<i class="pbmit-base-icon-share-2"></i>
											</span>
											<?php echo pbmit_esc_kses( do_shortcode( '[pbmit-social-links]')); ?>
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
				</div>

				<?php
				$post = $event;
				//if organizer setting is enable then display organizer section on single event listing
				if (get_option('enable_event_organizer')) {
					get_event_manager_template(
						'content-single-event_listing-organizer.php',
						array(),
						'wp-event-manager/organizer',
						EVENT_MANAGER_PLUGIN_DIR . '/templates/organizer'
				   );
				}
				//if venue setting is enable then display venue section on single event listing
				if (get_option('enable_event_venue')) {
					get_event_manager_template(
						'content-single-event_listing-venue.php',
						array(),
						'wp-event-manager/venue',
						EVENT_MANAGER_PLUGIN_DIR . '/templates/venue'
				   );
				}
				/**
				 * single_event_listing_end hook
				 */
				do_action('single_event_listing_end');  ?>
			</div>
			<!-- / wpem-wrapper end  -->
		<?php endif; ?>
		<!-- Main if condition end -->
	</div>
	<!-- / wpem-main end  -->
</div>
<!-- override the script if needed -->

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.wpem-single-event-slider').slick({
			dots: true,
			infinite: true,
			speed: 500,
			fade: true,
			cssEase: 'linear',
			adaptiveHeight: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					dots: true,
					infinite: true,
					speed: 500,
					fade: true,
					cssEase: 'linear',
					adaptiveHeight: true
				}
			}]
		});

		/* Get iframe src attribute value i.e. YouTube video url
		and store it in a variable */
		var url = jQuery("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src');

		/* Assign empty url value to the iframe src attribute when
		modal hide, which stop the video playing */
		jQuery(".wpem-modal-close").on('click', function() {
			jQuery("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src', '');
		});
		jQuery(".wpem-modal-overlay").on('click', function() {
			jQuery("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src', '');
		});

		/* Assign the initially stored url back to the iframe src
		attribute when modal is displayed again */
		jQuery("#event-youtube-button").on('click', function() {
			jQuery("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src', url);
		});
	});
</script>