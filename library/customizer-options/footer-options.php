<?php

/*
 * Footer customizer section. Although the social modifications are named as a social media resource, thy are only
 * names that idetify the setting. Each social media icon option can be any icon found on Font Awesome. This file is
 * included in custom-nav.php
 * */

$wp_customize->add_section('footer_section', array(
		'title' => __('Footer Section', 'foundationpress'),
		'priority' => 80,
		'active_callback' => function () {
			return is_page_template('page-templates/front.php');
		}
	)
);
// Social media icon color
$wp_customize->add_setting('socialmedia_icon_color', array(
		'default' => '#f5f5f5',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	)
);
// Control for social media icon color
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'socialmedia_icon_color', array(
			'label' => __('Social media icon color'),
			'section' => 'footer_section',
			'settings' => 'socialmedia_icon_color'
		)
	)
);
// Social media icon selective refresh color
$wp_customize->selective_refresh->add_partial('socialmedia_icon_color', array(
		'selector' => '.footer-social',
		'settings' => 'socialmedia_icon_color',
		'render_callback' => 'output'
	)
);
// Social media icon:hover color
$wp_customize->add_setting('socialmedia_iconhover_color', array(
		'default' => '#f8f8f8',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	)
);
// Control for social media icon:hover color
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'socialmedia_iconhover_color', array(
			'label' => __('Social media icon:hover color'),
			'section' => 'footer_section',
			'settings' => 'socialmedia_iconhover_color'
		)
	)
);
// Social media icon:hover selective refresh color
$wp_customize->selective_refresh->add_partial('socialmedia_iconhover_color', array(
		'selector' => '.footer-social',
		'settings' => 'socialmedia_iconhover_color',
		'render_callback' => 'output'
	)
);
// Social Media Icon #1
$wp_customize->add_setting( 'facebook_icon_bawx', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'facebook_icon_bawx', array(
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => 'facebook_icon_bawx',
		'label' => __( 'Add Social Media #1 Icon Here' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media #1 icon link
$wp_customize->add_setting( 'facebook_icon_bawx_link', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'theme_slug_sanitize_html',
	)
);
$wp_customize->add_control( 'facebook_icon_bawx_link', array(
		'type' => 'url',
		'section' => 'footer_section',
		'settings' => 'facebook_icon_bawx_link',
		'label' => __( 'Social Media &#35;1 Link' ),
		'description' => __( 'Add social media icon link' ),
	)
);
// Social media icon #2
$wp_customize->add_setting( 'twitter_icon_bawx', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'twitter_icon_bawx', array(
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => 'twitter_icon_bawx',
		'label' => __( 'Add Social Media #2 Icon Here' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #2 link
$wp_customize->add_setting( 'twitter_icon_bawx_link', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'postMessage',
		'sanitize_callback' => 'theme_slug_sanitize_html',
	)
);
$wp_customize->add_control( 'twitter_icon_bawx_link', array(
		'type' => 'url',
		'section' => 'footer_section',
		'settings' => 'twitter_icon_bawx_link',
		'label' => __( 'Social Media &#35;2 Link' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #3
$wp_customize->add_setting( 'instagram_icon_bawx', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'instagram_icon_bawx', array(
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => 'instagram_icon_bawx',
		'label' => __( 'Add Social Media #3 Icon Here' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #3 link
$wp_customize->add_setting( 'instagram_icon_bawx_link', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'postMessage',
		'sanitize_callback' => 'theme_slug_sanitize_html',
	)
);
$wp_customize->add_control( 'instagram_icon_bawx_link', array(
		'type' => 'url',
		'section' => 'footer_section',
		'settings' => 'instagram_icon_bawx_link',
		'label' => __( 'Social Media #3 Link' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #4
$wp_customize->add_setting( 'youtube_icon_bawx', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'youtube_icon_bawx', array(
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => 'youtube_icon_bawx',
		'label' => __( 'Add Social Media #4 Icon Here' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #4 link
$wp_customize->add_setting( 'youtube_icon_bawx_link', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'postMessage',
		'sanitize_callback' => 'theme_slug_sanitize_html',
	)
);
$wp_customize->add_control( 'youtube_icon_bawx_link', array(
		'type' => 'url',
		'section' => 'footer_section',
		'settings' => 'youtube_icon_bawx_link',
		'label' => __( 'Social Media #4 Link' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social Media #5
$wp_customize->add_setting( 'email_icon_bawx', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'email_icon_bawx', array(
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => 'email_icon_bawx',
		'label' => __( 'Add Social Media &#35;5 Icon Here' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
// Social media icon #5 link
$wp_customize->add_setting( 'email_icon_bawx_link', array(
		'capability' => 'edit_theme_options',
		'type'	=> 'theme_mod',
		'default' => '',
		'transport'	=> 'postMessage',
		'sanitize_callback' => 'theme_slug_sanitize_html',
	)
);
$wp_customize->add_control( 'email_icon_bawx_link', array(
		'type' => 'url',
		'section' => 'footer_section',
		'settings' => 'email_icon_bawx_link',
		'label' => __( 'Social Media &#35;5 Link' ),
		'description' => __( 'Go to fontawseome.com, pick a social media icon. Put it here.' ),
	)
);
