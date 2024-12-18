jQuery( window ).on( 'elementor/frontend/init', function() {
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_blog_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_portfolio_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_event_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_service_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_team_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_testimonial_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_client_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_static_box_element.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_multiple_icon_heading.default', function($scope, $){ pbmit_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_fid_element.default', function($scope, $){ pbmit_circle_progressbar(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/pbmit_timeline_element.default', function($scope, $){ pbmit_carousel(); });	
	elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope, $ ) {
		setTimeout(function(){
			pbmit_rearrange_stretched_col( $scope.data('id') );			
			pbmit_bgimage_class();
			pbmit_bgcolor_class();
		}, 200);
	} );
} );
