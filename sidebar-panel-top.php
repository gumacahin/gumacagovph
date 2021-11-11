<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package gwt_wp
 */

?>

<?php if ( is_active_sidebar( 'panel-top-1' ) || is_active_sidebar( 'panel-top-2' ) || is_active_sidebar( 'panel-top-3' ) || is_active_sidebar( 'panel-top-4' ) ) : ?>
<div id="panel-top" class="anchor" role="complementary">
	<div class="row">
	<?php if ( is_active_sidebar( 'panel-top-1' ) ) : ?>
			<aside id="panel-top-1" class="small-12 medium-12 large-3 column" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'panel-top-1' ); ?>
		</aside>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'panel-top-2' ) ) : ?>
			<aside id="panel-top-2" class="small-12 medium-12 large-3 column" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'panel-top-2' ); ?>
		</aside>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'panel-top-3' ) ) : ?>
			<aside id="panel-top-3" class="small-12 medium-12 large-3 column" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'panel-top-3' ); ?>
		</aside>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'panel-top-4' ) ) : ?>
			<aside id="panel-top-4" class="small-12 medium-12 large-3 column" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'panel-top-4' ); ?>
			</aside>
	<?php endif; ?>
	</div>
</div>
<?php endif; ?>
