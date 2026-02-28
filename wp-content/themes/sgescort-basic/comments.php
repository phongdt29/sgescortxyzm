<?php
/**
 * Comments template.
 *
 * @package sgescort-basic
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mt-5 pt-4 border-top">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title h4 mb-3">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === (string) $comment_count ) {
				printf(
					/* translators: %s: post title. */
					esc_html__( 'One comment on &ldquo;%s&rdquo;', 'sgescort-basic' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title. */
					esc_html( _n( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'sgescort-basic' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list list-unstyled">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => '&laquo; ' . __( 'Older comments', 'sgescort-basic' ),
				'next_text' => __( 'Newer comments', 'sgescort-basic' ) . ' &raquo;',
			)
		);
		?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sgescort-basic' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'          => __( 'Leave a comment', 'sgescort-basic' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title h4 mb-3">',
			'title_reply_after'    => '</h3>',
			'comment_notes_before' => '<p class="comment-notes small text-muted mb-2">' . __( 'Your email address will not be published.', 'sgescort-basic' ) . '</p>',
			'class_form'          => 'comment-form',
		)
	);
	?>
</div>
