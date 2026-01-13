=== Export Plugins CSV ===
Contributors: joehall
Tags: plugins, csv, export, audit, maintenance, reporting
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Export a CSV of all installed WordPress plugins, including active status and available updates.

== Description ==

Export Plugins CSV is a lightweight utility plugin that generates a CSV file listing all installed plugins on a WordPress site.

Each export includes the following columns:

* Plugin Name  
* Active Status (Active / Inactive)  
* Available Update (Yes / No)

This plugin is designed for technical audits, site handoffs, migrations, security reviews, and ongoing maintenance reporting. It requires no configuration and does not modify plugin data.

== Features ==

* Exports all installed WordPress plugins
* Clearly indicates whether each plugin is active
* Flags plugins with available updates
* Generates a clean, spreadsheet-ready CSV
* No setup or configuration required

== Installation ==

1. Upload the `export-plugins-csv` folder to `/wp-content/plugins/`.
2. Activate **Export Plugins CSV** through the *Plugins* menu in WordPress.
3. Use the plugin’s export action to download the CSV file.

== Usage ==

Once activated, trigger the export action provided by the plugin to download a CSV file of all installed plugins.

The exported CSV headers are:

Plugin Name, Active Status, Available Update

== Screenshots ==

1. Plugin export action interface in the WordPress admin
2. Example CSV file opened in a spreadsheet application
3. CSV output showing plugin status and update availability

== Security & Privacy ==

Export Plugins CSV does **not** collect, store, or transmit any user data.

* No data is sent to third-party services
* No personal or identifiable information is accessed
* All processing happens locally within the WordPress admin
* The plugin is read-only and does not modify plugins or site configuration

This makes it safe for use in enterprise, regulated, and security-conscious environments.

== Frequently Asked Questions ==

= Does this plugin make changes to my plugins or site? =
No. The plugin only reads plugin metadata and generates a CSV file.

= Does this plugin send data externally? =
No. All data remains on your server and is downloaded directly by the administrator.

= Who can export the CSV? =
Only users with appropriate WordPress admin permissions can run the export.

== Changelog ==

= 1.0 =
* Initial release
* CSV export of installed plugins with active status and update availability

== Author ==

Joe Hall  
https://cloud22.com/
