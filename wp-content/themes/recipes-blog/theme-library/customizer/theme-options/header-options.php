<?php

/**
 * Header Options
 *
 * @package recipes_blog
 */

// General Options
$wp_customize->add_section(
	'recipes_blog_general_options',
	array(
		'panel' => 'recipes_blog_theme_options',
		'title' => esc_html__( 'General Options', 'recipes-blog' ),
	)
);

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'recipes_blog_enable_preloader',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'recipes-blog' ),
			'section' => 'recipes_blog_general_options',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'recipes_blog_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'recipes-blog' ),
			'section'  => 'title_tagline',
			'settings' => 'recipes_blog_enable_site_title_setting',
		)
	)
);

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'recipes_blog_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'recipes-blog' ),
			'section'  => 'title_tagline',
			'settings' => 'recipes_blog_enable_tagline_setting',
		)
	)
);

$wp_customize->add_section(
	'recipes_blog_header_options',
	array(
		'panel' => 'recipes_blog_theme_options',
		'title' => esc_html__( 'Header Options', 'recipes-blog' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'recipes_blog_enable_topbar',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'recipes-blog' ),
			'section' => 'recipes_blog_header_options',
		)
	)
);

// Header Options - Welcome Text.
$wp_customize->add_setting(
	'recipes_blog_welcome_topbar_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'recipes_blog_welcome_topbar_text',
	array(
		'label'           => esc_html__( 'Topbar Text', 'recipes-blog' ),
		'section'         => 'recipes_blog_header_options',
		'type'            => 'text',
		'active_callback' => 'recipes_blog_is_topbar_enabled',
	)
);