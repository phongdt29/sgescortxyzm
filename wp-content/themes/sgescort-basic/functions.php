<?php
/**
 * Theme functions for SG Escort Basic.
 *
 * @package sgescort-basic
 */

if ( ! function_exists( 'sgescort_basic_setup' ) ) {
	/**
	 * Basic theme supports.
	 */
	function sgescort_basic_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'sgescort-basic' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'sgescort_basic_setup' );

/**
 * Enqueue theme styles.
 */
function sgescort_basic_scripts() {
	wp_enqueue_style(
		'sgescort-basic-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'sgescort_basic_scripts' );

