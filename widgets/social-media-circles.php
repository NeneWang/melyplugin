<?php

namespace Melycustom\ElementorWidgets\Widgets;

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
        return __( 'Mely Social Media Circles', 'mely-elementor-widgets' );
    }

    public function get_icon() {
        return 'eicon-share';
    }

    public function get_categories() {
        return ['melycustom'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'mely-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_media_repeater',
            [
                'label' => __( 'Social Media Icons', 'mely-elementor-widgets' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'social_media_name',
                        'label' => __( 'Social Media Name', 'mely-elementor-widgets' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Instagram',
                    ],
                    [
                        'name' => 'social_media_icon',
                        'label' => __( 'Social Media Icon', 'mely-elementor-widgets' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'name' => 'social_media_link',
                        'label' => __( 'Link', 'mely-elementor-widgets' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __( 'https://example.com', 'mely-elementor-widgets' ),
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
                    [
                        'social_media_name' => 'Facebook',
                        'social_media_icon' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands',
                        ],
                        'social_media_link' => [
                            'url' => 'https://facebook.com',
                        ],
                    ],
                    [
                        'social_media_name' => 'Twitter',
                        'social_media_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                        'social_media_link' => [
                            'url' => 'https://twitter.com',
                        ],
                     ],
                     [
                        // youtube.
                        'social_media_name' => 'YouTube',
                        'social_media_icon' => [
                            'value' => 'fab fa-youtube',
                            'library' => 'fa-brands',
                        ],
                        'social_media_link' => [
                            'url' => 'https://youtube.com',
                        ],
                     ]
                ],
                'title_field' => '{{{ social_media_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'mely-elementor-widgets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'mely-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circle_background_color',
            [
                'label' => __( 'Circle Background Color', 'mely-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circle_size',
            [
                'label' => __( 'Circle Size', 'mely-elementor-widgets' ),
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

        $this->add_control(
            'hover_color',
            [
                'label' => __( 'Hover Background Color', 'mely-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_icon_color',
            [
                'label' => __( 'Hover Icon Color', 'mely-elementor-widgets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-media-circle:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
<style>
    /* Social Media Container */
    .social-media-circles {
        display: flex;
        gap: 15px;
        /* Adjust spacing between icons */
        align-items: center;
        /* Vertically centers the icons */
        justify-content: flex-start;
        /* Aligns circles to the left */
        height: 2em!important;
    }

    /* Target all svg inside of .social-media-circles */
    .social-media-circles svg {
        width: 1.5em;
        /* Adjusts the size of the icons */
        height: 1.5em;
        /* Adjusts the size of the icons */
    }

    /* Individual Circle Styling */
    .social-media-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        /* Smaller circle size */
        height: 40px;
        /* Smaller circle size */
        border-radius: 50%;
        /* Makes the element a perfect circle */
        background-color: #f4f4f4;
        /* Light gray background */
        transition: all 0.3s ease;
        /* Smooth hover animations */
        cursor: pointer;
        /* Pointer cursor for interactive icons */
    }

    /* Icon Styling */
    .social-media-circle i {
        font-size: 16px;
        /* Reduced icon size */
        color: #333;
        /* Default icon color */
        transition: color 0.3s ease;
        /* Smooth color change on hover */
    }

    /* Hover Effects */
    .social-media-circle:hover {
        background-color: #dcdcdc;
        /* Slightly darker background on hover */
        transform: scale(1.1);
        /* Slight zoom effect */
    }

    .social-media-circle:hover i {
        color: #000;
        /* Darker icon color on hover */
    }
</style>
<?php

        if ( ! empty( $settings['social_media_repeater'] ) ) {
            echo '<div class="social-media-circles">';
            foreach ( $settings['social_media_repeater'] as $item ) {
                $link_url = $item['social_media_link']['url'];
                ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" class="social-media-circle" target="_blank" rel="noopener">
                        <?php
                        $icon_html = \Elementor\Icons_Manager::render_icon( $item['social_media_icon'], [ 'aria-hidden' => 'true' ] );
                        ?>
                         
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