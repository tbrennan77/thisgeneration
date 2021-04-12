<?php
define( 'CRB_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

add_action( 'admin_init', 'crb_remove_editor' );
function crb_remove_editor() {
	$id = '';

	if ( isset( $_GET['post'] ) ) {
		$id = intval( esc_attr( $_GET['post'] ) );
	}

	$excluded = [
		'templates/section-builder.php'
	];

	if ( $id && in_array( get_page_template_slug( $id ), $excluded ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'crb_enqueue_assets' );
function crb_enqueue_assets() {
	$template_dir = get_template_directory_uri();

	# Enqueue Custom JS files
	wp_enqueue_script(
		'theme-js-bundle',
		$template_dir . crb_assets_bundle( 'js/bundle.js' ),
		array( 'jquery' ), // deps
		null, // version -- this is handled by the bundle manifest
		true // in footer
);

	# Enqueue Custom CSS files
	wp_enqueue_style(
		'theme-css-bundle',
		$template_dir . crb_assets_bundle( 'css/bundle.css' )
	);

	# The theme style.css file may contain overrides for the bundled styles
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script( 'theme-admin-functions', $template_dir . '/js/admin-functions.js', array( 'jquery' ) );

	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style( 'theme-admin-styles', $template_dir . '/css/admin-style.css' );

	# Editor Styles
	# add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'login_enqueue_scripts', 'crb_login_enqueue' );
function crb_login_enqueue() {
	crb_enqueue_style( 'theme-login-styles', get_template_directory_uri() . '/css/login-style.css' );
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'crb_attach_post_types_and_taxonomies', 0 );
function crb_attach_post_types_and_taxonomies() {
  # Attach Custom Post Types
	include_once( CRB_THEME_DIR . 'options/post-types.php' );

  # Attach Custom Taxonomies
	include_once( CRB_THEME_DIR . 'options/taxonomies.php' );
}

add_action( 'after_setup_theme', 'crb_setup_theme' );

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'crb_setup_theme' ) ) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = CRB_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( CRB_THEME_DIR . 'includes/admin-login.php' );
		include_once( CRB_THEME_DIR . 'includes/blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/boot-blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/comments.php' );
		include_once( CRB_THEME_DIR . 'includes/title.php' );
		include_once( CRB_THEME_DIR . 'includes/gravity-forms.php' );
		include_once( CRB_THEME_DIR . 'includes/helpers/utils-socials.php' );

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		register_nav_menus( array(
			'header-location' => __( 'Header location', 'crb' ),
			'footer-left-location' => __( 'Footer left location', 'crb' ),
			'footer-right-location' => __( 'Footer right location', 'crb' ),
			'footer-middle-location' => __( 'Footer middle location', 'crb' ),
			'footer-bottom-location' => __( 'Footer bottom location', 'crb' )
		) );

		# Attach custom widgets
		include_once( CRB_THEME_DIR . 'options/widgets.php' );

		# Attach custom shortcodes
		include_once( CRB_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'crb_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'crb_excerpt_more' );
		add_filter( 'excerpt_length', 'crb_excerpt_length', 999 );
		add_filter( 'crb_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/images/favicon.ico';
		} );
		add_filter( 'carbon_fields_map_field_api_key', 'crb_get_google_maps_api_key' );

		add_image_size( 'counter-image-size', 100, 100 );
		add_image_size( 'loop-page-featured-image-size', 421, 421 );
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge( crb_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'crb' ),
		'id'   => 'default-sidebar',
	) );

	register_sidebar( $sidebar_options );
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once( CRB_THEME_DIR . 'options/theme-options.php' );
	include_once( CRB_THEME_DIR . 'options/post-meta.php' );
}

function crb_excerpt_more() {
	return ' ... <a href="' . get_the_permalink() . '">read more</a>';
}

function crb_excerpt_length() {
	return 27;
}

/**
 * Returns the Google Maps API Key set in Theme Options.
 *
 * @return string
 */
function crb_get_google_maps_api_key() {
	return carbon_get_theme_option( 'crb_google_maps_api_key' );
}

/**
 * Get the path to a versioned bundle relative to the theme directory.
 *
 * @param  string $path
 * @return string
 */
function crb_assets_bundle( $path ) {
	static $manifest = null;

	if ( is_null( $manifest ) ) {
		$manifest_path = CRB_THEME_DIR . 'dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}
	}

	$path = isset( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return '/dist/' . $path;
}

/**
 * Sometimes, when using Gutenberg blocks the content output
 * contains empty unnecessary paragraph tags.
 *
 * In WP v5.2 this will be fixed, however, until then this function
 * acts as a temporary solution.
 *
 * @see https://core.trac.wordpress.org/ticket/45495
 *
 * @param  string $content
 * @return string
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'crb_fix_empty_paragraphs_in_blocks' );
function crb_fix_empty_paragraphs_in_blocks( $content ) {
	global $wp_version;

	if ( version_compare( $wp_version, '5.2', '<' ) && has_blocks() ) {
		return $content;
	}

	return wpautop( $content );
}

add_filter( 'nav_menu_link_attributes', 'crb_header_menu_atts', 10, 3 );
function crb_header_menu_atts( $atts, $item, $args )
{
	if ( $args->theme_location === 'header-location' ) {
		$atts['data-text'] = $item->title;
	}

	return $atts;
}

add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
function posts_link_attributes_next() {
	return 'class="btn"';
}

add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');
// remove some fields from billing form
function wpb_custom_billing_fields( $fields = array() ) {

	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
	unset($fields['billing_postcode']);
	unset($fields['billing_country']);

	return $fields;
}
add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
    $new_str = $str . ' <a href="https://gregslaughter.com/courses/self-managing-your-rentals/">Click here to access your course and get started</a>.';
    return $new_str;
}


/* Custom Gravity Forms Code */
//add_filter( 'gform_next_button_2', 'form_next_button', 10, 2 );
function form_next_button( $button, $form ) {
    return "<button class='button gform_next_button' id='gform_next_button_{$form['id']}'><span>Donate</span></button>";
}
