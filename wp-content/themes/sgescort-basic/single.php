<?php
/**
 * Template for displaying single posts.
 *
 * @package sgescort-basic
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-meta">
					<?php echo esc_html( get_the_date() ); ?>
					<?php esc_html_e( ' by ', 'sgescort-basic' ); ?>
					<?php the_author(); ?>
				</div>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	}
	?>
</main>

<?php
get_footer();
