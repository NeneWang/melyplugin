

<?php

namespace TechiePress\ElementorWidgets;
use TechiePress\ElementorWidgets\Widgets\Nav_Menu;


/**
 * Plugin Name: Mely Plugin
 * Version: 1.0.0
 * Description: Plugin con funcionalidades personalizadas para Mely.
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
// require_once 'includes/custom-elementor.php';


final class MelyWidget{
	const VERSION = '0.1.0';
	const ELEMENTRO_MINIMUM_VERSION = '3.0.0';
	const PHP_MINIMUM_VERSION = '7.0';

	private static $_instance = null;

	public function __construct(){
		add_action('init', [$this, 'i18n']);
		// add_action('init', [$this, 'init_controls']);
		// add_action('init', [$this, 'init_widgets']);

		add_action('plugin_loaded', [$this, 'i18n']);
		add_action('elementor/widgets/widget_registered', [$this, 'init_widgets']);



	}

	public function i18n(){
		load_plugin_textdomain('mely-plugin');
	}

	public function init_plugin(){
		// Check version php version.
		// Check elementor Installation.
		// Bring in the widget classes
		// Bring in the controls.

		$this->init_widgets();

	}


	public function init_controls(){

	}

	public function init_widgets(){

		require once __DIR__ . '/widgets/nav-menu.php';
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Nav_Menu());

	}

	public static function get_instance(){

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

}





function echo_header_2(){
	// echo '<h2>Hello Hello from the other sideHello from the other side</h2>';
	echo '<h2>' . apply_filters('thechiepress_title', 'This is our header two' ). '</h2>';
}



add_action('techiepress_do_action', 'echo_header_2');

function techiepressmodify_title($title){


	$title = 'Hello title - '. $title;
	return $title;
}


add_filter('thechiepress_title', 'techiepressmodify_title');


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

// wordpress_plugin_template();
