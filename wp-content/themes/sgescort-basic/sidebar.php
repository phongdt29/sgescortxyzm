<?php
/**
 * Sidebar template.
 *
 * @package sgescort-basic
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar col-lg-4" role="complementary">
	<div class="sidebar-inner">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
