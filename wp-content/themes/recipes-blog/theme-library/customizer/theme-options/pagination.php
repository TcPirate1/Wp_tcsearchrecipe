<?php

/**
 * Pagination
 *
 * @package recipes_blog
 */

$wp_customize->add_section(
	'recipes_blog_pagination',
	array(
		'panel' => 'recipes_blog_theme_options',
		'title' => esc_html__( 'Pagination', 'recipes-blog' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'recipes_blog_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'recipes_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Recipes_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'recipes_blog_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'recipes-blog' ),
			'section'  => 'recipes_blog_pagination',
			'settings' => 'recipes_blog_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'recipes_blog_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'recipes_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'recipes_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'recipes-blog' ),
		'section'         => 'recipes_blog_pagination',
		'settings'        => 'recipes_blog_pagination_type',
		'active_callback' => 'recipes_blog_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'recipes-blog' ),
			'numeric' => __( 'Numeric', 'recipes-blog' ),
		),
	)
);
