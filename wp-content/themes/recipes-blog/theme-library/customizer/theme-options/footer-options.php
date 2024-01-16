<?php

/**
 * Footer Options
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_footer_options',
	array(
		'panel' => 'recipes_blog_theme_options',
		'title' => esc_html__( 'Footer Options', 'recipes-blog' ),
	)
);

$wp_customize->add_setting(
	'recipes_blog_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'recipes_blog_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'recipes-blog' ),
		'section'  => 'recipes_blog_footer_options',
		'settings' => 'recipes_blog_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'recipes_blog_scroll_top',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'recipes-blog' ),
			'section' => 'recipes_blog_footer_options',
		)
	)
);
