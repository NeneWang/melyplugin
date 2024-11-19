<?php

namespace Melycustom\ElementorWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Custom Elementor Nav Menu widget.
 */
class TolstoySidevideo extends Widget_Base {
    
    public function get_name() {
        return 'melycustom-menu';
    }

    public function get_title() {
        return __( 'Mely Tolstoy Scroll Circles', 'melycustom-elementor-widgets' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['melycustom'];
    }

    // Register controls
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'melycustom-elementor-widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'menu_title',
            [
                'label' => __( 'Menu Title', 'melycustom-elementor-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Default Title', 'melycustom-elementor-widgets' ),
                'dynamic' => [ 'active' => true ], 
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label' => __( 'Product ID', 'melycustom-elementor-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'PRODUCT_ID',
                'description' => __( 'Enter the product ID to be used in the Tolstoy Stories.', 'melycustom-elementor-widgets' ),
                'dynamic' => [ 'active' => true ],
            ]
        );

        $this->add_control(
            'custom_id',
            [
                'label' => __( 'Custom ID', 'melycustom-elementor-widgets' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'kccm4no2wxuvv',
                'description' => __( 'Enter the custom ID for the Tolstoy Stories widget.', 'melycustom-elementor-widgets' ),
                'dynamic' => [ 'active' => true ], // Enable dynamic data
            ]
        );

        $this->end_controls_section();
    }

    // Render the widget content
    protected function render() {
        $settings = $this->get_settings_for_display();
        $menu_title = $settings['menu_title'];
        $product_id = $settings['product_id'];
        $custom_id = $settings['custom_id'];
        ?>
        <div class="melycustom-menu-widget">
            <h2><?php echo esc_html( $menu_title ); ?></h2>
            <tolstoy-stories 
                id="<?php echo esc_attr( $custom_id ); ?>" 
                class="tolstoy-stories" 
                data-product-id="<?php echo esc_attr( $product_id ); ?>">
            </tolstoy-stories>
        </div>
        <?php
    }

    // Render the content template for the editor
    protected function _content_template() {
        ?>
        <# 
        var menuTitle = settings.menu_title;
        var productId = settings.product_id;
        var customId = settings.custom_id;
        #>
        <div class="melycustom-menu-widget">
            <h2>{{{ menuTitle }}}</h2>
            <tolstoy-stories 
                id="{{{ customId }}}" 
                class="tolstoy-stories" 
                data-product-id="{{{ productId }}}">
            </tolstoy-stories>
        </div>
        <?php
    }
}
