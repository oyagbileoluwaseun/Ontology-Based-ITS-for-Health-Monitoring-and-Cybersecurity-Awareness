"use strict";

/*----  Functions  ----*/

jQuery.fn.pbmit_is_bound = function(type) {
	if (this.data('events') !== undefined) {
		if (this.data('events')[type] === undefined || this.data('events')[type].length === 0) {
			return false;
		}
		return (-1 !== $.inArray(fn, this.data('events')[type]));
	} else {
		return false;
	}
};

var pbmit_sticky_header = function() {
	if (jQuery('.pbmit-header-sticky-yes').length > 0) {
		jQuery('#masthead .pbmit-main-header-area').clone().appendTo( '.pbmit-sticky-header' );

		jQuery('.pbmit-sticky-header .main-navigation ul, .pbmit-sticky-header .main-navigation ul li, .pbmit-sticky-header .main-navigation ul li a').removeAttr('id');

		jQuery('.pbmit-sticky-header h1').each(function() {
			var thisele = jQuery(this);
			var thisele_class = jQuery(this).attr('class');
			thisele.replaceWith('<span class="' + thisele_class + '">' + jQuery(thisele).html() + '</span>');
		});

		// For infostak header
		if (jQuery('.pbmit-main-header-area').hasClass('pbmit-infostack-header')) { // check if infostack header
			// for header style 2
			jQuery(".pbmit-sticky-header .pbmit-header-menu-area").insertAfter(".pbmit-sticky-header .site-branding");
			jQuery('.pbmit-sticky-header .pbmit-header-info, .pbmit-sticky-header .pbmit-mobile-search, .pbmit-sticky-header .nav-menu-toggle').remove();
		}
	}
	pbmit_flotingbar();
}

var pbmit_sticky_header_class = function() {
	// Add sticky class
	if (jQuery('#wpadminbar').length > 0) {
		jQuery('#masthead').addClass('pbmit-adminbar-exists');
	}

	var offset_px = 300;
	if (jQuery('.pbmit-main-header-area').length > 0) {
		offset_px = jQuery('.pbmit-main-header-area').height() + offset_px;
	}

	// apply on document ready
	if (jQuery(window).scrollTop() > offset_px) {
		jQuery('#masthead').addClass('pbmit-fixed-header');
		jQuery('.pbmit-sticky-header .mega-menu.max-mega-menu.mega-menu-horizontal').attr("id", "mega-menu-pbminfotech-top");

	} else {
		jQuery('#masthead').removeClass('pbmit-fixed-header');
	}

	jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() > offset_px) {
			jQuery('#masthead').addClass('pbmit-fixed-header');
			jQuery('.pbmit-sticky-header .mega-menu.max-mega-menu.mega-menu-horizontal').attr("id", "mega-menu-pbminfotech-top");
		} else {
			jQuery('#masthead').removeClass('pbmit-fixed-header');
		}
	});

}
var pbmit_menu_span = function() {
	jQuery('.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item .mega-sub-menu a, .pbmit-navbar ul ul a').each(function(i, v) {
		jQuery(v).contents().eq(0).wrap('<span class="pbmit-span-wrapper"/>');
	});
}

var pbmit_toggleSidebar = function() {
	jQuery('#menu-toggle').on('click', function() {
		jQuery("body:not(.mega-menu-pbminfotech-top) .pbmit-navbar > div, body:not(.mega-menu-pbminfotech-top)").toggleClass("active");
	})
	if (jQuery('.pbmit-navbar > div > .closepanel').length == 0) {
		jQuery('.pbmit-navbar > div').append('<span class="closepanel"><svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163"><rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect><rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect></svg></span>');

		jQuery('.pbmit-navbar > div > .closepanel, .mega-menu-pbminfotech-top .nav-menu-toggle').on('click', function() {
			jQuery(".pbmit-navbar > div, body, .mega-menu-wrap").toggleClass("active");
		});

		return false;
	}
}

var pbmit_flotingbar = function() {
	jQuery('.pbmit-nav-menu-toggle').on('click', function() {
		jQuery("body .floting-bar-wrap").toggleClass("active");
	})
	if (jQuery('.floting-bar-wrap .closepanel').length == 0) {
		jQuery('.floting-bar-wrap').append('<span class="closepanel"><svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="26.163" height="26.163" viewBox="0 0 26.163 26.163"><rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect><rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect></svg></span>');

		jQuery('.floting-bar-wrap .closepanel').on('click', function() {
			jQuery(".floting-bar-wrap").toggleClass("active");
		});

		return false;
	}
}

/* ====================================== */
/* Cart page qty update
/* ====================================== */
function pbmit_wc_cart_page_qty_update(){
	jQuery( document ).ajaxComplete(function() {
		if( jQuery('.product-quantity .quantity input.input-text.qty').length > 0 && jQuery('.pbmit-cart-wrapper .pbmit-cart-details span.pbmit-cart-count').length > 0 ){
			var total_qty = 0;
			jQuery('.product-quantity .quantity input.input-text.qty').each( function(){
				total_qty = total_qty + parseInt(jQuery(this).val());
				jQuery('.pbmit-cart-wrapper .pbmit-cart-details span.pbmit-cart-count').text(total_qty);
			});
			jQuery('.pbmit-cart-wrapper span.woocommerce-Price-amount').html(jQuery('.cart_totals .woocommerce-Price-amount > bdi').html());
		}
	});
}

var pbmit_preloader = function() {
	jQuery(".pbmit-preloader").fadeOut('600');
}

var pbmit_sorting = function() {
	jQuery('.pbmit-sortable-yes:not(.pbmit-ajax-sortable-yes)').each(function() {
		var boxes = jQuery('.pbmit-element-posts-wrapper', this);
		var links = jQuery('.pbmit-sortable-list a', this);
		boxes.isotope({
			animationEngine: 'best-available'
		});
		if( jQuery('body').hasClass('rtl') ){
			boxes.isotope({
				isOriginLeft: false,
				originLeft: false,
			});
		}
		links.on('click', function(e) {
			var selector = jQuery(this).data('sortby');
			if (selector != '*') {
				var selector = '.' + selector;
			}
			boxes.isotope({
				animationEngineString : 'best-available',
				filter: selector,
				itemSelector: '.pbmit-ele',
				layoutMode: 'masonry'
			});
			if( jQuery('body').hasClass('rtl') ){
				boxes.isotope({
					isOriginLeft: false,
					originLeft: false,
				});
			}
			links.removeClass('pbmit-selected');
			jQuery(this).addClass('pbmit-selected');
			e.preventDefault();
		});
	});
}

var pbmit_ajax_sorting = function() {

	jQuery('.pbminfotech-element.pbmit-sortable-yes.pbmit-ajax-sortable-yes .pbmit-sortable-list-ul a').on('click', function(){

		var thisEle = jQuery( this );
		var main_ele = jQuery( this ).closest('.pbminfotech-element');

		// add loader class
		jQuery('.pbmit-element-posts-wrapper', main_ele).addClass('pbmit-ajax-loading');

		// Active class
		var ul_ele = jQuery( this ).closest('.pbmit-sortable-list-ul');
		jQuery('a', ul_ele).removeClass('pbmit-selected');
		jQuery(this).addClass('pbmit-selected');
		
		var cpt				= main_ele.data('cpt');
		var style			= main_ele.data('style');
		var show			= main_ele.data('show');
		var columns			= thisEle.data('columns');
		var from_category	= thisEle.data('category');
		var orderby			= '';
		var order			= '';
		var selected_category = '';

		var infinitre_scroll_data = jQuery( '.pbmit-infinite-scroll-data', main_ele ).html();
		if( infinitre_scroll_data!='' ){
			var url_attributes = '';
			jQuery.each( jQuery.parseJSON(infinitre_scroll_data), function(key, value){
				if( key == 'cpt' ){
					cpt = value;
				} else if( key == 'style' ){
					style = value;
				} else if( key == 'show' ){
					show = value;
				} else if( key == 'columns' ){
					columns = value;
				} else if( key == 'orderby' ){
					orderby = value;
				} else if( key == 'order' ){
					order = value;
				} else if( key == 'from_category' ){
					selected_category = value;
				}
			});
		}
	
		// click on ALL button
		if( from_category == '*' &&  selected_category != ''){
            from_category = selected_category.join(',');
		}

		if( from_category == '*' ){
			from_category = '';
			if( selected_category != ''){
            	from_category = selected_category.join(',');
			}
		}

		jQuery.ajax({
			type	: "post",
			url		: pbmit_js_variables.ajaxurl,
			data 	: {
				action			: "pbmit_ajax_sortable_category",
				cpt				: cpt,
				style			: style,
				show			: show,
				columns			: columns,
				from_category	: from_category,
				orderby			: orderby,
				order			: order,

				nonce			: pbmit_js_variables.ajaxnonce_sortcat
			},
			success	: function(response){
				jQuery('.pbmit-element-posts-wrapper', main_ele).removeClass('pbmit-ajax-loading');
				jQuery('.pbmit-element-posts-wrapper', main_ele).html(response);
			}
		});
		
		

		return false;
	});

}

var pbmit_back_to_top = function() {
	if( jQuery('.pbmit-progress-wrap path').length > 0 ){
		var progressPath = document.querySelector('.pbmit-progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function() {
			var scroll = jQuery(window).scrollTop();
			var height = jQuery(document).height() - jQuery(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		jQuery(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.pbmit-progress-wrap').addClass('active-progress');
			} else {
				jQuery('.pbmit-progress-wrap').removeClass('active-progress');
			}
		});
		jQuery('.pbmit-progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({ scrollTop: 0 }, duration);
			return false;
		})
	}
	jQuery('.pbmit-scroll-section').on('click', function(event) {
		
		var target = jQuery(this.hash);
		target = target.length ? target : jQuery('[name=' + this.hash.substr(1) +']');
		jQuery('html, body').animate({
			scrollTop: target.offset().top
		}, 500);
		return false;
	});
}

var pbmit_navbar = function() {
	if (!jQuery('ul#pbmit-top-menu > li > a[href="#"]').pbmit_is_bound('click')) {
		jQuery('ul#pbmit-top-menu > li > a[href="#"]').click(function() { return false; });
	}
	jQuery('.pbmit-navbar > div > ul li:has(ul)').append("<span class='sub-menu-toggle'><i class='pbmit-base-icon-angle-right'></i></span>");
	jQuery('.pbmit-navbar li').on('hover', function() {
		if (jQuery(this).children("ul").length == 1) {
			var parent = jQuery(this);
			var child_menu = jQuery(this).children("ul");
			if (jQuery(parent).offset().left + jQuery(parent).width() + jQuery(child_menu).width() > jQuery(window).width()) {
				jQuery(child_menu).addClass('pbmit-nav-left');
			} else {
				jQuery(child_menu).removeClass('pbmit-nav-left');
			}
		}
	});
	jQuery(".nav-menu-toggle").on("click tap", function() {

	});
	jQuery('.sub-menu-toggle').on('click', function() {
		if (jQuery(this).siblings('.sub-menu, .children').hasClass('show')) {
			jQuery(this).siblings('.sub-menu, .children').removeClass('show');
			jQuery('i', jQuery(this)).removeClass('pbmit-base-icon-up-open-big').addClass('pbmit-base-icon-angle-right');
		} else {
			jQuery(this).siblings('.sub-menu, .children').addClass('show');
			jQuery('i', jQuery(this)).removeClass('pbmit-base-icon-angle-right').addClass('pbmit-base-icon-up-open-big');
		}
		return false;
	});
	jQuery('.nav-menu-toggle').on('click', function() {
		jQuery('.pbmit-navbar ul.menu > li > a').on('click', function() {
			if (jQuery(this).attr('href') == '#' && jQuery(this).siblings('ul.sub-menu, ul.children').length > 0) {
				jQuery(this).siblings('.sub-menu-toggle').trigger('click');
				return false;
			}
		});
	})
}

var pbmit_lightbox = function() {
	var i_type = 'image';
	jQuery('a.pbmit-lightbox, a.pbmit-lightbox-video, .pbmit-lightbox-video a, .pbmit-lightbox a, .pbmit-gallery-style-1 > a').each(function() {
		if (jQuery(this).hasClass('pbmit-lightbox-video') || jQuery(this).closest('.elementor-element').hasClass('pbmit-lightbox-video')) {
			i_type = 'iframe';
		} else {
			i_type = 'image';
		}
		if (jQuery(this).closest('.pbmit-ele-portfolio').length == 0) {
			jQuery(this).magnificPopup({ type: i_type });
		}
	});
}

var pbmit_video_popup = function() {
	jQuery('.pbmit-popup').on('click', function(event) {
		event.preventDefault();
		var href = jQuery(this).attr('href');
		var title = jQuery(this).attr('title');
		window.open(href, title, "width=600,height=500");
	});
}

var pbmit_testimonial = function() {
	jQuery('.pbmit-testimonial-active').each(function() {
		var ele_parent = jQuery(this).closest('.pbmit-element-posts-wrapper');
		jQuery('.pbminfotech-ele.pbminfotech-ele-testimonial', ele_parent).on('mouseover', function() {
			jQuery('.pbminfotech-ele.pbminfotech-ele-testimonial', ele_parent).removeClass('pbmit-testimonial-active');
			jQuery(this).addClass('pbmit-testimonial-active');
		});
	});
}

var pbmit_search_btn = function() {
	jQuery(function() {
		jQuery('.pbmit-header-search-btn').on("click", function(event) {
			event.preventDefault();
			jQuery(".pbmit-header-search-form-wrapper").addClass("open");
			jQuery('.pbmit-header-search-form-wrapper input[type="search"]').focus();
		});
		jQuery(".pbmit-search-close").on("click keyup", function(event) {
			jQuery(".pbmit-header-search-form-wrapper").removeClass("open");
		});
	});
}

var pbmit_gallery = function() {
	jQuery("div.pbmit-gallery").each(function() {
		jQuery(this).lightSlider({ item: 1, auto: true, loop: true, controls: false, speed: 1500, pause: 5500 });
	});
}

var pbmit_center_logo_header_class = function() {
	if (jQuery('#masthead.pbmit-header-style-5 ul#pbmit-top-menu').length > 0) {
		var has_class = jQuery('#masthead.pbmit-header-style-5 ul#pbmit-top-menu > li').hasClass('pbmit-logo-append');
		if (has_class == false) {
			var total_li = jQuery('#masthead.pbmit-header-style-5 ul#pbmit-top-menu > li').length;
			var li = Math.floor(total_li / 2);
			jQuery('#masthead.pbmit-header-style-5 ul#pbmit-top-menu > li:nth-child(' + li + ')').addClass('pbmit-logo-append');
		}
	}
}

var pbmit_selectwrap = function() {
	jQuery('select:not([id="rating"]').select2({
		dropdownParent: jQuery('#page')
	});
}
var pbmit_selectwrap_class = function() {
	jQuery("ul.mptt-menu").each(function() {
		jQuery(this).wrap("<div class='pbmit-select'></div>");
	});
}

/* ====================================== */
/* Circle Progress bar
/* ====================================== */
var pbmit_circle_progressbar = function() {

	jQuery('.pbmit-circle-outer').each(function() {

		var this_circle = jQuery(this);

		// Circle settings
		var emptyFill_val = "rgba(0, 0, 0, 0)";
		var thickness_val = 10;
		var fill_val = this_circle.data('fill');
		var size_val = 110;

		if (typeof this_circle.data('emptyfill') !== 'undefined' && this_circle.data('emptyfill') != '') {
			emptyFill_val = this_circle.data('emptyfill');
		}
		if (typeof this_circle.data('thickness') !== 'undefined' && this_circle.data('thickness') != '') {
			thickness_val = this_circle.data('thickness');
		}
		if (typeof this_circle.data('size') !== 'undefined' && this_circle.data('size') != '') {
			size_val = this_circle.data('size');
		}
		if (typeof this_circle.data('filltype') !== 'undefined' && this_circle.data('filltype') == 'gradient') {
			fill_val = { gradient: [this_circle.data('gradient1'), this_circle.data('gradient2')], gradientAngle: Math.PI / 4 };
		}

		if (typeof jQuery.fn.circleProgress == "function") {
			var digit = this_circle.data('digit');
			var before = this_circle.data('before');
			var after = this_circle.data('after');
			var digit = Number(digit);
			var short_digit = (digit / 100);

			jQuery('.pbmit-circle', this_circle).circleProgress({
				value: 0,
				size: size_val,
				startAngle: -Math.PI / 4 * 2,
				thickness: thickness_val,
				emptyFill: emptyFill_val,
				fill: fill_val
			}).on('circle-animation-progress', function(event, progress, stepValue) { // Rotate number when animating
				this_circle.find('.pbmit-circle-number').html(before + Math.round(stepValue * 100) + after);
			});
		}

		this_circle.waypoint(function(direction) {
			if (!this_circle.hasClass('completed')) {
				// Re draw when view
				if (typeof jQuery.fn.circleProgress == "function") {
					jQuery('.pbmit-circle', this_circle).circleProgress({ value: short_digit });
				};
				this_circle.addClass('completed');
			}
		}, { offset: '120%' });

	});
}

var pbmit_icon_box_hover_effect = function() {
	jQuery(".pbmit-icon-box-hover-effect .pbmit-element-posts-wrapper .pbmit-ele-miconheading , .pbmit-icon-box-hover-effect .elementor-inner-section .elementor-container .elementor-inner-column:nth-child(2)").eq(0).addClass('pbmit-ihbox-hover-active');
	jQuery(".pbmit-icon-box-hover-effect .pbmit-element-posts-wrapper .pbmit-ele-miconheading , .pbmit-icon-box-hover-effect .elementor-inner-section .elementor-container .elementor-inner-column").mouseover(function() {
		var main_row = jQuery(this).closest('.pbmit-icon-box-hover-effect');
		jQuery('.pbmit-ele-miconheading , .elementor-inner-column', main_row).removeClass('pbmit-ihbox-hover-active');
		jQuery(this).addClass('pbmit-ihbox-hover-active');
	});
}

var pbmit_multi_icon_box_hover_effect = function() {
	jQuery(".pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-1:nth-child(2),.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-3:nth-child(2),.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-15:nth-child(2),.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-37:nth-child(1)").eq(0).addClass('pbmit-mihbox-hover-active');
	jQuery(".pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-1,.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-3,.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-15,.pbmit-multi-icon-box-hover-effect .pbmit-miconheading-style-37").mouseover(function() {
		var main_row = jQuery(this).closest('.pbmit-multi-icon-box-hover-effect');
		jQuery('.pbmit-miconheading-style-1,.pbmit-miconheading-style-3,.pbmit-miconheading-style-15,.pbmit-miconheading-style-37', main_row).removeClass('pbmit-mihbox-hover-active');
		jQuery(this).addClass('pbmit-mihbox-hover-active');
	}).mouseout(function() {
		var main_row = jQuery(this).closest('.pbmit-multi-icon-box-hover-effect');
		jQuery('.pbmit-miconheading-style-1,.pbmit-miconheading-style-3,.pbmit-miconheading-style-15,.pbmit-miconheading-style-37', main_row).removeClass('pbmit-mihbox-hover-active');
		jQuery(this).addClass('pbmit-mihbox-hover-active');
	});
}

var pbmit_carousel = function() {

	if (typeof Swiper !== 'undefined') {
		var x = 1;
		jQuery(".pbmit-element-viewtype-carousel").each(function() {

			var carouselElement	= jQuery(this);
			var columns			= jQuery(this).data('columns');
			var var_loop		= jQuery(this).data('loop');
			var autoplay		= jQuery(this).data('autoplay');
			var val_speed		= jQuery(this).data('speed');
			var val_delay	 	= jQuery(this).data('delay');
			var val_nav			= jQuery(this).data('nav');
			var val_dots		= jQuery(this).data('dots');
			var val_center		= jQuery(this).data('center');
			var val_margin		= jQuery(this).data('margin');
			var loopSlide		= null;
			var sl_speed		= 300;
			var show_portion 	= jQuery(this).data('show-portion');

			jQuery('.pbmit-ele', carouselElement).each(function(){
				jQuery(this).css('display', 'block');
			});

			if( val_margin == 'default' || val_margin == '' ){
				val_margin = 30;
			} else {
				val_margin = parseInt(val_margin.replace( 'px', '' ));
			}

			jQuery(carouselElement).addClass('pbmit-element-viewtype-carousel-' + x);
			jQuery( '.pbmit-element-posts-wrapper', carouselElement).attr( 'id', 'pbmit-element-posts-wrapper-' + x);

			jQuery('.pbmit-element-timeline-style-1 .swiper-slide:even').addClass('pbmit-slide-even');

			if (val_dots == true) {
				jQuery('.pbmit-element-inner', carouselElement).append('<div class="swiper-pagination swiper-pagination-' + x + '"></div>');
			}
			if (val_nav == true) {
				jQuery('.pbmit-element-inner', carouselElement).append('<div class="swiper-button-next swiper-button-next-' + x + '"></div>');
				jQuery('.pbmit-element-inner', carouselElement).append('<div class="swiper-button-prev swiper-button-prev-' + x + '"></div>');
			}
			if (val_nav == 'above') {						
				if( jQuery('.pbmit-ele-header-area .pbmit-carousel-nav-arrow-header', carouselElement).length == 0 ){
					jQuery('.pbmit-ele-header-area', carouselElement).addClass('container').append('<div class="pbmit-carousel-nav-arrow-header"></div>');
				}
				if( jQuery('.pbmit-carousel-nav-arrow-header .swiper-button-prev', carouselElement).length == 0 ){
					jQuery('.pbmit-carousel-nav-arrow-header', carouselElement).append('<div class="swiper-button-prev swiper-button-prev-' + x + '"></div>');
					jQuery('.pbmit-carousel-nav-arrow-header .swiper-button-prev', carouselElement).on( 'click', function() {
						swiper.slidePrev();
					});
				}
				if( jQuery('.pbmit-carousel-nav-arrow-header .swiper-button-next', carouselElement).length == 0 ){
					jQuery('.pbmit-carousel-nav-arrow-header', carouselElement).append('<div class="swiper-button-next swiper-button-next-' + x + '"></div>');
					jQuery('.pbmit-carousel-nav-arrow-header .swiper-button-next', carouselElement).on( 'click', function() {
						swiper.slideNext();
					});
				}
			}
			if( jQuery('.pbmit-ele-group-wrapper', carouselElement).length > 0 ){
				jQuery('.pbmit-ele-group-wrapper', carouselElement).addClass('swiper-slide');
			} else {
				jQuery('.pbmit-ele', carouselElement).addClass('swiper-slide');
			}

			jQuery('.pbmit-element-posts-wrapper', carouselElement).removeClass('row').removeClass('multi-columns-row');

			jQuery('.pbmit-ele', carouselElement).removeClass(function(index, className) {
				return (className.match(/(^|\s)col-md-\S+/g) || []).join(' ');
			}).removeClass(function(index, className) {
				return (className.match(/(^|\s)col-lg-\S+/g) || []).join(' ');
			});

			if (columns == '1') {
				var responsive_items = [ /* 1199 : */ '1', /* 991 : */ '1', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1'];
			} else if (columns == '2') {
				var responsive_items = [ /* 1199 : */ '2', /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1'];
			} else if (columns == '3') {
				var responsive_items = [ /* 1199 : */ '3', /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1'];
			} else if (columns == '4') {
				var responsive_items = [ /* 1199 : */ '4', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1'];
			} else if (columns == '5') {
				var responsive_items = [ /* 1199 : */ '5', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1'];
			} else if (columns == '6') {
				var responsive_items = [ /* 1199 : */ '6', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1'];
			} else {
				var responsive_items = [ /* 1199 : */ '3', /* 991 : */ '3', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1'];
			}

			if( show_portion == true ){
				if (columns == '1') {
					responsive_items = [ /* 1199 : */ '1.3', /* 991 : */ '1', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1'];
				} else if (columns == '2') {
					responsive_items = [ /* 1199 : */ '2.3', /* 991 : */ '2.3', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1'];
				} else if (columns == '3') {
					responsive_items = [ /* 1199 : */ '3.6', /* 991 : */ '2.3', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1'];
				} else if (columns == '4') {
					responsive_items = [ /* 1199 : */ '4.3', /* 991 : */ '4.3', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1'];
				} else if (columns == '5') {
					responsive_items = [ /* 1199 : */ '5.3', /* 991 : */ '4.3', /* 767 : */ '3.3', /* 575 : */ '2', /* 0 : */ '1'];
				} else if (columns == '6') {
					responsive_items = [ /* 1199 : */ '6.3', /* 991 : */ '4.3', /* 767 : */ '3.3', /* 575 : */ '2', /* 0 : */ '1'];
				} else {
					responsive_items = [ /* 1199 : */ '3.3', /* 991 : */ '3.3', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1']; // default
				}
			}

			var autoplay_val = { delay: val_delay };
			if (autoplay == false) {
				autoplay_val = false;
			}

			var navigation_val = false;
			if (val_nav == true) {
				navigation_val = {
					nextEl: '.swiper-button-next-' + x,
					prevEl: '.swiper-button-prev-' + x,
				};
			}

			var pagination_val = false;
			if (val_dots == true) {
				pagination_val = {
					el: '.swiper-pagination-' + x,
					clickable: true,
				};
			}
			// show last box as half
			if (jQuery(this).closest('.elementor-element').hasClass('pbmit-slider-partial-over') && columns == '2') { // to set swiper that will show last box as half
				responsive_items = [ /* 1199 : */ '1.5', /* 991 : */ '1', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1'];
			}
			
			var swiper_options = {
				createElements	: true,
				loop			: var_loop,
				autoplay		: autoplay_val,
				speed			: val_speed,
				navigation		: navigation_val,
				pagination		: pagination_val,
				slidesPerView	: columns,
				spaceBetween	: val_margin,
				centeredSlides	: val_center,
				breakpoints		: {
					1199: {
						slidesPerView: responsive_items[0],
					},
					991: {
						slidesPerView: responsive_items[1],
					},
					767: {
						slidesPerView: responsive_items[2],
					},
					575: {
						slidesPerView: responsive_items[3],
					},
					0: {
						slidesPerView: responsive_items[4],
					}
				},
			};

			var swiper = new Swiper('.pbmit-element-viewtype-carousel-' + x + ' .pbmit-element-posts-wrapper', swiper_options );

			// increase number for multiple carousel
			x = x + 1;

			if(jQuery(carouselElement).hasClass('pbmit-element-testimonial-style-3')){
				jQuery(carouselElement).find('.swiper-pagination').append('<div class="pbmit-sticky-corner  pbmit-bottom-left-corner"><svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg"><path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path></svg></div><div class="pbmit-sticky-corner pbmit-top-right-corner"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path></svg></div>');
			}

		});
	}

}


/* ====================================== */
/* Menu item count
/* ====================================== */
var pbmit_menu_count = function() {
	if (jQuery('ul#pbmit-top-menu > li').length > 0 || jQuery('div#pbmit-top-menu > ul > li').length > 0) {
		if (jQuery('ul#pbmit-top-menu > li').length > 0) {
			var total_li = jQuery('ul#pbmit-top-menu > li').length;
		}
		if (jQuery('div#pbmit-top-menu > ul > li').length > 0) {
			var total_li = jQuery('div#pbmit-top-menu > ul > li').length;
		}
		if (total_li > 6) {
			jQuery('#site-navigation').addClass('pbmit-bigger-menu');
		}
	}
}

/* ====================================== */
/* Animate on scroll : Number rotator
/* ====================================== */
var pbmit_number_rotate = function() {
	jQuery(".pbmit-number-rotate").each(function() {
		var self = jQuery(this);
		var delay = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);
		var animation = self.data("appear-animation");

		self.html('0');
		self.waypoint(function(direction) {
			if (!self.hasClass('completed')) {
				var from = self.data('from');
				var to = self.data('to');
				var interval = self.data('interval');
				self.numinate({
					format: '%counter%',
					from: from,
					to: to,
					runningInterval: 2000,
					stepUnit: interval,
					onComplete: function(elem) {
						self.addClass('completed');
					}
				});
			}
		}, { offset: '85%' });
	});
};

/* ====================================== */
/* Image size correction
/* ====================================== */
var pbmit_img_size_correction = function() {
	setTimeout(function() {
		jQuery("img").each(function() {
			var thisimg = jQuery(this);
			var p_width = jQuery(this).parent().width();
			var width = jQuery(this).attr('width');
			var height = jQuery(this).attr('height');
			if ((typeof width !== typeof undefined && width !== false) && (typeof height !== typeof undefined && height !== false)) {
				var ratio = height / width;
				jQuery(this).data('pbmit-ratio', ratio);
				var real_width = jQuery(this).width();
				var new_height = Math.round(real_width * ratio);
			}
		});
	}, 100);
};

/* ====================================== */
/* Tabs
/* ====================================== */
var pbmit_tabs_element = function() {
	var tab_number = '';
	jQuery('.pbmit-tab-link').on('click', function(){
		if( !jQuery(this).hasClass('pbmit-tab-li-active') ){
			var parent = jQuery(this).closest('ul.pbmit-tabs-heading');
			jQuery( 'li', parent).each(function(){
				jQuery(this).removeClass('pbmit-tab-li-active')
			});
			jQuery(this).addClass('pbmit-tab-li-active');
			tab_number = jQuery( this ).data('pbmit-tab');
			jQuery(this).parent().parent().find('.pbmit-tab-content').removeClass('pbmit-tab-active');
			jQuery(this).parent().parent().find('.pbmit-tab-content-'+tab_number).addClass('pbmit-tab-active');
		}
	});
	var this_title = '';
	jQuery('.pbmit-tab-content-title').on('click', function(){
		this_title = jQuery(this);
		tab_number = jQuery( this ).data('pbmit-tab');
		jQuery( this ).closest('.pbmit-tabs').find('li.pbmit-tab-link[data-pbmit-tab="'+tab_number+'"]',  ).trigger('click');
		var animateTo = jQuery(this_title).offset().top - 10;
		if (jQuery('#wpadminbar').length > 0) {
			animateTo = animateTo - jQuery('#wpadminbar').height();
		}
		jQuery('html, body').animate({
			scrollTop: animateTo
		}, 500);
	});
};

var pbmit_infinite_scroll = function(relayout='') {
	if (jQuery('.pbmit-element-viewtype-masonry').length > 0) {
		jQuery('.pbmit-element-viewtype-masonry').each(function() {

			var main_ele = jQuery(this);
			var style = jQuery(this).data('style');
			var cpt = jQuery(this).data('cpt');
			var columns = jQuery(this).data('columns');
			var show = jQuery(this).data('show');
			var totalpagination = jQuery(this).data('totalpagination');

			// init Masonry
			let $grid = jQuery('.pbmit-element-posts-wrapper', main_ele).masonry({
				itemSelector: 'none', // select none at first
				columnWidth: '.pbmit-ele',
				gutter: 0,
				percentPosition: true,
				stagger: 30,
				// nicer reveal transition
				visibleStyle: { transform: 'translateY(0)', opacity: 1 },
				hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
				horizontalOrder: true
			});

			// get Masonry instance
			let msnry = $grid.data('masonry');

			// initial items reveal
			$grid.imagesLoaded(function() {
				$grid.removeClass('are-images-unloaded');
				$grid.masonry('option', { itemSelector: '.pbmit-ele' });
				let $items = $grid.find('.pbmit-ele');
				$grid.masonry('appended', $items);
			});

			// Infinite scroll
			if (jQuery(main_ele).hasClass('pbmit-infinite-scroll-yes')) {

				var infinitre_scroll_data = jQuery('.pbmit-infinite-scroll-data', main_ele).html();
				if (infinitre_scroll_data != '') {
					var url_attributes = '';
					jQuery.each(jQuery.parseJSON(infinitre_scroll_data), function(key, value) {
						url_attributes = url_attributes + '&' + key + '=' + value;
					});
				}

				if (jQuery(main_ele).hasClass('pbmit-infinite-scroll-button-yes')) { // infinite scroll with button

					var x = 2;

					$grid.infiniteScroll({
						// options
						path: pbmit_js_variables.ajaxurl + '?action=pbmit_infinite_scroll&page_no={{#}}&nonce=' + pbmit_js_variables.ajaxnonce + url_attributes,
						checkLastPage: false,
						button: '.pbmit-ajax-load-more-btn > a',
						scrollThreshold: false,
						status: '.pbmit-infinite-loader', // disable loading on scroll
						append: '.pbmit-ele',
						history: false,
						visibleStyle: { transform: 'translateY(0)', opacity: 1 },
						outlayer: msnry,
					});
					$grid.on('load.infiniteScroll', function(event, body, path, items, response) {
						jQuery(items).each(function() {
							jQuery(this).addClass('pbmit-infinite-scroll-animation');
						});

						if (x >= totalpagination) {
							jQuery('.pbmit-ajax-load-more-btn > a', main_ele).hide();
							jQuery('.pbmit-infinite-loader', main_ele).addClass('pbmit-infinite-loader-hide');
							jQuery('.pbmit-infinite-scroll-last', main_ele).show();
						}
						x++;
					});

					$grid.on( 'append.infiniteScroll', function( event, body, path, items, response ) {
						pbmit_set_tooltip();
					});

				} else { // infinite scroll without button

					// hide load more button
					var x = 2;
					if (x >= totalpagination) { jQuery('.pbmit-ajax-load-more-btn > a', main_ele).hide(); } // hide button on page load if lower post found

					$grid.infiniteScroll({
						path: pbmit_js_variables.ajaxurl + '?action=pbmit_infinite_scroll&page_no={{#}}&nonce=' + pbmit_js_variables.ajaxnonce + url_attributes,
						append: '.pbmit-ele',
						outlayer: msnry,
						status: '.pbmit-infinite-loader',
						history: false,
						scrollThreshold: -200,
					});

					$grid.on('load.infiniteScroll', function(event, body, path, response) {

						// hide the "all content loaded" message
						var data_show = $grid.closest('.pbminfotech-element').data('show');
						if (data_show == -1) { data_show = 9999; }
						var total_ele = jQuery('.pbmit-ele', $grid).length;

						if (x >= totalpagination) {
							jQuery('.pbmit-infinite-loader', main_ele).addClass('pbmit-infinite-loader-hide');
							if (data_show < total_ele) {
								jQuery('.pbmit-infinite-scroll-last', main_ele).show();
							}
						}
						x++;
					});
					
					$grid.on( 'append.infiniteScroll', function( event, body, path, items, response ) {
						pbmit_set_tooltip();
					});
				}

			}

			setTimeout(function() { $grid.masonry(); }, 700);

		});

	}
}

var pbmit_search_results = function() {
	if (jQuery('.pbmit-search-results-main-wrapper').length > 0 && jQuery('.pbmit-search-result-tab-links').length > 0) {
		jQuery('.pbmit-search-results-main-wrapper').skeletabs({keyboard:false});
	}
}

// steps animation
var pbmit_stepanimation = function() {
	var i = 0;

	function animateSteps(m) {
		jQuery('#stepsAnimation').find('.step').each(function(index) {
			jQuery(this).removeClass('step-animate');
		})
		jQuery('#stepsAnimation .multi-columns-row').find('.step').eq(m).addClass('step-animate');
	}
	var intervalId = window.setInterval(function() {
		i = i + 1;
		if (i > 3) {
			i = 0
		}
		animateSteps(i);
	}, 3000);
	animateSteps(i);
	jQuery('#stepsAnimation').find('.step').each(function(index) {
		jQuery(this).addClass('step-' + (index + 1));
	});
}

var pbmit_progressbar = function() {
	jQuery('.pbmit-progressbar').each(function() {
		var $progressbar_ele = jQuery(this);
		jQuery(this).waypoint(function(direction) {
			var $progressbar = jQuery('.elementor-progress-bar', $progressbar_ele);
			if (!$progressbar.hasClass('completed')) {
				$progressbar.css('width', $progressbar.data('max') + '%').addClass('completed');
			}
		}, { offset: '99%' });
	});
}

/* ====================================== */
/* Comment form validator
/* ====================================== */
var pbmit_validate = function() {
	jQuery("#commentform").on('submit', function(event) {
		var error = false;
		jQuery('.pbmit-form-error').hide();
		if (jQuery("#author").length > 0 && !jQuery("#author").val()) { // empty author
			jQuery('.comment-form-author .pbmit-form-error').show();
			error = true;
		}
		if (jQuery("#comment").length > 0 && !jQuery("#comment").val()) { // empty comment
			jQuery('.comment-form-comment .pbmit-form-error').show();
			error = true;
		}
		if (jQuery("#email").length > 0) {
			if (!jQuery("#email").val()) { // empty email
				jQuery('.comment-form-email .pbmit-form-error.pbmit-empty-email').show();
				error = true;
			} else {
				var valid_email = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(jQuery("#email").val()));
				if (valid_email != true) {
					jQuery('.comment-form-email .pbmit-form-error.pbmit-invalid-email').show();
					error = true;
				}
			}
		}
		if (error == true) {
			event.preventDefault();
			return false;
		} else {
			return true;
		}
	});
}

var pbmit_image_correction = function() {
	jQuery('.site-content-wrap img').each(function() {
		var ele_this	= jQuery(this);
		var ele_width	= jQuery(this).attr("width");
		var ele_height	= jQuery(this).attr("height");
		var ele_url		= jQuery(this).attr("src");
		if ( ( typeof ele_width === 'undefined' || ele_width === false ) || ( typeof ele_height === 'undefined' || ele_height === false ) ) {
			jQuery("<img/>").attr('src', ele_url).on('load', function() {
				ele_this.attr( 'width', this.width );
				ele_this.attr( 'height', this.height );
			});
		}
	});
}

function pbmit_mousehover_tooltip() {

	jQuery("<div id='pbmit-portfolio-cursor'><div class='pbmit-tooltip-content'></div></div>").appendTo("body");

	var pbmit_text = jQuery('.pbmit-element-portfolio-style-3 .pbminfotech-post-content');
	var pbmit_cursor = jQuery("#pbmit-portfolio-cursor");

	jQuery(document).on('mousemove', function(e) {
		var pbmit_x = e.clientX;
		var pbmit_y = e.clientY;
		pbmit_cursor.css({ "transform": "translate3d(" + pbmit_x + "px, " + pbmit_y + "px, 0px)" });
	})

	if (pbmit_text.length) {
		pbmit_text.each(function() {
			var elm = jQuery(this);
			var pbmit_html = elm.find('.pbminfotech-box-content').html();
			elm.on('mouseenter', function() {
				pbmit_cursor.addClass('active').find('.pbmit-tooltip-content').html(pbmit_html);
			}).on('mouseleave', function(e) {
				pbmit_cursor.removeClass('active').find('.pbmit-tooltip-content').html('');
			});
		});
	}
}

/* ====================================== */
/* Marquee
/* ====================================== */

var pbmit_marquee = function() {

	if (typeof Swiper !== 'undefined') {
		var x = 1;

		jQuery(".pbminfotech-element-marquee-effect").each(function() {
			var carouselElement = jQuery(this).find('.pbmit-marquee-effect-section');

			var reverse_direction = jQuery(this).data('reverse');

			jQuery(carouselElement).addClass('pbmit-marquee-effect-section-' + x);

			jQuery('.pbmit-ele', carouselElement).addClass('swiper-slide');
			jQuery('.pbmit-element-posts-wrapper', carouselElement).removeClass('row').removeClass('multi-columns-row');

			jQuery('.pbmit-ele', carouselElement).removeClass(function(index, className) {
				return (className.match(/(^|\s)col-md-\S+/g) || []).join(' ');
			}).removeClass(function(index, className) {
				return (className.match(/(^|\s)col-lg-\S+/g) || []).join(' ');
			});

			if (!reverse_direction) reverse_direction = false;

			var swiper = new Swiper('.pbmit-marquee-effect-section-' + x + ' .pbmit-marquee-container', {
				createElements: true,
				spaceBetween: 0,
				centeredSlides: true,
				speed: 12000,
				autoplay: {
					delay: 1,
					disableOnInteraction: true,
					reverseDirection: reverse_direction,
				},
				loop: true,
				slidesPerView: 'auto',
				allowTouchMove: false,
				disableOnInteraction: true,
			});

			var swiper = new Swiper('.pbmit-marquee-effect-section-' + x + ' .pbmit-marquee-container.pbmit-tag-bottom', {
				spaceBetween: 0,
				centeredSlides: true,
				speed: 12000,
				autoplay: {
					delay: 1,
					reverseDirection: true
				},
				loop: true,
				slidesPerView: 'auto',
				allowTouchMove: false,
				disableOnInteraction: true
			});
			// increase number for multiple carousel
			x = x + 1;
		});
	}
}

var pbmit_timelinehover = function() {
	jQuery(".pbmit-timeline ol li div.pbmit-content").mouseover(function() {
		jQuery('.pbmit-cursor').addClass('pbmit-time-cur');
	}).mouseout(function() {
		jQuery('.pbmit-cursor').removeClass('pbmit-time-cur');
	});
}

var pbmit_hover_slide = function() {

	if (typeof Swiper !== 'undefined') {

		var pbmit_hover1 = new Swiper(".pbmit-hover-image", {
			grabCursor: true,
			allowTouchMove: false,
			effect: 'fade',
			mousewheel: false,
			slidesPerView: 1,
			spaceBetween: 0,
			speed: 800,
		});
		jQuery('.pbmit-main-hover-slider li').hover(function(e) {
			e.preventDefault();
			var myindex = jQuery(this).index();
			pbmit_hover1.slideTo(myindex, 500, false);
		});
	}
}

var pbmit_footer_position = function() {
	if( !jQuery('body').hasClass('elementor-editor-active') ){
		jQuery('footer#colophon').css({
			'position': '',
			'width': '',
			'bottom': ''
		});
		jQuery('body, #page').height( '' );
		if( jQuery(window).height() > jQuery('body').height() ){
			var window_height = jQuery(window).height();
			if( jQuery('#wpadminbar').length > 0 ){
				var adminbar = jQuery('#wpadminbar').height();
				window_height = window_height - adminbar;
			}
			jQuery('body, #page').height( window_height );
			jQuery('footer#colophon').css({
				'position': 'absolute',
				'width': '100%',
				'bottom': '0'
			});
		}
	}
}

var pbmit_burger_menu = function() {
	if (jQuery('.pbmit-header-style-9,.pbmit-header-style-10,.pbmit-header-style-13,.pbmit-header-style-14,.pbmit-header-style-15').length > 0) {


		jQuery('.pbmit-header-style-9 .pbmit-header-overlay .pbmit-logo-menuarea,.pbmit-header-style-10 .pbmit-header-overlay .pbmit-logo-menuarea,.pbmit-header-style-13 .pbmit-header-overlay .pbmit-logo-menuarea,.pbmit-header-style-14 .pbmit-header-overlay .pbmit-logo-menuarea,.pbmit-header-style-15 .pbmit-header-overlay .pbmit-logo-menuarea').clone().appendTo('.pbmit-burger-headerarea');
		jQuery('.pbmit-header-style-9 .pbmit-header-overlay .pbmit-search-cart-box,.pbmit-header-style-10 .pbmit-header-overlay .pbmit-search-cart-box,.pbmit-header-style-13 .pbmit-header-overlay .pbmit-search-cart-box,.pbmit-header-style-14 .pbmit-header-overlay .pbmit-search-cart-box,.pbmit-header-style-15 .pbmit-header-overlay .pbmit-search-cart-box').clone().appendTo('.pbmit-burger-headerarea');

		
		jQuery('.pbmit-header-style-9 .pbmit-header-overlay .main-navigation,.pbmit-header-style-10 .pbmit-header-overlay .main-navigation,.pbmit-header-style-13 .pbmit-header-overlay .main-navigation,.pbmit-header-style-14 .pbmit-header-overlay .main-navigation,.pbmit-header-style-15 .pbmit-header-overlay .main-navigation').clone().appendTo( '.pbmit-burger-menu-area-inner' ).insertBefore(".pbmit-burger-content");
		jQuery('.pbmit-burger-menu-area .main-navigation, .pbmit-burger-menu-area .main-navigation ul, .pbmit-burger-menu-area .main-navigation ul li, .pbmit-burger-menu-area .main-navigation ul li a').removeAttr('id');

		jQuery('.pbmit-burger-menu-area .main-navigation').removeClass('pbmit-navbar');
		jQuery('.pbmit-burger-menu-area .sub-menu-toggle').remove();

		jQuery('.pbmit-burger-menu-area ul.menu li:has(ul) > a').after("<span class='sub-menu-toggle'><i class='pbmit-base-icon-down-open-big'></i></span>");

		jQuery('.pbmit-burger-menu-area .sub-menu-toggle').on('click', function() {

			if (jQuery(this).siblings('.sub-menu, .children').css('display') == 'block'){			
				jQuery(this).siblings('.sub-menu, .children').slideUp();
				jQuery('i', jQuery(this)).removeClass('pbmit-base-icon-up-open-big').addClass('pbmit-base-icon-down-open-big');
			} else {
				jQuery(this).siblings('.sub-menu, .children').slideDown();
				jQuery('i', jQuery(this)).removeClass('pbmit-base-icon-down-open-big').addClass('pbmit-base-icon-up-open-big');
			}
			return false;
		});

		jQuery('.pbmit-burger-menu-link').click(function() {
			jQuery('.pbmit-burger-menu-area').addClass('show');
		});
		jQuery('.pbmit-burger-menu-area .pbmit-closepanel').click(function() {
			jQuery('.pbmit-burger-menu-area').removeClass('show');			
		});

	}
}

/*----  Events  ----*/

var pbmit_ajax_pagination = function() {

	if( jQuery('.pbminfotech-element.pbmit-ajax-pagination-yes').length > 0 ){

		jQuery('.pbminfotech-element.pbmit-ajax-pagination-yes').each(function(){
			var main_ele = jQuery(this);

			jQuery('.pbmit-pagination a', main_ele).each(function(i,e){
				var link_href = jQuery(e).attr('href');
				var link_href_array = link_href.split("page");
				var page_number = link_href_array[link_href_array.length - 1];
				page_number = page_number.replace("/", "");
				page_number = page_number.replace("/", "");

				jQuery(e).attr('data-pagenum', page_number );

			})




			jQuery('.pbmit-pagination .page-numbers', main_ele).click(function(e){
				
				e.preventDefault();
				
				var thisEle = jQuery( this );

				if( thisEle.hasClass('current') ){
					return;
				}
		
				// add loader class
				jQuery('.pbmit-element-posts-wrapper', main_ele).addClass('pbmit-ajax-loading');
		
				// Active class
				var div_pagination = jQuery( this ).closest('.pbmit-pagination');
				jQuery('a, .page-numbers', div_pagination).removeClass('current');
				
				jQuery(this).addClass('current');

				var pagination = 1;
				if( jQuery( this ).data('pagenum') != '' ){
					pagination = jQuery( this ).data('pagenum')
				}
				
				var cpt				= main_ele.data('cpt');
				var style			= main_ele.data('style');
				var show			= main_ele.data('show');
				var columns			= main_ele.data('columns');
				var from_category	= main_ele.data('sortby');
				var orderby			= '';
				var order			= '';
				//var pagination			= pagenumber;
		
				var infinitre_scroll_data = jQuery( '.pbmit-infinite-scroll-data', main_ele ).html();
				if( infinitre_scroll_data!='' ){
					var url_attributes = '';
					jQuery.each( jQuery.parseJSON(infinitre_scroll_data), function(key, value){
						if( key == 'cpt' ){
							cpt = value;
						} else if( key == 'style' ){
							style = value;
						} else if( key == 'show' ){
							show = value;
						} else if( key == 'columns' ){
							columns = value;
						} else if( key == 'orderby' ){
							orderby = value;
						} else if( key == 'order' ){
							order = value;
						} else if( key == 'from_category' ){
							from_category = value;
						}
					});
				}



				jQuery.ajax({
					type	: "post",
					url		: pbmit_js_variables.ajaxurl,
					data 	: {
						action			: "pbmit_ajax_pagination",
						cpt				: cpt,
						style			: style,
						show			: show,
						columns			: columns,
						from_category	: from_category,
						orderby			: orderby,
						order			: order,
						pagination		: pagination,
		
						nonce			: pbmit_js_variables.ajaxnonce_ajax_pagination
					},
					success	: function(response){
						jQuery('.pbmit-element-posts-wrapper', main_ele).removeClass('pbmit-ajax-loading');
						jQuery('.pbmit-element-posts-wrapper', main_ele).html(response);
					}
				});


			});

		}); // each


	}

}

// On resize
jQuery(window).resize(function() {
	/* Image size correction */
	pbmit_img_size_correction();
	pbmit_mousehover_tooltip();
	pbmit_footer_position();
	pbmit_marquee();
});

// on ready
jQuery(document).ready(function() {
	pbmit_menu_span();
	pbmit_validate();
	pbmit_search_results();
	pbmit_stepanimation();
	pbmit_toggleSidebar();
	pbmit_tabs_element();
	pbmit_sorting();
	pbmit_ajax_sorting();
	pbmit_back_to_top();
	pbmit_sticky_header();
	pbmit_navbar();
	pbmit_lightbox();
	pbmit_video_popup();
	pbmit_multi_icon_box_hover_effect();
	pbmit_testimonial();
	pbmit_search_btn();
	pbmit_center_logo_header_class();
	pbmit_selectwrap();
	pbmit_menu_count();
	setTimeout(function() { pbmit_carousel(); }, 500);
	pbmit_img_size_correction();
	setTimeout(function() { pbmit_number_rotate(); }, 700);
	pbmit_sticky_header_class();
	pbmit_icon_box_hover_effect();
	pbmit_progressbar();
	pbmit_marquee();
	pbmit_hover_slide();
	pbmit_selectwrap_class();
	pbmit_timelinehover();
	pbmit_image_correction();
	pbmit_footer_position();
	pbmit_burger_menu();
	// Update cart total on cart page
	pbmit_wc_cart_page_qty_update();
	pbmit_ajax_pagination();
});

// on load
jQuery(window).on('load', function() {
	pbmit_preloader();
	pbmit_sorting();
	pbmit_gallery();
	pbmit_circle_progressbar();
	pbmit_infinite_scroll();
	pbmit_footer_position();

});