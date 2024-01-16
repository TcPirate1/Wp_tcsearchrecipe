<?php

/**
 * Sidebar Position
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'recipes-blog' ),
		'panel' => 'recipes_blog_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'recipes_blog_sidebar_position',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'recipes_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'recipes-blog' ),
		'section' => 'recipes_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recipes-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'recipes-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recipes-blog' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'recipes_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'recipes_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'recipes-blog' ),
		'section' => 'recipes_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recipes-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'recipes-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recipes-blog' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'recipes_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'recipes_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'recipes_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'recipes-blog' ),
		'section' => 'recipes_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'recipes-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'recipes-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'recipes-blog' ),
		),
	)
);
