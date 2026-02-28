<?php
/**
 * Template for displaying single posts.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container py-5">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8' : 'col-12'; ?>">
				<?php
				while ( have_posts() ) {
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header mb-3">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<div class="entry-meta text-muted small">
								<?php echo esc_html( get_the_date() ); ?>
								<?php esc_html_e( ' by ', 'sgescort-basic' ); ?>
								<?php the_author(); ?>
								<?php if ( has_category() ) : ?>
									<span class="sep"> · </span>
									<?php the_category( ', ' ); ?>
								<?php endif; ?>
							</div>
						</header>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="entry-thumbnail mb-3">
								<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?>
							</div>
						<?php endif; ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-links mt-3">' . __( 'Pages:', 'sgescort-basic' ),
								'after'  => '</div>',
							)
						);
						?>
						<?php if ( has_tag() ) : ?>
							<footer class="entry-footer mt-3 pt-3 border-top">
								<span class="tags-links"><?php the_tags( '', ', ', '' ); ?></span>
							</footer>
						<?php endif; ?>
					</article>
					<?php
					// Comments.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
