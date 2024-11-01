<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="ps-wfzcva-subscription-callout-wrapper">
	<div class="ps-wfzcva-subscription-callout">
		<div class="ps-wfzcva-subscription-callout-main">
			<h3><?php _e( 'Subscribe to our Newsletter', 'widget-for-zendesk-chat-via-api' ); ?></h3>
			<p><?php _e( 'Receive updates from <a href="https://www.pluginsandsnippets.com" target="_blank">Plugins & Snippets</a> with respect to WordPress plugins aimed to enhance the conversion rates of your web stores.', 'widget-for-zendesk-chat-via-api' ); ?></p>

			<div class="ps-wfzcva-subscription-error" style="display: none;"><?php _e( 'There was an error in processing your request, please try again.', 'widget-for-zendesk-chat-via-api' ); ?></div>

			<form method="POST" class="ps-wfzcva-subscription-form">
				<input type="email" required value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">
				
				<div class="ps-wfzcva-subscription-actions">
					<button class="button-primary"><?php _e( 'Subscribe', 'widget-for-zendesk-chat-via-api' ); ?></button>
				</div>
			</form>
		</div>

		<div class="ps-wfzcva-subscription-callout-thanks" style="display: none;">
			<h3><?php _e( 'Thank you for signing up to our Newsletter!', 'widget-for-zendesk-chat-via-api' ); ?></h3>
		</div>

	</div>
</div>