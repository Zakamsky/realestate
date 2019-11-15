<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define('ARS_THEME_ROOT', get_template_directory_uri());
define('ARS_CSS_DIR', ARS_THEME_ROOT . '/css');
define('ARS_JS_DIR', ARS_THEME_ROOT . '/js');
define('ARS_IMG_DIR', ARS_THEME_ROOT . '/img');

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', ARS_CSS_DIR . '/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'animate-styles', ARS_CSS_DIR . '/animate.min.css', array() );
		wp_enqueue_style( 'fancybox-styles', ARS_CSS_DIR . '/jquery.fancybox.min.css', array() );

		wp_enqueue_script( 'jquery' );
//        wp_deregister_script('jquery');
//        wp_enqueue_script( 'jquery', ARS_JS_DIR . '/jquery-3.4.1.min.js' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', ARS_JS_DIR . '/theme.min.js', array(), $js_version, true );
//		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//			wp_enqueue_script( 'comment-reply' );
//		}
        wp_deregister_script('wpp-jquery-fancybox');
        wp_deregister_style('wpp-jquery-fancybox-css');
//        wp_deregister_script('wpp-jquery-address');

//        wp_deregister_script('jquery-ui-slider');
//        wp_deregister_script('jquery-ui-mouse');
//        wp_deregister_script('jquery-ui-widget');

		wp_enqueue_script( 'fancybox-scripts', ARS_JS_DIR . '/jquery.fancybox.min.js', array(jquery), null, true );
		wp_enqueue_script( 'slick-scripts', ARS_JS_DIR . '/slick.min.js', array(jquery), null, true );
		wp_enqueue_script( 'wow-scripts', ARS_JS_DIR . '/wow.js', array(), null, true );

	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
