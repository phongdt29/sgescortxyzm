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

	// Hero.
	register_post_type(
		'sgescort_hero',
		array(
			'labels'       => array(
				'name'          => __( 'Hero Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Hero Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// About.
	register_post_type(
		'sgescort_about',
		array(
			'labels'       => array(
				'name'          => __( 'About Sections', 'sgescort-basic' ),
				'singular_name' => __( 'About Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Services Section.
	register_post_type(
		'sge_services',
		array(
			'labels'       => array(
				'name'          => __( 'Services Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Services Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Team Section.
	register_post_type(
		'sge_team',
		array(
			'labels'       => array(
				'name'          => __( 'Team Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Team Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Portfolio Section.
	register_post_type(
		'sge_portfolio',
		array(
			'labels'        => array(
				'name'          => __( 'Portfolio Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Portfolio Section', 'sgescort-basic' ),
			),
			'public'        => true,
			'show_in_menu'  => true,
			'supports'      => array( 'title', 'custom-fields', 'page-attributes' ),
			'has_archive'   => false,
			'show_in_rest'  => false,
		)
	);

	// FAQ Section.
	register_post_type(
		'sgescort_faq_section',
		array(
			'labels'       => array(
				'name'          => __( 'FAQ Sections', 'sgescort-basic' ),
				'singular_name' => __( 'FAQ Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// News Section.
	register_post_type(
		'sge_news',
		array(
			'labels'       => array(
				'name'          => __( 'News Sections', 'sgescort-basic' ),
				'singular_name' => __( 'News Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Counter Section.
	register_post_type(
		'sge_counter',
		array(
			'labels'       => array(
				'name'          => __( 'Counter Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Counter Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Banner Section.
	register_post_type(
		'sge_banner',
		array(
			'labels'       => array(
				'name'          => __( 'Banner Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Banner Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);

	// Testimonials Section.
	register_post_type(
		'sge_testimonials',
		array(
			'labels'       => array(
				'name'          => __( 'Testimonials Sections', 'sgescort-basic' ),
				'singular_name' => __( 'Testimonials Section', 'sgescort-basic' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => array( 'title', 'page-attributes' ),
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
 * Meta box for Hero Section.
 */
function sgescort_basic_hero_meta_boxes() {
	add_meta_box(
		'sgescort_hero_meta',
		__( 'Hero Details', 'sgescort-basic' ),
		'sgescort_basic_hero_meta_box_html',
		'sgescort_hero',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_hero_meta_boxes' );

/**
 * Meta box for About Section.
 */
function sgescort_basic_about_meta_boxes() {
	add_meta_box(
		'sgescort_about_meta',
		__( 'About Details', 'sgescort-basic' ),
		'sgescort_basic_about_meta_box_html',
		'sgescort_about',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_about_meta_boxes' );

/**
 * Meta box for Services Section.
 */
function sgescort_basic_services_section_meta_boxes() {
	add_meta_box(
		'sge_services_meta',
		__( 'Services Section Details', 'sgescort-basic' ),
		'sgescort_basic_services_section_meta_box_html',
		'sge_services',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_services_section_meta_boxes' );

/**
 * Meta box for Team Section.
 */
function sgescort_basic_team_section_meta_boxes() {
	add_meta_box(
		'sge_team_meta',
		__( 'Team Section Details', 'sgescort-basic' ),
		'sgescort_basic_team_section_meta_box_html',
		'sge_team',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_team_section_meta_boxes' );

/**
 * Meta box for Portfolio Section.
 */
function sgescort_basic_portfolio_section_meta_boxes() {
	add_meta_box(
		'sge_portfolio_meta',
		__( 'Portfolio Section Details', 'sgescort-basic' ),
		'sgescort_basic_portfolio_section_meta_box_html',
		'sge_portfolio',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_portfolio_section_meta_boxes' );

/**
 * Remove post format metabox from all sgescort section CPTs to prevent
 * "Định dạng bài viết không hợp lệ" error in wp-admin.
 */
function sgescort_basic_remove_format_metaboxes() {
	$cpts = array(
		'sge_portfolio',
		'sge_services',
		'sge_team',
		'sgescort_faq_section',
		'sge_news',
		'sge_counter',
		'sge_banner',
		'sge_testimonials',
		'sgescort_hero',
		'sgescort_about',
	);
	foreach ( $cpts as $cpt ) {
		remove_meta_box( 'formatdiv', $cpt, 'side' );
	}
}
add_action( 'add_meta_boxes', 'sgescort_basic_remove_format_metaboxes', 99 );

/**
 * Meta box for FAQ Section.
 */
function sgescort_basic_faq_section_meta_boxes() {
	add_meta_box(
		'sgescort_faq_section_meta',
		__( 'FAQ Section Details', 'sgescort-basic' ),
		'sgescort_basic_faq_section_meta_box_html',
		'sgescort_faq_section',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_faq_section_meta_boxes' );

/**
 * Meta box for News Section.
 */
function sgescort_basic_news_section_meta_boxes() {
	add_meta_box(
		'sge_news_meta',
		__( 'News Section Details', 'sgescort-basic' ),
		'sgescort_basic_news_section_meta_box_html',
		'sge_news',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_news_section_meta_boxes' );

/**
 * Meta box for Counter Section.
 */
function sgescort_basic_counter_section_meta_boxes() {
	add_meta_box(
		'sge_counter_meta',
		__( 'Counter Section Details', 'sgescort-basic' ),
		'sgescort_basic_counter_section_meta_box_html',
		'sge_counter',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_counter_section_meta_boxes' );

function sgescort_basic_banner_section_meta_boxes() {
	add_meta_box(
		'sge_banner_meta',
		__( 'Banner Section Details', 'sgescort-basic' ),
		'sgescort_basic_banner_section_meta_box_html',
		'sge_banner',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_banner_section_meta_boxes' );

function sgescort_basic_testimonials_section_meta_boxes() {
	add_meta_box(
		'sge_testimonials_meta',
		__( 'Testimonials Section Details', 'sgescort-basic' ),
		'sgescort_basic_testimonials_section_meta_box_html',
		'sge_testimonials',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sgescort_basic_testimonials_section_meta_boxes' );

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
 * Meta box HTML for hero CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_hero_meta_box_html( $post ) {
	wp_nonce_field( 'sgescort_hero_meta_save', 'sgescort_hero_meta_nonce' );

	$title1 = get_post_meta( $post->ID, '_sgescort_hero_title1', true );
	$title2 = get_post_meta( $post->ID, '_sgescort_hero_title2', true );
	$button1_text = get_post_meta( $post->ID, '_sgescort_hero_button1_text', true );
	$button1_url = get_post_meta( $post->ID, '_sgescort_hero_button1_url', true );
	$button2_text = get_post_meta( $post->ID, '_sgescort_hero_button2_text', true );
	$button2_url = get_post_meta( $post->ID, '_sgescort_hero_button2_url', true );
	?>
	<p>
		<label for="sgescort_hero_title1"><?php esc_html_e( 'Hero Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_hero_title1" name="sgescort_hero_title1" class="widefat" value="<?php echo esc_attr( $title1 ); ?>" placeholder="#1 Best Directory Singapore (SG)">
	</p>
	<p>
		<label for="sgescort_hero_title2"><?php esc_html_e( 'Hero Main Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_hero_title2" name="sgescort_hero_title2" class="widefat" value="<?php echo esc_attr( $title2 ); ?>" placeholder="Singapore Escort Hub">
	</p>
	<p>
		<label for="sgescort_hero_button1_text"><?php esc_html_e( 'Button 1 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_hero_button1_text" name="sgescort_hero_button1_text" class="widefat" value="<?php echo esc_attr( $button1_text ); ?>" placeholder="Visit SGESCORTHUB.COM">
	</p>
	<p>
		<label for="sgescort_hero_button1_url"><?php esc_html_e( 'Button 1 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_hero_button1_url" name="sgescort_hero_button1_url" class="widefat" value="<?php echo esc_attr( $button1_url ); ?>" placeholder="https://sgescorthub.com/">
	</p>
	<p>
		<label for="sgescort_hero_button2_text"><?php esc_html_e( 'Button 2 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_hero_button2_text" name="sgescort_hero_button2_text" class="widefat" value="<?php echo esc_attr( $button2_text ); ?>" placeholder="Visit Telegram">
	</p>
	<p>
		<label for="sgescort_hero_button2_url"><?php esc_html_e( 'Button 2 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_hero_button2_url" name="sgescort_hero_button2_url" class="widefat" value="<?php echo esc_attr( $button2_url ); ?>" placeholder="https://t.me/+qQYECOoAHgZhNzU1">
	</p>
	<?php
}

/**
 * Meta box HTML for about CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_about_meta_box_html( $post ) {
	wp_nonce_field( 'sgescort_about_meta_save', 'sgescort_about_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sgescort_about_subtitle', true );
	$title = get_post_meta( $post->ID, '_sgescort_about_title', true );
	$button1_text = get_post_meta( $post->ID, '_sgescort_about_button1_text', true );
	$button1_url = get_post_meta( $post->ID, '_sgescort_about_button1_url', true );
	$button2_text = get_post_meta( $post->ID, '_sgescort_about_button2_text', true );
	$button2_url = get_post_meta( $post->ID, '_sgescort_about_button2_url', true );
	$image = get_post_meta( $post->ID, '_sgescort_about_image', true );
	?>
	<p>
		<label for="sgescort_about_subtitle"><?php esc_html_e( 'About Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_about_subtitle" name="sgescort_about_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="About Us">
	</p>
	<p>
		<label for="sgescort_about_title"><?php esc_html_e( 'About Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_about_title" name="sgescort_about_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="About Singapore Escort Hub">
	</p>
	<p>
		<label for="sgescort_about_button1_text"><?php esc_html_e( 'Button 1 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_about_button1_text" name="sgescort_about_button1_text" class="widefat" value="<?php echo esc_attr( $button1_text ); ?>" placeholder="Visit">
	</p>
	<p>
		<label for="sgescort_about_button1_url"><?php esc_html_e( 'Button 1 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_about_button1_url" name="sgescort_about_button1_url" class="widefat" value="<?php echo esc_attr( $button1_url ); ?>" placeholder="https://sgescorthub.com/">
	</p>
	<p>
		<label for="sgescort_about_button2_text"><?php esc_html_e( 'Button 2 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_about_button2_text" name="sgescort_about_button2_text" class="widefat" value="<?php echo esc_attr( $button2_text ); ?>" placeholder="Join Telegram">
	</p>
	<p>
		<label for="sgescort_about_button2_url"><?php esc_html_e( 'Button 2 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_about_button2_url" name="sgescort_about_button2_url" class="widefat" value="<?php echo esc_attr( $button2_url ); ?>" placeholder="https://t.me/+qQYECOoAHgZhNzU1">
	</p>
	<p>
		<label for="sgescort_about_image"><?php esc_html_e( 'About Image URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_about_image" name="sgescort_about_image" class="widefat" value="<?php echo esc_attr( $image ); ?>" placeholder="https://example.com/image.jpg">
	</p>
	<?php
}

/**
 * Meta box HTML for services section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_services_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_services_meta_save', 'sge_services_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sge_services_subtitle', true );
	$title = get_post_meta( $post->ID, '_sge_services_title', true );
	?>
	<p>
		<label for="sge_services_subtitle"><?php esc_html_e( 'Services Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_services_subtitle" name="sge_services_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="Services">
	</p>
	<p>
		<label for="sge_services_title"><?php esc_html_e( 'Services Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_services_title" name="sge_services_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="Our Singapore Escort Hub Services">
	</p>
	<?php
}

/**
 * Meta box HTML for team section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_team_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_team_meta_save', 'sge_team_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sge_team_subtitle', true );
	$title = get_post_meta( $post->ID, '_sge_team_title', true );
	?>
	<p>
		<label for="sge_team_subtitle"><?php esc_html_e( 'Team Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_team_subtitle" name="sge_team_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="TOP Models">
	</p>
	<p>
		<label for="sge_team_title"><?php esc_html_e( 'Team Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_team_title" name="sge_team_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="Meet Our Models">
	</p>
	<?php
}

/**
 * Meta box HTML for portfolio section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_portfolio_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_portfolio_meta_save', 'sge_portfolio_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sge_portfolio_subtitle', true );
	$title = get_post_meta( $post->ID, '_sge_portfolio_title', true );
	?>
	<p>
		<label for="sge_portfolio_subtitle"><?php esc_html_e( 'Portfolio Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_portfolio_subtitle" name="sge_portfolio_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="Gallery">
	</p>
	<p>
		<label for="sge_portfolio_title"><?php esc_html_e( 'Portfolio Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_portfolio_title" name="sge_portfolio_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="SG SCORT HUB PORTFOLIO">
	</p>
	<?php
}

/**
 * Meta box HTML for faq section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_faq_section_meta_box_html( $post ) {
	wp_nonce_field( 'sgescort_faq_section_meta_save', 'sgescort_faq_section_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sgescort_faq_section_subtitle', true );
	$title = get_post_meta( $post->ID, '_sgescort_faq_section_title', true );
	?>
	<p>
		<label for="sgescort_faq_section_subtitle"><?php esc_html_e( 'FAQ Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_faq_section_subtitle" name="sgescort_faq_section_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="FAQ">
	</p>
	<p>
		<label for="sgescort_faq_section_title"><?php esc_html_e( 'FAQ Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_faq_section_title" name="sgescort_faq_section_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="Frequently Asked Questions">
	</p>
	<?php
}

/**
 * Meta box HTML for news section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_news_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_news_meta_save', 'sge_news_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sge_news_subtitle', true );
	$title = get_post_meta( $post->ID, '_sge_news_title', true );
	?>
	<p>
		<label for="sge_news_subtitle"><?php esc_html_e( 'News Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_news_subtitle" name="sge_news_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="News">
	</p>
	<p>
		<label for="sge_news_title"><?php esc_html_e( 'News Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sge_news_title" name="sge_news_title" class="widefat" value="<?php echo esc_attr( $title ); ?>" placeholder="Latest News & Updates">
	</p>
	<?php
}

/**
 * Meta box HTML for counter section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_counter_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_counter_meta_save', 'sge_counter_meta_nonce' );

	$counter1_value = get_post_meta( $post->ID, '_sgescort_counter1_value', true );
	$counter1_label = get_post_meta( $post->ID, '_sgescort_counter1_label', true );
	$counter2_value = get_post_meta( $post->ID, '_sgescort_counter2_value', true );
	$counter2_label = get_post_meta( $post->ID, '_sgescort_counter2_label', true );
	$counter3_value = get_post_meta( $post->ID, '_sgescort_counter3_value', true );
	$counter3_label = get_post_meta( $post->ID, '_sgescort_counter3_label', true );
	$counter4_value = get_post_meta( $post->ID, '_sgescort_counter4_value', true );
	$counter4_label = get_post_meta( $post->ID, '_sgescort_counter4_label', true );
	?>
	<p>
		<label for="sgescort_counter1_value"><?php esc_html_e( 'Counter 1 Value', 'sgescort-basic' ); ?></label><br>
		<input type="number" id="sgescort_counter1_value" name="sgescort_counter1_value" class="widefat" value="<?php echo esc_attr( $counter1_value ?: '100' ); ?>" placeholder="100">
	</p>
	<p>
		<label for="sgescort_counter1_label"><?php esc_html_e( 'Counter 1 Label', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_counter1_label" name="sgescort_counter1_label" class="widefat" value="<?php echo esc_attr( $counter1_label ?: 'Popular Models' ); ?>" placeholder="Popular Models">
	</p>
	<p>
		<label for="sgescort_counter2_value"><?php esc_html_e( 'Counter 2 Value', 'sgescort-basic' ); ?></label><br>
		<input type="number" id="sgescort_counter2_value" name="sgescort_counter2_value" class="widefat" value="<?php echo esc_attr( $counter2_value ?: '200' ); ?>" placeholder="200">
	</p>
	<p>
		<label for="sgescort_counter2_label"><?php esc_html_e( 'Counter 2 Label', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_counter2_label" name="sgescort_counter2_label" class="widefat" value="<?php echo esc_attr( $counter2_label ?: 'Total Models' ); ?>" placeholder="Total Models">
	</p>
	<p>
		<label for="sgescort_counter3_value"><?php esc_html_e( 'Counter 3 Value', 'sgescort-basic' ); ?></label><br>
		<input type="number" id="sgescort_counter3_value" name="sgescort_counter3_value" class="widefat" value="<?php echo esc_attr( $counter3_value ?: '5' ); ?>" placeholder="5">
	</p>
	<p>
		<label for="sgescort_counter3_label"><?php esc_html_e( 'Counter 3 Label', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_counter3_label" name="sgescort_counter3_label" class="widefat" value="<?php echo esc_attr( $counter3_label ?: 'Areas' ); ?>" placeholder="Areas">
	</p>
	<p>
		<label for="sgescort_counter4_value"><?php esc_html_e( 'Counter 4 Value', 'sgescort-basic' ); ?></label><br>
		<input type="number" id="sgescort_counter4_value" name="sgescort_counter4_value" class="widefat" value="<?php echo esc_attr( $counter4_value ?: '15000' ); ?>" placeholder="15000">
	</p>
	<p>
		<label for="sgescort_counter4_label"><?php esc_html_e( 'Counter 4 Label', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_counter4_label" name="sgescort_counter4_label" class="widefat" value="<?php echo esc_attr( $counter4_label ?: 'Followers' ); ?>" placeholder="Followers">
	</p>
	<?php
}

/**
 * Meta box HTML for banner section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_banner_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_banner_meta_save', 'sge_banner_meta_nonce' );

	$title = get_post_meta( $post->ID, '_sgescort_banner_title', true );
	$button1_text = get_post_meta( $post->ID, '_sgescort_banner_button1_text', true );
	$button1_url = get_post_meta( $post->ID, '_sgescort_banner_button1_url', true );
	$button2_text = get_post_meta( $post->ID, '_sgescort_banner_button2_text', true );
	$button2_url = get_post_meta( $post->ID, '_sgescort_banner_button2_url', true );
	?>
	<p>
		<label for="sgescort_banner_title"><?php esc_html_e( 'Banner Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_banner_title" name="sgescort_banner_title" class="widefat" value="<?php echo esc_attr( $title ?: 'Elevate Your Experience, Every Moment.' ); ?>" placeholder="Elevate Your Experience, Every Moment.">
	</p>
	<p>
		<label for="sgescort_banner_button1_text"><?php esc_html_e( 'Button 1 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_banner_button1_text" name="sgescort_banner_button1_text" class="widefat" value="<?php echo esc_attr( $button1_text ?: 'Visit SGESCORTHUB.COM' ); ?>" placeholder="Visit SGESCORTHUB.COM">
	</p>
	<p>
		<label for="sgescort_banner_button1_url"><?php esc_html_e( 'Button 1 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_banner_button1_url" name="sgescort_banner_button1_url" class="widefat" value="<?php echo esc_attr( $button1_url ?: 'https://sgescorthub.com/' ); ?>" placeholder="https://sgescorthub.com/">
	</p>
	<p>
		<label for="sgescort_banner_button2_text"><?php esc_html_e( 'Button 2 Text', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_banner_button2_text" name="sgescort_banner_button2_text" class="widefat" value="<?php echo esc_attr( $button2_text ?: 'Visit 新加坡小姐网 Telegram' ); ?>" placeholder="Visit 新加坡小姐网 Telegram">
	</p>
	<p>
		<label for="sgescort_banner_button2_url"><?php esc_html_e( 'Button 2 URL', 'sgescort-basic' ); ?></label><br>
		<input type="url" id="sgescort_banner_button2_url" name="sgescort_banner_button2_url" class="widefat" value="<?php echo esc_attr( $button2_url ?: 'https://t.me/+qQYECOoAHgZhNzU1' ); ?>" placeholder="https://t.me/+qQYECOoAHgZhNzU1">
	</p>
	<?php
}

/**
 * Meta box HTML for testimonials section CPT.
 *
 * @param WP_Post $post Current post.
 */
function sgescort_basic_testimonials_section_meta_box_html( $post ) {
	wp_nonce_field( 'sge_testimonials_meta_save', 'sge_testimonials_meta_nonce' );

	$subtitle = get_post_meta( $post->ID, '_sgescort_testimonials_subtitle', true );
	$title = get_post_meta( $post->ID, '_sgescort_testimonials_title', true );
	$description = get_post_meta( $post->ID, '_sgescort_testimonials_description', true );
	$testimonial_text = get_post_meta( $post->ID, '_sgescort_testimonial_text', true );
	$client_name = get_post_meta( $post->ID, '_sgescort_client_name', true );
	$client_role = get_post_meta( $post->ID, '_sgescort_client_role', true );
	?>
	<p>
		<label for="sgescort_testimonials_subtitle"><?php esc_html_e( 'Section Subtitle', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_testimonials_subtitle" name="sgescort_testimonials_subtitle" class="widefat" value="<?php echo esc_attr( $subtitle ?: 'Testimonials' ); ?>" placeholder="Testimonials">
	</p>
	<p>
		<label for="sgescort_testimonials_title"><?php esc_html_e( 'Section Title', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_testimonials_title" name="sgescort_testimonials_title" class="widefat" value="<?php echo esc_attr( $title ?: 'What Our Clients Say' ); ?>" placeholder="What Our Clients Say">
	</p>
	<p>
		<label for="sgescort_testimonials_description"><?php esc_html_e( 'Description', 'sgescort-basic' ); ?></label><br>
		<textarea id="sgescort_testimonials_description" name="sgescort_testimonials_description" class="widefat" rows="4" placeholder="An Escort Agency is a professional service provider..."><?php echo esc_textarea( $description ?: 'An Escort Agency is a professional service provider that offers companionship and social support for clients in various settings. These services may include attending social events, business meetings, private gatherings, or accompanying clients on travel arrangements. Outstanding service! The companion was elegant, professional, and made my evening unforgettable.' ); ?></textarea>
	</p>
	<p>
		<label for="sgescort_testimonial_text"><?php esc_html_e( 'Testimonial Text', 'sgescort-basic' ); ?></label><br>
		<textarea id="sgescort_testimonial_text" name="sgescort_testimonial_text" class="widefat" rows="3" placeholder="Singapore Escort Hub is Perfect match!..."><?php echo esc_textarea( $testimonial_text ?: '"Singapore Escort Hub is Perfect match! They understood my preferences and delivered beyond expectations."' ); ?></textarea>
	</p>
	<p>
		<label for="sgescort_client_name"><?php esc_html_e( 'Client Name', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_client_name" name="sgescort_client_name" class="widefat" value="<?php echo esc_attr( $client_name ?: 'Jennifer Liu' ); ?>" placeholder="Jennifer Liu">
	</p>
	<p>
		<label for="sgescort_client_role"><?php esc_html_e( 'Client Role', 'sgescort-basic' ); ?></label><br>
		<input type="text" id="sgescort_client_role" name="sgescort_client_role" class="widefat" value="<?php echo esc_attr( $client_role ?: 'General customer' ); ?>" placeholder="General customer">
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
 * Save hero meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_hero_meta( $post_id ) {
	if ( ! isset( $_POST['sgescort_hero_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sgescort_hero_meta_nonce'] ) ), 'sgescort_hero_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sgescort_hero' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_hero_title1',
		'sgescort_hero_title2',
		'sgescort_hero_button1_text',
		'sgescort_hero_button1_url',
		'sgescort_hero_button2_text',
		'sgescort_hero_button2_url',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = wp_unslash( $_POST[ $field ] );
			if ( strpos( $field, '_url' ) !== false ) {
				$value = esc_url_raw( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sgescort_hero', 'sgescort_basic_save_hero_meta' );

/**
 * Save about meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_about_meta( $post_id ) {
	if ( ! isset( $_POST['sgescort_about_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sgescort_about_meta_nonce'] ) ), 'sgescort_about_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sgescort_about' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_about_subtitle',
		'sgescort_about_title',
		'sgescort_about_button1_text',
		'sgescort_about_button1_url',
		'sgescort_about_button2_text',
		'sgescort_about_button2_url',
		'sgescort_about_image',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = wp_unslash( $_POST[ $field ] );
			if ( strpos( $field, '_url' ) !== false ) {
				$value = esc_url_raw( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sgescort_about', 'sgescort_basic_save_about_meta' );

/**
 * Save services section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_services_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_services_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_services_meta_nonce'] ) ), 'sge_services_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_services' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sge_services_subtitle',
		'sge_services_title',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_services', 'sgescort_basic_save_services_section_meta' );

/**
 * Save team section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_team_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_team_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_team_meta_nonce'] ) ), 'sge_team_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_team' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sge_team_subtitle',
		'sge_team_title',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_team', 'sgescort_basic_save_team_section_meta' );

/**
 * Save portfolio section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_portfolio_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_portfolio_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_portfolio_meta_nonce'] ) ), 'sge_portfolio_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_portfolio' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sge_portfolio_subtitle',
		'sge_portfolio_title',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_portfolio', 'sgescort_basic_save_portfolio_section_meta' );

/**
 * Save faq section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_faq_section_meta( $post_id ) {
	if ( ! isset( $_POST['sgescort_faq_section_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sgescort_faq_section_meta_nonce'] ) ), 'sgescort_faq_section_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sgescort_faq_section' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_faq_section_subtitle',
		'sgescort_faq_section_title',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sgescort_faq_section', 'sgescort_basic_save_faq_section_meta' );

/**
 * Save news section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_news_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_news_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_news_meta_nonce'] ) ), 'sge_news_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_news' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sge_news_subtitle',
		'sge_news_title',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_news', 'sgescort_basic_save_news_section_meta' );

/**
 * Save counter section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_counter_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_counter_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_counter_meta_nonce'] ) ), 'sge_counter_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_counter' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_counter1_value',
		'sgescort_counter1_label',
		'sgescort_counter2_value',
		'sgescort_counter2_label',
		'sgescort_counter3_value',
		'sgescort_counter3_label',
		'sgescort_counter4_value',
		'sgescort_counter4_label',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_counter', 'sgescort_basic_save_counter_section_meta' );

/**
 * Save banner section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_banner_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_banner_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_banner_meta_nonce'] ) ), 'sge_banner_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_banner' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_banner_title',
		'sgescort_banner_button1_text',
		'sgescort_banner_button1_url',
		'sgescort_banner_button2_text',
		'sgescort_banner_button2_url',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_banner', 'sgescort_basic_save_banner_section_meta' );

/**
 * Save testimonials section meta.
 *
 * @param int $post_id Post ID.
 */
function sgescort_basic_save_testimonials_section_meta( $post_id ) {
	if ( ! isset( $_POST['sge_testimonials_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sge_testimonials_meta_nonce'] ) ), 'sge_testimonials_meta_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'sge_testimonials' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$fields = array(
		'sgescort_testimonials_subtitle',
		'sgescort_testimonials_title',
		'sgescort_testimonials_description',
		'sgescort_testimonial_text',
		'sgescort_client_name',
		'sgescort_client_role',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_sge_testimonials', 'sgescort_basic_save_testimonials_section_meta' );

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

/**
 * Add admin menu for managing front-page sections.
 */
function sgescort_basic_add_admin_menu() {
	add_menu_page(
		__( 'Front Page Sections', 'sgescort-basic' ),
		__( 'Front Page Sections', 'sgescort-basic' ),
		'manage_options',
		'front-page-sections',
		'sgescort_basic_front_page_sections_page',
		'dashicons-admin-page',
		30
	);
}
add_action( 'admin_menu', 'sgescort_basic_add_admin_menu' );

/**
 * Register settings for front-page sections.
 */
function sgescort_basic_register_settings() {
	register_setting( 'sgescort_basic_front_page_sections', 'sgescort_basic_sections_enabled' );
}
add_action( 'admin_init', 'sgescort_basic_register_settings' );

/**
 * Admin page for managing front-page sections.
 */
function sgescort_basic_front_page_sections_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Manage Front Page Sections', 'sgescort-basic' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'sgescort_basic_front_page_sections' );
			do_settings_sections( 'sgescort_basic_front_page_sections' );
			$enabled_sections = get_option( 'sgescort_basic_sections_enabled', array( 'hero', 'about', 'services', 'portfolio', 'banner', 'team', 'faq', 'news', 'counter', 'testimonials' ) );
			?>
			<table class="form-table">
				<tr>
					<th scope="row"><?php esc_html_e( 'Enabled Sections', 'sgescort-basic' ); ?></th>
					<td>
						<fieldset>
							<label for="hero">
								<input type="checkbox" id="hero" name="sgescort_basic_sections_enabled[]" value="hero" <?php checked( in_array( 'hero', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Hero Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="about">
								<input type="checkbox" id="about" name="sgescort_basic_sections_enabled[]" value="about" <?php checked( in_array( 'about', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'About Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="services">
								<input type="checkbox" id="services" name="sgescort_basic_sections_enabled[]" value="services" <?php checked( in_array( 'services', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Services Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="portfolio">
								<input type="checkbox" id="portfolio" name="sgescort_basic_sections_enabled[]" value="portfolio" <?php checked( in_array( 'portfolio', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Portfolio Section (Gallery)', 'sgescort-basic' ); ?>
							</label><br>
							<label for="banner">
								<input type="checkbox" id="banner" name="sgescort_basic_sections_enabled[]" value="banner" <?php checked( in_array( 'banner', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Banner Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="team">
								<input type="checkbox" id="team" name="sgescort_basic_sections_enabled[]" value="team" <?php checked( in_array( 'team', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Team Section (Models)', 'sgescort-basic' ); ?>
							</label><br>
							<label for="faq">
								<input type="checkbox" id="faq" name="sgescort_basic_sections_enabled[]" value="faq" <?php checked( in_array( 'faq', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'FAQ Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="contact">
								<input type="checkbox" id="contact" name="sgescort_basic_sections_enabled[]" value="news" <?php checked( in_array( 'news', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'News Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="counter">
								<input type="checkbox" id="counter" name="sgescort_basic_sections_enabled[]" value="counter" <?php checked( in_array( 'counter', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Counter Section', 'sgescort-basic' ); ?>
							</label><br>
							<label for="testimonials">
								<input type="checkbox" id="testimonials" name="sgescort_basic_sections_enabled[]" value="testimonials" <?php checked( in_array( 'testimonials', $enabled_sections ) ); ?> />
								<?php esc_html_e( 'Testimonials Section', 'sgescort-basic' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Add admin menu for user guide.
 */
function sgescort_basic_add_user_guide_menu() {
	add_menu_page(
		__( 'User Guide', 'sgescort-basic' ),
		__( 'User Guide', 'sgescort-basic' ),
		'manage_options',
		'user-guide',
		'sgescort_basic_user_guide_page',
		'dashicons-book-alt',
		31
	);
}
add_action( 'admin_menu', 'sgescort_basic_add_user_guide_menu' );

/**
 * Admin page for user guide.
 */
function sgescort_basic_user_guide_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Singapore Escort Hub - User Guide', 'sgescort-basic' ); ?></h1>
		
		<div class="card">
			<h2><?php esc_html_e( 'Welcome to SG Escort Basic Theme', 'sgescort-basic' ); ?></h2>
			<p><?php esc_html_e( 'This guide will help you manage and customize your Singapore Escort Hub website effectively.', 'sgescort-basic' ); ?></p>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '1. Managing Front Page Sections', 'sgescort-basic' ); ?></h3>
			<p><?php esc_html_e( 'Go to Appearance > Front Page Sections to enable/disable sections on your homepage.', 'sgescort-basic' ); ?></p>
			<ul>
				<li><strong><?php esc_html_e( 'Hero Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Main banner with title, subtitle, and call-to-action buttons.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'About Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Information about your services.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Services Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'List of services offered.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Portfolio Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Gallery of images.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Team Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Display your models/escorts.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'FAQ Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Frequently asked questions.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'News Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Latest news and updates.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Counter Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Statistics display.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Testimonials Section:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Client reviews.', 'sgescort-basic' ); ?></li>
			</ul>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '2. Editing Section Content', 'sgescort-basic' ); ?></h3>
			<p><?php esc_html_e( 'Each section has its own custom post type for content management:', 'sgescort-basic' ); ?></p>
			<ul>
				<li><strong><?php esc_html_e( 'Hero Sections:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Edit titles, buttons, and links.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'About Sections:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Edit subtitle, title, and description.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Services:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Add/edit individual services with images.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Models:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Add/edit model profiles with photos and details.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'FAQs:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Add/edit frequently asked questions.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Counter Sections:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Edit statistics numbers and labels.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Testimonials Sections:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Edit testimonial content and client info.', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Guide Sections:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Edit user guide content.', 'sgescort-basic' ); ?></li>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '3. Adding Content', 'sgescort-basic' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Go to the respective menu item (Services, Models, FAQs, etc.)', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Click "Add New"', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Fill in the title and content', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Add featured image if applicable', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Fill in custom fields in the meta box', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Set menu order if you want specific ordering', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Publish the post', 'sgescort-basic' ); ?></li>
			</ol>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '4. Managing Models', 'sgescort-basic' ); ?></h3>
			<p><?php esc_html_e( 'Models are your escort profiles. For each model:', 'sgescort-basic' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Add a featured image (photo)', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Set role/title (e.g., "Premium Escort")', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Add profile URL (link to detailed profile)', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Use menu order to control display order', 'sgescort-basic' ); ?></li>
			</ul>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '5. News & Blog Posts', 'sgescort-basic' ); ?></h3>
			<p><?php esc_html_e( 'Use standard WordPress posts for news:', 'sgescort-basic' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Go to Posts > Add New', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Write your news article', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Add featured image', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Posts will automatically appear in the News section', 'sgescort-basic' ); ?></li>
			</ul>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '6. Theme Customization', 'sgescort-basic' ); ?></h3>
			<ul>
				<li><strong><?php esc_html_e( 'Menus:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Appearance > Menus', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Widgets:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Appearance > Widgets', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Customizer:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Appearance > Customize', 'sgescort-basic' ); ?></li>
				<li><strong><?php esc_html_e( 'Theme Options:', 'sgescort-basic' ); ?></strong> <?php esc_html_e( 'Use the menu items provided by this theme', 'sgescort-basic' ); ?></li>
			</ul>
		</div>

		<div class="card">
			<h3><?php esc_html_e( '7. Support & Contact', 'sgescort-basic' ); ?></h3>
			<p><?php esc_html_e( 'For technical support or questions about the theme:', 'sgescort-basic' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Check this user guide first', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Contact the theme developer', 'sgescort-basic' ); ?></li>
				<li><?php esc_html_e( 'Refer to WordPress.org documentation', 'sgescort-basic' ); ?></li>
			</ul>
		</div>

		<style>
			.card {
				background: #fff;
				border: 1px solid #ddd;
				border-radius: 4px;
				padding: 20px;
				margin-bottom: 20px;
				box-shadow: 0 1px 3px rgba(0,0,0,0.1);
			}
			.card h2, .card h3 {
				margin-top: 0;
				color: #23282d;
			}
			.card ul, .card ol {
				margin-left: 20px;
			}
			.card li {
				margin-bottom: 5px;
			}
		</style>
	</div>
	<?php
}

/**
 * Add admin menu for section manager.
 */
function sgescort_basic_add_section_manager_menu() {
	add_menu_page(
		__( 'Section Manager', 'sgescort-basic' ),
		__( 'Section Manager', 'sgescort-basic' ),
		'manage_options',
		'section-manager',
		'sgescort_basic_section_manager_page',
		'dashicons-layout',
		32
	);
}
add_action( 'admin_menu', 'sgescort_basic_add_section_manager_menu' );

/**
 * Admin page for section manager.
 */
function sgescort_basic_section_manager_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Section Manager - Singapore Escort Hub', 'sgescort-basic' ); ?></h1>
		<p><?php esc_html_e( 'Manage all homepage sections from this central location. Click on any section to edit its content.', 'sgescort-basic' ); ?></p>

		<div class="section-manager-grid">
			<?php
			$sections = array(
				'hero' => array(
					'title' => __( 'Hero Section', 'sgescort-basic' ),
					'description' => __( 'Main banner with title, subtitle, and call-to-action buttons', 'sgescort-basic' ),
					'cpt' => 'sgescort_hero',
					'icon' => 'dashicons-star-filled'
				),
				'about' => array(
					'title' => __( 'About Section', 'sgescort-basic' ),
					'description' => __( 'Information about your services', 'sgescort-basic' ),
					'cpt' => 'sgescort_about',
					'icon' => 'dashicons-info'
				),
				'services' => array(
					'title' => __( 'Services Section', 'sgescort-basic' ),
					'description' => __( 'List of services offered', 'sgescort-basic' ),
					'cpt' => 'sge_services',
					'icon' => 'dashicons-admin-tools',
					'items_cpt' => 'sgescort_service'
				),
				'portfolio' => array(
					'title' => __( 'Portfolio Section (Gallery)', 'sgescort-basic' ),
					'description' => __( 'Gallery of images', 'sgescort-basic' ),
					'cpt' => 'sge_portfolio',
					'icon' => 'dashicons-images-alt'
				),
				'banner' => array(
					'title' => __( 'Banner Section', 'sgescort-basic' ),
					'description' => __( 'Call-to-action banner', 'sgescort-basic' ),
					'cpt' => 'sge_banner',
					'icon' => 'dashicons-megaphone'
				),
				'team' => array(
					'title' => __( 'Team Section (Models)', 'sgescort-basic' ),
					'description' => __( 'Display your models/escorts', 'sgescort-basic' ),
					'cpt' => 'sge_team',
					'icon' => 'dashicons-groups',
					'items_cpt' => 'sgescort_model'
				),
				'faq' => array(
					'title' => __( 'FAQ Section', 'sgescort-basic' ),
					'description' => __( 'Frequently asked questions', 'sgescort-basic' ),
					'cpt' => 'sgescort_faq_section',
					'icon' => 'dashicons-editor-help',
					'items_cpt' => 'sgescort_faq'
				),
				'news' => array(
					'title' => __( 'News Section', 'sgescort-basic' ),
					'description' => __( 'Latest news and updates', 'sgescort-basic' ),
					'cpt' => 'sge_news',
					'icon' => 'dashicons-admin-site'
				),
				'counter' => array(
					'title' => __( 'Counter Section', 'sgescort-basic' ),
					'description' => __( 'Statistics display', 'sgescort-basic' ),
					'cpt' => 'sge_counter',
					'icon' => 'dashicons-chart-bar'
				),
				'testimonials' => array(
					'title' => __( 'Testimonials Section', 'sgescort-basic' ),
					'description' => __( 'Client reviews', 'sgescort-basic' ),
					'cpt' => 'sge_testimonials',
					'icon' => 'dashicons-testimonial'
				)
			);

			foreach ( $sections as $section_key => $section ) :
				// Check if section has content
				$query = new WP_Query( array(
					'post_type' => $section['cpt'],
					'posts_per_page' => 1,
					'post_status' => 'publish'
				) );
				$has_content = $query->have_posts();
				$content_link = $has_content ? get_edit_post_link( $query->posts[0]->ID ) : admin_url( 'post-new.php?post_type=' . $section['cpt'] );
				$content_status = $has_content ? __( 'Has Content', 'sgescort-basic' ) : __( 'No Content', 'sgescort-basic' );
				$status_class = $has_content ? 'has-content' : 'no-content';
				?>
				<div class="section-card <?php echo esc_attr( $status_class ); ?>">
					<div class="section-card-header">
						<span class="dashicons <?php echo esc_attr( $section['icon'] ); ?>"></span>
						<h3><?php echo esc_html( $section['title'] ); ?></h3>
						<span class="content-status"><?php echo esc_html( $content_status ); ?></span>
					</div>
					<div class="section-card-body">
						<p><?php echo esc_html( $section['description'] ); ?></p>
						<div class="section-actions">
							<a href="<?php echo esc_url( $content_link ); ?>" class="button button-primary">
								<?php echo $has_content ? esc_html__( 'Edit Content', 'sgescort-basic' ) : esc_html__( 'Add Content', 'sgescort-basic' ); ?>
							</a>
							<?php if ( isset( $section['items_cpt'] ) ) : ?>
								<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=' . $section['items_cpt'] ) ); ?>" class="button">
									<?php esc_html_e( 'Manage Items', 'sgescort-basic' ); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php
			endforeach;
			?>
		</div>

		<div class="section-manager-info">
			<h3><?php esc_html_e( 'Quick Actions', 'sgescort-basic' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=front-page-sections' ) ); ?>"><?php esc_html_e( 'Enable/Disable Sections', 'sgescort-basic' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=user-guide' ) ); ?>"><?php esc_html_e( 'View User Guide', 'sgescort-basic' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><?php esc_html_e( 'View Homepage', 'sgescort-basic' ); ?></a></li>
			</ul>
		</div>

		<style>
			.section-manager-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
				gap: 20px;
				margin-bottom: 30px;
			}
			.section-card {
				background: #fff;
				border: 1px solid #ddd;
				border-radius: 8px;
				box-shadow: 0 2px 4px rgba(0,0,0,0.1);
				transition: all 0.3s ease;
			}
			.section-card:hover {
				box-shadow: 0 4px 8px rgba(0,0,0,0.15);
				transform: translateY(-2px);
			}
			.section-card.has-content {
				border-left: 4px solid #46b450;
			}
			.section-card.no-content {
				border-left: 4px solid #ffb900;
			}
			.section-card-header {
				padding: 15px 20px;
				border-bottom: 1px solid #eee;
				display: flex;
				align-items: center;
				gap: 10px;
			}
			.section-card-header .dashicons {
				font-size: 24px;
				color: #007cba;
			}
			.section-card-header h3 {
				margin: 0;
				flex: 1;
			}
			.content-status {
				font-size: 12px;
				padding: 4px 8px;
				border-radius: 12px;
				font-weight: 500;
			}
			.section-card.has-content .content-status {
				background: #d4edda;
				color: #155724;
			}
			.section-card.no-content .content-status {
				background: #fff3cd;
				color: #856404;
			}
			.section-card-body {
				padding: 20px;
			}
			.section-card-body p {
				margin: 0 0 15px 0;
				color: #666;
			}
			.section-actions {
				display: flex;
				gap: 10px;
				flex-wrap: wrap;
			}
			.section-actions .button {
				flex: 1;
				min-width: 120px;
				text-align: center;
			}
			.section-manager-info {
				background: #fff;
				border: 1px solid #ddd;
				border-radius: 8px;
				padding: 20px;
				margin-top: 20px;
			}
			.section-manager-info h3 {
				margin-top: 0;
				color: #23282d;
			}
			.section-manager-info ul {
				margin: 0;
				padding-left: 20px;
			}
			.section-manager-info li {
				margin-bottom: 8px;
			}
			.section-manager-info a {
				color: #007cba;
				text-decoration: none;
			}
			.section-manager-info a:hover {
				text-decoration: underline;
			}
		</style>
	</div>
	<?php
}

function sgescort_basic_hero_section() {
    ?>
    <!-- Hero Section -->
    <section id="home" class="slide-area">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">
    				<div class="slide-content">
    					<?php
    					$hero_query = new WP_Query(
    						array(
    							'post_type'      => 'sgescort_hero',
    							'posts_per_page' => 1,
    							'orderby'        => 'menu_order',
    							'order'          => 'ASC',
    						)
    					);
    					if ( $hero_query->have_posts() ) :
    						while ( $hero_query->have_posts() ) :
    							$hero_query->the_post();
    							$hero_id = get_the_ID();
    							$title1 = get_post_meta( $hero_id, '_sgescort_hero_title1', true );
    							$title2 = get_post_meta( $hero_id, '_sgescort_hero_title2', true );
    							$button1_text = get_post_meta( $hero_id, '_sgescort_hero_button1_text', true );
    							$button1_url = get_post_meta( $hero_id, '_sgescort_hero_button1_url', true );
    							$button2_text = get_post_meta( $hero_id, '_sgescort_hero_button2_text', true );
    							$button2_url = get_post_meta( $hero_id, '_sgescort_hero_button2_url', true );
    							?>
    							<span class="title1"><?php echo esc_html( $title1 ?: '#1 Best Directory Singapore (SG)' ); ?></span>
    							<h1 class="title2">
    								<?php echo esc_html( $title2 ?: get_bloginfo( 'name' ) ); ?>
    							</h1>
    							<div class="slider-button">
    								<?php if ( $button1_text && $button1_url ) : ?>
    									<a class="slide-btn" href="<?php echo esc_url( $button1_url ); ?>"><?php echo esc_html( $button1_text ); ?></a>
    								<?php else : ?>
    									<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
    								<?php endif; ?>
    								<?php if ( $button2_text && $button2_url ) : ?>
    									<a class="slide-btn" href="<?php echo esc_url( $button2_url ); ?>"><?php echo esc_html( $button2_text ); ?></a>
    								<?php else : ?>
    									<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit Telegram</a>
    								<?php endif; ?>
    							</div>
    							<?php
    						endwhile;
    						wp_reset_postdata();
    					else :
    						?>
    						<span class="title1">#1 Best Directory Singapore (SG)</span>
    						<h1 class="title2">
    							<?php bloginfo( 'name' ); ?>
    						</h1>
    						<div class="slider-button">
    							<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
    							<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit Telegram</a>
    						</div>
    						<?php
    					endif;
    					?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}

function sgescort_basic_about_section() {
    ?>
    <!-- About Section -->
    <section id="about" class="about-area bg-color area-padding">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6">
    				<div class="about-images position-relative">
    					<?php
    					$about_query = new WP_Query(
    						array(
    							'post_type'      => 'sgescort_about',
    							'posts_per_page' => 1,
    							'orderby'        => 'menu_order',
    							'order'          => 'ASC',
    						)
    					);
    					$image_url = '';
    					if ( $about_query->have_posts() ) :
    						while ( $about_query->have_posts() ) :
    							$about_query->the_post();
    							$about_id = get_the_ID();
    							$image_url = get_post_meta( $about_id, '_sgescort_about_image', true );
    						endwhile;
    						wp_reset_postdata();
    					endif;
    					?>
    					<img class="ab-image" src="<?php echo esc_url( $image_url ?: home_url( '/html/images/s1.jpg' ) ); ?>" alt="Singapore Escort Hub Team">
    					<div class="video-content">
    						<a href="#" class="video-play-icon">
    							<i class="fa fa-play"></i>
    						</a>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="about-content">
    					<div class="about-headline">
    						<?php
    					if ( $about_query->have_posts() ) :
    						$about_query->rewind_posts();
    						while ( $about_query->have_posts() ) :
    							$about_query->the_post();
    							$about_id = get_the_ID();
    							$subtitle = get_post_meta( $about_id, '_sgescort_about_subtitle', true );
    							$title = get_post_meta( $about_id, '_sgescort_about_title', true );
    							$button1_text = get_post_meta( $about_id, '_sgescort_about_button1_text', true );
    							$button1_url = get_post_meta( $about_id, '_sgescort_about_button1_url', true );
    							$button2_text = get_post_meta( $about_id, '_sgescort_about_button2_text', true );
    							$button2_url = get_post_meta( $about_id, '_sgescort_about_button2_url', true );
    							?>
    							<span class="top-head"><?php echo esc_html( $subtitle ?: 'About Us' ); ?></span>
    							<h3><?php echo esc_html( $title ?: 'About Singapore Escort Hub' ); ?></h3>
    							<?php
    						endwhile;
    						wp_reset_postdata();
    					else :
    						?>
    						<span class="top-head">About Us</span>
    						<h3>About Singapore Escort Hub</h3>
    						<?php
    					endif;
    						?>
    					</div>
    					<?php if ( get_the_content() ) : ?>
    						<div class="entry-content">
    							<?php the_content(); ?>
    						</div>
    					<?php else : ?>
    						<p>
    							An Singapore Escort Agency / Escort Girls SG is a professional service provider that offers
    							companionship and social support for clients in various settings. These services may include
    							attending social events, business meetings, private gatherings, or accompanying clients on
    							travel arrangements.
    						</p>
    						<p>
    							The nature of escort services provided by escort agencies can vary depending on regional laws
    							and cultural norms. Clients are encouraged to verify the agency's credentials and the scope of
    							its offerings to ensure a legitimate and satisfactory experience.
    						</p>
    					<?php endif; ?>
    					<div class="slider-button">
    						<?php if ( $button1_text && $button1_url ) : ?>
    							<a class="slide-btn" href="<?php echo esc_url( $button1_url ); ?>"><?php echo esc_html( $button1_text ); ?></a>
    						<?php else : ?>
    							<a class="slide-btn" href="https://sgescorthub.com/">Visit</a>
    						<?php endif; ?>
    						<?php if ( $button2_text && $button2_url ) : ?>
    							<a class="slide-btn" href="<?php echo esc_url( $button2_url ); ?>"><?php echo esc_html( $button2_text ); ?></a>
    						<?php else : ?>
    							<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Join Telegram</a>
    						<?php endif; ?>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
