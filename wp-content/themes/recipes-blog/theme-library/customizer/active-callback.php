<?php

/**
 * Active Callbacks
 *
 * @package recipes_blog
 */

// Theme Options.
function recipes_blog_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'recipes_blog_enable_pagination' )->value() );
}
function recipes_blog_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'recipes_blog_enable_breadcrumb' )->value() );
}

// Header Options.
function recipes_blog_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'recipes_blog_enable_topbar' )->value() );
}

// Banner Slider Section.
function recipes_blog_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'recipes_blog_enable_banner_section' )->value() );
}
function recipes_blog_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'recipes_blog_banner_slider_content_type' )->value();
	return ( recipes_blog_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function recipes_blog_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'recipes_blog_banner_slider_content_type' )->value();
	return ( recipes_blog_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Product section.
function recipes_blog_is_menus_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'recipes_blog_enable_menus_section' )->value() );
}