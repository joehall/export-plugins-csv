# Export Plugins CSV

Export Plugins CSV is a lightweight WordPress plugin that generates a CSV file listing all installed plugins on a site, including whether each plugin is active and whether an update is available.

## Description

This plugin is designed for audits, handoffs, and documentation. With a single action, it exports a CSV containing:

- Plugin Name  
- Active Status (Active / Inactive)  
- Available Update (Yes / No)

It’s especially useful for consultants, agencies, and site owners who need a quick snapshot of a WordPress installation’s plugin state.

## Features

- Exports all installed WordPress plugins
- Clearly indicates active vs inactive plugins
- Flags plugins with available updates
- Generates a clean, spreadsheet-ready CSV file
- No configuration required

## Installation

1. Download or clone this repository.
2. Upload the plugin folder to `/wp-content/plugins/`.
3. Activate **Export Plugins CSV** through the **Plugins** menu in WordPress.
4. Use the plugin’s export action to download the CSV file.

## Usage

Once activated, trigger the export action (as implemented in the plugin) to download a CSV file containing all installed plugins and their statuses.

The CSV headers are:

- Plugin Name
- Active Status
- Available Update

## Example Use Cases

- Technical SEO audits  
- Pre-migration or post-migration site reviews  
- Client handoff documentation  
- Security and maintenance reporting  

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher

## Author

**Joe Hall**  
https://cloud22.com/

## License

This plugin is licensed under the **GPL v2 or later**.

You are free to use, modify, and redistribute this plugin under the terms of the GNU General Public License.  
See: https://www.gnu.org/licenses/gpl-2.0.html

## Contributing

Pull requests and improvements are welcome. Please keep changes focused and well documented.

## Changelog

### 1.0
- Initial release
- CSV export of installed plugins with active status and update availability
