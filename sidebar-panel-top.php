<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package gumacagwt
 */

$active_panel_count = 0;
for ( $i = 1; $i < 5; $i++ ) {
	if ( is_active_sidebar( "panel-top-$i" ) ) {
		$active_panel_count++;
	}
}

if ( 0 === $active_panel_count ) {
	return;
}

$large_width = 12 / $active_panel_count;
$panel_class = "column small-12 medium-12 large-$large_width";
?>

<div id="panel-top" class="anchor" role="complementary">
	<div class="row">
	<?php for ( $i = 1; $i < 5; $i++ ) : ?>
		<?php if ( is_active_sidebar( "panel-top-$i" ) ) : ?>
				<aside id="<?php echo esc_attr( "panel-top-$i" ); ?>" class="<?php echo esc_attr( $panel_class ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( "panel-top-$i" ); ?>
			</aside>
		<?php endif; ?>
	<?php endfor; ?>
	</div>
</div>
