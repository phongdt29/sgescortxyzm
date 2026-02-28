<?php
/**
 * 404 (Page not found) template.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container py-5 text-center">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title display-1 text-muted">404</h1>
				<h2 class="h4"><?php esc_html_e( 'Page not found', 'sgescort-basic' ); ?></h2>
			</header>
			<div class="page-content mt-4">
				<p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'sgescort-basic' ); ?></p>
				<div class="mt-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to Home', 'sgescort-basic' ); ?></a>
				</div>
				<div class="mt-4">
					<?php get_search_form(); ?>
				</div>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
