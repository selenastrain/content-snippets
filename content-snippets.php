<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://selenastrain.com
 * @since             1.0.0
 * @package           Content_Snippets
 *
 * @wordpress-plugin
 * Plugin Name:       Content Snippets
 * Plugin URI:        https://selenastrain.com/plugins/content-snippets
 * Description:       Easily create content snippets to display in widget areas.
 * Version:           1.0.0
 * Author:            Selena Strain
 * Author URI:        https://selenastrain.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       content-snippets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-content-snippets-activator.php
 */
function activate_content_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-content-snippets-activator.php';
	Content_Snippets_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_content_snippets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-content-snippets.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_content_snippets() {

	$plugin = new Content_Snippets();
	$plugin->run();

}
run_content_snippets();
