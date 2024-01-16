<?php

/**
 * Breadcrumb
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'recipes-blog' ),
		'panel' => 'recipes_blog_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'recipes_blog_enable_breadcrumb',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'recipes-blog' ),
			'section' => 'recipes_blog_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'recipes_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'recipes_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'recipes-blog' ),
		'active_callback' => 'recipes_blog_is_breadcrumb_enabled',
		'section'         => 'recipes_blog_breadcrumb',
	)
);
