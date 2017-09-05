<?php
/**
 * novusDetox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package novusDetox
 */

if ( ! function_exists( 'novusdetox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function novusdetox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on novusDetox, use a find and replace
	 * to change 'novusdetox' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'novusdetox', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'novusdetox' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'novusdetox_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'novusdetox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function novusdetox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'novusdetox_content_width', 640 );
}
add_action( 'after_setup_theme', 'novusdetox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function novusdetox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'novusdetox' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'novusdetox' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'novusdetox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function novusdetox_scripts() {
    wp_enqueue_script( 'novusdetox-click-js', get_template_directory_uri() . '/js/clickpathmedia.js', array(), '20151215', true);

    wp_enqueue_script( 'novusdetox-core-js', get_template_directory_uri() . '/js/core.js', array(), '20151215', true);
    wp_enqueue_script( 'novusdetox-code', get_template_directory_uri() . '/js/code.js', array(), '20151215', true);
    wp_enqueue_style( 'novusdetox-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'novusdetox_scripts' );


add_filter('category_link', create_function('$a', 'return str_replace("category/", "", $a);'), 9999);
if(!is_admin()){
    add_filter( 'clean_url', function( $url )
    {
        if ( FALSE === strpos( $url, '.js' ) )
        { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' defer='defer";
    }, 11, 1 );
}
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');


function contact_form_function(){
    $admin_email = get_bloginfo(admin_email);
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $array= $_POST['data'];
    if($_POST['id'] == '1'){
        $message = '<br> SUBSCRIBE TO OUR WEEKLY NEWSLETTER '.'<br> Email: '.$array;
        echo 'good';
    }
    else if($_POST['id'] == "2"){
        $message = '<br> CONTACT US'.'<br> Name: '.$array['name'].'<br> Email: '.$array['email'].'<br> Phone: '.$array['phone'].'
    <br> Message: '.$array['message'];
    }
    wp_mail($admin_email, 'Novus Detox', $message, $headers);
    die();
}
add_action('wp_ajax_contact_form_action', 'contact_form_function');
add_action('wp_ajax_nopriv_contact_form_action', 'contact_form_function');



// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

//remove header elements meta stuff
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML genera

remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter('nav_menu_item_id', '__return_false');
/*add_filter('the_content', 'strip_images',2);*/
function strip_images($content){
    return preg_replace('/<img[^>]+./','',$content);
}
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '$1', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );



show_admin_bar(false);



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_image_size( 'home_thumb', 200, 200, true );
