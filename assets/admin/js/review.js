jQuery( document ).on( 'click', '#ps-wfzcva-review .notice-dismiss', function() {
	var ps_widget_for_zendesk_chat_via_api_review_data = {
		action: 'ps_widget_for_zendesk_chat_via_api_review_notice',
	};
	jQuery.post( ajaxurl, ps_widget_for_zendesk_chat_via_api_review_data, function( response ) {
		if ( response ) {
			console.log( response );
		}
	} );
} );