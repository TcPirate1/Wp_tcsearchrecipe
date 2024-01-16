<?php

/**
 * Post Options
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'recipes-blog' ),
		'panel' => 'recipes_blog_theme_options',
	)
);

// Post Options - Hide Feature Image.
$wp_customize->add_setting(
	'recipes_blog_post_hide_feature_image',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Hide Featured Image', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Hide Post Heading.
$wp_customize->add_setting(
	'recipes_blog_post_hide_post_heading',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Hide Post Heading', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Hide Post Content.
$wp_customize->add_setting(
	'recipes_blog_post_hide_post_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Hide Post Content', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'recipes_blog_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'recipes_blog_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'recipes_blog_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
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
			'section' => 'recipes_blog_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'recipes_blog_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'recipes-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'recipes_blog_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'recipes-blog' ),
		'section'  => 'recipes_blog_post_options',
		'settings' => 'recipes_blog_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'recipes_blog_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'recipes-blog' ),
			'section' => 'recipes_blog_post_options',
		)
	)
);
