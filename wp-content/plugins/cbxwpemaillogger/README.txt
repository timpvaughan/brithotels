=== CBX Email SMTP & Logger ===
Contributors: codeboxr, manchumahara
Tags: wordpress smtp,wordpress email log,smtp
Requires at least: 3.9
Tested up to: 5.4.1
Stable tag: 1.0.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin helps to send email using SMTP and other methods as well as logs email and displays in admin panel and more.

== Description ==

Sending email to user's inbox is a great challenge now days as if you don't take extra measure your email may go to spam folder. CBX Email SMTP & Logger plugin comes to help on this and fix your email sending problem. This plugin helps to send email using SMTP and log any email sent from WordPress.

See more details and usages guide check [here](https://codeboxr.com/product/cbx-email-logger-for-wordpress/)


### 🛄 Core Plugin Features ###

-  Email Log Manager
-  Email SMTP Manager


**📧 Email Log Features:**

* Default enabled on plugin activation
* Logs every email sent
* Logs email send success or fail(Bullet proof way to detect email send or not)
* Delete all email logs or single
* View Email Log
* View Email Preview
* ReSend email from the list window
* Delete X Days old logs from Log listing
* Auto delete X Days old logs using wordpress native event schedule
* Custom Setting panel
* Delete custom options created by this plugin and email logs on uninstall(it's not deactivate, uninstall means delete plugin)
* Save email attachments if enabled, default disabled
* Email sending error tracking - (New in version 1.0.4)
* Track email sent by popular plugin(started with Contact form 7 support) - (New in version 1.0.4)


**📤 Email SMTP Features:**

* Fresh New feature For SMTP (New in version 1.0.4)
* Default disabled on plugin activation
* Enable/disable override from Name
* Enable/disable override from Email
* Override wordpress default email to send via SMTP
* Full SMTP feature implementations
* SMTP config store and choose as need

### 🛄 CBX Email SMTP & Logger Pro Addon Features ###

**📤 General Extended Features :**

* Unlimited SMTP server option

**📤 Popular Plugin(s) Tracking :**

* Track WPForms Email sending
* Track WooCommerce Email sending
* Track Easy Digital Downloads email sending
* More coming soon, contact us for integration for your plugin.

👉 Get the [pro addon](https://codeboxr.com/product/cbx-email-logger-for-wordpress/)


### 📋 Documentation and 🦸‍♂️Support ###

- For documentation and tutorials go to our [Documentation](https://codeboxr.com/product/cbx-email-logger-for-wordpress/)
- If you have any more questions, visit our [support](https://codeboxr.com/contact-us/)
- For more information about features, FAQs and documentation, check out our website at [Codeboxr](https://codeboxr.com)

### 👍 Liked Codeboxr? ###

- Join our [Facebook Page](https://www.facebook.com/codeboxr//)
- Learn from our tutorials on [Youtube Channel](https://www.youtube.com/user/codeboxr)
- Or [rate us](https://wordpress.org/support/plugin/cbxwpemaillogger/reviews/#new-post) on WordPress


== Installation ==

This section describes how to install the plugin and get it working.

> this plugins add an extra header to email to tracking email sent success or not. The custom header added in email is in format
  'x-cbxwpemaillogger-id: $log_id'

e.g.

1. Upload `cbxwpemaillogger` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You can search from wordpress plugin manager by keyword "cbxwpemaillogger" and install from live

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.0.8 =

* [updated] Minor improvement

= 1.0.7 =

* [new] Multi range date picker in email log listing
* [fixed] Wrong admin url for log listing from some screens
* [improved] Some improvement in admin ui


= 1.0.6 =

* [security] Dashboard widget is now hidden from non admin users

= 1.0.5 =

* [Improvement] More polished plugin interface
* [New] Dashboard widget to see recent email logs
* [New] Test Email Sending with all possible parameters

= 1.0.4 =

* [New] Plugin started as logger but now it also helps to send email using smtp
* [New] Custom multiple SMTP server config
* [New] Track email send failure, logs error message

= 1.0.3 =

* [New] Custom SMTP
* [New] Email attachment store/save
* [Fix] Email resend now maintain same email content type
* [New] Track Email source of very popular common plugin, Now supports only Contact form 7

= 1.0.2 =

* Added option panel
* Delete X Days old logs from Log listing
* Auto delete X Days old logs using wordpress native event schedule
* Custom Setting panel
* Delete custom options created by this plugin and email logs on uninstall(it's not deactivate, uninstall means delete plugin)

= 1.0.1 =

* View Email Log
* View Email Template in Popup
* View Email log template in single view display
* Single click resend email

= 1.0.0 =

* First public release