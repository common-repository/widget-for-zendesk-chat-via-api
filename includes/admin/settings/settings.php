<?php
/**
 * ZendeskChatWidgetViaAPI deactivation Content.
 * @package ZendeskChatWidgetViaAPI
 * @version 1.5
 */

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$code        = $this->main_instance->get_api_code();
$code_status = $this->main_instance->get_api_code_status();
$delay_time  = $this->main_instance->get_api_delay_time();
$remove_data = $this->main_instance->get_uninstall_setting();

?>

<h1><?php __( 'Zendesk Chat Settings', 'widget-for-zendesk-chat-via-api' ); ?></h1>

<?php require PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_DIR . 'includes/admin/templates/subscription.php'; ?>

<form method="POST">
	<p>
		<?php echo __( 'Please enter your Zendesk Chat Account Key so that the Zendesk Chat Widget can be loaded via API. After entering the key please clear all caches and please disable the regular Zendesk Chat plugin as it will no longer be needed. Now the Zendesk Chat widget will be loaded via API with a slight time delay which improves the page loading speed of your website. Make your website faster with this plugin.', 'widget-for-zendesk-chat-via-api' ); ?>
	</p>
	<p>
		<a href="https://support.zendesk.com/hc/en-us/articles/4408825772698-How-do-I-find-my-Chat-Account-Key-" target="_blank">
			<?php echo __( 'Find your Account Key', 'widget-for-zendesk-chat-via-api' ); ?>
		</a>
	</p>

	<div class="ps-wfzcva-field">
		<label for="ps-wfzcva-code">
			<?php echo __( 'Zendesk Chat Account Key', 'widget-for-zendesk-chat-via-api' ); ?>
		</label>
		<input type="hidden" name="ps_zendesk_chat_widget_api_code_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ps_zendesk_chat_widget_api_code_nonce' ) ); ?>" />
		<input type="text" name="ps_zendesk_chat_widget_api_code" value="<?php echo esc_attr( $code ); ?>" />

		<div class="ps-wfzcva-code-message-block <?php echo ( ! empty( $code ) && 'valid' === $code_status ? 'ps-wfzcva-valid' : '' ); ?>">
			<?php
				if ( empty( $code ) ) {
					esc_html_e( 'Please enter a valid API Key from Zendesk.', 'widget-for-zendesk-chat-via-api' );
				} elseif( 'invalid' === $code_status ) {
					esc_html_e( 'API Key is invalid. Please enter a valid API Key.', 'widget-for-zendesk-chat-via-api' );
				} elseif( 'valid' === $code_status ) {
					esc_html_e( 'API Key is valid.', 'widget-for-zendesk-chat-via-api' );
				} else {
					esc_html_e( 'We could not verify the key, it may be correct please check your account.', 'widget-for-zendesk-chat-via-api' );
				}
			?>
		</div>
	</div>
	<div class="ps-wfzcva-field">
		<label for="ps-wfzcva-delay-time">
			<?php echo __( 'Zendesk Chat Widget Loading Delay Time', 'widget-for-zendesk-chat-via-api' ); ?>
		</label>
		<input type="number" min="10" name="ps_zendesk_chat_widget_api_delay_time" value="<?php echo esc_attr( $delay_time ); ?>" />
		<p><?php _e( 'This is the duration (in seconds) which the plugin will wait before loading the chat widget', 'widget-for-zendesk-chat-via-api' ); ?></p>
	</div>
	<div class="ps-wfzcva-field">
		<label for="ps-wfzcva-remove-data">
			<input type="checkbox" id="ps-wfzcva-remove-data" name="ps_zendesk_chat_widget_api_remove_data" value="1" <?php checked( $remove_data, '1' ); ?> />
			<span><?php echo __( 'Remove Plugin Data on Uninstall', 'widget-for-zendesk-chat-via-api' ); ?></span>
		</label>
		<p><?php _e( 'If checked then on plugin uninstallation plugin data will be removed from database.', 'widget-for-zendesk-chat-via-api' ); ?></p>
	</div>
	<div class="ps-wfzcva-submit">
		<button type="submit" class="button-primary">
			<?php echo __( 'Save', 'widget-for-zendesk-chat-via-api' ); ?>
		</button>
	</div>
</form>

<?php if ( isset( $promos ) && ! empty( $promos ) ): ?>
	<div class="ps-wfzcva-other-plugins">
		<?php foreach ( $promos as $promo ): ?>
			<div class="ps-wfzcva-other-plugin">
				<div class="ps-wfzcva-other-plugin-title">
					<a href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><?php echo $promo['title']; ?></a>
				</div>
				<div class="ps-wfzcva-other-plugin-links">
					<div><a href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><?php _e( 'View', 'widget-for-zendesk-chat-via-api' ); ?></a></div>
					<?php if ( isset( $promo['documentation'] ) ): ?>
						<div><a href="<?php echo esc_url( $promo['documentation'] ); ?>" target="_blank"><?php _e( 'Documentation', 'widget-for-zendesk-chat-via-api' ); ?></a></div>
					<?php endif; ?>
					<?php if ( isset( $promo['support'] ) ): ?>
						<div><a href="<?php echo esc_url( $promo['support'] ); ?>" target="_blank"><?php _e( 'Support', 'widget-for-zendesk-chat-via-api' ); ?></a></div>
					<?php endif; ?>
				</div>
				<div class="ps-wfzcva-other-plugin-image"><a href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><img src="<?php echo esc_url( $promo['image'] ); ?>" /></a></div>
				<div class="ps-wfzcva-other-plugin-desc">
					<?php if ( $promo['initial_link'] ) : ?>
						<a href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><?php echo $promo['title']; ?></a> 
					<?php endif; ?>

					<?php echo $promo['description']; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>