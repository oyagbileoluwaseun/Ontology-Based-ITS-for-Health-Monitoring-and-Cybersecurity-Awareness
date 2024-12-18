
"use strict";

var pbmit_kirki_bg_color_show_hide = function(){
	jQuery('.accordion-section').on('click', function(){
		setTimeout(function(){
			jQuery('li.customize-control.customize-control-kirki-background' ).each(function(){
				var this_bg_ele = jQuery(this);
				var selected = '';
				if( jQuery(this).prev().hasClass('customize-control-kirki-radio-image') ){
					selected = jQuery('input.image-select:checked',  jQuery(this).prev() ).val() ; 
					if ( selected ) {
						if( selected == 'custom' ) {
							jQuery( '.background-color', this_bg_ele ).show();
						} else {
							jQuery( '.background-color', this_bg_ele ).hide();
						}
					}
				}
			});
		}, 100);
	});
}

var pbmit_redirect_to_wizard = function(){
	var redirect_message = jQuery('#pbmit-redirecting-message');
	if ( redirect_message.length){
		jQuery('#message').hide();
		var admin_url	= ajaxurl.replace("admin-ajax.php", "" );
		admin_url		= admin_url + "themes.php?page=xcare-setup";
		location.href	= admin_url;
	}
}

jQuery(document).ready(function($){
	pbmit_redirect_to_wizard();
	pbmit_kirki_bg_color_show_hide();
	jQuery( '#acf-pbmit-photo-gallery-group' ).hide();
	jQuery( '.pbmit-ratings-message-small a' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.pbmit-ratings-message-box');
		jQuery('.pbmit-ratings-message-conform', parent).fadeIn();
		jQuery('.pbmit-ratings-message-inner', parent).animate({opacity: 0}, 400);
		jQuery('.pbmit-ratings-message-box button.notice-dismiss', parent).fadeOut(400);
	});
	jQuery( '.pbmit-disable-ratings-message-cancel' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.pbmit-ratings-message-box');
		jQuery('.pbmit-ratings-message-conform', parent).fadeOut();
		jQuery('.pbmit-ratings-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.pbmit-ratings-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.pbmit-disable-ratings-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'pbmit_remove_ratings_message' },
			function(response) {
				// Do nothing
			}
		);
	});

	// Ratings box
	jQuery( '.pbmit-ratings-box .pbmit-question-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-main').slideUp(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-questions').slideDown(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.pbmit-ratings-box .pbmit-happy-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-main').slideUp(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-ratings').slideDown(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.pbmit-ratings-box .pbmit-ratings-box-back-link' ).on('click', function(e){
		e.preventDefault();
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-main').slideDown(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-ratings').slideUp(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-questions').slideUp(400);
		jQuery('.pbmit-ratings-box .pbmit-ratings-box-back-link').fadeOut(400);
	});
	jQuery( '.pbmit-disable-ratings-message-cancel' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.pbmit-ratings-message-box');
		jQuery('.pbmit-ratings-message-conform', parent).fadeOut();
		jQuery('.pbmit-ratings-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.pbmit-ratings-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.pbmit-disable-ratings-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'pbmit_remove_ratings_message' },
			function(response) {
				// Do nothing
			}
		);
	});
});
jQuery(window).on('load', function($){

	// Post Format functions
	pbminfotech_post_format_calls();

});	

var pbminfotech_post_format_calls = function() {

	jQuery('#acf-form-data').insertAfter('#titlediv');
	jQuery('#acf_after_title-sortables').insertAfter('#acf-form-data');

	jQuery('input[type=radio][name=post_format]').change(function() {

		if( this.value == 'image' ){  // Post Format - Image
			jQuery('#postimagediv').after('<div id="pbmit-postimagediv-place-holder"></div>').insertAfter('#titlediv');
		} else {
			jQuery('#pbmit-postimagediv-place-holder').replaceWith( jQuery('#postimagediv') );
		}

		if( this.value == 'status' ){  // Post Format - Status
			jQuery('#content:visible').focus();
			jQuery('#titlewrap').hide();
		} else {
			jQuery('#titlewrap').show();
		}

	});

};