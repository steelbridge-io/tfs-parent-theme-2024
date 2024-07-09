<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

include('customizer-css/customizer-css.php');

if (! function_exists('wpt_register_theme_customizer')) :

	add_action('customize_register','wpt_register_theme_customizer');

	function wpt_register_theme_customizer($wp_customize)
	{

		include ('customizer-options/footer-options.php');

		// Create custom panels
		$wp_customize->add_panel(
			'mobile_menu_settings', array(
				'priority' => 1000,
				'theme_supports' => '',
				'title' => __('Mobile Menu Settings', 'foundationpress'),
				'description' => __('Controls the mobile menu', 'foundationpress'),
			)
		);

		// Create custom field for mobile navigation layout
		$wp_customize->add_section(
			'mobile_menu_layout', array(
				'title' => __('Mobile navigation layout', 'foundationpress'),
				'panel' => 'mobile_menu_settings',
				'priority' => 1000,
			)
		);

		// Set default navigation layout
		$wp_customize->add_setting(
			'wpt_mobile_menu_layout',
			array(
				'default' => __('topbar', 'foundationpress'),
			)
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mobile_menu_layout',
				array(
					'type' => 'radio',
					'section' => 'mobile_menu_layout',
					'settings' => 'wpt_mobile_menu_layout',
					'choices' => array(
						'topbar' => 'Topbar',
						'offcanvas' => 'Offcanvas',
					),
				)
			)
		);

		///////////////// FRONT PAGE SLIDER

		// Front Page Slider Section
		$wp_customize->add_section('fp_top_slider', array(
			'title' => __('Front Page Slider', 'foundationpress'),
			'priority' => 20,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));

		$wp_customize->add_setting( 'adds_slider_caption', array(
			'capability' => 'edit_theme_options',
			'type'       => 'theme_mod',
			'sanitize_callback' => 'themeslug_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'adds_slider_caption', array(
			'type' => 'checkbox',
			'section' => 'fp_top_slider',
			'label' => __( 'Add Captions To Slider?' ),
			'priority'	=> 10,
			'description' => __( 'Checking this box will add captions to the bottom of slider images.' ),
		) );

		// Slider Logo
		$wp_customize->add_setting('fp-logo', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-logo',
				array(
					'label' => __('Slider Logo'),
					'section' => 'fp_top_slider',
					'settings' => 'fp-logo',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw'
				)
			)
		);

		///////////////// SLIDER ONE

		// Slider #1 Setting
		$wp_customize->add_setting('fp-topslider-one', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Slider #1 Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topslider-one',
				array(
					'label' 						=> __('Slider &#35;1 Image'),
					'section' 					=> 'fp_top_slider',
					'settings' 					=> 'fp-topslider-one',
					'priority' 					=> 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);
		// Slider Image #1 Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-one', array(
				'selector' 				=> '.orbit-image.orbit-image-one',
				'settings' 				=> 'fp-topslider-one',
				'render_callback' => wp_get_attachment_image(get_theme_mod('fp-topslider-one'), '')
			)
		);

		// Slider #1 Caption Setting
		$wp_customize->add_setting('fp-topslider-one-caption', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		// Slider #1 Caption Control
		$wp_customize->add_control('fp-topslider-one-caption', array(
			'default' => '',
			'type' => 'textarea',
			'priority' => 10,
			'section' => 'fp_top_slider',
			'settings' => 'fp-topslider-one-caption',
			'label' => __('Slider &#35;1 Caption'),
		));
		// Slider #1 Caption Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-one-caption', array(
				'selector' => '.orbit-caption.orbit-caption-one',
				'settings' => 'fp-topslider-one-caption',
				'render_callback' => function () {
					return get_theme_mod('fp-topslider-one-caption');
				}
			)
		);

		///////////////// SLIDER TWO

		// Slider #2 Setting
		$wp_customize->add_setting('fp-topslider-two', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		// Slider #2 Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topslider-two',
				array(
					'label' => __('Slider &#35;2 Image'),
					'section' => 'fp_top_slider',
					'settings' => 'fp-topslider-two',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);
		// Slider Image #2 Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-two', array(
				'selector' 				=> '.orbit-image.orbit-image-two',
				'settings' 				=> 'fp-topslider-two',
				'render_callback' => wp_get_attachment_image(get_theme_mod('fp-topslider-two'), '')
			)
		);
		// Slider #2 Caption
		$wp_customize->add_setting('fp-topslider-two-caption', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control('fp-topslider-two-caption', array(
				'default' => '',
				'type' => 'textarea',
				'priority' => 10,
				'section' => 'fp_top_slider',
				'settings' => 'fp-topslider-two-caption',
				'label' => __('Slider &#35;2 Caption'),
			)
		);
		// Slider #2 Caption Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-two-caption', array(
				'selector' => '.orbit-caption.orbit-caption-two',
				'settings' => 'fp-topslider-two-caption',
				'render_callback' => function () {
					return get_theme_mod('fp-topslider-two-caption');
				}
			)
		);

		///////////////// SLIDER THREE

		// Slider #3 Setting
		$wp_customize->add_setting('fp-topslider-three', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);

		// Slider #3 Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topslider-three',
				array(
					'label' => __('Slider &#35;3 Image'),
					'section' => 'fp_top_slider',
					'settings' => 'fp-topslider-three',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		// Slider Image #3 Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-three', array(
				'selector' 				=> '.orbit-image.orbit-image-three',
				'settings' 				=> 'fp-topslider-three',
				'render_callback' => wp_get_attachment_image(get_theme_mod('fp-topslider-three'), '')
			)
		);

		// Slider #3 Caption Setting
		$wp_customize->add_setting('fp-topslider-three-caption', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Slider #3 Caption Control
		$wp_customize->add_control('fp-topslider-three-caption', array(
				'default' => '',
				'type' => 'textarea',
				'priority' => 10,
				'section' => 'fp_top_slider',
				'settings' => 'fp-topslider-three-caption',
				'label' => __('Slider &#35;3 Caption'),
			)
		);
		// Slider #2 Caption Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-three-caption', array(
				'selector' => '.orbit-caption.orbit-caption-three',
				'settings' => 'fp-topslider-three-caption',
				'render_callback' => function () {
					return get_theme_mod('fp-topslider-three-caption');
				}
			)
		);

		///////////////// SLIDER FOUR

		// Slider #4 Setting
		$wp_customize->add_setting('fp-topslider-four', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		// Slider #4 Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topslider-four',
				array(
					'label' => __('Slider &#35;4 Image'),
					'section' => 'fp_top_slider',
					'settings' => 'fp-topslider-four',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		// Slider Image #4 Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-four', array(
				'selector' 				=> '.orbit-image.orbit-image-four',
				'settings' 				=> 'fp-topslider-four',
				'render_callback' => wp_get_attachment_image(get_theme_mod('fp-topslider-four'), '')
			)
		);

		// Slider #4 Caption Setting
		$wp_customize->add_setting('fp-topslider-four-caption', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Slider #4 Caption Control
		$wp_customize->add_control('fp-topslider-four-caption', array(
				'default' => '',
				'type' => 'textarea',
				'priority' => 10,
				'section' => 'fp_top_slider',
				'settings' => 'fp-topslider-four-caption',
				'label' => __('Slider &#35;4 Caption'),
			)
		);

		// Slider #4 Caption Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topslider-four-caption', array(
				'selector' => '.orbit-caption.orbit-caption-four',
				'settings' => 'fp-topslider-four-caption',
				'render_callback' => function () {
					return get_theme_mod('fp-topslider-four-caption');
				}
			)
		);

		///////////////// FRONT PAGE TOP WIDGET AREA
		$wp_customize->add_section('fp_top_widget_section', array(
			'title' => __('Front Page Top Widget', 'foundationpress'),
			'priority' => 20,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));
		// Front Page Top Widget Background Color Setting
		$wp_customize->add_setting('fp-top-widget-bg-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		// Front Page Top Widget Background Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-top-widget-bg-color', array(
					'label' => __('Top Widgets Background Color'),
					'priority' => 10,
					'section' => 'fp_top_widget_section',
					'settings' => 'fp-top-widget-bg-color'
				)
			)
		);
		// Front Page Top Widget Selective Refresh Background color
		$wp_customize->selective_refresh->add_partial('fp-top-widget-bg-color', array(
			'selector' => '.topcta-selector',
			'settings' => 'fp-top-widget-bg-color',
			'render_callback' => 'output'
		) );

		// Front Page Top Widget Text Color Setting
		$wp_customize->add_setting('fp-top-widget-txt-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));

		// Front Page Top Widget Text Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-top-widget-txt-color', array(
					'label' => __('Top Widgets Text Color'),
					'priority' => 10,
					'section' => 'fp_top_widget_section',
					'settings' => 'fp-top-widget-txt-color'
				)
			)
		);
		// Front Page Top Widget Text Color Selective Refresh
		 $wp_customize->selective_refresh->add_partial('fp-top-widget-txt-color', array(
				'selector' => '.topcta-text-color',
				'settings' => 'fp-top-widget-txt-color',
				'render_callback' => 'output'
			)
		);

		///////////////// FRONT PAGE SLIDER #2

		// Front Page Slider #2 Section
		$wp_customize->add_section('fp_slider_two', array(
			'title' => __('Front Page Slider &#35;2', 'foundationpress'),
			'priority' => 30,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));

		///////////////// IF YOUTUBE FRONT PAGE VIDEO

		// YouTube Setting
		$wp_customize->add_setting('fp-youtube', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		// YouTube Control
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-youtube',
				array(
					'label' => __('YouTube Video ID'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-youtube',
					'type' => 'text',
					'priority' => 10,
					'sanitize_callback' => 'wp_filter_nohtml_kses',
				)
			)
		);
		// Front Page Top Widget Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-youtube', array(
				'selector' => '.videobg-hide-controls',
				'settings' => 'fp-youtube',
				'render_callback' => 'fp_youtube'
			)
		);

		///////////////// ELSEIF MOVIE MP4 & WEBM INCLUDING COMMENT

		$wp_customize->add_setting('fp-movie-mp4', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Upload_Control (
				$wp_customize,
				'fp-movie-mp4',
				array(
					'label' => __('Movie - MP4'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-movie-mp4',
					'priority' => 10
				)
			)
		);
		// Media Section : Selective Refresh for MP4
		$wp_customize->selective_refresh->add_partial('fp-movie-mp4', array(
				'selector' => '#video_bg',
				'settings' => 'fp-movie-mp4',
				'render_callback' => function () {
					return get_theme_mod('fp-movie-mp4');
				}
			)
		);
		$wp_customize->add_setting('fp-movie-webm', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(
			new WP_Customize_Upload_Control (
				$wp_customize,
				'fp-movie-webm',
				array(
					'label' => __('Movie - WEBM'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-movie-webm',
					'priority' => 10
				)
			)
		);
		// Movie Comment
		$wp_customize->add_setting('fp-movie-comment', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'sanitize_callback' => 'theme_slug_sanitize_html'
		));
		$wp_customize->add_control('fp-movie-comment', array(
			'default' => '',
			'type' => 'textarea',
			'priority' => 10,
			'section' => 'fp_slider_two',
			'settings' => 'fp-movie-comment',
			'label' => __('Movie Comment'),
		));
		// Movie Comment Color
		$wp_customize->add_setting('movie-comment-color', array(
			'default' => '',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'movie-comment-color', array(
					'label' => __('Movie Comment Color'),
					'priority' => 10,
					'section' => 'fp_slider_two',
					'settings' => 'movie-comment-color'
				)
			)
		);

		///////////////// ELSEIF BOTTOM SLIDER (slide #1)

		// Slide #1
		$wp_customize->add_setting('fp-slidertwo-one', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-slidertwo-one',
				array(
					'label' => __('Slide &#35;1'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-slidertwo-one',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		///////////////// BOTTOM SLIDER (slide #2)

		// Slide #2
		$wp_customize->add_setting('fp-slidertwo-two', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-slidertwo-two',
				array(
					'label' => __('Slide &#35;2'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-slidertwo-two',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		///////////////// BOTTOM SLIDER (slide #3)

		// Slide #3
		$wp_customize->add_setting('fp-slidertwo-three', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-slidertwo-three',
				array(
					'label' => __('Slide &#35;3'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-slidertwo-three',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		///////////////// BOTTOM SLIDER (slide #4)

		// Slide #3
		$wp_customize->add_setting('fp-slidertwo-four', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-slidertwo-four',
				array(
					'label' => __('Slide &#35;4'),
					'section' => 'fp_slider_two',
					'settings' => 'fp-slidertwo-four',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);

		///////////////// CARD SECTION

		// Right-Side Front Page Card Section - Contains Two Cards - Upper & Lower
		$wp_customize->add_section('fp_card_section', array(
			'title' => __('Front Page Card Section', 'foundationpress'),
			'priority' => 40,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));

		///////////////// TOP CARD IMAGE & CAPTION

		//Top Card Image Setting
		$wp_customize->add_setting('fp-topcard-img', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Top Card Image Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topcard-img',
				array(
					'label' => __('Top Card Image'),
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-img',
					'priority' => 10,
					//'sanitize_callback' => 'esc_url_raw',
				)
			)
		);
		// Top Card Image Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topcard-img', array(
				'selector' 				=> '.topcard-image-refresh',
				'settings' 				=> 'fp-topcard-img',
				'render_callback' => 'top_card_img'
			)
		);

		// Top Card Image Label Setting
		$wp_customize->add_setting('fp-topcard-label', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'sanitize_callback' => 'theme_slug_sanitize_html'
		));
		// Top Card Image Label Control
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-topcard-label',
				array(
					'label' => __('Top Card Image Label'),
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-label',
					'type' => 'text',
					'priority' => 10
				)
			)
		);
		// Top Card Image Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topcard-label', array(
				'selector' 				=> '#topcard .card-divider',
				'settings' 				=> 'fp-topcard-label',
				'render_callback' => function() {
					return get_theme_mod('fp-topcard-label');
				}
			)
		);

		// Top Card Image Label Color Setting
		$wp_customize->add_setting('fp-topcard-label-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		// Top Card Image Label Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-topcard-label-color', array(
					'label' => __('Top Card Label Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-label-color'
				)
			)
		);
		// Top Card Image Label Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topcard-label-color', array(
				'selector' => '.topcard-label-refresh-color',
				'settings' => array('fp-topcard-label-color'),
				'render_callback' => 'output'
			)
		);

		// Top Card Text Area Background Color Setting
		$wp_customize->add_setting('fp-topcard-bg-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Top Card Text Area Background Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-topcard-bg-color', array(
					'label' => __('Top Card Background Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-bg-color'
				)
			)
		);
		// Top Card Text Area Background Color
		$wp_customize->selective_refresh->add_partial('fp-topcard-bg-color', array(
				'selector' => '.top-card-text-refresh',
				'settings' => array('fp-topcard-bg-color'),
				'render_callback' => 'output'
			)
		);

		// Top Card Text Color Setting
		$wp_customize->add_setting('fp-topcard-txt-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Top Card Text Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-topcard-txt-color', array(
					'label' => __('Top Card Text Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-txt-color'
				)
			)
		);
		// Top Card Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topcard-txt-color', array(
				'selector' => '.top-card-text-refresh',
				'settings' => array('fp-topcard-txt-color'),
				'render_callback' => 'output'
			)
		);

		// Top Card Caption
		$wp_customize->add_setting('fp-topcard-cap', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-topcard-cap',
				array(
					'label' => __('Top Card Caption'),
					'section' => 'fp_card_section',
					'settings' => 'fp-topcard-cap',
					'type' => 'textarea',
					'priority' => 10,
					'sanitize_callback' => 'theme_slug_sanitize_html',
				)
			)
		);
		// Top Card Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-topcard-cap', array(
				'selector' => '#topcardid.card-section',
				'settings' => array('fp-topcard-cap'),
				'render_callback' => function() {
					return get_theme_mod( 'fp-topcard-cap');
				}
			)
		);

		// Bottom Card Image Setting
		$wp_customize->add_setting('fp-bottomcard-img', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Bottom Card Image Control
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-bottomcard-img',
				array(
					'label' => __('Bottom Card Image'),
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-img',
					'priority' => 10,
					//'sanitize_callback' => 'esc_url_raw',
				)
			)
		);
		// Bottom Card Image Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-img', array(
				'selector' => '.bottom-card-img-refresh',
				'settings' => 'fp-bottomcard-img',
				'render_callback' => 'output'
			)
		);

		// Bottom Card Image Label Setting
		$wp_customize->add_setting('fp-bottomcard-label', array(
				'default' => '',
				'type' => 'theme_mod',
				'transport' => 'postMessage'
			)
		);
		// Bottom Card Image Lable Control
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-bottomcard-label',
				array(
					'label' => __('Bottom Card Image Label'),
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-label',
					'type' => 'text',
					'priority' => 10,
					'sanitize_callback' => 'theme_slug_sanitize_html',
				)
			)
		);
		// Bottom Card Image Label Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-label', array(
				'selector' => '.bottomcard .card-divider',
				'settings' => array('fp-bottomcard-label'),
				'render_callback' => function() {
					return get_theme_mod('fp-bottomcard-label');
				}
			)
		);

		// Bottom Card Image Label Color Setting
		$wp_customize->add_setting('fp-bottomcard-label-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		// Bottom Card Image Label Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-bottomcard-label-color', array(
					'label' => __('Bottom Card Label Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-label-color'
				)
			)
		);
		// Bottom Card Image Label Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-label-color', array(
				'selector' => '.bottom-card-text-refresh',
				'settings' => array('fp-bottomcard-label-color'),
				'render_callback' => 'output'
			)
		);

		// Bottom Card Content Background Color Setting
		$wp_customize->add_setting('fp-bottomcard-bg-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Bottom Card Content Background Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-bottomcard-bg-color', array(
					'label' => __('Bottom Card Background Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-bg-color'
				)
			)
		);
		// Bottom Card Content Background Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-bg-color', array(
				'selector' => '.bottom-card-textarea-refresh',
				'settings' => array('fp-bottomcard-bg-color'),
				'render_callback' => 'output'
			)
		);

		// Bottom Card Text Color Setting
		$wp_customize->add_setting('fp-bottomcard-txt-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Bottom Card Text Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-bottomcard-txt-color', array(
					'label' => __('Bottom Card Text Color'),
					'priority' => 10,
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-txt-color'
				)
			)
		);
		// Bottom Card Text Color Control Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-txt-color', array(
				'selector' => '.bottom-card-textarea-refresh',
				'settings' => array('fp-bottomcard-txt-color'),
				'render_callback' => 'output'
			)
		);
		// Bottom Card Caption
		$wp_customize->add_setting('fp-bottomcard-cap', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-bottomcard-cap',
				array(
					'label' => __('Bottom Card Caption'),
					'section' => 'fp_card_section',
					'settings' => 'fp-bottomcard-cap',
					'type' => 'textarea',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
			)
		);
		// Bottom Card Text Color Control Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-bottomcard-cap', array(
				'selector' => '#bottomcardid.card-section',
				'settings' => array('fp-bottomcard-cap'),
				'render_callback' => function() {
					return get_theme_mod('fp-bottomcard-cap');
				}
			)
		);

		// Blog Excerpt Background Color Setting
		$wp_customize->add_setting('fp-blog-bg-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Blog Excerpt Background Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-blog-bg-color', array(
					'label' => __('Blog Section Background Color'),
					'priority' => 20,
					'section' => 'fp_color_section',
					'settings' => 'fp-blog-bg-color'
				)
			)
		);
		// Blog Excerpt Background Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-blog-bg-color', array(
				'selector' => '.blog-selective-refresh',
				'settings' => array('fp-blog-bg-color'),
				'render_callback' => 'output'
			)
		);

		// Blog Excerpt Text Color Setting
		$wp_customize->add_setting('fp-blog-text-color', array(
				'default' => '#000',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Blog Excerpt Text Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-blog-text-color', array(
					'label' => __('Blog Section Text Color'),
					'priority' => 20,
					'section' => 'fp_color_section',
					'settings' => 'fp-blog-text-color'
				)
			)
		);
		// Blog Excerpt Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-blog-text-color', array(
				'selector' => '.blog-selective-refresh',
				'settings' => array('fp-blog-text-color'),
				'render_callback' => 'output'
			)
		);

		// Blog Excerpt Text Color Setting
		$wp_customize->add_setting('fp-blog-h3-color', array(
				'default' => '#000',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Blog Excerpt Text Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-blog-h3-color', array(
					'label' => __('Blog Title Color'),
					'priority' => 20,
					'section' => 'fp_color_section',
					'settings' => 'fp-blog-h3-color'
				)
			)
		);
		// Blog Excerpt Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-blog-h3-color', array(
				'selector' => '.blog-selective-refresh',
				'settings' => array('fp-blog-h3-color'),
				'render_callback' => 'output'
			)
		);

		// Blog Excerpt Link Color Setting
		$wp_customize->add_setting('fp-blog-link-color', array(
				'default' => '#1779ba',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Blog Excerpt Link Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-blog-link-color', array(
					'label' => __('Blog Section Link Color'),
					'priority' => 20,
					'section' => 'fp_color_section',
					'settings' => 'fp-blog-link-color'
				)
			)
		);
		// Blog Excerpt Text Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-blog-link-color', array(
				'selector' => '.blog-selective-refresh',
				'settings' => array('fp-blog-link-color'),
				'render_callback' => 'output'
			)
		);
		// Blog Section Title Color Setting
		$wp_customize->add_setting('fp-blog-title-color', array(
				'default' => '#f5f5f5',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'postMessage'
			)
		);
		// Blog Section Title Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-blog-title-color', array(
					'label' => __('Blog Section Title Color'),
					'priority' => 20,
					'section' => 'fp_color_section',
					'settings' => 'fp-blog-title-color'
				)
			)
		);
		// Blog Section Title Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('fp-blog-title-color', array(
				'selector' => '.blog-news-refresh',
				'settings' => array('fp-blog-title-color'),
				'render_callback' => 'output'
			)
		);

		///////////////// PARALLAX IMAGES

		// Adds Parallax Section
		$wp_customize->add_section('fp_parallax_section', array(
			'title' => __('Front Page Parallax Images', 'foundationpress'),
			'priority' => 40,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));

		// Adds Parallax Top Image
		$wp_customize->add_setting('fp-topparallax-img', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-topparallax-img',
				array(
					'label' => __('Top Parallax Image'),
					'section' => 'fp_parallax_section',
					'settings' => 'fp-topparallax-img',
					'priority' => '10',
					'sanatize_callback' => 'esc_url_raw'
				)
			)
		);

		// Parallax One CTA
		$wp_customize->add_setting('fp-topparallax-cta', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'sanitize_callback' => 'theme_slug_sanitize_html'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-topparallax-cta',
				array(
					'label' => __('Top Parallax CTA'),
					'section' => 'fp_parallax_section',
					'settings' => 'fp-topparallax-cta',
					'type' => 'textarea',
					'priority' => 10
				)
			)
		);
		$wp_customize->selective_refresh->add_partial('fp-topparallax-cta', array(
			'selector' => '#parallaxone .parallax-text',
			'settings' => 'fp-topparallax-cta',
			'render_callback' => function () {
				return get_theme_mod('fp-topparallax-cta');
			}
		));

		// Parallax One Content Color
		$wp_customize->add_setting('fp-toppara-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-toppara-color', array(
					'label' => __('Parallax Top Label Color'),
					'priority' => 10,
					'section' => 'fp_parallax_section',
					'settings' => 'fp-toppara-color'
				)
			)
		);

		$wp_customize->add_setting('fp-divider-content', array(
			'type' => 'theme_mod',
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'theme_slug_sanitize_html'
		));

		$wp_customize->add_control('fp-divider-content', array(
			'type' => 'textarea',
			'priority' => 10,
			'section' => 'fp_parallax_section',
			'label' => __('Parallax Divider Content')
		));

		$wp_customize->selective_refresh->add_partial('fp-divider-content', array(
			'selector' => '.fp-divider-content',
			'settings' => 'fp-divider-content',
			'render_callback' => function () {
				return get_theme_mod('fp-divider-content');
			}
		));

		// Prallax Divider Text Color
		$wp_customize->add_setting('fp-divider-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-divider-color', array(
					'label' => __('Divider Color'),
					'priority' => 10,
					'section' => 'fp_parallax_section',
					'settings' => 'fp-divider-color'
				)
			)
		);

		// Adds Parallax Bottom Image
		$wp_customize->add_setting('fp-bottomparallax-img', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh',
			'sanatize_callback' => 'esc_url_raw'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control (
				$wp_customize,
				'fp-bottomparallax-img',
				array(
					'label' => __('Bottom Parallax Image'),
					'section' => 'fp_parallax_section',
					'settings' => 'fp-bottomparallax-img',
					'priority' => 10
				)
			)
		);

		// Parallax Two CTA
		$wp_customize->add_setting('fp-bottomparallax-cta', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage',
			'sanitize_callback' => 'theme_slug_sanitize_html'
		));
		$wp_customize->add_control('fp-bottomparallax-cta',
			array(
				'label' => __('Bottom Parallax CTA'),
				'section' => 'fp_parallax_section',
				'settings' => 'fp-bottomparallax-cta',
				'type' => 'textarea',
				'priority' => 10
			)
		);
		$wp_customize->selective_refresh->add_partial('fp-bottomparallax-cta', array(
			'selector' => '#parallaxtwo .parallax-text',
			'settings' => 'fp-bottomparallax-cta',
			'render_callback' => function () {
				return get_theme_mod('fp-bottomparallax-cta');
			}
		));
		// Parallax Two Content Color
		$wp_customize->add_setting('fp-bottomparallax-color', array(
			'default' => '#f5f5f5',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fp-bottomparallax-color', array(
					'label' => __('Parallax Bottom Label Color'),
					'priority' => 10,
					'section' => 'fp_parallax_section',
					'settings' => 'fp-bottomparallax-color'
				)
			)
		);

		///////////////// FRONT PAGE COLORS

		// Add Front Page Top Gradient Color Section
		$wp_customize->add_section('fp_color_section', array(
			'title' => __('Front Page Colors', 'foundationpress'),
			'priority' => 50,
			'active_callback' => function () {
				return is_page_template('page-templates/front.php');
			}
		));

		// Front Page Color Setting and control
		$wp_customize->add_setting('fp-top-gradient-bg', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-top-gradient-bg',
				array(
					'label' => __('Back Ground Color Top Gradient', 'foundationpress'),
					'section' => 'fp_color_section',
					'settings' => 'fp-top-gradient-bg',
					'type' => 'text',
					'priority' => 10,
				)
			)
		);

		// Front Page Middle Gradient
		$wp_customize->add_setting('fp-middle-gradient-bg', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-middle-gradient-bg',
				array(
					'label' => __('Back Ground Color Middle Gradient', 'foundationpress'),
					'section' => 'fp_color_section',
					'settings' => 'fp-middle-gradient-bg',
					'type' => 'text',
					'priority' => 10,
				)
			)
		);

		// Front Page Bottom Gradient Color Setting and control
		$wp_customize->add_setting('fp-bottom-gradient-bg', array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'refresh'
		));
		$wp_customize->add_control(
			new WP_Customize_Control (
				$wp_customize,
				'fp-bottom-gradient-bg',
				array(
					'label' => __('Bottom Gradient', 'foundationpress'),
					'section' => 'fp_color_section',
					'settings' => 'fp-bottom-gradient-bg',
					'type' => 'text',
					'priority' => 10,
				)
			)
		);


		////////////// Sidbar Right Theme

		$wp_customize->add_section('sidebar-rt-section', array(
			'title' => __('Side Bar Template', 'foundationpress'),
			'priority' => 50,
			'active_callback' => function () {
				return is_page_template('page-templates/sidebar-right.php');
			}
		));

		// Sidebar background color
		$wp_customize->add_setting('sidebar-bg-color', array(
			'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'sidebar-bg-color', array(
					'label' => __('Side Bar Background Color'),
					'priority' => 10,
					'section' => 'sidebar-rt-section',
					'settings' => 'sidebar-bg-color'
				)
			)
		);

		// Sidebar theme CTA background color
		$wp_customize->add_setting('sidebar-cta-bg-color', array(
			'default' => '#e6e6e6',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'sidebar-cta-bg-color', array(
					'label' => __('CTA Background Color'),
					'priority' => 10,
					'section' => 'sidebar-rt-section',
					'settings' => 'sidebar-cta-bg-color'
				)
			)
		);

		//////////////// Marketing Template
		// Marketing Section
		$wp_customize->add_section('marketing-template-section', array(
			'title' => __('Marketing Template', 'foundationpress'),
			'priority' => 50,
			'active_callback' => function () {
				return is_page_template('page-templates/marketing-grid.php');
			}
		));

		// Marketing Template Grid Backgound Color Setting
		$wp_customize->add_setting('mk-grid-bg-color', array(
				'default' => '#e6e6e6;',
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		// Marketing Template Grid Background Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'mk-grid-bg-color', array(
					'label' => __('Marketing Grid Background Color'),
					'priority' => 10,
					'section' => 'marketing-template-section',
					'settings' => 'mk-grid-bg-color'
				)
			)
		);
		// Front Page Top Widget Selective Refresh Background color
			$wp_customize->selective_refresh->add_partial('mk-grid-bg-color', array(
				'selector' => '.mk-grid-bg-color',
				'settings' => 'mk-grid-bg-color',
				'render_callback' => 'output'
			)
		);
		// Marketing Template Grid Font Color Setting
		$wp_customize->add_setting('mk-grid-font-color', array(
				'default' => '#8a8a8a;',
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		// Marketing Template Grid Font Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'mk-grid-font-color', array(
					'label' => __('Marketing Grid Font Color'),
					'priority' => 10,
					'section' => 'marketing-template-section',
					'settings' => 'mk-grid-font-color'
				)
			)
		);
		// Marketing Template Font Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('mk-grid-font-color', array(
				'selector' => '.mk-grid-bg-color',
				'settings' => 'mk-grid-font-color',
				'render_callback' => 'output'
			)
		);

		// Marketing Template Button Color Setting
		$wp_customize->add_setting('mk-grid-button-color', array(
				'default' => '#1779ba;',
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		// Marketing Template Grid Button Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'mk-grid-button-color', array(
					'label' => __('Marketing Grid Button Color'),
					'priority' => 10,
					'section' => 'marketing-template-section',
					'settings' => 'mk-grid-button-color'
				)
			)
		);
		// Marketing Template Button Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('mk-grid-button-color', array(
				'selector' => '.mk-grid-bg-color',
				'settings' => 'mk-grid-button-color',
				'render_callback' => 'output'
			)
		);

		// Marketing Template Button Font Color Setting
		$wp_customize->add_setting('mk-grid-button-font-color', array(
				'default' => '#ffffff;',
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		// Marketing Template Grid Button Font Color Control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'mk-grid-button-font-color', array(
					'label' => __('Marketing Grid Button Font Color'),
					'priority' => 10,
					'section' => 'marketing-template-section',
					'settings' => 'mk-grid-button-font-color'
				)
			)
		);
		// Marketing Template Button Font Color Selective Refresh
		$wp_customize->selective_refresh->add_partial('mk-grid-button-font-color', array(
				'selector' => '.mk-grid-bg-color',
				'settings' => 'mk-grid-button-font-color',
				'render_callback' => 'output'
			)
		);

		// End of customizer options
	}

	// Add class to body to help w/ CSS
	add_filter( 'body_class', 'mobile_nav_class' );
	function mobile_nav_class( $classes ) {
		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) :
			$classes[] = 'topbar';
		elseif ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) :
			$classes[] = 'offcanvas';
		endif;
		return $classes;
	}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tfs_customize_preview_js() {
	wp_enqueue_script( 'tfs_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'jquery', 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'tfs_customize_preview_js' );

// Allowed HTML
function theme_slug_sanitize_html( $input ) {
	global $allowedposttags;

	return wp_kses( $input, $allowedposttags );

	$allowed = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'target' => array(),
			'class' => array(),
			'www'	=> array(),
			'http' => array(),
			'https'	=> array(),
		),
		'br' => array(),
		'span' => array(),
		'em' => array(),
		'strong' => array(),
		'p' => array(
			'class' => array()
		),
		'div' => array(
			'class' => array()
		),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array()
	);

	return wp_kses( $input, $allowed );

	return wp_post_kses( $input );
	return wp_filter_post_kses( $input );
}
