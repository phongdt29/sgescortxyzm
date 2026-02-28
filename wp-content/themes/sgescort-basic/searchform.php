<?php
/**
 * Search form template.
 *
 * @package sgescort-basic
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'sgescort-basic' ); ?></span>
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sgescort-basic' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit btn btn-primary mt-2"><?php echo esc_html_x( 'Search', 'submit button', 'sgescort-basic' ); ?></button>
</form>
