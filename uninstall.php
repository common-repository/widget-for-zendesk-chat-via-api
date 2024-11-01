<?php
/**
 * Uninstall Widget for Zendesk Chat via API
 *
 * Deletes all the plugin data i.e.
 *   1. Plugin options.
 *   2. Integration.
 *   3. Database tables.
 *   4. Cron events.
 *
 * @package     ZendeskChatWidgetViaAPI
 * @subpackage  Uninstall
 * @copyright   All rights reserved Copyright (c) 2022, PluginsandSnippets.com
 * @since       1.12.4
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function ps_widget_for_zendesk_chat_via_api_uninstall() {
	// Get the settings
	$remove_data = intval( get_option( 'ps_zendesk_chat_widget_api_remove_data' ) );

	// Check if the setting remove data does not exist
	if ( 1 !== $remove_data ) {
		return false;
	}

	// delete the options
	delete_option( 'ps_zendesk_chat_widget_api_code' );
	delete_option( 'ps_zendesk_chat_widget_api_remove_data' );
	delete_option( 'ps_zendesk_chat_widget_api_delay_time' );
	delete_option( 'ps_widget_for_zendesk_chat_via_api_review_time' );
	delete_option( 'ps_zendesk_chat_widget_api_code_status' );
}

// Run the uninstall process
ps_widget_for_zendesk_chat_via_api_uninstall();
