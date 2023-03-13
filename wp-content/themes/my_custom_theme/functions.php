<?php
/**
 * my_custom_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_custom_theme
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
function my_custom_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on my_custom_theme, use a find and replace
		* to change 'my_custom_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'my_custom_theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'my_custom_theme' ),
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
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'my_custom_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'my_custom_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_custom_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_custom_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_custom_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_custom_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'my_custom_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'my_custom_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_custom_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_custom_theme_scripts() {
	wp_enqueue_style( 'my_custom_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'my_custom_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'my_custom_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Register Custom Post Type book
function create_book_cpt() {

	$labels = array(
		'name' => _x( 'books', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'book', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'book', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'book Archives', 'textdomain' ),
		'attributes' => __( 'book Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent book:', 'textdomain' ),
		'all_items' => __( 'All books', 'textdomain' ),
		'add_new_item' => __( 'Add New book', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New book', 'textdomain' ),
		'edit_item' => __( 'Edit book', 'textdomain' ),
		'update_item' => __( 'Update book', 'textdomain' ),
		'view_item' => __( 'View book', 'textdomain' ),
		'view_items' => __( 'View books', 'textdomain' ),
		'search_items' => __( 'Search book', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into book', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this book', 'textdomain' ),
		'items_list' => __( 'books list', 'textdomain' ),
		'items_list_navigation' => __( 'books list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter books list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'book', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'book', $args );
}
add_action( 'init', 'create_book_cpt', 0 );
// Register Taxonomy bookcat
function create_bookcat_tax() {

	$labels = array(
		'name'              => _x( 'bookcats', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'bookcat', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search bookcats', 'textdomain' ),
		'all_items'         => __( 'All bookcats', 'textdomain' ),
		'parent_item'       => __( 'Parent bookcat', 'textdomain' ),
		'parent_item_colon' => __( 'Parent bookcat:', 'textdomain' ),
		'edit_item'         => __( 'Edit bookcat', 'textdomain' ),
		'update_item'       => __( 'Update bookcat', 'textdomain' ),
		'add_new_item'      => __( 'Add New bookcat', 'textdomain' ),
		'new_item_name'     => __( 'New bookcat Name', 'textdomain' ),
		'menu_name'         => __( 'bookcat', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'textdomain' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'bookcat', array('book'), $args );
}
add_action( 'init', 'create_bookcat_tax' );

 add_shortcode( 'themedomain_frontend_post', 'themedomain_frontend_post' );
    function themedomain_frontend_post() {
        themedomain_post_if_submitted(); ?>
        <form id="new_post" name="new_post" method="post"  enctype="multipart/form-data">

            <p><label for="title"><?php echo esc_html__('Title','theme-domain'); ?></label><br />
                <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
            </p>
            <?php wp_editor( '', 'content' ); ?>
            <?php  wp_dropdown_categories(array('category'=> 'category',  'show_option_none'=> 'Select an option', 'hide_empty' => 0, 'name' => 'listofoptions', 'value_field' => 'slug' ));
			 ?>
            <p><label for="post_tags"><?php echo esc_html__('Tags','theme-domain'); ?></label>

            <input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></p>

            <input type="file" name="post_image" id="post_image" aria-required="true">

            <p><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>
        
        </form>
    <?php
    } 

function themedomain_post_if_submitted() {
    // Stop running function if form wasn't submitted
    if ( !isset($_POST['title']) ) {
        return;
    }
	// $categories = $_POST['category'] ;
    // Add the content of the form to $post as an array
	$post_category = isset($_POST['category']) ? (int) $_POST['category'] : 0;
    $post = array(
        'post_title'    => $_POST['title'],
        'post_content'  => $_POST['content'],
		// 'post_category' => array($_POST['category']),
		// 'post_category' => explode(',', $categories),
		// 'post_category' => array($category->term_id),
		'post_category' => array($post_category),
        'tags_input'    => $_POST['post_tags'],
        'post_status'   => 'publish',   // Could be: publish
        'post_type' 	=> 'post' // Could be: 'page' or your CPT

    );
	print_r($post_category) ; exit;
	$post_id = wp_insert_post($post);
	add_post_meta($post_id, 'meta_key', true);
	
	
	// For Featured Image
	if( !function_exists('wp_generate_attachment_metadata')){
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	}
	if($_FILES) {
		foreach( $_FILES as $file => $array ) {
			if($_FILES[$file]['error'] !== UPLOAD_ERR_OK){
				return "upload error : " . $_FILES[$file]['error'];
			}
			$attach_id = media_handle_upload( $file, $post_id );
		}
	}
	if($attach_id > 0) {
		update_post_meta( $post_id,'_thumbnail_id', $attach_id );
	}

    echo 'Saved your post successfully! :)';
}




