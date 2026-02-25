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

	// External CSS libraries.
	wp_enqueue_style(
		'sgescort-bootstrap',
		'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css',
		array(),
		'5.3.0'
	);

	wp_enqueue_style(
		'sgescort-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);

	wp_enqueue_style(
		'sgescort-poppins',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	// Custom static HTML CSS (kept in /html/css/style.css).
	wp_enqueue_style(
		'sgescort-html-style',
		home_url( '/html/css/style.css' ),
		array( 'sgescort-bootstrap', 'sgescort-fontawesome', 'sgescort-poppins' ),
		null
	);

	// JS libraries and custom scripts.
	wp_enqueue_script(
		'sgescort-bootstrap',
		home_url( '/html/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js' ),
		array(),
		'5.3.0',
		true
	);

	wp_enqueue_script(
		'sgescort-main',
		home_url( '/html/js/main.js' ),
		array( 'sgescort-bootstrap' ),
		null,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sgescort_basic_scripts' );

