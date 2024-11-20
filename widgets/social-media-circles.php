<?php

namespace TechiePress\ElementorWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Social Media Circles Widget.
 */
class Social_Media_Circles extends Widget_Base {
    
    public function get_name() {
        return 'social_media_circles';
    }

    public function get_title() {
        return __( 'Social Media Circles', 'techiepress-elementor-widgets' );
    }

    public function get_icon() {
        return 'eicon-share';
    }

    public function get_categories() {
        return ['techiepress'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'techiepress-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_media_repeater',
            [
                'label' => __( 'Social Media Icons', 'techiepress-elementor-widgets' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'social_media_name',
                        'label' => __( 'Social Media Name', 'techiepress-elementor-widgets' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Instagram',
                    ],
                    [
                        'name' => 'social_media_icon',
                        'label' => __( 'Social Media Icon', 'techiepress-elementor-widgets' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'name' => 'social_media_link',
                        'label' => __( 'Link', 'techiepress-elementor-widgets' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __( 'https://example.com', 'techiepress-elementor-widgets' ),
                        'default' => [
                            'url' => '',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'social_media_name' => 'Instagram',
                        'social_media_icon' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands',
                        ],
                        'social_media_link' => [
                            'url' => 'https://instagram.com',
                        ],
                    ],
                    [
                        'social_media_name' => 'TikTok',
                        'social_media_icon' => [
                            'value' => 'fab fa-tiktok',
                            'library' => 'fa-brands',
                        ],
                        'social_media_link' => [
                            'url' => 'https://tiktok.com',
                        ],
                    ],
                ],
                'title_field' => '{{{ social_media_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'techiepress-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'techiepress-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circle_background_color',
            [
                'label' => __( 'Circle Background Color', 'techiepress-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circle_size',
            [
                'label' => __( 'Circle Size', 'techiepress-elementor-widgets' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .social-media-circle i' => 'font-size: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['social_media_repeater'] ) ) {
            echo '<div class="social-media-circles">';
            foreach ( $settings['social_media_repeater'] as $item ) {
                $link_url = $item['social_media_link']['url'];
                $icon_html = \Elementor\Icons_Manager::render_icon( $item['social_media_icon'], [ 'aria-hidden' => 'true' ] );
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="social-media-circle" target="_blank" rel="noopener">
                    <?php echo $icon_html; ?>
                </a>
                <?php
            }
            echo '</div>';
        }
    }

    protected function _content_template() {
        ?>
        <# if ( settings.social_media_repeater.length ) { #>
            <div class="social-media-circles">
                <# _.each( settings.social_media_repeater, function( item ) { #>
                    <a href="{{ item.social_media_link.url }}" class="social-media-circle" target="_blank" rel="noopener">
                        <i class="{{ item.social_media_icon.value }}"></i>
                    </a>
                <# } ); #>
            </div>
        <# } #>
        <?php
    }
}
