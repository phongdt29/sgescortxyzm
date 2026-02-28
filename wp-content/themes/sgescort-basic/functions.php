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
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 300,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
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
 * Fallback when no Primary menu is assigned in Admin.
 */
function sgescort_basic_primary_menu_fallback() {
	$items = array(
		array( '#home', __( 'Home', 'sgescort-basic' ) ),
		array( '#about', __( 'About', 'sgescort-basic' ) ),
		array( '#services', __( 'Services', 'sgescort-basic' ) ),
		array( '#portfolio', __( 'Portfolio', 'sgescort-basic' ) ),
		array( '#contact', __( 'Contact', 'sgescort-basic' ) ),
	);
	echo '<ul id="primary-menu" class="navbar-nav ms-auto">';
	foreach ( $items as $item ) {
		printf(
			'<li class="nav-item"><a class="nav-link" href="%1$s">%2$s</a></li>',
			esc_url( $item[0] ),
			esc_html( $item[1] )
		);
	}
	echo '</ul>';
}

/**
 * Add Bootstrap nav-item class to menu <li>.
 *
 * @param array $classes CSS classes.
 * @return array
 */
function sgescort_basic_nav_menu_css_class( $classes ) {
	$classes[] = 'nav-item';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'sgescort_basic_nav_menu_css_class' );

/**
 * Add Bootstrap nav-link class to menu <a>.
 *
 * @param array $atts Link attributes.
 * @return array
 */
function sgescort_basic_nav_menu_link_attributes( $atts ) {
	$atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' nav-link' : 'nav-link';
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'sgescort_basic_nav_menu_link_attributes' );

/**
 * Register footer widget areas.
 */
function sgescort_basic_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Column 1', 'sgescort-basic' ),
			'id'            => 'footer-1',
			'description'   => __( 'Footer left column (logo & icons).', 'sgescort-basic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-head">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 2', 'sgescort-basic' ),
			'id'            => 'footer-2',
			'description'   => __( 'Footer middle column (contact info).', 'sgescort-basic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-head">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 3', 'sgescort-basic' ),
			'id'            => 'footer-3',
			'description'   => __( 'Footer right column (about text).', 'sgescort-basic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-head">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Copyright', 'sgescort-basic' ),
			'id'            => 'footer-copyright',
			'description'   => __( 'Footer bottom bar (copyright text).', 'sgescort-basic' ),
			'before_widget' => '<div id="%1$s" class="copyright-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="screen-reader-text">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'sgescort-basic' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main sidebar. Shown on blog and single post when active.', 'sgescort-basic' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title h6">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'sgescort_basic_widgets_init' );

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

/**
 * Set post thumbnail (featured image) from a file in html/images/.
 *
 * @param int    $post_id    Post ID.
 * @param string $image_name File name (e.g. s2.jpg).
 * @return int|false Attachment ID on success, false on failure.
 */
function sgescort_basic_set_post_thumbnail_from_file( $post_id, $image_name ) {
	$base_paths = array(
		ABSPATH . 'html/images/' . $image_name,
		dirname( ABSPATH ) . '/html/images/' . $image_name,
	);

	$source_path = null;
	foreach ( $base_paths as $path ) {
		if ( file_exists( $path ) && is_readable( $path ) ) {
			$source_path = $path;
			break;
		}
	}

	if ( ! $source_path ) {
		return false;
	}

	$file_content = file_get_contents( $source_path );
	if ( false === $file_content ) {
		return false;
	}

	$upload = wp_upload_bits( $image_name, null, $file_content );
	if ( ! empty( $upload['error'] ) ) {
		return false;
	}

	$mime_type = wp_check_filetype( $upload['file'], null );
	if ( empty( $mime_type['type'] ) ) {
		$mime_type['type'] = 'image/jpeg';
	}

	$attach_id = wp_insert_attachment(
		array(
			'post_mime_type' => $mime_type['type'],
			'post_title'     => sanitize_file_name( pathinfo( $image_name, PATHINFO_FILENAME ) ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$upload['file'],
		$post_id
	);

	if ( is_wp_error( $attach_id ) ) {
		return false;
	}

	$meta = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
	if ( is_array( $meta ) ) {
		wp_update_attachment_metadata( $attach_id, $meta );
	}

	set_post_thumbnail( $post_id, $attach_id );
	return $attach_id;
}

/**
 * Insert demo news posts (runs once on theme activation).
 */
function sgescort_basic_insert_demo_news() {
	if ( get_option( 'sgescort_basic_demo_news_inserted', false ) ) {
		return;
	}

	$demo_posts = array(
		array(
			'title'   => 'New Premium Models Join Singapore Escort Hub This Month',
			'excerpt' => 'We are pleased to welcome several new premium companions to our roster. All profiles are verified and ready for booking via Telegram.',
			'content' => '<p>Singapore Escort Hub continues to expand its selection of verified, professional companions. This month we have added new models who specialize in girlfriend experience, dinner dates, and travel companionship.</p><p>All new profiles are available on our main website and can be contacted through our 24/7 Telegram support. Booking remains discreet and straightforward.</p>',
			'date'    => '2025-02-20',
			'image'   => 's2.jpg',
		),
		array(
			'title'   => '24/7 Booking Support Now Available in English & Chinese',
			'excerpt' => 'Our customer service team now offers round-the-clock support in both English and Mandarin for easier booking and inquiries.',
			'content' => '<p>To better serve our clients from Singapore and across the region, we have extended our support hours to 24/7. You can reach us via Telegram in English or Chinese (中文) for bookings, questions about services, or general inquiries.</p><p>We welcome Chinese-speaking guests and many of our companions are fluent in Mandarin.</p>',
			'date'    => '2025-02-18',
			'image'   => 's3.jpg',
		),
		array(
			'title'   => 'Outcall & Hotel Service: What You Need to Know',
			'excerpt' => 'A quick guide to booking outcall and hotel visits with our Singapore escorts. Discreet, professional, and easy to arrange.',
			'content' => '<p>Most of our Singapore escorts offer outcall services to your hotel or private address. When booking, simply provide your location (hotel name or address) and your preferred time. Our team will confirm availability and arrange the visit.</p><p>Outcall is one of the most requested services on our platform. All visits are discreet and professional.</p>',
			'date'    => '2025-02-15',
			'image'   => 's4.jpg',
		),
		array(
			'title'   => 'GFE & Companion Services: A Brief Overview',
			'excerpt' => 'Girlfriend experience and companion services are among our most popular offerings. Here is a short overview of what to expect.',
			'content' => '<p>Our girlfriend experience (GFE) and companion services are designed to provide a natural, intimate, and emotionally connected experience. Many clients choose these options for dinner dates, events, or travel companionship.</p><p>Each companion has her own style and preferences. Browse profiles on SG Escort Hub and contact us via Telegram to find the best match.</p>',
			'date'    => '2025-02-12',
			'image'   => 's5.jpg',
		),
		array(
			'title'   => 'Privacy & Discretion: Our Commitment to Clients',
			'excerpt' => 'Your privacy is our priority. We do not store or share your personal data. All bookings are handled with full discretion.',
			'content' => '<p>Singapore Escort Hub is committed to 100% discretion. We do not save your personal information or share details with any third parties. All communication and bookings are treated as confidential.</p><p>You can book with confidence knowing that your privacy is protected at every step.</p>',
			'date'    => '2025-02-10',
			'image'   => 's6.jpg',
		),
		array(
			'title'   => 'How to Book: Step-by-Step Guide for New Clients',
			'excerpt' => 'New to our platform? Follow this simple guide to browse profiles, choose your companion, and complete your booking via Telegram.',
			'content' => '<p>Booking with Singapore Escort Hub is simple. First, browse our website or Telegram channel to view verified profiles. Choose the companion and type of service you prefer, then contact our team via Telegram with your preferred date and time.</p><p>Our support staff are available 24/7 to answer questions and confirm your booking. We look forward to serving you.</p>',
			'date'    => '2025-02-08',
			'image'   => 's7.jpg',
		),
	);

	require_once ABSPATH . 'wp-admin/includes/image.php';

	foreach ( $demo_posts as $post_data ) {
		$post_id = wp_insert_post(
			array(
				'post_title'   => $post_data['title'],
				'post_content' => $post_data['content'],
				'post_excerpt' => $post_data['excerpt'],
				'post_status'  => 'publish',
				'post_type'    => 'post',
				'post_author'  => 1,
				'post_date'    => $post_data['date'] . ' 10:00:00',
			)
		);

		if ( $post_id && ! is_wp_error( $post_id ) && ! empty( $post_data['image'] ) ) {
			sgescort_basic_set_post_thumbnail_from_file( $post_id, $post_data['image'] );
		}
	}

	update_option( 'sgescort_basic_demo_news_inserted', true );
}

add_action( 'after_switch_theme', 'sgescort_basic_insert_demo_news' );

// Insert demo news on first load if theme was already active (option not set).
add_action( 'init', 'sgescort_basic_maybe_insert_demo_news' );
function sgescort_basic_maybe_insert_demo_news() {
	if ( get_option( 'sgescort_basic_demo_news_inserted', false ) ) {
		return;
	}
	// Run only once per request and only in front-end to avoid duplicate inserts.
	if ( ! is_admin() && ! wp_doing_ajax() ) {
		sgescort_basic_insert_demo_news();
	}
}

