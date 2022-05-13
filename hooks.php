<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

remove_action( 'understrap_site_info', "understrap_add_site_info");

if ( ! function_exists( 'sjiekenschattig_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function sjiekenschattig_site_info() {
		do_action( 'sjiekenschattig_site_info' );
	}
}

add_action( 'sjiekenschattig_site_info', 'sjiekenschattig_add_site_info' );
if ( ! function_exists( 'sjiekenschattig_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function sjiekenschattig_add_site_info() {
		$the_theme = wp_get_theme();
		$copyYear = 2021;
		$currentYear = date('Y');
		$url = esc_url(get_site_url());
		$name = get_bloginfo( 'name' );

		$site_info = sprintf( '<a href="%s">Copyright © %s-%s %s</a>', 
		$url, $copyYear, $currentYear, $name, );

		// Check if customizer site info has value.
		if ( get_theme_mod( 'understrap_site_info_override' ) ) {
			$site_info = get_theme_mod( 'understrap_site_info_override' );
		}
		echo apply_filters( 'sjiekenschattig_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

