<?php
/**
 * Main template file for SG Escort Basic theme.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<div class="entry-meta">
						<?php echo esc_html( get_the_date() ); ?>
						<?php esc_html_e( ' by ', 'sgescort-basic' ); ?>
						<?php the_author(); ?>
					</div>
				</header>

				<div class="entry-content">
					<?php
					if ( is_singular() ) {
						the_content();
					} else {
						the_excerpt();
					}
					?>
				</div>
			</article>

		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'sgescort-basic' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();

