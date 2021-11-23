<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');

$args = array(
    'default-color' => '0000ff',
    'default-image' => get_template_directory_uri() . '/images/wapuu.jpg',
);
add_theme_support('custom-background', $args);

if (!function_exists('draft_widgets_init')) {
    /**
     * Initializes themes widgets.
     */
    function draft_widgets_init()
    {
        register_sidebar(array(
            'name'          => __('Navbar right', 'understrap'),
            'id'            => 'navbar-right',
            'description'   => 'Widget area in the top right navbar corner',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
} // endif function_exists( 'understrap_widgets_init' ).
add_action('widgets_init', 'draft_widgets_init');


function theme_setup()
{
    /** post formats */
    $post_formats =
        array('aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status');
    add_theme_support('post-formats', $post_formats);
    /** post thumbnail **/
    add_theme_support('post-thumbnails');

    /** custom background **/
    $bg_defaults = array(
        'default-image' => '',
        'default-preset' => 'default',
        'default-size' => 'cover',
        'default-repeat' => 'no-repeat',
        'default-attachment' => 'scroll',
    );
    add_theme_support('custom-background', $bg_defaults);


    /** custom header **/
    $header_defaults = array(
        'default-image' => '',
        'width' => 300,
        'height' => 60,
        'flex-height' => true,
        'flex-width' => true,
        'default-text-color' => '',
        'header-text' => true,
        'uploads' => true,
    );
    add_theme_support('custom-header', $header_defaults);
}
add_action('after_setup_theme', 'theme_setup');

function register_childtheme_menus()
{
    register_nav_menu('footer_menu', __('Footer Menu', 'child-theme-textdomain'));
    register_nav_menu('socialmedia_menu', __('Socialmedia Menu', 'child-theme-textdomain'));
}

add_action('init', 'register_childtheme_menus');

function create_post_type_volunteer()
{

    // creates label names for the post type in the dashboard the post
    // panel and in the toolbar.
    $labels = array(
        'name' => __('Volunteer'),
        'singular_name' => __('Volunteer'),
        'add_new' => 'New Volunteer',
        'add_new_item' => 'Add New Volunteer',
        'edit_item' => 'Edit Volunteer',
        'featured_image' => _x(
            'Volunteer Post Image',
            'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'set_featured_image' => _x(
            'Set cover image',
            'Overrides
        the “Set featured image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'remove_featured_image' => _x(
            'Remove cover image',
            'Overrides the “Remove featured image” phrase for this post type. Added in
        4.3',
            'textdomain'
        ),
        'use_featured_image' => _x(
            'Use as cover image',
            'Overrides the “Use as featured image” phrase for this post type. Added in
        4.3',
            'textdomain'
        ),
    );

    // creates the post functionality that you want for a full listing
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'volunteer'),
        'menu_position' => 20,
        // can go to dash-icons to customize icon 
        'menu_icon' => 'dashicons-universal-access',
        'capability_type' => 'page',
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array(
            'title', 'editor', 'author',
            'thumbnail', 'excerpt', 'custom-fields'
        )
    );

    register_post_type('volunteer', $args);
}

add_action('init', 'create_post_type_volunteer');

function create_post_type_events()
{

    // creates label names for the post type in the dashboard the post
    // panel and in the toolbar.
    $labels = array(
        'name' => __('Events'),
        'singular_name' => __('Events'),
        'add_new' => 'New Events',
        'add_new_item' => 'Add New Events',
        'edit_item' => 'Edit Events',
        'featured_image' => _x(
            'Events Post Image',
            'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'set_featured_image' => _x(
            'Set cover image',
            'Overrides
        the “Set featured image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'remove_featured_image' => _x(
            'Remove cover image',
            'Overrides the “Remove featured image” phrase for this post type. Added in
        4.3',
            'textdomain'
        ),
        'use_featured_image' => _x(
            'Use as cover image',
            'Overrides the “Use as featured image” phrase for this post type. Added in
        4.3',
            'textdomain'
        ),
    );

    // creates the post functionality that you want for a full listing
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'menu_position' => 20,
        // can go to dash-icons to customize icon 
        'menu_icon' => 'dashicons-tickets-alt',
        'capability_type' => 'page',
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array(
            'title', 'editor', 'author',
            'thumbnail', 'excerpt', 'custom-fields'
        )
    );

    register_post_type('events', $args);
}

add_action('init', 'create_post_type_events');
