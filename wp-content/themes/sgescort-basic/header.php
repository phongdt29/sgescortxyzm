<?php
/**
 * Header template.
 *
 * @package sgescort-basic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header / Navbar -->
<header>
	<nav class="navbar navbar-expand-lg header-area">
		<div class="container">
			<a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( home_url( '/html/images/logo.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'navbar-nav ms-auto',
						'container'       => false,
						'fallback_cb'     => 'sgescort_basic_primary_menu_fallback',
						'depth'           => 1,
					)
				);
				?>
			</div>
		</div>
	</nav>
</header>

