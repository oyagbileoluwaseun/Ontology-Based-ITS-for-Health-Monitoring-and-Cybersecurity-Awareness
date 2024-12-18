jQuery(window).on('load', function($) {
	wp.customize(
		'header-style',
		function(header_style) {
			var header_height		= '90';
			var header_bgcolor		= 'transparent';
			var global_color		= '#3368c6';
			var secondary_color		= '#010d27';
			var light_bg_color		= '#f0f7fd';
			var blackish_bg_color	= '#031b4e';
			var main_menu_typography = {
				'font-family'	: 'Sora',
				'variant'		: '600',
				'font-size'		: '12px',
				'line-height'	: '22px',
				'letter-spacing': '0.3px',
				'color'			: '#031b4e',
				'text-transform': 'uppercase',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var sticky_header_bgcolor	= 'transparent';
			var main_menu_active_color	= 'globalcolor';
			var main_menu_sticky_color	= '#031b4e';
			var preheader_enable		= false;
			var logo_height				= '55';
			var titlebar_height			= '500';
			var titlebar_bgcolor		= 'transparent';
			var header_btn_text2		= '';
			var titlebar_heading_typography = {
				'font-family'	: 'Sora',
				'variant'		: '500',
				'font-size'		: '60px',
				'line-height'	: '60px',
				'letter-spacing': '0px',
				'color'			: '#031b4e',
				'text-transform': 'none',
				'font-backup'	: '',
				'font-style'	:'normal',
			};
			var titlebar_subheading_typography = {
				'font-family'	: 'Sora',
				'variant'		: 'normal',
				'font-size'		: '16px',
				'line-height'	: '24px',
				'letter-spacing': '0.5px',
				'color'			: '#031b4e',
				'text-transform': 'capitalize',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var titlebar_breadcrumb_typography = {
				'font-family'	: 'Sora',
				'variant'		: '500',
				'font-size'		: '15px',
				'line-height'	: '25px',
				'letter-spacing': '0px',
				'color'			: '#031b4e',
				'text-transform': 'capitalize',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var logo = pbmit_admin_js_variables.theme_path + '/images/logo.svg';
			header_style.bind(function(value) {

			if (value == '1') { // Default header style
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('header-search').set(false);
				wp.customize('sticky-header').set(true);
				wp.customize('sticky-header-height').set('90');
				wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('logo-height').set(logo_height);
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
				wp.customize('sticky-logo').set(logo);
			} else if (value == '2') { // Header style 2
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set(header_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('http://xcare-demo.pbminfotech.com/demo1/make-appointments-01/');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
			}  else if (value == '3') { // Header style 3
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set(header_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#031b4e',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('');
				wp.customize('header-btn-text2').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
			} else if (value == '4') { // Header style 4
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('header-height').set('60');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/logo-white.svg');
			} else if (value == '5') { // Header style 5
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set('#181a17');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#181a17',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('header-height').set('150');
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
			} else if (value == '6') { // Header style 6
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set('#181a17');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set(header_height);
				wp.customize('header-bgcolor').set('white');
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#181a17',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
			} else if (value == '7') { // Header style 7
				wp.customize('global-color').set('#00bde0');
				wp.customize('light-bg-color').set('#eff9ff');
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set('#135de8');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('110');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/dentist-logo.svg');
			} else if (value == '8') { // Header style 8
				wp.customize('global-color').set('#7ec53e');
				wp.customize('light-bg-color').set('#f0f6f2');
				wp.customize('blackish-bg-color').set('#181a17');
				wp.customize('secondary-color').set('#2c1e0f');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('120');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#181a17',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/eye-care-logo.svg');
			} else if (value == '9') { // Header style 9
				wp.customize('global-color').set('#ee344e');
				wp.customize('light-bg-color').set('#f8f7f4');
				wp.customize('blackish-bg-color').set('#04121e');
				wp.customize('secondary-color').set('#010d27');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('120');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#04121e',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('511 SW 10th Ave 1206, Portland, OR United States');
				wp.customize('header-btn-text2').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('burger-logo').set(pbmit_admin_js_variables.theme_path + '/images/cardiac-logo.svg');
				wp.customize('burger-logo-height').set('60');
				wp.customize('header-burger-menu-switcher'). set(true);
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/cardiac-logo.svg');
			} else if (value == '10') { // Header style 10
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('130');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#fff',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set('white');
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(true);
				wp.customize('preheader-left').set('<ul class="pbmit-contact-info"><li><i class="pbmit-base-icon-location-2"></i>Los Angeles Gournadi, 1230  Bariasl</li><li><i class="pbmit-base-icon-contact"></i>noreply@pbminfotech.com</li><li><i class=" pbmit-base-icon-phone-call-1"></i> Make a call : +1 (212) 255-5511</li></ul>');
				wp.customize('preheader-right').set('[pbmit-social-links]');
				wp.customize('preheader-text-color').set('secondarycolor');
				wp.customize('preheader-bgcolor').set('transparent');
				wp.customize('header-btn2-text').set('Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '500',
					'font-size'		: '60px',
					'line-height'	: '60px',
					'letter-spacing': '0px',
					'color'			: '#fff',
					'text-transform': 'none',
					'font-backup'	: '',
					'font-style'	:'normal',
			});
			wp.customize('titlebar-subheading-typography').set({
					'font-family'	: 'Sora',
					'variant'		: 'normal',
					'font-size'		: '16px',
					'line-height'	: '24px',
					'letter-spacing': '0.5px',
					'color'			: '#fff',
					'text-transform': 'capitalize',
					'font-backup'	: '',
					'font-style'	: 'normal',
			});
			wp.customize('titlebar-breadcrumb-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '500',
					'font-size'		: '15px',
					'line-height'	: '25px',
					'letter-spacing': '0px',
					'color'			: '#fff',
					'text-transform': 'capitalize',
					'font-backup'	: '',
					'font-style'	: 'normal',
			});
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/logo-full-white.svg');
			} else if (value == '11') { // Header style 11
				wp.customize('global-color').set('#06268b');
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set('#1b99fe');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('100');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#fff',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set('white');
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Make An Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set({
						'font-family'	: 'Sora',
						'variant'		: '500',
						'font-size'		: '60px',
						'line-height'	: '60px',
						'letter-spacing': '0px',
						'color'			: '#fff',
						'text-transform': 'none',
						'font-backup'	: '',
						'font-style'	:'normal',
				});
				wp.customize('titlebar-subheading-typography').set({
						'font-family'	: 'Sora',
						'variant'		: 'normal',
						'font-size'		: '16px',
						'line-height'	: '24px',
						'letter-spacing': '0.5px',
						'color'			: '#fff',
						'text-transform': 'capitalize',
						'font-backup'	: '',
						'font-style'	: 'normal',
				});
				wp.customize('titlebar-breadcrumb-typography').set({
						'font-family'	: 'Sora',
						'variant'		: '500',
						'font-size'		: '15px',
						'line-height'	: '25px',
						'letter-spacing': '0px',
						'color'			: '#fff',
						'text-transform': 'capitalize',
						'font-backup'	: '',
						'font-style'	: 'normal',
				});
				wp.customize('logo').set(logo);
			} else if (value == '12') { // Header style 12
				wp.customize('global-color').set('#fd5d2f');
				wp.customize('light-bg-color').set('#f8f3eb');
				wp.customize('blackish-bg-color').set('#181a17');
				wp.customize('secondary-color').set('#031b4e');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set(header_height);
				wp.customize('header-bgcolor').set('light');
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#181a17',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set('#181a17');
				wp.customize('main-menu-sticky-color').set('#181a17');
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn2-text').set('Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set({
						'font-family'	: 'Sora',
						'variant'		: '500',
						'font-size'		: '60px',
						'line-height'	: '60px',
						'letter-spacing': '0px',
						'color'			: '#181a17',
						'text-transform': 'none',
						'font-backup'	: '',
						'font-style'	:'normal',
				});
				wp.customize('titlebar-subheading-typography').set({
						'font-family'	: 'Sora',
						'variant'		: 'normal',
						'font-size'		: '16px',
						'line-height'	: '24px',
						'letter-spacing': '0.5px',
						'color'			: '#181a17',
						'text-transform': 'capitalize',
						'font-backup'	: '',
						'font-style'	: 'normal',
				});
				wp.customize('titlebar-breadcrumb-typography').set({
						'font-family'	: 'Sora',
						'variant'		: '500',
						'font-size'		: '15px',
						'line-height'	: '25px',
						'letter-spacing': '0px',
						'color'			: '#181a17',
						'text-transform': 'capitalize',
						'font-backup'	: '',
						'font-style'	: 'normal',
				});
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/gastroenterologist-logo.svg');
			} else if (value == '13') { // Header style 13
				wp.customize('global-color').set('#fcc953');
				wp.customize('light-bg-color').set('#fcf7ec');
				wp.customize('blackish-bg-color').set('#181a17');
				wp.customize('secondary-color').set('#341c77');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-height').set('110');
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '600',
					'font-size'		: '12px',
					'line-height'	: '22px',
					'letter-spacing': '0.3px',
					'color'			: '#181a17',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-active-color').set('#181a17');
				wp.customize('main-menu-sticky-color').set('#181a17');
				wp.customize('header-search').set(true);
				wp.customize('sticky-header').set(false);
				wp.customize('preheader-enable').set(true);
				wp.customize('preheader-left').set('<ul class="pbmit-contact-info"><li><i class=" pbmit-base-icon-marker"></i>Los Angeles Gournadi, 1230  Barias</li><li><i class="pbmit-base-icon-contact"></i> name@somemail.com</li></ul>');
				wp.customize('preheader-right').set('[pbmit-social-links]');
				wp.customize('preheader-text-color').set('blackish');
				wp.customize('preheader-bgcolor').set('globalcolor');
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-text2').set(header_btn_text2);
				wp.customize('header-btn-url').set('tel:+1(212)255-511');
				wp.customize('header-btn2-text').set('Appointment');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
				wp.customize('titlebar-heading-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '500',
					'font-size'		: '60px',
					'line-height'	: '60px',
					'letter-spacing': '0px',
					'color'			: '#181a17',
					'text-transform': 'none',
					'font-backup'	: '',
					'font-style'	:'normal',
				});
				wp.customize('titlebar-subheading-typography').set({
					'font-family'	: 'Sora',
					'variant'		: 'normal',
					'font-size'		: '16px',
					'line-height'	: '24px',
					'letter-spacing': '0.5px',
					'color'			: '#181a17',
					'text-transform': 'capitalize',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('titlebar-breadcrumb-typography').set({
					'font-family'	: 'Sora',
					'variant'		: '500',
					'font-size'		: '15px',
					'line-height'	: '25px',
					'letter-spacing': '0px',
					'color'			: '#181a17',
					'text-transform': 'capitalize',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('logo').set(pbmit_admin_js_variables.theme_path + '/images/child-care-logo.svg');
			}
		});
	});
	wp.customize(
		'footer-style',
		function(footer_style) {
			var global_color		= '#3368c6';
			var secondary_color		= '#010d27';
			var light_bg_color		= '#f0f7fd';
			var white_color			= '#ffffff';
			var footer_bgcolor		= 'white';
			var footer_text_color	= 'blackish';
			var h3_typography	= {
				'font-family'	: 'Sora',
				'variant'		: '500',
				'font-size'		: '36px',
				'line-height'	: '46px',
				'letter-spacing': '0px',
				'color'			: '#031b4e',
				'text-transform': 'none',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var footer_column	= '3-3-3-3';
			var footer_widget_heading_typography	= {
				'font-family'	: 'Sora',
				'variant'		: '500',
				'font-size'		: '16px',
				'line-height'	: '26px',
				'letter-spacing': '0px',
				'color'			: '#3368c5',
				'text-transform': 'capitalize',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var footer_enable = true;
			var footer_boxes_area = true;

			footer_style.bind(function(value) {
				if (value == '1') { // Default footer style 1
					wp.customize('global-color').set(global_color);
					wp.customize('footer-bgcolor').set(footer_bgcolor);
					wp.customize('footer-background').set({
						'background-repeat'		: 'no-repeat',
						'background-position'	: 'left bottom',
						'background-size'		: 'auto',
						'background-attachment' : 'scroll',
						'background-image'		: pbmit_admin_js_variables.theme_path + '/images/footer-bg-img.png',
					});
					wp.customize('footer-text-color').set(footer_text_color);
					wp.customize('h3-typography').set(h3_typography);
					wp.customize('footer-enable').set(footer_enable);
					wp.customize('footer-boxes-area').set(false);
					wp.customize('footer-column').set('custom');
					var $footer_1_col_width_ele = jQuery("select[data-id='footer-1-col-width']").select2();
					$footer_1_col_width_ele.val("38").trigger("change");
					var $footer_2_col_width_ele = jQuery("select[data-id='footer-2-col-width']").select2();
					$footer_2_col_width_ele.val("20").trigger("change");
					var $footer_3_col_width_ele = jQuery("select[data-id='footer-3-col-width']").select2();
					$footer_3_col_width_ele.val("21").trigger("change");
					var $footer_4_col_width_ele = jQuery("select[data-id='footer-4-col-width']").select2();
					$footer_4_col_width_ele.val("21").trigger("change");
					wp.customize('footer-widget-heading-typography').set(footer_widget_heading_typography);
					wp.customize('copyright-text').set('© 2023<a href="#">PBM Infotech</a>');
					wp.customize('footer-copyright-right-content').set('menu');
				} else if (value == '2') { // footer style 2
					wp.customize('global-color').set(global_color);
					wp.customize('footer-bgcolor').set(footer_bgcolor);
					wp.customize('footer-background').set({
						'background-repeat'		: 'no-repeat',
						'background-position'	: 'left bottom',
						'background-size'		: 'auto',
						'background-attachment' : 'scroll',
						'background-image'		: pbmit_admin_js_variables.theme_path + '/images/footer-bg-img.png',
					});
					wp.customize('footer-text-color').set(footer_text_color);
					wp.customize('h3-typography').set(h3_typography);
					wp.customize('footer-enable').set(footer_enable);
					wp.customize('footer-boxes-area').set(footer_boxes_area);
					wp.customize('footer-column').set('custom');
					var $footer_1_col_width_ele = jQuery("select[data-id='footer-1-col-width']").select2();
					$footer_1_col_width_ele.val("38").trigger("change");
					var $footer_2_col_width_ele = jQuery("select[data-id='footer-2-col-width']").select2();
					$footer_2_col_width_ele.val("20").trigger("change");
					var $footer_3_col_width_ele = jQuery("select[data-id='footer-3-col-width']").select2();
					$footer_3_col_width_ele.val("21").trigger("change");
					var $footer_4_col_width_ele = jQuery("select[data-id='footer-4-col-width']").select2();
					$footer_4_col_width_ele.val("21").trigger("change");
					wp.customize('footer-widget-heading-typography').set(footer_widget_heading_typography);
					wp.customize('copyright-text').set('© 2023<a href="#">PBM Infotech</a>');
					wp.customize('footer-copyright-right-content').set('menu');
				}
			});
		}
	);
}); // window.load