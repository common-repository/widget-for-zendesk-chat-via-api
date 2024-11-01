( function( $ ) {
	
	$( function() {
		var pluginSlug = 'widget-for-zendesk-chat-via-api';
		// Code to fire when the DOM is ready.
		$( document ).on( 'click', 'tr[data-slug="' + pluginSlug + '"] .deactivate', function( e ) {
			e.preventDefault();
			$( '.ps-wfzcva-popup-overlay' ).addClass( 'ps-wfzcva-active' );
			$( 'body' ).addClass( 'ps-wfzcva-hidden' );
		} );

		$( document ).on( 'click', '.ps-wfzcva-popup-button-close', function() {
			close_popup();
		} );

		$( document ).on( 'click', '.ps-wfzcva-serveypanel,tr[data-slug="' + pluginSlug + '"] .deactivate', function( e ) {
			e.stopPropagation();
		} );

		$( document ).click(function() {
			close_popup();
		} );

		$( '.ps-wfzcva-reason label' ).on( 'click', function() {
			if ( $( this ).find( 'input[type="radio"]' ).is( ':checked' ) ) { 
				$( this ).next().next( '.ps-wfzcva-reason-input' ).show().end().end().parent().siblings().find( '.ps-wfzcva-reason-input' ).hide();
			 }
		} );

		$( 'input[type="radio"][name="ps-wfzcva-selected-reason"]' ).on( 'click', function(event) {
			$( '.ps-wfzcva-popup-allow-deactivate' ).removeAttr( 'disabled' );
			$( '.ps-wfzcva-popup-skip-feedback' ).removeAttr( 'disabled' );
			$( '.message.error-message' ).hide();
			$( '.ps-wfzcva-pro-message' ).hide();
		} );

		$( '.ps-wfzcva-reason-pro label' ).on( 'click', function() {
			if ( $( this ).find( 'input[type="radio"]' ).is( ':checked' ) ) {
				$( this ).next( '.ps-wfzcva-pro-message' ).show().end().end().parent().siblings().find( '.ps-wfzcva-reason-input' ).hide();
				$( this ).next( '.ps-wfzcva-pro-message' ).show()
				$( '.ps-wfzcva-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
				$( '.ps-wfzcva-popup-skip-feedback' ).attr( 'disabled', 'disabled' );
			}
		} );

		$( document ).on( 'submit', '#ps-wfzcva-deactivate-form', function( event ) {
			event.preventDefault();
			
			var _reason = $( 'input[type="radio"][name="ps-wfzcva-selected-reason"]:checked' ).val();
			var _reason_details = '';
			var deactivate_nonce = $( '.ps_widget_for_zendesk_chat_via_api_deactivation_nonce' ).val();
			
			if ( _reason == 2 ) {
				_reason_details = $( this ).find("input[type='text'][name='better_plugin']").val();
			} else if ( _reason == 7 ) {
				_reason_details = $( this ).find("input[type='text'][name='other_reason']").val();
			}
			
			if ( ( _reason == 7 || _reason == 2 ) && _reason_details == '' ) {
				$( '.message.error-message' ).show();
				return;
			}
			
			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'ps_widget_for_zendesk_chat_via_api_deactivation',
					reason: _reason,
					reason_detail: _reason_details,
					ps_widget_for_zendesk_chat_via_api_deactivation_nonce: deactivate_nonce
				},
				beforeSend: function() {
					$( '.ps-wfzcva-spinner' ).show();
					$( '.ps-wfzcva-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
				}
			} ).done( function() {
				$( '.ps-wfzcva-spinner' ).hide();
				$( '.ps-wfzcva-popup-allow-deactivate' ).removeAttr( 'disabled' );
				window.location.href = $( 'tr[data-slug="' + pluginSlug + '"] .deactivate a' ).attr( 'href' );
			} );

		} );
		
		$( '.ps-wfzcva-popup-skip-feedback' ).on( 'click', function( e ) {
			window.location.href = $( 'tr[data-slug="' + pluginSlug + '"] .deactivate a' ).attr( 'href' );
		} );

		function close_popup() {
			$( '.ps-wfzcva-popup-overlay' ).removeClass( 'ps-wfzcva-active' );
			$( '#ps-wfzcva-deactivate-form' ).trigger( 'reset' );
			$( '.ps-wfzcva-popup-allow-deactivate' ).attr( 'disabled', 'disabled' );
			$( '.ps-wfzcva-reason-input' ).hide();
			$( 'body' ).removeClass( 'ps-wfzcva-hidden' );
			$( '.message.error-message' ).hide();
			$( '.ps-wfzcva-pro-message' ).hide();
		}
		
		// Overtake the form submission request
		$( '.ps-wfzcva-subscription-form' ).on( 'submit', function( e ) {
			e.preventDefault();
			
			if ( $( '.ps-wfzcva-subscription-callout' ).hasClass( 'ps-wfzcva-ajaxing' ) ) {
				return; // request is already in progress
			}

			$( '.ps-wfzcva-subscription-callout' ).addClass( 'ps-wfzcva-ajaxing' );

			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'widget_for_zendesk_chat_via_api_handle_subscription_request',
					email: $( '.ps-wfzcva-subscription-form input' ).val(),
					from_callout: 1,
				},
				success: function( data ) {
					$( '.ps-wfzcva-subscription-callout-main' ).hide();
					$( '.ps-wfzcva-subscription-callout-thanks' ).show();
				}
			} )
			.fail( function() {
				$( '.ps-wfzcva-subscription-error' ).show();
			} )
			.always( function() {
				$( '.ps-wfzcva-subscription-callout' ).removeClass( 'ps-wfzcva-ajaxing' );
			} );
		} );

		function store_popup_shown_status() {
			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'widget_for_zendesk_chat_via_api_subscription_popup_shown'
				},
			} );
			
		}

		$( '.ps-wfzcva-subscription-skip' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.ps-wfzcva-subscription-callout-wrapper' ).removeClass( 'open' );
			store_popup_shown_status();
		} );

	}  );
} )( jQuery );