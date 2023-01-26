<?php





/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if ( ! defined( '_SITE_NAME' ) ) {
	// Replace the version number of the theme on each release.
	define( '_SITE_NAME', 'project_name_here' );
}

if ( ! defined( '_SITE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_SITE_VERSION', '1.0.1' );
}

if (function_exists('add_theme_support'))
{

    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 256, '', true); // Medium Thumbnail
    add_image_size('small', 124, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');


}


/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

# Login Customization
include "inc/wp-login-style.php";

# Load CSS & JS
include "inc/wp-enqueue-scripts.php";

# WordPress URLs to Javascript
include "inc/wp-js-variables.php";

# ShortCode Functions
include "inc/shortcodes.php";



/*------------------------------------*\
	Functions
\*------------------------------------*/

function register_menus(){
    register_nav_menus(array(

        'main-menu' => __('Main Menu', _SITE_NAME), // Main Navigation
        
        'footer-menu-services' => __('Footer Menu - Services', _SITE_NAME), // Footer Navigation
        'footer-menu-process' => __('Footer Menu - Process', _SITE_NAME), // Footer Navigation
        'footer-menu-company' => __('Footer Menu - Company', _SITE_NAME), // Footer Navigation
        'footer-menu-insights' => __('Footer Menu - Insights', _SITE_NAME), // Footer Navigation

    ));
}

// register navwalker
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

// Generate Navigation
function generate_nav($theme_location = false, $ul_class = false, $li_class = false){

    $ul_inline_class = 'list-inline ' . $ul_class;
    $li_inline_class = 'list-inline-item ' . $li_class;

	if($theme_location){
        wp_nav_menu(
            array(
                'theme_location'  => $theme_location,
                'menu'            => '',
                'container'       => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="' . $ul_inline_class . ' navigation-menu navigation-' . $theme_location . '">%3$s</ul>',
                'depth'           => 0,
                'fallback_cb'     => '__return_false',
                'walker'          => new bootstrap_5_wp_nav_menu_walker(),
                'add_li_class'    => $li_inline_class
            )
        );
    }

}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}




// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// Add Theme Settings Page to WP admin
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Global Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var){
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style(){
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Remove Admin bar
function remove_admin_bar(){
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function style_remove($tag){
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function gravatar ($avatar_defaults){
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}



// Custom View Article link to Post
function excerpt_view_article_link($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', _SITE_NAME) . '</a>';
}

// Threaded Comments
function enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}


function my_admin_body_class( $classes ) {
    return "$classes " . sanitize_title_with_dashes(get_the_title()) . " " . sanitize_title_with_dashes(get_page_template_slug());
}



/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('init', 'register_menus'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('after_setup_theme', 'register_navwalker' );

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'excerpt_view_article_link'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter( 'admin_body_class', 'my_admin_body_class' );

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
