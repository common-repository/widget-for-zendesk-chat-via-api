<?php
/**
 * ZendeskChatWidgetViaAPI deactivation Content.
 * @package ZendeskChatWidgetViaAPI
 * @version 1.0.0
 */

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ps_widget_for_zendesk_chat_via_api_deactivation_nonce = wp_create_nonce( 'ps_widget_for_zendesk_chat_via_api_deactivation_nonce' ); 
?>

<div class="ps-wfzcva-popup-overlay">
	<div class="ps-wfzcva-serveypanel">
		<form action="#" method="post" id="ps-wfzcva-deactivate-form">
			<div class="ps-wfzcva-popup-header">
				<h2><?php echo sprintf( __( 'Quick Feedback about %s' , 'widget-for-zendesk-chat-via-api' ), PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_NAME ); ?></h2>
			</div>
			<div class="ps-wfzcva-popup-body">
				<h3><?php _e( 'If you have a moment, please let us know why you are deactivating:', 'widget-for-zendesk-chat-via-api' ); ?></h3>
				<input type="hidden" class="ps_widget_for_zendesk_chat_via_api_deactivation_nonce" name="ps_widget_for_zendesk_chat_via_api_deactivation_nonce" value="<?php echo esc_attr( $ps_widget_for_zendesk_chat_via_api_deactivation_nonce ); ?>">
				<ul id="ps-wfzcva-reason-list">
					<li class="ps-wfzcva-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="1">
							</span>
							<span class="reason_text"><?php _e( 'I only needed the plugin for a short period', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
					</li>
					<li class="ps-wfzcva-reason has-input" data-input-type="textfield">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="2">
							</span>
							<span class="reason_text"><?php _e( 'I found a better plugin', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
						<div class="ps-wfzcva-reason-input"><span class="message error-message "><?php _e( 'Kindly tell us the Plugin name.', 'widget-for-zendesk-chat-via-api' ); ?></span><input type="text" name="better_plugin" placeholder="What's the plugin's name?"></div>
					</li>
					<li class="ps-wfzcva-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="3">
							</span>
							<span class="reason_text"><?php _e( 'The plugin broke my site', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
					</li>
					<li class="ps-wfzcva-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="4">
							</span>
							<span class="reason_text"><?php _e( 'The plugin suddenly stopped working', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
					</li>
					<li class="ps-wfzcva-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="5">
							</span>
							<span class="reason_text"><?php _e( 'I no longer need the plugin', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
					</li>
					<li class="ps-wfzcva-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="6">
							</span>
							<span class="reason_text"><?php _e( "It's a temporary deactivation. I'm just debugging an issue.", 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
					</li>
					<li class="ps-wfzcva-reason has-input" data-input-type="textfield" >
						<label>
							<span>
								<input type="radio" name="ps-wfzcva-selected-reason" value="7">
							</span>
							<span class="reason_text"><?php _e( 'Other', 'widget-for-zendesk-chat-via-api' ); ?></span>
						</label>
						<div class="ps-wfzcva-internal-message"></div>
						<div class="ps-wfzcva-reason-input"><span class="message error-message "><?php _e( 'Kindly tell us the reason so we can improve.', 'widget-for-zendesk-chat-via-api' ); ?></span><input type="text" name="other_reason" placeholder="Kindly tell us the reason so we can improve."></div>
					</li>
				</ul>
			</div>
			<div class="ps-wfzcva-popup-footer">
				<label class="ps-wfzcva-anonymous"><input type="checkbox" /><?php _e( 'Anonymous feedback', 'widget-for-zendesk-chat-via-api' ); ?></label>
				<input type="button" class="button button-secondary button-skip ps-wfzcva-popup-skip-feedback" value="<?php _e( 'Skip & Deactivate', 'widget-for-zendesk-chat-via-api'); ?>" />
				<div class="ps-wfzcva-action-btns">
					<span class="ps-wfzcva-spinner"><img src="<?php echo admin_url( '/images/spinner.gif' ); ?>" alt=""></span>
					<input type="submit" class="button button-secondary button-deactivate ps-wfzcva-popup-allow-deactivate" value="<?php _e( 'Submit & Deactivate', 'widget-for-zendesk-chat-via-api'); ?>" disabled="disabled" />
					<a href="#" class="button button-primary ps-wfzcva-popup-button-close"><?php _e( 'Cancel', 'widget-for-zendesk-chat-via-api' ); ?></a>
				</div>
			</div>
		</form>
	</div>
</div>