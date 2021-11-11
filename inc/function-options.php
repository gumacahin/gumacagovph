<?php
/**
 * The template for displaying the theme options page.
 *
 * @package GWT
 * @since Government Website Template 2.0
 */

/**
 * GOVPH
 */
class GOVPH {
	/**
	 * Options.
	 *
	 * @var mixed
	 */
	public $options;
	/**
	 * _default_options
	 *
	 * @var array
	 */
	private $_default_options = array(
		'govph_disable_search'                  => '',
		'govph_logo_position'                   => '',
		'govph_logo'                            => '',
		'govph_logo_enable'                     => '',
		'govph_agency_name'                     => '',
		'govph_agency_tagline'                  => '',
		'govph_headercolor'                     => '',
		'govph_header_font_color'               => '',
		'govph_headerimage'                     => '',
		'govph_slidercolor'                     => '',
		'govph_sliderimage'                     => '',
		'govph_slider_fullwidth'                => '',
		'govph_breadcrumbs_enable'              => '',
		'govph_breadcrumbs_separator'           => '',
		'govph_breadcrumbs_show_home'           => '',
		'govph_custom_pst'                      => '',
		'govph_custom_anchorcolor'              => '',
		'govph_custom_anchorcolor_hover'        => '',
		'govph_custom_panel_top'                => '',
		'govph_custom_border_color'             => '',
		'govph_custom_panel_bottom'             => '',
		'govph_custom_border_width'             => '',
		'govph_custom_border_radius'            => '',
		'govph_custom_border_color'             => '',
		'govph_custom_background_color'         => '',
		'govph_custom_headings_text'            => '',
		'govph_custom_headings_inner_page_size' => '',
		'govph_custom_footer_background_color'  => '',
		'govph_content_show_pub_date'           => '',
		'govph_content_pub_date_lbl'            => '',
		'govph_content_show_author'             => '',
		'govph_content_pub_author_lbl'          => '',
		'govph_acc_link_statement'              => '',
		'govph_acc_link_home'                   => '',
		'govph_acc_link_main_content'           => '',
		'govph_acc_link_contact'                => '',
		'govph_acc_link_feedback'               => '',
		'govph_acc_link_faq'                    => '',
		'govph_acc_link_sitemap'                => '',
		'govph_acc_link_search'                 => '',
	);

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->options = get_option( 'govph_options' );
		// to avoid warnings, reinstatiate all arrays that does not exist.
		if ( count( $this->options ) > 0 ) {
			$this->options = array_merge( $this->_default_options, $this->options );
		}

		$this->register_settings_fields();
	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public static function add_menu_page() {
		add_theme_page( 'Theme Options', 'Theme Options', 'administrator', 'govph-options', array( 'GOVPH', 'govph_options_page' ), 6 );
	}

	/**
	 * GOVPH options page.
	 *
	 * @return void
	 */
	public static function govph_options_page() {
		?>
	<div class="wrap">

	<h2>Theme Options Page</h2>
	<form action="options.php" method="post" enctype="multipart/form-data">
		<?php settings_fields( 'govph_options' ); ?>
		<?php do_settings_sections( __FILE__ ); ?>

		<p class="class">
			<input id="submit" name="submit" type="submit" class="button-primary" value="Save Changes">
		</p>
	</form>

	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($){

	var custom_uploader;

	colorPickerOption = {
		hide: false,
		pallete: false
	};

	$('#color-field-header-bg').iris(colorPickerOption);
	$('#color-field-header-font').iris(colorPickerOption);
	$('#color-field-slider').iris(colorPickerOption);
	$('#color-field-pst').iris(colorPickerOption);
	$('#color-field-anchor').iris(colorPickerOption);
	$('#color-field-anchor-hover').iris(colorPickerOption);
	$('#color-field-panel-top').iris(colorPickerOption);
	$('#color-field-panel-bottom').iris(colorPickerOption);
	$('#color-field-border-color').iris(colorPickerOption);
	$('#color-field-widget-bg').iris(colorPickerOption);
	$('#color-field-footer-bg').iris(colorPickerOption);

	$('form').find('input#upload_image_button').on('click', function(e){
		e.preventDefault();

		var $this = $(this),
		prevInput = $(this).prev();

		console.log(prevInput);

		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {
			attachment = custom_uploader.state().get('selection').first().toJSON();
			prevInput.val(attachment.url);
			console.log(prevInput.val());
		});

		custom_uploader.open();
	});

	$('form').find('input#header_image_background_button').on('click', function(e){
		e.preventDefault();

		var $this = $(this),
		prevInput = $(this).prev();

		console.log(prevInput);

		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {
			attachment = custom_uploader.state().get('selection').first().toJSON();
			prevInput.val(attachment.url);
			console.log(prevInput.val());
		});

		custom_uploader.open();
	});

	$('form').find('input#slider_image_background_button').on('click', function(e){
		e.preventDefault();

		var $this = $(this),
		prevInput = $(this).prev();

		console.log(prevInput);

		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {
			attachment = custom_uploader.state().get('selection').first().toJSON();
			prevInput.val(attachment.url);
			console.log(prevInput.val());
		});

		custom_uploader.open();
	});
});
</script>
		<?php
	}

	/**
	 * Register settings fields.
	 *
	 * @return void
	 */
	public function register_settings_fields() {
		register_setting( 'govph_options', 'govph_options' );
		add_settings_section( 'govph_main_section', '', array( $this, 'govph_main_section_cb' ), __FILE__ );
		add_settings_field( 'govph_general_section', '<h3>General Options<h3>', array( $this, 'govph_general_section' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_disable_search', 'Search Enable', array( $this, 'govph_disable_search' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_logo_enable', 'Enable Image Logo', array( $this, 'govph_logo_enable' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_agency_name', 'Agency Name', array( $this, 'govph_agency_name' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_agency_tagline', 'Agency Tagline', array( $this, 'govph_agency_tagline' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_header_font_color', 'Header Font Color', array( $this, 'govph_header_font_color' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_logo_position', 'Logo Position', array( $this, 'govph_logo_position_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_logo', 'Image Logo', array( $this, 'govph_logo_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_headercolor', 'Header Background Color', array( $this, 'govph_header_color_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_headerimage', 'Header Background Image', array( $this, 'govph_header_image_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_slidercolor', 'Slider Background Color', array( $this, 'govph_slider_color_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_sliderimage', 'Slider Background Image', array( $this, 'govph_slider_image_setting' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_slider_fullwidth', 'Slider Full Width', array( $this, 'govph_slider_fullwidth' ), __FILE__, 'govph_main_section' );

		// add govph_breadcrumbs separator and option.
		add_settings_field( 'govph_breadcrumbs_enable', 'Enable Breadcrumbs', array( $this, 'govph_breadcrumbs_enable' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_breadcrumbs_separator', 'Breadcrumbs Separator', array( $this, 'govph_breadcrumbs_separator' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_breadcrumbs_show_home', 'Breadcrumb Homepage Link', array( $this, 'govph_breadcrumbs_show_home' ), __FILE__, 'govph_main_section' );

		// custom styling.
		add_settings_field( 'govph_custom_section', '<h3>Theme Styling<h3>', array( $this, 'govph_custom_section' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_pst', 'Philippine Standard Time', array( $this, 'govph_custom_pst' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_anchorcolor', 'Anchor Color Settings', array( $this, 'govph_custom_anchorcolor' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_anchorcolor_hover', 'Anchor Color Settings (Hover)', array( $this, 'govph_custom_anchorcolor_hover' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_panel_top', 'Panel Top Color', array( $this, 'govph_custom_panel_top' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_panel_bottom', 'Panel Bottom Color', array( $this, 'govph_custom_panel_bottom' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_border_width', 'Border Width', array( $this, 'govph_custom_border_width' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_border_radius', 'Border Radius', array( $this, 'govph_custom_border_radius' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_border_color', 'Border Color', array( $this, 'govph_custom_border_color' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_background_color', 'Background Color', array( $this, 'govph_custom_background_color' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_headings_text', 'Header Rendering', array( $this, 'govph_custom_headings_text' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_headings_size', 'Blog Title Header', array( $this, 'govph_custom_headings_size' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_headings_inner_page_size', 'Banner Title Header', array( $this, 'govph_custom_headings_inner_page_size' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_custom_footer_background_color', 'Agency Footer Color', array( $this, 'govph_custom_footer_background_color' ), __FILE__, 'govph_main_section' );

		// publishing options.
		add_settings_field( 'govph_content_section', '<h3>Publishing Options<h3>', array( $this, 'govph_content_section' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_content_show_pub_date', 'Show Published Date', array( $this, 'govph_content_show_pub_date' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_content_pub_date_lbl', 'Publish Date Label', array( $this, 'govph_content_pub_date_lbl' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_content_show_author', 'Show Publisher', array( $this, 'govph_content_show_author' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_content_pub_author_lbl', 'Publish Author Label', array( $this, 'govph_content_pub_author_lbl' ), __FILE__, 'govph_main_section' );

		// accessibility links.
		add_settings_field( 'govph_acc_link_section', '<h3>Accessibility<h3>', array( $this, 'govph_acc_link_section' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_keys', 'Accessibility Combination Keys', array( $this, 'govph_acc_link_keys' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_statement', 'Accessibility Statement<br/>(Combination + 0)', array( $this, 'govph_acc_link_statement' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_home', 'Home Page<br/>(Combination + H)', array( $this, 'govph_acc_link_home' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_main_content', 'Main Content<br/>(Combination + R)', array( $this, 'govph_acc_link_main_content' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_contact', 'Contact<br/>(Combination + C)', array( $this, 'govph_acc_link_contact' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_feedback', 'Feedback<br/>(Combination + K)', array( $this, 'govph_acc_link_feedback' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_faq', 'FAQ<br/>(Combination + Q)', array( $this, 'govph_acc_link_faq' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_sitemap', 'Site Map<br/>(Combination + M)', array( $this, 'govph_acc_link_sitemap' ), __FILE__, 'govph_main_section' );
		add_settings_field( 'govph_acc_link_search', 'Search<br/>(Combination + S)', array( $this, 'govph_acc_link_search' ), __FILE__, 'govph_main_section' );
	}

	/**
	 * GOVPH main section callback.
	 *
	 * @return void
	 */
	public function govph_main_section_cb() { }

	/*
	* Inputs
	*/

	/*
	* General Options Section
	*/

	/**
	 * GOVPH general section.
	 *
	 * @return void
	 */
	public function govph_general_section() {
		?>
	<hr/>
		<?php
	}

	/**
	 * GOVPH disable_search.
	 *
	 * @return void
	 */
	public function govph_disable_search() {
		$true = ( 'true' == $this->options['govph_disable_search'] ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_disable_search]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to display search field</span>
		<?php
	}

	/**
	 * GOVPH logo position setting
	 *
	 * @return void
	 */
	public function govph_logo_position_setting() {
		$left   = ( 'left' == $this->options['govph_logo_position'] ? 'checked' : '' );
		$center = ( 'center' == $this->options['govph_logo_position'] ? 'checked' : '' );
		?>
	<input type="radio" name="govph_options[govph_logo_position]" value="left" <?php echo esc_attr( $left ); ?>> Left <br>
	<input type="radio" name="govph_options[govph_logo_position]" value="center" <?php echo esc_attr( $center ); ?>> Center
	<br/><span class="description">Set position for logo</span>
		<?php
	}

	/**
	 * GOVPH logo setting.
	 *
	 * @return void
	 */
	public function govph_logo_setting() {
		?>
	<label for="upload_image">
		<input id="upload_image" type="text" size="36" name="govph_options[govph_logo]" value="<?php echo esc_attr( $this->options['govph_logo'] ); ?>" />
		<input id="upload_image_button" class="button" type="button" value="Upload Logo" />
		<br/><span class="description">Enter a URL or upload an image</span>
	</label>

		<?php
		if ( ! empty( $this->options['govph_logo'] ) ) {
			echo '<br/><img src="' . esc_url( $this->options['govph_logo'] ) . '" height="100px" alt="" style="background: #ddd; padding: 10px;">';
		}
	}

	/**
	 * GOVPH logo enable.
	 *
	 * @return void
	 */
	public function govph_logo_enable() {
		$logo_enable_option = isset( $this->options['govph_logo_enable'] ) ? $this->options['govph_logo_enable'] : 1;
		$enabled            = ( 1 == $logo_enable_option ? 'checked' : '' );
		$disabled           = ( 0 == $logo_enable_option ? 'checked' : '' );
		?>
	<label for="logo_enabled">
		<input type="radio" name="govph_options[govph_logo_enable]" id="govph_logo_enable" value="1" <?php echo esc_attr( $enabled ); ?>> <label for="govph_logo_enable">Enable</label> <br>
		<input type="radio" name="govph_options[govph_logo_enable]" id="govph_logo_disable" value="0" <?php echo esc_attr( $disabled ); ?>> <label for="govph_logo_disable">Disable</label>
		<br/><span class="description">If enabled, the website name will be hidden and image logo will be shown (if exists).</span>
	</label>
		<?php
	}

	/**
	 * GOVPH agency name.
	 *
	 * @return void
	 */
	public function govph_agency_name() {
		$value = $this->options['govph_agency_name'] ? $this->options['govph_agency_name'] : '';
		?>
	<input type="text" name="govph_options[govph_agency_name]" value="<?php echo esc_attr( $value ); ?>" style="width: 400px;"><br/>
	<span class="description">The agency website name.</span>
		<?php
	}

	/**
	 * GOVPH agency tagline.
	 *
	 * @return void
	 */
	public function govph_agency_tagline() {
		$value = isset( $this->options['govph_agency_tagline'] ) ? $this->options['govph_agency_tagline'] : '';
		?>
	<input type="text" name="govph_options[govph_agency_tagline]" value="<?php echo esc_attr( $value ); ?>" style="width: 400px;"><br/>
	<span class="description">The agency tagline.</span>
		<?php
	}

	/**
	 * GOVPH header color setting.
	 *
	 * @return void
	 */
	public function govph_header_color_setting() {
		?>
	<input name="govph_options[govph_headercolor]" type="text" value="<?php echo esc_attr( $this->options['govph_headercolor'] ); ?>" class="my-color-field" id="color-field-header-bg" data-default-color="#142745" />
		<?php
	}

	/**
	 * GOVPH header font color.
	 *
	 * @return void
	 */
	public function govph_header_font_color() {
		$header_font_color = ! empty( $this->options['govph_header_font_color'] ) ? $this->options['govph_header_font_color'] : '';
		?>
	<input name="govph_options[govph_header_font_color]" type="text" value="<?php echo esc_attr( $header_font_color ); ?>" class="my-color-field" id="color-field-header-font" data-default-color="#000" />
		<?php
	}

	/**
	 * GOVPH header image setting.
	 *
	 * @return void
	 */
	public function govph_header_image_setting() {
		?>
	<label for="header_image_background">
		<input id="header_image_background" type="text" size="36" name="govph_options[govph_headerimage]" value="<?php echo esc_attr( $this->options['govph_headerimage'] ); ?>" />
		<input id="header_image_background_button" class="button" type="button" value="Upload Image" />
		<br /><span class="description">Enter a URL or upload an image for header background.</span>
	</label>
		<?php
		if ( ! empty( $this->options['govph_headerimage'] ) ) {
			echo '<br/><img src="' . esc_url( $this->options['govph_headerimage'] ) . '" height="100px" style="background: #ddd; padding: 10px;">';
		}
	}

	/**
	 * GOVPH slider color setting.
	 *
	 * @return void
	 */
	public function govph_slider_color_setting() {
		?>
	<input name="govph_options[govph_slidercolor]" type="text" value="<?php echo esc_attr( $this->options['govph_slidercolor'] ); ?>" class="my-color-field" id="color-field-slider" data-default-color="#1f3a70" />
		<?php
	}

	/**
	 * GOVPH slider image setting.
	 *
	 * @return void
	 */
	public function govph_slider_image_setting() {
		?>
	<label for="slider_image_background">
		<input id="slider_image_background" type="text" size="36" name="govph_options[govph_sliderimage]" value="<?php echo esc_attr( $this->options['govph_sliderimage'] ); ?>" />
		<input id="slider_image_background_button" class="button" type="button" value="Upload Image" />
		<br/><span class="description">Enter a URL or upload an image for header background</span>
	</label>
		<?php
		if ( ! empty( $this->options['govph_sliderimage'] ) ) {
			echo '<br/><img src="' . esc_url( $this->options['govph_sliderimage'] ) . '" height="200px" alt="' . esc_attr( $alt ) . '" style="background: #ddd; padding: 10px;">';
		}
	}

	/**
	 * GOVPH slider fullwidth.
	 *
	 * @return void
	 */
	public function govph_slider_fullwidth() {
		$true = ( 'true' == $this->options['govph_slider_fullwidth'] ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_slider_fullwidth]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to display the slider in full width</span>
		<?php
	}

	/**
	 * GOVPH breadcrumbs enable.
	 *
	 * @return void
	 */
	public function govph_breadcrumbs_enable() {
		$true = ( 'true' == $this->options['govph_breadcrumbs_enable'] ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_breadcrumbs_enable]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to display Breadcrumbs</span>
		<?php
	}

	/**
	 * GOVPH breadcrumbs separator.
	 *
	 * @return void
	 */
	public function govph_breadcrumbs_separator() {
		$value = $this->options['govph_breadcrumbs_separator'] ? $this->options['govph_breadcrumbs_separator'] : ' › ';
		?>
	<input type="text" name="govph_options[govph_breadcrumbs_separator]" value="<?php echo esc_attr( $value ); ?>"><br/>
	<span class="description">Separator symbol in between breadcrumb links</span>
		<?php
	}

	/**
	 * GOVPH breadcrumbs show home.
	 *
	 * @return void
	 */
	public function govph_breadcrumbs_show_home() {
		$true = ( 'true' == $this->options['govph_breadcrumbs_show_home'] ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_breadcrumbs_show_home]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to show homepage link at the start of the breadcrumbs</span>
		<?php
	}

	/**
	 * Theme styling
	 */
	public function govph_custom_section() {
		?>
	<hr></hr>
		<?php
	}

	/**
	 * GOVPH custom pst.
	 *
	 * @return void
	 */
	public function govph_custom_pst() {
		$govph_custom_pst = ! empty( $this->options['govph_custom_pst'] ) ? $this->options['govph_custom_pst'] : '#000000';
		?>
	<input name="govph_options[govph_custom_pst]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_pst'] ); ?>" class="my-color-field" id="color-field-pst" data-default-color="#000000" />
	<br><span class="description">Philippine Standard Time (PST) font customization</span>
		<?php
	}

	/**
	 * GOVPH custom anchorcolor.
	 *
	 * @return void
	 */
	public function govph_custom_anchorcolor() {
		?>
	<input name="govph_options[govph_custom_anchorcolor]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_anchorcolor'] ); ?>" class="my-color-field" id="color-field-anchor" data-default-color="#2ba6cb" />
	<br><span class="description">Change active links font color</span>
		<?php
	}

	/**
	 * GOVPH custom anchorcolor hover.
	 *
	 * @return void
	 */
	public function govph_custom_anchorcolor_hover() {
		?>
	<input name="govph_options[govph_custom_anchorcolor_hover]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_anchorcolor_hover'] ); ?>" class="my-color-field" id="color-field-anchor-hover" data-default-color="#258faf" />
	<br><span class="description">Change active links font color</span>
		<?php
	}

	/**
	 * GOVPH custom panel top.
	 *
	 * @return void
	 */
	public function govph_custom_panel_top() {
		$govph_custom_panel_top = ! empty( $this->options['govph_custom_panel_top'] ) ? $this->options['govph_custom_panel_top'] : '#fffff';
		?>
	<input name="govph_options[govph_custom_panel_top]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_panel_top'] ); ?>" class="my-color-field" id="color-field-panel-top" data-default-color="#ffffff" />
	<br><span class="description">Background color for Panel Top section</span>
		<?php
	}

	/**
	 * GOVPH custom panel bottom.
	 *
	 * @return void
	 */
	public function govph_custom_panel_bottom() {
		$govph_custom_border_color = ! empty( $this->options['govph_custom_border_color'] ) ? $this->options['govph_custom_panel_bottom'] : '#fffff';
		?>
	<input name="govph_options[govph_custom_panel_bottom]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_panel_bottom'] ); ?>" class="my-color-field" id="color-field-panel-bottom" data-default-color="#fffff" />
	<br><span class="description">Background color for Panel Bottom section</span>
		<?php
	}

	/**
	 * GOVPH custom border width.
	 *
	 * @return void
	 */
	public function govph_custom_border_width() {
		$zero  = ( 0 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		$one   = ( 1 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		$two   = ( 2 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		$three = ( 3 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		$four  = ( 4 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		$five  = ( 5 == $this->options['govph_custom_border_width'] ? 'selected' : '' );
		?>
	<select name="govph_options[govph_custom_border_width]">
		<option value="">-- Select --</option>
		<option value="0" <?php echo esc_attr( $zero ); ?>>0px</option>
		<option value="1" <?php echo esc_attr( $one ); ?>>1px</option>
		<option value="2" <?php echo esc_attr( $two ); ?>>2px</option>
		<option value="3" <?php echo esc_attr( $three ); ?>>3px</option>
		<option value="4" <?php echo esc_attr( $four ); ?>>4px</option>
		<option value="5" <?php echo esc_attr( $five ); ?>>5px</option>
	</select>
	<br><span class="description">Adjust border width for main content area and widgets</span>
		<?php
	}

	/**
	 * GOVPH custom border radius.
	 *
	 * @return void
	 */
	public function govph_custom_border_radius() {
		$zero   = ( 0 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$two    = ( 2 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$four   = ( 4 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$six    = ( 6 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$eight  = ( 8 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$ten    = ( 10 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$ztwo   = ( 12 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$zfour  = ( 14 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$zsix   = ( 16 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$zeight = ( 18 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		$zten   = ( 20 == $this->options['govph_custom_border_radius'] ? 'selected' : '' );
		?>
	<select name="govph_options[govph_custom_border_radius]">
		<option value="">-- Select --</option>
		<option value="0" <?php echo esc_attr( $zero ); ?>>0px</option>
		<option value="2" <?php echo esc_attr( $two ); ?>>2px</option>
		<option value="4" <?php echo esc_attr( $four ); ?>>4px</option>
		<option value="6" <?php echo esc_attr( $six ); ?>>6px</option>
		<option value="8" <?php echo esc_attr( $eight ); ?>>8px</option>
		<option value="10" <?php echo esc_attr( $ten ); ?>>10px</option>
		<option value="12" <?php echo esc_attr( $ztwo ); ?>>12px</option>
		<option value="14" <?php echo esc_attr( $zfour ); ?>>14px</option>
		<option value="16" <?php echo esc_attr( $zsix ); ?>>16px</option>
		<option value="18" <?php echo esc_attr( $zeight ); ?>>18px</option>
		<option value="20" <?php echo esc_attr( $zten ); ?>>20px</option>
	</select>
	<br><span class="description">Adjust border radius for main content area and widgets</span>
		<?php
	}

	/**
	 * GOVPH custom border color.
	 *
	 * @return void
	 */
	public function govph_custom_border_color() {
		$govph_custom_border_color = ! empty( $this->options['govph_custom_border_color'] ) ? $this->options['govph_custom_border_color'] : '#bfbfbf';
		?>
	<input name="govph_options[govph_custom_border_color]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_border_color'] ); ?>" class="my-color-field" id="color-field-border-color" data-default-color="#bfbfbf" />
	<br><span class="description">Border color for widgets and main content area</span>
		<?php
	}

	/**
	 * GOVPH custom background color.
	 *
	 * @return void
	 */
	public function govph_custom_background_color() {
		$govph_custom_background_color = ! empty( $this->options['govph_custom_background_color'] ) ? $this->options['govph_custom_background_color'] : '#fcfcfc';
		?>
	<input name="govph_options[govph_custom_background_color]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_background_color'] ); ?>" class="my-color-field" id="color-field-widget-bg" data-default-color="#fcfcfc" />
	<br><span class="description">Background color for widgets and main content area</span>
		<?php
	}

	/**
	 * GOVPH custom headings text.
	 *
	 * @return void
	 */
	public function govph_custom_headings_text() {
		$nl   = ( 'none' == $this->options['govph_custom_headings_text'] ? 'selected' : '' );
		$ups  = ( 'uppercase' == $this->options['govph_custom_headings_text'] ? 'selected' : '' );
		$lws  = ( 'lowercase' == $this->options['govph_custom_headings_text'] ? 'selected' : '' );
		$caps = ( 'capitalize' == $this->options['govph_custom_headings_text'] ? 'selected' : '' );
		?>
	<select name="govph_options[govph_custom_headings_text]">
		<option value="">-- Select --</option>
		<option value="none" <?php echo esc_attr( $nl ); ?>>normal</option>
		<option value="uppercase" <?php echo esc_attr( $ups ); ?>>UPPERCASE</option>
		<option value="lowercase" <?php echo esc_attr( $lws ); ?>>lowercase</option>
		<option value="capitalize" <?php echo esc_attr( $caps ); ?>>Capitalize</option>
	</select>
	<br><span class="description">Blog section title text rendering</span>
		<?php
	}

	/**
	 * GOVPH custom headings size.
	 *
	 * @return void
	 */
	public function govph_custom_headings_size() {
		$sm = ( 0.8 == $this->options['govph_custom_headings_size'] ? 'selected' : '' );
		$nl = ( 1 == $this->options['govph_custom_headings_size'] ? 'selected' : '' );
		$lr = ( 1.6 == $this->options['govph_custom_headings_size'] ? 'selected' : '' );
		?>
	<select name="govph_options[govph_custom_headings_size]">
		<option value="">-- Select --</option>
		<option value="0.8" <?php echo esc_attr( $sm ); ?>>small</option>
		<option value="1" <?php echo esc_attr( $nl ); ?>>normal</option>
		<option value="1.6" <?php echo esc_attr( $lr ); ?>>large</option>
	</select>
	<br><span class="description">Adjust blog section title font sizes</span>
		<?php
	}

	/**
	 * GOVPH custom headings inner page size.
	 *
	 * @return void
	 */
	public function govph_custom_headings_inner_page_size() {
		$sm = ( 2 == $this->options['govph_custom_headings_inner_page_size'] ? 'selected' : '' );
		$nl = ( 2.69 == $this->options['govph_custom_headings_inner_page_size'] ? 'selected' : '' );
		$lr = ( 3.5 == $this->options['govph_custom_headings_inner_page_size'] ? 'selected' : '' );
		?>
	<select name="govph_options[govph_custom_headings_inner_page_size]">
		<option value="">-- Select --</option>
		<option value="2" <?php echo esc_attr( $sm ); ?>>small</option>
		<option value="2.69" <?php echo esc_attr( $nl ); ?>>normal</option>
		<option value="3.5" <?php echo esc_attr( $lr ); ?>>large</option>
	</select>
	<br><span class="description">Adjust inner posts and pages title font sizes</span>
		<?php
	}

	/**
	 * GOVPH custom footer background color.
	 *
	 * @return void
	 */
	public function govph_custom_footer_background_color() {
		$govph_custom_footer_background_color = ! empty( $this->options['govph_custom_footer_background_color'] ) ? $this->options['govph_custom_footer_background_color'] : '#E9E9E9';
		?>
	<input name="govph_options[govph_custom_footer_background_color]" type="text" value="<?php echo esc_attr( $this->options['govph_custom_footer_background_color'] ); ?>" class="my-color-field" id="color-field-footer-bg" data-default-color="#E9E9E9" />
	<br><span class="description">Background color for agency footer section</span>
		<?php
	}

	/**
	 * GOVPH content section.
	 *
	 * @return void
	 */
	public function govph_content_section() {
		?>
	<hr></hr>
		<?php
	}

	/**
	 * GOVPH content show pub date.
	 *
	 * @return void
	 */
	public function govph_content_show_pub_date() {
		$true = ( 'true' == $this->options['govph_content_show_pub_date'] || ! empty( $this->options['govph_content_show_pub_date'] ) ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_content_show_pub_date]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to display the published date on posts</span>
		<?php
	}

	/**
	 * GOVPH content pub date lbl.
	 *
	 * @return void
	 */
	public function govph_content_pub_date_lbl() {
		$default = ! empty( $this->options['govph_content_pub_date_lbl'] ) ? $this->options['govph_content_pub_date_lbl'] : 'Posted on';
		?>
	<input type="text" name="govph_options[govph_content_pub_date_lbl]" value="<?php echo esc_attr( $default ); ?>"><br/>
	<span class="description">Publish date display label</span>
		<?php
	}

	/**
	 * GOVPH content show author.
	 *
	 * @return void
	 */
	public function govph_content_show_author() {
		$true = ( 'true' == $this->options['govph_content_show_author'] ? 'checked' : '' );
		?>
	<input type="checkbox" name="govph_options[govph_content_show_author]" value="true" <?php echo esc_attr( $true ); ?>>
	<span class="description">Check to display the author</span>
		<?php
	}

	/**
	 * GOVPH content pub author lbl.
	 *
	 * @return void
	 */
	public function govph_content_pub_author_lbl() {
		$default = ! empty( $this->options['govph_content_pub_author_lbl'] ) ? $this->options['govph_content_pub_author_lbl'] : 'by';
		?>
	<input type="text" name="govph_options[govph_content_pub_author_lbl]" value="<?php echo esc_attr( $default ); ?>"><br/>
	<span class="description">Publish author display label<br/></span>
		<?php
	}

	/**
	 * GOVPH acc link section.
	 * accessibility options
	 *
	 * @return void
	 */
	public function govph_acc_link_section() {
		?>
	<hr/>
		<?php
	}

	/**
	 * GOVPH acc link keys.
	 *
	 * @return void
	 */
	public function govph_acc_link_keys() {
		?>
	<p>Shortcut Keys Combination Activation<br/>
	Combination keys used for each browser.</p>
	<ul>
		<li>Chrome for Linux press (Alt+Shift+shortcut_key)</li>
		<li>Chrome for Windows press (Alt+shortcut_key)</li>
		<li>For Firefox press (Alt+Shift+shortcut_key)</li>
		<li>For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)</li>
		<li>On Mac OS press (Ctrl+Opt+shortcut_key)</li>
	</ul>
		<?php
	}

	/**
	 * GOVPH acc link statement.
	 *
	 * @return void
	 */
	public function govph_acc_link_statement() {
		$value = $this->options['govph_acc_link_statement'] ? $this->options['govph_acc_link_statement'] : '';
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_statement]" value="<?php echo esc_attr( $value ); ?>"><br/>
	<span class="description">Statement accessibility page</span>
		<?php
	}

	/**
	 * GOVPH acc link home.
	 *
	 * @return void
	 */
	public function govph_acc_link_home() {
		$value = $this->options['govph_acc_link_home'] ? $this->options['govph_acc_link_home'] : '';
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_home]" value="<?php echo esc_attr( $value ); ?>"><br/>
	<span class="description">The home page of the website<br/>Default: blank</span>
		<?php
	}

	/**
	 * GOVPH acc link main content.
	 *
	 * @return void
	 */
	public function govph_acc_link_main_content() {
		$value = $this->options['govph_acc_link_main_content'] ? $this->options['govph_acc_link_main_content'] : '#main-content';
		?>
	<span class="field-prefix">{current_url}/ </span>
	<input type="text" name="govph_options[govph_acc_link_main_content]" value="<?php echo esc_attr( $value ); ?>"><br/>
	<span class="description">Default: #main-content</span>
		<?php
	}

	/**
	 * GOVPH acc link contact.
	 *
	 * @return void
	 */
	public function govph_acc_link_contact() {
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_contact]" value="<?php echo esc_attr( $this->options['govph_acc_link_contact'] ); ?>">
		<?php
	}

	/**
	 * GOVPH acc link feedback.
	 *
	 * @return void
	 */
	public function govph_acc_link_feedback() {
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_feedback]" value="<?php echo esc_attr( $this->options['govph_acc_link_feedback'] ); ?>">
		<?php
	}

	/**
	 * GOVPH acc link faq.
	 *
	 * @return void
	 */
	public function govph_acc_link_faq() {
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_faq]" value="<?php echo esc_attr( $this->options['govph_acc_link_faq'] ); ?>">
		<?php
	}

	/**
	 * GOVPH acc link sitemap.
	 *
	 * @return void
	 */
	public function govph_acc_link_sitemap() {
		$value = $this->options['govph_acc_link_sitemap'] ? $this->options['govph_acc_link_sitemap'] : '#gwt-standard-footer';
		?>
	<span class="field-prefix">{current_url}/ </span>
	<input type="text" name="govph_options[govph_acc_link_sitemap]" value="<?php echo esc_attr( $value ); ?>"><br/>
	<span class="description">Note: If the sitemap is a page, use the full URL of the website: <?php echo esc_html( get_site_url() ); ?>/{sitemap_page}<br/>
		Default: #gwt-standard-footer</span>
		<?php
	}

	/**
	 * GOVPH acc link search.
	 *
	 * @return void
	 */
	public function govph_acc_link_search() {
		?>
	<span class="field-prefix"><?php echo esc_html( get_site_url() ); ?>/ </span>
	<input type="text" name="govph_options[govph_acc_link_search]" value="<?php echo esc_attr( $this->options['govph_acc_link_search'] ); ?>"><br/>
	<span class="description">Note: Create a new page by going to "Pages" and selecting "Add New." Title the page "Search," and choose "Search Page" on Page Attributes from the Template drop-down menu. Click "Publish."<br/>
		The link will be coming from the created page's permalink.
	</span>
		<?php
	}
}

/**
 * GOVPH options menu.
 *
 * @return void
 */
function govph_options_menu() {
	GOVPH::add_menu_page();
}
add_action( 'admin_menu', 'govph_options_menu' );

/**
 * GOVPH options init.
 *
 * @return void
 */
function govph_options_init() {
	new GOVPH();
}
add_action( 'admin_init', 'govph_options_init' );

/**
 * GWT enqueue color picker.
 *
 * @param  mixed $hook_suffix hook suffix.
 * @return void
 */
function gwt_enqueue_color_picker( $hook_suffix ) {
	// First check that $hook_suffix is appropriate for your admin page.
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	// FIXME: add appropriate ver.
	wp_enqueue_script( 'my-script-handle', get_template_directory_uri() . '/js/color.js', array( 'wp-color-picker' ), false, true );
}

if ( is_admin() ) {
	add_action( 'admin_enqueue_scripts', 'gwt_enqueue_color_picker' );
}

/**
 * GOVPH displayoptions.
 *
 * @param  mixed $options options.
 * @return array display options.
 */
function govph_displayoptions( $options ) {
	$option = get_option( 'govph_options' );

	switch ( $options ) {
		case 'govph_logo_enable':
			return ( ! empty( $option['govph_logo_enable'] ) && 1 == $option['govph_logo_enable'] );
		break;
		case 'govph_logo_setting':
			$logo_setting  = ( ! empty( $option['govph_header_font_color'] ) ? 'color:' . $option['govph_header_font_color'] . ';' : '' );
			$logo_setting .= ( ! empty( $option['govph_logo_position'] ) ? 'text-align:' . $option['govph_logo_position'] . ';' : '' );
			echo esc_html( $logo_setting );
			break;
		case 'govph_logo':
			$logo_image = ( ! empty( $option['govph_logo'] ) ? $option['govph_logo'] : get_template_directory_uri() . '/images/logo-masthead-large.png' );
			$add_logo   = ( ! empty( $option['govph_logo_enable'] ) && 1 == $option['govph_logo_enable'] ) ? '<img src="' . esc_url( $logo_image ) . '" />' :
			'<div id="textlogo-wrapper">
        <div id="textlogo-image"><img alt="' . ! empty( $option['govph_agency_name'] ) . ' Official Logo" src="' . $logo_image . '" height="100px" width="100px"/></div>
        <div id="textlogo-inner-wrapper">
          <div id="agency-heading">Republic of the Philippines</div>
          <div id="agency-name">' . ( ! empty( $option['govph_agency_name'] ) ? $option['govph_agency_name'] : '' ) . '</div>
          <div id="agency-tagline">' . ( ! empty( $option['govph_agency_tagline'] ) ? $option['govph_agency_tagline'] : '' ) . '</div>
        </div>
       </div>';
			// FIXME: linter complains.
			echo $add_logo;
			break;
		case 'govph_header_setting':
			$header_setting  = ( ! empty( $option['govph_headercolor'] ) ? 'background-color:' . $option['govph_headercolor'] . ';' : '' );
			$header_setting .= ( ! empty( $option['govph_headerimage'] ) ? 'background-image:url("' . $option['govph_headerimage'] . '");' : '' );
			echo $header_setting;
			break;
		case 'govph_slider_setting':
			$slider_setting  = ( ! empty( $option['govph_sliderimage'] ) ? 'background-image:url("' . $option['govph_sliderimage'] . '");background-size:cover;' : '' );
			$slider_setting .= ( ! empty( $option['govph_slidercolor'] ) ? 'background-color:' . $option['govph_slidercolor'] . ';' : '' );
			if ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] ) {
				$slider_setting .= 'padding: 0;';
				$slider_setting .= 'border-top: none;';
				$slider_setting .= 'border-bottom: none;';
			}
			echo $slider_setting;
			break;
		case 'govph_anchorcolor':
			$anchor_color = ( ! empty( $option['govph_custom_anchorcolor'] ) ? 'color:' . $option['govph_custom_anchorcolor'] . ';' : '' );
			echo esc_html( $anchor_color );
			break;
		case 'govph_anchorcolor_hover':
			$color        = isset( $option['govph_custom_anchorcolor_hover'] ) ? $option['govph_custom_anchorcolor_hover'] : 'inherit';
			$anchor_color = ( ! empty( $option['govph_custom_anchorcolor_hover'] ) ? 'color:' . $color . ' ;' : '' );
			echo esc_html( $anchor_color );
			break;
		case 'govph_disable_search':
			return ( ! empty( $option['govph_disable_search'] ) ? true : false );
		break;
		// TODO: disable option for widget position, make it dynamic, displays sidebars when atleast one widget is active.
		case 'govph_content_position':
			$content_class = 'small-12 small-order-1 ';
			$left_sidebar  = is_active_sidebar( 'left-sidebar' );
			$right_sidebar = is_active_sidebar( 'right-sidebar' );

			if ( $right_sidebar && $left_sidebar ) {
				$content_class .= 'medium-6 medium-order-2 large-6 large-order-2 ';
			} elseif ( ( $right_sidebar || $left_sidebar ) && ! ( $right_sidebar && $left_sidebar ) ) {
				$content_class .= 'medium-8 medium-order-2 large-8 large-order-2 ';
			} else {
				$content_class = 'medium-12 large-12 ';
			}
			echo esc_attr( $content_class );
			break;
		case 'govph_sidebar_position_left':
			$sidebar_class = 'small-12 small-order-3 ';
			$left_sidebar  = is_active_sidebar( 'left-sidebar' );
			$right_sidebar = is_active_sidebar( 'right-sidebar' );

			if ( $left_sidebar && $right_sidebar ) {
				$sidebar_class .= 'medium-3 medium-order-1 large-3 large-order-1 ';
			} elseif ( $left_sidebar || $right_sidebar && ! ( $right_sidebar && $left_sidebar ) ) {
				$sidebar_class .= 'medium-4 medium-order-1 large-4 large-order-1 ';
			}
			echo esc_attr( $sidebar_class );
			break;
		case 'govph_sidebar_position_right':
			$sidebar_class = 'small-12 small-order-2 ';
			$left_sidebar  = is_active_sidebar( 'left-sidebar' );
			$right_sidebar = is_active_sidebar( 'right-sidebar' );

			if ( $left_sidebar && $right_sidebar ) {
				$sidebar_class .= 'medium-3 medium-order-3 large-3 large-order-3 ';
			} elseif ( $left_sidebar || $right_sidebar && ! ( $right_sidebar && $left_sidebar ) ) {
				$sidebar_class .= 'medium-4 medium-order-3 large-4 large-order-3 ';
			}
			echo esc_attr( $sidebar_class );
			break;
		case 'govph_sidebar_left':
			get_sidebar( 'left' );
			break;
		case 'govph_sidebar_right':
			get_sidebar( 'right' );
			break;
		case 'govph_panel_top':
			get_sidebar( 'panel-top' );
			break;
		case 'govph_position_panel_top':
			$ctr = 0;
			for ( $i = 1; $i < 5; $i++ ) {
				if ( is_active_sidebar( 'panel-top-' . $i ) ) {
					++$ctr;
				}
			}
			if ( 1 === $ctr ) {
				$val = 'large-12 columns';
			}
			if ( 2 === $ctr ) {
				$val = 'large-6 columns';
			}
			if ( 3 === $ctr ) {
				$val = 'large-4 columns';
			}
			if ( 4 === $ctr ) {
				$val = 'large-3 columns';
			}

			echo esc_attr( $val );
			break;
		case 'govph_panel_bottom':
			get_sidebar( 'panel-bottom' );
			break;
		case 'govph_position_panel_bottom':
			$ctr = 0;
			for ( $i = 1; $i < 5; $i++ ) {
				if ( is_active_sidebar( 'panel-bottom-' . $i ) ) {
					++$ctr;
				}
			}
			if ( 1 === $ctr ) {
				$val = 'large-12 columns';
			}
			if ( 2 === $ctr ) {
				$val = 'large-6 columns';
			}
			if ( 3 === $ctr ) {
				$val = 'large-4 columns';
			}
			if ( 4 === $ctr ) {
				$val = 'large-3 columns';
			}

			echo esc_attr( $val );
			break;
		case 'govph_position_agency_footer':
			$ctr = 0;
			for ( $i = 1; $i < 5; $i++ ) {
				if ( is_active_sidebar( 'footer-' . $i ) ) {
					++$ctr;
				}
			}
			if ( 1 === $ctr ) {
				$val = 'large-12 columns';
			}
			if ( 2 === $ctr ) {
				$val = 'large-6 columns';
			}
			if ( 3 === $ctr ) {
				$val = 'large-4 columns';
			}
			if ( 4 === $ctr ) {
				$val = 'large-3 columns';
			}

			echo esc_attr( $val );
			break;
		case 'govph_slider_full':
			if ( ! empty( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] ) {
				$val = 'active';
				return $val;
			}
			break;
		case 'govph_slider_start':
			if ( ! isset( $option['govph_slider_fullwidth'] ) || 'true' != $option['govph_slider_fullwidth'] ) {
				echo '<!-- govph_slider *NOT* fullwidth start. --><div class="row">';
			} elseif ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] && ! is_active_sidebar( 'banner-section-1' ) && ! is_active_sidebar( 'banner-section-2' ) ) {
				echo '<!-- govph_slider fullwidth start. -->';
			}
			break;
		case 'govph_slider_end':
			if ( ! isset( $option['govph_slider_fullwidth'] ) || 'true' != $option['govph_slider_fullwidth'] ) {
				echo '<!-- govph_slider *NOT* fullwidth end. --></div>';
			} elseif ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] && ! is_active_sidebar( 'banner-section-1' ) && ! is_active_sidebar( 'banner-section-2' ) ) {
				echo '<!-- govph_slider fullwidth end. -->';
			}
			break;
		case 'govph_banner_title_start':
			if ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] ) {
				echo '<div class="row">';
			} elseif ( isset( $option['govph_slider_fullwidth'] ) && 'true' != $option['govph_slider_fullwidth'] ) {
				echo '';
			}
			break;
		case 'govph_banner_title_end':
			if ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] ) {
				echo '</div>';
			} elseif ( isset( $option['govph_slider_fullwidth'] ) && 'true' == $option['govph_slider_fullwidth'] ) {
				echo '';
			}
			break;
		case 'govph_slider_fullwidth':
			if ( empty( $option['govph_slider_fullwidth'] ) || 'true' != $option['govph_slider_fullwidth'] ) {
				echo 'display: block;';
			} else {
				echo 'display: none;';
			}
			break;
		case 'govph_acc_link_statement':
			if ( ! empty( $option['govph_acc_link_statement'] ) ) {
				$value  = '';
				$value .= get_site_url() . '/';
				$value .= $option['govph_acc_link_statement'];
				return $value;
			}
			break;
		case 'govph_acc_link_contact':
			if ( ! empty( $option['govph_acc_link_contact'] ) ) {
				$value  = '';
				$value .= get_site_url() . '/';
				$value .= $option['govph_acc_link_contact'];
				return $value;
			}
			break;
		case 'govph_acc_link_feedback':
			if ( ! empty( $option['govph_acc_link_feedback'] ) ) {
				$value  = '';
				$value .= get_site_url() . '/';
				$value .= $option['govph_acc_link_feedback'];
				return $value;
			}
			break;
		case 'govph_acc_link_faq':
			if ( ! empty( $option['govph_acc_link_faq'] ) ) {
				$value  = '';
				$value .= get_site_url() . '/';
				$value .= $option['govph_acc_link_faq'];
				return $value;
			}
			break;
		case 'govph_acc_link_search':
			if ( ! empty( $option['govph_acc_link_search'] ) ) {
				$value  = '';
				$value .= get_site_url() . '/';
				$value  = $option['govph_acc_link_search'];
				return $value;
			}
			break;
		case 'govph_acc_link_home':
			$value  = '';
			$value .= get_site_url() . '/';
			$value .= isset( $option['govph_acc_link_home'] ) ? $option['govph_acc_link_home'] : '';
			return $value;
		break;
		case 'govph_acc_link_main_content':
			$value  = '';
			$value .= isset( $option['govph_acc_link_main_content'] ) ? $option['govph_acc_link_main_content'] : '#main-content';
			return $value;
		break;
		case 'govph_acc_link_sitemap':
			$value  = '';
			$value .= isset( $option['govph_acc_link_sitemap'] ) ? $option['govph_acc_link_sitemap'] : '#gwt-standard-footer';
			return $value;
		break;
		case 'govph_content_show_pub_date':
			return isset( $option['govph_content_show_pub_date'] ) ? $option['govph_content_show_pub_date'] : '';
		break;
		case 'govph_content_pub_date_lbl':
			return isset( $option['govph_content_pub_date_lbl'] ) ? $option['govph_content_pub_date_lbl'] : '';
		break;
		case 'govph_content_show_author':
			return isset( $option['govph_content_show_author'] ) ? $option['govph_content_show_author'] : '';
		break;
		case 'govph_content_pub_author_lbl':
			return isset( $option['govph_content_pub_author_lbl'] ) ? $option['govph_content_pub_author_lbl'] : '';
		break;
		case 'govph_custom_pst':
			$bg = ( ! empty( $option['govph_custom_pst'] ) ? 'color:' . $option['govph_custom_pst'] . ';' : '' );
			echo esc_html( $bg );
			break;
		case 'govph_custom_panel_top':
			$bg = ( ! empty( $option['govph_custom_panel_top'] ) ? 'background-color:' . $option['govph_custom_panel_top'] . ';' : '' );
			echo esc_html( $bg );
			break;
		case 'govph_custom_panel_bottom':
			$bg = ( ! empty( $option['govph_custom_panel_bottom'] ) ? 'background-color:' . $option['govph_custom_panel_bottom'] . ';' : '' );
			echo esc_html( $bg );
			break;
		case 'govph_widget_setting':
			$widget_setting = array();
			if ( isset( $option['govph_custom_border_width'] ) && is_numeric( $option['govph_custom_border_width'] ) ) {
				$widget_setting[] = "border-width: {$option['govph_custom_border_width']}px;";
			}
			if ( ! empty( $option['govph_custom_border_color'] ) && ctype_xdigit( trim( $option['govph_custom_border_color'], '#' ) ) ) {
				$widget_setting[] = "border-color: {$option['govph_custom_border_color']};";
			}
			if ( isset( $option['govph_custom_border_radius'] ) && is_numeric( $option['govph_custom_border_radius'] ) ) {
				$widget_setting[] = "border-radius: {$option['govph_custom_border_radius']}px;";
			}
			if ( ! empty( $option['govph_custom_background_color'] ) && ctype_xdigit( trim( $option['govph_custom_background_color'], '#' ) ) ) {
				$widget_setting[] = "background-color: {$option['govph_custom_background_color']};";
			}
			echo esc_html( join( "\n", $widget_setting ) );
			break;
		case 'govph_headings_setting':
			$headings  = ( ! empty( $option['govph_custom_headings_text'] ) ? 'text-transform:' . $option['govph_custom_headings_text'] . ';' : '' );
			$headings .= ( ! empty( $option['govph_custom_headings_size'] ) ? 'font-size:' . $option['govph_custom_headings_size'] . 'em;' : '' );
			echo esc_html( $headings );
			break;
		case 'govph_inner_headings_setting':
			$size  = ( ! empty( $option['govph_custom_headings_inner_page_size'] ) ? 'font-size:' . $option['govph_custom_headings_inner_page_size'] . 'em;' : '' );
			$size .= ( ! empty( $option['govph_custom_headings_text'] ) ? 'text-transform:' . $option['govph_custom_headings_text'] . ';' : '' );
			echo esc_html( $size );
			break;
		case 'govph_custom_footer_background_color':
			$bg = ( ! empty( $option['govph_custom_footer_background_color'] ) ? 'background-color:' . $option['govph_custom_footer_background_color'] . ';' : '' );
			echo esc_html( $bg );
			break;
	}
}
