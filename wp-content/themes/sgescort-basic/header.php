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
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="#home"><?php esc_html_e( 'Home', 'sgescort-basic' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#about"><?php esc_html_e( 'About', 'sgescort-basic' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#services"><?php esc_html_e( 'Services', 'sgescort-basic' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#portfolio"><?php esc_html_e( 'Portfolio', 'sgescort-basic' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact"><?php esc_html_e( 'Contact', 'sgescort-basic' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

