<?php

/**
 * 404 page
 *
 * @package recipes_blog
 */


/*=========================================
404 Page
=========================================*/
$wp_customize->add_section(
	'404_pg_options', array(
		'title' => esc_html__( '404 Page', 'recipes-blog' ),
		'panel' => 'recipes_blog_theme_options',
	)
);

/*=========================================
404 Page
=========================================*/
$wp_customize->add_setting(
	'recipes_blog_pg_404_head_options'
		,array(
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_text',
	)
);

$wp_customize->add_control(
'recipes_blog_pg_404_head_options',
	array(
		'type' => 'hidden',
		'label' => __('404 Page','recipes-blog'),
		'section' => '404_pg_options',
	)
);

//  Title // 
$wp_customize->add_setting(
	'recipes_blog_pg_404_ttl',
	array(
        'default'			=> __('404 Page Not Found','recipes-blog'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'recipes_blog_pg_404_ttl',
	array(
	    'label'   => __('Title','recipes-blog'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Description // 
$wp_customize->add_setting(
	'recipes_blog_pg_404_text',
	array(
        'default'			=> __('Apologies, but the page you are seeking cannot be found.','recipes-blog'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'recipes_blog_pg_404_text',
	array(
	    'label'   => __('Description','recipes-blog'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Button Label // 
$wp_customize->add_setting(
	'recipes_blog_pg_404_btn_lbl',
	array(
        'default'			=> __('Go Back Home','recipes-blog'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'recipes_blog_pg_404_btn_lbl',
	array(
	    'label'   => __('Button Label','recipes-blog'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);


//  Link // 
$wp_customize->add_setting(
	'recipes_blog_pg_404_btn_link',
	array(
        'default'			=> esc_url( home_url( '/' )),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_url',
	)
);	

$wp_customize->add_control( 
	'recipes_blog_pg_404_btn_link',
	array(
	    'label'   => __('Link','recipes-blog'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);
