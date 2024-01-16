<?php

/**
 * Single Post Options
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'recipes-blog' ),
		'panel' => 'recipes_blog_theme_options',
	)
);


// Post Options - Hide Date.
$wp_customize->add_setting(
	'recipes_blog_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'recipes-blog' ),
			'section' => 'recipes_blog_single_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'recipes_blog_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'recipes-blog' ),
			'section' => 'recipes_blog_single_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'recipes_blog_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'recipes-blog' ),
			'section' => 'recipes_blog_single_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'recipes_blog_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'recipes-blog' ),
			'section' => 'recipes_blog_single_post_options',
		)
	)
);
