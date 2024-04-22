<?php
/**
 * lonestartrailerparts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lonestartrailerparts
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
function lonestartrailerparts_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on lonestartrailerparts, use a find and replace
		* to change 'lonestartrailerparts' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'lonestartrailerparts', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );
	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );
	// Set post thumbnail sizes
	set_post_thumbnail_size( 150, 150, true );

	// Add custom thumbnail sizes for frontend theme.
	//add_image_size( 'search_img', 300, 300, false );
	add_image_size( 'thumb_2000', 2000, 9999, false );
	add_image_size( 'thumb_1900', 1900, 9999, false );
	add_image_size( 'thumb_1800', 1800, 9999, false );
	add_image_size( 'thumb_1600', 1600, 9999, false );
	add_image_size( 'thumb_1400', 1400, 9999, false );
	add_image_size( 'thumb_1200', 1200, 9999, false );
	add_image_size( 'thumb_1000', 1000, 9999, false );
	add_image_size( 'thumb_900', 900, 9999, false );
	add_image_size( 'thumb_800', 800, 9999, false );
	add_image_size( 'thumb_700', 700, 9999, false );
	add_image_size( 'thumb_650', 650, 9999, false );
	add_image_size( 'thumb_600', 600, 9999, false );
	add_image_size( 'thumb_500', 500, 9999, false );
	add_image_size( 'thumb_400', 400, 9999, false );
	add_image_size( 'thumb_300', 300, 9999, false );
	add_image_size( 'thumb_200', 200, 9999, false );
	add_image_size( 'thumb_100', 100, 9999, false );
	add_image_size( 'thumb_80', 80, 9999, false );
	add_image_size( 'thumb_40', 40, 9999, false );
	// Add custom thumbnail sizes for backend admin.
	add_image_size( 'address-square', 23, 23, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'lonestartrailerparts' ),
			'topheader' => esc_html__( 'Top Header', 'lonestartrailerparts' ),
            'header' => esc_html__( 'Header', 'lonestartrailerparts' ),
		)
	);
	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	// Set JPEG quality to 100%
	add_filter(
		'jpeg_quality',
		function() {
			return 100;
		}
	);
	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'lonestartrailerparts_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'lonestartrailerparts_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lonestartrailerparts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lonestartrailerparts_content_width', 640 );
}
add_action( 'after_setup_theme', 'lonestartrailerparts_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lonestartrailerparts_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lonestartrailerparts' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lonestartrailerparts' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
	    array(
            'name'          => __( 'Header sidebar', 'lonestartrailerparts' ),
            'id'            => 'header-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="header-sidebar">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'lonestartrailerparts_widgets_init' );

// Time format for the_time()
DEFINE( 'project_dtformat', 'F j, Y' );
// Define bundle version
DEFINE('ASSET_LONESTAR_VERSION',
	filemtime(get_template_directory() . '/dist/css/style.css') + filemtime(get_template_directory().'/dist/js/scripts.js')
);

/**
 * Enqueue scripts and styles.
 */
function lonestartrailerparts_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style('style', get_stylesheet_directory_uri().'/dist/css/style.css?','',ASSET_LONESTAR_VERSION);
	wp_enqueue_style('magnific-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css' );
	wp_enqueue_script('scripts-js', get_stylesheet_directory_uri().'/dist/js/scripts.js', array( 'jquery' ), ASSET_LONESTAR_VERSION, true );
	wp_enqueue_script('magnific-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js' );

	wp_localize_script('scripts-js','ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lonestartrailerparts_scripts' );
$file_includes = array(
	'inc/custom-function.php',
	'inc/acfblocks.php',
	'inc/custom-header.php',
	'inc/template-tags.php',
	'inc/template-functions.php',
	'inc/customizer.php',
	'inc/jetpack.php',
	'inc/woocommerce.php',
);
/*** Checks if any file have error while including it. ***/
foreach ( $file_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'lonestartrailerparts' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
/* Function which remove Plugin Update Notices – woocommerce*/
function disable_plugin_updates( $value ) {
   unset( $value->response['woocommerce/woocommerce.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );