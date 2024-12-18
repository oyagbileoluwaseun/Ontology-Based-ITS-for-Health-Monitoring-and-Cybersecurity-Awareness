(function($){

	function appendIconOptions(){
		jQuery('select.pbmit-iconpicker').each(function(){
			var thisele 		= jQuery(this);
			var lib				= jQuery(this).data('library');
			var class_prefix	= jQuery(this).data('class-prefix');
			var common_class	= jQuery(this).data('common-class');
			var selected		= jQuery(this).data('selected');

			if( typeof window[ 'iconarray_'+lib ]  != 'undefined' ){
				jQuery.each( window[ 'iconarray_'+lib ], function(key, value){
					jQuery( thisele )
						.append(jQuery("<option></option>")
						.attr("value", common_class + ' ' + class_prefix + value)
						.text(value)
					); 
				});
				jQuery( thisele )
					.val( selected );
			}

		});
	}

	function enableFontIconPickerFor($el) {
		appendIconOptions();
		$el.find('.acf-iconpicker').each(function(){
			if ( !$(this).parents('.acf-clone').length ){
				// Let's iconpick!!!
				$(this).fontIconPicker();
			}
		});
	}
	if( typeof acf.add_action !== 'undefined' ) {
		// ACF5
		acf.add_action('ready append', function( $el ){
			enableFontIconPickerFor($el);
		}); 
	} else {
		// ACF4
		$(document).on('acf/include_fields acf/setup_fields', function(e, postbox){
			enableFontIconPickerFor($(postbox));
		});
	}
})(jQuery);
