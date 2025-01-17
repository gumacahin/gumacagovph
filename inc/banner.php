<?php
/**
 * Renders the banner.
 *
 * @package GWT.
 */

if ( is_home() ) {
	$banner_class   = 'large-12';
	$banner_2_class = '';
	$banner_3_class = '';
	if ( is_active_sidebar( 'banner-section-1' ) && is_active_sidebar( 'banner-section-2' ) ) {
		$banner_class   = 'small-12 medium-6 large-6 columns';
		$banner_2_class = 'small-12 medium-3 large-3 columns';
		$banner_3_class = 'small-12 medium 3 large-3 columns';
	} elseif ( is_active_sidebar( 'banner-section-1' ) && ! is_active_sidebar( 'banner-section-2' ) ) {
		$banner_class   = 'small-12 medium-8 large-8 columns';
		$banner_2_class = 'small-12 medium-4 large-4 columns';
	} elseif ( ! is_active_sidebar( 'banner-section-1' ) && is_active_sidebar( 'banner-section-2' ) ) {
		$banner_class   = 'small-12 medium-8 large-8 columns';
		$banner_3_class = 'small-12 medium-4 large-4 columns';
	}
	$banner_class .= ' hide-for-small-only';
}

$container_class = '';
if ( ! is_home() ) {
	$container_class = 'banner-pads';
}

?>
				<!-- banner -->
<div class="container-banner <?php echo esc_attr( $container_class ); ?>">
	<?php govph_displayoptions( 'govph_slider_start' ); ?>
	<?php if ( is_home() ) : ?>
		<?php
		$banner_slider = efs_get_slider();
		if ( $banner_slider ) :
			?>
			<?php if ( govph_displayoptions( 'govph_slider_full' ) === 'active' ) : ?>
				<div id="banner-slider" class="large-12 <?php esc_attr( $banner_class ); ?>">
			<?php else : ?>
				<div id="banner-slider" class="<?php echo esc_attr( $banner_class ); ?>">
			<?php endif; ?>
			<?php echo $banner_slider; ?>
				</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'banner-section-1' ) ) : ?>
			<div id="banner-section-1" class="<?php echo esc_attr( $banner_2_class ); ?>">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'banner-section-1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'banner-section-2' ) ) : ?>
			<div id="banner-section-2" class="<?php echo esc_attr( $banner_3_class ); ?>">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'banner-section-2' ); ?>
			</div>
		<?php endif; ?>

	<?php else : ?>
		<?php if ( is_404() ) : ?>
			<?php govph_displayoptions( 'govph_banner_title_start' ); ?>
				<div class="large-9 columns container-main">
					<header>
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gwt_wp' ); ?></h1>
					</header>
				</div>
			<?php govph_displayoptions( 'govph_banner_title_end' ); ?>
		<?php elseif ( is_search() ) : ?>
			<?php govph_displayoptions( 'govph_banner_title_start' ); ?>
				<div class="large-9 columns container-main">
					<header>
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'gwt_wp' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
					</header>
				</div>
			<?php govph_displayoptions( 'govph_banner_title_end' ); ?>
		<?php elseif ( is_archive() ) : ?>
			<?php govph_displayoptions( 'govph_banner_title_start' ); ?>
				<div class="large-9 columns container-main">
					<header>
						<h1 class="page-title">
							<?php
							if ( is_category() ) :
								single_cat_title();
							elseif ( is_tag() ) :
								single_tag_title();
							elseif ( is_author() ) :
								/*
								* Queue the first post, that way we know
								* what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author: %s', 'gwt_wp' ), '<span class="vcard">' . esc_html( get_the_author() ) . '</span>' );

								/*
								* Since we called the_post() above, we need to
								* rewind the loop back to the beginning that way
								* we can run the loop properly, in full.
								*/
								rewind_posts();

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'gwt_wp' ), '<span>' . esc_html( get_the_date() ) . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'gwt_wp' ), '<span>' . esc_html( get_the_date( 'F Y' ) ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'gwt_wp' ), '<span>' . esc_html( get_the_date( 'Y' ) ) . '</span>' );
							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								esc_html_e( 'Asides', 'gwt_wp' );
							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								esc_html_e( 'Images', 'gwt_wp' );
							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								esc_html_e( 'Videos', 'gwt_wp' );
							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								esc_html_e( 'Quotes', 'gwt_wp' );
							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								esc_html_e( 'Links', 'gwt_wp' );
							else :
								esc_html_e( 'Archives', 'gwt_wp' );
							endif;
							?>
						</h1>
						<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
                         // @codingStandardsIgnoreStart
                         printf( '<div class="taxonomy-description">%s</div>', $term_description );
                         // @codingStandardsIgnoreEnd
						endif;
						?>
					</header>
				</div>
			<?php govph_displayoptions( 'govph_banner_title_end' ); ?>
		<?php else : ?>
			<?php govph_displayoptions( 'govph_banner_title_start' ); ?>
				<div class="large-9 columns container-main">
					<header>
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php endwhile; // end of the loop. ?>
					</header>
				</div>
			<?php govph_displayoptions( 'govph_banner_title_end' ); ?>
		<?php endif ?>
	<?php endif ?>

	<?php govph_displayoptions( 'govph_slider_end' ); ?>
</div>

<?php if ( has_nav_menu( 'aux_nav' ) ) : ?>
<div id="auxiliary" class="show-for-large">
	<div class="row">
		<div class="small-12 large-12 columns toplayer">
			<nav id="aux-main" class="nomargin show-for-medium-up" data-dropdown-content>
				<ul class="dropdown menu" data-dropdown-menu>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'aux_nav',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'fallback_cb'    => false,
						'walker'         => new Topbar_Nav_Menu(),
					)
				);
				?>
				</ul>
			</nav>
		</div>
	</div>
</div>
<?php endif; ?>

<?php require_once 'breadcrumbs.php'; ?>
