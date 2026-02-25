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

/**
 * Register custom post types for managing homepage content.
 */
function sgescort_basic_register_cpts() {
	// Services.
	register_post_type(
		'sgescort_service',
		array(
			'labels'       => array(
				'name'          => __( 'Services', 'sgescort-basic' ),
				'singular_name' => __( 'Service', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Models (team).
	register_post_type(
		'sgescort_model',
		array(
			'labels'       => array(
				'name'          => __( 'Models', 'sgescort-basic' ),
				'singular_name' => __( 'Model', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// FAQ.
	register_post_type(
		'sgescort_faq',
		array(
			'labels'       => array(
				'name'          => __( 'FAQs', 'sgescort-basic' ),
				'singular_name' => __( 'FAQ', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'editor', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'sgescort_basic_register_cpts' );

/**
 * Extra fields for models (role and profile URL).
 */
function sgescort_basic_model_meta_boxes() {
	add_meta_box(
		'sgescort_model_meta',
		__( 'Model Details', 'sgescort-basic' ),
		'sgescort_basic_model_meta_box_html',
		'sgescort_model',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_model_meta_boxes' );

/**
 * Meta box HTML for model CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_model_meta_box_html( $post ) {
	wp_nonce_field( 'sgescort_model_meta_save', 'sgescort_model_meta_nonce' );

	$role        = get_post_meta( $post->ID, '_sgescort_model_role', true );
	$profile_url = get_post_meta( $post->ID, '_sgescort_model_profile_url', true );
	?>
	<p>
		<label for="sgescort_model_role"><?php esc_html_e( 'Role / Short title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_model_role" name="sgescort_model_role" class="widefat" value="<?php echo esc_attr( $role ); ?>">
	</p>
	<p>
		<label for="sgescort_model_profile_url"><?php esc_html_e( 'Profile URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_model_profile_url" name="sgescort_model_profile_url" class="widefat" value="<?php echo esc_attr( $profile_url ); ?>">
	</p>
	<?php
}

/**
 * Save model meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_model_meta( $post_id ) {
	if ( ! isset( $_POST['sgescort_model_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sgescort_model_meta_nonce'] ) ), 'sgescort_model_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sgescort_model' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	if ( isset( $_POST['sgescort_model_role'] ) ) {
		update_post_meta(
			$post_id,
			'_sgescort_model_role',
			sanitize_text_field( wp_unslash( $_POST['sgescort_model_role'] ) )
		);
	}

	if ( isset( $_POST['sgescort_model_profile_url'] ) ) {
		update_post_meta(
			$post_id,
			'_sgescort_model_profile_url',
			esc_url_raw( wp_unslash( $_POST['sgescort_model_profile_url'] ) )
		);
	}
}
add_action( 'save_post_sgescort_model', 'sgescort_basic_save_model_meta' );

