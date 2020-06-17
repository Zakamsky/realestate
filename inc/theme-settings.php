<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_setup_theme_default_settings' ) ) {
	function understrap_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$understrap_posts_index_style = get_theme_mod( 'understrap_posts_index_style' );
		if ( '' == $understrap_posts_index_style ) {
			set_theme_mod( 'understrap_posts_index_style', 'default' );
		}

		// Sidebar position.
		$understrap_sidebar_position = get_theme_mod( 'understrap_sidebar_position' );
		if ( '' == $understrap_sidebar_position ) {
			set_theme_mod( 'understrap_sidebar_position', 'right' );
		}

		// Container width.
		$understrap_container_type = get_theme_mod( 'understrap_container_type' );
		if ( '' == $understrap_container_type ) {
			set_theme_mod( 'understrap_container_type', 'container' );
		}
	}
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Настройки главной страницы',
        'menu_title'	=> 'Главная страница',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
		'position'      => '3.33',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Настройки заголовков',
        'menu_title'	=> 'Заголовки',
        'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'titles-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Настройки преимуществ',
        'menu_title'	=> 'Преимущества',
        'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'advantages-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Контактные данные',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'contacts-settings',
    ));


}

function register_new_widgets(){
    register_sidebar( array(
        'name' => 'Страница недвижимости',
        'id' => 'property-sidebar',
        'description' => 'Выводиться под шапкой на страницах с шаблоном "Страница Недвижимости".',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'register_new_widgets' );
