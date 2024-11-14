<?php
/**
 * Plugin Name: Mely Plugin
 * Version: 1.0.0
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Nelson Wang
 * Author URI: https://github.com/NeneWang
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: mely-plugin
 * Domain Path: /lang/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-mely-plugin.php';
require_once 'includes/class-mely-plugin-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-mely-plugin-admin-api.php';
require_once 'includes/lib/class-mely-plugin-post-type.php';
require_once 'includes/lib/class-mely-plugin-taxonomy.php';

/**
 * Returns the main instance of WordPress_Plugin_Template to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object WordPress_Plugin_Template
 */
function wordpress_plugin_template() {
	$instance = WordPress_Plugin_Template::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = WordPress_Plugin_Template_Settings::instance( $instance );
	}

	return $instance;
}

wordpress_plugin_template();
