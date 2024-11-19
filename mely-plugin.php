<?php
/**
 * Plugin Name: Mely Elementor Widgets
 * Author: Nelson Wang
 * Description: Custom Mely tools
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: melycustom-elementor-widgets
*/
namespace Melycustom\ElementorWidgets;

use Melycustom\ElementorWidgets\Widgets\TolstoySidevideo;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MelyElementorWidgets {

    const VERSION = '0.1.0';
    const ELEMENTOR_MINIMUM_VERSION = '3.0.0';
    const PHP_MINIMUM_VERSION = '7.0';

    private static $_instance = null;

    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
        add_action( 'elementor/elements/categories_registered', [ $this, 'create_new_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    public function i18n() {
        load_plugin_textdomain( 'mely-elementor-widgets' );
    }

    public function init_plugin() {
    }

    public function init_controls() {
        
    }

    public function init_widgets() {

        // Require the widget class.
        require_once __DIR__ . '/widgets/video-side.php';

        // Register widget with elementor.
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TolstoySidevideo() );

    }

    public static function get_instance() {

        if ( null == self::$_instance ) {
            self::$_instance = new Self();
        }

        return self::$_instance;

    }

    public function create_new_category( $elements_manager ) {

        $elements_manager->add_category(
            'tolstoysidebar',
            [
                'title' => __( 'MelyCustom', 'tolstoysidebar' ),
                'icon'  => 'fa fa-plug'
            ]
        );

    }

}

MelyElementorWidgets::get_instance();