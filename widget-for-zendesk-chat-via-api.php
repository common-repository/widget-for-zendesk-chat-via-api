<?php
/**
 * Plugin Name:       Widget for Zendesk Chat via API
 * Plugin URI:        https://wordpress.org/plugins/widget-for-zendesk-chat-via-api/
 * Description:       This plugin loads Zendesk Chat widget (formerly Zopim chat) via API with a slight time delay. This improves the page loading speed of your website compared to the standard Zendesk Chat plugin. Make your website faster loading Zendesk Chat widget this way!
 * Version:           1.12.11
 * Author:            Plugins & Snippets
 * Author URI:        https://www.pluginsandsnippets.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       widget-for-zendesk-chat-via-api
 * Requires at least: 3.5
 * Tested up to:      6.5
 *
 * @author            PluginsandSnippets.com
 * @copyright         All rights reserved Copyright (c) 2022, PluginsandSnippets.com
 *
 */

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PS_Zendesk_Chat_Widget_Via_Api' ) ) {
	class PS_Zendesk_Chat_Widget_Via_Api {
		
		public function __construct() {
			
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_VER', '1.12.11' );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_NAME', 'Widget for Zendesk Chat via API' );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_DIR', plugin_dir_path( __FILE__ ) );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_DOCUMENTATION_URL', 'https://wordpress.org/plugins/widget-for-zendesk-chat-via-api/' );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_OPEN_TICKET_URL', 'https://www.pluginsandsnippets.com/open-ticket/' );
			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_REVIEW_URL', 'https://wordpress.org/plugins/widget-for-zendesk-chat-via-api/reviews/#new-post' );

			define( 'PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_SUBSCRIBE_URL', 'https://www.pluginsandsnippets.com/?ps-subscription-request=1' );
			
			add_action( 'wp_footer', array(
				$this,
				'init_zendesk_chat_widget' 
			) );

			if ( ! get_option( 'ps_widget_for_zendesk_chat_via_api_review_time' ) ) {
				$review_time = time() + 7 * DAY_IN_SECONDS;
				add_option( 'ps_widget_for_zendesk_chat_via_api_review_time', $review_time, '', false );
			}

			// include and load admin class
			require_once PS_WIDGET_FOR_ZENDESK_CHAT_VIA_API_DIR . 'includes/admin/admin.php';
			new PS_Zendesk_Chat_Widget_Via_Api_Admin( $this );
			
		}
		
		public function get_api_code() {
			return get_option( 'ps_zendesk_chat_widget_api_code' );
		}
		
		public function get_api_code_status() {
			$code_status = get_option( 'ps_zendesk_chat_widget_api_code_status' );

			if ( empty( $code_status ) ) {
				$code        = $this->get_api_code();
				$code_status = apply_filters( 'ps_widget_for_zendesk_chat_via_api_validate_code', $code );

				update_option( 'ps_zendesk_chat_widget_api_code_status', $code_status );
			}

			return $code_status;
		}
		
		public function get_uninstall_setting() {
			return intval( get_option( 'ps_zendesk_chat_widget_api_remove_data' ) );
		}

		public function init_zendesk_chat_widget() {
			$code       = $this->get_api_code();
			$delay_time = $this->get_api_delay_time();
			
			if ( empty( $code ) ) {
				return;
			}

			// check if user has disabled zendesk widget on this page/post.
			if (
				( is_single() || is_singular() ) &&
				1 === (int) get_post_meta( get_queried_object_id(), 'ps_zendesk_chat_widget_api_code_disable', true )
			) {
				return;
			}
			
			echo '<script>
					function ps_load_zopim() {
						window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
						d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
						_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute(\'charset\',\'utf-8\');
						$.src=\'//v2.zopim.com/?' . esc_attr( $code ) . '\';z.t=+new Date;$.
						type=\'text/javascript\';e.parentNode.insertBefore($,e)})(document,\'script\');
					}
				</script>';
			
			echo '<script>';
			echo 'function ps_call_zopim() {';
			
			if ( is_user_logged_in() ) {
				$current_user = wp_get_current_user();
				$first_name   = $current_user->display_name;
				$user_email   = $current_user->user_email;
				
				echo '$zopim(function(){$zopim.livechat.set({name: \'' . esc_attr( $first_name ) . '\', email: \'' . esc_attr( $user_email ) . '\'}); });';
			}

			echo '$zopim( function() {});';
			echo '}';
			
			// Following JS loads and calls widget when one of two criterian is met
			echo 'var ps_zopim_loaded = false;
				jQuery(window).on(\'scroll\', function() {
					window.setTimeout(function() {
						if ( ! ps_zopim_loaded ) {
							ps_load_zopim();
							ps_call_zopim();
							ps_zopim_loaded = true;
						}
					}, 5000);
				});

				jQuery(window).on(\'load\', function() {
					window.setTimeout(function() {
						if ( ! ps_zopim_loaded ) {
							ps_load_zopim();
							ps_call_zopim();
							ps_zopim_loaded = true;
						}
					}, ' . ( $delay_time * 1000 ) . ');
				});';
			
			echo '</script>';
		}
		
		public function get_api_delay_time() {
			$delay_time = intval( get_option( 'ps_zendesk_chat_widget_api_delay_time' ) );

			// delay time is forced to be at least 10 seconds
			if ( empty( $delay_time ) || $delay_time < 10 ) {
				$delay_time = 10;
			}

			return $delay_time;
		}
		
	}
	
	// Instantiate the class
	new PS_Zendesk_Chat_Widget_Via_Api();
}
