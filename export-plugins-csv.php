<?php
/**
 * Plugin Name:       Export Plugins CSV
 * Description:       Exports a CSV of all installed plugins with columns: Plugin Name, Active Status, Available Update.
 * Version:           1
 * Author:            Joe Hall
 * Author URI:        https://cloud22.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       export-plugins-csv
 */

if (!defined('ABSPATH')) exit;

/**
 * 1) Add a simple Tools page with a single "Download CSV" button (link).
 */
add_action('admin_menu', function () {
    add_management_page(
        'Export Plugins CSV',
        'Export Plugins CSV',
        'manage_options',
        'export-plugins-csv',
        function () {
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            $url = wp_nonce_url(
                admin_url('admin-post.php?action=export_plugins_csv'),
                'export_plugins_csv'
            );
            echo '<div class="wrap">';
            echo '<h1>Export Installed Plugins</h1>';
            echo '<p>Click the button below to download a CSV of all installed plugins.</p>';
            echo '<a class="button button-primary" href="' . esc_url($url) . '">Download CSV</a>';
            echo '</div>';
        }
    );
});

/**
 * 2) Handle the CSV download on admin-post (this runs before the admin UI renders).
 */
add_action('admin_post_export_plugins_csv', function () {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to export this file.'));
    }
    check_admin_referer('export_plugins_csv');

    // Ensure plugin helpers are loaded.
    if (!function_exists('get_plugins')) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    // Refresh plugin update data so "Available Update" is accurate.
    if (function_exists('wp_update_plugins')) {
        wp_update_plugins();
    }

    $plugins = get_plugins();
    $update_plugins = get_site_transient('update_plugins');

    // Send CSV headers BEFORE any output.
    $filename = 'plugins-' . gmdate('Y-m-d') . '.csv';
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Pragma: no-cache');
    header('Expires: 0');

    $out = fopen('php://output', 'w');

    // CSV headers
    fputcsv($out, ['Plugin Name', 'Active Status', 'Available Update']);

    $is_multisite = is_multisite();

    foreach ($plugins as $path => $plugin) {
        $name = isset($plugin['Name']) ? $plugin['Name'] : $path;

        $active = ( function_exists('is_plugin_active') && is_plugin_active($path) )
                  || ( $is_multisite && function_exists('is_plugin_active_for_network') && is_plugin_active_for_network($path) )
                  ? 'Active' : 'Inactive';

        $has_update = (!empty($update_plugins->response[$path])) ? 'Yes' : 'No';

        fputcsv($out, [$name, $active, $has_update]);
    }

    fclose($out);
    exit; // Critical: stop WP from appending HTML.
});
