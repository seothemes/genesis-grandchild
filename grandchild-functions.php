<?php
/**
 * Plugin Name: Genesis Grandchild
 * Description: Grandchild theme for the Genesis Framework built as a plugin.
 * Author: SEO Themes
 * Author URI: https://seothemes.net
 * Version: 0.1.0
 */

/**
 * Adds our new file with styles.
 */
function grandchild_add_styles() {
	wp_register_style( 'grandchild-style', plugins_url( 'grandchild-styles.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'grandchild-style' );
}
add_action( 'wp_print_styles', 'grandchild_add_styles' );


/**
 * Adds our new file with scripts.
 */
function grandchild_add_scripts() {
	wp_register_script( 'grandchild-script', plugins_url( 'grandchild-scripts.js', __FILE__ ), array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'grandchild-script' );
}
add_action( 'wp_print_scripts', 'grandchild_add_scripts' );

/**
 * Search for templates in plugin 'templates' dir, and load if exists.
 *
 * @param  string $template Template check.
 * @return string $template Template to use.
 */
function grandchild_template_include( $template ) {

	if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template ) ) ) {
		$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template );
	}
	return $template;
}
add_filter( 'template_include', 'grandchild_template_include', 11 );
