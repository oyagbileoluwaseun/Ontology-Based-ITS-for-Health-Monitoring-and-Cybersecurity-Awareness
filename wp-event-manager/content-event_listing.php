<?php
global $post;	
$start_date = get_event_start_date();
$start_time = get_event_start_time();
$end_date   = get_event_end_date();
$end_time   = get_event_end_time();
$event_type = get_event_type();
$address 	= get_event_address();
$event		= $post; 


// Meta details
$time_html = $price_html = '';
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

				} else if( $field_name == 'price' ){
					$meta_key = '_' . $field_name;
					$field_value = $event->$meta_key;									
					$price_html = '<div class="pbmit-event-meta-price">'.$field_value. '</div>';
				}
			}
		}									
	}
};

if (is_array($event_type) && isset($event_type[0]))
	$event_type = $event_type[0]->slug;

$thumbnail  = get_event_thumbnail($post,'full');
$column_class = 'col-md-4';
if( !empty($columns) ){
	// calling from Elementor
	switch($columns ) {							

		case 'none':
			$column_class = '';
		break;
		case '1':
			$column_class = 'col-md-12';
		break;
		case '2':
			$column_class = 'col-md-6';
		break;
		case '3':
			$column_class = 'col-md-4';
		break;
		case '4':
			$column_class = 'col-md-6 col-lg-3';
		break;
		case '5':
			$column_class = 'col-md-20percent';
		break;
		case '6':
			$column_class = 'col-md-2';
			break;
	}
} 


// Meta details
$time_html = $price_html = '';
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

				} else if( $field_name == 'price' ){
					$meta_key = '_' . $field_name;
					$field_value = $event->$meta_key;									
					$price_html = '<div class="pbmit-event-meta-price">'.$field_value. '</div>';
				}
			}
		}									
	}
};

?>

<div class="pbmit-box pbmit-ele pbmit-ele-event_listing wpem-event-box-col <?php echo esc_attr($column_class); ?>">
	<!----- wpem-col-lg-4 value can be change by admin settings ------->
	
	<div class="wpem-event-layout-wrapper">
		<div <?php event_listing_class(''); ?>>

			<div class="wpem-event-action-url event-style-color <?php echo esc_attr($event_type); ?>">

				<div class="wpem-event-banner">
					<div class="wpem-event-banner-img" style="background-image: url('<?php echo esc_url($thumbnail); ?>')">
						<?php
						if (get_option('event_manager_enable_event_types') && get_event_type())
						{
							?>
							<div class="wpem-event-type"><?php display_event_type(); ?></div>
						<?php } ?>
					</div>
					<a class="pbmit-btn" href="<?php the_permalink(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
					<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
				</div>

				<div class="wpem-event-infomation">
					<div class="wpem-event-date">
						<div class="wpem-event-date-type">
							<?php
							if (!empty($start_date))
							{
								?>
								<div class="wpem-from-date">
									<div class="wpem-date"><?php echo date_i18n('d', strtotime($start_date)); ?></div>
									<div class="wpem-month"><?php echo date_i18n('M', strtotime($start_date)); ?></div>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="wpem-event-details">

					<div class="wpem-event-title"><h3 class="wpem-heading-text"><a href="<?php display_event_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h3></div>

						<div class="pbmit-event-meta d-flex align-items-center">
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
						<div class="pbmit-event-price">
							<?php echo pbmit_esc_kses($price_html); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="pbmit-event-arrow-link">
				<a href="<?php display_event_permalink(); ?>" class="event-style-color <?php echo esc_attr($event_type); ?>"></a>
			</div>
		</div>
	</div>
</div>
