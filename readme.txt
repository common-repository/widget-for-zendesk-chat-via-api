=== Widget for Zendesk Chat via API ===

Author URI: https://www.pluginsandsnippets.com
Plugin URI: https://wordpress.org/plugins/widget-for-zendesk-chat-via-api/
Contributors: pluginsandsnippets, dilipsakariya, siawa, napoleaofw
Tags: zendesk, zendesk chat, chat widget, zendesk speed, speed optimization
Requires at least: 3.5
Tested up to: 6.5
Requires PHP: 5.6
Stable Tag: 1.12.11
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
This plugin offers a faster way to load the Zendesk Chat Widget via API. It optimizes the page loading speed and it is quick and easy to implement.


== Description ==

This plugin offers a better way to load the Zendesk Chat Widget than the Standard Zendesk Chat Plugin. The plugin loads the Zendesk Chat Widget via API and uses a time delay setting to load the Chat Widget. Using this Trick, the Zendesk Chat Widget is loaded AFTER the website is fully loaded. Therefore the loading of the Chat Widget does not consume valuable time anymore on initial page load. Quick and easy to implement. Improves Page Load Time for SEO!

= Why do you need this Plugin? =

One common problem is that the standard Zendesk Chat plugin adds time required to load the widget at the end of each page load. Based on our page load measurements using GTmetrix, loading the Zendesk Chat Widget via the standard Zendesk Plugin adds 103- 691 ms to the time required for loading of a website. Of course the time varies from website to website but the point is, loading Zendesk Chat Widget the standard way, consumes unnecessary time you don't have. This can lead to quite poor page load metrics which can affect your SEO scores.

= How does it work? =

The Plugin Widget for Zendesk Chat via API uses the API offered by Zendesk to call the chat widget from the background. The plugin then uses a setting to add a chosen time delay when the Chat Widget will be loaded.

This allows that the initial loading of the website can happen without the Zendesk Chat plugin giving a chance to block page load. The Chat plugin is simply loaded separately by waiting first until the initial page has been fully loaded (in GT Metrix Time to Interactive), then loading the Zendesk Chat Widget in a second step via API (e.g. 10 seconds later). Problem solved! No more blocking of page load by Zendesk. Now suddenly, your SEO Metrics start to look much better!

= API and Time Delay – Simple and Quick to Setup =

The plugin has a Settings Page located on your WordPress Dashboard with the Settings Menu. Follow the instructions to enter your Zendesk Chat API Key, and you are done. **Quick and easy, a very straightforward plugin to use!**

Here some more information about the two settings needed to make this plugin work correctly:

* **API Key** – simply follow the instructions to get the API Key from your Zendesk Account. Ensure you obtain confirmation that the Key is valid. Once valid, the Zendesk Chat Widget will be loaded via API Key. **No other plugin is needed anymore.**
* **Loading Delay Time** – Per default, the plugin will delay the loading of the Zendesk Chat Widget by **10 seconds.** For most websites, this should work. If your website is very slow or faster, then you increase/decrease the time delay as you wish.

Please note the loading delay works as follows:

* **Webpage is loaded but left still** - The Zendesk Chat Widget will wait for a minimum of 10 seconds before loading and opening.
* **Webpage is loaded and scrolled upon** - The Zendesk Chat Widget will wait 3 seconds before loading and opening.

= Clear Caching when you Install or Update the Plugin =
Please clear all your page caches whenever you update the settings to ensure the loading of the Zendesk Chat Widget is executed correctly.

= Hiding Zendesk Chat Widget on Select Pages =
Additionally, we have added a meta-box on all page and post types in WordPress that allows you to Disable the Chat Widget on select pages. You can open the target page in the edit modus, locate the Widget for Zendesk Chat, and tick the box to disable the Chat Widget.

We also provide additional plugins to enhance your WooCommerce and Easy Digital Downloads (EDD) WordPress webstore. Check out our other plugins:

* [UpsellMaster](https://www.pluginsandsnippets.com/downloads/upsellmaster/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) automatically calculate suitable Upsell products in 1-click for each product.
* [EDD Product Versions](https://www.pluginsandsnippets.com/downloads/edd-product-versions/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) enables product versioning for all of your products and allows you to (1) generate additional revenues from selling updated download versions (existing customers can even be offered a discount for upgrading their products) as an alternative to selling subscriptions and/or (2) simply add a comprehensive archive of old download versions for easy reference to your customers. Plugin increases the monetization and customer retention of your webshop.
* [Freelancer Marketplace](https://www.pluginsandsnippets.com/downloads/freelancer-marketplace-plugin/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) plugin will help you build a freelancer marketplace for WordPress and Easy Digital Downloads.
* [EDD Advanced Shortcodes](https://www.pluginsandsnippets.com/downloads/edd-advanced-shortcodes/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) provides additional shortcodes to enhance the functionality of your EDD store
* [EDD Landing Pages for Categories and Tags](https://www.pluginsandsnippets.com/downloads/edd-landing-pages-for-categories-and-tags/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) adds a text editor and an additional text field to your download category and tag pages 
* [EDD Mailchimp Abandoned Cart WordPress Plugin](https://www.pluginsandsnippets.com/downloads/edd-mailchimp-abandoned-cart-wordpress-plugin/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) this plugins triggers email series in Mailchimp when customers abandon their carts. The plugin allows to recover lost sales and improves conversion
* [EDD FES Vendor Statistics](https://www.pluginsandsnippets.com/downloads/edd-fes-statistics/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) adds a page to the Vendor Dashboard to make it easier for the vendors to understand and monitor monthly commissions earned and payout status on their own.
* [EDD Requests](https://www.pluginsandsnippets.com/downloads/edd-requests-plugin/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) this plugins helps you to trigger more engagement with your visitors by offering them a contact button on the download product and author page where they can quickly submit requests for assistance and upload attachments. Requests are added on tracking lists in the vendor and admin dashboards to ensure systematic follow-ups.
* [EDD Custom Payment Status](https://www.pluginsandsnippets.com/downloads/edd-custom-payment-status/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) this plugins   allows you to create custom payment statuses, which will be included in Earnings & Sales Reports.
* [EDD Mailchimp Vendor Email Trigger](https://www.pluginsandsnippets.com/downloads/mailchimp-vendor-email-trigger/?utm_source=docs&utm_medium=installation_tab&utm_content=documentation&utm_campaign=readme) this plugins allows to trigger an email series in Mailchimp upon registration of new vendors.


== Installation ==

1. Install and Activate the plugin

2. Go to Settings > Zendesk Chat Settings

3. Enter your Zendesk Chat API Code


== Frequently Asked Questions ==

= I can't see any difference, is the Plugin working correctly? =

First, check the page speed analysis from GTmetrix to find out how much Zendesk Chat Widget (ex Zopim) delays your website's loading (especially within the critical Time to Interactive range). Second, kindly make sure that the API key is correctly entered, and third that all caches are cleared. Then recheck the page speed analysis via GTmetrix. Finetune the time delay so that the loading of the Zendesk Chat Plugin (ex Zopim) does not influence any more Time to Interactive (by delaying the loading of the Widget).

= Do I still need to install the original plugin from Zendesk? =

No, you only need this plugin installed and activated on your website to use the Zendesk Chat Widget. Now the Zendesk Chat Widget will be loaded via API and directly displayed on the Frontend of your Website.

= Where can I find my Zendesk Chat Account Key? =

You can find your Account Key by logging in to your Zendesk Chat Dashboard, click on your Profile Icon, and select Check Connection option, and your Account Key will appear on the next window that opens.

= What is the Zendesk Chat Widget Loading Delay Time? =
This is the duration (in seconds) the plugin will wait before loading the chat widget. This allows for sufficient time to terminate the initial page load. The loading delay time can be adjusted manually in case you want to display the Chat Widget faster or you need to wait later until your website is fully loaded. This allows us to optimize each Website individually.

= Can I set my own Widget Loading Delay Time? =

Yes, depending on your preference, you set your own Chat Widget Loading Delay Time by going to the Plugin Settings Page.

= Can I hide the Zendesk Chat Widget on select pages? =

Yes, as of version 1.12.7, we have added a new feature that allows to disable the Zendesk Chat Widget on select pages or posts. We can do this by going to the page edit modus, locate the Widget for Zendesk Chat, and tick the box to disable.

= Can I remove plugin data on uninstall? =

Yes. You can enable the settings on Remove Plugin Data on Uninstall in the Plugin Settings Page.

= Where can I ask for help? =

You may contact our [Support](https://www.pluginsandsnippets.com/contact/?utm_source=docs&utm_medium=faq_tab&utm_content=support&utm_campaign=readme) at any time.


== Changelog ==
= 1.12.11 - January 11, 2024 =
* Test: WordPress version 6.4
= 1.12.10 - August 25, 2023 =
* Fix validation message for existing installations
= 1.12.9 - August 11, 2023 =
* Update Tested up to WordPress version
= 1.12.8 - August 2, 2023 =
* Add validation for API Key
= 1.12.7 - July 28, 2023 =
* Use consistent prefixes for metabox id and custom field
= 1.12.6 - July 28, 2023 =
* Prefix JavaScript Functions to Reduce Conflicts
* Show Notice for Missing Configuration
* Add Feature for Disabling Chat Widget Per Post/Page Basis
= 1.12.5 - December 9, 2022 =
* Improved WordPress Coding Standards
= 1.12.1 - November 22, 2022 =
* Folder structure improvements
* Source code improvements
* Wording improvements
* General bug fixes
= 1.8 - July 8, 2022 =
* Configurable delay time
= 1.7 - March 29, 2022 =
* Fixed PHP Warning
= 1.6 - March 21, 2022 =
* Plugin description updated
= 1.3 - March 02, 2022 =
* Bug Fix *
= 1.2 - March 02, 2022 =
* Updated release for documentation and wording *
= 1.0 - March 01, 2022 =
* Widget for Zendesk Chat via API Released*
