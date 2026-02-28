<?php
/**
 * Search results template.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container py-5">
		<header class="page-header mb-4">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'sgescort-basic' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php
				while ( have_posts() ) {
					the_post();
					?>
					<div class="col-md-6 col-lg-4 mb-4">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'border rounded p-3 h-100' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="d-block mb-2">
									<?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid rounded' ) ); ?>
								</a>
							<?php endif; ?>
							<header class="entry-header">
								<h2 class="entry-title h5">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="entry-meta small text-muted">
									<?php echo esc_html( get_the_date() ); ?>
									<?php esc_html_e( ' · ', 'sgescort-basic' ); ?>
									<?php the_author(); ?>
								</div>
							</header>
							<div class="entry-summary mt-2">
								<?php the_excerpt(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary mt-2"><?php esc_html_e( 'Read more', 'sgescort-basic' ); ?></a>
						</article>
					</div>
					<?php
				}
				?>
			</div>

			<nav class="pagination-wrap mt-4" aria-label="<?php esc_attr_e( 'Search results navigation', 'sgescort-basic' ); ?>">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => '&laquo; ' . __( 'Previous', 'sgescort-basic' ),
						'next_text' => __( 'Next', 'sgescort-basic' ) . ' &raquo;',
					)
				);
				?>
			</nav>
		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no results matched your search. Please try again with different keywords.', 'sgescort-basic' ); ?></p>
			<div class="mt-4">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
