<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://author-marblex.com/
 * @since             1.0.0
 * @package           Marblex
 *
 * @wordpress-plugin
 * Plugin Name:       marblex core
 * Plugin URI:        http://author-marblex.com/
 * Description:       This plugin provides custom post types, Theme options and all Theme related core functionality.
 * Version:           1.0
 * Author:            author-marblex
 * Author URI:        http://author-marblex.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       marblex-core
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
define( 'MARBLEX_CORE_VERSION', '1.0.0' );
define( 'MARBLEX_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'MARBLEX_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'MARBLEX_CORE_ASSETS_URL', plugin_dir_url( __FILE__ ) .'public/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function activate_marblex_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	Marblex_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_marblex_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	Marblex_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_marblex_core' );
register_deactivation_hook( __FILE__, 'deactivate_marblex_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_marblex_core() {

	$plugin = new Marblex();
	$plugin->run();

}
run_marblex_core();

