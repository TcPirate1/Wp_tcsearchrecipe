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
	// column // 
$wp_customize->add_setting(
	'recipes_blog_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'recipes_blog_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'recipes_blog_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','recipes-blog'),
	    'section' 		=> 'recipes_blog_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'recipes-blog' ),
			'1' => __( '1 Column', 'recipes-blog' ),
			'2' => __( '2 Column', 'recipes-blog' ),
			'3' => __( '3 Column', 'recipes-blog' ),
			'4' => __( '4 Column', 'recipes-blog' )
		) 
	) 
);
//  Image // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#1f1f1f',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'recipes-blog'),
    'section' => 'recipes_blog_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'recipes-blog'),
    'section' => 'recipes_blog_footer_options',
)));
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

// icon // 
$wp_customize->add_setting(
	'recipes_blog_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Aster_Change_Icon_Control($wp_customize, 
	'recipes_blog_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','recipes-blog'),
	    'section' 		=> 'recipes_blog_footer_options',
		'iconset' => 'fa',
	))  
);