<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://itech-softsolutions.com/
 * @since             1.0.0
 * @package           Elements_Buddy
 *
 * @wordpress-plugin
 * Plugin Name:       Elements Buddy
 * Plugin URI:        https://itech-softsolutions.com/plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            iTech Theme
 * Author URI:        https://itech-softsolutions.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elements-buddy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ELEMENTS_BUDDY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elements-buddy-activator.php
 */
function activate_elements_buddy() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy-activator.php';
	Elements_Buddy_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elements-buddy-deactivator.php
 */
function deactivate_elements_buddy() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy-deactivator.php';
	Elements_Buddy_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elements_buddy' );
register_deactivation_hook( __FILE__, 'deactivate_elements_buddy' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elements_buddy() {

	$plugin = new Elements_Buddy();
	$plugin->run();

}
run_elements_buddy();
