<?php
/**
 * Template for displaying pages.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container py-5">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header mb-3">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail mb-3"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?></div>
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
			</article>
			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>

<?php
get_footer();
