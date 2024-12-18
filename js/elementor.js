"use strict";

/* ====================================== */
/* Reset and rearrange Stretched Column
/* ====================================== */
var pbmit_rearrange_stretched_col = function( model_id ) {
	if( jQuery('body').hasClass('elementor-editor-active') ){
		jQuery( '*[data-id="'+model_id+'"]' ).each(function(){
			jQuery('.pbmit-stretched-div', this).remove();
			jQuery('.elementor-widget-wrap', this).removeAttr('style');
			setTimeout(function(){ pbmit_stretched_col(); }, 50);
		});	
	}
}

/* ====================================== */
/* Stretched Column
/* ====================================== */
var pbmit_stretched_col = function() {

	jQuery('.elementor-section.elementor-top-section').each(function(){
		if( jQuery(this).hasClass('pbmit-col-stretched-left') || jQuery(this).hasClass('pbmit-col-stretched-right') || jQuery(this).hasClass('pbmit-col-stretched-both') ){
			jQuery(this).addClass('pbmit-col-stretched-yes').removeClass('pbmit-col-stretched-no');
		} else {
			jQuery(this).addClass('pbmit-col-stretched-no').removeClass('pbmit-col-stretched-yes');
		}
	});

	// remove all stretched related changes in each column
	jQuery('.elementor-section.elementor-top-section').each(function(){
		var ThisSection = jQuery(this);
		var ThisColumn	= '';
		jQuery( '.elementor-column.elementor-top-column', ThisSection ).each(function(){
			ThisColumn	= jQuery(this);
			jQuery( '.pbmit-stretched-div', ThisColumn ).remove();
			ThisColumn.removeClass('pbmit-col-stretched-yes pbmit-col-stretched-left pbmit-col-stretched-right pbmit-col-stretched-content-yes');
		});
	});

	// reset - Remove all inline css
	jQuery('.elementor-section.elementor-top-section').each(function(){
		jQuery( '.elementor-column.elementor-top-column', jQuery(this) ).each(function(){
			if( jQuery(this).children('.elementor-column-wrap').length > 0 ){
				jQuery(this).children('.elementor-column-wrap').removeAttr('style');
			} else {
				jQuery(this).children('.elementor-widget-wrap').removeAttr('style');
			}
		});
	});

	jQuery('.elementor-section.elementor-top-section.pbmit-col-stretched-yes').each(function(){

		var ThisSection		= jQuery(this);
		var ThisColumn		= '';
		var ColWrapper		= '';
		var StretchedEle	= '';
		var StretchedInnerEle = '';

		if( ThisSection.hasClass('pbmit-col-stretched-left') || ThisSection.hasClass('pbmit-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column.elementor-top-column', ThisSection ).first();

			if( jQuery('.pbmit-stretched-div', ThisColumn).length == 0 ){

				if( ThisColumn.children('.elementor-column-wrap').length > 0 ){
					ColWrapper = ThisColumn.children('.elementor-column-wrap');
				} else {
					ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				}

				ColWrapper.prepend( '<div class="pbmit-stretched-div"></div>' );

				// Stretched Element
				StretchedEle = ColWrapper.children('.pbmit-stretched-div');

				// RTL
				if( jQuery('body').hasClass('rtl') ){
					StretchedEle.addClass( 'pbmit-stretched-right pbmit-stretched-for-rtl' );
					ThisColumn.addClass('pbmit-col-stretched-yes pbmit-col-stretched-right pbmit-col-stretched-for-rtl');
				} else {
					StretchedEle.addClass( 'pbmit-stretched-left' );
					ThisColumn.addClass('pbmit-col-stretched-yes pbmit-col-stretched-left');
				}

				// specially for Skew view only
				if( ThisColumn.hasClass('pbmit-skew-yes') ){
					StretchedEle.prepend( '<div class="pbmit-stretched-inner-div"></div>' );
					StretchedInnerEle = StretchedEle.children('.pbmit-stretched-inner-div');
					StretchedInnerEle.css('position', 'absolute');
					StretchedInnerEle.css('width', '100%');
					StretchedInnerEle.css('height', '100%');
				}

				if( ThisSection.hasClass('pbmit-left-col-stretched-content-yes') ){
					ThisColumn.addClass('pbmit-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('pbmit-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.removeAttr('style');
				var bgImage =  ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					// specially for Skew view only
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-image', bgImage );
					} else {
						StretchedEle.css('background-image', bgImage );
					}
					ColWrapper.css('background-image', 'none');
				}

				// border radious
				ColWrapper.css('border-top-left-radius', '');
				ColWrapper.css('border-top-right-radius', '');
				ColWrapper.css('border-bottom-left-radius', '');
				ColWrapper.css('border-bottom-right-radius', '');
				var radius_t_left  =  ColWrapper.css('border-top-left-radius');
				var radius_t_right =  ColWrapper.css('border-top-right-radius');
				var radius_b_left  =  ColWrapper.css('border-bottom-left-radius');
				var radius_b_right =  ColWrapper.css('border-bottom-right-radius');
				if( radius_t_left!='0' && radius_t_left!='' ){
					StretchedEle.css('border-top-left-radius', radius_t_left );
					ColWrapper.css('border-top-left-radius', '0');
				}
				if( radius_t_right!='0' && radius_t_right!='' ){
					StretchedEle.css('border-top-right-radius', radius_t_right );
					ColWrapper.css('border-top-right-radius', '0');
				}
				if( radius_b_left!='0' && radius_b_left!='' ){
					StretchedEle.css('border-bottom-left-radius', radius_b_left );
					ColWrapper.css('border-bottom-left-radius', '0');
				}
				if( radius_b_right!='0' && radius_b_right!='' ){
					StretchedEle.css('border-bottom-right-radius', radius_b_right );
					ColWrapper.css('border-bottom-right-radius', '0');
				}

				// Background Color
				var bgColor = ColWrapper.css('background-color');

				if( bgColor && bgColor!='' ){

					if( bgColor.indexOf('rgba') != -1 ){ // check if RGB or RGBA

						var bgColorArray = bgColor.split(',');
						var colors = [];
						jQuery(bgColorArray).each(function(x,y){
							y = y.replace( 'rgba' , '' );
							y = y.replace( '(' , '' );
							y = y.replace( ')' , '' );
							y = y.trim();
							colors.push(y);
						});

						bgColor = 'rgb(';
						var loopx = 1;
						var opacity = 'n'
						jQuery.each( colors , function( index, value ) {
							if ( loopx == 1 ){
								bgColor += value;
							} else if ( loopx == 2 || loopx == 3 ){
								bgColor += ',' + value;
							} else if ( loopx == 4 && ( value == '0' || value == 0 ) ){
								opacity = 'y';
							}
							loopx = loopx + 1;
						});
						bgColor += ')';

						if ( opacity == 'y' ){
							bgColor = 'transparent';
						}

					}

					// specially for Skew view only
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-color', bgColor );
					} else {
						StretchedEle.css('background-color', bgColor );
					}

					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-position', bgPosition );
					} else {
						StretchedEle.css('background-position', bgPosition );
					}
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-repeat', bgRepeat );
					} else {
						StretchedEle.css('background-repeat', bgRepeat );
					}
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-size', bgSize );
					} else {
						StretchedEle.css('background-size', bgSize );
					}
				}

				pbmit_stretched_col_calc();

			}

		}

		if( ThisSection.hasClass('pbmit-col-stretched-right') || ThisSection.hasClass('pbmit-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column.elementor-top-column', ThisSection ).last();

			if( jQuery('.pbmit-stretched-div', ThisColumn).length==0 ){

				if( ThisColumn.children('.elementor-column-wrap').length > 0 ){
					ColWrapper = ThisColumn.children('.elementor-column-wrap');
				} else {
					ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				}

				ColWrapper.prepend( '<div class="pbmit-stretched-div"></div>' );

				// Stretched Element
				StretchedEle = ColWrapper.children('.pbmit-stretched-div');

				// RTL
				if( jQuery('body').hasClass('rtl') ){
					StretchedEle.addClass( 'pbmit-stretched-left pbmit-stretched-for-rtl' );
					ThisColumn.addClass('pbmit-col-stretched-yes pbmit-col-stretched-left pbmit-col-stretched-for-rtl');
				} else {
					StretchedEle.addClass( 'pbmit-stretched-right' );
					ThisColumn.addClass('pbmit-col-stretched-yes pbmit-col-stretched-right');
				}

				// specially for Skew view only
				if( ThisColumn.hasClass('pbmit-skew-yes') ){
					StretchedEle.prepend( '<div class="pbmit-stretched-inner-div"></div>' );
					StretchedInnerEle = StretchedEle.children('.pbmit-stretched-inner-div');
					StretchedInnerEle.css('position', 'absolute');
					StretchedInnerEle.css('width', '100%');
					StretchedInnerEle.css('height', '100%');
				}

				if( ThisSection.hasClass('pbmit-right-col-stretched-content-yes') ){
					ThisColumn.addClass('pbmit-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('pbmit-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.removeAttr('style');
				var bgImage = ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					// specially for Skew view only
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-image', bgImage );
					} else {
						StretchedEle.css('background-image', bgImage );
					}
					ColWrapper.css('background-image', 'none');
				}

				// border radious
				ColWrapper.css('border-top-left-radius', '');
				ColWrapper.css('border-top-right-radius', '');
				ColWrapper.css('border-bottom-left-radius', '');
				ColWrapper.css('border-bottom-right-radius', '');
				var radius_t_left  =  ColWrapper.css('border-top-left-radius');
				var radius_t_right =  ColWrapper.css('border-top-right-radius');
				var radius_b_left  =  ColWrapper.css('border-bottom-left-radius');
				var radius_b_right =  ColWrapper.css('border-bottom-right-radius');
				if( radius_t_left!='0' && radius_t_left!='' ){
					StretchedEle.css('border-top-left-radius', radius_t_left );
					ColWrapper.css('border-top-left-radius', '0');
				}
				if( radius_t_right!='0' && radius_t_right!='' ){
					StretchedEle.css('border-top-right-radius', radius_t_right );
					ColWrapper.css('border-top-right-radius', '0');
				}
				if( radius_b_left!='0' && radius_b_left!='' ){
					StretchedEle.css('border-bottom-left-radius', radius_b_left );
					ColWrapper.css('border-bottom-left-radius', '0');
				}
				if( radius_b_right!='0' && radius_b_right!='' ){
					StretchedEle.css('border-bottom-right-radius', radius_b_right );
					ColWrapper.css('border-bottom-right-radius', '0');
				}

				// Background Color
				var bgColor = ColWrapper.css('background-color');
				if( bgColor && bgColor!='' ){
					if( bgColor.indexOf('rgba') != -1 ){ // check if RGB or RGBA
						var bgColorArray = bgColor.split(',');

						var colors = [];
						jQuery(bgColorArray).each(function(x,y){
							y = y.replace( 'rgba' , '' );
							y = y.replace( '(' , '' );
							y = y.replace( ')' , '' );
							y = y.trim();
							colors.push(y);
						});

						bgColor = 'rgb(';
						var loopx = 1;
						var opacity = 'n'
						jQuery.each( colors , function( index, value ) {
							if ( loopx == 1 ){
								bgColor += value;
							} else if ( loopx == 2 || loopx == 3 ){
								bgColor += ',' + value;
							} else if ( loopx == 4 && ( value == '0' || value == 0 ) ){
								opacity = 'y';
							}
							loopx = loopx + 1;
						});
						bgColor += ')';

						if ( opacity == 'y' ){
							bgColor = 'transparent';
						}

					}

					// specially for Skew view only
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-color', bgColor );
					} else {
						StretchedEle.css('background-color', bgColor );
					}
					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-position', bgPosition );
					} else {
						StretchedEle.css('background-position', bgPosition );
					}
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-repeat', bgRepeat );
					} else {
						StretchedEle.css('background-repeat', bgRepeat );
					}
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					if( ThisColumn.hasClass('pbmit-skew-yes') ){
						StretchedInnerEle.css('background-size', bgSize );
					} else {
						StretchedEle.css('background-size', bgSize );
					}
				}

				pbmit_stretched_col_calc();

			}
		}

	});

};

var pbmit_stretched_col_calc = function() {

	// padding left or right
	if( jQuery('.elementor-section.elementor-top-section > .elementor-container .elementor-column.elementor-top-column.pbmit-col-stretched-yes').length>0 ){

		// Returns width of browser viewport
		var window_width = jQuery( window ).width();

		// Returns width of HTML document
		var document_width = jQuery( document ).width();

		jQuery('.elementor-section.elementor-top-section > .elementor-container .elementor-column.elementor-top-column.pbmit-col-stretched-yes').each(function(){

			if( jQuery(this).closest('.elementor-section.elementor-top-section').hasClass('pbmit-col-stretched-both') && ( jQuery(this).hasClass('elementor-col-100') || jQuery(this).attr('data-col') == '100' ) ){
				// Do nothing
			} else {

				var this_ele	= jQuery(this);
				var curr_width  = jQuery(this).closest('.elementor-container').width();
				var extra_width = ((window_width - curr_width)/2);
				var parent_width = '';

				if( this_ele.hasClass('pbmit-skew-yes') ){
					extra_width = extra_width + 100;
				}

				var position = 'left';
				if( jQuery(this).hasClass('pbmit-col-stretched-right') ){
					position = 'right';
				}

				// set width to 100% if parent is 100%
				parent_width = jQuery(this).width();
				if( parent_width == '100%' ){
					jQuery(this).children('.elementor-widget-wrap') .css('width','100%');
					jQuery(this).children('.elementor-column-wrap') .css('width','100%');
				} else {
					jQuery(this).children('.elementor-widget-wrap') .css('width','');
					jQuery(this).children('.elementor-column-wrap') .css('width','');
				}

				jQuery('.pbmit-stretched-div', jQuery(this)).css( 'margin-'+position,'-'+extra_width+'px' );

				// stretched column content too
				if( jQuery(this).hasClass('pbmit-col-stretched-content-yes') ){

					jQuery('.pbmit-stretched-div', jQuery(this)).css( 'margin-'+position, "" );
					var stretched_width = jQuery('.pbmit-stretched-div', jQuery(this) ).width() + extra_width;
					if( jQuery(this).children('.elementor-column-wrap').length > 0 ){
						jQuery(this).children('.elementor-column-wrap').css( 'margin-'+position,'-'+extra_width+'px' );
						jQuery(this).children('.elementor-column-wrap').css( 'width', stretched_width+'px' );
					} else {
						jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'-'+extra_width+'px' );
						jQuery(this).children('.elementor-widget-wrap').css( 'width', stretched_width+'px' );
					}

				} else {
					if( jQuery(this).children('.elementor-column-wrap').length > 0 ){
						jQuery(this).children('.elementor-column-wrap').css( 'margin-'+position,'' );
						jQuery(this).children('.elementor-column-wrap').css( 'width', '' );
					} else {
						jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'' );
						jQuery(this).children('.elementor-widget-wrap').css( 'width', '' );
					}
				}
			}

		});

	}

}

/* ============================================== */
/* BG Image yes class in each Section and Column
/* ============================================== */
var pbmit_bgimage_class = function() {
	jQuery('.elementor-section.elementor-top-section').each(function() {

		if( jQuery(this).css('background-image')!='' && jQuery(this).css('background-image')!='none' ){
			jQuery(this).addClass('pbmit-bgimage-yes' ).removeClass('pbmit-bgimage-no' );
		} else {
			jQuery(this).addClass('pbmit-bgimage-no' ).removeClass('pbmit-bgimage-yes' );
		}
	});
	jQuery('.elementor-column.elementor-top-column').each(function() {

		if( jQuery(this).children('.elementor-column-wrap').length > 0 ){

			if( jQuery(this).children('.elementor-column-wrap').children('.pbmit-stretched-div').length > 0 ){

				if( jQuery(this).children('.elementor-column-wrap').children('.pbmit-stretched-div').css('background-image') == 'none' || jQuery(this).children('.elementor-column-wrap').children('.pbmit-stretched-div').css('background-image') == '' ){
					jQuery(this).addClass('pbmit-bgimage-no' ).removeClass('pbmit-bgimage-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgimage-yes' ).removeClass('pbmit-bgimage-no' );
				}

			} else {

				if( jQuery(this).children('.elementor-column-wrap').css('background-image') == 'none' || jQuery(this).children('.elementor-column-wrap').css('background-image') == '' ){
					jQuery(this).addClass('pbmit-bgimage-no' ).removeClass('pbmit-bgimage-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgimage-yes' ).removeClass('pbmit-bgimage-no' );
				}

			}

		} else {

			if( jQuery(this).children('.elementor-widget-wrap').children('.pbmit-stretched-div').length > 0 ){

				if( jQuery(this).children('.elementor-widget-wrap').children('.pbmit-stretched-div').css('background-image') == 'none' || jQuery(this).children('.elementor-widget-wrap').children('.pbmit-stretched-div').css('background-image') == '' ){
					jQuery(this).addClass('pbmit-bgimage-no' ).removeClass('pbmit-bgimage-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgimage-yes' ).removeClass('pbmit-bgimage-no' );
				}

			} else {

				if( jQuery(this).children('.elementor-widget-wrap').css('background-image') == 'none' || jQuery(this).children('.elementor-widget-wrap').css('background-image') == '' ){
					jQuery(this).addClass('pbmit-bgimage-no' ).removeClass('pbmit-bgimage-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgimage-yes' ).removeClass('pbmit-bgimage-no' );
				}

			}

		}
	});
};

/* ============================================== */
/* BG Color yes class in each Section and Column
/* ============================================== */
var pbmit_bgcolor_class = function() {
	jQuery('.elementor-section.elementor-top-section').each(function() {
		if( jQuery(this).css('background-color')!='' && jQuery(this).css('background-color')!='transparent' ){
			jQuery(this).addClass('pbmit-bgcolor-yes');
		}
	});
	jQuery('.elementor-column.elementor-top-column').each(function() {
		if( jQuery(this).children('.pbmit-stretched-div').length ){
			if( jQuery(this).children('.pbmit-stretched-div').css('background-color')!='' && jQuery(this).children('.pbmit-stretched-div').css('background-color')!='transparent' ){
				jQuery(this).addClass('pbmit-bgcolor-yes' ).removeClass('pbmit-bgcolor-no' );
			} else {
				jQuery(this).addClass('pbmit-bgcolor-no' ).removeClass('pbmit-bgcolor-yes' );
			}
		} else {

			if( jQuery(this).children('.elementor-column-wrap').length > 0 ){

				if( jQuery(this).children('.elementor-column-wrap').css('background-color') == 'transparent' || jQuery(this).children('.elementor-column-wrap').css('background-color') == '' ){
					jQuery(this).addClass('pbmit-bgcolor-no' ).removeClass('pbmit-bgcolor-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgcolor-yes' ).removeClass('pbmit-bgcolor-no' );
				}

			} else {

				if( jQuery(this).children('.elementor-widget-wrap').css('background-color') == 'transparent' || jQuery(this).children('.elementor-widget-wrap').css('background-color') == '' ){
					jQuery(this).addClass('pbmit-bgcolor-no' ).removeClass('pbmit-bgcolor-yes' );
				} else {
					jQuery(this).addClass('pbmit-bgcolor-yes' ).removeClass('pbmit-bgcolor-no' );
				}

			}

		}
	});
};

/*----  Events  ----*/

// On resize
jQuery(window).resize(function(){
	setTimeout(function() {
		pbmit_stretched_col_calc();
	}, 100);	
});

// on ready
jQuery(document).ready(function(){
	pbmit_stretched_col();
	pbmit_stretched_col_calc();
	pbmit_bgimage_class();
	pbmit_bgcolor_class();
	setTimeout(function() {
		pbmit_stretched_col_calc();
	}, 100);
});
