<?php
/**
 * Blog index template (used when a static front page is set).
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container py-5">
		<header class="page-header mb-4">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8' : 'col-12'; ?>">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
							<header class="entry-header">
								<h2 class="entry-title h3">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="entry-meta text-muted small">
									<?php echo esc_html( get_the_date() ); ?>
									<?php esc_html_e( ' by ', 'sgescort-basic' ); ?>
									<?php the_author(); ?>
								</div>
							</header>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="d-block mb-2"><?php the_post_thumbnail( 'medium_large', array( 'class' => 'img-fluid rounded' ) ); ?></a>
							<?php endif; ?>
							<div class="entry-content">
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary"><?php esc_html_e( 'Read more', 'sgescort-basic' ); ?></a>
							</div>
						</article>
					<?php endwhile; ?>
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => '&laquo; ' . __( 'Previous', 'sgescort-basic' ),
							'next_text' => __( 'Next', 'sgescort-basic' ) . ' &raquo;',
						)
					);
					?>
				<?php else : ?>
					<p><?php esc_html_e( 'No posts found.', 'sgescort-basic' ); ?></p>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
